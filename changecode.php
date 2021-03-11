<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Замена Симолвьных кодов товаров");
?>
<meta http-equiv="cache-control" content="no-cache">
<?if ($USER->isAdmin()) {
BXClearCache(true);
	$arSelect = Array("ID", "PROPERTY_15377","CODE","DETAIL_PAGE_URL");
	$arFilter = Array(
		"IBLOCK_ID"=>83,
		"ACTIVE_DATE"=>"Y",
		"ACTIVE"=>"Y",
		">DATE_MODIFY_FROM"=>date("d.m.Y", mktime(0,0,0,07,21,2017))
		);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
			$article="";
			$article=strtolower($arFields["PROPERTY_15377_VALUE"]);
				$url=explode("/",$arFields['DETAIL_PAGE_URL']);
			if($article!="" && "/".$url[1]."/".$url[2]."/".$url[3]."/".str_replace(array(" ","/","(",")"), array("+","%2F","%28","%29"), $article)."/" != $arFields["DETAIL_PAGE_URL"]){
				echo "Redirect 301 "." /".$url[1]."/".$url[2]."/".$url[3]."/".str_replace(array(" ","/","(",")"), array("+","%2F","%28","%29"), $article)."/   ".$arFields["DETAIL_PAGE_URL"]."<br>";
			}

		
	}
}else{
	echo "Пожалуйста, атворизуйтесь";
}?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>