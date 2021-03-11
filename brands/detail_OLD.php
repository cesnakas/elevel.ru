<?
// Убрано в связи с бесконечным редиректом на страницах /brands/schneider-electric/acti9/
/*if(!ctype_lower(preg_replace('/[^\w]+/', '', $_SERVER["REQUEST_URI"]))){
    $new_url = str_replace('_', '-', mb_strtolower($_SERVER["REQUEST_URI"]));      
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: {$new_url}");     
}*/
//
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Бренды");                 
?>
<? include("missing_products.php"); ?>
<?
$ServiceIBlockID = 5;
$CurrentSectionID = trim($_REQUEST['sid']);
$eid=explode('?',$_REQUEST['eid']);
$CurrentElementID = $eid[0];
//session_start();
//$_SESSION['eid'] = $Item["PROPERTY_LINK_SECTION_VALUE"];

CModule::IncludeModule("iblock");

$secRs = CIBlockSection::GetList(Array(), Array('IBLOCK_ID'=>$ServiceIBlockID, 'GLOBAL_ACTIVE'=>'Y', 'CODE'=>$CurrentSectionID), false, array("UF_*"));
if (!$CurrentSection = $secRs->GetNext())
{
	//header('Location: http://www.elevel.ru/404.php'); exit;
	echo "err"; 
}

$CurrentSectionID = $CurrentSection["ID"];

$CurrentSectionLink = empty($CurrentSection["CODE"]) ? $CurrentSection["ID"] : $CurrentSection["CODE"];
$APPLICATION->AddChainItem((!empty($CurrentSection["UF_MENUBRANDNAME"]))?$CurrentSection["UF_MENUBRANDNAME"]:$CurrentSection['NAME'], '/brands/'.$CurrentSectionLink.'/');


$rsElement = CIBlockElement::GetList(array(), array(
"IBLOCK_ID"=>$ServiceIBlockID, "ACTIVE"=>"Y", "CODE"=>$CurrentElementID), false, false, 
Array("NAME", "DETAIL_TEXT", "PROPERTY_KEYWORDS", "PROPERTY_DESCRIPTION","PROPERTY_LINK_SECTION", "PROPERTY_BROWSER_TITLE", "PROPERTY_H1_TITLE"));

if (!$Item = $rsElement->GetNext())
{
	header('Location: http://www.elevel.ru/404.php'); exit;
	//echo "err2"; 
}

$title_h1 = !empty($Item['PROPERTY_H1_TITLE_VALUE']) ? $Item['PROPERTY_H1_TITLE_VALUE'] : '';
$title = !empty($Item['PROPERTY_BROWSER_TITLE_VALUE']) ? $Item['PROPERTY_BROWSER_TITLE_VALUE'] : $Item['NAME'];
$APPLICATION->SetTitle($title);
$APPLICATION->AddChainItem($Item['NAME']);
$APPLICATION->SetPageProperty("keywords", $Item['PROPERTY_KEYWORDS_VALUE']);
$APPLICATION->SetPageProperty("description", $Item['PROPERTY_DESCRIPTION_VALUE']);

?> 

<style>
	.service h3{font:bold 22px Trebuchet Ms;}
</style>

<script>
$(document).ready(function(){
	$('<div style="clear:both"></div>').insertAfter('.service h3');
});
</script>
	<div>
		<center>
		<?$APPLICATION->IncludeComponent(
			"bitrix:advertising.banner",
			"",
			Array(
			"TYPE" => "PB_BANNER_2",	// Тип баннера
			"CACHE_TYPE" => "A",	// Тип кеширования
			"CACHE_TIME" => "3600",	// Время кеширования (сек.)
			)
		);?>
		</center>
		<br />
		<h1><?=$title_h1;?></h1>
		<?=$Item['DETAIL_TEXT']?>
		<?session_start();
		$_SESSION['idsecbrand'] = $Item["PROPERTY_LINK_SECTION_VALUE"];
		$APPLICATION->IncludeFile("/brands/catalog_pdf.php");
		?><br>
		<?if($_REQUEST["print"] !== "Y"){?>
			<a href="/brands/<?=$CurrentSectionLink;?>/">Вернуться назад</a>
		<?}?>
		<br><br>
	</div>
<style type="text/css">
img.sol_bp,ul.mini_pic_list li{
 border: 1px solid #EFEBEC;
    border-radius: 5px 5px 5px 5px;
    padding: 15px;
    position: relative;
}
</style>
<?$APPLICATION->IncludeFile("/brands/cat.php");?>
<?php ?>


<?=$_SERVER;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>