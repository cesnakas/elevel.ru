<?$APPLICATION->ShowBanner("BANNER_MONTH_NEW");?>
<?$APPLICATION->ShowBanner("LEFT_BANNER_6");?>

<?$APPLICATION->ShowBanner("LEFT_BANNER_1");?>
<div class="block208a"> 			
  <span class="left-menu-header">�����-����</span>
  <ul class="list1"><li><a href="/upload/Elevel_Price.xls">������� �����-���� � .xls</a> 
  <br>

  <a class="osl" href="/upload/Elevel_Price.xls">�� <?=date ("d.m.Y", filemtime($_SERVER['DOCUMENT_ROOT'].'/upload/Elevel_Price.xls'));?></a></li></ul>
</div>

<?$APPLICATION->IncludeComponent("bitrix:advertising.banner", "", array(
	"TYPE" => "PRICE_FILE",
	"CACHE_TYPE" => "A",
	"NOINDEX" => "Y",
	"CACHE_TIME" => "3600"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>
