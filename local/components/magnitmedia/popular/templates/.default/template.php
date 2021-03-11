<div class="slider-single">

	<? foreach ( $arResult['ITEMS'] as $itemId => $arItem ): ?>
	
		<div>
			
			<a href="<?=$arItem['URL']?>" class="visual ajax_stop" style="width: 300px; height: 300px; display: table-cell; vertical-align: middle">
			
				<img src="<?=$arItem["PICTURE"]?>" alt="<?=$arItem['NAME']?>" style="width: auto; margin: auto;" />				
				
				<?
				$word = '���������';
				$lastOne = substr( $arItem['STORES_COUNT'], -1, 1 );
				$lastTwo = substr( $arItem['STORES_COUNT'], -2, 2 );
				if ( $lastOne == 1 && $lastTwo != 11 )
				{
					$word = '��������';
				}
				?>
				
				<? if ( intval( $arItem['STORES_COUNT'] ) > 0 ): ?>
					<span class="text-available">�������� � <?=$arItem['STORES_COUNT']?> <?=$word?></span>
				<? else: ?>
					<span class="text-available">��� �����</span>
				<? endif; ?>
				
				
				<span class="article">�������: <?=$arItem['ARTICLE']?></span>
			</a>
			<div class="text-block" style="margin-top: 14px;">
				<span class="tablet-text article">�������: <?=$arItem['ARTICLE']?></span>
				<span class="qty">����������: <?=$arItem['QUANTITY']?></span>
				<strong class="title">
					<a class="ajax_stop" href="<?=$arItem['URL']?>">
						<?=$arItem['NAME']?>
					</a>
				</strong>
				
				<span class="tablet-text available">� �������</span>
				
				<strong class="price text-orange"><?=number_format( $arItem['PRICE'], 2, '.', ' ' )?> ���.</strong>

				<a class="btn-buy add-to-basket-item quantity_one" href="javascript:;" id="add<?=$arItem['ID']?>" style="overflow: hidden;" >
					<span class="center">
						<span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span>
						<span class="center">������</span>
					</span>
				</a>
			</div>
		</div>
	
	<? endforeach; ?>

</div>