<?
if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true)die();

#
# Дополнительные функции
#

function CheckNewTemplate()
{
    global $APPLICATION;
    $return = false;

    if($_SERVER['HTTP_HOST'] == "test.elevel.ru"){

        // $page = $APPLICATION->GetCurPage();
        $dir = $APPLICATION->GetCurDir();
        $arDir = explode("/",$dir);

        if($arDir[1] == "shop" ||
            $arDir[1] == "contacts" ||
            $arDir[1] == "magaziny" ||
            $arDir[1] == "personal" ||
            $arDir[1] == "brands" ||
            $dir == "/company/actions/" ||
            $arDir[1] == "register" ||
            defined("ERROR_404") ||
            $arDir[1] == "help")
            $return = true;

    }	

    return $return;
}

function IsIE6(){

    $IsIE = false;
    $IE_version = array("MSIE 6.0","MSIE 7.0","MSIE 8.0");
    foreach($IE_version as $result)
        if(stristr($_SERVER['HTTP_USER_AGENT'], $result))
            $IsIE = true;

        return $IsIE;
}

function get_towns($a){
    if(empty($_SESSION["TOWNS"])){
        CModule::IncludeModule("iblock");
        $db_list = CIBlockSection::GetList(Array($by=>"SORT", $sort=>"ASC"), $arFilter = Array("IBLOCK_ID"=>24, "ACTIVE" => "Y"), false,$arSelect=Array("UF_*"));
        while($ar_result = $db_list->GetNext()):
            $res[]=$ar_result;
            endwhile;

        $_SESSION["TOWNS"] = array();
        foreach($res as $cityes){
            $_SESSION["TOWNS"][$cityes["ID"]] = array("T" => $cityes["NAME"], "PH" => $cityes["UF_PH"], "CT" => $cityes["UF_CT"], "PRICES" => $cityes["UF_PRICES"]);
        }
        return $_SESSION["TOWNS"];
    }
}

//
// Function to get words ending
// zero = 0, 5-20, 25-30, 35-40, ...
// n2_1 = 1, 21, 31, 41, ...
// n2_4 = 2-4, 22-24, 32-34, 42-44, ...
//
function GetEnding($number, $zero = 'ий', $n2_1 = 'ие', $n2_4 = 'ия')
{
    $number = intval($number);
    $last_char = substr($number, strlen($number)-1, 1);
    $last2char=substr($number, strlen($number)-2, 2);

    if(($last_char==0) ||
        ($last_char >=5 && $last_char<=9) ||
        ($last_char >= 1 && $last_char <= 9 && ($last2char < 20 && $last2char > 10) )
        )
        $str=$zero;
    else
        if($last_char>=2 && $last_char<=4)
            $str=$n2_4;
        else
            $str=$n2_1;
    return $str;
}

//генерирует последовательность символов
function generate_name($length){
    $code = '';
    $symbols = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_';
    for( $i = 0; $i < (int)$length; $i++ )
    {
        $num = rand(1, strlen($symbols));
        $code .= substr( $symbols, $num-1, 1 ); 
    } 
    return $code;
} 

function detectUTF8($string)
{
    return preg_match('%(?:
        [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte
        |\xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs
        |[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
        |\xED[\x80-\x9F][\x80-\xBF] # excluding surrogates
        |\xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3
        |[\xF1-\xF3][\x80-\xBF]{3} # planes 4-15
        |\xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16
        )+%xs', $string);
}

function wordByCount( $count, $wordOne, $wordTwo, $wordMany )
{
    $return = $wordMany;

    $lastOne = substr( $count, -1, 1 );
    $lastTwo = substr( $count, -2, 2 );

    if ( $lastOne == '1' && $lastTwo != '11' )
    {
        $return = $wordOne;
    }
    elseif ( ( $lastOne == '2' || $lastOne == '3' || $lastOne == '4' ) && $lastTwo != '12' && $lastTwo != '13' && $lastTwo != '14' )
    {
        $return = $wordTwo;
    }

    return $return;
}


function getMeta()
{
    // перекрывает мета тэги
    CModule::IncludeModule("iblock");
    global $APPLICATION;
    $META_IBLOCK_ID = "";
    $result['SEO_TITLE'] = "";
    $result['SEO_KEYWORDS'] = "";
    $result['SEO_DESCRIPTION'] = "";
    $result['H1'] = "";
    $result['TEXT'] = "";
    $result['is_exist'] = false;
    $res = CIBlock::GetList(
        Array(), 
        Array(
            'TYPE'=>'vecancy', 
            'SITE_ID'=>SITE_ID, 
            "CODE"=>'SEO LINKS'
        ), true
    );
    while($ar_res = $res->Fetch())
    {
        $META_IBLOCK_ID = $ar_res['ID'];
    }
    if(!empty($META_IBLOCK_ID))
    {
        $DIR = $APPLICATION->GetCurDir();
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*","DETAIL_TEXT");
        $arFilter = Array("IBLOCK_ID"=>$META_IBLOCK_ID, "NAME"=>$DIR);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNextElement())
        { 
            $arFields = $ob->GetFields();  
            $arProps = $ob->GetProperties();
            $result['is_exist'] = true;
            $result['SEO_TITLE'] = $arProps['TITLE']['VALUE'];
            $result['SEO_KEYWORDS'] = $arProps['KEYWORDS']['VALUE'];
            $result['SEO_DESCRIPTION'] = $arProps['DESCRIPTION']['VALUE'];
            $result['H1'] = $arProps['H1']['VALUE'];
            $result['TEXT'] = $arFields['DETAIL_TEXT'];
        }
    }
    return 	$result;
}

//получаем товары с учётом скидки при применении купона
function calculateOrder($arBasketItems)
{
    $totalPrice = 0;
    $totalWeight = 0;

    foreach ($arBasketItems as $arItem)
    {
        $totalPrice += $arItem["PRICE"] * $arItem["QUANTITY"];
        $totalWeight += $arItem["WEIGHT"] * $arItem["QUANTITY"];
    }

    $arOrder = array(
        'SITE_ID' => SITE_ID,
        'ORDER_PRICE' => $totalPrice,
        'ORDER_WEIGHT' => $totalWeight,
        'BASKET_ITEMS' => $arBasketItems
    );

    if (is_object($GLOBALS["USER"]))
    {
        $arOrder['USER_ID'] = $GLOBALS["USER"]->GetID();
        $arErrors = array();
        CSaleDiscount::DoProcessOrder($arOrder, array(), $arErrors);
    }

    return $arOrder;
}

// Функция сортировки по имени:
function name_sort($x, $y) {
    return strcasecmp($x['NAME'], $y['NAME']);
}

// проверим встречается ли подстрока в строке
function is_in_str($str,$substr)
{
    $result = strpos ($str, $substr);
    if ($result === FALSE) // если это действительно FALSE, а не ноль, например 
        return false;
    else
        return true;   
}
