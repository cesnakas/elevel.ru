<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Запрос цены");

?>
<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.limit.js"></script>

<div id="pp-sendprice" class="popup" style="width: 440px; height: 400px;">
<?$APPLICATION->IncludeComponent("bitrix:form.result.new", ".default", array(
	"WEB_FORM_ID" => "21",
	"IGNORE_CUSTOM_TEMPLATE" => "N",
	"USE_EXTENDED_ERRORS" => "N",
	"SEF_MODE" => "N",
	"SEF_FOLDER" => "/sendquery/",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"LIST_URL" => "/sendquery/sended.php",
	"EDIT_URL" => "/sendquery/sended.php",
	"SUCCESS_URL" => "/sendquery/sended.php",
	"CHAIN_ITEM_TEXT" => "",
	"CHAIN_ITEM_LINK" => "",
	"VARIABLE_ALIASES" => array(
		"WEB_FORM_ID" => "WEB_FORM_ID",
		"RESULT_ID" => "RESULT_ID",
	)
	),
	false
);?>
</div>
<script type="text/javascript">
var eSendDestination = new Array();
eSendDestination[276] = "s.terteryan@elevel.ru, t.tatulova@elevel.ru, m.emelina@elevel.ru, a.bork@elevel.ru, n.asenova@elevel.ru, morozovawork@mail.ru"; // Москва
eSendDestination[303] = "s.terteryan@elevel.ru, t.tatulova@elevel.ru, m.emelina@elevel.ru, a.bork@elevel.ru, n.asenova@elevel.ru, morozovawork@mail.ru"; // Москва Рыбалко
eSendDestination[277] = "s.terteryan@elevel.ru, t.tatulova@elevel.ru, e.belshchikova@elevel.ru, n.kudrik@elevel-spb.ru, i.ghukova@elevel-spb.ru"; // Санкт-Петербург
eSendDestination[278] = "s.terteryan@elevel.ru, t.tatulova@elevel.ru, e.belshchikova@elevel.ru, a.samakaev@elevel-ekt.ru, o.eresina@elevel-ekt.ru"; // Екатеринбург
eSendDestination[279] = "s.terteryan@elevel.ru, t.tatulova@elevel.ru, e.belshchikova@elevel.ru, a.bugakov@elevel-nsk.ru"; // Новосибирск
eSendDestination[280] = "s.terteryan@elevel.ru, t.tatulova@elevel.ru, e.belshchikova@elevel.ru, g.khristich@elevel-rst.ru, v.bondarenko@elevel-rst.ru, n.yatsenko@elevel-rst.ru"; // Ростов-на-Дону
eSendDestination[288] = "s.terteryan@elevel.ru, t.tatulova@elevel.ru, e.belshchikova@elevel.ru, a.kezin@elevel-orn.ru"; // Оренбург
eSendDestination[466] = "s.terteryan@elevel.ru, n.asenova@elevel.ru, morozovawork@mail.ru"; // МО - Пушкино
eSendDestination[467] = "s.terteryan@elevel.ru, n.asenova@elevel.ru, morozovawork@mail.ru"; // МО - Щёлково
function _onOtdechange()
{
	var x = document.getElementById('form_dropdown_uoffice');
	var y = document.getElementsByName('form_text_281')[0];
	y.value = eSendDestination[x.value];
}

_onOtdechange();

//document.getElementById('form_dropdown_uoffice').addEventListener("change", _onOtdechange, false);
$('#form_dropdown_uoffice').change(function() {
	_onOtdechange();
});
</script>
<script type="text/javascript">			
$(document).ready(function(){				
$('textarea').limit('250','#charsLeft');			
});		
</script> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>