<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Умный дом");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает проектирование и программирование системы «умный дом». Система «умный дом» позволяет управлять инженерными коммуникациями Вашего дома.");
$APPLICATION->SetPageProperty("tags", "умный дом, smart house, система умный дом, система автоматизации дома, автоматизация дома, knx, eib, система lcn, merten knx, abb i-bus eib, legrand in one, bticino my home, gira funkbus, gira instabus, esylux, teleco, moeller, умный дом цена, умный дом стоимость, сколько стоит умный дом, управление бытовыми приборами, контроль бытовых приборов,  управление отоплением, контроль открытия дверей, контроль открытия окон, обогрев кровли, обогрев водостоков, управление кондиционированием, управление сигнализацией, контроль доступа, умный дом оборудование, проект умный дом, мультирум, управление освещением, управление светом, управление микроклиматом, управление умным домом, дистанционное управление домом, автоматизация дома, домашняя автоматизация, управление жалюзи, дистанционное управление жалюзи, управление воротами, дистанционное управление воротами, управление вентиляцией, управление климатом, имитация присутствия, сигнализация умный дом, ситемы охранной сигнализации");
$APPLICATION->SetPageProperty("keywords", "умный дом, система умный дом, цена, стоимость, оборудование, проект умный дом, умный дом купить, установка умный дом, проект системы умный дом, умный дом проектирование, монтаж умный дом");
$APPLICATION->SetTitle("Умный дом");
?>
<div class="heading-partners clearfix">
	<h1 class="headline automation"><?=$APPLICATION->ShowTitle()?></h1>
	<?$APPLICATION->IncludeComponent(
	"magnitmedia:geoip.phone",
	"",
	array(
	"TYPE" => "PHONE_CORP",	// Тип сообщения
	),
	"\$component"
);?>
</div>
<div class="top-smart-block clearfix">
	<div class="left-block">
		<h3>Мы предлагаем:</h3>
		 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services.php", Array(), Array("MODE" => "html"));?>
	</div>
	<div class="right-block">
		<h3 class="headline calculator">Рассчитать примерную стоимость автоматизации</h3>
		 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new",
	"calculator4",
	array(
	"BUTTON_TITLE" => "Рассчитать",	// Наименование кнопки всплывающего окна
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
		"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
		"COMPONENT_TEMPLATE" => "calculator4",
		"EDIT_URL" => "",	// Страница редактирования результата
		"FORM_TITLE" => "Рассчитать примерную стоимость атоматизации умного дома",	// Наименование формы
		"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
		"LIST_URL" => "",	// Страница со списком результатов
		"MANAGER_EMAIL" => "aid_msk@elevel.ru",	// Электронная почта получателя
		"PAGE_TITLE" => "Умный дом",	// Наименование страницы
		"PAGE_URL" => "",	// URL страницы
		"POPUP_TITLE" => "Примерная стоимость автоматизации",	// Заголовок всплывающего окна
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
		"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		),
		"WEB_FORM_ID" => "109",	// ID веб-формы
	)
);?>
	</div>
</div>
<?$APPLICATION->IncludeComponent(
	"magnitmedia:geoip.manager_content",
	"",
	array(
	"MANAGER_EMAIL" => "aid_msk@elevel.ru",
		"FORM_TITLE" => "Форма обратной связи с руководителем",
		"PAGE_TITLE" => "Умный дом"
	),
	"\$component"
);?>

<section class="section-steps section-content">
<h2>3 шага навстречу друг другу</h2>
 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/steps.php", Array(), Array("MODE" => "html"));?> </section>
<?
global $filterProjects;
$filterProjects = array(
	"PROPERTY_SOLUTION_TYPE_VALUE" => "умный дом"
);
?>
<h1 class="headline projects">Наши проекты</h1>
 <section class="section-projects section-content">
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter",
	"projects",
	array(
	"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"CACHE_TIME" => "86400",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COMPONENT_TEMPLATE" => "projects",
		"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "filterProjects",	// Имя выходящего массива для фильтрации
		"FILTER_VIEW_MODE" => "vertical",
		"HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
		"IBLOCK_ID" => "88",	// Инфоблок
		"IBLOCK_TYPE" => "engineering_services",	// Тип инфоблока
		"PAGER_PARAMS_NAME" => "",	// Имя массива с переменными для построения ссылок в постраничной навигации
		"POPUP_POSITION" => "left",
		"PRICE_CODE" => "",	// Тип цены
		"PROPERTY_CODE" => array(
			0 => "YEAR",
			1 => "OTHER_PROJECTS",
			2 => "EQUIPMENT",
			3 => "OBJECT_TYPE",
			4 => "SOLUTION_TYPE",
			5 => "",
		),
		"SAVE_IN_SESSION" => "N",	// Сохранять установки фильтра в сессии пользователя
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_DESCRIPTION" => "-",	// Описание
		"SECTION_ID" => "",	// ID раздела инфоблока
		"SECTION_TITLE" => "-",	// Заголовок
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"TEMPLATE_THEME" => "blue",
		"XML_EXPORT" => "N",	// Включить поддержку Яндекс Островов
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"projects",
	array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"COMPONENT_TEMPLATE" => "projects",
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_TEXT",
			3 => "DATE_ACTIVE_FROM",
			4 => "",
		),
		"FILTER_NAME" => "filterProjects",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "88",	// Код информационного блока
		"IBLOCK_TYPE" => "engineering_services",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "9",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "YEAR",
			1 => "EQUIPMENT",
			2 => "OBJECT_TYPE",
			3 => "SOLUTION_TYPE",
			4 => "",
		),
		"SECTION_URL" => "",
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
		"USE_PERMISSIONS" => "N"
	)
);?> <section class="section-other-services section-content">
<h2>Другие инженерные услуги</h2>
 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/other_services.php", Array(), Array("MODE" => "html"));?> </section> <section class="section-special-offer">
<h2>Хотите получить скидку 30% на проектирование вашего “Умного дома”?</h2>
 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new",
	"form2",
	array(
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
		"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
		"COMPONENT_TEMPLATE" => "form2",
		"EDIT_URL" => "",	// Страница редактирования результата
		"FORM_TITLE" => "Хотите получить скидку 30% на ваш “Умный дом” ?",	// Наименование формы
		"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
		"LIST_URL" => "",	// Страница со списком результатов
		"MANAGER_EMAIL" => "aid_msk@elevel.ru",	// Электронная почта получателя
		"PAGE_TITLE" => "Умный дом",	// Наименование страницы
		"PAGE_URL" => "",	// URL страницы
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
		"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		),
		"WEB_FORM_ID" => "102",	// ID веб-формы
	)
);?> </section> <section class="section-testimonials">
<h2>Наши клиенты думают о нас</h2>
 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/reviews.php", Array(), Array("MODE" => "html"));?> </section> </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>