<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arMonth = array(
  "1" => "€нвар€",
  "2" => "феврал€",
  "3" => "марта",
  "4" => "апрел€",
  "5" => "ма€",
  "6" => "июн€",
  "7" => "июл€",
  "8" => "августа",
  "9" => "сент€бр€",
  "10" => "окт€бр€",
  "11" => "но€бр€",
  "12" => "декабр€",
);

$arResult['WEBINARS'] = array();

foreach($arResult["ITEMS"] as $arItem){

  $date = $arItem['PROPERTIES']['DATE']['VALUE'];

  $pd = date_parse_from_format("d.m.Y H:i:s", $date);

  $mktime = mktime($pd['hour'], $pd['minute'], $pd['second'], $pd['month'], $pd['day'], $pd['year']);
  $now = time();

  if($mktime < $now)
    continue;

  $key = $pd['day'].$pd['month'].$pd['year'];

  $h = str_pad($pd['hour'], 2, '0', STR_PAD_LEFT);
  $m = str_pad($pd['minute'], 2, '0', STR_PAD_LEFT);

  $arItem['time'] = $h .":" .$m;

  $m = $pd['month'];
  $arResult['WEBINARS'][$key]['DATE'] = $pd['day'] ." " .$arMonth[$m];

  $arResult['WEBINARS'][$key]['ITEMS'][] = $arItem;

}
