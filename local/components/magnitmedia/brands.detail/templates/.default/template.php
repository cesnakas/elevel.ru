<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<section class="section-<?=($arResult["PAGE"] == "SERIE" ? "serie" : "brand")?>-about">
	<h1 class="headline-border"><?=$arResult['BRAND']['NAME']?> <?=$arResult['META']['NAV_CHAIN'][1]['NAME']?></h1>
	<?if ($arResult["PAGE"] == "SERIE"):?>
		<span class="qty">
			<?=$arResult['SERIES_ITEMS_COUNT']?>
		</span>
	<?endif;?>
	
	<?if ($arResult["PAGE"] == "BRAND"):?>
		<span class="qty"><?=$arResult['BRAND']['ITEMS_COUNT']?></span><?//echo date('l jS \of F Y h:i:s A').'<br>';?>
		<div class="clearfix">
			<div class="column">
			
				<? if ( $arResult['BRAND']['PICTURE'] ): ?>	
				
					<img src="<?=$arResult['BRAND']['PICTURE']?>" alt="<?=$arResult['BRAND']['NAME']?>"/>
					
				<? endif; ?>
					
			</div>
			
			<div class="column">
				<?=$arResult['BRAND']['DESCRIPTION']?>
			</div>
			
			<div class="column">
			
				<? if ( !empty( $arResult['BRAND']['PARAMS'] ) ): ?>
				
					<h2>Характеристики</h2>
					<ul>
					
						<? foreach ( $arResult['BRAND']['PARAMS'] as $arParam ): ?>
						
							<li>
								<?=$arParam['NAME']?>:
								<strong><?=$arParam['VALUE']?></strong>
							</li>
						
						<? endforeach; ?>
					
					</ul>
				
				<? endif; ?>

			</div>
		</div>
	<?endif;?>
</section>

