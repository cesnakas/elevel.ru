<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Купить электрику");
$APPLICATION->SetTitle("Купить электрику ");
?> 



<?
global $APPLICATION;
if ( !is_object( $APPLICATION ) )
{
	$APPLICATION = new CMain;
}

$curDir = $APPLICATION->GetCurDir();

$arUrl = explode( '/', $curDir );
$brandCode = $arUrl[2];
$seriesCode = $arUrl[3];
?>

<? if ( $seriesCode ): ?>
	<?$APPLICATION->IncludeComponent(
		'magnitmedia:brands.detail',
		'',
		Array(
			'BRAND_CODE' => $brandCode,
			'SERIES_CODE' => $seriesCode
		),
		false
	);?>
<? elseif ( $brandCode ): ?>
	<?$APPLICATION->IncludeComponent(
	"magnitmedia:brands.detail", 
	"template1", 
	array(
		"BRAND_CODE" => $brandCode,
		"COMPONENT_TEMPLATE" => "template1"
	),
	false
);?>

<? endif; ?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>