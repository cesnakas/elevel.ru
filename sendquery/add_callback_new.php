<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";?>
<?//header("Content-type: text/html; charset=windows-1251");?>

<?$_REQUEST["web_form_submit"] = "Y";?>

	<?$APPLICATION->IncludeComponent(
		"doal:form.result.new",
		"",//elevel-new
		Array(
		"SEF_MODE" => "N",	// �������� ��������� ���
		"WEB_FORM_ID" => "92",	// ID ���-�����
		"LIST_URL" => "https://www.elevel.ru/sendquery/add_callback_new.php",	// �������� �� ������� �����������
		"EDIT_URL" => "https://www.elevel.ru/sendquery/add_callback_new.php",	// �������� �������������� ����������
		"SUCCESS_URL" => "https://www.elevel.ru/sendquery/add_callback_new.php",	// �������� � ���������� �� �������� ��������
		"CHAIN_ITEM_TEXT" => "",	// �������� ��������������� ������ � ������������� �������
		"CHAIN_ITEM_LINK" => "",	// ������ �� �������������� ������ � ������������� �������
		"IGNORE_CUSTOM_TEMPLATE" => "N",	// ������������ ���� ������
		"USE_EXTENDED_ERRORS" => "N",	// ������������ ����������� ����� ��������� �� �������
		"CACHE_TYPE" => "N",	// ��� �����������
		"CACHE_TIME" => "3600",	// ����� ����������� (���.)
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
		)
	);?>