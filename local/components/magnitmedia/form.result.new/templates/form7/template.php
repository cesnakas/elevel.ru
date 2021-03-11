<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$cntId = "cnt_" . $arResult['FORM_ID'] . rand();
// echo "<pre>"; print_r($arResult); echo "</pre>";

if((intval($_REQUEST['RESULT_ID']) > 0 && $_REQUEST['formresult'] == "addok" && $_REQUEST['WEB_FORM_ID'] == $arResult["arForm"]['ID']) || $arResult["isFormErrors"] == "Y" || $arResult["isFormNote"] == "Y"){
	ob_end_clean();
	$APPLICATION->RestartBuffer();
	
	$arRs = array(
		"formresult" => (intval($_REQUEST['RESULT_ID']) > 0 && $_REQUEST['formresult'] == "addok")?"Y":"N",
		"isFormErrors" => $arResult["isFormErrors"],
		"isFormNote" => $arResult["isFormNote"],
		"FORM_NOTE" => $arResult["FORM_NOTE"],
		"FORM_ERRORS_TEXT" =>  $arResult["FORM_ERRORS_TEXT"],
	);
	
	echo \Bitrix\Main\Web\Json::encode($arRs);
	die();
}


// Sorting questions
$arCalcSort = array(
	"type" => "",
	"type2" => "",
	"voltage" => "",
	"type3" => "",
	"brand" => "",
	"other_brand" => "",
	"vru" => "",
);

$arQuestionSort = array(
	"name",
	"email",
	"phone",
	"city",
	"text",
	"file",
);
$arCalc = array();
$strParams = "";
foreach ($arCalcSort as $field_sid => $var)
{
	if(array_key_exists($field_sid,$arResult["QUESTIONS"])){
		$arCalc[$field_sid] = $arResult["QUESTIONS"][$field_sid];
		$arCalc[$field_sid]['SPAN_ID'] = $cntId . "_" . $field_sid;
		$arCalc[$field_sid]['VAR'] = $var;
		
		$strParams .= ((strlen($strParams)>0)?", ":"") . $arCalc[$field_sid]['CAPTION'] . ": <span id='" . $arCalc[$field_sid]['SPAN_ID'] . "'></span>";
	}
}

$arCalcTable = array();
if(!empty($arCalc['system']['STRUCTURE'])){
	foreach($arCalc['system']['STRUCTURE'] as $arSystem){
		$arCalcTable[$arSystem['ID']] = unserialize($arSystem['FIELD_PARAM']);
	}
}



$arTmp = array();
foreach ($arQuestionSort as $field_sid)
{
	if(array_key_exists($field_sid,$arResult["QUESTIONS"]))
		$arTmp[$field_sid] = $arResult["QUESTIONS"][$field_sid];
}

foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion){
	if(!array_key_exists($FIELD_SID,$arTmp))
		$arTmp[$FIELD_SID] = $arQuestion;
}

$arResult["QUESTIONS"] = $arTmp;
?>
	
