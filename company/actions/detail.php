<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "������, �level, elevel, elevel.ru, �����, ������, ���������������, ����������, ������� ����, �������������������, ������������������� �������, ������������� ������������, ��������-������������� ���������, ������������, ���");
$APPLICATION->SetTitle("�����");
$APPLICATION->SetAdditionalCSS("/css/service.css");
?>
<div class="action-box">
	<?
	$ServiceIBlockID = 7;
	$CurrentSectionID = false;
	$CurrentElementID = IntVal($_REQUEST['eid']);
	CModule::IncludeModule("iblock");
	?>

	<?if($Item = GetIBlockElement($CurrentElementID)):?>
		<?
		$APPLICATION->SetTitle($Item['NAME']);
		$APPLICATION->SetPageProperty("keywords", $Item["PROPERTIES"]["KEYWORDS"]["VALUE"]);
		$APPLICATION->SetPageProperty("description", $Item["PROPERTIES"]["DESCRIPTION"]["VALUE"]);
		?>
		<div>
			<h1><?=$Item['NAME']?></h1>
			<?=$Item['DETAIL_TEXT']?>
		</div>
		<a class="lnk-back" href="/company/actions/" title="��������� �����"><i class="tz-icon"></i><span>��������� �����</span></a>
	<?endif?>
</div>

<?if($_REQUEST["print"] !== "Y"):?>
	<div style="height:10px;"></div>
	<?$APPLICATION->IncludeFile("/includes/bottom_slide_banners.php");?>
	<div>
		<?$APPLICATION->ShowBanner("TOVAR_DNY");?>
	</div>
<?endif?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>