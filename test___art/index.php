<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
?>
<div id="simul_form">
    <div class="info"></div>
    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
    <?
    $APPLICATION->IncludeComponent(
            "doal:form.result.new", "", Array(
        "SEF_MODE" => "N", // �������� ��������� ���
        "WEB_FORM_ID" => "SIMPLE_FORM_1", // ID ���-�����
        "LIST_URL" => "/sendquery/sended.php", // �������� �� ������� �����������
        "EDIT_URL" => "/sendquery/sended.php", // �������� �������������� ����������
        "SUCCESS_URL" => "/sendquery/sended.php", // �������� � ���������� �� �������� ��������
        "CHAIN_ITEM_TEXT" => "", // �������� ��������������� ������ � ������������� �������
        "CHAIN_ITEM_LINK" => "", // ������ �� �������������� ������ � ������������� �������
        "IGNORE_CUSTOM_TEMPLATE" => "Y", // ������������ ���� ������
        "USE_EXTENDED_ERRORS" => "Y", // ������������ ����������� ����� ��������� �� �������
        "CACHE_TYPE" => "N", // ��� �����������
        "CACHE_TIME" => "3600", // ����� ����������� (���.)
        "VARIABLE_ALIASES" => array(
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        )
            )
    );
    ?>

</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>