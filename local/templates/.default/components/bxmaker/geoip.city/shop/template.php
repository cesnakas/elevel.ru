<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	use Bitrix\Main\Localization\Loc as Loc;

	$this->setFrameMode(true);

	$randString = $this->randString();

	$COMPONENT_NAME = 'BXMAKER.GEOIP.CITY';

	$oManager = \Bxmaker\GeoIP\Manager::getInstance();

	$city2region = array(
		"Абакан" => "Республика Хакасия",
		"Анадырь" => "Чукотский АО",
		"Архангельск" => "Архангельская область",
		"Астрахань" => "Астраханская область",
		"Барнаул" => "Алтайский край",
		"Белгород" => "Белгородская область",
		"Биробиджан" => "Еврейская АО",
		"Благовещенск" => "Амурская область",
		"Брянск" => "Брянская область",
		"Владивосток" => "Приморский край",
		"Владикавказ" => "Северная Осетия — Алания",
		"Владимир" => "Владимирская область",
		"Волгоград" => "Волгоградская область",
		"Вологда" => "Вологодская область",
		"Воронеж" => "Воронежская область",
		"Горно-Алтайск" => "Республика Алтай",
		"Грозный" => "Чеченская Республика",
		"Екатеринбург" => "Свердловская область",
		"Иваново" => "Ивановская область",
		"Ижевск" => "Удмуртская Республика",
		"Иркутск" => "Иркутская область",
		"Йошкар-Ола" => "Республика Марий Эл",
		"Казань" => "Республика Татарстан",
		"Калининград" => "Калининградская область",
		"Калуга" => "Калужская область",
		"Кемерово" => "Кемеровская область",
		"Киров" => "Кировская область",
		"Кострома" => "Костромская область",
		"Краснодар" => "Краснодарский край",
		"Красноярск" => "Красноярский край",
		"Курган" => "Курганская область",
		"Курск" => "Курская область",
		"Кызыл" => "Республика Тыва",
		"Липецк" => "Липецкая область",
		"Москва" => "Московская область",
	);
	
	$regions = array();
	foreach($city2region as $city => $region)
	{
		$regions[] = $region;
	}
	
	if (!function_exists('regions_compare'))
	{
		function regions_compare($a, $b) {
			if ($a == "Московская область") return -1;
			elseif ($b == "Московская область") return 1;
			else return ($a < $b) ? -1 : 1;
		}
	}
	
	uasort($regions, "regions_compare");
?>

<div class="popup bxmaker__geoip__city bxmaker__geoip__city--default js-bxmaker__geoip__city" id="bxmaker__geoip__city-id<?= $randString; ?>"
     data-debug="<?= $arResult['DEBUG']; ?>"
     data-subdomain-on="<?= $arParams['SUBDOMAIN_ON']; ?>"
     data-base-domain="<?= $arParams['BASE_DOMAIN']; ?>"
     data-sub-domain="<?= $arParams['SUB_DOMAIN']; ?>"
     data-cookie-prefix="<?= $arParams['COOKIE_PREFIX']; ?>"
     data-reload="<?= $arParams['RELOAD_PAGE']; ?>"
     data-search-show="<?= $arParams['SEARCH_SHOW']; ?>"
     data-favorite-show="<?= $arParams['FAVORITE_SHOW']; ?>"
     data-use-yandex="<?= $arResult['USE_YANDEX']; ?>"
     data-use-yandex-search="<?= $arResult['USE_YANDEX_SEARCH']; ?>"
     data-yandex-search-skip-words="<?= $oManager->getPreparedForHtmlAttr($arResult['YANDEX_SEARCH_SKIP_WORDS']); ?>"
     data-msg-empty-result="<?= $oManager->getPreparedForHtmlAttr($arParams['MSG_EMPTY_RESULT']); ?>"
     data-key="<?= $randString; ?>">
	 
	<div class="popup-inner js-bxmaker__geoip__popup">
		<div class="block-regions">
			<strong class="title">РЕГИОНЫ</strong>
			<ul>
				<?foreach($regions as $region):?>
					<li><a title="<?=$region?>" data-region="<?=$region?>" href=""><?=$region?></a></li>
				<?endforeach;?>
			</ul>
		</div>
		
		<div class="block-cities">
			<div class="heading clearfix">
				<strong class="title">ГОРОДА</strong>
				<form class="form-city" action="#">
					<fieldset>
						<div class="input-holder city">
							<input placeholder="Введите название города" type="text" name="city" value="" autocomplete="off" />
							
							<div class="bxmaker__geoip__popup-search-options js-bxmaker__geoip__popup-search-options"></div>
							
							<?/*<div class="bxmaker__geoip__popup-search">
								<input type="text" name="city" value="" placeholder="<?= $arParams['INPUT_LABEL']; ?>" autocomplete="off">
								<span class="bxmaker__geoip__popup-search-clean js-bxmaker__geoip__popup-search-clean">&times;</span>
								<div class="bxmaker__geoip__popup-search-options js-bxmaker__geoip__popup-search-options"></div>
							</div>*/?>
						</div>
					</fieldset>
				</form>
			</div>
			<ul class="list-cities">
				<? $count_show_items = 35; ?>
				<?foreach ($arResult['LETTERS'] as $letter => $arItems):?>
					<? $show_more = false; ?>
					<li>
						<strong class="letter text-orange"><?=$letter?></strong>
						<ul>
							<?foreach ($arItems as $i => $arItem):?>

								<?if ($i == 3):?>
									<?$show_more = true;?>
									<a class="show_more_link text-orange" href="javascript:void(0);">Показать еще</a>
									
									<div class="show_more hide">
								<?endif;?>
								
								<li>
									<a class="close-link js-bxmaker__geoip__popup-option" title="<?=$arItem['NAME']?>" data-region="<?=$city2region[$arItem['NAME']]?>" data-id="<?=$arItem['ID']?>" href="">
										<?=$arItem['NAME']?>
									</a>
								</li>
					
								
								<?$count_show_items--;
								if ($count_show_items == 0):?>
											<?if ($show_more):?>
												</div>
											<?endif;?>
										</ul>
									</li>
									<?break 2;?>
								<?endif;?>
							<?endforeach;?>
							
							<?if ($show_more):?>
								</div>
							<?endif;?>
						</ul>
					</li>
				<?endforeach;?>
			</ul>
		</div>
	</div>
