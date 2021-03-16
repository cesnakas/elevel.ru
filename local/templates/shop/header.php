<?
$curDir = $APPLICATION->GetCurDir();
$curPage = $APPLICATION->GetCurPage();
$curThis = $APPLICATION->GetCurPage(false);



?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?include $_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/.default/gtm_1.php';?>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <title><?$APPLICATION->ShowTitle()?></title>
    
    <?
    // D7
    use Bitrix\Main\Page\Asset;
    
    Asset::getInstance()->addString("<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800&amp;subset=cyrillic' rel='stylesheet'>");
    
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/reset.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/slick.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/selectric.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery.fancybox.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/dev.css");
    
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-1.8.3.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/ajaxShowCity.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.placeholder.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/slick.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.same.height.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.open-close.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.popup.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.selectric.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.custom-file-input.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.tabs.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jcf.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jcf.radio.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jcf.checkbox.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.fancybox.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.accordion.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.widget.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.button.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.spinner.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.slider.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.main.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/script.js");

    
    Asset::getInstance()->addString("<script src='https://api-maps.yandex.ru/2.1/?apikey=e73ac909-4a72-4596-8e8a-fc59fffa708d&lang=ru_RU' type='text/javascript'></script>");
    Asset::getInstance()->addString('<script type="text/javascript" language="javascript"> var _lh_params = {"popup": false}; lh_clid="5a55f34de694aa6ed4416c9a"; (function() { var lh = document.createElement("script"); lh.type = "text/javascript"; lh.async = true; lh.src = ("https:" == document.location.protocol ? "https://" : "http://") + "track.leadhit.io/track.js?ver=" + Math.floor(Date.now()/100000).toString(); var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(lh, s); })();/* "PLEASE DO NOT MAKE ANY CHANGES IN THIS JS-CODE!"*/ </script>');
    
    $APPLICATION->ShowProperty("rel_prev");
    $APPLICATION->ShowProperty("rel_next");
    /*$strCanonical = $APPLICATION-> GetPageProperty ('rel_canonical');
    if (!empty ($strCanonical))
    {
        
    }
    elseif ($curThis !== SITE_DIR)
    {
        echo "\n<link rel='canonical' href='" . $curThis . "'>\n";
    }*/
    $APPLICATION->ShowProperty("rel_canonical"); 
    
    $APPLICATION->ShowHead();
    ?>
    
    <!--[if IE]><script src="<?=SITE_TEMPLATE_PATH?>/js/ie.js"></script><![endif]-->
    
    <?if($curPage == "/shop/" || $curPage == "/shop/index.php"):?>
    <!-- VK pixel -->
    <script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?159",t.onload=function(){VK.Retargeting.Init("VK-RTRG-270984-bVave"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-270984-bVave" style="position:fixed; left:-999px;" alt=""/></noscript>
    
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '2058945351097844');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=2058945351097844&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <?endif;?>
    
    <script src="//static-login.sendpulse.com/apps/fc3/build/loader.js" sp-form-id="8a407631741807696a187d234343b894a3bc63555844179c6bb34086b1107565"></script>
    <!-- Yandex.Metrika counter --> 
    <script type="text/javascript" > 
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(1485305, "init", { id:1485305, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, ecommerce:"dataLayer" }); 
    </script> 
    <noscript><div><img src="https://mc.yandex.ru/watch/1485305" style="position:absolute; left:-9999px;" alt="" /></div></noscript> 
    <!-- /Yandex.Metrika counter -->

</head>
<body class="<?$APPLICATION->ShowProperty("body_class")?>">

