<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<section class="section-quote section-content">
	<h2><?=GetMessage('GEOIP_MANAGER_CONTENT_TITLE')?></h2>
	<div class="clearfix">
		<div class="author-block">
			<?if(!empty($arResult['MANAGER'])):
				if(strlen($arResult['MANAGER']['PICTURE']) > 0):?><img alt="<?=$arResult['MANAGER']['NAME']?>" src="<?=$arResult['MANAGER']['PICTURE']?>"><?endif;?><?if(strlen($arResult['MANAGER']['NAME']) > 0):?><strong class="name"><?=$arResult['MANAGER']['NAME']?></strong><?endif;?><?if(strlen($arResult['MANAGER']['POSITION']) > 0):?><span class="position"><?=$arResult['MANAGER']['POSITION']?></span><?endif;
			else:
				$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/director.php", Array(), Array("MODE" => "html"));
			endif;?>
		</div>
		<div class="text-block">
			<?if(!empty($arResult['MANAGER'])):
				echo $arResult['MANAGER']['TEXT'];
			else:
				$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/director-quote.php", Array(), Array("MODE" => "html"));
			endif;?>
			
			<div class="button-right">
				<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
	array(
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
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => $arParams['MANAGER_EMAIL'],
		"FORM_TITLE" => $arParams['FORM_TITLE'], //GetMessage('GEOIP_MANAGER_CONTENT_FORM_TITLE'),
		"PAGE_URL" => "",
		"PAGE_TITLE" => $arParams['PAGE_TITLE'],
		"BUTTON_TITLE" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
			</div>
		</div>
	</div>
</section>


