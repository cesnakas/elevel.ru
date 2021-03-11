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


<!-- arParams <pre><?//print_r($arParams)?></pre> -->
<!-- arResult <pre><?//print_r($arResult)?></pre> -->

<form class="form-catalog" name="<?echo $arResult["FILTER_NAME"]."_form"?>" id="vertical" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
	<?foreach($arResult["HIDDEN"] as $arItem):?>
		<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
	<?endforeach;?>
	<?if (isset($_REQUEST["bxajaxid"])):?>
		<input type="hidden" name="bxajaxid" value="<?=$_REQUEST["bxajaxid"]?>">
	<?endif;?>
	<fieldset>
		<div class="columns-container catalog-page">
			<aside class="aside-left col col-3">
				<button class="button open" type="button">Подобрать по характеристикам</button>
				<nav class="popup" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<div class="popup-inner">
						<ul class="accordion">
							<?if (!empty($arResult["SECTIONS"])):?>
								<li>
									<a title="Категории" class="accordion-open" href="">Категории</a>
									<div class="accordion-slide" style="display: none;">
										<ul>
											<?foreach($arResult["SECTIONS"] as $arSection):?>
												<li><a title="<?=$arSection["NAME"]?>" href="<?=$arSection["URL"]?>"><?=$arSection["NAME"]?></a></li>
											<?endforeach;?>
										</ul>
									</div>
								</li>
							<?endif;?>
							
							
							
							<?
							$arStopList = Array(
								'Производитель',
								'Серия',
								'Тип компонента'
							);
							?>
							
							
							
							<?foreach($arResult["ITEMS"] as $arItem):?>
							
							
								
								<?
								if ( in_array( $arItem['NAME'], $arStopList ) )
								{
									continue;
								}
								?>
								
								
							
								<?if(!isset($arItem["PRICE"]) &&
										!in_array($arItem["CODE"], array("NEW", "FLAG_MAIN_QUANTITY")) &&
										!$arItem["DISABLED"]
									):?>
									<li <?if($arItem["FILTERED"]):?>class="active"<?endif;?>>
										<a title="<?=$arItem["NAME"]?>" class="accordion-open" href=""><?=$arItem["NAME"]?></a>
										<div class="accordion-slide <?if ($arItem["NAME"] == "Производитель"):?>brands<?endif;?> <?if ($arItem["NAME"] == "Серия"):?>series<?endif;?>" style="display:<?=($arItem["FILTERED"] ? "block" : "none")?>;">
											<?foreach ($arItem["VALUES"] as $val => $ar):?>
												<?if (!$ar["DISABLED"]):?>
													<div class="check-row">
														<?
														$tags = "";
														if ($ar["CHECKED"])
															$tags.= ' checked';
														?>
														<input
															type="checkbox"
															name="<?=$ar["CONTROL_NAME"]?>"
															id="<?=$ar["CONTROL_ID"]?>_2"
															value="<?=$ar["HTML_VALUE"]?>"
															data-id="<?=$val?>"
															<?=$tags?>
															<?/*onchange="smartFilter.reload_simple(this)"*/?>
														/>
														<div class="label-holder">
															<label for="<?=$ar["CONTROL_ID"]?>_2" data-name="<?=$ar["CONTROL_NAME"]?>" <?/*onclick="smartFilter.reload_simple(this)"*/?>>
																<?if (isset($ar["PICTURE"]) && !empty($ar["PICTURE"])):?>
																	<img width="91" height="29" src="<?=$ar["PICTURE"]?>" alt=""/>
																	<span class="text">
																		<?=$ar["VALUE"]?>
																	</span>
																<?else:?>
																	<?=$ar["VALUE"]?>
																<?endif;?>
															</label>
														</div>
													</div>
												<?endif;?>
											<?endforeach;?>
										</div>
									</li>
								<?endif;?>
							<?endforeach;?>
							

						</ul>

					</div>
				</nav>
			</aside>

			<div class="content col col-9">
				<h2 class="catalog-heading">
					<?=$arResult["SECTION"]["NAME"]?>
					<span class="text-gray" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?>>
						<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
					</span>
				</h2>