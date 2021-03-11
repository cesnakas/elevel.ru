<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новинки");
$APPLICATION->SetAdditionalCSS("/css/service.css");
?><?
$ServiceIBlockID = 6;
$CurrentSectionID = false;
$CurrentElementID = IntVal($_REQUEST['eid']);
CModule::IncludeModule("iblock");

if($Item = GetIBlockElement($CurrentElementID))
{
	$APPLICATION->SetTitle($Item['NAME']);
	$APPLICATION->SetPageProperty("keywords", $Item["PROPERTIES"]["KEYWORDS"]["VALUE"]);
	$APPLICATION->SetPageProperty("description", $Item["PROPERTIES"]["DESCRIPTION"]["VALUE"]);
?>
<div class="novelty-box cfx">
	<h1><?=$Item['NAME']?></h1>
	<div><?=$Item['DETAIL_TEXT']?></div>
</div>
<?if($_REQUEST["print"] !== "Y"):?>
	<div class="cfx"><a title="Вернуться в раздел Новинки" href="/company/novelty/" >назад</a></div>
<?endif?>

<?
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>