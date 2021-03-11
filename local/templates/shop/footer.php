
</div>
</div>
</div>
<footer class="footer">
    <div class="row">
        <nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" class="footer-nav columns-container">

            <?$APPLICATION->IncludeComponent("bitrix:menu","footer",Array(
                "ROOT_MENU_TYPE" => "footer", 
                "MAX_LEVEL" => "1", 
                "CHILD_MENU_TYPE" => "footer", 
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "A", 
                "MENU_CACHE_TIME" => "3600000", 
                "MENU_CACHE_USE_GROUPS" => "Y", 
                "MENU_CACHE_GET_VARS" => "" 
                )
            );?>

        </nav>
        <div class="footer-bottom clearfix">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include", 
                ".default", 
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_TEMPLATE_PATH . "/include/footer_company.php",
                    "EDIT_TEMPLATE" => ""
                ),
                false
            );?>
            <div class="footer-right-block">
                <div class="footer-top-block clearfix">
                    <?$APPLICATION->IncludeComponent("bitrix:menu","footer_add_nav",Array(
                        "ROOT_MENU_TYPE" => "footer_add_nav", 
                        "MAX_LEVEL" => "1", 
                        "CHILD_MENU_TYPE" => "footer_add_nav", 
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y",
                        "MENU_CACHE_TYPE" => "A", 
                        "MENU_CACHE_TIME" => "3600000", 
                        "MENU_CACHE_USE_GROUPS" => "Y", 
                        "MENU_CACHE_GET_VARS" => "" 
                        )
                    );?>
                    <span class="copyright">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include", 
                            ".default", 
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_TEMPLATE_PATH . "/include/footer_copyright.php",
                                "EDIT_TEMPLATE" => ""
                            ),
                            false
                        );?>
                    </span>
                </div>
                <div class="footer-bottom-block">
                    <ul class="social">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include", 
                            ".default", 
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_TEMPLATE_PATH . "/include/footer_social.php",
                                "EDIT_TEMPLATE" => ""
                            ),
                            false
                        );?>
                    </ul>
                    <ul class="icons">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include", 
                            ".default", 
                            array(
                                "COMPONENT_TEMPLATE" => ".default",
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_TEMPLATE_PATH . "/include/footer_icons.php",
                                "EDIT_TEMPLATE" => ""
                            ),
                            false
                        );?>
                    </ul>
                </div>
            </div>
            <a class="link-top" href="">Наверх</a>
        </div>
        <div class="footer-mobile">
            <?$APPLICATION->IncludeComponent("bitrix:menu","footer_add_nav",Array(
                "ROOT_MENU_TYPE" => "footer_add_nav", 
                "MAX_LEVEL" => "1", 
                "CHILD_MENU_TYPE" => "footer_add_nav", 
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "A", 
                "MENU_CACHE_TIME" => "3600000", 
                "MENU_CACHE_USE_GROUPS" => "Y", 
                "MENU_CACHE_GET_VARS" => "" 
                )
            );?>
            <ul class="social">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include", 
                    ".default", 
                    array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/footer_social.php",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                );?>
            </ul>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include", 
                ".default", 
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_TEMPLATE_PATH . "/include/footer_company.php",
                    "EDIT_TEMPLATE" => ""
                ),
                false
            );?>
            <ul class="icons">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include", 
                    ".default", 
                    array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/footer_icons.php",
                        "EDIT_TEMPLATE" => ""
                    ),
                    false
                );?>
            </ul>
            <span class="copyright"><span class="inner">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include", 
                        ".default", 
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/footer_copyright.php",
                            "EDIT_TEMPLATE" => ""
                        ),
                        false
                    );?>
                </span></span>
        </div>
    </div>
