<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<? if ( !empty( $arResult['ITEMS'] ) ): ?>

	<div class="slider">
	
		<? foreach ( $arResult['ITEMS'] as $arItem ): ?>
		
			<div>
				<a class="visual">
					<span class="center">
					
						<?
						if ( $arItem['PREVIEW_PICTURE']['ID'] )
						{
							$pic = CFile::ResizeImageGet( $arItem['PREVIEW_PICTURE']['ID'], Array( 'width' => 244, 'height' => 70 ) );
							?>
								<img src="<?=$pic['src']?>" alt="<?=$arItem['NAME']?>" />
							<?
						}
						?>
						
					</span>
				</a>
				<strong class="title">
					<a><?=$arItem['NAME']?></a>
				</strong>
			</div>
		
		<? endforeach; ?>
	
	</div>

<? endif; ?>