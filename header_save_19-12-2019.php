<!DOCTYPE html>
<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-4117915-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-4117915-1');
		</script>
	
		<meta charset="windows-1251">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
		
        <title><? $APPLICATION->ShowTitle(); ?></title>

		<?
		// D7
		use Bitrix\Main\Page\Asset;
		
		// CSS
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/reset.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/slick.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/selectric.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery.fancybox.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/all.css");
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/dev.css");
		
		// JS
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-1.8.3.min.js");
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
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/fancybox-media.js");
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.main.js");
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/dev.js");
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/header_search.js");
		
		// Head Strings
		Asset::getInstance()->addString("<script src='https://api-maps.yandex.ru/2.1/?load=package.full&amp;lang=ru-RU' type='text/javascript'></script>");
		Asset::getInstance()->addString("<!--[if IE]><script src='" . SITE_TEMPLATE_PATH . "/js/ie.js'></script><![endif]-->");
		?>
		
        <? $APPLICATION->ShowHead(); ?>
		<script type="text/javascript">
		var __cs = __cs || [];
		__cs.push(["setCsAccount", "hk3zGMg7mVgy8H1hHgECvlgqdR4tcget"]);
		</script>
		<script type="text/javascript" async src="//app.comagic.ru/static/cs.min.js"></script>
		
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
		<?if($APPLICATION->GetCurPage(true) == "/index.php"):?>
		<meta name='wmail-verification' content='ac05dc6be8e19288965ccdd5a3a87370' />
		<?endif;?>
		<!-- Yandex.Metrika counter --> 
		<script type="text/javascript" > 
		(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(1485305, "init", { id:1485305, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, ecommerce:"dataLayer" }); 
		</script> 
		<noscript><div><img src="https://mc.yandex.ru/watch/1485305" style="position:absolute; left:-9999px;" alt="" /></div></noscript> 
		<!-- /Yandex.Metrika counter -->
</head>
    <?/*UTM метки заганяем в сессии*/
    if($_REQUEST['utm_source']) {
        $_SESSION['utm_source'] = $_REQUEST['utm_source'];
    }
    if($_REQUEST['utm_medium']) {
        $_SESSION['utm_medium'] = $_REQUEST['utm_medium'];
    }
    if($_REQUEST['utm_campaign']) {
        $_SESSION['utm_campaign'] = $_REQUEST['utm_campaign'];
    }
    ?>
    <body>
        <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
		<div id="page-preloader"><span class="spinner"></span></div>

		<div class="wrapper">
			<div class="w1">
				<div class="top-block tablet-hidden">
					<div class="row">
						<div class="text-call tablet-hidden">Единый номер:
							<strong>
								<?$APPLICATION->IncludeComponent('bxmaker:geoip.message', 'header_phone', array('TYPE' => 'PHONE_HEADER_CORP'), $component);?>
								<?/*$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
								   "AREA_FILE_SHOW" => "file",
								   "PATH" => SITE_TEMPLATE_PATH . "/include/phone.php",
								   "EDIT_TEMPLATE" => ""
								   ),
								   false
								);*/?>
							</strong></div>
						<div class="block-right">
							<? // На следующий этап Выбор города
							/*
							<div class="city-block popup-holder">
								<a class="open" href="">Ваш город: <span class="inner"><span class="text">Москва</span></span></a>
								<div class="popup">
									<div class="popup-inner">
										<div class="clearfix">
											<span class="title">Выбор города</span>
											<a class="close-link ico-close" href="">Закрыть</a>
										</div>
										<form class="form-city" action="#">
											<fieldset>
												<div class="input-holder"><input placeholder="Введите название города" type="text"/></div>
											</fieldset>
										</form>
										<ul class="list-cities">
											<li><a class="close-link" title="Москва" href="">Москва</a></li>
											<li><a class="close-link" title="Санкт-Петербург" href="">Санкт-Петербург</a></li>
											<li><a class="close-link" title="Нижний Новгород" href="">Нижний Новгород</a></li>
											<li><a class="close-link" title="Омск" href="">Омск</a></li>
											<li><a class="close-link" title="Калининград" href="">Калининград</a></li>
											<li><a class="close-link" title="Новосибирск" href="">Новосибирск</a></li>
											<li><a class="close-link" title="Уфа" href="">Уфа</a></li>
											<li><a class="close-link" title="Клин" href="">Клин</a></li>
											<li><a class="close-link" title="Петропавловск-Камчатский" href="">Петропавловск-Камчатский</a></li>
											<li><a class="close-link" title="Тверь" href="">Тверь</a></li>
											<li><a class="close-link" title="Волгоград" href="">Волгоград</a></li>
										</ul>
									</div>
								</div>
							</div>
							*/?>						
							<?$APPLICATION->IncludeComponent(
								"bxmaker:geoip.city", 
								"header", 
								array(
									"COMPONENT_TEMPLATE" => "header",
									"RELOAD_PAGE" => "Y",
									"CITY_SHOW" => "Y",
									"CITY_LABEL" => "Ваш город:",
									"QUESTION_SHOW" => "N",
									"QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
									"INFO_SHOW" => "N",
									"INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
									"BTN_EDIT" => "Изменить город",
									"POPUP_LABEL" => "Изменить город",
									"SEARCH_SHOW" => "Y",
									"INPUT_LABEL" => "Введите название города",
									"MSG_EMPTY_RESULT" => "Ничего не найдено",
									"FAVORITE_SHOW" => "Y",
									"CITY_COUNT" => "",
									"FID" => "1",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => "0"
								),
								false
							);?>
							<a class="ico-shop" title="В интернет-магазин" href="/shop/" target="main">В интернет-магазин</a>
							<a class="sign-eway"title="Вход e.way" href="/eway/">Вход <strong>e.way</strong></a>
						</div>
					</div>
				</div>
				<div class="row">
                <header class="header clearfix nav-down menu-popup-holder">
                    <a class="menu-opener" href="">Меню</a>
                    <strong class="logo">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
						   "AREA_FILE_SHOW" => "file",
						   "PATH" => SITE_TEMPLATE_PATH . "/include/logo.php",
						   "EDIT_TEMPLATE" => ""
						   ),
						   false
						);?>
					</strong>
					<?
					$APPLICATION->IncludeComponent(
						"bitrix:search.title", 
						"header_search", 
						array(
							"NUM_CATEGORIES" => "5",
							"TOP_COUNT" => "10",
							"ORDER" => "date",
							"USE_LANGUAGE_GUESS" => "Y",
							"CHECK_DATES" => "N",
							"SHOW_OTHERS" => "N",
							"PAGE" => "#SITE_DIR#search/index.php",
							"CATEGORY_1_TITLE" => "Категория",
							"CATEGORY_1" => array(
								0 => "iblock_1c_catalog",
							),
							"CATEGORY_1_iblock_каталог товаров" => array(
								0 => "all",
							),
							"CATEGORY_1_iblock_1c_catalog" => array(
								0 => "all",
							),
							"SHOW_INPUT" => "Y",
							"INPUT_ID" => "title-search-input",
							"CONTAINER_ID" => "title-search",
							"COMPONENT_TEMPLATE" => "nano_header_search",
							"CATEGORY_0_TITLE" => "",
							"CATEGORY_0" => array(
								0 => "no",
							),
							"CATEGORY_1_iblock________________" => array(
								0 => "all",
							),
							"CATEGORY_2_TITLE" => "",
							"CATEGORY_2" => array(
							),
							"CATEGORY_3_TITLE" => "",
							"CATEGORY_3" => array(
							),
							"CATEGORY_4_TITLE" => "",
							"CATEGORY_4" => array(
							),
							"CATEGORY_1_iblock______________________________" => array(
								0 => "all",
							)
						),
						false
					);
					?>
                    <div class="block-right tablet-hidden">
                        <a class="video lightbox-open" href="#video"><img src="<?=SITE_TEMPLATE_PATH?>/images/video.jpg" alt=""/>Фильм о компании</a>
                    </div>
                    <div class="mobile-header-right">
						<?if( $APPLICATION->GetCurDir() != '/eway/' ):?>
                        <a class="sign-eway-mobile" title="Вход e.way" href="/eway/">Вход e.way</a>
						<?endif;?>
                        <div class="block-search popup-holder">
							<?
							$APPLICATION->IncludeComponent(
								"bitrix:search.title", 
								"header_search_mobile", 
								array(
									"NUM_CATEGORIES" => "5",
									"TOP_COUNT" => "10",
									"ORDER" => "date",
									"USE_LANGUAGE_GUESS" => "Y",
									"CHECK_DATES" => "N",
									"SHOW_OTHERS" => "N",
									"PAGE" => "#SITE_DIR#search/index.php",
									"CATEGORY_1_TITLE" => "Категория",
									"CATEGORY_1" => array(
										0 => "iblock_1c_catalog",
									),
									"CATEGORY_1_iblock_каталог товаров" => array(
										0 => "all",
									),
									"CATEGORY_1_iblock_1c_catalog" => array(
										0 => "all",
									),
									"SHOW_INPUT" => "Y",
									"INPUT_ID" => "title-search-input",
									"CONTAINER_ID" => "title-search",
									"COMPONENT_TEMPLATE" => "nano_header_search",
									"CATEGORY_0_TITLE" => "",
									"CATEGORY_0" => array(
										0 => "no",
									),
									"CATEGORY_1_iblock________________" => array(
										0 => "all",
									),
									"CATEGORY_2_TITLE" => "",
									"CATEGORY_2" => array(
									),
									"CATEGORY_3_TITLE" => "",
									"CATEGORY_3" => array(
									),
									"CATEGORY_4_TITLE" => "",
									"CATEGORY_4" => array(
									),
									"CATEGORY_1_iblock______________________________" => array(
										0 => "all",
									)
								),
								false
							);
							?>
                        </div>                        
						<div class="block-contact popup-holder">
                            <a class="open" href="">Контакты</a>
                            <div class="popup">
                                <div class="popup-inner">
                                    <ul>
										<!--<li><a class="phone" title="8 800 333 96 05" href="tel:88003339605">8 (800)  333 - 96 - 05</a></li>-->
                                        <li class="phone"><?$APPLICATION->IncludeComponent('bxmaker:geoip.message', 'header_phone', array('TYPE' => 'PHONE_HEADER_CORP'), $component);?></li>
										<?if( $APPLICATION->GetCurDir() != '/eway/' ):?>
                                        <li><a class="lightbox-open request" href="#request">Отправить запрос</a></li>
                                        <li><a class="lightbox-open recall form-open" href="#order-call">Заказать звонок</a></li>
										<?endif;?>
                                        <li><a class="ico-shop-mobile" href="/shop/">В интернет-магазин</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="block-cart">
                            <a class="open" href="/shop/">Корзина</a>
                        </div>
                    </div>
                    <div class="menu-popup">
						<? // На второй этап Выбор города
						/*
                        <div class="mobile-city-block">
                            <form class="popup-holder2" action="#">
                                <fieldset>
                                    <input class="open2 link-city" placeholder="Введите название города" type="text"/>
                                    <div class="popup2">
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
                                </fieldset>
                            </form>
                            <a href="">Ваш город: <span class="inner"><span class="text">Москва</span></span></a>
                        </div>
						*/?>
						<div class="mobile-city-block">
							<?$APPLICATION->IncludeComponent(
								"bxmaker:geoip.city", 
								"header_mobail", 
								array(
									"COMPONENT_TEMPLATE" => "header_mobail",
									"RELOAD_PAGE" => "Y",
									"CITY_SHOW" => "Y",
									"CITY_LABEL" => "Ваш город:",
									"QUESTION_SHOW" => "N",
									"QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
									"INFO_SHOW" => "N",
									"INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
									"BTN_EDIT" => "Изменить город",
									"POPUP_LABEL" => "Изменить город",
									"SEARCH_SHOW" => "Y",
									"INPUT_LABEL" => "Введите название города",
									"MSG_EMPTY_RESULT" => "Ничего не найдено",
									"FAVORITE_SHOW" => "N",
									"CITY_COUNT" => "",
									"FID" => "1",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => "0"
								),
								false
							);?>
						</div>
						<?$APPLICATION->IncludeComponent(
							'bitrix:menu',
							'header_mobile',
							Array(
								'ROOT_MENU_TYPE' => 'INDEX',
								'MAX_LEVEL' => 2,
								'CHILD_MENU_TYPE' => 'TOP_MENU_1_SUBMENU',
								'USE_EXT' => 'N',
								'DELAY' => 'N',
								'ALLOW_MULTI_SELECT' => 'N',
								'MENU_CACHE_TYPE' => 'A',
								'MENU_CACHE_TIME' => 86400000,
								'MENU_CACHE_USE_GROUPS' => 'N',
								'MENU_CACHE_GET_VARS' => ''
							),
							false
						);?>
						<!--<div class="text-call">Единый бесплатный номер: <strong><a title="8 800 333 96 05" href="tel:88003339605">8 800 333 96 05</a></strong></div>-->
						<div class="text-call">Единый номер: <strong><?$APPLICATION->IncludeComponent('bxmaker:geoip.message', 'header_phone', array('TYPE' => 'PHONE_HEADER_CORP'), $component);?></strong></div>
                    </div>
                </header>
                <div class="nav-bar clearfix tablet-hidden">				
				<?if( $APPLICATION->GetCurDir() != '/eway/' ):?>
                    <a class="link-left text-orange lightbox-open form-open" href="#request" <?if (SITE_SERVER_NAME == "elevel.ru"):?>onclick="yaCounter1485305.reachGoal('otpravitZapros1'); return true;"<?endif;?>>Отправить запрос</a>
				<?endif;?>
					<?$APPLICATION->IncludeComponent(
						'bitrix:menu',
						'header_desktop',
						Array(
							'ROOT_MENU_TYPE' => 'INDEX',
							'MAX_LEVEL' => 2,
							'CHILD_MENU_TYPE' => 'TOP_MENU_1_SUBMENU',
							'USE_EXT' => 'Y',
							'DELAY' => 'N',
							'ALLOW_MULTI_SELECT' => 'N',
							'MENU_CACHE_TYPE' => 'A',
							'MENU_CACHE_TIME' => 86400000,
							'MENU_CACHE_USE_GROUPS' => 'N',
							'MENU_CACHE_GET_VARS' => ''
						),
						false
					);?>
                </div>
				<div class="main">
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", Array(
	"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
		"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	),
	false
);?>