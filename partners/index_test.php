<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>

							<?$APPLICATION->IncludeComponent("bitrix:menu", "nano-top", 
								Array(
									"ROOT_MENU_TYPE" => "top_menu_ing_nano", 
									"MAX_LEVEL" => "2", 
									"CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU", 
									"USE_EXT" => "N",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => 3600,
									"CACHE_SELECTED_ITEMS" => "N"
								)
							);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>