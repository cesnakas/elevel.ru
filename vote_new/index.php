<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");	
$APPLICATION->SetPageProperty("tags", "опрос элевел, опрос elevel, опрос эlevel, опросник, голосования, опрос аудитории, мнения посетителей");
$APPLICATION->SetPageProperty("not_show_nav_chain", "Y");
$APPLICATION->SetPageProperty("keywords", "опрос элевел, опрос elevel, опрос эlevel, опросник, голосования, опрос аудитории, мнения посетителей");
$APPLICATION->SetPageProperty("description", "Опросы и голосования на сайте Эlevel");
$APPLICATION->SetTitle("25 лет компании Эlevel. Приглашаем в гости!");
?> 

<?
global $USER;
if ($USER->IsAdmin()){
//	echo "<pre>"; print_r($_SERVER["REMOTE_ADDR"]); echo "</pre>";
}
?>
<div class="container">
	<div class="row">
		<?$APPLICATION->IncludeComponent("bitrix:voting.current", "vote25years", array(
			"CHANNEL_SID" => "EVENT_ELEVEL_2016",
			"VOTE_ID" => "27",
			"VOTE_ALL_RESULTS" => "N",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_JUMP" => "Y",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "",
			"AJAX_OPTION_ADDITIONAL" => ""
			),
			false
		);?> 
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>