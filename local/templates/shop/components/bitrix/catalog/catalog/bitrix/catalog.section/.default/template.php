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
$this->setFrameMode(true);
?>
<pre><?//print_r($arResult)?></pre>
				<?
				if (!empty($arResult['ITEMS']))
				{
					$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
					$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
					$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));
				?>
					<ul class="catalog-list">
						<?
						foreach ($arResult['ITEMS'] as $key => $arItem)
						{
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
							$strMainID = $this->GetEditAreaId($arItem['ID']);
							
						?>
							<?/*<pre><?print_r($arItem)?></pre>*/?>
							<li id="<? echo $strMainID; ?>">
								<div class="table-cell visual-cell">
									<a class="visual" href="<?=$arItem['DETAIL_PAGE_URL']; ?>">
										<img src="<?=$arItem['PICTURE']; ?>" alt=""/>
										<?if ($arItem["STORES_COUNT"] > 0):?>
											<span class="text-available">Доступно в <?=$arItem["STORES_COUNT"]?> магазинах</span>
										<?endif;?>
										<?if ($articul = $arItem["PROPERTIES"]["MARKING_PRODUCER"]["VALUE"]):?>
											<span class="article">Артикул: <?=$articul?></span>
										<?endif;?>
									</a>
								</div>
								<div class="text-holder">
									<div class="table-cell text-block">
										<span class="qty">Количество: <?=$arItem["CATALOG_QUANTITY"]?></span>
										<?if ($articul):?>
											<span class="article">Артикул: <?=$articul?></span>
										<?endif;?>
										<strong class="title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></strong>
										<?if ($arItem["CATALOG_QUANTITY"] > 0):?>
											<span class="tablet-text available">В наличии</span>
										<?else:?>
											<span class="tablet-text available not-available">Под заказ</span>
										<?endif;?>
										<span class="price">
											<span id="price<?=$arItem["ID"]?>">
												<?=number_format($arItem["MIN_PRICE"]["DISCOUNT_VALUE"], 2, ".", " ")?>
											</span> руб.
										</span>
									</div>
									<div class="table-cell">
										 <input readonly class="spinner" id="<?=$arItem["ID"]?>" type="text" value="1" />
									</div>
									<div class="table-cell">
										 <span class="sum">
											<span id="sum<?=$arItem["ID"]?>">
												<?=number_format($arItem["MIN_PRICE"]["DISCOUNT_VALUE"], 2, ".", " ")?>
											</span> Р
										</span>
									</div>
									<div class="table-cell button-block">
										<button class="button <?if ($arItem["CATALOG_QUANTITY"] <= 0):?>disabled<?endif;?> add2basket" id="add<?=$arItem["ID"]?>" type="button"><span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span><span class="button-title">В корзину</span></button>
										<?if ($arItem["STORES_COUNT"] > 0):?>
											В наличии: <?=$arItem["STORES_COUNT"]?> магазинов
										<?endif;?>
									</div>
									<a class="btn-buy <?if ($arItem["CATALOG_QUANTITY"] <= 0):?>disabled<?endif;?> add2basket quantity_one" id="add<?=$arItem["ID"]?>" href=""><span class="center"><span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span><span class="button-title">Купить</span></span></a>
								</div>
							</li>
						<?
						}
						?>
					</ul>
					<?
					if ($arParams["DISPLAY_BOTTOM_PAGER"])
					{
						?><? echo $arResult["NAV_STRING"]; ?><?
					}
				}
				?>
			</div>
		</div>
	</fieldset>
</form>

<?if (isset($arResult["DESCRIPTION"]) && $arResult["DESCRIPTION"]):?>
	<?if (!isset($_GET["PAGEN_1"]) || $_GET["PAGEN_1"] == 1):?>
		<section class="section-popular">
			<div class="column">
				<?=$arResult["DESCRIPTION"]?>
			</div>
		</section>
	<?endif;?>
<?endif;?>