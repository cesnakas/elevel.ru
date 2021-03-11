<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Изменение EXTERNAL_ID");
?>

<?if ($USER->isAdmin()) {
$cnt=0;
  $arSelect = Array("EXTERNAL_ID","ID");
  $arFilter = Array("IBLOCK_ID"=>83, "ACTIVE"=>"Y");
  $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
  while($ob = $res->GetNextElement())
  {
    $arFields = $ob->GetFields();
    if( preg_match("#^[0-9]+$#",$arFields["EXTERNAL_ID"]) ){//если  только цифры
      // echo "<pre>EXTERNAL_ID ONLY DIGIT = ";print_r($arFields["EXTERNAL_ID"]);echo "</pre>";
      $cnt++;
    }else{
      echo "<pre>EXTERNAL_ID LETTER = ";print_r($arFields["EXTERNAL_ID"]);echo "</pre>";
      CIBlockElement::Delete($arFields["ID"]);
    }
    // CIBlockElement::SetPropertyValuesEx($arFields["ID"], false, array("YANDEX" => false));
    // echo "<pre>";print_r($arResult);echo "</pre>";
  }
echo "Обработано ".$cnt."товаров";
}?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>