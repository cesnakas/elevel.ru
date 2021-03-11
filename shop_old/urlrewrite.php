<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
?>
<?
if(CModule::IncludeModule("iblock")){
    if(isset($_REQUEST["gid"])){
        $arSelect = array('ID', "DETAIL_PAGE_URL");
        $arFilter = array("ID"=>$_REQUEST["gid"]);
        $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
        if($ob = $res->GetNext())
        {
            header("HTTP/1.1 301 Moved Permanently"); 
            header("Location: {$ob['DETAIL_PAGE_URL']}"); 
        }        
    }
    elseif(isset($_REQUEST["sid"])){
        $arSelect = array('ID', "DETAIL_PAGE_URL");
        $arFilter = array("ID"=>$_REQUEST["sid"]);
        $res = CIBlockSection::GetList(array(), $arFilter, false, false, $arSelect);
        if($ob = $res->GetNext())
        {
            header("HTTP/1.1 301 Moved Permanently"); 
            header("Location: {$ob['SECTION_PAGE_URL']}"); 
        } 
    }
}                
?>