<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������ ���������");
?><div style="text-align: center; padding: 50px 0px; font-size: 16px;">��� ������ ������� ���������!</div>
<script type="text/javascript">/*
setTimeout('window.close();', 2000);*/
</script>
<?/*if($USER->IsAdmin()){
echo "<pre>";
   print_r($_SESSION);
echo "</pre>";
}*/?>
<?if($_SESSION["GA"] == 30):?>
<script>
$(document).ready(function() {
    _gaq.push(['_trackEvent', 'form', 'send', 'smart_house']);
});
</script>
<?elseif($_SESSION["GA"] == 7):?>
<script>
$(document).ready(function() {
    _gaq.push(['_trackEvent', 'form', 'send', 'electroboards']);
});
</script>
<?endif?>
<div style="text-align: center; padding: 50px 0px; font-size: 12px;">
�� ����� ������������� �������������� �� ���������� �������� 
<br>
<a href="javascript:history.back()" title="��������� �� ���������� ��������" style="text-align: center;"> 
������� ������ ���� ������� �� �������������� ��� �������������</a>
</div>

<script type="text/javascript">
setTimeout('history.back()', 3000); 
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>