<?
 
 if ( $arParams['SERIES_CODE'] ): ?>

	<form class="form-catalog no-border" action="">
		<fieldset>
			<div class="columns-container">
				<? 
				$arSectionsIds = Array();
               
				foreach ( $arResult['SECTIONS'] as $arSection )
				{
					$arSectionsIds[] = $arSection['ID']; 
				}
               
				?>
			
			
				<?
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.smart.filter",
					"horizontal",
					array(
						"IBLOCK_TYPE" => '1c_catalog',
						"IBLOCK_ID" => '83',
						"SECTION_ID" => $arSectionsIds,
						"FILTER_NAME" => 'seriesFilter',
						"PRICE_CODE" => array(
			            0 => "Московский филиал",
		                ),
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_GROUPS" => "Y",
						"SAVE_IN_SESSION" => "N",
						"FILTER_VIEW_MODE" => "VERTICAL",
						"XML_EXPORT" => "Y",
						"SECTION_TITLE" => "NAME",
						"SECTION_DESCRIPTION" => "DESCRIPTION",
						'HIDE_NOT_AVAILABLE' => "N",
						"TEMPLATE_THEME" => "blue",
						'CONVERT_CURRENCY' => "N",
						'CURRENCY_ID' => $arParams['CURRENCY_ID'],
						"SEF_MODE" => "Y",
						//"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
						"SEF_RULE" => "",
						"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"INSTANT_RELOAD" => "Y",
						"DISPLAY_ELEMENT_COUNT" => "Y",
						'SECTIONS' => $arResult['SECTIONS']
					),
					false,
					array('HIDE_ICONS' => 'Y')
				); 
				?>
				
				
				
				
				<? 
				global $seriesFilter;
				
				if (!empty($arResult['SERIES_ITEMS_IDS']))
				{
					$DISPLAY_BOTTOM_PAGER = "Y";
					
					$seriesFilter = Array(
						'ID' => $arResult['SERIES_ITEMS_IDS']
					);
				}
				else
				{
					$DISPLAY_BOTTOM_PAGER = "N";
					
					$seriesFilter = Array(
						'ID' => $arResult['BRAND_ITEMS_IDS']
					);
				}
				?>

				<?
				$ELEMENT_SORT_FIELD = "CATALOG_AVAILABLE";
				$ELEMENT_SORT_ORDER = "desc,nulls";
				$ELEMENT_SORT_FIELD2 = "HAS_DETAIL_PICTURE";
				$ELEMENT_SORT_ORDER2 = "desc,nulls";

				$catalog_sort = "";
				$catalog_order = "";

				if(isset($_GET["sort"]) && $_GET["sort"])
				{
					$catalog_sort = htmlspecialchars($_GET["sort"]);
					$_SESSION["catalog_sort"] = $catalog_sort;
				}
				elseif (isset($_SESSION["catalog_sort"])) $catalog_sort = $_SESSION["catalog_sort"];

				if(isset($_GET["order"]) && $_GET["order"])
				{
					$catalog_order = htmlspecialchars($_GET["order"]);
					$_SESSION["catalog_order"] = $catalog_order;
				}
				elseif (isset($_SESSION["catalog_order"])) $catalog_order = $_SESSION["catalog_order"];

				if ($catalog_sort)
				{
					if ($catalog_sort == "popular")
					{
						$ELEMENT_SORT_FIELD = "SHOW_COUNTER";
						$ELEMENT_SORT_FIELD2 = "SORT";
						$ELEMENT_SORT_ORDER2 = "asc";
					}
					elseif ($catalog_sort == "price")
					{
						$ELEMENT_SORT_FIELD = "CATALOG_PRICE_3";
						$ELEMENT_SORT_FIELD2 = "SORT";
						$ELEMENT_SORT_ORDER2 = "asc";
					}
					elseif ($catalog_sort == "alphabet")
					{
						$ELEMENT_SORT_FIELD = "NAME";
						$ELEMENT_SORT_FIELD2 = "SORT";
						$ELEMENT_SORT_ORDER2 = "asc";
					}
					
					$ELEMENT_SORT_ORDER = ($catalog_order == "asc" ? "asc" : "desc");
				}
				
				
				
				$PAGE_ELEMENT_COUNT = 30;

				$array_counts = array(20, 30, 50);
				if (isset($_GET["count"]) && in_array(intval($_GET["count"]), $array_counts))
				{
					$PAGE_ELEMENT_COUNT = intval($_GET["count"]);
					$_SESSION["catalog_count"] = $PAGE_ELEMENT_COUNT;
				}
				elseif (isset($_SESSION["catalog_count"])) $PAGE_ELEMENT_COUNT = $_SESSION["catalog_count"];
				
				
				
				$catalog_view = "items";
				$array_views = array("items", "list");
				if (isset($_GET["view"]) && in_array($_GET["view"], $array_views))
				{
					$catalog_view = $_GET["view"];
					$_SESSION["catalog_view"] = $catalog_view;
				}
				elseif (isset($_SESSION["catalog_view"])) $catalog_view = $_SESSION["catalog_view"];
				?>
				
				<?
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					$catalog_view,
					array(
						"IBLOCK_TYPE" => '1c_catalog',
						"IBLOCK_ID" => '83',
						"ELEMENT_SORT_FIELD" => $ELEMENT_SORT_FIELD,
						"ELEMENT_SORT_ORDER" => $ELEMENT_SORT_ORDER,
						"ELEMENT_SORT_FIELD2" => $ELEMENT_SORT_FIELD2,
						"ELEMENT_SORT_ORDER2" => $ELEMENT_SORT_ORDER2,
						"PROPERTY_CODE" => array(
					0 => "MARKING_PRODUCER",
				),
						"PROPERTY_CODE_MOBILE" => array(
				),
						"META_KEYWORDS" => "-",
						"META_DESCRIPTION" => "-",
						"BROWSER_TITLE" => "-",
						"SET_LAST_MODIFIED" => "N",
						"INCLUDE_SUBSECTIONS" => "Y",
						"BASKET_URL" => "/personal/basket.php",
						"ACTION_VARIABLE" => "action",
						"PRODUCT_ID_VARIABLE" => "id",
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"FILTER_NAME" => 'seriesFilter',
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"SET_TITLE" => "Y",
						"MESSAGE_404" => "",
						"SET_STATUS_404" => "N",
						"SHOW_404" => "N",
						"FILE_404" => '',
						"DISPLAY_COMPARE" => "N",
						"PAGE_ELEMENT_COUNT" => $PAGE_ELEMENT_COUNT,
						"LINE_ELEMENT_COUNT" => "3",
						"PRICE_CODE" => array(
					0 => "Московский филиал",
				),
						"USE_PRICE_COUNT" => "N",
						"SHOW_PRICE_COUNT" => "1",

						"PRICE_VAT_INCLUDE" => "Y",
						"USE_PRODUCT_QUANTITY" => "Y",
						"ADD_PROPERTIES_TO_BASKET" => "Y",
						"PARTIAL_PRODUCT_PROPERTIES" => "N",
						"PRODUCT_PROPERTIES" => array(
				),

						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => $DISPLAY_BOTTOM_PAGER,
						"PAGER_TITLE" => "Товары",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => "shop",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"PAGER_BASE_LINK" => "N",
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"LAZY_LOAD" => "N",
						"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
						"LOAD_ON_SCROLL" => "N",

						"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
						"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
						"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
						"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
						"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
						"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
						"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
						"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
						"SECTION_URL" => '/shop/#SECTION_CODE_PATH#/',
						"DETAIL_URL" => '/shop/#SECTION_CODE_PATH#/#ELEMENT_CODE#/',
						"USE_MAIN_ELEMENT_SECTION" => "N",
						'CONVERT_CURRENCY' => "N",
						'CURRENCY_ID' => $arParams['CURRENCY_ID'],
						'HIDE_NOT_AVAILABLE' => "N",
						'HIDE_NOT_AVAILABLE_OFFERS' => "N",

						'LABEL_PROP' => array(
				),
						'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
						'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
						'ADD_PICT_PROP' => "GALLERY",
						'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
						'PRODUCT_BLOCKS_ORDER' => "price,props,sku,quantityLimit,quantity,buttons,compare",
						'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
						'ENLARGE_PRODUCT' => "STRICT",
						'ENLARGE_PROP' => '',
						'SHOW_SLIDER' => "Y",
						'SLIDER_INTERVAL' => "3000",
						'SLIDER_PROGRESS' => "N",

						'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
						'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
						'PRODUCT_SUBSCRIPTION' => "Y",
						'SHOW_DISCOUNT_PERCENT' => "N",
						'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
						'SHOW_OLD_PRICE' => "Y",
						'SHOW_MAX_QUANTITY' => "N",
						'MESS_SHOW_MAX_QUANTITY' => '',
						'RELATIVE_QUANTITY_FACTOR' => '',
						'MESS_RELATIVE_QUANTITY_MANY' => '',
						'MESS_RELATIVE_QUANTITY_FEW' => '',
						'MESS_BTN_BUY' => "Купить",
						'MESS_BTN_ADD_TO_BASKET' => "В корзину",
						'MESS_BTN_SUBSCRIBE' => "Подписаться",
						'MESS_BTN_DETAIL' => "Подробнее",
						'MESS_NOT_AVAILABLE' => "Нет в наличии",
						'MESS_BTN_COMPARE' => "Сравнение",

						'USE_ENHANCED_ECOMMERCE' => "N",
						'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
						'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

						'TEMPLATE_THEME' => "blue",
						"ADD_SECTIONS_CHAIN" => "N",
						'ADD_TO_BASKET_ACTION' => "ADD",
						'SHOW_CLOSE_POPUP' => "N",
						'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
						'COMPARE_NAME' => $arParams['COMPARE_NAME'],
						'BACKGROUND_IMAGE' => "-",
						'COMPATIBLE_MODE' => "Y",
						'DISABLE_INIT_JS_IN_COMPONENT' => "N",
						'SHOW_ALL_WO_SECTION' => 'Y'
					),
					false
				);
				?>
			
			</div>
		</fieldset>
	</form>
	

