<?
$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );

CModule::IncludeModule( 'sale' );
CModule::IncludeModule( 'catalog' );
CModule::IncludeModule( 'iblock' );

$arFile = array();
$arGetData = array();
$arSetData = array();
$arArticle = array();
$skip = array('.', '..');
$PartData = 10000;

global $dir, $LogFile;
$dir  = $_SERVER['DOCUMENT_ROOT'].'/upload/retail_price/';
$LogFile = $dir . 'log_import.txt';
$empty_article = 'empty_article.csv';

function ToLog( $str )
{
	global $LogFile;
	$log = fopen( $LogFile , 'a' );
	fwrite( $log, date( 'Y.m.d H:i:s' ) . ":\n" . $str . "\n---------------\n\n" );
	fclose( $log );
}

function GetData($file_name)
{
	global $dir;
	$arData = array();
	$art = array("art_");	//начало поля с данными по артиклу
	
	$f = fopen($dir . $file_name, "rt") or die("ќшибка!");
	for ($i=0; $data=fgetcsv($f,1000,";"); $i++):				
		$arData[ str_replace($art, "", $data[0]) ] = $data[1];
	endfor;

	fclose($f);
	return $arData;
}

if( file_exists( $LogFile ) ):
	$f = fopen( $LogFile , 'w' );
	fclose( $f );
	unset( $f );
endif;

ToLog( 'Старт скрипта.' );
ToLog( 'Получение файлов.' );

if ( is_dir( $dir ) ):
	if ( $dh = opendir( $dir ) ):
		while ( ( $file = readdir( $dh ) ) !== false ) {
			if( $file != $empty_article && !in_array( $file, $skip ) && pathinfo( $dir . $file, PATHINFO_EXTENSION ) == 'csv' ):
				$arFile[] = $file;
				ToLog( $file );
			endif;
		}
		closedir( $dh );
	endif;
endif;

ToLog( 'Завершение получения файлов.' );


if( empty( $arFile ) ):
	ToLog( 'CSV файлов нет или они не получены. Ошибка!' );
else:	
	foreach( $arFile as $FileName ):
		ToLog( 'Получение данных из '.$FileName );
		$arFileData = GetData( $FileName );
		
		if( empty( $arFileData ) ):
			ToLog( 'Файл '.$FileName.' пустой.' );
		else:			
			$arGetData = array_merge( $arGetData, $arFileData );
		endif;
	endforeach;
	
	unset( $arFileData );
	$arArticle = array_keys( $arGetData ); 
	
	if( !empty( $arArticle ) ):
		ToLog( 'Начало получения данных из БД.' );
		
		$CountData = count( $arArticle );	
		
		for( $i = 0; $i <= (int)( $CountData / $PartData ); $i++ ):
			$arPartArticle = array_slice( $arArticle, $i * $PartData, $PartData );
				
			$arFilter = Array(
				'IBLOCK_ID' => 83,
				//'ACTIVE' => 'Y',		
				//'ID' => array( 1476188, 1455504, 1615819 ),	//1615819			
				'PROPERTY_MARKING_PRODUCER' => $arPartArticle,
			);
			$arSelect = Array('ID', 'PROPERTY_MARKING_PRODUCER');
			$dbOffers = CIBlockElement::GetList( Array(), $arFilter, false, false, $arSelect );
			while ( $arOffer = $dbOffers->GetNext() )
			{		
				$arResult[ $arOffer['ID'] ] = $arOffer['PROPERTY_MARKING_PRODUCER_VALUE'];			
			}
			
			if( empty( $arResult ) ):
				ToLog( 'Данные из БД не получены. Ошибка!' );
			else:
				ToLog( 'Начало добавления свойств.' );
							
				foreach( $arResult as $id => $article ):
					
					$PROPERTY_CODE = PROPERTY_RETAIL_PRICE_CODE;
					$PROPERTY_VALUE = str_replace( ",", ".", $arGetData[ $article ] );				
					
					unset( $arGetData[ $article ] );
					CIBlockElement::SetPropertyValuesEx($id, false, array($PROPERTY_CODE => $PROPERTY_VALUE));

				endforeach;				
						
				ToLog( 'Завершение добавления свойств.' );
			endif;		
					
			unset($arResult);
			sleep(10); //пауза в секундах				
			
		endfor;
				
		if( empty( $arGetData ) ):
			ToLog( 'Обновление цены произошло у всех товаров.' );
		else:
			ToLog( 'Создание файла '.$empty_article.' с артиклами, которых нет на сайте.' );
			$fp = fopen($dir . $empty_article, 'w');
			foreach ($arGetData as $article => $price) {
				$art = array("art_".$article);
				fputcsv($fp, $art, ";");
			}
			fclose($fp); 
			ToLog( 'Завершение создания файла '.$empty_article.' с артиклами, которых нет на сайте.' );
		endif;
	endif;
	
endif;

ToLog( 'Конец скрипта.' );

?>