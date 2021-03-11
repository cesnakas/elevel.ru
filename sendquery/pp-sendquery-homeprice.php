<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оценить стоимость");
?><div id="pp-sendquery-homeprice" class="popup" style="width: 840px; height: 400px;">
<script type="text/javascript" src="/js/home-form.js"></script>
<table class="serv-list" style="float: left; margin-left: 5px;">
	<tr>
		<th>Функция</th>
		<th>Кол-во групп</th>
		<th>Сумма/евро</th>
	</tr>
	<tr>
		<th colspan="3" class="caption">Управление освещением</th>
	</tr>
	<tr>
		<td class="1st"><a title="Подразумевается включение/выключение светильников, вентилятора, бытовых электроприборов подключенных в розетки и т.д. Например, в кухне рекомендуем закладывать минимум три группы релейного включения: центральный свет, подсветка кухонного гарнитура, вытяжной вентилятор.">Релейное включение</a></td>
		<td><input type="text" name="count1" value="0" /></td>
		<td><input type="text" name="summ1" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="Подразумевается включение светильников с возможностью регулирования яркости света или с заданной яркостью. Практично использовать, например, в гостиной для приглушения яркого света при просмотре телепередач.">Плавное включение</a></td>
		<td><input type="text" name="count2" value="0" /></td>
		<td><input type="text" name="summ2" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="Автоматическое включение света при появлении человека. Например, в темное время на лестнице или садовой дорожке.">Датчик движения</a></td>
		<td><input type="text" name="count3" value="0" /></td>
		<td><input type="text" name="summ3" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="Одним нажатием вызвать определенный алгоритм работы различных устройств в доме. Например, сцена ПРОСМОТР КИНО - отключается центральный свет, приглушается настенный свет, закрываются шторы, включается вентиляция">Световые сцены</a></td>
		<td><input type="text" name="count4" value="0" /></td>
		<td><input type="text" name="summ4" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">Управление приводами</th>
	</tr>
	<tr>
		<td class="1st"><a title="Автоматическое открытие/закрытие штор одним нажатием с места или с пульта. Удобное управление защитой от солнца и посторонних глаз.">Управление жалюзи, шторами</a></td>
		<td><input type="text" name="count5" value="0" /></td>
		<td><input type="text" name="summ5" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="Возможно дистанционное управление воротами, например, из машины и централизовано, например, из своего кабинета.">Управление воротами</a></td>
		<td><input type="text" name="count6" value="0" /></td>
		<td><input type="text" name="summ6" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">Климат-Контроль</th>
	</tr>
	<tr>
		<td class="1st"><a title="Возможность выставить индивидуальную температуру в каждой комнате, автоматически переключать режимы отопления, например, ДНЕВНОЕ и НОЧНОЕ, КОМФОРТНОЕ, когда Вы дома и ДЕЖУРНОЕ, когда никого нет.">Управление отоплением</a></td>
		<td><input type="text" name="count7" value="0" /></td>
		<td><input type="text" name="summ7" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="Возможность выставить индивидуальную температуру в каждой комнате, автоматически переключать режимы отопления, например, ДНЕВНОЕ и НОЧНОЕ, КОМФОРТНОЕ, когда Вы дома и ДЕЖУРНОЕ, когда никого нет.">Управление теплыми полами</a></td>
		<td><input type="text" name="count8" value="0" /></td>
		<td><input type="text" name="summ8" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">Аварийная безопасность</th>
	</tr>
	<tr>
		<td class="1st"><a title="При обнаружении протечки воды, автоматически перекрывается клапан горячей и холодной воды, предотвращая тем самым дальнейший материальный ущерб.">Контроль протечек воды</a></td>
		<td><input type="text" name="count9" value="0" /></td>
		<td><input type="text" name="summ9" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="Специальный датчик сразу подаст громкий сигнал, если где-то возник пожар, предупредив тем самым Вас об опасности.">Контроль задымленности</a></td>
		<td><input type="text" name="count10" value="0" /></td>
		<td><input type="text" name="summ10" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">Управление системой «Умный дом»</th>
	</tr>
	<tr>
		<td class="1st"><a title="Возможность управлять различным оборудованием в доме с одного пульта">Универсальный дистанционный пульт</a></td>
		<td><input type="text" name="count11" value="0" /></td>
		<td><input type="text" name="summ11" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="Позволяет централизовано управлять всем оборудование в доме и контролировать энергопотребление в доме.">Настенная сенсорная панель</a></td>
		<td><input type="text" name="count12" value="0" /></td>
		<td><input type="text" name="summ12" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">Удаленное управление</th>
	</tr>
	<tr>
		<td class="1st"><a title="Система может связаться с Вами по телефону и сообщить об аварийной ситуации. Вы также можете включить что-нибудь при подъезде к дому, например, отопление.">По телефону</a></td>
		<td><input type="text" name="count13" value="0" /></td>
		<td><input type="text" name="summ13" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="Вы будете иметь возможность оперативно получать информацию об обстановке в доме и управлять им находясь на работе или в отъезде.">По Интернету</a></td>
		<td><input type="text" name="count14" value="0" /></td>
		<td><input type="text" name="summ14" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th>Итого:</th>
		<th><input type="text" name="countall" value="0" disabled="disabled" readonly="readonly" class="summ" /></th>
		<th><input type="text" name="summall" value="0" disabled="disabled" readonly="readonly" class="summ" /></th>
	</tr>
	<tr>
		<td colspan=3><input type="button" value="Считать" onclick="_formGetFields();"></td>
	</tr>
</table>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
	"SEF_MODE" => "N",	// Включить поддержку ЧПУ
	"WEB_FORM_ID" => "8",	// ID веб-формы
	"LIST_URL" => "/sendquery/sended.php",	// Страница со списком результатов
	"EDIT_URL" => "/sendquery/sended.php",	// Страница редактирования результата
	"SUCCESS_URL" => "/sendquery/sended.php",	// Страница с сообщением об успешной отправке
	"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
	"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
	"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
	"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"VARIABLE_ALIASES" => array(
		"WEB_FORM_ID" => "WEB_FORM_ID",
		"RESULT_ID" => "RESULT_ID",
	)
	)
);?>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>