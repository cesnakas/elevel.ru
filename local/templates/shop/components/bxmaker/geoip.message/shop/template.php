<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	use Bitrix\Main\Localization\Loc as Loc;

	$COMPONENT_NAME = 'BXMAKER.GEOIP.MESSAGE';

	$randString = $this->randString();

	if ($arParams['AJAX'] != 'Y') { ?>

        <div class="bxmaker__geoip__message bxmaker__geoip__message--default js-bxmaker__geoip__message preloader bxmaker_line_desktop"
             id="bxmaker__geoip__message-id<?= $randString; ?>"
             data-template="<?= $templateName; ?>"
             data-type="<?= $arParams['TYPE']; ?>"
             data-debug="<?= $arResult['DEBUG']; ?>"
             data-subdomain-on="<?= $arParams['SUBDOMAIN_ON']; ?>"
             data-base-domain="<?= $arParams['BASE_DOMAIN']; ?>"
             data-cookie-prefix="<?= $arParams['COOKIE_PREFIX']; ?>"
             data-key="<?= $randString; ?>">

			<? $frame = $this->createFrame('bxmaker__geoip__message-id' . $randString, false)->begin(); ?>

            <div class="bxmaker__geoip__message-value js-bxmaker__geoip__message-value v1"
                 data-location="<?= $arParams['LOCATION']; ?>"
                 data-city="<?= $arParams['CITY']; ?>">
				Телефон: <span class="roistattel"><b><?= $arResult['CURRENT']['MESSAGE']; ?></b></span>
            </div>

			<? $frame->beginStub(); ?>

            <div class="bxmaker__geoip__message-value  js-bxmaker__geoip__message-value v2"
                 data-location="<?= $arParams['LOCATION']; ?>"
                 data-city="<?= $arParams['CITY']; ?>">
				Телефон: <span class="roistattel"><b><?= $arResult['DEFAULT']['MESSAGE']; ?></b></span>
            </div>

			<? $frame->end(); ?>
        </div>
		<?
	}
	else {
		?>
        <div class="bxmaker__geoip__message-value  js-bxmaker__geoip__message-value v3 bxmaker_line_desktop"
             data-location="<?= $arParams['LOCATION']; ?>"
             data-city="<?= $arParams['CITY']; ?>">
			Телефон: <b><span class="roistattel"><?= $arResult['CURRENT']['MESSAGE']; ?></span></b>
        </div>
		<?
	}
