<h1 class="headline-border">производители</h1>


<?/*?>
<ul class="alphabet-categories">
	<li><a title="A" href="">A</a></li>
	<li><a title="Б" href="">Б</a></li>
	<li><a title="В" href="">В</a></li>
	<li><a title="Г" href="">Г</a></li>
	<li><a title="Д" href="">Д</a></li>
	<li><a title="Е" href="">Е</a></li>
	<li><a title="Ж" href="">Ж</a></li>
	<li><a title="З" href="">З</a></li>
	<li><a title="И" href="">И</a></li>
	<li><a title="К" href="">К</a></li>
	<li><a title="Л" href="">Л</a></li>
	<li><a title="М" href="">М</a></li>
	<li><a title="Н" href="">Н</a></li>
	<li><a title="О" href="">О</a></li>
	<li><a title="П" href="">П</a></li>
	<li><a title="Р" href="">Р</a></li>
	<li><a title="С" href="">С</a></li>
	<li><a title="Т" href="">Т</a></li>
	<li><a title="У" href="">У</a></li>
	<li><a title="Ф" href="">Ф</a></li>
	<li><a title="Х" href="">Х</a></li>
	<li><a title="Ц" href="">Ц</a></li>
	<li><a title="Ч" href="">Ч</a></li>
	<li><a title="Ш" href="">Ш</a></li>
	<li><a title="Щ" href="">Щ</a></li>
	<li><a title="Э" href="">Э</a></li>
	<li><a title="Ю" href="">Ю</a></li>
	<li><a title="Я" href="">Я</a></li>
</ul>
<?*/?>



<div class="open-close categories-open-close">
	<a class="opener js-my-opener" href="">Категории</a>
	<div class="slide-block" style='display: none;'>
		<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "shop_sections", Array(
			"COMPONENT_TEMPLATE" => ".default",
				"IBLOCK_TYPE" => "1c_catalog",
				"IBLOCK_ID" => "83",
				"SECTION_ID" => "",
				"SECTION_CODE" => "",
				"COUNT_ELEMENTS" => "N",
				"TOP_DEPTH" => "1",
				"SECTION_FIELDS" => array(
					0 => "NAME",
					1 => "",
				),
				"SECTION_USER_FIELDS" => array(
					0 => "",
					1 => "",
				),
				"VIEW_MODE" => "LINE",
				"SHOW_PARENT_NAME" => "Y",
				"SECTION_URL" => "",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_GROUPS" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
			),
			false
		);?>
	</div>
</div>



<? if ( !empty( $arResult['BRANDS'] ) ): ?>

	<ul class="list-brands-items">
	
		<? foreach ( $arResult['BRANDS'] as $arBrand ):
           if ($arBrand['ITEMS_COUNT'] == 0) continue;
            ?>
		
			<li>
				<a href="<?=$arBrand['URL']?>" class="visual">
					<span class="center">
					
						<? if ( $arBrand['PICTURE'] ): ?>
						
							<img src="<?=$arBrand['PICTURE']?>" alt="<?=$arBrand['NAME']?>"/>
							
						<? endif; ?>
						
					</span>
				</a>
				<strong class="title">
					<a href="<?=$arBrand['URL']?>">
						<?=$arBrand['NAME']?>
					</a>
				</strong>
				<span class="qty">
				
					<?
					$lastOne = substr( $arBrand['ITEMS_COUNT'], -1, 1 );
					$lastTwo = substr( $arBrand['ITEMS_COUNT'], -2, 2 );
					
					$word = 'товаров';
					
					if ( $lastOne == '1' && $lastTwo != '11' )
					{
						$word = 'товар';
					}
					elseif ( ( $lastOne == '2' && $lastTwo != '2' ) || ( $lastOne == '3' && $lastTwo != '3' ) || ( $lastOne == '4' && $lastTwo != '4' ) )
					{
						$word = 'товара';
					}
					?>
				
					<?=$arBrand['ITEMS_COUNT']?> <?=$word?>
				</span>
			</li>
		
		<? endforeach; ?>
	
	</ul>

<? endif; ?>