<form action="#" id="<?=$cntId?>_calc_form">
	<div class="clearfix">
		<div class="form-tablet-column">
			<?
			$fieldName = 'type';
			if($arCalc[$fieldName]['STRUCTURE']):?>
				<select data-field-name="form_dropdown_<?=$fieldName?>" class="calc_field" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>">
					<option value="<?=$arStructure['ID']?>"><?=$arCalc[$fieldName]['CAPTION']?></option>
					<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
					<option data-calc-value="<?=$arStructure['FIELD_VALUE']?>" value="<?=$arStructure['ID']?>"><?=$arStructure['MESSAGE']?></option>
					<?endforeach;?>
				</select>
			<?endif;?>
			<?
			$fieldName = 'type2';
			if($arCalc[$fieldName]['STRUCTURE']):?>
				<select data-field-name="form_dropdown_<?=$fieldName?>" class="calc_field" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>">
					<option value="<?=$arStructure['ID']?>"><?=$arCalc[$fieldName]['CAPTION']?></option>
					<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
					<option data-structure-value="<?=$arStructure['VALUE']?>" value="<?=$arStructure['ID']?>"><?=$arStructure['MESSAGE']?></option>
					<?endforeach;?>
				</select>
			<?endif;?>
			<?
			$fieldName = 'voltage';
			if($arCalc[$fieldName]['STRUCTURE']):?>
				<div class="input-holder">
					<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
					<input placeholder="<?=$arCalc[$fieldName]['CAPTION']?>"  class="calc_field" data-field-name="form_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>" type="text"/>
					<?endforeach;?>
				</div>
			<?endif;?>
			<?
			$fieldName = 'type3';
			if($arCalc[$fieldName]['STRUCTURE']):?>
				<select data-field-name="form_dropdown_<?=$fieldName?>" class="calc_field" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>">
					<option value="<?=$arStructure['ID']?>"><?=$arCalc[$fieldName]['CAPTION']?></option>
					<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
					<option data-structure-value="<?=$arStructure['VALUE']?>" value="<?=$arStructure['ID']?>"><?=$arStructure['MESSAGE']?></option>
					<?endforeach;?>
				</select>
			<?endif;?>
			<?
			$fieldName = 'brand';
			if($arCalc[$fieldName]['STRUCTURE']):?>
				<select data-field-name="form_dropdown_<?=$fieldName?>" class="calc_field" id="<?=$cntId?>_brand" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>">
					<option value="<?=$arStructure['ID']?>"><?=$arCalc[$fieldName]['CAPTION']?></option>
					<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
					<option data-structure-value="<?=$arStructure['VALUE']?>" value="<?=$arStructure['ID']?>"><?=$arStructure['MESSAGE']?></option>
					<?endforeach;?>
				</select>
			<?endif;?>
		</div>
		<div class="form-tablet-column">
			<?
			$fieldName = 'other_brand';
			if($arCalc[$fieldName]['STRUCTURE']):?>
				<div class="input-holder" style="display:none;" id="<?=$cntId?>_other_brand">
					<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
					<input placeholder="<?=$arCalc[$fieldName]['CAPTION']?>"  class="calc_field" data-field-name="form_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>" type="text"/>
					<?endforeach;?>
				</div>
			<?endif;?>
			<?
			$fieldName = 'vru';
			if($arCalc[$fieldName]['STRUCTURE']):?>
				<select data-field-name="form_dropdown_<?=$fieldName?>" class="calc_field" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>">
					<option value="<?=$arStructure['ID']?>"><?=$arCalc[$fieldName]['CAPTION']?></option>
					<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
					<option data-structure-value="<?=$arStructure['VALUE']?>" value="<?=$arStructure['ID']?>"><?=$arStructure['MESSAGE']?></option>
					<?endforeach;?>
				</select>
			<?endif;?>
			<?
			$fieldName = 'text';
			if($arResult["QUESTIONS"][$fieldName]['STRUCTURE']):
				$arStructure = $arResult["QUESTIONS"][$fieldName]['STRUCTURE'][0];
			?>
			<div class="input-holder">
				<textarea data-field-name="form_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>" placeholder="<?=GetMessage('FORM7_MESSAGE')?>" class="calc_field" cols="30" rows="10"></textarea>
			</div>
			<?endif;?>
		</div>
	</div>
	<div class="clearfix">
		<div class="form-tablet-column">
			<a class="button lightbox-open" <?if (SITE_SERVER_NAME == "elevel.ru"):?>onclick="yaCounter1485305.reachGoal('rasschitat');return true;"<?endif;?> href="#<?=$cntId?>_calculate"><?=($arParams['BUTTON_TITLE'])?$arParams['BUTTON_TITLE']:GetMessage('CALC6_BUTTON_TITLE')?></a>
		</div>
	</div>
	
</form>

