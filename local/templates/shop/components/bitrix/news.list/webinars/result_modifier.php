<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arMonth = array(
  "1" => "������",
  "2" => "�������",
  "3" => "�����",
  "4" => "������",
  "5" => "���",
  "6" => "����",
  "7" => "����",
  "8" => "�������",
  "9" => "��������",
  "10" => "�������",
  "11" => "������",
  "12" => "�������",
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
