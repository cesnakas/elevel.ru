<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������");
?><div>
<?
$ServiceIBlockID = 9;
$CurrentSectionID = IntVal($_REQUEST['sid']);
CModule::IncludeModule("iblock");

$CurrentSection = GetIBlockSection($CurrentSectionID);
$APPLICATION->AddChainItem($CurrentSection['NAME']);
$APPLICATION->SetTitle($CurrentSection['NAME']);
?> 
<br>
<div>
  <h1><?=$CurrentSection['NAME']?></h1>
<?=$CurrentSection['DESCRIPTION']?> </div>
<?
$items = GetIBlockElementList($ServiceIBlockID, $CurrentSectionID);
while($arItem = $items->GetNext())
{
?> 
<div><?if(IntVal($arItem['PREVIEW_PICTURE']) > 0):?> <img class="service" src="&lt;img src='/bitrix/images/fileman/htmledit2/php.gif' __bxtagname='php_disabled' __bx_code='0006'&gt;" /> <?endif;?> <ul class="list_sol"><li>
  <h3><a class="gray" href="/company/vacancy/<?=$arItem['IBLOCK_SECTION_ID']?>/<?=$arItem['ID']?>/" ><?=$arItem['NAME']?></a></h3></li></ul>

  <div><?=$arItem['PREVIEW_TEXT']?></div>
</div>
<?
}
?> 
<br />
�� ������ ��������� <a href="/anketa.xls" >������</a> � ������� �� � ���� ������ � ��� � <noindex><a title="�������� ������ ������������ ������ �� ������ � ����������" href="mailto:e.aistova@KROKUS.RU" >����� �� ������ � ����������</a></noindex> ���. (495) 258-80-85. 
<br />

<br />
<a href="/company/vacancy/" class="srvLink3">�����</a> 
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>