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
	"room_type" => "x",
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
		<?
		$fieldName = 'room_type';
		if($arCalc[$fieldName]['STRUCTURE']):?>
		<div class="form-tablet-column">
			<select data-field-name="form_dropdown_<?=$fieldName?>" class="calc_field" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>">
				<option value="<?=$arStructure['ID']?>"><?=$arCalc[$fieldName]['CAPTION']?></option>
				<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
				<option data-calc-val="<?=$arStructure['FIELD_PARAM']?>" value="<?=$arStructure['ID']?>"><?=$arStructure['MESSAGE']?></option>
				<?endforeach;?>
			</select>
		</div>
		<?endif;?>
		<?
		$fieldName = 'object_area';
		if($arCalc[$fieldName]['STRUCTURE']):?>
		<div class="form-tablet-column">
			<div class="input-holder">
				<?foreach($arCalc[$fieldName]['STRUCTURE'] as $arStructure):?>
				<input placeholder="<?=$arCalc[$fieldName]['CAPTION']?>" class="calc_field" data-field-name="form_<?=$arStructure['FIELD_TYPE']?>_<?=$arStructure['ID']?>" data-calc-var="<?=$arCalc[$fieldName]['VAR']?>" type="text"/>
				<?endforeach;?>
			</div>
		</div>
		<?endif;?>
	</div>
	<a class="button lightbox-open" <?if (SITE_SERVER_NAME == "elevel.ru"):?>onclick="yaCounter1485305.reachGoal('rasschitat');return true;"<?endif;?> href="#<?=$cntId?>_calculate"><?=($arParams['BUTTON_TITLE'])?$arParams['BUTTON_TITLE']:GetMessage('CALC3_BUTTON_TITLE')?></a>
</form>

<div class="lightbox-holder">
	<div id="<?=$cntId?>_calculate" class="lightbox calculate">
		<h3 class="popup_title">
			<?=($arParams['POPUP_TITLE'])?$arParams['POPUP_TITLE']:GetMessage('POPUP_TITLE')?>
		</h3>
		
		<div class="price_info">
			<?=GetMessage('CALC3_PRICE_INFO', array(
				"#PARAMS#" => $strParams,
				"#PRICE_ID#" => $cntId . "_price",
			))?>
		</div>
			
		<p><?=GetMessage('CALC3_POPUP_NOTE')?></p>

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

							elseif($FIELD_SID == "room_type" || $FIELD_SID == "object_area"):
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
						
							<button class="button" name="web_form_apply" <?if (SITE_SERVER_NAME == "elevel.ru"):?>onclick="yaCounter1485305.reachGoal('otpravitClick1');return true;"<?endif;?> type="submit"><?=$arResult['arForm']['BUTTON']?></button>
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
			_xVal = false;
			_select = $('#<?=$cntId?>_calc_form select[data-calc-var=x]');
			_selectedOption = _select.find('option:selected');
			if(_selectedOption.length > 0){
				_x = parseInt(_selectedOption.data('calc-val'));
				_xVal = _selectedOption.html();
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
					$('#<?=$cntId?>_calculate .price_info').hide();
					$('#<?=$cntId?>_calculate p').hide();
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