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


<form class="form-catalog" name="<?echo $arResult["FILTER_NAME"]."_form"?>" id="vertical" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
	<?foreach($arResult["HIDDEN"] as $arItem):?>
		<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
	<?endforeach;?>
	<?/*if (isset($_REQUEST["bxajaxid"])):?>
		<input type="hidden" name="bxajaxid" value="<?=$_REQUEST["bxajaxid"]?>">
	<?endif;*/?>
	<fieldset>
		<div class="columns-container">
			<aside class="aside-left col col-3 popup-holder">
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
												<li><a title="<?=$arSection["NAME"]?>" href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></li>
											<?endforeach;?>
										</ul>
									</div>
								</li>
							<?endif;?>
							<?foreach($arResult["ITEMS"] as $arItem):?>
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
								<?
								//prices
								foreach($arResult["ITEMS"] as $key=>$arItem)
								{
									$key = $arItem["ENCODED_ID"];
									if(isset($arItem["PRICE"])):
										if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
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
												<?if($price_active):?>value="<?=intval($_GET["arrFilter_P3_MIN"])?>"<?endif;?>
												type="text"
												name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
												<?/*onchange="smartFilter.reload_simple(this)"*/?>
												class="adaptive_input"
											/>
											<input
												placeholder="до <?echo $arItem["VALUES"]["MAX"]["VALUE"]?> РУБ."
												<?if($price_active):?>value="<?=intval($_GET["arrFilter_P3_MAX"])?>"<?endif;?>
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
												if ($key != "sort" && $key != "order" && $key != "bxajaxid" && $key != "del_filter")
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
												if ($key != "count" && $key != "bxajaxid" && $key != "del_filter")
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
						<input class="button" type="submit" id="del_filter" name="del_filter" value="Сбросить"/>
					</div>
				</nav>
			</aside>
			<div class="content col col-9">
				<h2 class="catalog-heading">
					<?=$arResult["SECTION"]["NAME"]?><?$APPLICATION->ShowViewContent('brands_filtered');?>
					<span class="text-gray" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?>>
						<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
					</span>
				</h2>
				<div class="catalog-sort-panel clearfix">
					<div class="select-column">
						<?if(!empty($arResult["ITEMS_CODE"]["PRODUCER"]["VALUES"])):?>
						<div class="popup-holder brands-holder">
							<?
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
														<?/*onchange="smartFilter.reload_simple(this)"*/?>
													/>

													<div class="label-holder">
														<label for="<?=$ar["CONTROL_ID"]?>" data-name="<?=$ar["CONTROL_NAME"]?>" <?/*onclick="smartFilter.reload_simple(this)"*/?>>
																													
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
											if ($key != "sort" && $key != "order" && $key != "bxajaxid" && $key != "del_filter")
												$get_parameters .= $key . "=" . $value . "&";
										}
									?>
									<ul>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=popular&order=desc" <?/*class="sort_link"*/?> data-change="popular">Сначала популярные</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=price&order=asc" <?/*class="sort_link"*/?> data-change="price_asc">По возрастанию цены</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=price&order=desc" <?/*class="sort_link"*/?> data-change="price_desc">По убыванию цены</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=alphabet&order=asc" <?/*class="sort_link"*/?> data-change="alphabet_asc">По алфавиту, А – Я</a></li>
										<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>sort=alphabet&order=desc" <?/*class="sort_link"*/?> data-change="alphabet_desc">По алфавиту, Я – А</a></li>
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
								if(isset($_GET["arrFilter_P3_MIN"]) && isset($_GET["arrFilter_P3_MAX"]) && ($_GET["arrFilter_P3_MIN"] || $_GET["arrFilter_P3_MAX"]))
									$price_active = true;
								?>
								<div class="popup-holder price-holder <?if($price_active):?>price-active<?endif;?>">
									<a class="open" href="">
									<span class="inner">
										<span class="text">Цена</span>
										<span class="price1">
											<?if($price_active):?>
												<?=intval($_GET["arrFilter_P3_MIN"])?> - 
											<?endif;?>
										</span>
										<span class="price2">
											<?if($price_active):?>
												<?=intval($_GET["arrFilter_P3_MAX"])?> руб.
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
									$value1 = intval($_GET["arrFilter_P3_MIN"]);
									$value2 = intval($_GET["arrFilter_P3_MAX"]);
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
										max: <?=ceil($arItem["VALUES"]["MAX"]["VALUE"])?>,
										values: [ <?=$value1?>, <?=$value2?> ],
										slide: function( event, ui ) {
											$('#arrFilter_P3_MIN').val(ui.values[0]);
											$('#arrFilter_P3_MAX').val(ui.values[1]);
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
												if ($key != "count" && $key != "bxajaxid" && $key != "del_filter")
													$get_parameters .= $key . "=" . $value . "&";
											}
												
										$array_counts = array(20, 30, 50);
										
										foreach($array_counts as $count):?>
											<li><a href="?<?if($get_parameters):?><?=$get_parameters?><?endif;?>count=<?=$count?>" <?/*class="sort_link"*/?> data-change="count<?=$count?>"><?=$count?></a></li>
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
						<a title="Очистить фильтры" id="link_del_filter" href="?del_filter=Y" <?/*onclick="event.preventDefault(); smartFilter.clearFilter(this)"*/?>>Очистить фильтры</a>
					</div>
				</div>		
		<script>
			var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', 'vertical');
		</script>
	
