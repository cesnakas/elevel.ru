<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";?>
<script type="text/javascript" src="/bitrix/js/main/ajax.js"></script>
<script type="text/javascript" src="/js/4forms/SIMPLE_FORM_1.js"></script>


<div id="simul_form">
<?$APPLICATION->IncludeComponent("bitrix:form", "wt_webforms", Array(
	"START_PAGE" => "new",	// Начальная страница
	"SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
	"SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
	"SHOW_VIEW_PAGE" => "N",	// Показывать страницу просмотра результата
	"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
	"WEB_FORM_ID" => "1",	// ID веб-формы
	"RESULT_ID" => "",	// ID результата
	"SHOW_ANSWER_VALUE" => "Y",	// Показать значение параметра ANSWER_VALUE
	"SHOW_ADDITIONAL" => "Y",	// Показать дополнительные поля веб-формы
	"SHOW_STATUS" => "Y",	// Показать текущий статус результата
	"EDIT_ADDITIONAL" => "Y",	// Выводить на редактирование дополнительные поля
	"EDIT_STATUS" => "Y",	// Выводить форму смены статуса
	"NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
		0 => "F_SENDTOMAIL",
		1 => "",
	),
	"NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
		0 => "F_SENDTOMAIL",
		1 => "",
	),
	"IGNORE_CUSTOM_TEMPLATE" => "Y",	// Игнорировать свой шаблон
	"USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
	"SEF_MODE" => "N",	// Включить поддержку ЧПУ
	"SEF_FOLDER" => "/services/",	// Каталог ЧПУ (относительно корня сайта)
	"AJAX_MODE" => "Y",	// Включить режим AJAX
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	"CACHE_TYPE" => "N",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
	"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
	"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
	"VARIABLE_ALIASES" => array(
		"action" => "action",
	)
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>