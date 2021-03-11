<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<? if ( !empty( $arResult['ITEMS'] ) ): ?>

	<div class="slider-single list-articles">

		<? foreach ( $arResult['ITEMS'] as $arItem ): ?>
		
			<div>
				<a class="article" href="<?=$arItem['DETAIL_PAGE_URL']?>">
					<div class="visual">
						
						<?
						if ( $arItem['DETAIL_PICTURE']['ID'] )
						{
							$pic = CFile::ResizeImageGet( $arItem['DETAIL_PICTURE']['ID'], Array( 'width' => 304, 'height' => 240 ), BX_RESIZE_IMAGE_PROPORTIONAL, true );
							
							$top = 0;
							$left = 0;
							if ( $pic['height'] < 240 )
							{
								$top = ( 240 - $pic['height'] ) / 2;
							}	

							if ( $pic['width'] < 304 )
							{
								$left = ( 304 - $pic['width'] ) / 2;
							}	

							$margin = 'style="margin-top: ' . $top . 'px; margin-left: ' . $left . 'px;"';
							?>
							<img src="<?=$pic['src']?>" alt="<?=$arItem['NAME']?>" <?=$margin?>/>
							<?
						}
						?>
						
					</div>
					<span class="date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></span>
					<h3><?=$arItem['NAME']?></h3>
					<p><?=$arItem["SHORT_TEXT"]?>...</p>
				</a>
			</div>
		
		<? endforeach; ?>
	
	</div>

<? endif; ?>