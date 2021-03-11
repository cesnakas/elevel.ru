<?$_POST["USER_LOGIN"] = iconv("UTF-8", "WINDOWS-1251", $_POST["USER_LOGIN"]);?>
<?$_REQUEST["USER_LOGIN"] = iconv("UTF-8", "WINDOWS-1251", $_REQUEST["USER_LOGIN"]);?>
<?$_POST["USER_PASSWORD"] = iconv("UTF-8", "WINDOWS-1251", $_POST["USER_PASSWORD"]);?>
<?$_REQUEST["USER_PASSWORD"] = iconv("UTF-8", "WINDOWS-1251", $_REQUEST["USER_PASSWORD"]);?>
<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";?>
<script>
$(document).ready(function() {
    $('#authriz,#authriz2').click(function() {
        $('#fade, #container2, .popup398').css('display','none');
    });
});
</script>
<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "authorize_res", 
        array("REGISTER_URL"=>"/auth/","PROFILE_URL"=>"/personal/profile/","SHOW_ERRORS"=>"Y"),false);?>		
