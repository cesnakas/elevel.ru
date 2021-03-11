<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "Услуги электролаборатории");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает услуги электролаборатории по выгодной цене.");
$APPLICATION->SetPageProperty("tags", "электролаборатория, электротехническая лаборатория, электроизмерительная лаборатория, электроизмерения и испытания, услуги электролаборатории, электрические испытания, измерение сопротивления изоляции кабелей, измерение сопротивления заземляющих устройств, измерение полного сопротивления петли фаза-ноль, электроиспытания, электротехнические испытания, электроизмерительные испытания");
$APPLICATION->SetPageProperty("keywords", "электролаборатория, электроиспытания, услуги электролаборатории, цены, этл этл передвижная, лаборатория этл");
$APPLICATION->SetTitle("Услуги электролаборатории");
?>
<div class="heading-partners clearfix">
	<h1 class="headline electrolaboratory"><?=$APPLICATION->ShowTitle()?></h1>
	<?$APPLICATION->IncludeComponent('magnitmedia:geoip.phone', '', array("TYPE" => "PHONE_CORP"), $component);?>
</div>
<div class="top-service-block tabs-electrolaboratory">
	<h3>Мы предлагаем:</h3>
	<div class="clearfix">
		<div class="left-block">
			<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services_tabs.php", Array(), Array("MODE" => "html"));?>
		</div>
		<div class="right-block">
			<div class="tabs-content">
				<div id="tab-electrolaboratory1">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services1.php", Array(), Array("MODE" => "html"));?>
					<div class="align-right"><?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => "ue_msk@elevel.ru",
		"FORM_TITLE" => "Замер сопротивления изоляции силовых линий и электрических машин",
		"PAGE_TITLE" => "Услуги электролаборатории",
		"BUTTON_TITLE" => "Запросить стоимость",
		"BUTTON1_ONCLICK" => "yaCounter1485305.reachGoal('rasschitat');return true;",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?></div>
				</div>
				<div id="tab-electrolaboratory2">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services2.php", Array(), Array("MODE" => "html"));?>
					<div class="align-right"><?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => "ue_msk@elevel.ru",
		"FORM_TITLE" => "Аудит качества электроэнергии",
		"PAGE_TITLE" => "Услуги электролаборатории",
		"BUTTON_TITLE" => "Запросить стоимость",
		"BUTTON1_ONCLICK" => "yaCounter1485305.reachGoal('rasschitat');return true;",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?></div>
				</div>
				<div id="tab-electrolaboratory3">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services3.php", Array(), Array("MODE" => "html"));?>
					<div class="align-right"><?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => "ue_msk@elevel.ru",
		"FORM_TITLE" => "Проверка работоспособности автоматических выключателей и выключателей, управляемых дифференциальным током (УЗО)",
		"PAGE_TITLE" => "Услуги электролаборатории",
		"BUTTON_TITLE" => "Запросить стоимость",
		"BUTTON1_ONCLICK" => "yaCounter1485305.reachGoal('rasschitat');return true;",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?></div>
				</div>
				<div id="tab-electrolaboratory4">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services4.php", Array(), Array("MODE" => "html"));?>
					<div class="align-right"><?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => "ue_msk@elevel.ru",
		"FORM_TITLE" => "Измерение параметров сопротивления петли фаза - ноль и тока короткого замыкания",
		"PAGE_TITLE" => "Услуги электролаборатории",
		"BUTTON_TITLE" => "Запросить стоимость",
		"BUTTON1_ONCLICK" => "yaCounter1485305.reachGoal('rasschitat');return true;",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?></div>
				</div>
				<div id="tab-electrolaboratory5">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services5.php", Array(), Array("MODE" => "html"));?>
					<div class="align-right"><?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => "ue_msk@elevel.ru",
		"FORM_TITLE" => "Измерение сопротивления заземляющих устройств",
		"PAGE_TITLE" => "Услуги электролаборатории",
		"BUTTON_TITLE" => "Запросить стоимость",
		"BUTTON1_ONCLICK" => "yaCounter1485305.reachGoal('rasschitat');return true;",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?></div>
				</div>
				<div id="tab-electrolaboratory6">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services6.php", Array(), Array("MODE" => "html"));?>
					<div class="align-right"><?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => "ue_msk@elevel.ru",
		"FORM_TITLE" => "Измерение удельного сопротивления грунтов",
		"PAGE_TITLE" => "Услуги электролаборатории",
		"BUTTON_TITLE" => "Запросить стоимость",
		"BUTTON1_ONCLICK" => "yaCounter1485305.reachGoal('rasschitat');return true;",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?></div>
				</div>
				<div id="tab-electrolaboratory7">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services7.php", Array(), Array("MODE" => "html"));?>
					<div class="align-right"><?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => "ue_msk@elevel.ru",
		"FORM_TITLE" => "Аудит устройства молниезащиты",
		"PAGE_TITLE" => "Услуги электролаборатории",
		"BUTTON_TITLE" => "Запросить стоимость",
		"BUTTON1_ONCLICK" => "yaCounter1485305.reachGoal('rasschitat');return true;",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?$APPLICATION->IncludeComponent('magnitmedia:geoip.manager_content', '', array("MANAGER_EMAIL" => "ue_msk@elevel.ru",	"FORM_TITLE" => "Форма обратной связи с руководителем",	"PAGE_TITLE" => "Услуги электролаборатории"), $component);?>

<section class="section-steps section-content">
	<h2>Как мы работаем</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/steps.php", Array(), Array("MODE" => "html"));?>
</section>
<section class="section-examples section-content">
	<h2>Примеры протоколов испытаний</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/slider.php", Array(), Array("MODE" => "html"));?>
</section>
<section class="section-documents section-content">
	<h2>Разрешительная документация, сертификаты</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/sertificates.php", Array(), Array("MODE" => "html"));?>
</section>
<section class="section-special-offer">
	<h2>Запросить специальные условия на услуги электролабаратории</h2>
	<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"form2", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "form2",
		"MANAGER_EMAIL" => "ue_msk@elevel.ru",
		"FORM_TITLE" => "Запросить специальные условия на услуги электролабаратории",
		"PAGE_TITLE" => "Услуги электролабаратории",
		"PAGE_URL" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>