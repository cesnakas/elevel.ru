<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("ќпрос");
$APPLICATION->AddChainItem("јрхив опросов", "vote_list.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?> <?
$VOTE_ID = $_REQUEST["VOTE_ID"]; // берет ID опроса из параметров страницы

// ѕримеры использовани€ основных функций модул€ опросов
/*
if (CModule::IncludeModule("vote"))
{
	$bIsUserVoted = IsUserVoted($VOTE_ID)	// провер€ет голосовал ли уже данный посетитель (возвращает true либо false)
	$VOTE_ID = GetCurrentVote("ANKETA");	// возвращает ID текущего опроса группы ANKETA
	$VOTE_ID = GetPrevVote("ANKETA");		// возвращает ID предыдущего опроса группы ANKETA
	$VOTE_ID = GetAnyAccessibleVote();		// возвращает ID любого доступного дл€ голосовани€ опроса
}
*/
?> <?$APPLICATION->IncludeComponent(
	"bitrix:voting.form",
	".default",
	Array(
		"VOTE_ID" => "3",
		"VOTE_RESULT_TEMPLATE" => "vote_result.php?VOTE_ID=#VOTE_ID#",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600"
	)
);?>
<br />
 <a href="/vote/" target="_self" >&lt; назад</a> <?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog.php");?>