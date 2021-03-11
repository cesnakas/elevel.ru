/*
$(function(){

    var coords;

    var coordTitles;

    var myMap;  

    

    // инициализация карты

    $(document).ready(function(){

		change_city();
		ymaps.ready(init); 

		$(document).on('click','#partners ul.tabset-cities a.select-city', function(e){
			change_city();
			init();
		});
		
        function change_city(){
			coords = [];

			coordTitles = [];
			
			var shopElements = $("#partners .select-city.active").data("elements");
			
			if (typeof shopElements != "number")
				shopIds = shopElements.split("|").map(string => parseInt(string));
			else
				shopIds = [parseInt(shopElements)];

			$('#partners .list-title').each(function(){
				
				var shopId = $(this).data("element");
				
				if ($.inArray( shopId, shopIds ) > -1)
				{
					if($(this).data('coord')){
						coords[coords.length] = $(this).data('coord').split(',');

						coordTitles[coordTitles.length] = $(this).next('.office-desc').find('.office-title').html()+"<br/>"+$(this).next('.office-desc').find('.office-desc-text').html();
					}
				}
			});     
		}
			
        function init(){
			
			$('#map2').empty();
			
			if(coords.length > 0){
				myMap = new ymaps.Map("map2", {

					center: coords[0],

					zoom: 10,

					controls: []

				});         

				myCollection = new ymaps.GeoObjectCollection({}, { 

					});

				for(var i = 0; i < coords.length; i++){

					myPlacemark = new ymaps.Placemark(coords[i], { 

							content: coordTitles[i], 

							balloonContentBody: coordTitles[i] 

					},

					{

						iconLayout: 'default#image',

						iconImageHref: '/includes/img/placeholder-orange.svg',

						iconImageSize: [21, 29],

						iconImageOffset: [-10, -15],
						
						iconCaptionMaxWidth: '50'

					});

					myCollection.add(myPlacemark);

				} 

				

				myMap.geoObjects.add(myCollection);

				myMap.behaviors.disable('scrollZoom');

				myMap.controls.add("zoomControl", {position: {bottom: '30px', right: '5px'}, size:'small'});

				myMap.controls.add("geolocationControl", {position: {bottom: '100px', right: '5px'}, size:'small'});

				myMap.controls.add("typeSelector");

				

				

				myMap.setBounds( myCollection.getBounds(),{ checkZoomRange: true, zoomMargin:100 }).then(function(){ if(myMap.getZoom() > 12) myMap.setZoom(12);});

				

				var position = myMap.getGlobalPixelCenter();

				myMap.setGlobalPixelCenter([ position[0] - 100, position[1] ]);

			}            
        }            

    });
});
*/