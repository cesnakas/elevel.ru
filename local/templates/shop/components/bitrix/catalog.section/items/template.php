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
					<ul class="catalog-items">
						<?
						foreach ($arResult['ITEMS'] as $key => $arItem)
						{
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
							$strMainID = $this->GetEditAreaId($arItem['ID']);
							
						?>
							<?/*<pre><?print_r($arItem)?></pre>*/?>
							<li id="<? echo $strMainID; ?>">
								<a class="visual" href="<?=$arItem['DETAIL_PAGE_URL']; ?>">
									<img src="<?=$arItem['PICTURE']; ?>" alt=""/>
									<span class="text-available">
										<?if ($arItem["STORES_COUNT"] > 0):?>
											�������� � <?=$arItem["STORES_COUNT"]?> ���������
										<?else:?>
											��� �����
										<?endif;?>
									</span>
									<?if ($articul = $arItem["PROPERTIES"]["MARKING_PRODUCER"]["VALUE"]):?>
										<span class="article">�������: <?=$articul?></span>
									<?endif;?>
								</a>
								<div class="text-block">
									<?if ($articul):?>
										<span class="tablet-text article">�������: <?=$articul?></span>
									<?endif;?>
									<span class="qty">����������: <?=$arItem["CATALOG_QUANTITY"]?></span>
									<strong class="title"><a title="<?=$arItem["NAME"]?>" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></strong>
									<?if ($arItem["CATALOG_QUANTITY"] > 0):?>
										<span class="tablet-text available">� �������</span>
									<?else:?>
										<span class="tablet-text available not-available">��� �����</span>
									<?endif;?>
									<strong class="price text-orange">
										<span id="price<?=$arItem["ID"]?>">
											<?=number_format($arItem["MIN_PRICE"]["DISCOUNT_VALUE"], 2, ".", " ")?>
										</span> ���.
									</strong>
									<a class="btn-buy add2basket quantity_one" id="add<?=$arItem["ID"]?>" href=""><span class="center"><span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span><span class="center">������</span></span></a>
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
				else echo "� ��������� �������, ��������������� ������� ������, �� �������.";
				?>
			</div>
		</div>
	</fieldset>
</form>