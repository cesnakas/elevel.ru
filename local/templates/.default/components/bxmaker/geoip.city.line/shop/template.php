<?    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	use Bitrix\Main\Localization\Loc as Loc;


	$this->setFrameMode(true);

	$randString = $this->randString();
	$BXMAKER_COMPONENT_NAME = 'BXMAKER.GEOIP.CITY.LINE';

	$oManager = \Bxmaker\GeoIP\Manager::getInstance();

?>

<div class="bxmaker__geoip__city__line  bxmaker__geoip__city__line--default js-bxmaker__geoip__city__line"
	 id="bxmaker__geoip__city__line-id<?=$randString;?>"
	 data-question-show="<?=$arParams['QUESTION_SHOW'];?>"
	 data-info-show="<?=$arParams['INFO_SHOW'];?>"
	 data-debug="<?=$arResult['DEBUG'];?>"
     data-subdomain-on="<?= $arParams['SUBDOMAIN_ON']; ?>"
     data-base-domain="<?= $arParams['BASE_DOMAIN']; ?>"
     data-cookie-prefix="<?= $arParams['COOKIE_PREFIX']; ?>"
	 data-fade-timeout="200"
	 data-tooltip-timeout="500"
	 data-key="<?=$randString;?>" >

	<a class="open" href="#">
		<span class="inner">
			<?=$arParams['~CITY_LABEL'];?>
			<span class="text-orange bxmaker__geoip__city__line-name js-bxmaker__geoip__city__line-name js-bxmaker__geoip__city__line-city">
				<?=$oManager->getFirstNotEmpty(array($arResult['CITY_DEFAULT'], Loc::getMessage($BXMAKER_COMPONENT_NAME . 'CITY_DEFAULT') ));?>
			</span>, <?$APPLICATION->IncludeComponent('bxmaker:geoip.message', 'shop', array('TYPE' => 'PHONE'), $component);?>
		</span>
	</a>

	<div class="bxmaker__geoip__city__line-context js-bxmaker__geoip__city__line-context">
	
		<?/*<span class="bxmaker__geoip__city__line-name js-bxmaker__geoip__city__line-name js-bxmaker__geoip__city__line-city"></span>*/?>

	</div>
</div>
