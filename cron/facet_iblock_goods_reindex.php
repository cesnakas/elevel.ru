<?php
$_SERVER["DOCUMENT_ROOT"] = realpath( __DIR__ . "/../");
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
set_time_limit(0);
CModule::IncludeModule('iblock'); 

$ptime = getmicrotime();

$index = \Bitrix\Iblock\PropertyIndex\Manager::createIndexer(CATALOG_ID);
$index->startIndex();
$index->continueIndex(0); // создание без ограничения по времени
$index->endIndex();

echo "Фасетный индекс создавался ".round(getmicrotime()-$ptime, 3)." секунд";

$ptime = getmicrotime();

// вызываем переиндексацию поиска модуля iblock
CSearch::ReIndexModule("iblock");

echo "Поисковый индекс создавался ".round(getmicrotime()-$ptime, 3)." секунд";