<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "��������, �������, ��� �����������, rss");
$APPLICATION->SetPageProperty("description", "������ �� �������� �� ������� �����");
$APPLICATION->SetTitle("��� ����������� �� �������");
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
 
<h1>��� ����������� �� ������� �����?</h1>
 
<br />
 
<p>����������� �� ������� �� ������ � ������������� �� ����, ���������������� �� ����� ��� ���. </p>
 
<ul class="list_sol"> 
  <li><noindex>������� ����� ������������ � ������� RSS (<a href="http://ru.wikipedia.org/wiki/RSS" target="_blank" rel="nofollow" >http://ru.wikipedia.org/wiki/RSS</a>���� <a href="http://www.orss.ru" rel="nofollow" >http://www.orss.ru</a>).</noindex></li>
 
  <li>��� �������� ��� ���������� �������� rss-����� � ����� �������� ������� (�����: <strong><i>http://elevel.ru/company/news/rss/</i></strong>), ���� ������ rss-����� ����� �������* - ��� ����� � ����� �������� �� ������� �������� � ������ ���� ������� �� ������ rss <img src="/i/pic20a.gif" width="15" height="15"  />. 
    <br />
   
    <br />
   <a href="/images/help/elevel-new-rss-podpiska.png" class="highslide" onclick="return hs.expand(this, { align: 'center' })" title="�������� �� RSS ����� �������� ����� www.elevel.ru" ><img src="/images/help/elevel-new-rss-podpiska_sm.png" border="0" alt="�������� �� RSS ����� �������� ����� www.elevel.ru" title="�������� �� RSS ����� �������� ����� www.elevel.ru"  /></a> 
    <br />
   
    <br />
   </li>
 
  <li>����� �������� ����������� ������������ ���������. 
    <br />
   </li>
 </ul>
 <sub>*� ����������� ��������� ������� ���������� rss-reader, �������� ����������� ������ ����� � ��� ��������� Internet Explorer (� 7-�� ������), FireFox � Opera. ��������� �������� �� ���� ������������� rss.</sub> 
<br />
 
<br />
 ���� � ��� �������� ������������� �������, �� ������ ���������� � ������ ��������� ����� &ndash; <a href="mailto:webmaster@elevel.ru" >webmaster@elevel.ru</a> 
<br />
 
<br />
<?if($_REQUEST["print"] !== "Y"){?>
 <a href="/help/" title="��������� � ������ ������" class="srvLink3" >�����</a>
 <?}?>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>