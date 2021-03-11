<?use \Bitrix\Main\Data\Cache;

						$APPLICATION->IncludeComponent(
							"magnitmedia:footer.content", 
							".default", 
							array(
								"SHOW_CONTENT" => "Y",
								"CACHE_TIME" => "86400",
								"COMPONENT_TEMPLATE" => ".default",
								"IBLOCK_TYPE" => "vecancy",
								"IBLOCK_ID" => "128",
								"CACHE_TYPE" => "A"
							),
							false
						);?>
					</div>
				</div>
			</div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-top">
            <div class="row">
                <div class="left-block">
                    Единый номер:
					<strong>
						<?$APPLICATION->IncludeComponent('bxmaker:geoip.message', 'header_phone', array('TYPE' => 'PHONE_HEADER_CORP'), $component);?>
						<?/*$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
						   "AREA_FILE_SHOW" => "file",
						   "PATH" => SITE_TEMPLATE_PATH . "/include/phone.php",
						   "EDIT_TEMPLATE" => ""
						   ),
						   false
						);*/?>
					</strong>
                    <br/>© Эlevel. Все права защищены.
                </div>
                <div class="right-block">
                    <span class="title">Эlevel - член ассоциаций</span>
                    <ul class="icons">
                        <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
						   "AREA_FILE_SHOW" => "file",
						   "PATH" => SITE_TEMPLATE_PATH . "/include/associations.php",
						   "EDIT_TEMPLATE" => ""
						   ),
						   false
						);?>
                    </ul>
					<p class="magnitmedia_logo_mobile desktop-hidden">
						<a href="http://magnitmedia.ru" target="_blank">
							<img src="/local/templates/shop/images/magnitmedia.png" title="Magnitmedia"> Magnitmedia
						</a>
					</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <ul class="social">
					<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
					   "AREA_FILE_SHOW" => "file",
					   "PATH" => SITE_TEMPLATE_PATH . "/include/social_nets.php",
					   "EDIT_TEMPLATE" => ""
					   ),
					   false
					);?>
                </ul>
				<p class="magnitmedia_logo">
					<a href="http://magnitmedia.ru" target="_blank">
						<img src="/local/templates/shop/images/magnitmedia.png" title="Magnitmedia"> Magnitmedia
					</a>
				</p>
                <div class="text-block">
					<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
					   "AREA_FILE_SHOW" => "file",
					   "PATH" => SITE_TEMPLATE_PATH . "/include/social_phone.php",
					   "EDIT_TEMPLATE" => ""
					   ),
					   false
					);?>
					<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
					   "AREA_FILE_SHOW" => "file",
					   "PATH" => SITE_TEMPLATE_PATH . "/include/social_email.php",
					   "EDIT_TEMPLATE" => ""
					   ),
					   false
					);?>
                    <ul class="buttons">
                        <li><a class="button" href="/shop/">Интернет-магазин</a></li>
                        <li><a class="button lightbox-open form-open" href="#order-call">Обратная связь</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="lightbox-holder">
        <div id="order-call" class="lightbox">
            <h2>Заказать обратный звонок</h2>
            <?$APPLICATION->IncludeComponent("magnitmedia:form.result.new", "callwant", Array(
				"CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
					"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
					"EDIT_URL" => "",	// Страница редактирования результата
					"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
					"LIST_URL" => "",	// Страница со списком результатов
					"SEF_MODE" => "N",	// Включить поддержку ЧПУ
					"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
					"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
					"MANAGER_EMAIL" => "s.terteryan@elevel.ru",
					"FORM_TITLE" => "Форма Обратный звонок",
					"VARIABLE_ALIASES" => array(
						"RESULT_ID" => "RESULT_ID",
						"WEB_FORM_ID" => "WEB_FORM_ID",
					),
					"WEB_FORM_ID" => "92",	// ID веб-формы
				),
				false
			);?>
        </div>
        <div id="request" class="lightbox">
			<?
			/* Получаем в зависимости от текущего местоположения email для отправки запроса */
			$oManager = \Bxmaker\GeoIP\Manager::getInstance();
			$location_id = $oManager->getLocation();
			
			$cache = Cache::createInstance(); // получаем экземпляр класса
			if ($cache->initCache(7200, "CORPORATIV_SEND_REQUEST_" . $location_id)) // проверяем кеш и задаём настройки
			{
				$vars = $cache->getVars(); // достаем переменные из кеша
				$SEND_REQUEST_EMAIL = $vars['SEND_REQUEST_EMAIL'];
			}
			elseif ($cache->startDataCache())
			{
				$arLocationGroupId = array();
				if(CModule::IncludeModule('sale'))
				{
					$dbGroup = \CSaleLocationGroup::GetLocationList(array("LOCATION_ID" => $location_id));
					while ($arGroup = $dbGroup->Fetch()) {
						$arLocationGroupId = $arGroup['LOCATION_GROUP_ID'];
					}
				}

				$arFilterOr = array(
					'LOGIC' => 'OR', // по умолчанию элементы склеиваются через AND
					'=CITY' => $oManager->getCity(),
					'=DEF'  => true
				);
				if(count($arLocationGroupId))
				{
					$arFilterOr['=GROUP'] = $arLocationGroupId;
				}
				
				$arEmail = array();

				$oMessage = new \Bxmaker\GeoIP\MessageTable();
				$dbr      = $oMessage->getList(array(
					'filter' => array(
						'TYPE.TYPE'    => "SEND_REQUEST_EMAIL",
						'TYPE.SITE_ID' => SITE_ID,
						$arFilterOr
					)
				));
				while ($ar = $dbr->fetch()) {

					if ($ar['DEF']) {
						$arEmail['DEFAULT'] = $ar;
					}
					else {
						$arEmail['CURRENT'] = $ar;
					}
				}

				if (empty($arEmail['CURRENT'])) {
					$arEmail['CURRENT'] = $arEmail['DEFAULT'];
				}
				
				$SEND_REQUEST_EMAIL = $arEmail['CURRENT']['MESSAGE'];
				
				$cache->endDataCache(array("SEND_REQUEST_EMAIL" => $SEND_REQUEST_EMAIL)); // записываем в кеш
			}
			/* ----------------------- */
			?>
		
            <h2>Пожалуйста, заполните форму</h2>
             <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	".default", 
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
		"WEB_FORM_ID" => "120",
		"COMPONENT_TEMPLATE" => ".default",
		"MANAGER_EMAIL" => $SEND_REQUEST_EMAIL,
		"FORM_TITLE" => "Форма обратной связи Отправить запрос",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
        </div>
        <div id="video" class="lightbox">
            <h2>Фильм о компании</h2>
            <div class="main-video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/NHqVXz3jNOI" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </div>
	
	

	<!-- vk736746
	<script type="text/javascript">
		var digiScript = document.createElement('script');
		digiScript.src = '//cdn.diginetica.net/540/client.js?ts=' + Date.now();
		digiScript.defer = true;
		digiScript.async = true;
		document.body.appendChild(digiScript);
	</script>
	-->
</body>
</html>