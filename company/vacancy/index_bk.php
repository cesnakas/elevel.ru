<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������");

?>
<div class="vacancy-box">
<h1>��������</h1>

<p>� ����� �������� ������ ���� ���, ���� ������ �������� ����� ����� �level, � ������ �������� �������� ������ ����� ������� ���������������, �������� ������� � ������������ �� ���������.</p><br>
<p><strong>��� ����� �level ��� ������� �� ���?</strong></p><br>
<table width="100%" cellspacing="2" border="0"> 
  <tbody> 
    <tr><td width="5%"><a href="/help/how_to_pay.php" title="��� �������� �����?" ><img hspace="5" src="/i/1s.png" vspace="5" border="0" alt="��� �������� �����?" title="��� �������� �����?"  /></a></td><td width="85%"> ��� ��������, ��� ����� ���� � ���������� ������� ����� ����������. ��� ����� � ��� ����� ��� ���� ���. </td></tr>
   
    <tr><td width="5%"><a href="/help/delivery.php" title="������� �������� ������" ><img hspace="5" src="/i/2s.png" vspace="5" border="0" alt="������� �������� ������" title="������� �������� ������"  /></a></td><td width="85%"> ��� ����� ������������ ������ � ������������ ����������� ��� �� �������. </td></tr>
   
    <tr><td width="5%"><a href="/help/delivery2.php" title="������� �������� ������ ��� ��������-��������" ><img hspace="5" src="/i/3s.png" vspace="5" border="0" alt="������� �������� ������ ��� ��������-��������" title="�������� �������� ������ ��� ��������-��������"  /></a></td><td width="85%"> ��� ����������� ����� � ������������, ��������� � �����������. </td></tr>
   
    <tr><td width="5%"><a href="/help/feed.php" title="��� ����������� �� ������� �� ����� www.elevel.ru?" ><img hspace="5" src="/i/4s.png" vspace="5" border="0" alt="��� ����������� �� ������� �� ����� www.elevel.ru?" title="��� ����������� �� ������� �� ����� www.elevel.ru?"  /></a></td><td width="85%"> ��� �� ����������� ����������� ������� � ��������� ����� ����. </td></tr>
   
    <tr><td width="5%"><a href="/help/search.php" title="��� ������ �� ����� www.elevel.ru?" ><img hspace="5" src="/i/5s.png" vspace="5" border="0" alt="��� ������ �� ����� www.elevel.ru?" title="��� ������ �� ����� www.elevel.ru?"  /></a></td><td width="85%"> ��� ��������������� � ���������������� ����. </td></tr>
   
    <tr><td width="5%"><a href="/help/how_to_order.php" title="��� �������� �� ����� www.elevel.ru?" ><img hspace="5" src="/i/6s.png" vspace="5" border="0" alt="��� �������� �� ����� www.elevel.ru?" title="��� �������� �� ����� www.elevel.ru?"  /></a></td><td width="85%"> �, �������, ��� - ����� ��� ��������! </td></tr>
   </tbody>
 </table><br>
<p>�level ��� ������� ������������ - ��� ����������� ����������� ���� ���������, ��������� � ������ ����� ������� �����������. ��� ������������ ������������ � ��� ���������������� ����� � ������� �����������. ������ � �level � ������ ������� � ������������ ������� �������.</p><br>
<p>�� ��������� ����� �����������, ������ ����� ���� � ��������� �� ��������� ����, ��� �� � ������� ����������������. ��� ��� ��� �� ����� ������� �������� � ������ ����, � �������������.</p><br>
<div class="border">�</div>
<p><strong>���������������, �� ��� ��� � �level!</strong></p>
<p align="right"><em>�������� �� ��������� ����� �.�.</em></p><br>
<?
$ServiceIBlockID = 9;
CModule::IncludeModule("iblock");
$items = GetIBlockSectionList($ServiceIBlockID, IntVal($_REQUEST['sid']));
while($arItem = $items->GetNext())
{
?>
<div class="service">
<?if(IntVal($arItem['PICTURE']) > 0):?>
	<img src="<?=CFile::GetPath($arItem['PICTURE']);?>"  />
<?endif;?>
	<h2><a href="/company/vacancy/<?=$arItem['ID']?>/"><?=$arItem['NAME']?></a></h2>
	<?=$arItem['DESCRIPTION']?>
</div>
<?
$Elements = GetIBlockElementList($ServiceIBlockID, $arItem['ID']);
while($element = $Elements->GetNext())
{
?>
<?if(IntVal($element['PREVIEW_PICTURE']) > 0):?>
	<img src="<?=CFile::GetPath($element['PREVIEW_PICTURE']);?>"  />
<?endif;?>
	<ul class="list_sol"><li><a class="gray" href="/company/vacancy/<?=$arItem['ID'];?>/<?=$element['ID']?>/"><?=$element['NAME']?></a></li></ul>
	<?=$element['PREVIEW_TEXT']?>

<?
}
?>
<?
}
?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>