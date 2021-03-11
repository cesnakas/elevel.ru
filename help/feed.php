<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "подписка, новости, как подписаться, rss");
$APPLICATION->SetPageProperty("description", "Помощь по подписке на новости сайта");
$APPLICATION->SetTitle("Как подписаться на новости");
?> 
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
 
<h1>Как подписаться на новости сайта?</h1>
 
<br />
 
<p>Подписаться на новости Вы можете в независимости от того, зарегистрированы на сайте или нет. </p>
 
<ul class="list_sol"> 
  <li><noindex>Новости сайта поставляются в формате RSS (<a href="http://ru.wikipedia.org/wiki/RSS" target="_blank" rel="nofollow" >http://ru.wikipedia.org/wiki/RSS</a> или <a href="http://www.orss.ru" rel="nofollow" >http://www.orss.ru</a>).</noindex></li>
 
  <li>Для подписки Вам достаточно добавить rss-канал в вашем почтовом клиенте (адрес: <strong><i>http://elevel.ru/company/news/rss/</i></strong>), либо читать rss-канал через браузер* - для этого в блоке новостей на главной странице в правом углу нажмите на значок rss <img src="/i/pic20a.gif" width="15" height="15"  />. 
    <br />
   
    <br />
   <a href="/images/help/elevel-new-rss-podpiska.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="подписка на RSS канал новостей сайта www.elevel.ru" ><img src="/images/help/elevel-new-rss-podpiska_sm.png" border="0" alt="подписка на RSS канал новостей сайта www.elevel.ru" title="подписка на RSS канал новостей сайта www.elevel.ru"  /></a> 
    <br />
   
    <br />
   </li>
 
  <li>Далее следуйте инструкциям используемой программы. 
    <br />
   </li>
 </ul>
 <sub>*В большинстве браузеров имеется встроенный rss-reader, средство позволяющее читать канал к ним относятся Internet Explorer (с 7-ой версии), FireFox и Opera. Остальные браузеры не могу транслировать rss.</sub> 
<br />
 
<br />
 Если у Вас остались неразрешённые вопросы, Вы можете обратиться в службу поддержки сайта &ndash; <a href="mailto:webmaster@elevel.ru" >webmaster@elevel.ru</a> 
<br />
 
<br />
<?if($_REQUEST["print"] !== "Y"){?>
 <a href="/help/" title="Вернуться в раздел Помощь" class="srvLink3" >назад</a>
 <?}?>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>