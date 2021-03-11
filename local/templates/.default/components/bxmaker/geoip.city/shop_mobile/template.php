<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	use Bitrix\Main\Localization\Loc as Loc;

	$this->setFrameMode(true);

	$randString = $this->randString();

	$COMPONENT_NAME = 'BXMAKER.GEOIP.CITY';

	$oManager = \Bxmaker\GeoIP\Manager::getInstance();


?>

<form class="popup-holder2 bxmaker__geoip__city bxmaker__geoip__city--default" id="bxmaker__geoip__city-id<?= $randString; ?>"
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
     data-key="<?= $randString; ?>" action="#">
	
	<fieldset>
		<div class="bxmaker__geoip__popup js-bxmaker__geoip__popup" id="bxmaker__geoip__popup-id<?= $randString; ?>">
			<div class="bxmaker__geoip__popup-search">
				<input type="text" name="city" value="" class="link-city" placeholder="<?= $arParams['INPUT_LABEL']; ?>" autocomplete="off">
				<div class="bxmaker__geoip__popup-search-options js-bxmaker__geoip__popup-search-options popup2"></div>
			</div>
		</div>

	</fieldset>
</form>
	

		<?/*<div class="popup2">
			<div class="popup-inner">
				<ul>
					<li><a href="">Воронеж</a></li>
					<li><a href="">Волгоград</a></li>
					<li><a href="">Новосибирск</a></li>
					<li><a href="">Екатеринбург</a></li>
					<li><a href="">Нижний Новгород</a></li>
				</ul>
			</div>
		</div>
		*/?>