<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//$APPLICATION->RestartBuffer();
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');
$_REQUEST["gid"]=$_REQUEST['ELEMENT_ID'];
$iPriceID = CGeoRegions::GetPriceIDByUser();
$sPriceCode = CGeoRegions::GetPriceCodeByID($iPriceID);
$sPropertyCountCode = CGeoRegions::GetCountPropPostfixByPriceID($iPriceID);
ob_start();
$APPLICATION->IncludeComponent("bitrix:catalog.element", "ajax", Array(
		"IBLOCK_TYPE" => "Каталог товаров",	// Тип инфо-блока
		"IBLOCK_ID" => "48",	// Инфо-блок
		"ELEMENT_ID" => intval($_REQUEST["gid"]),	// ID элемента
		"ELEMENT_CODE" => "",	// Код элемента
		"SECTION_ID" => intval($_REQUEST["sid"]),	// ID раздела
		"SECTION_CODE" => "",	// Код раздела
		"PROPERTY_CODE" => array(	// Свойства
				0 => "ARTICUL",
				1 => "PARTY",
				2 => "PACKING",
				3 => "POINT",
				4 => "MANUFACTURER",
				5 => $sPropertyCountCode,
				6 => "TITLE",
				7 => "ALT_IMAGE",
				8 => "CML2_ARTICLE",
		),
		"SECTION_URL" => "/catalog/#SECTION_ID#/",	// URL, ведущий на страницу с содержимым раздела
		"DETAIL_URL" => "/catalog/#SECTION_ID#/#ELEMENT_ID#/",	// URL, ведущий на страницу с содержимым элемента раздела
		"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
		"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"SECTION_ID_VARIABLE" => "sid",	// Название переменной, в которой передается код группы
		"CACHE_TYPE" => "N",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"META_KEYWORDS" => "META_KEYWORDS",	// Установить ключевые слова страницы из свойства
		"META_DESCRIPTION" => "META_DESCRIPTION",	// Установить описание страницы из свойства
		"DISPLAY_PANEL" => "N",
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"PRICE_CODE" => array(	// Тип цены
				0 => $sPriceCode,
		),
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
		"LINK_IBLOCK_TYPE" => "",	// Тип инфо-блока, элементы которого связаны с текущим элементом
		"LINK_IBLOCK_ID" => "",	// ID инфо-блока, элементы которого связаны с текущим элементом
		"LINK_PROPERTY_SID" => "",	// Свойство в котором хранится связь
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу где будет показан список связанных элементов
),
		false
);

$out=ob_get_contents();
ob_end_clean();
echo $out;

?>

