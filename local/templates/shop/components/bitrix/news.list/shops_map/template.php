<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<div id="map"></div>


<script type="text/javascript">
$( document ).ready(
	function ()
	{
		if( $('#map').length ){
			var myMap;
			ymaps.ready(init);
		}
	}
);



function init() {
    var myMap = new ymaps.Map("map", {
            center: [55.698653, 50.505405],
            zoom: 4
        }
    );
    myMap.behaviors.disable('scrollZoom');
	
	<? foreach ( $arResult['ITEMS'] as $arItem ): ?>
	
		myMap.geoObjects
        .add(new ymaps.Placemark([<?=$arItem['PROPERTIES']['COORDS']['VALUE']?>], {
            balloonContent: '<?=$arItem['NAME']?>',
            iconCaption: '<?=$arResult['SECTIONS_NAMES'][$arItem['IBLOCK_SECTION_ID']]?>'
        }, {
            preset: 'islands#redCircleDotIconWithCaption',
            iconCaptionMaxWidth: '50'
        }));
	
	<? endforeach; ?>

	var centerAndZoom = ymaps.util.bounds.getCenterAndZoom( myMap.geoObjects.getBounds(), myMap.container.getSize(), myMap.options.get( 'projection' ) );
	var newZoom = centerAndZoom.zoom - 1;
	if ( newZoom > 17 )
		newZoom = 17;
	myMap.setCenter( centerAndZoom.center, newZoom );
	
	
	$( 'a.map-city' ).click(
			function ()
			{
				$( 'a.map-city' ).removeClass( 'active' );
				
				var _this = $( this );
				var cityId = _this.data( 'id' );
				var cityName = _this.attr( 'title' );
				
				$.post(
					'/ajax/get_map.php',
					{
						CITY_ID: cityId
					},
					function ( data )
					{
						myMap.geoObjects.removeAll();
	
						for ( var i = 0; i < data.length; i++ )
						{
							myMap.geoObjects
							.add(new ymaps.Placemark([data[i].COORDS_1, data[i].COORDS_2], {
								balloonContent: data[i].NAME,
								iconCaption: cityName
							}, {
								preset: 'islands#redCircleDotIconWithCaption',
								iconCaptionMaxWidth: '50'
							}));
						}
						
						_this.addClass( 'active' );
						
						var centerAndZoom = ymaps.util.bounds.getCenterAndZoom( myMap.geoObjects.getBounds(), myMap.container.getSize(), myMap.options.get( 'projection' ) );
						var newZoom = centerAndZoom.zoom - 1;
						
						if ( newZoom > 17 )
							newZoom = 17;
						myMap.setCenter( centerAndZoom.center, newZoom );
					},
					'json'
				);
			}
		);

}
</script>