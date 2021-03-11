<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

?> 

<? if ( !empty( $arResult['ITEMS'] ) ): ?>
	<div class="slider-banners col col-12">
	
		<? foreach ( $arResult['ITEMS'] as $key => $arItem ): ?>
		
		
			<div class="slide slide-<?=$key?>" style="cursor: pointer;" onclick="location.href='<?=$arItem['PROPERTIES']['URL']['VALUE']?>'">
				<a href="<?=$arItem['PROPERTIES']['URL']['VALUE']?>" class="slide-inner" style="height: 445px;">
					<!--h2><?=$arItem['NAME']?></h2-->
					<p><?=$arItem['DETAIL_TEXT']?></p>
					<span class="button">Узнать больше</span>
				</a>
			</div>
		
		<? endforeach; ?>
		
	</div>
	
	
	<style type="text/css">
	<? foreach ( $arResult['ITEMS'] as $key => $arItem ): ?>
		<?
		$pic = CFile::ResizeImageGet( $arItem['DETAIL_PICTURE']['ID'], Array( 'width' => 736, 'height' => 369 ), BX_RESIZE_IMAGE_PROPORTIONAL, true );
		
		$left = 0;
		$top = 0;
		
		if ( $pic['width'] < 736 )
		{
			$left = ( 736 - $pic['width'] ) / 2;
		}
		
		if ( $pic['height'] < 369 )
		{
			$top = ( 369 - $pic['height'] ) / 2;
		}
		?>
		.slider-banners .slide.slide-<?=$key?>:after
		{
			background: url('<?=$arItem['DETAIL_PICTURE']['SRC']?>') <?//$left?>0px <?//$top?>0px no-repeat;
		}
	<? endforeach; ?>
	</style>
<? endif; ?>

<script type="text/javascript">
	window.slider_single_params = {
        infinite: true,
        slidesToShow: 4,
        dots: false,
        arrows: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1099,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    };

    $('body .slider-single').slick(window.slider_single_params);
    $('.slider-banners').slick({
        infinite: true,
        slidesToShow: 1,
        dots: true,
        arrows: false,
        slidesToScroll: 1
    });
</script>