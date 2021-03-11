<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "office_feedback" && intval($_POST['elem_id']) > 0){
	
	ob_end_clean();
	$APPLICATION->RestartBuffer();
	
	foreach($arResult['DEPARTMENTS'] as $arCity){
		foreach($arCity as $arDep){
			
			if($arDep['ID'] == $_POST['elem_id']){
				$APPLICATION->IncludeComponent(
					"magnitmedia:form.result.new", 
					"office_feedback", 
					array(
						"ELEM_ID" => $_POST['elem_id'],
						"CACHE_TIME" => "3600",
						"CACHE_TYPE" => "A",
						"CHAIN_ITEM_LINK" => "",
						"CHAIN_ITEM_TEXT" => "",
						"EDIT_URL" => "",
						"IGNORE_CUSTOM_TEMPLATE" => "N",
						"LIST_URL" => "",
						"SEF_MODE" => "N",
						"SUCCESS_URL" => "",
						"USE_EXTENDED_ERRORS" => "N",
						"WEB_FORM_ID" => "102",
						"COMPONENT_TEMPLATE" => ".default",
						"MANAGER_EMAIL" => $arDep['EMAIL'],
						"FORM_TITLE" => GetMessage('FEEDBACK_FORM') . " '" . $arDep['NAME'] . "'",
						"PAGE_TITLE" => GetMessage('FEEDBACK_FORM_CONTACTS'),
						'POPUP_TITLE' => GetMessage('FEEDBACK_POPUP_TITLE'),
						"PAGE_URL" => "",
						"VARIABLE_ALIASES" => array(
							"WEB_FORM_ID" => "WEB_FORM_ID",
							"RESULT_ID" => "RESULT_ID",
						)
					),
					false
				);
			}
		}
	}
	
	die();
}

?>