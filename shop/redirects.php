<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

$pageFalse = $APPLICATION->GetCurPage(false);
$urlFalse = explode('/',$pageFalse);
$urlFalse = array_filter($urlFalse);
$findCode = $urlFalse[sizeof($urlFalse)];

$dirsite="https://www.elevel.ru";

$select = Array("ID", "NAME", "CODE", "PROPERTY_CML2_ARTICLE");
$filter = Array("CODE" => $findCode, "IBLOCK_ID" => 53);



$result = CIBlockElement::GetList(Array(), $filter, false, false, $select);
if($items = $result->Fetch())
{

    $filterNew = Array("IBLOCK_ID" => CATALOG_ID, "PROPERTY_MARKING_PRODUCER" => $items["PROPERTY_CML2_ARTICLE_VALUE"]);
    $resultNew = CIBlockElement::GetList(Array(), $filterNew);
    if($itemsNew = $resultNew->GetNextElement())
    {
        $fields = $itemsNew->GetFields();
        if ($pageFalse != $fields["DETAIL_PAGE_URL"])
        {
            LocalRedirect($dirsite.$fields["DETAIL_PAGE_URL"], true, "301");
        }
    }    
    
    $filterNew = Array("IBLOCK_ID" => CATALOG_ID, "PROPERTY_MARKING_RAEK" => $items["PROPERTY_CML2_ARTICLE_VALUE"]);
    $resultNew = CIBlockElement::GetList(Array(), $filterNew);
    if($itemsNew = $resultNew->GetNextElement())
    {
        $fields = $itemsNew->GetFields();
        if ($pageFalse != $fields["DETAIL_PAGE_URL"])
        {
            LocalRedirect($dirsite.$fields["DETAIL_PAGE_URL"] , true, "301");
        }
    } 
          
    $filterNew = Array("IBLOCK_ID" => CATALOG_ID, "PROPERTY_MARKING_ELEVEL" => $items["PROPERTY_CML2_ARTICLE_VALUE"]);
    $resultNew = CIBlockElement::GetList(Array(), $filterNew);
    if($itemsNew = $resultNew->GetNextElement())
    {
        $fields = $itemsNew->GetFields();
        if ($pageFalse != $fields["DETAIL_PAGE_URL"])
        {
            LocalRedirect($dirsite.$fields["DETAIL_PAGE_URL"], true, "301");
        }
    }   
}

$select = Array("IBLOCK_ID", "ID", "NAME", "CODE", "UF_NEW_CATEGORY");
$filter = Array("CODE" => $findCode, "IBLOCK_ID" => 53);
$result = CIBlockSection::GetList(Array(), $filter, false, $select);
if($items = $result->Fetch())
{
    if ($items["UF_NEW_CATEGORY"] != "")
    {
        $section = CIblockSection::GetById($items["UF_NEW_CATEGORY"]);
        if ($resultSect = $section->GetNextElement())
        {
            $fields = $resultSect->GetFields();
            if ($fields["SECTION_PAGE_URL"] != $pageFalse)
            {
                LocalRedirect($dirsite.$fields["SECTION_PAGE_URL"], true, "301");
            }
            
        }
    }
}
