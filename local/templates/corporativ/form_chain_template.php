<?
$sChainProlog = "";   // HTML ��������� ����� ������������� ��������
$sChainBody = "";     // ����� ������������� �������
$sChainEpilog = "";   // HTML ��������� ����� ������������� �������

// �����������
if ($ITEM_INDEX > 0)
   $sChainBody = " / ";

$sChainBody .= htmlspecialchars($TITLE, ENT_COMPAT, "cp1251");
?>