<h1 class="headline-border">�������������</h1>


<?/*?>
<ul class="alphabet-categories">
	<li><a title="A" href="">A</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
	<li><a title="�" href="">�</a></li>
</ul>
<?*/?>



<div class="open-close categories-open-close">
	<a class="opener js-my-opener" href="">���������</a>
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
					
					$word = '�������';
					
					if ( $lastOne == '1' && $lastTwo != '11' )
					{
						$word = '�����';
					}
					elseif ( ( $lastOne == '2' && $lastTwo != '2' ) || ( $lastOne == '3' && $lastTwo != '3' ) || ( $lastOne == '4' && $lastTwo != '4' ) )
					{
						$word = '������';
					}
					?>
				
					<?=$arBrand['ITEMS_COUNT']?> <?=$word?>
				</span>
			</li>
		
		<? endforeach; ?>
	
	</ul>

<? endif; ?>