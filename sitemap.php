<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
?> 
<p></p>
 
<h1>Карта сайта</h1>
 
<p></p>
 
<ul class="list_sol">
  <li><?$APPLICATION->IncludeComponent(
	"bitrix:main.map",
	"elevel_map",
	Array(
		"LEVEL" => "5",
		"COL_NUM" => "1",
		"SHOW_DESCRIPTION" => "N",
		"SET_TITLE" => "Y",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => ""
	)
);?></li>
</ul>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>