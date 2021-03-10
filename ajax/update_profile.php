<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?header('Content-Type: text/html; charset=utf-8');
    if ($_POST) {
        if ($_POST["ur"]){
            $full = explode(" ", $_POST["fio"]);
            $user = new CUser;
            $fields = Array(
              "NAME"              => $APPLICATION->ConvertCharset($full[1], "UTF-8", "Windows-1251"),
              "LAST_NAME"         => $APPLICATION->ConvertCharset($full[2], "UTF-8", "Windows-1251"),
              "SECOND_NAME"       => $APPLICATION->ConvertCharset($full[0], "UTF-8", "Windows-1251"), 
              "EMAIL"             => $APPLICATION->ConvertCharset($_POST["mail"], "UTF-8", "Windows-1251"),
              "PERSONAL_PHONE"    => $_POST["phone"],
              "PERSONAL_STREET"   => $APPLICATION->ConvertCharset($_POST["street"], "UTF-8", "Windows-1251"),
              "PERSONAL_CITY"     => $APPLICATION->ConvertCharset($_POST["city"], "UTF-8", "Windows-1251"),
              "UF_INN"     => $APPLICATION->ConvertCharset($_POST["UF_INN"], "UTF-8", "Windows-1251"),
              "UF_KPP"     => $APPLICATION->ConvertCharset($_POST["UF_KPP"], "UTF-8", "Windows-1251"),
              "WORK_PROFILE"     => $APPLICATION->ConvertCharset($_POST["WORK_PROFILE"], "UTF-8", "Windows-1251"),
              "WORK_POSITION"     => $APPLICATION->ConvertCharset($_POST["WORK_POSITION"], "UTF-8", "Windows-1251"),
              "WORK_COMPANY"     => $APPLICATION->ConvertCharset($_POST["WORK_COMPANY"], "UTF-8", "Windows-1251"),
              );
            if ($user->Update($_POST["ID_USER"], $fields)){
                echo "update_ok";
            }
            else {
                echo "error";
            }
        }  
        else {
        $full = explode(" ", $_POST["fio"]);
        $date = explode("/", $_POST["birthday"]);
            $user = new CUser;
            $fields = Array(
              "NAME"              => $APPLICATION->ConvertCharset($full[1], "UTF-8", "Windows-1251"),
              "LAST_NAME"         => $APPLICATION->ConvertCharset($full[2], "UTF-8", "Windows-1251"),
              "SECOND_NAME"       => $APPLICATION->ConvertCharset($full[0], "UTF-8", "Windows-1251"), 
              "EMAIL"             => $APPLICATION->ConvertCharset($_POST["mail"], "UTF-8", "Windows-1251"),
              "PERSONAL_PHONE"    => $_POST["phone"],
              "PERSONAL_STREET"   => $APPLICATION->ConvertCharset($_POST["street"], "UTF-8", "Windows-1251"),
              "PERSONAL_CITY"     => $APPLICATION->ConvertCharset($_POST["city"], "UTF-8", "Windows-1251"),
              "WORK_PROFILE"     => $APPLICATION->ConvertCharset($_POST["WORK_PROFILE"], "UTF-8", "Windows-1251"),
              "PERSONAL_BIRTHDAY" => $date[0].".".$date[1].".".$date[2],
              );
            if ($user->Update($_POST["ID_USER"], $fields)){
                echo "update_ok";
            }
            else {
                echo "error";
            }
        }
    }
?>