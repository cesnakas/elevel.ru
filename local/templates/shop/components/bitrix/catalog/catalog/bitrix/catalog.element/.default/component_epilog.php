<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult["CANONICAL_URL"]))
{
 $APPLICATION->SetPageProperty('rel_canonical', '<link rel="canonical" href="'.$arResult["CANONICAL_URL"].'"/>');
 $GLOBALS['CANONICAL_URL'] = $arResult["CANONICAL_URL"]; 
}

// ChannelSight Sales Tracking
$APPLICATION->AddHeadString('<script type="text/javascript" src="https://tracking.channelsight.com/api/tracking/v2/Init"></script>',true);

// Captcha for guests
echo preg_replace_callback(
	"/#CAPTCHA_DIV#/is".BX_UTF_PCRE_MODIFIER,
	create_function('$matches', 'ob_start();
		
		echo \'<div class="input-holder"><div class="block-captcha one_click_buy_captcha">\';

		$captchaSid = $GLOBALS["APPLICATION"]->CaptchaGetCode();

		echo \'<img src="/bitrix/tools/captcha.php?captcha_sid=\' . $captchaSid . \'" alt="CAPTCHA" />
				<input type="hidden" name="captcha_sid" value="\' . $captchaSid . \'" />
			</div>	

			<input required placeholder="Код с картинки" type="text" name="captcha_word"/>
			</div>\';

		$retrunStr = @ob_get_contents();
		ob_get_clean();
		return $retrunStr;'
	),
	$arResult["CACHED_TPL"]
);