<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<? if ( !empty( $arResult['SECTIONS'] ) ): ?>

	<div class="slider-brands-main">
	
		<? foreach ( $arResult['SECTIONS'] as $arSection ): ?>
		
			<div>
				<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="visual">
					<span class="center">
					
						<?
						if ( $arSection['PICTURE']['ID'] )
						{
							$pic = CFile::ResizeImageGet( $arSection['PICTURE']['ID'], Array( 'width' => 302, 'height' => 136 ) );
							?>
							<img src="<?=$pic['src']?>" alt="<?=$arSection['NAME']?>"/>
							<?
						}
						?>
						
					</span>
				</a>
				<strong class="title">
					<a href="<?=$arSection['SECTION_PAGE_URL']?>">
						<?=$arSection['NAME']?>
					</a>
				</strong>
				<span class="qty"><?=intval( $arResult['ITEMS_COUNT'][$arSection['ID']] )?> товаров</span>
			</div>
		
		<? endforeach; ?>
		
	</div>

<? endif; ?>
