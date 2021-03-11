<?
define("STOP_STATISTICS", true);
define("NO_KEEP_STATISTIC", 'Y');
define("NO_AGENT_STATISTIC",'Y');
define("NO_AGENT_CHECK", true);

if(empty($_SERVER["DOCUMENT_ROOT"])){
$_SERVER["DOCUMENT_ROOT"] = "/var/www/elevel/data/www/elevel.ru";
}

require_once($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php');

ini_set('max_execution_time', '100000');
ini_set('memory_limit', '10000M');
ini_set('default_charset', 'UTF-8');

set_time_limit(0);

if (!CModule::IncludeModule('iblock')) {
	echo "Ошибка инициализации!";
	die();
}

require_once('phpExcel.php');