<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "����� ������, ����� elevel, ����� �level, ��������, �����������, ����� ���������, ������ �����������");
$APPLICATION->SetPageProperty("not_show_nav_chain", "Y");
$APPLICATION->SetPageProperty("keywords", "����� ������, ����� elevel, ����� �level, ��������, �����������, ����� ���������, ������ �����������");
$APPLICATION->SetPageProperty("description", "������ � ����������� �� ����� �level");
$APPLICATION->SetTitle("������ � ����������� �level");
?><strong>���������� ����������� �������� �level � Schneider Electri� �����-������ &laquo;��������&raquo; 7-8 ������� 2012�.</strong> 
<table width="100%"> 
  <tbody> 
    <tr><td><?$APPLICATION->IncludeComponent("bitrix:voting.form",".default",Array(
		"VOTE_ID" => "25", 
		"VOTE_RESULT_TEMPLATE" => "/bitrix/templates/.default/components/bitrix/voting.current/first_vote/result.php?VOTE_ID=#VOTE_ID#", 
		"CACHE_TYPE" => "A", 
		"CACHE_TIME" => "3600" 
	)
);?> </td></tr>
   </tbody>
 </table>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>