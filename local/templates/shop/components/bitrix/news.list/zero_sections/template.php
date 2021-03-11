<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>


<? if ( !empty( $arResult['ITEMS'] ) ): ?>
<ul class="list-categories">

	<? foreach ( $arResult['ITEMS'] as $key => $arSection ): ?>
		
		<?
		if ( $key == 6 )
		{
			break;
		}
		?>
	
		<li>
			<a title="<?=$arSection['NAME']?>" href="<?=$arSection['DETAIL_PAGE_URL']?>">
				<?=$arSection['NAME']?>
			</a>
		</li>
	<? endforeach; ?>
	
	
	
	<? if ( count( $arResult['ITEMS'] ) >= 7 ): ?>
		<li class="popup-holder-over">
			<a class="open" title="" href="javascript:;">Ещё категории</a>
			<div class="popup">
				<div class="popup-inner">
					<ul>
					
					<? for ( $i = 6; $i <= count( $arResult['ITEMS'] ); $i++ ): ?>
					
						<?
						$arSection = $arResult['ITEMS'][$i];
						?>
						<li>
							<a title="<?=$arSection['NAME']?>" href="<?=$arSection['DETAIL_PAGE_URL']?>">
								<?=$arSection['NAME']?>
							</a>
						</li>
					<? endfor; ?>
					
					</ul>
				</div>
			</div>
		</li>
	<? endif; ?>

</ul>
<? endif; ?>