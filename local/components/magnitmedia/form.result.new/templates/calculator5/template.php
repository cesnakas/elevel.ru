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
	"object_type" => "x1",
	"work_type" => "x2",
	"object_area" => "y",
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
		
		$strParams .= ((strlen($strParams)>0)?"<br/>":"") . "<strong>- " . $arCalc[$field_sid]['CAPTION'] . "</strong>: <span id='" . $arCalc[$field_sid]['SPAN_ID'] . "'></span>";
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

// echo "<pre>"; print_r($arCalc); echo "</pre>";
?>

<form action="#" id="<?=$cntId?>_calc_form">
	<div class="clearfix">
		<div class="form-tablet-column">
			<?
			$fieldName = 'object_type';
			if($arCalc[$fieldName]['STRUCTURE']):?>
			<select data-field-name="form_dropdown_<?=$fieldName?>" class="calc_field" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>" id="<?=$cntId?>_object_type">
				<option value="<?=$arStructure['ID']?>"><?=$arCalc[$fieldName]['CAPTION']?></option>
				<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
				<option data-calc-param="<?=$arStructure['FIELD_PARAM']?>" data-calc-value="<?=$arStructure['VALUE']?>" value="<?=$arStructure['ID']?>"><?=$arStructure['MESSAGE']?></option>
				<?endforeach;?>
			</select>
			<?endif;?>
			<?
			$fieldName = 'work_type';
			if($arCalc[$fieldName]['STRUCTURE']):?>
			<select data-field-name="form_dropdown_<?=$fieldName?>" disabled class="calc_field" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>" id="<?=$cntId?>_work_type">
				<option value="<?=$arStructure['ID']?>"><?=$arCalc[$fieldName]['CAPTION']?></option>
				<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
				<option data-calc-param="<?=$arStructure['FIELD_PARAM']?>" disabled data-calc-value="<?=$arStructure['VALUE']?>" value="<?=$arStructure['ID']?>"><?=$arStructure['MESSAGE']?></option>
				<?endforeach;?>
			</select>
			<?endif;?>
		</div>
		<div class="form-tablet-column">
			<?
			$fieldName = 'object_area';
			if($arCalc[$fieldName]['STRUCTURE']):?>
			<div class="input-holder">
				<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
				<input placeholder="<?=$arCalc[$fieldName]['CAPTION']?>" class="calc_field" data-field-name="form_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>" type="text"/>
				<?endforeach;?>
			</div>
			<?endif;?>
			<a class="button lightbox-open" <?if (SITE_SERVER_NAME == "elevel.ru"):?>onclick="yaCounter1485305.reachGoal('rasschitat');return true;"<?endif;?> href="#<?=$cntId?>_calculate"><?=($arParams['BUTTON_TITLE'])?$arParams['BUTTON_TITLE']:GetMessage('CALC5_BUTTON_TITLE')?></a>
		</div>
	</div>
</form>

