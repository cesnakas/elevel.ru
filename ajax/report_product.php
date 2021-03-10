<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
global $APPLICATION;
    if ($_POST["mail"] && $_POST["name"] && $_POST["product_name"]) {
        if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
            $arEventFields = array(
                "EMAIL" =>$_POST["mail"],
                "USER_NAME" => $APPLICATION->ConvertCharset($_POST["name"], "UTF-8", "Windows-1251"),
                "PRODUCT_NAME"=> $APPLICATION->ConvertCharset($_POST["product_name"], "UTF-8", "Windows-1251"),
                "PRODUCT_URL"=>$APPLICATION->ConvertCharset($_POST["product_url"], "UTF-8", "Windows-1251"),
                "MESSAGE" => $APPLICATION->ConvertCharset($_POST["prich"], "UTF-8", "Windows-1251")
            );
            CEvent::Send("REPORT_PRODUCT", s1, $arEventFields);
            echo "send";
        }
    }

?>