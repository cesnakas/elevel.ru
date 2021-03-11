<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	
<form class="vacancy_filter career-city" action="" method="get">
	<select name="city">	
		<option value="">Город/регион</option>
		<?foreach($arResult["CITIES"] as $id => $city):?>
			<option value="<?=$id?>" <?if ($city["SELECTED"] == "Y"): $id_select=$id;$name_select=$city["NAME"];?>selected="selected"<?endif;?>><?=$city["NAME"]?></option>
		<?endforeach;?>
	</select>	
</form>
</header>
<div class="clearfix vacancies">

	<div class="right-block open-close">
		<div class="clearfix">
		<?
		
		$countItems = count($arResult["ITEMS"]);
		$countColumn = 4;
		//$halfItems = ceil($countItems / 2);		
		$i = 1;

		if ($countItems > 0):?>
			<ul class="column">
				<?foreach($arResult["ITEMS"] as $k => $arItem):?>
								
				<?if ($i % $countColumn == 0 && $i < $countColumn*3):?>
					</ul>
					<ul class="column">
				<?endif;?>
				
				<?if( $i == $countColumn*3  ):?>
				<?
				$countSlide = $countItems - $countColumn*3;
				$halfSlide = ceil($countSlide / 3);
				?>
					</ul>
					</div>
					<div class="right-align">
						<a class="opener" href="">Ещё вакансии</a>
                    </div>
					<div class="clearfix slide-block">
						<ul class="column">
				<?endif;?>
				
				<?if( $i > $countColumn*3 && !empty($halfSlide) && ($i - $countColumn*3) % $halfSlide == 0 ):?>
					</ul>
					<ul class="column">
				<?endif;?>
				
					<li><a target="_blank" href="<?=$arItem["PROPERTIES"]["URL"]["VALUE"]?>"><?=$arItem["NAME"]?></a></li>
							
					<?$i++;
				endforeach;?>
			</ul>
		<?endif;?>
		</div>
	</div>
</div>

<script>
	 /*window.onload = function() {
		 $('.selectric .label').html('<?=$name_select?>');	
		 //$('.selectric-items ul li').html('<?=$city_select?>');	
		 var data = 'city=<?=$id_select?>';
		 $.ajax({
				type: "GET",
				url: window.location.href,
				data: data,
				timeout: 3000,
				success: function(data) {
					$(".vacancies .right-block").html($(data).find(".vacancies .right-block").html());
				}
		});
	 };*/
</script>