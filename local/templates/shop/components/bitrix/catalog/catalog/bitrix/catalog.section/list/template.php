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
							
							$price = $arItem['ITEM_PRICES'][$arItem['ITEM_PRICE_SELECTED']];
							// echo "<pre>"; print_r($arItem); echo "</pre>";
						?>
							<?/*<pre><?print_r($arItem)?></pre>*/?>
							<li id="<? echo $strMainID; ?>">
								<div class="table-cell visual-cell">
									<a class="visual ajax_stop" href="<?=$arItem['DETAIL_PAGE_URL']; ?>">
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
										<strong class="title"><a class="ajax_stop" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></strong>
										<?if ($arItem["CATALOG_QUANTITY"] > 0):?>
											<span class="tablet-text available">В наличии</span>
										<?else:?>
											<span class="tablet-text available not-available"><noindex>Под заказ</noindex></span>
										<?endif;?>
																			<? $articulPart = "RM17";
$namePart = "XB5 Кнопка";
if(strpos($articul, $articulPart) !== false || strpos($arItem["NAME"], $namePart) !== false){	?>				
	
											 <span>
											 <span style="color:red;size:18px;font-weight: 700;">
		<b>АКЦИЯ, СКИДКА 15%</b>
		</span> </span> 
												
<?	}	?>
										<span class="price">
											<span id="price<?=$arItem["ID"]?>">
												<?//=number_format($arItem["MIN_PRICE"]["DISCOUNT_VALUE"], 2, ".", " ")?>
											    <?=number_format($price['BASE_PRICE'], 2, ".", " ")?>
											</span> руб.
										</span>
									</div>
									<div class="table-cell">
										<input readonly class="spinner" data-multiplicity="<?=$arItem['MEASURE_RATIO']?>" id="<?=$arItem["ID"]?>" type="text" value="<?=$price['MIN_QUANTITY']?>" />
										 
										<span class="item_measure"><?=$arItem["ITEM_MEASURE"]["TITLE"]?></span>
									</div>

									<div class="table-cell">
										 <span class="sum">
											<span id="sum<?=$arItem["ID"]?>">
												<?=number_format($price['BASE_PRICE'], 2, ".", " ")?>
												<?//=number_format($arItem["MIN_PRICE"]["DISCOUNT_VALUE"]*$arItem['MEASURE_RATIO'], 2, ".", " ")?>
											</span> Р
										</span>
									</div>
									<div class="table-cell button-block">
										<button class="button add2basket" id="add<?=$arItem["ID"]?>" type="button"><span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span><span class="button-title">Купить</span></button>
										<?if ($arItem["STORES_COUNT"] > 0):?>
											В наличии: <?=$arItem["STORES_COUNT"]?> магазинов
										<?endif;?>
										
										<div class="item-modal" id="modal<?=$arItem["ID"]?>">
											<div class="item-modal-close"></div>
											<h3>Товар добавлен в корзину</h3>
											<a href="" class="item-modal-link-close">Вернуться в каталог</a>
											<a href="<?=$arParams['BASKET_URL']?>" class="confirm">Перейти к оформлению заказа</a>
										</div>
										
									</div>
									<a class="btn-buy add2basket quantity_one" id="add<?=$arItem["ID"]?>" href=""><span class="center"><span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span><span class="button-title">Купить</span></span></a>
									<div class="item-modal-mobail">
										<div class="item-modal" id="modalmobail<?=$arItem["ID"]?>">
											<div class="item-modal-close"></div>
											<h3>Товар добавлен в корзину</h3>
											<a href="" class="item-modal-link-close">Вернуться в каталог</a>
											<a href="<?=$arParams['BASKET_URL']?>" class="confirm">Перейти к оформлению заказа</a>
										</div>
									</div>
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