<?//include $_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/.default/gtm_2.php';?>
    <? if ( $curPage == '/personal/basket.php' )
        $APPLICATION->SetPageProperty("body_class", "cart-page");
    
    ?><?$APPLICATION->ShowPanel();?>
    
    <div id="ajax_loading" style="display: none;">
        <div id="circularG">
            <div id="circularG_1" class="circularG"></div>
            <div id="circularG_2" class="circularG"></div>
            <div id="circularG_3" class="circularG"></div>
            <div id="circularG_4" class="circularG"></div>
            <div id="circularG_5" class="circularG"></div>
            <div id="circularG_6" class="circularG"></div>
            <div id="circularG_7" class="circularG"></div>
            <div id="circularG_8" class="circularG"></div>
        </div>
    </div>
    <div class="wrapper">
        <div class="w1">
            <header class="top-block">
                <div class="row">
                    <?
                    // Temporary banner # 5751
                    /*if(time() < strtotime("26.10.2018 00:00:00")):?>
                    <div id="top-banner-holder">
                        <a href="/company/actions/1686900/?utm_source=site&utm_medium=banner&utm_campaign=site&utm_content=banner-akcia&utm_term=akcia"><img src="/upload/shop_top_banner.jpg" /></a>
                    </div>
                    <?endif;*/?>

                    <div class="city-block popup-holder js-clickCity">
                        <?$APPLICATION->IncludeComponent(
                            "bxmaker:geoip.city.line",
                            "shop",
                            array(
                                "COMPONENT_TEMPLATE"   => "shop",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "3600",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "CITY_LABEL" => "Ваш город - ",
                                "QUESTION_SHOW" => "N",
                                "QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
                                "INFO_SHOW" => "N",
                                "INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
                                "BTN_EDIT" => "Изменить город",
                            ),
                            $component,
                            array('HIDE_ICON' => 'Y')
                        );?>
                        <? $APPLICATION->IncludeComponent("bxmaker:geoip.city",  // выбор города
                            "shop",
                            array(
                                "COMPONENT_TEMPLATE" => "shop",
                                "CITY_SHOW" => "Y",
                                "CITY_LABEL" => "Ваш город:",
                                "QUESTION_SHOW" => "N",
                                "QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
                                "INFO_SHOW" => "N",
                                "INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
                                "BTN_EDIT" => "Изменить город",
                                "SEARCH_SHOW" => "Y",
                                "FAVORITE_SHOW" => "Y",
                                "CITY_COUNT" => "30",
                                "FID" => "1",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "3600",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "POPUP_LABEL" => "МЫ ДОСТАВЛЯЕМ ПО ВСЕЙ РОССИИ!",
                                "INPUT_LABEL" => "Введите название города...",
                                "MSG_EMPTY_RESULT" => "Ничего не найдено"
                            ),
                            false
                        ); ?>
                        <div id="js-showCity">

                        </div>
                    </div>
                    
                    <?$APPLICATION->IncludeComponent("bitrix:menu","header_top",Array(
                            "ROOT_MENU_TYPE" => "header_top", 
                            "MAX_LEVEL" => "1", 
                            "CHILD_MENU_TYPE" => "header_top", 
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "Y",
                            "MENU_CACHE_TYPE" => "A", 
                            "MENU_CACHE_TIME" => "3600000", 
                            "MENU_CACHE_USE_GROUPS" => "Y", 
                            "MENU_CACHE_GET_VARS" => "" 
                        )
                    );?>
                </div>
            </header>
            <header class="header">
                <div class="row">
                    <strong class="logo">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include", 
                            ".default", 
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_TEMPLATE_PATH . "/include/header_logo.php",
                                "EDIT_TEMPLATE" => ""
                            ),
                            false
                        );?>
                    </strong>
                    
                    <?$APPLICATION->IncludeComponent(
                        "magnitmedia:search.title", 
                        "shop", 
                        array(
                            "COMPONENT_TEMPLATE" => "shop",
                            "NUM_CATEGORIES" => "1",
                            "TOP_COUNT" => "5",
                            "ORDER" => "rank",
                            "USE_LANGUAGE_GUESS" => "Y",
                            "CHECK_DATES" => "N",
                            "SHOW_OTHERS" => "N",
                            "PAGE" => "#SITE_DIR#shop/search/index.php",
                            "SHOW_INPUT" => "Y",
                            "INPUT_ID" => "header-search-input",
                            "CONTAINER_ID" => "header-search",
                            "CATEGORY_0_TITLE" => "Товары",
                            "CATEGORY_0" => array(
                                0 => "iblock_1c_catalog",
                            ),
                            "CATEGORY_0_iblock_1c_catalog" => array(
                                0 => "83",
                            )
                        ),
                        false
                    );?>
                    
                    <ul class="sign-nav">
                        <? global $USER;
                        if ($USER->IsAuthorized()):?>
                            <li><a title="Личный кабинет" href="/personal/">Личный кабинет</a></li>
                            <li><a title="Выход" href="?logout=yes">Выход</a></li>
                        <?else:?>
                            <li><a class="lightbox-open" href="#sign">Вход</a></li>
                            <li><a title="Регистрация" href="/register/">Регистрация</a></li>
                        <?endif;?>
                    </ul>
                    <a class="jce-contacts-link" target="_blank" href="/complaints/complaints.php">Жалобы и предложения</a>

                    <ul class="contact-list">
                        <li>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include", 
                                ".default", 
                                array(
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_TEMPLATE_PATH . "/include/header_email.php",
                                    "EDIT_TEMPLATE" => ""
                                ),
                                false
                            );?>
                        </li>
                        <li class="popup-holder">
                            <a title="Связаться с нами" class="phone open" href="">Связаться с нами</a>
                            <div class="popup">
                                <div class="popup-inner">
                                    <ul>
                                        <li><a class="lightbox-open request close-link" href="#request">Отправить запрос</a></li>
                                        <li><a class="lightbox-open recall close-link" href="#order-call">Обратный звонок</a></li>
								  </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            <nav class="nav">
                <div class="row">
                    <?/*$APPLICATION->IncludeComponent( // меню каталога
                        "bitrix:menu", 
                        ".default", 
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "ROOT_MENU_TYPE" => "header_catalog",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "2",
                            "CHILD_MENU_TYPE" => "header_catalog",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );*/?>
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include", 
                        ".default", 
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/header_catalog.php",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    );
                    ?>
                    <?
                    // $APPLICATION->IncludeComponent("bitrix:menu", "header_catalog", array(
    // "COMPONENT_TEMPLATE" => "header_catalog",
        // "ROOT_MENU_TYPE" => "header_catalog",
        // "MENU_CACHE_TYPE" => "A",
        // "MENU_CACHE_TIME" => "86400",
        // "MENU_CACHE_USE_GROUPS" => "Y",
        // "MENU_CACHE_GET_VARS" => "",
        // "MAX_LEVEL" => "2",
        // "CHILD_MENU_TYPE" => "header_catalog",
        // "USE_EXT" => "Y",
        // "DELAY" => "N",
        // "ALLOW_MULTI_SELECT" => "N"
    // ),
    // false,
    // array(
    // "ACTIVE_COMPONENT" => "Y"
    // )
