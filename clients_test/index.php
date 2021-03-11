<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Клиенты и отзывы об Эlevel и Эlevel Инженер");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, клиенты элевел, реализованные объекты, выигранные тендеры, объекты поставок, проекты, электрооборудование, проектирование электроснабежния, проектирование инженерных системы, проекты эlevel, проекты элевел, клиенты эlevel, Жилые многоквартирные дома, коттеджи, квартиры, гостиницы, гостиничные комплексы, Торговые и развлекательные центры, торгово-выставочные комплексы, деловые центры, офисные комплексы, Банки, школы, больницы, спортивные сооружения, информационно-вычислительные центры, Склады, транспортные базы, фабрики, заводы, производственные цеха, промышленные здания и сооружения");
$APPLICATION->SetPageProperty("keywords", "элевел, эlevel, elevel, elevel.ru, клиенты элевел, реализованные объекты, выигранные тендеры, объекты поставок, проекты, электрооборудование, проектирование электроснабежния, проектирование инженерных системы, проекты эlevel, проекты элевел, клиенты эlevel, Жилые многоквартирные дома, коттеджи, квартиры, гостиницы, гостиничные комплексы, Торговые и развлекательные центры, торгово-выставочные комплексы, деловые центры, офисные комплексы, Банки, школы, больницы, спортивные сооружения, информационно-вычислительные центры, Склады, транспортные базы, фабрики, заводы, производственные цеха, промышленные здания и сооружения");
$APPLICATION->SetTitle("Клиенты и отзывы");?>
<script>
	$(document).ready(function() {
		$("#iobjects img").css('padding','0px 16px 10px 0px');
	});
</script>


<script type="text/javascript" src="/js/highslide.js"></script>
 
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="/css/highslide-ie6.css" />
<![endif]-->
 
<script type="text/javascript">
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.allowMultipleInstances = false;
</script>
 
<script type="text/javascript">
	//<![CDATA[
	//hs.registerOverlay({
	//	fade: 2 // fading the semi-transparent overlay looks bad in IE
	//});
	hs.graphicsDir = '/images/highslide/';
	hs.wrapperClassName = 'borderless';
	//]]>
</script>

<?$APPLICATION->IncludeComponent("bitrix:catalog", "clients", array(
	"IBLOCK_TYPE" => "clients",
	"IBLOCK_ID" => "37",
	"BASKET_URL" => "/personal/basket.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/clients_test/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "N",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"USE_ELEMENT_COUNTER" => "Y",
	"USE_FILTER" => "N",
	"USE_COMPARE" => "N",
	"PRICE_CODE" => array(
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "N",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"USE_PRODUCT_QUANTITY" => "N",
	"CONVERT_CURRENCY" => "N",
	"SHOW_TOP_ELEMENTS" => "N",
	"SECTION_COUNT_ELEMENTS" => "Y",
	"SECTION_TOP_DEPTH" => "3",
	"PAGE_ELEMENT_COUNT" => "5",
	"LINE_ELEMENT_COUNT" => "1",
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"LIST_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"INCLUDE_SUBSECTIONS" => "Y",
	"LIST_META_KEYWORDS" => "-",
	"LIST_META_DESCRIPTION" => "-",
	"LIST_BROWSER_TITLE" => "-",
	"DETAIL_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"DETAIL_META_KEYWORDS" => "-",
	"DETAIL_META_DESCRIPTION" => "-",
	"DETAIL_BROWSER_TITLE" => "-",
	"LINK_IBLOCK_TYPE" => "",
	"LINK_IBLOCK_ID" => "",
	"LINK_PROPERTY_SID" => "",
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
	"USE_ALSO_BUY" => "N",
	"USE_STORE" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"sections" => "",
		"section" => "#SECTION_CODE#/",
		"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		"compare" => "compare.php?action=#ACTION_CODE#",
	),
	"VARIABLE_ALIASES" => array(
		"compare" => array(
			"ACTION_CODE" => "action",
		),
	)
	),
	false
);?>   

 
<!--<tr><td align="right" colspan="2"><a id="bxid_995302" href="/clients/clob/" title="отфильтровать клиентов Эlevel по типам работ" ><strong>&gt; фильтровать по типам работ</strong></a></td></tr>-->
 
<!--<table id="iobjects" border="0" cellspacing="10"> 
  <tbody> 
    <tr><td><a href="/clients/liv/" ><img src="/images/mirex.gif" alt="Объект Эlevel - Жилой комплекс &amp;laquo;Мирекс-парк&amp;raquo;" title="Объект Эlevel - Жилой комплекс &amp;laquo;Мирекс-парк&amp;raquo;"  /></a></td><td valign="top"> 
        <p><a href="/clients/liv/" ><strong>Жилье</strong></a></p>
       
        <p>Жилые многоквартирные дома, коттеджи, квартиры</p>
       </td></tr>
   
    <tr><td><a href="/clients/hotel/" ><img src="/images/pinn.gif" alt="Объект Эlevel - Гостиница Парк Инн Прибалтийская" title="Объект Эlevel - Гостиница Парк Инн Прибалтийская"  /></a></td><td valign="top"> 
        <p><a href="/clients/hotel/" ><strong>Гостиницы</strong></a></p>
       
        <p>Гостиничные комплексы</p>
       </td></tr>
   
    <tr><td><a href="/clients/trade/" ><img src="/images/wereiskaya_plaza.gif" alt="Объект Эlevel - Бизнес-центр &amp;laquo;Верейская плаза&amp;raquo;" title="Объект Эlevel - Бизнес-центр &laquo;Верейская плаза&raquo;"  /></a></td><td valign="top"> 
        <p><a href="/clients/trade/" ><strong>Торговые и деловые центры</strong></a></p>
       
        <p>Торговые и развлекательные центры, торгово-выставочные комплексы, деловые центры, офисные комплексы</p>
       </td></tr>
   
    <tr><td><a href="/clients/iobjects/" ><img src="/images/krylatskoe.gif" alt="Объект Эlevel - Спортивный комплекс «Крылатское»" title="Объект Эlevel - Спортивный комплекс «Крылатское»"  /></a></td><td valign="top"> 
        <p><a href="/clients/iobjects/" ><strong>Объекты инфраструктуры</strong></a></p>
       
        <p>Банки, школы, больницы, спортивные сооружения, информационно-вычислительные центры</p>
       </td></tr>
   
    <tr><td><a href="/clients/factures/" ><img src="/images/kox.gif" alt="Объект Эlevel - ОАО «Алтай Кокс»" title="Объект Эlevel - ОАО «Алтай Кокс»"  /></a></td><td valign="top"> 
        <p><a href="/clients/factures/" ><strong>Складские и промышленные объекты</strong></a></p>
       
        <p>Склады, транспортные базы, фабрики, заводы, производственные цеха, промышленные здания и сооружения</p>
       </td></tr>
   
    <tr><td><a href="/clients/otziv/" title="отзывы клиентов Эlevel" ><img src="/images/otziv.gif" alt="отзывы клиентов Эlevel" title="отзывы клиентов Эlevel"  /></a></td><td valign="top"> 
        <p><a href="/clients/otziv/" title="отзывы клиентов Эlevel" ><strong>Отзывы клиентов Эlevel</strong></a></p>
       </td></tr>
   </tbody>
 </table>-->
 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>