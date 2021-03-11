<?require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("История заказов");

?>
<div class="cart-page">
<div class="columns-container">
	<aside class="aside-left col col-2 popup-holder">
		<?$APPLICATION->IncludeComponent("bitrix:menu","personal",Array(
				"ROOT_MENU_TYPE" => "PERSONAL", 
				"MAX_LEVEL" => "1", 
				"CHILD_MENU_TYPE" => "PERSONAL", 
				"USE_EXT" => "N",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "Y",
				"MENU_CACHE_TYPE" => "A", 
				"MENU_CACHE_TIME" => "3600000", 
				"MENU_CACHE_USE_GROUPS" => "Y", 
				"MENU_CACHE_GET_VARS" => "" 
			)
		);
		
		?>
	</aside>
	<div class="content col col-10">
		<h2 class="history-heading"><?$APPLICATION->ShowTitle()?></h2>
		
		<?
		
		// $APPLICATION->IncludeComponent("bitrix:sale.personal.order.list", "", array(
			// "PATH_TO_DETAIL" => "",
			// "PATH_TO_COPY" => "",
			// "PATH_TO_CANCEL" => "/personal/profile/orders.php",
			// "PATH_TO_BASKET" => "",
			// "ORDERS_PER_PAGE" => "",
			// "SET_TITLE" => "Y",
			// "SAVE_IN_SESSION" => "N",
			// "NAV_TEMPLATE" => "",
			// "ID" => $arResult["VARIABLES"]["ID"]
			// ),
			// $component
		// );
		
		?>
		<?
		$APPLICATION->IncludeComponent("magnitmedia:order.list", "", array(
				),
				$component
			);
		
?>
	</div>
</div>
</div>


<?
require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>