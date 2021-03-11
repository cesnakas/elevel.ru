<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?  /*
  //echo "<pre>"; print_r($_REQUEST); echo "</pre>";

//$res = new CFormResult;
//$res->Add(htmlspecialchars($_REQUEST['WEB_FORM_ID']), $_REQUEST);
       //CFormResult::Add($arParams["WEB_FORM_ID"], $arResult["arrVALUES"]);
 


//$start = microtime(true);
#.......

 

$mail = htmlspecialchars($_REQUEST['UserMail']);

//$mail = htmlspecialchars("mihail1093@mail.ru");

$arUserFilter = array("email" => $mail);
$rsUsers = CUser::GetList(($by="email"), ($order="desc"), $arUserFilter);
while($arItem = $rsUsers->GetNext())
{
	$arMAil[] = $arItem['EMAIL'];
}

$countArMail = count($arMAil);

if($countArMail == 0)
{
	//echo "Всё хорошо, email свободен";
    echo 1;
}
else
{
	//echo "Такой Email уже существует";
    echo 0;
}  */
CModule::IncludeModule('iblock');

/*
$el = new CIBlockElement;

$PROP = array();
$PROP[12] = "Белый";  
$PROP[3] = 38;        

$arLoadProductArray = array(
	"IBLOCK_SECTION_ID" => 45893,          // элемент лежит в корне раздела
	"IBLOCK_ID"      => 83,
	"NAME"           => "Элемент",
);

if($PRODUCT_ID = $el->Add($arLoadProductArray))
  echo "New ID: ".$PRODUCT_ID;
else
  echo "Error: ".$el->LAST_ERROR;

*/

/*
CModule::IncludeModule('sale');
CModule::IncludeModule('catalog');

$db_props = CSaleOrderPropsValue::GetOrderProps(15979);  
while ($arProps = $db_props->Fetch())
{
  
     echo '$arProps';
     echo "<pre>"; print_r($arProps); echo "</pre>";
 
    
}

// создать заказ
$order_id = CSaleOrder::Add(
            array(
               'LID' => SITE_ID,
               'PERSON_TYPE_ID' => 1,
               'PAYED' => "N",
               'CANCELED' => "N",
               'STATUS_ID' => "N",
               'ALLOW_DELIVERY' => 'N',
               'DATE_ALLOW_DELIVERY' => $date_delivery,
               'DELIVERY_DOC_DATE' => $date_delivery,
               'PRICE' => $sum,
               'CURRENCY' => "RUB",
               'USER_ID' => $userId,
               'PAY_SYSTEM_ID' => 5,
               'DELIVERY_ID' => 1,
               'USER_DESCRIPTION' => 'ЗАКАЗ от SITE.RU',
               'ADDITIONAL_INFO' => 'ЗАКАЗ от SITE.RU',
               )
            ); 
*/



?>