<div class="lightbox-holder">
	<div id="<?=$cntId?>_calculate" class="lightbox">
		<div id="<?=$cntId?>" class="feedback_form_container">
			<div class="feedback_form_note"><?=$arResult["FORM_NOTE"]?></div>
			<div class="feedback_form_body">
				<?
				if ($arResult["isFormNote"] != "Y")
				{
				?>
				<h2><?=GetMessage('FORM6_POPUP_TITLE')?></h2>
				<?=$arResult["FORM_HEADER"]?>
					<input type="hidden" name="form_id" value="<?=$arResult['FORM_ID']?>" />
					<?
					$i = 0;
					foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
					{
						if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
						{
							if( $FIELD_SID == 'city' ):					
								$APPLICATION->IncludeComponent(
									"bitrix:sale.location.selector.search", 
									"form", 
									array(
										"COMPONENT_TEMPLATE" => "form",
										"ID" => "",
										"CODE" => "",
										"INPUT_NAME" => "form_".$arQuestion['STRUCTURE'][0]['FIELD_TYPE']."_".$arQuestion['STRUCTURE'][0]['ID'],
										//"INPUT_NAME" => "LOCATION",
										"PROVIDE_LINK_BY" => "id",
										"FILTER_BY_SITE" => "N",
										"SHOW_DEFAULT_LOCATIONS" => "N",
										"CACHE_TYPE" => "A",
										"CACHE_TIME" => "36000000",
										"JS_CONTROL_GLOBAL_ID" => "",
										"JS_CALLBACK" => "",
										"SUPPRESS_ERRORS" => "N",
										"INITIALIZE_BY_GLOBAL_EVENT" => ""
									),
									false
								);
							else:
								echo $arQuestion["HTML_CODE"];
							endif;
						}
						else{
							
							if($FIELD_SID == "manager_email" || $FIELD_SID == "form_title" || $FIELD_SID == "page_title" || $FIELD_SID == "page_url"
								|| $FIELD_SID == "name" || $FIELD_SID == "phone" || $FIELD_SID == "email" || $FIELD_SID == "text" || $FIELD_SID == "file"):
							?>
							<input type="hidden" name="<?=$FIELD_SID?>_field" value="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE'][0]['ID']?>" />
							<?
								if (!in_array($FIELD_SID, array("name", "phone", "email", "text", "file"))):
									continue;
								endif;

			
							elseif(array_key_exists($FIELD_SID, $arCalcSort)):
							// elseif($FIELD_SID == "system" || $FIELD_SID == "object_area"):
							?>
							<input type="hidden" name="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=($arQuestion['STRUCTURE'][0]['FIELD_TYPE']=="dropdown")?$FIELD_SID:$arQuestion['STRUCTURE'][0]['ID']?>" value="" />
							<?
								continue;
							elseif( $FIELD_SID == "no_file" ):
								$no_file = 'form_'.$arQuestion['STRUCTURE'][0]['FIELD_TYPE'].'_'.$arQuestion['STRUCTURE'][0]['ID'];
								?>
								<input type="hidden" name="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE'][0]['ID']?>" value="<?=$arQuestion['CAPTION']?>" />
								<?
									continue;
							endif;	
								
								
							
							if($i == 0):
					?>
					<div class="form-row clearfix">
						<div class="form-column">
					<?
							elseif($i == 3):
					?>
						</div>
						<div class="form-column">
					<?
							elseif($i == 4):
						?>
						</div>
					</div>
					<div class="form-row clearfix">
						<div class="form-column">
						<?
							elseif($i == 5):
					?>
						</div>
						<div class="form-column">
					<?
							endif;

							foreach($arQuestion['STRUCTURE'] as $arStructure):
							
								if($arStructure['FIELD_TYPE'] == "text" || $arStructure['FIELD_TYPE'] == "email"):
						?>
						<div class="input-holder<?=($arQuestion['REQUIRED'] == "Y")?" required":""?>">
							<input name="form_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>" <?=($arQuestion['REQUIRED'] == "Y")?"required":""?> placeholder="<?=$arQuestion['CAPTION']?>" type="text"/>
						</div>
							<?
								elseif($arStructure['FIELD_TYPE'] == "file"):
								?>
						<input class="inputfile" name="form_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>" id="form_<?=$cntId?>_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>_id" type="file"/>
						<label for="form_<?=$cntId?>_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>_id"><?=$arQuestion['CAPTION']?></label>
								<?
								elseif($arStructure['FIELD_TYPE'] == "textarea"):
								?>
						<div class="input-holder<?=($arQuestion['REQUIRED'] == "Y")?" required":""?>">
							<textarea name="form_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>" placeholder="<?=$arQuestion['CAPTION']?>" cols="30" rows="10"></textarea>
						</div>
								<?
								endif;
							endforeach;?>
					<?
						}
						
						$i++;
					}
					?>
						</div>
                        <div class="form-column">
							<div class="feedback_form_errors"><?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?></div>
						
							<button class="button" name="web_form_apply" type="submit" <?if (SITE_SERVER_NAME == "elevel.ru"):?>onclick="yaCounter1485305.reachGoal('otpravitClick1');return true;"<?endif;?>><?=$arResult['arForm']['BUTTON']?></button>
						</div>
					
					</div>
				<?=$arResult["FORM_FOOTER"]?>
				<?
				}
				?>
			</div>
		</div>
	</div>
