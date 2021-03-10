<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
CModule::IncludeModule('iblock');
//decodeURI
$_REQUEST["NAME"] = urldecode($_REQUEST["NAME"]);
$_REQUEST["NAME"] = iconv("UTF-8", "Windows-1251", $_REQUEST["NAME"]);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_CODE" => "new_catalog", "SECTION_ID" =>$_REQUEST["SECTION_ID"], "INCLUDE_SUBSECTIONS"=>"Y", array("LOGIC"=>"OR", array("NAME" => '%'.$_REQUEST["NAME"].'%'), array("PROPERTY_ARTICUL"=>'%'.$_REQUEST["NAME"].'%'))), array(), false, Array());
echo $res." ".declension(intval($res), array('товар', 'товара', 'товаров'));
/*$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_CODE" => "new_catalog", "SECTION_ID" =>$_REQUEST["SECTION_ID"], "INCLUDE_SUBSECTIONS"=>"Y", array("LOGIC"=>"OR", array("NAME" => '%'.$_REQUEST["NAME"].'%'), array("PROPERTY_ARTICUL"=>'%'.$_REQUEST["NAME"].'%'))), false, false, Array("NAME"));
while($ar_res = $res->Fetch()){
    //echo '<pre>'; print_r($ar_res["NAME"]); echo '</pre>';
}*/?>

