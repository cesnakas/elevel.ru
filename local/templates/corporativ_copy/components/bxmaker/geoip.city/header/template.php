<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	use Bitrix\Main\Localization\Loc as Loc;

	$this->setFrameMode(true);

	$randString = $this->randString();

	$COMPONENT_NAME = 'BXMAKER.GEOIP.CITY';

	$oManager = \Bxmaker\GeoIP\Manager::getInstance();

	$arCity['SELECT'] = array(
		'Москва' => 92,
		'Санкт-Петербург' => 93,
		'Ростов-на-Дону' => 1257,
		'Екатеринбург' => 2212,
		'Новосибирск' => 2623,
		'Брянск' => 706,
		'Казань' => 1567,
		'Калуга' => 289,
		'Самара' => 1840,
		'Уфа' => 2024,
		'Челябинск' => 2363,
		'Ярославль' => 678,
		// 'Нижний Новгород' => 1707,
		// 'Омск' => 2668,
		// 'Калининград' => 1032,
		// 'Петропавловск-Камчатский' => 2956,
		// 'Тверь' => 577,
		// 'Волгоград' => 1205,
	);	
?>
<div class="city-block popup-holder bxmaker__geoip__city bxmaker__geoip__city--default js-bxmaker__geoip__city" id="bxmaker__geoip__city-id<?= $randString; ?>"
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


	<? if ($arParams['CITY_SHOW'] == 'Y'): ?>
		<? $APPLICATION->IncludeComponent(
			"bxmaker:geoip.city.line",
			"header",
			array(
				"COMPONENT_TEMPLATE"   => "header",
				"CACHE_TYPE"           => $arParams['CACHE_TYPE'],
				"CACHE_TIME"           => $arParams['CACHE_TIME'],
				"COMPOSITE_FRAME_MODE" => $arParams['COMPOSITE_FRAME_MODE'],
				"COMPOSITE_FRAME_TYPE" => $arParams['COMPOSITE_FRAME_TYPE'],
				"CITY_LABEL"           => $arParams['CITY_LABEL'],
				"QUESTION_SHOW"        => $arParams['QUESTION_SHOW'],
				"QUESTION_TEXT"        => $arParams['QUESTION_TEXT'],
				"INFO_SHOW"            => $arParams['INFO_SHOW'],
				"INFO_TEXT"            => $arParams['INFO_TEXT'],
				"BTN_EDIT"             => $arParams['BTN_EDIT'],
			),
			$component,
			array('HIDE_ICON' => 'Y')); ?>
	<? endif; ?>
		
	<div class="popup js-bxmaker__geoip__popup" id="bxmaker__geoip__popup-id<?= $randString; ?>">
		<div class="js-bxmaker__geoip__popup-background"></div>
		
		<div class="popup-inner js-bxmaker__geoip__popup-content">
			<div class="clearfix">
				<span class="title"><?= $arParams['POPUP_LABEL']; ?></span>
				<a class="close-link ico-close" href="">Закрыть</a>
			</div>
			<form class="form-city" action="#">
				<fieldset>
					<div class="input-holder">						
						<input type="text" name="city" value="" placeholder="<?= $arParams['INPUT_LABEL']; ?>" autocomplete="off">
               
						<?/*<div class="bxmaker__geoip__popup-search-options js-bxmaker__geoip__popup-search-options"></div>*/?>
					</div>					 
				</fieldset>
			</form>
			<ul class="list-cities bxmaker__geoip__popup-options bxmaker__geoip__popup-search-options js-bxmaker__geoip__popup-search-options">
			<?foreach ($arResult['ITEMS'] as $item):?>
			<?if( in_array( $item['ID'], $arCity['SELECT'] ) ):?>
				<li><a class="close-link bxmaker__geoip__popup-option js-bxmaker__geoip__popup-option" data-id="<?=$item['ID']?>" title="<?=$item['NAME']?>" href=""><?=$item['NAME']?></a></li>
			<?endif;?>
			<?endforeach;?>
			</ul>
		</div>
	</div>
</div>
<?/*?>
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


	<? if ($arParams['CITY_SHOW'] == 'Y'): ?>
		<? $APPLICATION->IncludeComponent(
			"bxmaker:geoip.city.line",
			".default",
			array(
				"COMPONENT_TEMPLATE"   => ".default",
				"CACHE_TYPE"           => $arParams['CACHE_TYPE'],
				"CACHE_TIME"           => $arParams['CACHE_TIME'],
				"COMPOSITE_FRAME_MODE" => $arParams['COMPOSITE_FRAME_MODE'],
				"COMPOSITE_FRAME_TYPE" => $arParams['COMPOSITE_FRAME_TYPE'],
				"CITY_LABEL"           => $arParams['CITY_LABEL'],
				"QUESTION_SHOW"        => $arParams['QUESTION_SHOW'],
				"QUESTION_TEXT"        => $arParams['QUESTION_TEXT'],
				"INFO_SHOW"            => $arParams['INFO_SHOW'],
				"INFO_TEXT"            => $arParams['INFO_TEXT'],
				"BTN_EDIT"             => $arParams['BTN_EDIT'],
			),
			$component,
			array('HIDE_ICON' => 'Y')); ?>
	<? endif; ?>


    <div class="bxmaker__geoip__popup js-bxmaker__geoip__popup" id="bxmaker__geoip__popup-id<?= $randString; ?>">
        <div class="bxmaker__geoip__popup-background js-bxmaker__geoip__popup-background"></div>

        <div class="bxmaker__geoip__popup-content js-bxmaker__geoip__popup-content">
            <div class="bxmaker__geoip__popup-close js-bxmaker__geoip__popup-close">&times;</div>
            <div class="bxmaker__geoip__popup-header">
				<?= $arParams['POPUP_LABEL']; ?>
            </div>

            <div class="bxmaker__geoip__popup-search">
                <input type="text" name="city" value="" placeholder="<?= $arParams['INPUT_LABEL']; ?>" autocomplete="off">
                <span class="bxmaker__geoip__popup-search-clean js-bxmaker__geoip__popup-search-clean">&times;</span>
                <div class="bxmaker__geoip__popup-search-options js-bxmaker__geoip__popup-search-options"></div>
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
</div>
<?*/?>