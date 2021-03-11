<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "ABB");
$APPLICATION->SetTitle("Бренды");
$APPLICATION->SetAdditionalCSS("/css/service.css");
?>
<?
$ServiceIBlockID = 5;
$CurrentSectionID = trim($_REQUEST['sid']);
CModule::IncludeModule("iblock");

$secRs = CIBlockSection::GetList(Array(), Array('IBLOCK_ID'=>$ServiceIBlockID, 'GLOBAL_ACTIVE'=>'Y', 'CODE'=>$CurrentSectionID), false, array("UF_*"));
if (!$CurrentSection = $secRs->GetNext())
{
	header('Location: http://www.elevel.ru/404.php'); exit; 
}
$CurrentSectionID = $CurrentSection["ID"];

$APPLICATION->AddChainItem($CurrentSection['NAME']);
$APPLICATION->SetTitle($CurrentSection['NAME']);
$APPLICATION->SetPageProperty("keywords", $CurrentSection['UF_KEYWORDS']);
$APPLICATION->SetPageProperty("description", $CurrentSection['UF_DESCRIPTION']);
$CurrentSectionLink = $CurrentSection["CODE"];
?>
<div class="svc_full">
<center><?$APPLICATION->IncludeComponent("bitrix:advertising.banner", ".default", array(
	"TYPE" => "PB_BANNER_1",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "3600"
	),
	false
);?></center>
<!--<h1 class="service"><?=$CurrentSection['NAME']?></h1>-->
<?=$CurrentSection['DESCRIPTION']?>

</div>
<?
$items = GetIBlockElementList($ServiceIBlockID, $CurrentSectionID);
while($arItem = $items->GetNext())
{
$arItemLink = empty($arItem["CODE"]) ? $arItem["ID"] : $arItem["CODE"];
?>

<div class="svc_w100proH">
<?if(IntVal($arItem['PREVIEW_PICTURE']) > 0):?>
	<a href="/brands/<?=$CurrentSectionLink;?>/<?=$arItemLink?>/"><img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE']);?>" class="service" /></a>
<?endif;?>
<div style="margin-left: 100px;">
	<h2 class="service"><a class="gray" href="/brands/<?=$CurrentSectionLink;?>/<?=$arItemLink?>/"><?=$arItem['NAME']?></a></h2>
	<div class="service"><?=$arItem['PREVIEW_TEXT']?></div>
</div>
</div>
<?
}
?>
<a href="/brands/" >< назад</a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>