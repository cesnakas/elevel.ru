<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "�������������������, ������, ������, �level, elevel, elevel.ru, ������������������� �������, ������������� ������������, ��������-������������� ���������, ������������, schneider electric, abb, legrand, gira, merten, dkc, ���, ���������, osram, general electric, philips, ���������, ����, �������� ����������, lena lighting, bticino, anam, hensel, nexans, comtech, zamel, wago, elfo, ecoplast, ����������, knx, esylux, ���, teleco");
$APPLICATION->SetPageProperty("keywords", "�������������������, ������, ������, �level, elevel, elevel.ru, ������������������� �������, ������������� ������������, ��������-������������� ���������, ������������, schneider electric, abb, legrand, gira, merten, dkc, ���, ���������, osram, general electric, philips, ���������, ����, �������� ����������, lena lighting, bticino, anam, hensel, nexans, comtech, zamel, wago, elfo, ecoplast, ����������, knx, esylux, ���, teleco");
$APPLICATION->SetTitle("������������� ��������� | ������� �������");
?> 



<?$APPLICATION->IncludeComponent(
    "magnitmedia:brands.list", 
    ".default", 
    array(
        "COMPONENT_TEMPLATE" => ".default"
    ),
    false
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>