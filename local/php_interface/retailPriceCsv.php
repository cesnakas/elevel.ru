<?
$_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__) . '/../..');
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );

CModule::IncludeModule( 'sale' );
CModule::IncludeModule( 'catalog' );
CModule::IncludeModule( 'iblock' );

global $dir, $LogFile;
$dir  = $_SERVER['DOCUMENT_ROOT'].'/upload/retail_price/';
$LogFile = $dir . date("d_m_Y") .'_log_import.txt';
$empty_article = date("d_m_Y") .'_empty_article.csv';
$nameEmptyArticle = '_empty_article';
$arGetData = array();
$arArticle = array();
$art = "art_";
$PartData = 10000;
$code = "ewayproduct";
$iblockProducts = 0;
$arPrices = array();
$arEmpty = array();
$arNotEmpty = array();


$res = CIBlock::GetList(
    Array(),
    Array(
        'TYPE'=>'1c_catalog',
        'SITE_ID'=>SITE_ID,
        'ACTIVE'=>'Y',
        "CNT_ACTIVE"=>"Y",
        "CODE"=>$code
    ), true
);
while($ar_res = $res->Fetch())
{
    $iblockProducts = $ar_res['ID'];
}


/**
 * ������� ����������
 */
function pre($arr){
    echo "\r\n<pre>";
    print_r($arr);
    echo '</pre>';
}

/**
 * ������� �����������
 */
function ToLog( $str )
{
    global $LogFile;
    $log = fopen( $LogFile , 'a' );
    fwrite( $log, date( 'Y.m.d H:i:s' ) . ":\n" . $str . "\n---------------\n\n" );
    fclose( $log );
}

/**
 * ������� ����������� ��������
 */
function key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
        return 0;
    else if ($key1 > $key2)
        return 1;
    else
        return -1;
}

/**
 * ������� �� csv � ������
 */
function csv_to_array($filename='', $delimiter=';')
{
    global $dir;
    $filename = $dir.$filename;
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}

/**
 * ������� �������� ����� �� ������
 */
function strReplace($art = "art_", $str){
    return str_replace($art, "", $str);
}


/**
 * ��������� �� ������������� ��� �����
 */
if( file_exists( $LogFile ) ):
    $f = fopen( $LogFile , 'w' );
    fclose( $f );
    unset( $f );
endif;

ToLog( '����� �������.' );
ToLog( '��������� ������.' );

/**
 * ������� ��� ����� � �����
 */
if ( is_dir( $dir ) ){
    if ( $dh = opendir( $dir ) ){
        while ( ( $file = readdir( $dh ) ) !== false ) {
            if( stristr($file, $nameEmptyArticle) === false &&$file != $empty_article && !in_array( $file, $skip ) && pathinfo( $dir . $file, PATHINFO_EXTENSION ) == 'csv' ){
                $arFile[] = $file;
//                ToLog( $file );
            }
        }
        closedir( $dh );
    }
}

ToLog( '���������� ��������� ������.' );

/**
 * ��������� ������������� �������
 */
if( empty( $arFile ) ){
    ToLog( 'CSV ������ ��� ��� ��� �� ��������. ������!' );
} else {
//    ��������� ������ �� �����
    foreach( $arFile as $FileName ){
        ToLog( '��������� ������ �� '.$FileName );
        $arFileData = csv_to_array($FileName, ";");
        if( empty( $arFileData ) ){
            ToLog( '���� '.$FileName.' ������.' );
        } else {
            $arGetData = array_merge( $arGetData, $arFileData );
        }
    }
    unset( $arFileData );
    foreach ($arGetData as $key => $arItem){
        $arArticle[] = strReplace($art, $arItem[0]);
    }

    foreach ($arGetData as $key => $arItem){
        $arPrices[strReplace($art, $arItem[0])] = $arItem[1];
    }

    if( !empty( $arArticle ) ){
        ToLog( '������ ��������� ������ �� ��.' );

        $CountData = count( $arArticle );
        for( $i = 0; $i <= (int)( $CountData / $PartData ); $i++ ){
            $arPartArticle = array_slice( $arArticle, $i * $PartData, $PartData );
        }

        $arFilter = Array(
            'IBLOCK_ID' => $iblockProducts,
            'PROPERTY_MARKING_PRODUCER' => $arPartArticle,
        );
        $arSelect = Array('ID', 'PROPERTY_MARKING_PRODUCER');
        $dbOffers = CIBlockElement::GetList( Array("SORT"=>"ASC"), $arFilter, false, array(), $arSelect );
        while ( $arOffer = $dbOffers->GetNext() )
        {
            $arResult[ $arOffer['ID'] ] = $arOffer['PROPERTY_MARKING_PRODUCER_VALUE'];
        }

        if( empty( $arResult ) ){
            ToLog( '������ �� �� �� ��������. ������!' );
        } else {
            ToLog( '������ ���������� �������.' );

            foreach( $arResult as $id => $article ){
                $PROPERTY_CODE = PROPERTY_RETAIL_PRICE_CODE;
                $PROPERTY_VALUE = str_replace( ",", ".", $arPrices[ $article ] );

                CIBlockElement::SetPropertyValuesEx($id, $iblockProducts, array($PROPERTY_CODE => $PROPERTY_VALUE));
                $arEmpty[$article] = $PROPERTY_VALUE;
            }

            ToLog( '���������� ���������� �������.' );
        }

        $arNotEmpty = array_diff_ukey($arPrices, $arEmpty, 'key_compare_func');

        if( empty( $arNotEmpty ) ){
            ToLog( '���������� ���� ��������� � ���� �������.' );
        } else {
            ToLog( '�������� ����� '.$empty_article.' � ���������, ������� ��� �� �����.' );
            $fp = fopen($dir . $empty_article, 'w');
            foreach ($arNotEmpty as $article => $price) {
                $art = array("art_".$article);
                fputcsv($fp, $art, ";");
            }
            fclose($fp);
            ToLog( '���������� �������� ����� '.$empty_article.' � ���������, ������� ��� �� �����.' );
        }
    }
}
?>