<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
//$phpToJsObj = array();
$phpToJsObj = CUtil::PhpToJSObject($_POST['jsvar']);
echo $phpToJsObj;
