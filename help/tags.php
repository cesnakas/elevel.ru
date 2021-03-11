<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Помощь в поиске по сайту.");
$APPLICATION->SetPageProperty("tags", "облако тегов, поиск");
$APPLICATION->SetTitle("Облако тегов");
?>
<p><b>ОБЛАКО ТЕГОВ</b></p>

<table bordercolor="#ff9900" cellspacing="0" cellpadding="10" width="100" align="center" border="1">
  <tbody>
    <tr><td align="center"><?$APPLICATION->IncludeComponent(
	"bitrix:search.tags.cloud",
	"",
	Array(
		"FONT_MAX" => 60,
		"FONT_MIN" => 8,
		"COLOR_NEW" => "CC4F00",
		"COLOR_OLD" => 999999,
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "90%",
		"SORT" => "NAME",
		"PAGE_ELEMENTS" => 2000,
		"PERIOD" => "",
		"URL_SEARCH" => "/search/index.php",
		"TAGS_INHERIT" => "N",
		"CHECK_DATES" => "N",
		"arrFILTER" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => 3600
	)
);?> </td></tr>
  </tbody>
</table>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>