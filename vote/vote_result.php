<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("Результаты опроса");
$APPLICATION->AddChainItem("Архив опросов", "vote_list.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?> 
<h5>
<a name="exf_go"></a>
Результаты опроса</h5>
 <?$APPLICATION->IncludeComponent(
	"bitrix:voting.result",
	"vote_result",
	Array(
		"VOTE_ID" => "3",
		"VOTE_ALL_RESULTS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "1200",
		"QUESTION_DIAGRAM_15" => "histogram"
	)
);?> 
<br />
 <a href="/vote/" target="_self" >&lt; назад</a> <?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog.php");?>