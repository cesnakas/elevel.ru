<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?> 
<?$APPLICATION->IncludeComponent(
   "bitrix:system.auth.authorize",
   "auth1.0",
   Array(
      "REGISTER_URL" => "",
      "PROFILE_URL" => "",
      "SHOW_ERRORS" => "Y"
   ),
false
);?> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>