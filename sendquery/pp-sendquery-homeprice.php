<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������� ���������");
?><div id="pp-sendquery-homeprice" class="popup" style="width: 840px; height: 400px;">
<script type="text/javascript" src="/js/home-form.js"></script>
<table class="serv-list" style="float: left; margin-left: 5px;">
	<tr>
		<th>�������</th>
		<th>���-�� �����</th>
		<th>�����/����</th>
	</tr>
	<tr>
		<th colspan="3" class="caption">���������� ����������</th>
	</tr>
	<tr>
		<td class="1st"><a title="��������������� ���������/���������� ������������, �����������, ������� ��������������� ������������ � ������� � �.�. ��������, � ����� ����������� ����������� ������� ��� ������ ��������� ���������: ����������� ����, ��������� ��������� ���������, �������� ����������.">�������� ���������</a></td>
		<td><input type="text" name="count1" value="0" /></td>
		<td><input type="text" name="summ1" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="��������������� ��������� ������������ � ������������ ������������� ������� ����� ��� � �������� ��������. ��������� ������������, ��������, � �������� ��� ����������� ������ ����� ��� ��������� �����������.">������� ���������</a></td>
		<td><input type="text" name="count2" value="0" /></td>
		<td><input type="text" name="summ2" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="�������������� ��������� ����� ��� ��������� ��������. ��������, � ������ ����� �� �������� ��� ������� �������.">������ ��������</a></td>
		<td><input type="text" name="count3" value="0" /></td>
		<td><input type="text" name="summ3" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="����� �������� ������� ������������ �������� ������ ��������� ��������� � ����. ��������, ����� �������� ���� - ����������� ����������� ����, ������������ ��������� ����, ����������� �����, ���������� ����������">�������� �����</a></td>
		<td><input type="text" name="count4" value="0" /></td>
		<td><input type="text" name="summ4" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">���������� ���������</th>
	</tr>
	<tr>
		<td class="1st"><a title="�������������� ��������/�������� ���� ����� �������� � ����� ��� � ������. ������� ���������� ������� �� ������ � ����������� ����.">���������� ������, �������</a></td>
		<td><input type="text" name="count5" value="0" /></td>
		<td><input type="text" name="summ5" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="�������� ������������� ���������� ��������, ��������, �� ������ � ��������������, ��������, �� ������ ��������.">���������� ��������</a></td>
		<td><input type="text" name="count6" value="0" /></td>
		<td><input type="text" name="summ6" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">������-��������</th>
	</tr>
	<tr>
		<td class="1st"><a title="����������� ��������� �������������� ����������� � ������ �������, ������������� ����������� ������ ���������, ��������, ������� � ������, ����������, ����� �� ���� � ��������, ����� ������ ���.">���������� ����������</a></td>
		<td><input type="text" name="count7" value="0" /></td>
		<td><input type="text" name="summ7" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="����������� ��������� �������������� ����������� � ������ �������, ������������� ����������� ������ ���������, ��������, ������� � ������, ����������, ����� �� ���� � ��������, ����� ������ ���.">���������� ������� ������</a></td>
		<td><input type="text" name="count8" value="0" /></td>
		<td><input type="text" name="summ8" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">��������� ������������</th>
	</tr>
	<tr>
		<td class="1st"><a title="��� ����������� �������� ����, ������������� ������������� ������ ������� � �������� ����, ������������ ��� ����� ���������� ������������ �����.">�������� �������� ����</a></td>
		<td><input type="text" name="count9" value="0" /></td>
		<td><input type="text" name="summ9" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="����������� ������ ����� ������ ������� ������, ���� ���-�� ������ �����, ����������� ��� ����� ��� �� ���������.">�������� �������������</a></td>
		<td><input type="text" name="count10" value="0" /></td>
		<td><input type="text" name="summ10" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">���������� �������� ������ ���</th>
	</tr>
	<tr>
		<td class="1st"><a title="����������� ��������� ��������� ������������� � ���� � ������ ������">������������� ������������� �����</a></td>
		<td><input type="text" name="count11" value="0" /></td>
		<td><input type="text" name="summ11" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="��������� �������������� ��������� ���� ������������ � ���� � �������������� ����������������� � ����.">��������� ��������� ������</a></td>
		<td><input type="text" name="count12" value="0" /></td>
		<td><input type="text" name="summ12" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th colspan="3" class="caption">��������� ����������</th>
	</tr>
	<tr>
		<td class="1st"><a title="������� ����� ��������� � ���� �� �������� � �������� �� ��������� ��������. �� ����� ������ �������� ���-������ ��� �������� � ����, ��������, ���������.">�� ��������</a></td>
		<td><input type="text" name="count13" value="0" /></td>
		<td><input type="text" name="summ13" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<td class="1st"><a title="�� ������ ����� ����������� ���������� �������� ���������� �� ���������� � ���� � ��������� �� �������� �� ������ ��� � �������.">�� ���������</a></td>
		<td><input type="text" name="count14" value="0" /></td>
		<td><input type="text" name="summ14" value="0" disabled="disabled" readonly="readonly" class="summ" /></td>
	</tr>
	<tr>
		<th>�����:</th>
		<th><input type="text" name="countall" value="0" disabled="disabled" readonly="readonly" class="summ" /></th>
		<th><input type="text" name="summall" value="0" disabled="disabled" readonly="readonly" class="summ" /></th>
	</tr>
	<tr>
		<td colspan=3><input type="button" value="�������" onclick="_formGetFields();"></td>
	</tr>
</table>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
	"SEF_MODE" => "N",	// �������� ��������� ���
	"WEB_FORM_ID" => "8",	// ID ���-�����
	"LIST_URL" => "/sendquery/sended.php",	// �������� �� ������� �����������
	"EDIT_URL" => "/sendquery/sended.php",	// �������� �������������� ����������
	"SUCCESS_URL" => "/sendquery/sended.php",	// �������� � ���������� �� �������� ��������
	"CHAIN_ITEM_TEXT" => "",	// �������� ��������������� ������ � ������������� �������
	"CHAIN_ITEM_LINK" => "",	// ������ �� �������������� ������ � ������������� �������
	"IGNORE_CUSTOM_TEMPLATE" => "N",	// ������������ ���� ������
	"USE_EXTENDED_ERRORS" => "N",	// ������������ ����������� ����� ��������� �� �������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"VARIABLE_ALIASES" => array(
		"WEB_FORM_ID" => "WEB_FORM_ID",
		"RESULT_ID" => "RESULT_ID",
	)
	)
);?>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>