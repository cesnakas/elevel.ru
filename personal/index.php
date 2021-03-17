<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>

<div class="cart-page">
<div class="columns-container">
	<aside class="aside-left col col-2 popup-holder">
		<?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "personal",Array(
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
		);?>
		
	</aside>
	<div class="content col col-10">
		<h2 class="headline-border">Редактирование профиля</h2>
		<?$APPLICATION->IncludeComponent(
			"magnitmedia:main.profile", 
			"", 
			array(
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"SET_TITLE" => "N",
				"USER_PROPERTY" => array(
					"UF_USER_TYPE",
					"UF_INN",
					"UF_KPP",
					"UF_LEGAL_ADDRESS",
					"UF_ACTUAL_ADDRESS",
					"UF_MAILING_ADDRESS",
					"UF_CHECKING_ACCOUNT",
					"UF_BANK_NAME",
					"UF_BIK",
					"UF_CADASTRE_ACCOUNT",
					"UF_DISPATCH",
				),
				"SEND_INFO" => "N",
				"CHECK_RIGHTS" => "N",
				"USER_PROPERTY_NAME" => "",
				"AJAX_OPTION_ADDITIONAL" => "",
				"COMPONENT_TEMPLATE" => ""
			),
			false
		);?>
	</div>
</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>