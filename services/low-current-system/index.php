<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetTitle("�������������� ����������� ������, ���������������, ���, ����");
?>
<div class="heading-partners clearfix">
	<h1 class="headline slabotochnie"><?=$APPLICATION->ShowTitle()?></h1>
	<?$APPLICATION->IncludeComponent('magnitmedia:geoip.phone', '', array("TYPE" => "PHONE_CORP"), $component);?>
</div>
<div class="top-service-block oem clearfix">
	<div class="left-block">
		<h3>�� ����������:</h3>
		<div class="twocolumns clearfix">
			<div class="column">
				 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services1.php", Array(), Array("MODE" => "html"));?>
			</div>
			<div class="column">
				 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services2.php", Array(), Array("MODE" => "html"));?>
			</div>
		</div>
	</div>
	<div class="right-block">
		<h3 class="calculator headline">������ ��������� ��������� �����</h3>
		 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"calculator6", 
	array(
		"BUTTON_TITLE" => "����������",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "calculator6",
		"EDIT_URL" => "",
		"FORM_TITLE" => "����������� ������� ��������� �������������� ����������� ������",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"MANAGER_EMAIL" => "pss_msk@elevel.ru",
		"PAGE_TITLE" => "�������������� ����������� ������, ���������������, ���, ����",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "��������� ��������� �����",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "111",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
	</div>
</div>
<?$APPLICATION->IncludeComponent('magnitmedia:geoip.manager_content', '', array("MANAGER_EMAIL" => "pss_msk@elevel.ru",	"FORM_TITLE" => "����� �������� ����� � �������������",	"PAGE_TITLE" => "�������������� ����������� ������, ���������������, ���, ����"), $component);?>

 <section class="section-develop">
<h2>�� �������������</h2>
<div class="clearfix">
	<div class="column">
		 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/production1.php", Array(), Array("MODE" => "html"));?>
	</div>
	<div class="column">
		 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/production2.php", Array(), Array("MODE" => "html"));?>
	</div>
	<div class="column">
		 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/production3.php", Array(), Array("MODE" => "html"));?>
	</div>
	<div class="column">
		 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/production4.php", Array(), Array("MODE" => "html"));?>
	</div>
</div>
 </section> <section class="section-examples section-content">
<h2>������� �����</h2>
 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/slider.php", Array(), Array("MODE" => "html"));?> </section> <section class="section-documents section-content">
<h2>�������������� ������������, �����������</h2>
 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/sertificates.php", Array(), Array("MODE" => "html"));?> </section> <section class="section-other-services section-content">
<h2>������ ���������� ������</h2>
 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/other_services.php", Array(), Array("MODE" => "html"));?> </section> <section class="section-special-offer">
<h2>���������� ������ ����� ������ � �������� �������������� ������ �� ������</h2>
 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"form2", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "form2",
		"EDIT_URL" => "",
		"FORM_TITLE" => "�������� ������ ����� ������ � �������� �������������� ������ �� ������",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"MANAGER_EMAIL" => "pss_msk@elevel.ru",
		"PAGE_TITLE" => "�������������� ����������� ������, ���������������, ���, ����",
		"PAGE_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?> </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>