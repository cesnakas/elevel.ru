<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "поиск, помощь, как восстановить, как восстановить пароль, восстановление пароля");
$APPLICATION->SetPageProperty("description", "Помощь в восстановлении пароля на сайте Эlevel");
$APPLICATION->SetTitle("Как восстановить пароль?");
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
 
<h1>Как восстановить пароль?</h1>
<p>1. Нажмите в верхнем правом углу на &quot;Вход&quot;</p>
<center><a href="/images/help/elevel-vosst-password-1.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="Как восстановить пароль?" ><img src="/images/help/elevel-vosst-password-1_sm.png" alt="Как восстановить пароль?" title="Как восстановить пароль?" class="sol_bp"  /></a></center>
<p>2. В открывшемся окне нажмите на &quot;Забыли пароль?&quot;</p>
<center><img src="/images/help/elevel-vosst-password-2.png" alt="Как восстановить пароль?" title="Как восстановить пароль?" class="sol_bp"></center>
<p>3. В открывшемся окне введите Ваш e-mail, на который вы регистрировались и нажмите &quot;Восстановить&quot;</p>
<center><img src="/images/help/elevel-vosst-password-3.png" alt="Как восстановить пароль?" title="Как восстановить пароль?" class="sol_bp"></center>
<br>
<center><img src="/images/help/elevel-vosst-password-4.png" alt="Как восстановить пароль?" title="Как восстановить пароль?" class="sol_bp"></center>
<p>4. Проверьте свой почтовый ящик, на который отправлено письмо с инструкциями по восстановлению пароля</p>
<center><a href="/images/help/elevel-vosst-password-5.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="Как восстановить пароль?" ><img src="/images/help/elevel-vosst-password-5_sm.png" alt="Как восстановить пароль?" title="Как восстановить пароль?" class="sol_bp"  /></a></center>
<p>5. Перейдите по ссылке: <a href="/personal/user.php?change_password=yes">http://elevel.ru/personal/user.php?change_password=yes</a></p>
<p>6. Введите Ваш логин;</p>
<p>7. Вставьте код контрольной строки, присланный в письме;</p>
<p>8. Введите новый пароль 2 раза;</p>
<p>9. Нажмите &quot;Изменить пароль&quot;;</p>
<center><img src="/images/help/elevel-vosst-password-6.png" alt="Как восстановить пароль?" title="Как восстановить пароль?" class="sol_bp"></center>
<h2>Поздравляем! <br>
Вы изменили пароль! На почту прийдет письмо подтверждения смены пароля!</h2>


 
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