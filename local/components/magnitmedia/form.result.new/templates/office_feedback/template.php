<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$cntId = "cnt_" . $arResult['FORM_ID'] . rand();


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
$arQuestionSort = array(
	"name",
	"phone",
	"email",
	"city",
	"file",
	"text",
);
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
// echo "<pre>"; print_r($arParams); echo "</pre>";
?>
<h2><?=($arParams['POPUP_TITLE'])?$arParams['POPUP_TITLE']:GetMessage('POPUP_TITLE')?></h2>
<div id="<?=$cntId?>" class="feedback_form_container">
	<div class="feedback_form_note"><?=$arResult["FORM_NOTE"]?></div>
	<div class="feedback_form_body">
		<?
		if ($arResult["isFormNote"] != "Y")
		{
		?>
		<?=$arResult["FORM_HEADER"]?>
		<input type="hidden" name="form_id" value="<?=$arResult['FORM_ID']?>" />	
		<div class="form-row">
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

					elseif( $FIELD_SID == "no_file" ):
						$no_file = 'form_'.$arQuestion['STRUCTURE'][0]['FIELD_TYPE'].'_'.$arQuestion['STRUCTURE'][0]['ID'];
						?>
						<input type="hidden" name="form_<?=$arQuestion['STRUCTURE'][0]['FIELD_TYPE']?>_<?=$arQuestion['STRUCTURE'][0]['ID']?>" value="<?=$arQuestion['CAPTION']?>" />
						<?
							continue;
					endif;	
						
						
					
					if($i == 0):
			?>
			<div class="form-column">
			<?
					elseif($i == 4):
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

<script>

function officeFeedbackInit(){
	
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
		formData.append('action', 'office_feedback');
		formData.append('elem_id', '<?=$arParams['ELEM_ID']?>');
		// _data = $form.serialize();
		// _data += "&web_form_apply=Y";
		
		// $form.find('input[type=file]').each(function(indx, element){
			// _data.append('img', element.prop('files')[0]);
		// });
		
		$button.addClass('loading');
		
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			// url: 'ak.php',
			// async: false,
			// cache: false,
			contentType: false,
			processData: false,
			data: formData,
			// data: _data,
			// contentType: 'application/x-www-form-urlencoded; charset=utf-8',
			// data: encodeURI(_data),
			success: function(data){
				data = JSON.parse(data);
				
				if(data.isFormNote == "Y" || data.formresult == "Y"){
					$parent.find('.feedback_form_note').html(data.FORM_NOTE).show();
					$parent.find('.feedback_form_body').hide();
					$parent.parents('.lightbox').find("h2").hide();
					
					$form[0].reset();
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
// });
}

</script>