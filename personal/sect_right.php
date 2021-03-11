
<div class="orangenl">Внутренний курс
  <br />
<?$APPLICATION->IncludeComponent(
	"bitrix:currency.rates",
	".default",
	Array(
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => 86400,
		"arrCURRENCY_FROM" => array(0=>"EUR",1=>"USD",),
		"CURRENCY_BASE" => "RUB",
		"RATE_DAY" => "",
		"SHOW_CB" => "N"
	)
);?> </div>
<div class="sp10"></div>