</div>

<script>

$(function(){
	
	//скрытие надписи Спасибо... после повторного открытия формы
	$('#<?=$cntId?>_calc_form .button.lightbox-open').on('click',function(){
		if( $('#<?=$cntId?>_calculate .feedback_form_note').html() )
		{				
			$('#<?=$cntId?>_calculate .feedback_form_note').hide();
			
			$('#<?=$cntId?>_calculate .popup_title').show();
			$('#<?=$cntId?>_calculate .popup_note').show();
			$('#<?=$cntId?>_calculate .feedback_form_body').show();
		}
	});
	
	$('#<?=$cntId?>_calc_form .calc_field').on('change',function(){
		_field = $('#<?=$cntId?> form [name=' + $(this).data('field-name') + ']');
		if(_field.length > 0){
			_field.val($(this).val());
		}
	});

	$('#<?=$cntId?> form input[type=file]').on('change',function(){

		arF = $(this).val().split("\\");
		id = $(this).attr('id');
		$(this).parent().find('label[for=' + id + ']').html(arF[(arF.length - 1)]);
		
		if( $('#<?=$cntId?> form input[name=<?=$no_file?>]').val() )
			$('#<?=$cntId?> form input[name=<?=$no_file?>]').val(' ');
	});
		
	// brand change
	$('#<?=$cntId?>_brand').on('change',function(){
		_value = $(this).find('option:selected').data('structure-value');
		if(_value == "other")
			$('#<?=$cntId?>_other_brand').show();
		else
			$('#<?=$cntId?>_other_brand').hide().find('input').val('');
	});

	//submit
	$('#<?=$cntId?> form').submit(function(event){
		event.preventDefault();
		
		var $form = $(this),
		$parent = $(this).parents('.feedback_form_container'),
		$button = $parent.find('button.button');
		
		
		var formData = new FormData($form[0]);
		formData.append('web_form_apply', 'Y');
		
		$button.addClass('loading');
		
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			contentType: false,
			processData: false,
			data: formData,
			success: function(data){
				data = JSON.parse(data);
				
				if(data.isFormNote == "Y" || data.formresult == "Y"){
					$('#<?=$cntId?>_calculate .feedback_form_note').html(data.FORM_NOTE).addClass('success').show();
					$('#<?=$cntId?>_calculate .popup_title').hide();
					$('#<?=$cntId?>_calculate .popup_note').hide();
					$('#<?=$cntId?>_calculate .feedback_form_body').hide();
					
					$('#<?=$cntId?> form')[0].reset();
				}
				
				if(data.isFormErrors == "Y"){
					$parent.find('.feedback_form_errors').html(data.FORM_ERRORS_TEXT);
					
				}
				
			},
			complete: function(data){
				$button.removeClass('loading');
			}
		});
		return false;
		
		
	});
});

</script>