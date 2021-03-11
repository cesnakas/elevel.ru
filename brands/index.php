<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "электрооборудование, элевел, элевел, эlevel, elevel, elevel.ru, электроустановочные изделия, низковольтное оборудование, кабельно-проводниковая проудкция, светотехника, schneider electric, abb, legrand, gira, merten, dkc, дкс, севкабель, osram, general electric, philips, теплолюкс, лэмз, световые технологии, lena lighting, bticino, anam, hensel, nexans, comtech, zamel, wago, elfo, ecoplast, энергомера, knx, esylux, дкс, teleco");
$APPLICATION->SetPageProperty("keywords", "электрооборудование, элевел, элевел, эlevel, elevel, elevel.ru, электроустановочные изделия, низковольтное оборудование, кабельно-проводниковая проудкция, светотехника, schneider electric, abb, legrand, gira, merten, dkc, дкс, севкабель, osram, general electric, philips, теплолюкс, лэмз, световые технологии, lena lighting, bticino, anam, hensel, nexans, comtech, zamel, wago, elfo, ecoplast, энергомера, knx, esylux, дкс, teleco");
$APPLICATION->SetTitle("Производители электрики | Каталог брендов");
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