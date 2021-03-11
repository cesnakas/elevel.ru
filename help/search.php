<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "поиск, помощь, как искать, как использовать поиск, как найти");
$APPLICATION->SetPageProperty("description", "Помощь в работе с поиском сайта Эlevel");
$APPLICATION->SetTitle("Как искать");
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
 
<h1>Как пользоваться поиском сайта?</h1>
 
<p>На сайте присутствует 2 блока поиска:</p>
 
<ul class="list_sol"> 
  <li>Первый: в правом углу под корзиной;
    <br />
  
    <br />
  <a href="/images/help/elevel-new-search-small.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="Как пользоваться поиском сайта www.elevel.ru?" ><img src="/images/help/elevel-new-search-small_sm.png" border="0" alt="Как пользоваться поиском сайта www.elevel.ru?" title="Как пользоваться поиском сайта www.elevel.ru?"  /></a> 
    <br />
  </li>
 </ul>
 
<ul class="list_sol"> 
  <li>Второй: в интернет-магазине Эlevel.
    <br />
  
    <br />
  <a href="/images/help/elevel-new-search-big.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="Как пользоваться поиском сайта www.elevel.ru?" ><img src="/images/help/elevel-new-search-big_sm.png" border="0" alt="Как пользоваться поиском сайта www.elevel.ru?" title="Как пользоваться поиском сайта www.elevel.ru?"  /></a> 
    <br />
  </li>
 </ul>
 
<ul class="list_sol"> 
  <li><strong>Поиск</strong> работает по всему сайту и выдает результаты структурировано, релевантно вашему запросу: 
    <br />
   </li>
 
  <ul class="list_sol"> 
    <li>После ввода запроса и нажатия кнопки поиска (или нажатия &quot;enter&quot;), все найденные страницы, релевантные запросу, выводятся на отдельной странице в виде списка стандартной поисковой выдачи с разбитием по найденным группам. 
      <br />
     
      <br />
    <a href="/images/help/elevel-new-search-results.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="Как пользоваться поиском сайта www.elevel.ru?" ><img src="/images/help/elevel-new-search-results_sm.png" border="0" alt="Как пользоваться поиском сайта www.elevel.ru?" title="Как пользоваться поиском сайта www.elevel.ru?"  /></a> </li>
   
    <li>В случае, если результатов большое количество, то надо нажать &quot;<b>Еще результаты</b>&quot; для вывода большего количества страниц
      <br />
     
      <br />
    <a href="/images/help/elevel-new-search-results-more.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="Как пользоваться поиском сайта www.elevel.ru?" ><img src="/images/help/elevel-new-search-results-more_sm.png" border="0" alt="Как пользоваться поиском сайта www.elevel.ru?" title="Как пользоваться поиском сайта www.elevel.ru?"  /></a> </li>
   </ul>
 </ul>
 
<div class="border">&nbsp;</div>
 
<p>Также вы можете попробовать найти необходимую страницу на <a href="/sitemap.php" title="карта сайта www.elevel.ru" >карте сайта</a>.</p>
 
<div class="border">&nbsp;</div>
 
<p>Если у Вас остались неразрешённые вопросы, Вы можете обратиться в службу поддержки сайта &ndash; <a href="mailto:webmaster@elevel.ru" >webmaster@elevel.ru</a></p>
 
<br />
 
<br />
<?if($_REQUEST["print"] !== "Y"){?>
 <a href="/help/" title="Вернуться в раздел Помощь" class="srvLink3" >назад</a>
 <?}?>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>