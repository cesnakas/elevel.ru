<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>

<script>	
	ymaps.ready(init);
	var myMap;
	var mag = <?=json_encode($arResult['PICKUP'])?>;
	
function init() {
    var myMap = new ymaps.Map("map", {
            center: [<?=$arResult['PICKUP'][0]['COORDS']?>],
            zoom: 8
        }
    );
	
	myMap.behaviors.disable('scrollZoom');
	<? foreach ( $arResult['PICKUP'] as $arItem ): ?>
	
		myMap.geoObjects
			.add(new ymaps.Placemark([<?=$arItem['COORDS']?>], {
				balloonContent: '<?=$arItem['NAME']?>',
				iconCaption: '<?=$arParams['CITY_NAME']?>'
			}, {
				preset: 'islands#redCircleDotIconWithCaption',
				iconCaptionMaxWidth: '50'
			}));
	
	<? endforeach; ?>
}
</script>

<h1 class="headline-border">Доставка</h1>
<form class="form-delivery" action="#">
	<fieldset>
		<div class="check-row delivery-choose">
		<?foreach($arResult["ITEMS"] as $key => $arItem):?>						
			<span class="mobile-row">
				<input <?if($key == 0):?>checked="checked"<?endif;?> class="<?=$arItem['CODE']?>" id="<?=$arItem['CODE']?>" name="delivery-type" type="radio"/>
				<div class="label-holder <?=$arItem['CODE']?>">
					<label for="<?=$arItem['CODE']?>"><?=$arItem['NAME']?></label>
				</div>
			</span>						
		<?endforeach;?>
		</div>
		<?foreach($arResult["ITEMS"] as $key => $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>			
			<div class="<?=$arItem['CODE']?>-block <?if($key == 0):?>visible<?endif;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<?if($arItem['CODE'] != 'pickup'):?>
					<?=$arItem['PREVIEW_TEXT'];?>			
				<?else:?>
				<div class="clearfix">
					<div class="icon">
						<img width="47" height="47" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxOC4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9ItCh0LvQvtC5XzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgMTI4MCAxMjgwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAxMjgwIDEyODAiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBvbHlnb24gZmlsbD0iI0ZENzYyMSIgcG9pbnRzPSI2MTMuOCw4ODEuNSAxMjMwLjUsNzI3LjcgMTA3Ni44LDExMC45IDgzNi40LDE3MC45IDkxMiw0NzkuOSA3NzguNSw1MTIuNSA3MDMsMjA0LjEgNDYwLDI2NC43IAkNCgkJIi8+DQoJPHBhdGggZmlsbD0iI0ZENzYyMSIgZD0iTTU5My42LDExMDIuNmw2ODYuNC0xNjdMMTI0Ny41LDgwMkw1NTkuOSw5NjkuM0wzMTUuNCwzLjNIMHYxMzcuNGgyMDguNGwyMTcuOCw4NjAuNg0KCQljLTAuNSwwLjEtMS4xLDAuMi0xLjYsMC40Yy03NC44LDE4LjYtMTIwLjMsOTQuNC0xMDEuNywxNjkuMnM5NC40LDEyMC4zLDE2OS4yLDEwMS43Yzc0LjgtMTguNiwxMjAuMy05NC40LDEwMS43LTE2OS4yDQoJCUM1OTMuOCwxMTAzLjEsNTkzLjcsMTEwMi44LDU5My42LDExMDIuNkw1OTMuNiwxMTAyLjZ6Ii8+DQo8L2c+DQo8L3N2Zz4NCg==" alt=""/>
					</div>
					<div class="text-block">
						<h2>700 пунктов выдачи по всей России от службы экспресс-доставки СДЭК!</h2>
						<h2>САМОВЫВОЗ СО СКЛАДА В Г.<?=$arParams['CITY_NAME']?></h2>
						<p>
							Только после подтверждения менеджером готовности товара к отгрузке!
							<br/>Уважаемые клиенты! Не тратьте, пожалуйста, свое драгоценное время, Не приезжайте в офис самовывоза без оформленного заказа.
							<br/><br/><strong>Центральный адрес склада для самовывоза: г. Москва, ул. Электродная, 13а</strong>
						</p>
					</div>
				</div>
				<div class="block-shops clearfix">
					<div id="map"></div>
					<div class="text-block">
						<h2>Список доступных пунктов самовывоза в вашем регионе</h2>
						<ul class="list">
							<?foreach($arResult['PICKUP'] as $pickup):?>
								<li><?=$pickup['NAME'];?></li>
							<?endforeach;?>						
						</ul>
					</div>
				</div>
				<?endif;?>
			</div>	
		<?endforeach;?>
	</fieldset>
</form>

<section class="section-terms">
	<h2 class="headline-border">Условия доставки</h2>
	<div class="columns-container">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_TEMPLATE_PATH."/include/help/rule_delivery1.php"
			)
		);?>		
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_TEMPLATE_PATH."/include/help/rule_delivery2.php"
			)
		);?>
	</div>
</section>

<div class="delivery-page-note">
В случае возврата или отказа от товара, денежные средства возвращаются только на расчетный счет.
</div>
