
<?
if($_REQUEST["submit"] == "from_ajax"){
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	$APPLICATION->IncludeComponent("tezart:tz_search", "fast_search", array("IBLOCK_ID" => 83, "COUNT" => 4));
}