</div>

<?/*
<div class="bxmaker__geoip__city bxmaker__geoip__city--default js-bxmaker__geoip__city" id="bxmaker__geoip__city-id<?= $randString; ?>"
     data-debug="<?= $arResult['DEBUG']; ?>"
     data-subdomain-on="<?= $arParams['SUBDOMAIN_ON']; ?>"
     data-base-domain="<?= $arParams['BASE_DOMAIN']; ?>"
     data-sub-domain="<?= $arParams['SUB_DOMAIN']; ?>"
     data-cookie-prefix="<?= $arParams['COOKIE_PREFIX']; ?>"
     data-reload="<?= $arParams['RELOAD_PAGE']; ?>"
     data-search-show="<?= $arParams['SEARCH_SHOW']; ?>"
     data-favorite-show="<?= $arParams['FAVORITE_SHOW']; ?>"
     data-use-yandex="<?= $arResult['USE_YANDEX']; ?>"
     data-use-yandex-search="<?= $arResult['USE_YANDEX_SEARCH']; ?>"
     data-yandex-search-skip-words="<?= $oManager->getPreparedForHtmlAttr($arResult['YANDEX_SEARCH_SKIP_WORDS']); ?>"
     data-msg-empty-result="<?= $oManager->getPreparedForHtmlAttr($arParams['MSG_EMPTY_RESULT']); ?>"
     data-key="<?= $randString; ?>">

    <div class="bxmaker__geoip__popup js-bxmaker__geoip__popup" id="bxmaker__geoip__popup-id<?= $randString; ?>">
        <div class="bxmaker__geoip__popup-background js-bxmaker__geoip__popup-background"></div>

        <div class="bxmaker__geoip__popup-content js-bxmaker__geoip__popup-content">
            <div class="bxmaker__geoip__popup-close js-bxmaker__geoip__popup-close">&times;</div>
            <div class="bxmaker__geoip__popup-header">
				<?= $arParams['POPUP_LABEL']; ?>
            </div>

			
            <div class="bxmaker__geoip__popup-options">
				<?
					$iColRows = ceil(count($arResult['ITEMS']) / 3);
				?>
                <div class="bxmaker__geoip__popup-options-col">
					<?
						$i = -1;
						foreach ($arResult['ITEMS'] as $item) {

							if (++$i > 0 && $i % $iColRows == 0) {
								echo '</div><div class="bxmaker__geoip__popup-options-col ">';
							}

							echo '<div class="bxmaker__geoip__popup-option ' . ($item['MARK'] ? 'bxmaker__geoip__popup-option--bold' : '') . ' js-bxmaker__geoip__popup-option  "	data-id="' . $item['ID'] . '"><span>' . $item['NAME'] . '</span></div>';
						}
					?>
                </div>
            </div>
			
        </div>
    </div>
</div>*/?>