<div class="lightbox-holder">
	<div id="<?=$cntId?>_calculate" class="lightbox calculate">
		<h3 class="popup_title">
			<?=($arParams['POPUP_TITLE'])?$arParams['POPUP_TITLE']:GetMessage('POPUP_TITLE')?>
		</h3>
		
		<div class="price_info">
			<?=GetMessage('CALC_PRICE_INFO', array(
				"#PARAMS#" => $strParams,
				"#PRICE_ID#" => $cntId . "_price",
			))?>
		</div>

		<p><?=GetMessage('CALC5_POPUP_NOTE')?></p>

		<div id="<?=$cntId?>" class="feedback_form_container">
			<div class="feedback_form_note"><?=$arResult["FORM_NOTE"]?></div>
			<div class="feedback_form_body">
				<?
				if ($arResult["isFormNote"] != "Y")
				{
				?>
				<?=$arResult["FORM_HEADER"]?>
					<input type="hidden" name="form_id" value="<?=$arResult['FORM_ID']?>" />
					<?
					$i = 0;
					foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
					{
						
								
						if($i == 0):
						?>
						<div class="form-row clearfix">
							<div class="form-column">
						<?
						elseif($i == 4):
						?>
							</div>
							<div class="form-column">
						<?
						elseif($i == 5):
							?>
							</div>
						</div>
						<div class="form-row clearfix">
							<div class="form-column">
							<?
						elseif($i == 6):
						?>
							</div>
							<div class="form-column">
						<?
						endif;
						
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

							elseif($FIELD_SID == "object_type" || $FIELD_SID == "work_type" || $FIELD_SID == "object_area"):
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
	$('#<?=$cntId?>_calc_form .button.lightbox-open').on('click',function(){
		
		//скрытие надписи Спасибо... после повторного открытия формы
		if( $('#<?=$cntId?>_calculate .feedback_form_note').html() )
		{				
			$('#<?=$cntId?>_calculate .feedback_form_note').hide();
			
			$('#<?=$cntId?>_calculate .popup_title').show();
			$('#<?=$cntId?>_calculate .popup_note').show();
			$('#<?=$cntId?>_calculate .feedback_form_body').show();
		}
		
		// calculate
		
		if(!$('#<?=$cntId?>_calculate .feedback_form_note').hasClass('success')){
			
			_x = 0;
			_x1Val = false;
			_select = $('#<?=$cntId?>_calc_form select[data-calc-var=x1]');
			_selectedOption = _select.find('option:selected');
			if(_selectedOption.length > 0){
				_x = parseInt(_selectedOption.data('calc-param'));
				_x1Val = _selectedOption.html();
			}
			
			_x2Val = false;
			_select = $('#<?=$cntId?>_calc_form select[data-calc-var=x2]');
			_selectedOption = _select.find('option:selected');
			if(_selectedOption.length > 0){
				_x2Val = _selectedOption.html();
			}
			
			_y = parseInt($('#<?=$cntId?>_calc_form input[data-calc-var=y]').val());
			
			_res = parseInt(_x * _y);
			
			if(_res == 0 || isNaN(_res))
			{
				$('#<?=$cntId?>_calculate .popup_title').hide();
				$('#<?=$cntId?>_calculate .price_info').hide();
			}
			else{
				
				$('#<?=$cntId?>_calculate .popup_title').show();
				$('#<?=$cntId?>_calculate .price_info').show();
				
				<?foreach ($arCalc as $arS)
				{
				?>
				$('#<?=$arS['SPAN_ID']?>').html(_<?=$arS['VAR']?><?=($arS['STRUCTURE'][0]['FIELD_TYPE']=="dropdown")?"Val":""?>);
				<?
				}
				?>

				
				// if (typeof window[number_format] == 'function')
					// _res = number_format(_res, 0, '.', ' ');
					
				$('#<?=$cntId?>_price').html(_res.toLocaleString('ru'));
				$('#<?=$cntId?> form input.cost').val( thousandSeparator(_res) );
				
			}
		}
		
	});
		
	$('#<?=$cntId?>_calc_form .calc_field').on('change',function(){
		_field = $('#<?=$cntId?> form input[name=' + $(this).data('field-name') + ']');
		if(_field.length > 0){
			_field.val($(this).val());
		}
	});
	
	// check work type
	$('#<?=$cntId?>_object_type').on('change',function(){
		_val = $(this).find('option:selected').data('calc-value');
		
		$('#<?=$cntId?>_work_type option:selected').removeAttr('selected');
		
		_selectEnable = false;
		$('#<?=$cntId?>_work_type option').each(function(indx, element){

			if(typeof ($(element).data('calc-param')) != 'undefined'){
				_calcValue = $(element).data('calc-param');
				_arCalcValue = _calcValue.split(',');
				
				_optionEnable = false;
				for (var i = 0; i < _arCalcValue.length; i++) {
					
					if(_val == $.trim(_arCalcValue[i])){	
						_optionEnable = true;
						_selectEnable = true;
					}
				}
				
				if(_optionEnable)
					$(element).removeAttr('disabled');
				else
					$(element).attr('disabled','disabled');
			}
		});
		
		if(_selectEnable){
			
			$('#<?=$cntId?>_work_type').removeAttr('disabled');
		}
		else{
			
			$('#<?=$cntId?>_work_type').attr('disabled','disabled');
		}
		
		$('#<?=$cntId?>_work_type').selectric('refresh');
	});

	$('#<?=$cntId?> form input[type=file]').on('change',function(){

		arF = $(this).val().split("\\");
		id = $(this).attr('id');
		$(this).parent().find('label[for=' + id + ']').html(arF[(arF.length - 1)]);
		
		if( $('#<?=$cntId?> form input[name=<?=$no_file?>]').val() )
			$('#<?=$cntId?> form input[name=<?=$no_file?>]').val(' ');
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