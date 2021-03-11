<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
LocalRedirect("/personal/");
$APPLICATION->SetTitle("rec.php");

?>
<a class="back_lk" href="/personal/">Вернуться в личный кабинет</a>
<h2 class="h2_lk">Изменить личные данные</h2>
<script src="/js/masked.js"></script>
<script type="text/javascript">
$(function(){
   $(".phone").mask("7 (999) 999-99-99");

});
</script>
<div class="col756">
    <div>
        <?$APPLICATION->IncludeComponent("bitrix:sale.personal.profile", "profile", array(
	        "SEF_MODE" => "N",
	        "SEF_FOLDER" => "/personal/profile/",
	        "PER_PAGE" => "2000",
	        "USE_AJAX_LOCATIONS" => "N",
	        "SET_TITLE" => "Y"
	        ),
	        false
        );?>
    </div>
</div>
<?$APPLICATION->IncludeComponent(
"bitrix:sale.viewed.product",
    "",
    Array(
        "VIEWED_COUNT" => "999",
        "VIEWED_NAME" => "Y",
        "VIEWED_IMAGE" => "Y",
        "VIEWED_PRICE" => "Y",
        "VIEWED_CURRENCY" => "default",
        "VIEWED_CANBUY" => "Y",
        "VIEWED_CANBASKET" => "Y",
        "VIEWED_IMG_HEIGHT" => "150",
        "VIEWED_IMG_WIDTH" => "150",
        "BASKET_URL" => "/personal/basket.php",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "SET_TITLE" => "N"
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>