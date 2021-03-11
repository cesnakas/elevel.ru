<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("not_show_nav_chain", "N");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, электрооборудование, электроснабжение, электромонтаж, проектирование электроснабжения, производство электрощитов, электротехническое оборудование, электроустановочные изделия, низковольтное оборудование, кабельно-проводниковая продукция, светотехника, электрика, вру, электрощиты, электрощитовая продукция, ABB, Merten, Gira, Schneider Electric, Legrand, ДКС, Osram, Philips, грщ, светильники, розетки, выключатели, электроснабжение, умный дом, лампы, автоматические выключатели, электромонтаж, кабель, провод, кабель канал");
$APPLICATION->SetPageProperty("keywords", "элевел, эlevel, elevel, elevel.ru, электрооборудование, электроснабжение, электромонтаж, проектирование электроснабжения, производство электрощитов, электротехническое оборудование, электроустановочные изделия, низковольтное оборудование, кабельно-проводниковая продукция, светотехника, электрика, вру, электрощиты, электрощитовая продукция, ABB, Merten, Gira, Schneider Electric, Legrand, ДКС, Osram, Philips, грщ, светильники, розетки, выключатели, электроснабжение, умный дом, лампы, автоматические выключатели, электромонтаж, кабель, провод, кабель канал");
$APPLICATION->SetPageProperty("description", "О компании Элевел");
$APPLICATION->SetTitle("Компания");
?>

<div class="block980a">

<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.forgotpasswd",
	"",
	Array(
		
	),
false
);?>




</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>