</footer>
<div class="lightbox-holder">

    <?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth", Array(), false);?>

    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "callback", Array(
        "COMPONENT_TEMPLATE" => "callback",
        "WEB_FORM_ID" => "100",    // ID веб-формы
        "IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
        "USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
        "CACHE_TYPE" => "A",    // Тип кеширования
        "CACHE_TIME" => "3600",    // Время кеширования (сек.)
        "LIST_URL" => "result_list.php",    // Страница со списком результатов
        "EDIT_URL" => "result_edit.php",    // Страница редактирования результата
        "SUCCESS_URL" => "",    // Страница с сообщением об успешной отправке
        "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
        "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
        "VARIABLE_ALIASES" => array(
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        )
        ),
        false
    );?>

    <?$APPLICATION->IncludeComponent(    // Форма нового запроса
        "bitrix:form.result.new", 
        "request", 
        array(
            "COMPONENT_TEMPLATE" => "request",
            "WEB_FORM_ID" => "99",
            "IGNORE_CUSTOM_TEMPLATE" => "N",
            "USE_EXTENDED_ERRORS" => "N",
            "SEF_MODE" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "LIST_URL" => "result_list.php",
            "EDIT_URL" => "result_edit.php",
            "SUCCESS_URL" => "",
            "CHAIN_ITEM_TEXT" => "",
            "CHAIN_ITEM_LINK" => "",
            "VARIABLE_ALIASES" => array(
                "WEB_FORM_ID" => "WEB_FORM_ID",
                "RESULT_ID" => "RESULT_ID",
            ),
        ),
        false
    );?>
	
	    <?$APPLICATION->IncludeComponent(    // Форма нового запроса
        "bitrix:form.result.new", 
        "complaints_suggestions", 
        array(
            "COMPONENT_TEMPLATE" => "complaints_suggestions",
            "WEB_FORM_ID" => "120",
            "IGNORE_CUSTOM_TEMPLATE" => "N",
            "USE_EXTENDED_ERRORS" => "N",
            "SEF_MODE" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "LIST_URL" => "result_list.php",
            "EDIT_URL" => "result_edit.php",
            "SUCCESS_URL" => "",
            "CHAIN_ITEM_TEXT" => "",
            "CHAIN_ITEM_LINK" => "",
            "VARIABLE_ALIASES" => array(
                "WEB_FORM_ID" => "WEB_FORM_ID",
                "RESULT_ID" => "RESULT_ID",
            ),
        ),
        false
    );?>

