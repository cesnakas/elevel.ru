<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "опрос элевел, опрос elevel, опрос эlevel, опросник, голосования, опрос аудитории, мнения посетителей");
$APPLICATION->SetPageProperty("not_show_nav_chain", "Y");
$APPLICATION->SetPageProperty("keywords", "опрос элевел, опрос elevel, опрос эlevel, опросник, голосования, опрос аудитории, мнения посетителей");
$APPLICATION->SetPageProperty("description", "Опросы и голосования на сайте Эlevel");
$APPLICATION->SetTitle("Опросы и голосования Эlevel");
?><strong>Совместное мероприятие компаний Эlevel и Schneider Electriс Отель-курорт &laquo;МОРОЗОВО&raquo; 7-8 декабря 2012г.</strong> 
<table width="100%"> 
  <tbody> 
    <tr><td><?$APPLICATION->IncludeComponent("bitrix:voting.form",".default",Array(
		"VOTE_ID" => "25", 
		"VOTE_RESULT_TEMPLATE" => "/bitrix/templates/.default/components/bitrix/voting.current/first_vote/result.php?VOTE_ID=#VOTE_ID#", 
		"CACHE_TYPE" => "A", 
		"CACHE_TIME" => "3600" 
	)
);?> </td></tr>
   </tbody>
 </table>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>