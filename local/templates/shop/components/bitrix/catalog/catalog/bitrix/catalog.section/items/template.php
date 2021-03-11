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
					<ul class="catalog-items">
						<?
						foreach ($arResult['ITEMS'] as $key => $arItem)
						{
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
							$strMainID = $this->GetEditAreaId($arItem['ID']);

                            $JSproductInfo[$arItem["ID"]] = [
                                'id' => $arItem["ID"],
                                'name' => $arItem["NAME"],
                                'price' => $arItem["MIN_PRICE"]["DISCOUNT_VALUE"],
                            ];
						?>
							<?/*<pre><?print_r($arItem)?></pre>*/?>
							<li id="<? echo $strMainID; ?>">
								<a class="visual ajax_stop" href="<?=$arItem['DETAIL_PAGE_URL']; ?>" style="width: 292px; height: 292px; display: table-cell; vertical-align: middle">
									<img src="<?=$arItem['PICTURE']; ?>" alt=""/>
									<?if ($articul = $arItem["PROPERTIES"]["MARKING_PRODUCER"]["VALUE"]):?>
										<span class="article">Артикул: <?=$articul?></span>
									<?endif;?>
								</a>

								<a href="<?=$arItem['DETAIL_PAGE_URL'];?>#availability">
									<span class="text-available">
										<?if ($arItem["STORES_COUNT"] > 0):?>
											Доступно в <?=$arItem["STORES_COUNT"]?> <?=($arItem["STORES_COUNT"] == 1)?"магазине":"магазинах"?>
										<?else:?>
											<?=$arItem["TXT_NOT_AVAILABLE"]?>
										<?endif;?>
									</span>
								</a>

								<div class="text-block" style="margin-top: 14px;">
									<?if ($articul):?>
										<span class="tablet-text article">Артикул: <?=$articul?></span>
									<?endif;?>
									<span class="qty">Количество: <?=$arItem["CATALOG_QUANTITY"]?></span>
									<strong class="title"><a class="ajax_stop" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></strong>
									<?if ($arItem["CATALOG_QUANTITY"] > 0):?>
										<span class="tablet-text available">В наличии</span>
									<?else:?>
										<span class="tablet-text available not-available">Под заказ</span>
									<?endif;?>
									<strong class="price text-orange">
										<?if ($arItem["PROPERTIES"]["RAZPRODAZHA"]["VALUE"]=="Y"):?>
											<span class="old-price" id="price<?=$arItem["ID"]?>">
												<?$arItemSale=1.5*$arItem["MIN_PRICE"]["DISCOUNT_VALUE"]?>
												<?=number_format($arItemSale, 2, ".", " ")?>&nbspруб.
											</span><br>
										<?endif;?>
										<span id="price<?=$arItem["ID"]?>">
											<?//=number_format($arItem["MIN_PRICE"]["DISCOUNT_VALUE"], 2, ".", " ")
echo $arItem["MIN_PRICE"]["PRINT_VALUE"];
?>
										</span> 
									</strong>
									<a class="btn-buy add2basket quantity_one" id="add<?=$arItem["ID"]?>" href=""><span class="center"><span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span><span class="center">Купить</span></span></a>
								</div>
								<div class="item-modal" id="modal<?=$arItem["ID"]?>">
									<div class="item-modal-close"></div>
									<h3>Товар добавлен в корзину</h3>
									<a href="" class="item-modal-link-close">Вернуться в каталог</a>
									<a href="<?=$arParams['BASKET_URL']?>" class="confirm">Перейти к оформлению заказа</a>
								</div>
							</li>
						<?
						}
						?>
					</ul>
                    <script>
                      window.productInfo = <?= \Bitrix\Main\Web\Json::encode($JSproductInfo)?>;
                    </script>
					<?
					if ($arParams["DISPLAY_BOTTOM_PAGER"])
					{
						?><? echo $arResult["NAV_STRING"]; ?><?
					}
					elseif($arParams["~NAV_STRING"]){
						echo $arParams["~NAV_STRING"];
					}	
				}
				else echo "К сожалению товаров, удовлетворяющих условию поиска, не найдено.";
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