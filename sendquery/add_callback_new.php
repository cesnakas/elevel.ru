<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";?>
<?//header("Content-type: text/html; charset=windows-1251");?>

<?$_REQUEST["web_form_submit"] = "Y";?>

	<?$APPLICATION->IncludeComponent(
		"doal:form.result.new",
		"",//elevel-new
		Array(
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"WEB_FORM_ID" => "92",	// ID веб-формы
		"LIST_URL" => "https://www.elevel.ru/sendquery/add_callback_new.php",	// Страница со списком результатов
		"EDIT_URL" => "https://www.elevel.ru/sendquery/add_callback_new.php",	// Страница редактирования результата
		"SUCCESS_URL" => "https://www.elevel.ru/sendquery/add_callback_new.php",	// Страница с сообщением об успешной отправке
		"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
		"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
		"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
		"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
		"CACHE_TYPE" => "N",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
		)
	);?>