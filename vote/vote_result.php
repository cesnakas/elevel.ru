<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("���������� ������");
$APPLICATION->AddChainItem("����� �������", "vote_list.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?> 
<h5>
<a name="exf_go"></a>
���������� ������</h5>
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
 <a href="/vote/" target="_self" >&lt; �����</a> <?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog.php");?>