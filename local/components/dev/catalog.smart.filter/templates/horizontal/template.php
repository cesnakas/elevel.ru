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
							<li class="hidden-text">
								<!-- arResult <pre><?//print_r($arResult["ITEMS"])?></pre> -->
								<?
								//prices
								foreach($arResult["ITEMS"] as $key=>$arItem)
								{
									$key = $arItem["ENCODED_ID"];
									if(isset($arItem["PRICE"])):?>
										<!-- arItem <pre><?print_r($arItem)?></pre> -->
										<?if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
											continue;
										?>
										<a title="Цена" class="accordion-open" href="">Цена
											<strong class="text-gray">
												<?=$arItem["VALUES"]["MIN"]["VALUE"]?> руб. - 
												<?=$arItem["VALUES"]["MAX"]["VALUE"]?> руб.
											</strong>
										</a>
										<div class="accordion-slide price-slide clearfix">
											<input
												placeholder="от <?echo $arItem["VALUES"]["MIN"]["VALUE"]?> РУБ."
												<?if($price_active):?>value="<?=intval($_GET["seriesFilter_P3_MIN"])?>"<?endif;?>
												type="text"
												name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
												<?/*onchange="smartFilter.reload_simple(this)"*/?>
												class="adaptive_input"
											/>
											<input
												placeholder="до <?echo $arItem["VALUES"]["MAX"]["VALUE"]?> РУБ."
												<?if($price_active):?>value="<?=intval($_GET["seriesFilter_P3_MAX"])?>"<?endif;?>
												type="text"
												name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
												<?/*onchange="smartFilter.reload_simple(this)"*/?>
												class="adaptive_input"
											/>
										</div>
									<?endif;
								}
								?>
							</li>
							<li class="hidden-text">
								<ul class="list-radio">
									
									<?if(!empty($arResult["ITEMS_CODE"]["NEW"]["VALUES"])):?>
										<?foreach ($arResult["ITEMS_CODE"]["NEW"]["VALUES"] as $val => $ar):?>
											<?if (!$ar["DISABLED"]):?>
												<li>
													<input
														type="checkbox"
														name="<?=$ar["CONTROL_NAME"]?>"
														id="<?=$ar["CONTROL_ID"]?>"
														value="<?=$ar["HTML_VALUE"]?>"
														<? echo $ar["CHECKED"]? 'checked': '' ?>
														<?/*onchange="smartFilter.reload_simple(this)"*/?>
													/>
													<div class="label-holder">
														<label for="<?=$ar["CONTROL_ID"]?>" data-name="<?=$ar["CONTROL_NAME"]?>" <?/*onclick="smartFilter.reload_simple(this)"*/?>>Новинки</label>
													</div>
												</li>
											<?endif;?>
										<?endforeach?>
									<?endif;?>
								
									<?if(!empty($arResult["ITEMS_CODE"]["FLAG_MAIN_QUANTITY"]["VALUES"])):?>
										<?foreach ($arResult["ITEMS_CODE"]["FLAG_MAIN_QUANTITY"]["VALUES"] as $val => $ar):?>
											<?if (!$ar["DISABLED"]):?>
												<li>
													<input
														type="checkbox"
														name="<?=$ar["CONTROL_NAME"]?>"
														id="<?=$ar["CONTROL_ID"]?>"
														value="<?=$ar["HTML_VALUE"]?>"
														<? echo $ar["CHECKED"]? 'checked': '' ?>
														<?/*onchange="smartFilter.reload_simple(this)"*/?>
													/>
													<div class="label-holder">
														<label for="<?=$ar["CONTROL_ID"]?>" data-name="<?=$ar["CONTROL_NAME"]?>" <?/*onclick="smartFilter.reload_simple(this)"*/?>>В наличии</label>
													</div>													
												</li>
											<?endif;?>
										<?endforeach?>
									<?endif;?>
								</ul>
							</li>
							<li class="hidden-text">
								<a title="Сортировать" class="accordion-open" href="">Сортировать</a>
								<div class="accordion-slide">
									<ul class="list-radio">
										<?$get_parameters = "";
										if (count($_GET) > 0)
											foreach($_GET as $key => $value)
												if ($key != "sort" && $key != "order" && $key != "bxajaxid")
													$get_parameters .= $key . "=" . $value . "&";?>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=popular&order=desc">Сначала популярные</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=price&order=asc">По возрастанию цены</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=price&order=desc">По убыванию цены</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=alphabet&order=asc">По алфавиту, А – Я</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=alphabet&order=desc">По алфавиту, Я – А</a></li>
									</ul>
								</div>
							</li>
							<li class="hidden-text">
								<a title="Показывать по" class="accordion-open" href="">Показывать по:
								<strong class="text-gray">
									<?if ($count = intval($_GET["count"])):?>
										<?=$count?>
									<?else:?>
										30
									<?endif;?>
								</strong></a>
								<div class="accordion-slide">
									<ul class="list-radio">
										<?$get_parameters = "";
										if (count($_GET) > 0)
											foreach($_GET as $key => $value)
											{
												if ($key != "count" && $key != "bxajaxid")
													$get_parameters .= $key . "=" . $value . "&";
											}
												
										$array_counts = array(20, 30, 50);
										
										foreach($array_counts as $count):?>
											<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>count=<?=$count?>"><?=$count?></a></li>
										<?endforeach;?>
									</ul>
								</div>
							</li>
						</ul>
						<input class="button" type="submit" id="set_filter" name="set_filter" value="Применить"/>
						<input class="button" type="submit" id="del_filter" name="del_filter" value="Сбросить">
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
				<div class="catalog-sort-panel clearfix">
					<div class="select-column">
						<?if(!empty($arResult["ITEMS_CODE"]["PRODUCER"]["VALUES"])):?>
						<div class="popup-holder brands-holder" style="height: 49px;">
							<?/*?><?
							$strValue = "";
							foreach ($arResult["ITEMS_CODE"]["PRODUCER"]["VALUES"] as $val => &$ar){
								
								$ar["VALUE"] = substr($ar["VALUE"], 1);
								
								if($ar["CHECKED"]){
									$strValue .= ((strlen($strValue)>0)?", ":"") . $ar["VALUE"];		
								}
							}
							
							if(strlen($strValue)<=0)
								$strValue = GetMessage("CT_BCSF_BRANDS");
							?>
							<a class="open" href=""><span class="inner"><span class="text"><?echo $strValue?></span></span></a>
							<div class="popup">
								<div class="popup-inner">
									<ul>
										<?foreach ($arResult["ITEMS_CODE"]["PRODUCER"]["VALUES"] as $val => $ar):?>
											<?if (!$ar["DISABLED"]):?>
												<li>
													<input
														type="checkbox"
														name="<?=$ar["CONTROL_NAME"]?>"
														id="<?=$ar["CONTROL_ID"]?>"
														value="<?=$ar["HTML_VALUE"]?>"
														<? echo $ar["CHECKED"]? 'checked': '' ?>
														<? echo $ar["DISABLED"] ? 'disabled': '' ?>
														onchange="smartFilter.reload_simple(this)"
													/>

													<div class="label-holder">
														<label for="<?=$ar["CONTROL_ID"]?>" data-name="<?=$ar["CONTROL_NAME"]?>" onclick="smartFilter.reload_simple(this)">
																													
															<?if (isset($ar["PICTURE"]) && !empty($ar["PICTURE"])):?>
																<img width="91" height="29" src="<?=$ar["PICTURE"]?>" alt="<?=$ar["VALUE"]?>"/>
															<?else:?>
																<?=$ar["VALUE"]?>
															<?endif;?>
														</label>
													</div>
												</li>
											<?endif;?>
										<?endforeach?>
									</ul>
								</div>
							</div>
							<?*/?>
						</div>
						<?endif;?>
						<div class="popup-holder">
							<? $sort_string = "Сортировать по";
								$sort_param = ""; $order_param = "";
								
								if (isset($_GET["sort"])) $sort_param = htmlspecialchars($_GET["sort"]);
								elseif (isset($_SESSION["catalog_sort"])) $sort_param = htmlspecialchars($_SESSION["catalog_sort"]);
								
								if (isset($_GET["order"])) $order_param = htmlspecialchars($_GET["order"]);
								elseif (isset($_SESSION["catalog_order"])) $order_param = htmlspecialchars($_SESSION["catalog_order"]);
								
								if ($sort_param)
								{
									if ($sort_param == "popular")
										$sort_string = "Сначала популярные";
									elseif ($sort_param == "price")
									{
										if ($order_param && $order_param == "desc")
											$sort_string = "По убыванию цены";
										else
											$sort_string = "По возрастанию цены";
									}
									elseif ($sort_param == "alphabet")
									{
										if ($order_param && $order_param == "desc")
											$sort_string = "По алфавиту, Я – А";
										else
											$sort_string = "По алфавиту, А – Я";
									}
								}
								
								
							?>
							<a class="open" href=""><span class="inner"><span class="text"><?=$sort_string?></span></span></a>
							<div class="popup">
								<div class="popup-inner">
									<?/*
									<input type="hidden" name="sort" <?if (isset($_GET["sort"]) && $_GET["sort"]):?> value="<?=htmlspecialchars($_GET["sort"])?>" checked <?else:?>value=""<?endif;?>>
									<input type="hidden" name="order" <?if (isset($_GET["order"]) && $_GET["order"]):?> value="<?=htmlspecialchars($_GET["order"])?>" checked <?else:?>value=""<?endif;?>>
									*/?>
									<?$get_parameters = "";
									if (count($_GET) > 0)
										foreach($_GET as $key => $value)
										{
											if ($key != "sort" && $key != "order" && $key != "bxajaxid")
												$get_parameters .= $key . "=" . $value . "&";
										}
									?>
									<ul>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=popular&order=desc" class="sort_link" data-change="popular">Сначала популярные</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=price&order=asc" class="sort_link" data-change="price_asc">По возрастанию цены</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=price&order=desc" class="sort_link" data-change="price_desc">По убыванию цены</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=alphabet&order=asc" class="sort_link" data-change="alphabet_asc">По алфавиту, А – Я</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=alphabet&order=desc" class="sort_link" data-change="alphabet_desc">По алфавиту, Я – А</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="select-column">
						<?
						//prices
						foreach($arResult["ITEMS"] as $key=>$arItem)
						{
							$key = $arItem["ENCODED_ID"];
							if(isset($arItem["PRICE"])):
								if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
									continue;
								?>
								<? $price_active = false;
								if(isset($_GET["seriesFilter_P3_MIN"]) && isset($_GET["seriesFilter_P3_MAX"]) && ($_GET["seriesFilter_P3_MIN"] || $_GET["seriesFilter_P3_MAX"]))
									$price_active = true;
								?>
								<div class="popup-holder price-holder <?if($price_active):?>price-active<?endif;?>">
									<a class="open" href="">
									<span class="inner">
										<span class="text">Цена</span>
										<span class="price1">
											<?if($price_active):?>
												<?=intval($_GET["seriesFilter_P3_MIN"])?> - 
											<?endif;?>
										</span>
										<span class="price2">
											<?if($price_active):?>
												<?=intval($_GET["seriesFilter_P3_MAX"])?> руб.
											<?endif;?>
										</span>
									</span></a>
									<div class="popup">
										<div class="popup-inner">
											<div id="slider_price"></div>
											<div class="input-row">
												<span class="text">От</span>
												<input type="text"
													name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
													id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
													value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
													class="slider_price_input"
													size="5"
													<?/*onchange="smartFilter.reload_simple(this)"*/?>
													value="0"
												/>
												<span class="text">До</span>
												<input type="text"
													name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
													id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
													value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
													class="slider_price_input"
													size="5"
													<?/*onchange="smartFilter.reload_simple(this)"*/?>
												/>
											</div>
										</div>
									</div>
								</div>
								<?
								$value1 = 0;
								$value2 = intval($arItem["VALUES"]["MAX"]["VALUE"]);
								
								if ($price_active)
								{
									$value1 = intval($_GET["seriesFilter_P3_MIN"]);
									$value2 = intval($_GET["seriesFilter_P3_MAX"]);
								}
								?>
								<script type="text/javascript">
									sliderPrice = $( "#slider_price" );
									var popupHolder = sliderPrice.closest(".popup-holder");
									var onInputRangeChange = function(values){
										$('.price1').text(values[0] + " - ");
										$('.price2').text(values[1] + " руб.");
										sliderPrice.slider("values",values);
										popupHolder.addClass('price-active');
									};

									sliderPrice.slider({
										range: true,
										min: <?=intval($arItem["VALUES"]["MIN"]["VALUE"])?>,
										step:1,
										max: <?=intval($arItem["VALUES"]["MAX"]["VALUE"])?>,
										values: [ <?=$value1?>, <?=$value2?> ],
										slide: function( event, ui ) {
											$('#seriesFilter_P3_MIN').val(ui.values[0]);
											$('#seriesFilter_P3_MAX').val(ui.values[1]);
											onInputRangeChange(ui.values);
										}
									});
								</script>
								
						<?
							endif;
						}
						?>
						
						<div class="popup-holder">
							<a class="open" href="">
								<span class="inner">Показывать: 
									<span class="text">
										<? $count = 30;
										if (isset($_GET["count"])) $count = intval($_GET["count"]);
										elseif (isset($_SESSION["catalog_count"])) $count = intval($_SESSION["catalog_count"]);
										?>
										
										<?=$count?>
									</span>
								</span>
							</a>
							<div class="popup">
								<div class="popup-inner">
									<ul>
										<?$get_parameters = "";
										if (count($_GET) > 0)
											foreach($_GET as $key => $value)
											{
												if ($key != "count" && $key != "bxajaxid")
													$get_parameters .= $key . "=" . $value . "&";
											}
												
										$array_counts = array(20, 30, 50);
										
										foreach($array_counts as $count):?>
											<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>count=<?=$count?>" class="sort_link" data-change="count<?=$count?>"><?=$count?></a></li>
										<?endforeach;?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<ul class="list-available">
						<?if(!empty($arResult["ITEMS_CODE"]["NEW"]["VALUES"])):?>
							<?foreach ($arResult["ITEMS_CODE"]["NEW"]["VALUES"] as $val => $ar):?>
								<?if (!$ar["DISABLED"]):?>
									<li>
										<input
											type="checkbox"
											name="<?=$ar["CONTROL_NAME"]?>"
											id="<?=$ar["CONTROL_ID"]?>_2"
											value="<?=$ar["HTML_VALUE"]?>"
											<? echo $ar["CHECKED"]? 'checked': '' ?>
											<?/*onchange="smartFilter.reload_simple(this)"*/?>
										/>
										<div class="label-holder">
											<label for="<?=$ar["CONTROL_ID"]?>_2" data-name="<?=$ar["CONTROL_NAME"]?>" <?/*onclick="smartFilter.reload_simple(this)"*/?>>Новинки</label>
										</div>
									</li>
								<?endif;?>
							<?endforeach?>
						<?endif;?>
						
						<?/*<li>
							<input
								type="checkbox"
								name="actions_items"
								id="actions_items"
								<?if (isset($_GET["actions_items"]) && $_GET["actions_items"] == "on" && (!(isset($_GET["del_filter"]) && $_GET["del_filter"]))):?>
									checked
								<?endif;?>
							/>
							<div class="label-holder">
								<label for="actions_items">Акции</label>
							</div>
						</li>*/?>
						
						
						<?if(!empty($arResult["ITEMS_CODE"]["FLAG_MAIN_QUANTITY"]["VALUES"])):?>
							<?foreach ($arResult["ITEMS_CODE"]["FLAG_MAIN_QUANTITY"]["VALUES"] as $val => $ar):?>
								<?if (!$ar["DISABLED"]):?>
									<li>
										<input
											type="checkbox"
											name="<?=$ar["CONTROL_NAME"]?>"
											id="<?=$ar["CONTROL_ID"]?>_2"
											value="<?=$ar["HTML_VALUE"]?>"
											<? echo $ar["CHECKED"]? 'checked': '' ?>
											<?/*onchange="smartFilter.reload_simple(this)"*/?>
										/>
										<div class="label-holder">
											<label for="<?=$ar["CONTROL_ID"]?>_2" data-name="<?=$ar["CONTROL_NAME"]?>"  <?/*onclick="smartFilter.reload_simple(this)"*/?>>В наличии</label>
										</div>
									</li>
								<?endif;?>
							<?endforeach?>
						<?endif;?>
						
						
					</ul>
					<div class="right-block">
						<?$get_parameters = "";
						if (count($_GET) > 0)
							foreach($_GET as $key => $value)
							{
								if ($key != "view" && $key != "bxajaxid")
									$get_parameters .= $key . "=" . $value . "&";
							}
							
							$active_view = "items";
							if (isset($_GET["view"])) $active_view = htmlspecialchars($_GET["view"]);
							elseif (isset($_SESSION["catalog_view"])) $active_view = htmlspecialchars($_SESSION["catalog_view"]);
						?>
						<ul class="list-views">
							<li>
								<a class="<?if ($active_view == "items"):?>active<?endif;?>" href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>view=items">items</a>
							</li>
							<li>
								<a class="ico-list <?if ($active_view == "list"):?>active<?endif;?>" href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>view=list">list</a>
							</li>
						</ul>
						<a title="Очистить фильтры" id="link_del_filter" href="?del_filter=Y">Очистить фильтры</a>
					</div>
				</div>		
		<script>
		/*$( document ).ready(
			function ()
			{
				var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', 'vertical');
			}
		);*/
			
		</script>
	


<script>
/*BX.addCustomEvent('onAjaxSuccess', function(){	
	$.getScript( "<?=SITE_TEMPLATE_PATH?>/js/jquery.main.ajax.js", function( data, textStatus, jqxhr ) {});
});*/
</script>