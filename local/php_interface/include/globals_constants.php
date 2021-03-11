<?
if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true)die();

#
# Константы и глобальные переменные 
#

define("SALE_SECTION_ID", '39894');
define("CATALOG_ID", 83);
define("IBLOCK_BRAND_ID", 84);
define("ARTICUL_PROP", "MARKING_PRODUCER");
define("CATALOG_OLD_ID", 53); //каталог старой закалки
define("CATALOG_TYPE", '1c_catalog');
define("SHOPS_IBLOCK_ID", 116);	//инфоблок розничных магазинов
define("SHIPMENT_IBLOCK_ID", 118);	//инфоблок точек отгрузки
define("DELIVERY_IBLOCK_ID", 119);	//инфоблок способов доставки
define("ZERO_SECTION_IBLOCK_ID", 113); // инфоблока нулевых разделов
define("CORPORATIV_ACTIONS_IBLOCK_ID", 123); // инфоблок Акции (Корпоративный)
define("DEPARTMENTS_CONTACTS_IBLOCK_ID", 129); // инфоблок Отделы (Контакты)
define("OFFICES_PARTNERS_IBLOCK_ID", 126); // инфоблок Магазины-партнеров
define("OFFICES_CONTACTS_IBLOCK_ID", 60); // инфоблок Офисы (Контакты)
define("NEWS_IBLOCK_ID", 2); // инфоблок Новости
define("COMPANY_NEWS_IBLOCK_ID", 2); // Новости компании
define("VACANCY_IBLOCK_ID", 9); // Вакансии
define("ACTIONS_IBLOCK_ID", 7); // Акции
define("CLIENT_REVIEWS_IBLOCK_ID", 37); // Клиенты и отзывы
define("NEW_IBLOCK_ID", 6); // Новинки


define("MSK_CODE", 28205);
define("KZN_CODE", 45386);
define("PSH_CODE", 28213);
define("SHL_CODE", 28214);
define("DMT_CODE", 45133);
define("SRG_CODE", 33185);
define("NGN_CODE", 45363);
define("ELS_CODE", 35155);

define("EKT_CODE", 28209);
define("NVS_CODE", 28210);
define("RST_CODE", 28211);
define("SPB_CODE", 28208);

define("PROPERTY_FLAG_MAIN_PHOTO_YES", 		26536);
define("PROPERTY_FLAG_MAIN_QUANTITY_YES", 	26537);
define("PROPERTY_RETAIL_PRICE_CODE", 		'RETAIL_PRICE');

define("MAIN_STORE_ID", 2);

//Пользовательские свойства
define("UF_SECTION_PROPERTY_COUNT_PRODUCTS", 'UF_COUNT_PRODUCTS');
define("UF_SECTION_PROPERTY_PRODUCER", 'UF_PRODUCER');
define("UF_SECTION_PROPERTY_SERIES", 'UF_SERIES');

define("UF_DATA_TYPE_SECTION", 23);
define("UF_DATA_TYPE_PRODUCER", 24);
define("UF_DATA_TYPE_SERIE", 25);

// рубрики рассылок
define("RUBRIC_SHIT", 	8);
define("RUBRIC_TORG", 	7);
define("RUBRIC_ARCH", 	9);
define("RUBRIC_PROM", 	11);
define("RUBRIC_ELECTRO", 12);
define("RUBRIC_GEN", 	13);
define("RUBRIC_SVET", 	10);

define("SITE_DOMAIN", $_SERVER['SERVER_NAME']);

if (SITE_DOMAIN == 'www.elevel.ru') // prod
{
	define("PROPERTY_SUBSCRIBE_RUBRICS_ID", 	16420); // prod
	
	// варианты значений свойства Рубрики подписок
	define("PROPERTY_SUBSCRIBE_RUBRICS_SHIT", 	54351);
	define("PROPERTY_SUBSCRIBE_RUBRICS_TORG", 	54352);
	define("PROPERTY_SUBSCRIBE_RUBRICS_ARCH", 	54353);
	define("PROPERTY_SUBSCRIBE_RUBRICS_PROM", 	54354);
	define("PROPERTY_SUBSCRIBE_RUBRICS_ELECTRO", 54355);
	define("PROPERTY_SUBSCRIBE_RUBRICS_GEN", 	54356);
	define("PROPERTY_SUBSCRIBE_RUBRICS_SVET", 	54357);
	
	//define("SOAP_UT_EWAY_URL", "http://ut/ut_nom/ws/ISExchange.1cws?wsdl");
	define("SOAP_UT_EWAY_URL", "http://ut.krokus.ru/ut_nom/ws/ISExchange.1cws?wsdl");
}
else // dev
{
	define("PROPERTY_SUBSCRIBE_RUBRICS_ID", 	16267);

	// варианты значений свойства Рубрики подписок
	define("PROPERTY_SUBSCRIBE_RUBRICS_SHIT", 	47545);
	define("PROPERTY_SUBSCRIBE_RUBRICS_TORG", 	47544);
	define("PROPERTY_SUBSCRIBE_RUBRICS_ARCH", 	47546);
	define("PROPERTY_SUBSCRIBE_RUBRICS_PROM", 	47547);
	define("PROPERTY_SUBSCRIBE_RUBRICS_ELECTRO", 47548);
	define("PROPERTY_SUBSCRIBE_RUBRICS_GEN", 	47549);
	define("PROPERTY_SUBSCRIBE_RUBRICS_SVET", 	47550);

	define("SOAP_UT_EWAY_URL", "http://213.171.39.249/ut_eway_elvgarm/ws/ISExchange.1cws?wsdl");
}

define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log_events.txt");

?>