<? endif; ?>

<section class="section-series">

	<? if ( !empty( $arResult['SECTIONS'] ) ): ?>
	
		<ul class="list-categories" style="padding-bottom: 50px;">

			<? foreach ( $arResult['SECTIONS'] as $key => $arSection ): ?>
				
				<?
				if ( $key == 6 )
				{
					break;
				}
				?>
			
				<li>
					<a title="<?=$arSection['NAME']?>" href="<?=$arSection['URL']?>">
						<?=$arSection['NAME']?>
					</a>
				</li>
			<? endforeach; ?>
			
			
			
			<? if ( count( $arResult['SECTIONS'] ) >= 7 ): ?>
				<li class="popup-holder-over">
					<a class="open" title="" href="javascript:;">Ещё категории</a>
					<div class="popup">
						<div class="popup-inner">
							<ul>
							
							<? for ( $i = 6; $i <= count( $arResult['SECTIONS'] ); $i++ ): ?>
							
								<?
								$arSection = $arResult['SECTIONS'][$i];
								?>
								<li>
									<a title="<?=$arSection['NAME']?>" href="<?=$arSection['URL']?>">
										<?=$arSection['NAME']?>
									</a>
								</li>
							<? endfor; ?>
							
							</ul>
						</div>
					</div>
				</li>
			<? endif; ?>

		</ul>
		
	<? endif; ?>

	
	<?// if ( !empty( $arResult['SERIES'] ) ): ?>
	<? if ( $trololo == "stop" ): ?>
	
		<h2 class="headline-border">Серии товаров</h2>
	
		<ul class="list-articles list-series slider-list">
		
			<? foreach ( $arResult['SERIES'] as $arSeries ): ?>
			
				<li>
					<div class="visual">
						<a href="<?=$arSeries['URL']?>">
						
							<? if ( $arSeries['PICTURE'] ): ?>
							
								<img src="<?=$arSeries['PICTURE']?>" alt="<?=$arSeries['NAME']?>"/>
								
							<? endif; ?>
							
						</a>
					</div>
					<strong class="title">
						<a href="<?=$arSeries['URL']?>">
							<?=$arSeries['NAME']?>
						</a>
					</strong>
					<p>
						<?=$arSeries['DESCRIPTION']?>
					</p>
				</li>
			
			<? endforeach ?>
		
		</ul>
	
	<? endif; ?>