</div>
<?/*
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter1485305 = new Ya.Metrika({
id:1485305,
clickmap:true,
trackLinks:true,
accurateTrackBounce:true,
webvisor:true
});
} catch(e) { }
});

var n = d.getElementsByTagName("script")[0],
s = d.createElement("script"),
f = function () { n.parentNode.insertBefore(s, n); };
s.type = "text/javascript";
s.async = true;
s.src = "https://mc.yandex.ru/metrika/watch.js";

if (w.opera == "[object Opera]") {
d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/1485305" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
*/?>
<!--LiveInternet counter--><script type="text/javascript"><!--
    new Image().src = "//counter.yadro.ru/hit?r"+
    escape(document.referrer)+((typeof(screen)=="undefined")?"":
        ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
            screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random();//--></script><!--/LiveInternet-->
<!--Openstat-->
<span id="openstat2289094"></span>
<script type="text/javascript">
    var openstat = { counter: 2289094, next: openstat };
    (function(d, t, p) {
        var j = d.createElement(t); j.async = true; j.type = "text/javascript";
        j.src = ("https:" == p ? "https:" : "http:") + "//openstat.net/cnt.js";
        var s = d.getElementsByTagName(t)[0]; s.parentNode.insertBefore(j, s);
    })(document, "script", document.location.protocol);
</script>
<!--/Openstat-->
<?/*     
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-4117915-1']);
_gaq.push(['_addOrganic', 'images.yandex.ru','q',true]);
_gaq.push(['_addOrganic', 'blogsearch.google.ru','q',true]);
_gaq.push(['_addOrganic', 'blogs.yandex.ru','text', true]);
_gaq.push(['_addOrganic', 'go.mail.ru','q']);
_gaq.push(['_addOrganic', 'nova.rambler.ru','query']);
_gaq.push(['_addOrganic', 'nigma.ru','s']);
_gaq.push(['_addOrganic', 'webalta.ru','q']);
_gaq.push(['_addOrganic', 'aport.ru','r']);
_gaq.push(['_addOrganic', 'poisk.ru','text']);
_gaq.push(['_addOrganic', 'km.ru','sq']);
_gaq.push(['_addOrganic', 'liveinternet.ru','ask']);
_gaq.push(['_addOrganic', 'quintura.ru','request']);
_gaq.push(['_addOrganic', 'search.qip.ru','query']);
_gaq.push(['_addOrganic', 'gde.ru','keywords']);
_gaq.push(['_addOrganic', 'gogo.ru','q']);
_gaq.push(['_addOrganic', 'ru.yahoo.com','p']);
_gaq.push(['_addOrganic', 'market.yandex.ru','text', true]);
_gaq.push(['_addOrganic', 'price.ru','pnam']);
_gaq.push(['_addOrganic', 'tyndex.ru','pnam']);
_gaq.push(['_addOrganic', 'torg.mail.ru','q']);
_gaq.push(['_addOrganic', 'tiu.ru','query']);
_gaq.push(['_addOrganic', 'tech2u.ru','text']);
_gaq.push(['_addOrganic', 'goods.marketgid.com','query']);
_gaq.push(['_addOrganic', 'poisk.ngs.ru','q']);
_gaq.push(['_addOrganic', 'akavita.by','z']);
_gaq.push(['_addOrganic', 'tut.by','query']);
_gaq.push(['_addOrganic', 'all.by','query']);
_gaq.push(['_addOrganic', 'meta.ua','q']);
_gaq.push(['_addOrganic', 'bigmir.net','q']);
_gaq.push(['_addOrganic', 'i.ua','q']);
_gaq.push(['_addOrganic', 'online.ua','q']);
_gaq.push(['_addOrganic', 'a.ua','s']);
_gaq.push(['_addOrganic', 'ukr.net','search_query']);
_gaq.push(['_addOrganic', 'search.com.ua','q']);
_gaq.push(['_addOrganic', 'search.ua','query']);
_gaq.push(['_addOrganic', 'search.ukr.net','search_query']);
_gaq.push(['_addOrganic', 'sm.aport.ru','r']);
_gaq.push(['_trackPageview']);


(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
*/?>

<?
$meta = getMeta();
if($meta['is_exist'])
{
    if(!empty($meta['SEO_KEYWORDS']))
    {
        $APPLICATION->SetPageProperty("keywords", $meta['SEO_KEYWORDS']);
    }
    if(!empty($meta['SEO_TITLE']))
    {
        $APPLICATION->SetPageProperty("title", $meta['SEO_TITLE']);
        $APPLICATION->SetTitle($meta['SEO_TITLE']);
    }    
    if(!empty($meta['SEO_DESCRIPTION']))
    {
        $APPLICATION->SetPageProperty("description", $meta['SEO_DESCRIPTION']);
    }            
}

$curPage = $APPLICATION -> GetCurPage (false);

if (is_in_str ($curPage, '/catalog/') && is_in_str ($curPage, '/shop/'))
{      
    $CANONICAL_URL = (!empty ($GLOBALS['CANONICAL_URL'])) ? $GLOBALS['CANONICAL_URL'] : "https://" . SITE_SERVER_NAME . $curPage;
    $CANONICAL_URL = strtolower (str_replace ('/catalog', '', $CANONICAL_URL));
    $APPLICATION->SetPageProperty('rel_canonical', '<link rel="canonical" href="'.$CANONICAL_URL.'"/>');
}

$CANONICAL_THIS = $APPLICATION->GetPageProperty("rel_canonical");

if (empty ($CANONICAL_THIS)) 
{
    $APPLICATION->SetPageProperty('rel_canonical', '<link rel="canonical" href="'."https://" . SITE_SERVER_NAME . $curPage.'"/>');  
}

?>
<script type="text/javascript">
    var digiScript = document.createElement('script');
    digiScript.src = '//cdn.diginetica.net/540/client.js?ts=' + Date.now();
    digiScript.defer = true;
    digiScript.async = true;
    document.body.appendChild(digiScript);
</script>


</body>
</html>
