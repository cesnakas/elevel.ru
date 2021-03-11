<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<ul class="list-categories">

	<? foreach ( $arResult['SECTIONS'] as $arSection ): ?>
	
		<li>
			<a title="<?=$arSection['NAME']?>" href="javascript:;" data-id="<?=$arSection['ID']?>" class="map-city"><?=$arSection['NAME']?></a>
		</li>
	
	<? endforeach; ?>

</ul>