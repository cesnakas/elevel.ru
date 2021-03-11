<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "проектирование систем автоматизации, проектирование инженерных систем, комплектация электрооборудованием, электромонтаж, программирование систем автоматизации, пусконаладка, пусконаладочные работы, технический надзор, авторский надзор, электролаборатория, услуги электролаборатория");
$APPLICATION->SetPageProperty("keywords", "проектирование систем автоматизации, проектирование инженерных систем, комплектация электрооборудованием, электромонтаж, программирование систем автоматизации, пусконаладка, пусконаладочные работы, технический надзор, авторский надзор, электролаборатория, услуги электролаборатория");
$APPLICATION->SetTitle("Проектирование, инженерные услуги и решения Эlevel Инженер");
?>
<h1><?=$APPLICATION->ShowTitle()?></h1>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"partners",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "services",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(""),
		"MENU_CACHE_TIME" => "86400",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "services",
		"USE_EXT" => "N"
	)
);?>
<section class="section-quote section-content">
  <h2>Прямая речь</h2>
  <div class="clearfix">
    <div class="author-block">
    <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/director.php", Array(), Array("MODE" => "html"));?>
    </div>
    <div class="text-block">
    <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/director-quote.php", Array(), Array("MODE" => "html"));?>
      <div class="button-right">
        <?$APPLICATION->IncludeComponent(
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
		"MANAGER_EMAIL" => "v.zabavnikov@elevel.ru, s.kireeva@elevel.ru",
		"FORM_TITLE" => "Форма обратной связи с руководителем",
		"PAGE_TITLE" => "Проектирование, инженерные услуги и решения Эlevel Инженер",
		"PAGE_URL" => "",
		"BUTTON_TITLE" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
      </div>
    </div>
  </div>
</section>
<section class="section-brands section-content section-clients">
	<h2>Наши клиенты</h2>
	<div class="slider-brands slider-content slider-arrow-position">
		<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/clients.php", Array(), Array("MODE" => "html"));?>
	</div>
</section>
<section class="section-special-offer">
	<h2>Хотите начать сотрудничество с Эlevel? Просто заполните форму!</h2>
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
		"MANAGER_EMAIL" => "v.zabavnikov@elevel.ru, s.kireeva@elevel.ru",
		"FORM_TITLE" => "Хотите начать сотрудничество с Эlevel? Просто заполните форму!",
		"PAGE_TITLE" => "Проектирование, инженерные услуги и решения Эlevel Инженер",
		"PAGE_URL" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
