<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
use Bitrix\Sale;

$productID = intval(htmlspecialchars($_REQUEST["productID"]));
$quantity = intval(htmlspecialchars($_REQUEST["quantity"]));

\Bitrix\Main\Loader::includeModule('sale');
\Bitrix\Main\Loader::includeModule('catalog');
/*if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog"))
{*/
$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
$price = $basket->getPrice(); // Сумма с учетом скидок
$basketItems = $basket->getBasketItems(); // массив объектов Sale\BasketItem
		
echo json_encode(array(
	"count" => count($basketItems),
	"summ" => $price
));
