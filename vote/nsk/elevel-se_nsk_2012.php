<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "����� ������, ����� elevel, ����� �level, ��������, �����������, ����� ���������, ������ �����������");
$APPLICATION->SetPageProperty("not_show_nav_chain", "Y");
$APPLICATION->SetPageProperty("keywords", "����� ������, ����� elevel, ����� �level, ��������, �����������, ����� ���������, ������ �����������");
$APPLICATION->SetPageProperty("description", "������ � ����������� �� ����� �level");
$APPLICATION->SetTitle("������ � ����������� �level");
?><strong>����� �� �����������: ���������� �������� �level � Schneider Electri� AZIMUT ����� ������ 18 ������� 2012�.</strong> 
<table width="100%"> 
  <tbody> 
    <tr><td><?$APPLICATION->IncludeComponent(
	"bitrix:voting.current",
	"first_vote",
	Array(
		"CHANNEL_SID" => "votes",
		"VOTE_ID" => "20",
		"VOTE_ALL_RESULTS" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "",
		"CACHE_NOTES" => "",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
	)
);?> </td></tr>
   </tbody>
 </table>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>