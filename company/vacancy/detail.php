<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "вакансии, должности, работа, трудоустройство, карьера");
$APPLICATION->SetPageProperty("keywords", "вакансии, должности, работа, трудоустройство, карьера");
$APPLICATION->SetPageProperty("description", "Вакансии и карьера в компании \"Эlevel\"");
$APPLICATION->SetTitle("Вакансии");
?>
<div class="vacancy-box">
<?
$ServiceIBlockID = 9;
$CurrentSectionID = IntVal($_REQUEST['sid']);
$CurrentElementID = IntVal($_REQUEST['eid']);
CModule::IncludeModule("iblock");

$CurrentSection = GetIBlockSection($CurrentSectionID);
$APPLICATION->AddChainItem($CurrentSection['NAME'], '/company/vacancy/'.$CurrentSectionID.'/');

if($Item = GetIBlockElement($CurrentElementID))
{
	$APPLICATION->SetTitle($Item['NAME']);
	$APPLICATION->AddChainItem($Item['NAME']);
?>
<div class="svc_w100proH">
	<h1 class="service"><?=$Item['NAME']?></h2>
	<div class="service"><?=$Item['DETAIL_TEXT']?></div>
	<?if($_REQUEST["print"] !== "Y"){?><a href="/company/vacancy/<?=$CurrentSectionID?>/" >< назад</a><?}?>
</div>
<?
}
?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>