// );
?>


                    
                    
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "header_nav", array(
    "ROOT_MENU_TYPE" => "header_nav",
        "MAX_LEVEL" => "1",
        "CHILD_MENU_TYPE" => "header_nav",
        "USE_EXT" => "N",
        "DELAY" => "N",
        "ALLOW_MULTI_SELECT" => "Y",
        "MENU_CACHE_TYPE" => "A",
        "MENU_CACHE_TIME" => "3600000",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "MENU_CACHE_GET_VARS" => ""
    ),
    false,
    array(
    "ACTIVE_COMPONENT" => "Y"
    )
);?>
                    
                    <?$APPLICATION->IncludeComponent(
    "bitrix:sale.basket.basket.line", 
    "shop", 
    array(
        "COMPONENT_TEMPLATE" => "shop",
        "PATH_TO_BASKET" => SITE_DIR."personal/basket.php",
        "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
        "SHOW_NUM_PRODUCTS" => "Y",
        "SHOW_TOTAL_PRICE" => "Y",
        "SHOW_EMPTY_VALUES" => "Y",
        "SHOW_PERSONAL_LINK" => "Y",
        "PATH_TO_PERSONAL" => SITE_DIR."personal/",
        "SHOW_AUTHOR" => "N",
        "PATH_TO_REGISTER" => SITE_DIR."login/",
        "PATH_TO_AUTHORIZE" => "",
        "PATH_TO_PROFILE" => SITE_DIR."personal/",
        "SHOW_PRODUCTS" => "N",
        "POSITION_FIXED" => "N",
        "HIDE_ON_BASKET_PAGES" => "N"
    ),
    false
);?>
                </div>
            </nav>
            <header class="mobile-header clearfix nav-down">
                <div class="mobile-menu popup-holder <?if($_GET['dev'] == 'ok'){?>dev<?}?>">
                    <a class="open" href="">Меню</a>

					<?//if($_GET['dev'] == 'ok'){?>
						
						<div class="popup dev">
							<div class="mobile-menu-top clearfix">
								
								<div class="mobile-menu-item open-child">
								
									<?$APPLICATION->IncludeComponent(
	                                    "bxmaker:geoip.city.line",
	                                    "shop_mobile",
	                                    array(
	                                        "COMPONENT_TEMPLATE"   => "shop_mobile",
	                                        "CACHE_TYPE" => "A",
	                                        "CACHE_TIME" => "3600",
	                                        "COMPOSITE_FRAME_MODE" => "A",
	                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
	                                        "CITY_LABEL" => "Ваш город: ",
	                                        "QUESTION_SHOW" => "N",
	                                        "QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
	                                        "INFO_SHOW" => "N",
	                                        "INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
	                                        "BTN_EDIT" => "Изменить город",
	                                    ),
	                                    $component,
	                                    array('HIDE_ICON' => 'Y')
	                                );?>


									<div class="mobile-menu-child">
										<div class="mobile-menu-back">Назад</div>
										<?$APPLICATION->IncludeComponent( "bxmaker:geoip.city",  // выбор города
			                                "shop_mobile",
			                                array(
			                                    "COMPONENT_TEMPLATE" => "shop_mobile_slide",
			                                    "CITY_SHOW" => "N",
			                                    "CITY_LABEL" => "Ваш город:",
			                                    "QUESTION_SHOW" => "N",
			                                    "QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
			                                    "INFO_SHOW" => "N",
			                                    "INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
			                                    "BTN_EDIT" => "Изменить город",
			                                    "SEARCH_SHOW" => "Y",
			                                    "FAVORITE_SHOW" => "N",
			                                    "CITY_COUNT" => "30",
			                                    "FID" => "1",
			                                    "CACHE_TYPE" => "A",
			                                    "CACHE_TIME" => "3600",
			                                    "COMPOSITE_FRAME_MODE" => "A",
			                                    "COMPOSITE_FRAME_TYPE" => "AUTO",
			                                    "POPUP_LABEL" => "МЫ ДОСТАВЛЯЕМ ПО ВСЕЙ РОССИИ!",
			                                    "INPUT_LABEL" => "Введите город",
			                                    "MSG_EMPTY_RESULT" => "Ничего не найдено"
			                                ),
			                                false
			                            );?>
									</div>

								</div>

								<div class="mobile-menu-item open-child">
									<span>Каталог</span>
									<div class="mobile-menu-child">
										<div class="mobile-menu-back">Назад</div>
										<?
				                        $APPLICATION->IncludeComponent(
				                            "bitrix:main.include", 
				                            ".default", 
				                            array(
				                                "COMPONENT_TEMPLATE" => ".default",
				                                "AREA_FILE_SHOW" => "file",
				                                "PATH" => SITE_TEMPLATE_PATH . "/include/header_catalog_mobile.php",
				                                "EDIT_TEMPLATE" => ""
				                            ),
				                            false
				                        );
				                        ?>
									</div>
								</div>

								<?$APPLICATION->IncludeComponent("bitrix:menu","header_nav_mobile_slide",
									Array(
		                                "ROOT_MENU_TYPE" => "header_nav", 
		                                "MAX_LEVEL" => "1", 
		                                "CHILD_MENU_TYPE" => "header_nav", 
		                                "USE_EXT" => "N",
		                                "DELAY" => "N",
		                                "ALLOW_MULTI_SELECT" => "Y",
		                                "MENU_CACHE_TYPE" => "A", 
		                                "MENU_CACHE_TIME" => "3600000", 
		                                "MENU_CACHE_USE_GROUPS" => "Y", 
		                                "MENU_CACHE_GET_VARS" => "" 
	                            	)
	                        	);?>

	                        	<?if ($USER->IsAuthorized()):?>
                                	<div class="mobile-menu-item">
                                    	<a title="Личный кабинет" href="/personal/">Личный кабинет</a>
									</div>
									<div class="mobile-menu-item">
                                    	<a title="Выход" href="?logout=yes">Выход</a>
                                    </div>
                                <?else:?>
                                	<div class="mobile-menu-item">
                                    	<a class="lightbox-open" href="#sign">Вход</a>
                                    </div>
                                <?endif;?>
		                        



							</div>
						</div>

					<?//} else {?>

					<?/*
	
                    <div class="popup">
                        <div class="mobile-menu-top clearfix">
                            <div class="block-sign">
                                <?if ($USER->IsAuthorized()):?>
                                    <a title="Личный кабинет" href="/personal/">Личный кабинет</a>
                                    <a title="Выход" href="?logout=yes">Выход</a>
                                <?else:?>
                                    <a class="lightbox-open" href="#sign">Вход</a>
                                <?endif;?>
                            </div>
                            
                            <? $APPLICATION->IncludeComponent( "bxmaker:geoip.city",  // выбор города
                                "shop_mobile",
                                array(
                                    "COMPONENT_TEMPLATE" => "shop_mobile",
                                    "CITY_SHOW" => "N",
                                    "CITY_LABEL" => "Ваш город:",
                                    "QUESTION_SHOW" => "N",
                                    "QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
                                    "INFO_SHOW" => "N",
                                    "INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
                                    "BTN_EDIT" => "Изменить город",
                                    "SEARCH_SHOW" => "Y",
                                    "FAVORITE_SHOW" => "N",
                                    "CITY_COUNT" => "30",
                                    "FID" => "1",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "3600",
                                    "COMPOSITE_FRAME_MODE" => "A",
                                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                                    "POPUP_LABEL" => "МЫ ДОСТАВЛЯЕМ ПО ВСЕЙ РОССИИ!",
                                    "INPUT_LABEL" => "Введите город",
                                    "MSG_EMPTY_RESULT" => "Ничего не найдено"
                                ),
                                false
                            ); ?>
                        </div>
                        
                        <ul class="mobile-contact-list">
                            <li>
                                <?$APPLICATION->IncludeComponent(
                                    "bxmaker:geoip.city.line",
                                    "shop_mobile",
                                    array(
                                        "COMPONENT_TEMPLATE"   => "shop_mobile",
                                        "CACHE_TYPE" => "A",
                                        "CACHE_TIME" => "3600",
                                        "COMPOSITE_FRAME_MODE" => "A",
                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                                        "CITY_LABEL" => "Ваш город: ",
                                        "QUESTION_SHOW" => "N",
                                        "QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
                                        "INFO_SHOW" => "N",
                                        "INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
                                        "BTN_EDIT" => "Изменить город",
                                    ),
                                    $component,
                                    array('HIDE_ICON' => 'Y')
                                );?>
                            </li>
                            <li>
                                <?$APPLICATION->IncludeComponent('bxmaker:geoip.message', 'shop_mobile', array('TYPE' => 'PHONE'));?>
                            </li>
                            <li>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include", 
                                    ".default", 
                                    array(
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_TEMPLATE_PATH . "/include/header_email_mobile.php",
                                        "EDIT_TEMPLATE" => ""
                                    ),
                                    false
                                );?>
                            </li>
                        </ul>
                        
                        <?$APPLICATION->IncludeComponent("bitrix:menu","header_nav_mobile",Array(
                                "ROOT_MENU_TYPE" => "header_nav", 
                                "MAX_LEVEL" => "1", 
                                "CHILD_MENU_TYPE" => "header_nav", 
                                "USE_EXT" => "N",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "A", 
                                "MENU_CACHE_TIME" => "3600000", 
                                "MENU_CACHE_USE_GROUPS" => "Y", 
                                "MENU_CACHE_GET_VARS" => "" 
                            )
                        );?>
                        
                        <?$APPLICATION->IncludeComponent("bitrix:menu","header_nav_mobile",Array(
                                "ROOT_MENU_TYPE" => "header_top", 
                                "MAX_LEVEL" => "1", 
                                "CHILD_MENU_TYPE" => "header_top", 
                                "USE_EXT" => "N",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "Y",
                                "MENU_CACHE_TYPE" => "A", 
                                "MENU_CACHE_TIME" => "3600000", 
                                "MENU_CACHE_USE_GROUPS" => "Y", 
                                "MENU_CACHE_GET_VARS" => "" 
                            )
                        );?>
                        
                        <?
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include", 
                            ".default", 
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_TEMPLATE_PATH . "/include/header_catalog_mobile.php",
                                "EDIT_TEMPLATE" => ""
                            ),
                            false
                        );
                        ?>
                        <?
                        // $APPLICATION->IncludeComponent(
                            // "bitrix:news.list",
                            // "header_catalog_mobile",
                            // Array(
                                // "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                // "ADD_SECTIONS_CHAIN" => "N",
                                // "AJAX_MODE" => "N",
                                // "AJAX_OPTION_ADDITIONAL" => "",
                                // "AJAX_OPTION_HISTORY" => "N",
                                // "AJAX_OPTION_JUMP" => "N",
                                // "AJAX_OPTION_STYLE" => "Y",
                                // "CACHE_FILTER" => "N",
                                // "CACHE_GROUPS" => "N",
                                // "CACHE_TIME" => "8640000",
                                // "CACHE_TYPE" => "A",
                                // "CHECK_DATES" => "Y",
                                // "DETAIL_URL" => "",
                                // "DISPLAY_BOTTOM_PAGER" => "N",
                                // "DISPLAY_DATE" => "N",
                                // "DISPLAY_NAME" => "Y",
                                // "DISPLAY_PICTURE" => "N",
                                // "DISPLAY_PREVIEW_TEXT" => "N",
                                // "DISPLAY_TOP_PAGER" => "N",
                                // "FIELD_CODE" => array("NAME", "CODE"),
                                // "FILTER_NAME" => "",
                                // "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                // "IBLOCK_ID" => "113",
                                // "IBLOCK_TYPE" => "1c_catalog",
                                // "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                // "INCLUDE_SUBSECTIONS" => "Y",
                                // "MESSAGE_404" => "",
                                // "NEWS_COUNT" => "100",
                                // "PAGER_BASE_LINK_ENABLE" => "N",
                                // "PAGER_DESC_NUMBERING" => "N",
                                // "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                // "PAGER_SHOW_ALL" => "N",
                                // "PAGER_SHOW_ALWAYS" => "N",
                                // "PAGER_TEMPLATE" => ".default",
                                // "PAGER_TITLE" => "",
                                // "PARENT_SECTION" => "",
                                // "PARENT_SECTION_CODE" => "",
                                // "PREVIEW_TRUNCATE_LEN" => "",
                                // "PROPERTY_CODE" => array(""),
                                // "SET_BROWSER_TITLE" => "N",
                                // "SET_LAST_MODIFIED" => "N",
                                // "SET_META_DESCRIPTION" => "N",
                                // "SET_META_KEYWORDS" => "N",
                                // "SET_STATUS_404" => "N",
                                // "SET_TITLE" => "N",
                                // "SHOW_404" => "N",
                                // "SORT_BY1" => "SORT",
                                // "SORT_BY2" => "ID",
                                // "SORT_ORDER1" => "ASC",
                                // "SORT_ORDER2" => "ASC",
                                // "STRICT_SECTION_CHECK" => "N"
                            // )
                        // );
                        ?>
                        
                    </div>

					*/?>

                    <?//}?>

                </div>
                <strong class="logo">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include", 
                        ".default", 
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/header_logo.php",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    );?>
                </strong>
                <div class="right-block">
                    <div class="block-search popup-holder">
                        <a class="open" href="">Поиск</a>
                        <?$APPLICATION->IncludeComponent("bitrix:search.form", "shop_mobile", Array(
                            "COMPONENT_TEMPLATE" => "shop_mobile",
                                "PAGE" => "#SITE_DIR#shop/search/index.php",    // Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
                                "USE_SUGGEST" => "N",    // Показывать подсказку с поисковыми фразами
                            ),
                            false
                        );?>
                    </div>
                    <div class="block-contact popup-holder">
                        <a class="open" href="">Контакты</a>
                        <div class="popup">
                            <div class="popup-inner">
                                <ul>
                                    <li><a class="lightbox-open request" href="#request">Отправить запрос</a></li>
                                    <li><a class="lightbox-open recall" href="#order-call">Обратный звонок</a></li>   
									<li><a class="lightbox-open request" href="#complaints_suggestions">Жалобы и предложения</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "shop_mobile", Array("PATH_TO_BASKET" => SITE_DIR."personal/basket.php"),    false);?>
                </div>

                

                <!-- Yandex.Ecommerce -->
                <script type="text/javascript">
                  window.dataLayerYa = window.dataLayerYa || [];
                </script>
                <!-- /Yandex.Ecommerce -->
            </header>
            <div class="main row">
            
                <? if ( $curDir !== '/shop/' ): ?>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"shop", 
	array(
		"COMPONENT_TEMPLATE" => "shop",
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "hm"
	),
	false
);?>
                <? endif; ?>