<?/*
<div class="bx_filter <?=$templateData["TEMPLATE_CLASS"]?> bx_horizontal">
	<div class="bx_filter_section">
		<div class="bx_filter_title"><?echo GetMessage("CT_BCSF_FILTER_TITLE")?></div>
		<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
			<?foreach($arResult["HIDDEN"] as $arItem):?>
			<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
			<?endforeach;
			//prices
			foreach($arResult["ITEMS"] as $key=>$arItem)
			{
				$key = $arItem["ENCODED_ID"];
				if(isset($arItem["PRICE"])):
					if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
						continue;
					?>
					<div class="bx_filter_parameters_box active">
						<span class="bx_filter_container_modef"></span>
						<div class="bx_filter_parameters_box_title" onclick="smartFilter.hideFilterProps(this)"><?=$arItem["NAME"]?></div>
						<div class="bx_filter_block">
							<div class="bx_filter_parameters_box_container">
								<div class="bx_filter_parameters_box_container_block">
									<div class="bx_filter_input_container">
										<input
											class="min-price"
											type="text"
											name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
											id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
											value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
											size="5"
											onchange="smartFilter.reload_simple(this)"
										/>
									</div>
								</div>
								<div class="bx_filter_parameters_box_container_block">
									<div class="bx_filter_input_container">
										<input
											class="max-price"
											type="text"
											name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
											id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
											value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
											size="5"
											onchange="smartFilter.reload_simple(this)"
										/>
									</div>
								</div>
								<div style="clear: both;"></div>

								<div class="bx_ui_slider_track" id="drag_track_<?=$key?>">
									<?
									$price1 = $arItem["VALUES"]["MIN"]["VALUE"];
									$price2 = $arItem["VALUES"]["MIN"]["VALUE"] + round(($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])/4);
									$price3 = $arItem["VALUES"]["MIN"]["VALUE"] + round(($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])/2);
									$price4 = $arItem["VALUES"]["MIN"]["VALUE"] + round((($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])*3)/4);
									$price5 = $arItem["VALUES"]["MAX"]["VALUE"];
									?>
									<div class="bx_ui_slider_part p1"><span><?=$price1?></span></div>
									<div class="bx_ui_slider_part p2"><span><?=$price2?></span></div>
									<div class="bx_ui_slider_part p3"><span><?=$price3?></span></div>
									<div class="bx_ui_slider_part p4"><span><?=$price4?></span></div>
									<div class="bx_ui_slider_part p5"><span><?=$price5?></span></div>

									<div class="bx_ui_slider_pricebar_VD" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
									<div class="bx_ui_slider_pricebar_VN" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
									<div class="bx_ui_slider_pricebar_V"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
									<div class="bx_ui_slider_range" id="drag_tracker_<?=$key?>"  style="left: 0%; right: 0%;">
										<a class="bx_ui_slider_handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
										<a class="bx_ui_slider_handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
									</div>
								</div>
								<div style="opacity: 0;height: 1px;"></div>
							</div>
						</div>
					</div>
				<?endif;
			}

			//not prices
			foreach($arResult["ITEMS"] as $key=>$arItem)
			{
				if(
					empty($arItem["VALUES"])
					|| isset($arItem["PRICE"])
				)
					continue;

				if (
					$arItem["DISPLAY_TYPE"] == "A"
					&& (
						$arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
					)
				)
					continue;
				?>
				<div class="bx_filter_parameters_box <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>active<?endif?>">
					<span class="bx_filter_container_modef"></span>
					<div class="bx_filter_parameters_box_title" onclick="smartFilter.hideFilterProps(this)"><?=$arItem["NAME"]?></div>
					<div class="bx_filter_block">
						<div class="bx_filter_parameters_box_container">
						<?
						$arCur = current($arItem["VALUES"]);
						switch ($arItem["DISPLAY_TYPE"])
						{
							case "A"://NUMBERS_WITH_SLIDER
								?>
								<div class="bx_filter_parameters_box_container_block">
									<div class="bx_filter_input_container">
										<input
											class="min-price"
											type="text"
											name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
											id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
											value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
											size="5"
											onchange="smartFilter.reload_simple(this)"
										/>
									</div>
								</div>
								<div class="bx_filter_parameters_box_container_block">
									<div class="bx_filter_input_container">
										<input
											class="max-price"
											type="text"
											name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
											id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
											value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
											size="5"
											onchange="smartFilter.reload_simple(this)"
										/>
									</div>
								</div>
								<div style="clear: both;"></div>

								<div class="bx_ui_slider_track" id="drag_track_<?=$key?>">
									<?
									$value1 = $arItem["VALUES"]["MIN"]["VALUE"];
									$value2 = $arItem["VALUES"]["MIN"]["VALUE"] + round(($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])/4);
									$value3 = $arItem["VALUES"]["MIN"]["VALUE"] + round(($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])/2);
									$value4 = $arItem["VALUES"]["MIN"]["VALUE"] + round((($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"])*3)/4);
									$value5 = $arItem["VALUES"]["MAX"]["VALUE"];
									?>
									<div class="bx_ui_slider_part p1"><span><?=$value1?></span></div>
									<div class="bx_ui_slider_part p2"><span><?=$value2?></span></div>
									<div class="bx_ui_slider_part p3"><span><?=$value3?></span></div>
									<div class="bx_ui_slider_part p4"><span><?=$value4?></span></div>
									<div class="bx_ui_slider_part p5"><span><?=$value5?></span></div>

									<div class="bx_ui_slider_pricebar_VD" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
									<div class="bx_ui_slider_pricebar_VN" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
									<div class="bx_ui_slider_pricebar_V"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
									<div class="bx_ui_slider_range" 	id="drag_tracker_<?=$key?>"  style="left: 0;right: 0;">
										<a class="bx_ui_slider_handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
										<a class="bx_ui_slider_handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
									</div>
								</div>
								<?
								$arJsParams = array(
									"leftSlider" => 'left_slider_'.$key,
									"rightSlider" => 'right_slider_'.$key,
									"tracker" => "drag_tracker_".$key,
									"trackerWrap" => "drag_track_".$key,
									"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
									"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
									"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
									"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
									"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
									"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
									"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
									"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
									"precision" => $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0,
									"colorUnavailableActive" => 'colorUnavailableActive_'.$key,
									"colorAvailableActive" => 'colorAvailableActive_'.$key,
									"colorAvailableInactive" => 'colorAvailableInactive_'.$key,
								);
								?>
								<script type="text/javascript">
									BX.ready(function(){
										window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
									});
								</script>
								<?
								break;
							case "B"://NUMBERS
								?>
								<div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container">
									<input
										class="min-price"
										type="text"
										name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
										id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
										value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
										size="5"
										onchange="smartFilter.reload_simple(this)"
										/>
								</div></div>
								<div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container">
									<input
										class="max-price"
										type="text"
										name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
										id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
										value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
										size="5"
										onchange="smartFilter.reload_simple(this)"
										/>
								</div></div>
								<?
								break;
							case "G"://CHECKBOXES_WITH_PICTURES
								?>
								<?foreach ($arItem["VALUES"] as $val => $ar):?>
									<input
										style="display: none"
										type="checkbox"
										name="<?=$ar["CONTROL_NAME"]?>"
										id="<?=$ar["CONTROL_ID"]?>"
										value="<?=$ar["HTML_VALUE"]?>"
										<? echo $ar["CHECKED"]? 'checked': '' ?>
									/>
									<?
									$class = "";
									if ($ar["CHECKED"])
										$class.= " active";
									if ($ar["DISABLED"])
										$class.= " disabled";
									?>
									<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label dib<?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'active');">
										<span class="bx_filter_param_btn bx_color_sl">
											<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
											<span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
											<?endif?>
										</span>
									</label>
								<?endforeach?>
								<?
								break;
							case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
								?>
								<?foreach ($arItem["VALUES"] as $val => $ar):?>
									<input
										style="display: none"
										type="checkbox"
										name="<?=$ar["CONTROL_NAME"]?>"
										id="<?=$ar["CONTROL_ID"]?>"
										value="<?=$ar["HTML_VALUE"]?>"
										<? echo $ar["CHECKED"]? 'checked': '' ?>
									/>
									<?
									$class = "";
									if ($ar["CHECKED"])
										$class.= " active";
									if ($ar["DISABLED"])
										$class.= " disabled";
									?>
									<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?>" onclick="smartFilter.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')); BX.toggleClass(this, 'active');">
										<span class="bx_filter_param_btn bx_color_sl">
											<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
												<span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
											<?endif?>
										</span>
										<span class="bx_filter_param_text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
										if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
											?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
										endif;?></span>
									</label>
								<?endforeach?>
								<?
								break;
							case "P"://DROPDOWN
								$checkedItemExist = false;
								?>
								<div class="bx_filter_select_container">
									<div class="bx_filter_select_block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
										<div class="bx_filter_select_text" data-role="currentOption">
											<?
											foreach ($arItem["VALUES"] as $val => $ar)
											{
												if ($ar["CHECKED"])
												{
													echo $ar["VALUE"];
													$checkedItemExist = true;
												}
											}
											if (!$checkedItemExist)
											{
												echo GetMessage("CT_BCSF_FILTER_ALL");
											}
											?>
										</div>
										<div class="bx_filter_select_arrow"></div>
										<input
											style="display: none"
											type="radio"
											name="<?=$arCur["CONTROL_NAME_ALT"]?>"
											id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
											value=""
										/>
										<?foreach ($arItem["VALUES"] as $val => $ar):?>
											<input
												style="display: none"
												type="radio"
												name="<?=$ar["CONTROL_NAME_ALT"]?>"
												id="<?=$ar["CONTROL_ID"]?>"
												value="<? echo $ar["HTML_VALUE_ALT"] ?>"
												<? echo $ar["CHECKED"]? 'checked': '' ?>
											/>
										<?endforeach?>
										<div class="bx_filter_select_popup" data-role="dropdownContent" style="display: none;">
											<ul>
												<li>
													<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx_filter_param_label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
														<? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
													</label>
												</li>
											<?
											foreach ($arItem["VALUES"] as $val => $ar):
												$class = "";
												if ($ar["CHECKED"])
													$class.= " selected";
												if ($ar["DISABLED"])
													$class.= " disabled";
											?>
												<li>
													<label for="<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?>" data-role="label_<?=$ar["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')"><?=$ar["VALUE"]?></label>
												</li>
											<?endforeach?>
											</ul>
										</div>
									</div>
								</div>
								<?
								break;
							case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
								?>
								<div class="bx_filter_select_container">
									<div class="bx_filter_select_block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
										<div class="bx_filter_select_text" data-role="currentOption">
											<?
											$checkedItemExist = false;
											foreach ($arItem["VALUES"] as $val => $ar):
												if ($ar["CHECKED"])
												{
												?>
													<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
														<span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
													<?endif?>
													<span class="bx_filter_param_text">
														<?=$ar["VALUE"]?>
													</span>
												<?
													$checkedItemExist = true;
												}
											endforeach;
											if (!$checkedItemExist)
											{
												?><span class="bx_filter_btn_color_icon all"></span> <?
												echo GetMessage("CT_BCSF_FILTER_ALL");
											}
											?>
										</div>
										<div class="bx_filter_select_arrow"></div>
										<input
											style="display: none"
											type="radio"
											name="<?=$arCur["CONTROL_NAME_ALT"]?>"
											id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
											value=""
										/>
										<?foreach ($arItem["VALUES"] as $val => $ar):?>
											<input
												style="display: none"
												type="radio"
												name="<?=$ar["CONTROL_NAME_ALT"]?>"
												id="<?=$ar["CONTROL_ID"]?>"
												value="<?=$ar["HTML_VALUE_ALT"]?>"
												<? echo $ar["CHECKED"]? 'checked': '' ?>
											/>
										<?endforeach?>
										<div class="bx_filter_select_popup" data-role="dropdownContent" style="display: none">
											<ul>
												<li style="border-bottom: 1px solid #e5e5e5;padding-bottom: 5px;margin-bottom: 5px;">
													<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx_filter_param_label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
														<span class="bx_filter_btn_color_icon all"></span>
														<? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
													</label>
												</li>
											<?
											foreach ($arItem["VALUES"] as $val => $ar):
												$class = "";
												if ($ar["CHECKED"])
													$class.= " selected";
												if ($ar["DISABLED"])
													$class.= " disabled";
											?>
												<li>
													<label for="<?=$ar["CONTROL_ID"]?>" data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')">
														<?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
															<span class="bx_filter_btn_color_icon" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
														<?endif?>
														<span class="bx_filter_param_text">
															<?=$ar["VALUE"]?>
														</span>
													</label>
												</li>
											<?endforeach?>
											</ul>
										</div>
									</div>
								</div>
								<?
								break;
							case "K"://RADIO_BUTTONS
								?>
								<label class="bx_filter_param_label" for="<? echo "all_".$arCur["CONTROL_ID"] ?>">
									<span class="bx_filter_input_checkbox">
										<input
											type="radio"
											value=""
											name="<? echo $arCur["CONTROL_NAME_ALT"] ?>"
											id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
											onclick="smartFilter.click(this)"
										/>
										<span class="bx_filter_param_text"><? echo GetMessage("CT_BCSF_FILTER_ALL"); ?></span>
									</span>
								</label>
								<?foreach($arItem["VALUES"] as $val => $ar):?>
									<label data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label" for="<? echo $ar["CONTROL_ID"] ?>">
										<span class="bx_filter_input_checkbox <? echo $ar["DISABLED"] ? 'disabled': '' ?>">
											<input
												type="radio"
												value="<? echo $ar["HTML_VALUE_ALT"] ?>"
												name="<? echo $ar["CONTROL_NAME_ALT"] ?>"
												id="<? echo $ar["CONTROL_ID"] ?>"
												<? echo $ar["CHECKED"]? 'checked': '' ?>
												onclick="smartFilter.click(this)"
											/>
											<span class="bx_filter_param_text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
											if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
												?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
											endif;?></span>
										</span>
									</label>
								<?endforeach;?>
								<?
								break;
							case "U"://CALENDAR
								?>
								<div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container bx_filter_calendar_container">
									<?$APPLICATION->IncludeComponent(
										'bitrix:main.calendar',
										'',
										array(
											'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
											'SHOW_INPUT' => 'Y',
											'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MIN"]["VALUE"]).'" onchange="smartFilter.reload_simple(this)" onchange="smartFilter.reload_simple(this)"',
											'INPUT_NAME' => $arItem["VALUES"]["MIN"]["CONTROL_NAME"],
											'INPUT_VALUE' => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
											'SHOW_TIME' => 'N',
											'HIDE_TIMEBAR' => 'Y',
										),
										null,
										array('HIDE_ICONS' => 'Y')
									);?>
								</div></div>
								<div class="bx_filter_parameters_box_container_block"><div class="bx_filter_input_container bx_filter_calendar_container">
									<?$APPLICATION->IncludeComponent(
										'bitrix:main.calendar',
										'',
										array(
											'FORM_NAME' => $arResult["FILTER_NAME"]."_form",
											'SHOW_INPUT' => 'Y',
											'INPUT_ADDITIONAL_ATTR' => 'class="calendar" placeholder="'.FormatDate("SHORT", $arItem["VALUES"]["MAX"]["VALUE"]).'" onchange="smartFilter.reload_simple(this)" onchange="smartFilter.reload_simple(this)"',
											'INPUT_NAME' => $arItem["VALUES"]["MAX"]["CONTROL_NAME"],
											'INPUT_VALUE' => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
											'SHOW_TIME' => 'N',
											'HIDE_TIMEBAR' => 'Y',
										),
										null,
										array('HIDE_ICONS' => 'Y')
									);?>
								</div></div>
								<?
								break;
							default://CHECKBOXES
								?>
								<?foreach($arItem["VALUES"] as $val => $ar):?>
									<label data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"] ?>">
										<span class="bx_filter_input_checkbox">
											<input
												type="checkbox"
												value="<? echo $ar["HTML_VALUE"] ?>"
												name="<? echo $ar["CONTROL_NAME"] ?>"
												id="<? echo $ar["CONTROL_ID"] ?>"
												<? echo $ar["CHECKED"]? 'checked': '' ?>
												onclick="smartFilter.click(this)"
											/>
											<span class="bx_filter_param_text" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?><?
											if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
												?> (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
											endif;?></span>
										</span>
									</label>
								<?endforeach;?>
						<?
						}
						?>
						</div>
						<div class="clb"></div>
					</div>
				</div>
			<?
			}
			?>
			<div class="clb"></div>
			<div class="bx_filter_button_box active">
				<div class="bx_filter_block">
					<div class="bx_filter_parameters_box_container">
						<input class="bx_filter_search_button" type="submit" id="set_filter" name="set_filter" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>" />
						<input class="bx_filter_search_reset" type="submit" id="del_filter" name="del_filter" value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>" />

						<div class="bx_filter_popup_result left" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
							<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
							<span class="arrow"></span>
							<a href="<?echo $arResult["FILTER_URL"]?>"><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div style="clear: both;"></div>
	</div>
</div>
<script>
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', 'horizontal');
</script>*/?>

<script>
/*BX.addCustomEvent('onAjaxSuccess', function(){	
	$.getScript( "<?=SITE_TEMPLATE_PATH?>/js/jquery.main.ajax.js", function( data, textStatus, jqxhr ) {});
});*/
</script>