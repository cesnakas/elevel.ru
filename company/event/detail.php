<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "������, �level, elevel, elevel.ru, �����, ������, ���������������, ����������, ������� ����, �������������������, ������������������� �������, ������������� ������������, ��������-������������� ���������, ������������, ���");
$APPLICATION->SetTitle("�����");
$APPLICATION->SetAdditionalCSS("/css/service.css");
?>
<div class="block980a">
<?
$ServiceIBlockID = 7;
$CurrentSectionID = false;
$CurrentElementID = IntVal($_REQUEST['eid']);
CModule::IncludeModule("iblock");

if($Item = GetIBlockElement($CurrentElementID))
{
	$APPLICATION->SetTitle($Item['NAME']);
	$APPLICATION->SetPageProperty("keywords", $Item["PROPERTIES"]["KEYWORDS"]["VALUE"]);
	$APPLICATION->SetPageProperty("description", $Item["PROPERTIES"]["DESCRIPTION"]["VALUE"]);
?>

<div class="block650">
				<p class="h1"><?=$Item['NAME']?></p>
				<?=$Item['DETAIL_TEXT']?>
			</div>
<?
}
?>
</div>
<div style="height:10px;"></div>
		<?$APPLICATION->IncludeFile("/includes/bottom_slide_banners.php");?>
		
		
		<div class="block282">
		<?$APPLICATION->ShowBanner("TOVAR_DNY");?>
		</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>