<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><??>
<?$APPLICATION->IncludeComponent("bitrix:sale.order.ajax", "template3", Array(
	"COMPONENT_TEMPLATE" => "template3",
		"PAY_FROM_ACCOUNT" => "Y",	// ��������� ������ � ����������� �����
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",	// ��������� ������ � ����������� ����� ������ � ������ ������
		"COUNT_DELIVERY_TAX" => "N",
		"ALLOW_AUTO_REGISTER" => "N",	// ��������� ����� � �������������� ������������ ������������
		"SEND_NEW_USER_NOTIFY" => "Y",	// ���������� ������������ ������, ��� �� ��������������� �� �����
		"DELIVERY_NO_AJAX" => "Y",	// ����� ������������ �������� � �������� ��������� �������
		"DELIVERY_NO_SESSION" => "N",	// ��������� ������ ��� ���������� ������
		"TEMPLATE_LOCATION" => "popup",	// ���������� ��� �������� ������ ��������������
		"DELIVERY_TO_PAYSYSTEM" => "d2p",	// ������������������ ����������
		"USE_PREPAYMENT" => "N",	// ������������ ��������������� ��� ���������� ������ (PayPal Express Checkout)
		"PROP_1" => "",
		"PROP_2" => "",
		"ALLOW_NEW_PROFILE" => "Y",	// ��������� ��������� �������� �����������
		"SHOW_PAYMENT_SERVICES_NAMES" => "Y",
		"SHOW_STORES_IMAGES" => "Y",	// ���������� ����������� ������� � ���� ������ ������ ������
		"PATH_TO_BASKET" => "/personal/cart/",	// ���� � �������� �������
		"PATH_TO_PERSONAL" => "/personal/",	// ���� � �������� ������������� �������
		"PATH_TO_PAYMENT" => "/personal/order/payment/",	// �������� ����������� ��������� �������
		"PATH_TO_AUTH" => "/auth/",	// ���� � �������� �����������
		"SET_TITLE" => "Y",	// ������������� ��������� ��������
		"DISABLE_BASKET_REDIRECT" => "N",	// ���������� �� �������� ���������� ������, ���� ������ ������� ����
		"PRODUCT_COLUMNS" => array(
			0 => "WEIGHT_FORMATED",
		),
		"SHOW_TOTAL_BOX" => "Y"
	),
	false
);?>

<??><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>