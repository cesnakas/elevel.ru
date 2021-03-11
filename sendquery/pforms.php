<div id="pp-sendquery" class="popup" style="display: none; width: 440px; height: 400px;">
<form id="sendquery" action="/sendquery/" method="post" enctype="multipart/form-data">
<input type="button" class="close" value="X" onclick="toggleDisplay('pp-sendquery');" />
<h2>Запрос</h2>
<div class="all">
	<div class="left">
		<label for="name">Имя<span>*</span></label> <input name="form_text_6" id="name" value="<?=htmlspecialcharsEx($_REQUEST['form_text_6']);?>" /><br />
		<label for="phone">Телефон<span>*</span></label> <input name="form_text_7" id="phone" value="<?=htmlspecialcharsEx($_REQUEST['form_text_7']);?>" /><br />
	</div>
	<label for="email">E-mail<span>*</span></label> <input name="form_email_8" id="email" value="<?=htmlspecialcharsEx($_REQUEST['form_email_8']);?>" /><br />
	<label for="organization">Организация</label> <input name="form_text_9" id="organization" value="<?=htmlspecialcharsEx($_REQUEST['form_text_9']);?>" /><br />
</div>
<br />
<label for="sendtext">Текст<span>*</span></label>
<table style="width: 100%; padding: 0px; border: 0px; margin: 0px;"><tr>
<td style="padding: 0px;">
	<img src="/i/wf_q.gif" alt="Вопрос" style="vertical-align: middle;" /> <input type="radio" checked="checked" id="rs_id_93" name="form_radio_SIMPLE_QUESTION_665" value="93" /> <label for="rs_id_93">Вопрос</label>
</td><td style="padding: 0px;">
	<img src="/i/wf_z.gif" alt="Замечание" style="vertical-align: middle;" /> <input type="radio" id="rs_id_94" name="form_radio_SIMPLE_QUESTION_665" value="94" /> <label for="rs_id_94">Замечание</label>
</td><td style="padding: 0px;">
	<img src="/i/wf_i.gif" alt="Информация" style="vertical-align: middle;" /> <input type="radio" id="checked 95" name="form_radio_SIMPLE_QUESTION_665" value="95" /> <label for="rs_id_95">Информация</label>
</td>
</tr></table>
<textarea name="form_textarea_18" id="sendtext"><?=htmlspecialcharsEx($_REQUEST['form_textarea_18']);?></textarea><br />
<span>*</span> - поля, обязательные к заполнению<br />
<div style="text-align: center;">
	<input type="submit" name="web_form_submit" id="send" value="Отправить" />
</div>
<input type="hidden" name="WEB_FORM_ID" value="1" />
<input type="hidden" name="web_form_apply" value="Y" />
<input type="hidden" name="sessid" id="rssessid" value="" />
</form>
<div style="display: none;">
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
		"SEF_MODE" => "N", 
		"WEB_FORM_ID" => "1", 
		"LIST_URL" => "/sendquery/sended.php",
		"EDIT_URL" => "/sendquery/sended.php",
		"SUCCESS_URL" => "/sendquery/sended.php", 
		"CHAIN_ITEM_TEXT" => "", 
		"CHAIN_ITEM_LINK" => "", 
		"IGNORE_CUSTOM_TEMPLATE" => "N", 
		"USE_EXTENDED_ERRORS" => "N", 
		"CACHE_TYPE" => "A", 
		"CACHE_TIME" => "3600", 
		"VARIABLE_ALIASES" => Array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID"
		)
	)
);?>
<script type="text/javascript">
document.getElementById('rssessid').value=document.getElementById('sessid').value;
</script>
</div>
</div>

<div id="pp-sendprice" class="popup" style="display: none; width: 440px; height: 400px;">
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
		"SEF_MODE" => "N", 
		"WEB_FORM_ID" => "2", 
		"LIST_URL" => "/sendquery/sended.php", 
		"EDIT_URL" => "/sendquery/sended.php", 
		"SUCCESS_URL" => "/sendquery/sended.php", 
		"CHAIN_ITEM_TEXT" => "", 
		"CHAIN_ITEM_LINK" => "", 
		"IGNORE_CUSTOM_TEMPLATE" => "N", 
		"USE_EXTENDED_ERRORS" => "N", 
		"CACHE_TYPE" => "A", 
		"CACHE_TIME" => "3600", 
		"VARIABLE_ALIASES" => Array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID"
		)
	)
);?>
</div>