</section>

<?if ($arResult["PAGE"] == "SERIE"):?>
	<?if (!isset($_GET["PAGEN_1"]) || $_GET["PAGEN_1"] == 1):?>
		<div class="clearfix">
			<div class="column">
				<?=$arResult['SERIES_DESCRIPTION']?>
			</div>
		</div>
	<?endif;?>
<?endif;?>

<? if ( !empty( $arResult['ARTICLES'] ) ): ?>

	<section>
		<h2 class="headline-border">Статьи бренда</h2>
        <div class="slider-single list-articles">
		
			<? foreach ( $arResult['ARTICLES'] as $arArticle ): ?>
			
				<div>
					<a class="article" href="<?=$arArticle['URL']?>">
						<div class="visual">
						
							<? if ( $arArticle['PICTURE'] ): ?>
							
								<img src="<?=$arArticle['PICTURE']?>" alt="<?=$arArticle['NAME']?>"/>
							
							<? endif; ?>
							
						</div>
						<span class="date">
							<?=$arArticle['DATE']?>
						</span>
						<h3>
							<?=$arArticle['NAME']?>
						</h3>
						<p>
							<?=$arArticle['DESCRIPTION']?>
						</p>
					</a>
				</div>
			
			<? endforeach; ?>
		
		</div>
	</section>

<? endif; ?>