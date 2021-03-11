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
	

	<div class="bxmaker__geoip__city__line-context js-bxmaker__geoip__city__line-context">
		<a class="open" href=""><?=$arParams['~CITY_LABEL'];?> 
			<span class="inner">				
				<span class="text bxmaker__geoip__city__line-name js-bxmaker__geoip__city__line-name js-bxmaker__geoip__city__line-city"><?=$oManager->getFirstNotEmpty(array($arResult['CITY_DEFAULT'], Loc::getMessage($BXMAKER_COMPONENT_NAME . 'CITY_DEFAULT') ));?></span>
			</span>
		</a>
	</div>
</div>
