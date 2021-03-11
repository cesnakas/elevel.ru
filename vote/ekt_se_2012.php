<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "опрос элевел, опрос elevel, опрос эlevel, опросник, голосования, опрос аудитории, мнения посетителей");
$APPLICATION->SetPageProperty("not_show_nav_chain", "Y");
$APPLICATION->SetPageProperty("keywords", "опрос элевел, опрос elevel, опрос эlevel, опросник, голосования, опрос аудитории, мнения посетителей");
$APPLICATION->SetPageProperty("description", "Опросы и голосования на сайте Эlevel");
$APPLICATION->SetTitle("Опросы и голосования Эlevel");
?><strong>ОПРОС ПО МЕРОПРИЯТИЮ «Винтажная вечеринка» проводимая совместно компаниями Эlevel и Schneider Electric в Винотеке Семена Соловьева</strong> 
<table width="100%"> 
  <tbody> 
    <tr><td><?$APPLICATION->IncludeComponent(
	"bitrix:voting.current",
	"first_vote",
	Array(
		"CHANNEL_SID" => "votes",
		"VOTE_ID" => "16",
		"VOTE_ALL_RESULTS" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "",
		"CACHE_NOTES" => "",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
	)
);?> </td></tr>
   </tbody>
 </table>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>