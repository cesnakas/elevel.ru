<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "�����, ������, ��� ������������, ��� ������������ ������, �������������� ������");
$APPLICATION->SetPageProperty("description", "������ � �������������� ������ �� ����� �level");
$APPLICATION->SetTitle("��� ������������ ������?");
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
 
<h1>��� ������������ ������?</h1>
<p>1. ������� � ������� ������ ���� �� &quot;����&quot;</p>
<center><a href="/images/help/elevel-vosst-password-1.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="��� ������������ ������?" ><img src="/images/help/elevel-vosst-password-1_sm.png" alt="��� ������������ ������?" title="��� ������������ ������?" class="sol_bp"  /></a></center>
<p>2. � ����������� ���� ������� �� &quot;������ ������?&quot;</p>
<center><img src="/images/help/elevel-vosst-password-2.png" alt="��� ������������ ������?" title="��� ������������ ������?" class="sol_bp"></center>
<p>3. � ����������� ���� ������� ��� e-mail, �� ������� �� ���������������� � ������� &quot;������������&quot;</p>
<center><img src="/images/help/elevel-vosst-password-3.png" alt="��� ������������ ������?" title="��� ������������ ������?" class="sol_bp"></center>
<br>
<center><img src="/images/help/elevel-vosst-password-4.png" alt="��� ������������ ������?" title="��� ������������ ������?" class="sol_bp"></center>
<p>4. ��������� ���� �������� ����, �� ������� ���������� ������ � ������������ �� �������������� ������</p>
<center><a href="/images/help/elevel-vosst-password-5.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="��� ������������ ������?" ><img src="/images/help/elevel-vosst-password-5_sm.png" alt="��� ������������ ������?" title="��� ������������ ������?" class="sol_bp"  /></a></center>
<p>5. ��������� �� ������: <a href="/personal/user.php?change_password=yes">http://elevel.ru/personal/user.php?change_password=yes</a></p>
<p>6. ������� ��� �����;</p>
<p>7. �������� ��� ����������� ������, ���������� � ������;</p>
<p>8. ������� ����� ������ 2 ����;</p>
<p>9. ������� &quot;�������� ������&quot;;</p>
<center><img src="/images/help/elevel-vosst-password-6.png" alt="��� ������������ ������?" title="��� ������������ ������?" class="sol_bp"></center>
<h2>�����������! <br>
�� �������� ������! �� ����� ������� ������ ������������� ����� ������!</h2>


 
<div class="border">&nbsp;</div>
 
<p>����� �� ������ ����������� ����� ����������� �������� �� <a href="/sitemap.php" title="����� ����� www.elevel.ru" >����� �����</a>.</p>
 
<div class="border">&nbsp;</div>
 
<p>���� � ��� �������� ������������� �������, �� ������ ���������� � ������ ��������� ����� &ndash; <a href="mailto:webmaster@elevel.ru" >webmaster@elevel.ru</a></p>
 
<br />
 
<br />
<?if($_REQUEST["print"] !== "Y"){?>
 <a href="/help/" title="��������� � ������ ������" class="srvLink3" >�����</a>
 <?}?>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>