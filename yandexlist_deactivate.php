<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("яндекс выгрузка");
?>


<?if ($USER->isAdmin()) {
//MARKING_PRODUCER  
  $arSelect = Array("ID");
  $arFilter = Array("IBLOCK_ID"=>83, "ACTIVE"=>"N", "PROPERTY_YANDEX"=>false);
  $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
  while($ob = $res->GetNextElement())
  {
    $arFields = $ob->GetFields();
    CIBlockElement::SetPropertyValuesEx($arFields["ID"], false, array("YANDEX" => 43193));
    // echo "<pre>";print_r($arResult);echo "</pre>";
  }

}?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>