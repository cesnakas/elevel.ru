<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Запрос отправлен");
?><div style="text-align: center; padding: 50px 0px; font-size: 16px;">Ваш запрос успешно отправлен!</div>
<script type="text/javascript">
setTimeout('history.back();', 2000);
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>