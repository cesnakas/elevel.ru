<?php 
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
 
if(empty($_SERVER["DOCUMENT_ROOT"])){
$_SERVER["DOCUMENT_ROOT"] = "/home/m/makoveckij/elevel.ru/public_html";
}
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
 
use \Bitrix\Main\Loader;
use \Bitrix\Main\Diag\Debug;
 
Loader::includeModule('iblock');
 
 // убираем ограничением врем€ выполнени€ php скрипта
set_time_limit(0);
// задаем максимально разрешенный к использованию объем пам€ти
ini_set('memory_limit','512M');
 
// длина одного шага в секундах (чем меньше - тем меньше нагрузка, но дольше будет идти переиндексаци€ фасетов)
$stepTimeLimit = 60;

$productsIndexedCount = 0; 

 // ѕолучим ID инфоблоков, дл€ которых используетс€ фасетный индекс
$iblockList = \Bitrix\Iblock\IblockTable::getList(array(
    'select' => array('ID'),
    'filter' => array('=PROPERTY_INDEX' => 'I'),
))->fetchAll();

if (empty($iblockList)) {
    echo date('r')  . 'Iblocks for reindex of facets are not detected.';
    exit();
}

foreach ($iblockList as $iblock) {
    $index = \Bitrix\Iblock\PropertyIndex\Manager::createIndexer($iblock['ID']);
    $index->startIndex();

    $stepNumber = 1;
    $productsIndexedInLastStepCount = 0;
    $productsLimitCount = $index->estimateElementCount();

    echo 
        date('r') . ' start reindexing of facets for iblock: ' . $iblock['ID'] . '. '
        . 'Found products for index: ' . $productsLimitCount
    ;

    while ($productsIndexedCount <= $productsLimitCount) {
        $productsIndexedCount = $index->continueIndex($stepTimeLimit) + $productsIndexedCount;

        if ($stepNumber > 1 && ($productsIndexedInLastStepCount == $productsIndexedCount)) {
            break;
        }

       echo 'current step: ' . $stepNumber . '; products indexed count: ' . $productsIndexedCount;

        $stepNumber++;
        $productsIndexedInLastStepCount = $productsIndexedCount;
    }

    if ($productsIndexedCount >= $productsLimitCount) {
        $index->endIndex();
    }

    echo
        date('r') . ' stop reindexing of facets for iblock ' . $iblock['ID'] . '. '
        . 'Memory is used: ' . round(memory_get_usage() / 1024 / 1024, 2) . 'MB';
}

\Bitrix\Iblock\PropertyIndex\Manager::checkAdminNotification();