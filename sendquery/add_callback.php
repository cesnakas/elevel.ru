<? require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"; ?>
<? //header("Content-type: text/html; charset=windows-1251");   ?>

<?

if ($_REQUEST["WEB_FORM_ID"] != "") {
    $WEB_FORM_ID = $_REQUEST["WEB_FORM_ID"];
} else {
    $WEB_FORM_ID = 1;
}
?>

<? $_REQUEST["web_form_submit"] = "Y"; ?>
<?

$APPLICATION->IncludeComponent("doal:form.result.new", "", Array(
    "SEF_MODE" => "N",
    "WEB_FORM_ID" => $WEB_FORM_ID,
    "LIST_URL" => "",
    "EDIT_URL" => "",
    "SUCCESS_URL" => "",
    "CHAIN_ITEM_TEXT" => "",
    "CHAIN_ITEM_LINK" => "",
    "IGNORE_CUSTOM_TEMPLATE" => "N",
    "USE_EXTENDED_ERRORS" => "Y",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
    "SEF_FOLDER" => "/",
    "VARIABLE_ALIASES" => Array(
        "WEB_FORM_ID" => "WEB_FORM_ID",
        "RESULT_ID" => "RESULT_ID",
    )
        )
);
?>