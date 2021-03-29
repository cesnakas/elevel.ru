<?
require($_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php');
$newlogin = 'rootuser';
$newemail = 'mail@mail.ru';
$newpassword = 'rootuser';
$group = array(1);
$user = new CUser;
$arFields = array(
    "EMAIL" => $newemail,
    "LOGIN" => $newlogin,
    "LID" => "ru",
    "ACTIVE" => "Y",
    "GROUP_ID" => $group,
    "PASSWORD" => $newpassword,
    "CONFIRM_PASSWORD" => $newpassword
);
$ID = $user->Add($arFields);
if (intval($ID) > 0) echo 'Администратор создан';
else echo $user->LAST_ERROR;
require($_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php');
?>