<?
AddEventHandler('ipol.mailorder', 'getAdditionalFields', 'mailStore');

function mailStore($event,$orderId,$arFields,$lid,$arModuleFields){
	\Bitrix\Main\Loader::includeModule('sale');
	$order = \Bitrix\Sale\Order::load($orderId);
	$propertyCollection = $order->getPropertyCollection();
	$data = $propertyCollection->getArray();

	$mail = $data['properties'][0]['PERSON_TYPE_ID'] == 4 ? 'dzetki@elevel.ru' : 'zakaz@elevel.ru';

	$r['IPOLMO_MAILTO'] = ['NAME'  => 'E-mail', 'VALUE' => $mail];
	return $r;
}

if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true)die();

include_once  $_SERVER["DOCUMENT_ROOT"].'/_garm/orders.php'; // ����������� �� cron

// #
// # ��������� � ���������� ���������� 
// #
include_once($_SERVER['DOCUMENT_ROOT'].'/local/php_interface/include/globals_constants.php');

// #
// # �������������� �������
// #
include_once($_SERVER['DOCUMENT_ROOT'].'/local/php_interface/include/functions.php');
 
// #
// # ������� � �����������
// #
include_once($_SERVER['DOCUMENT_ROOT'].'/local/php_interface/include/handlers.php');

 /*if ( $_SERVER['REQUEST_URI'] != strtolower( $_SERVER['REQUEST_URI']) ) {
    header('Location: //'.$_SERVER['HTTP_HOST'] . strtolower($_SERVER['REQUEST_URI']), true, 301);
    exit();
}  */

// ?>