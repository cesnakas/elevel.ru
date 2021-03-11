$(function(){     

    var coords;

    var coordTitles;

    var myMap;  

    

    /* инициализация карты*/

    $(document).ready(function(){

        coords = [];

        coordTitles = [];

        $('.list-title').each(function(){

            coords[coords.length] = $(this).data('coord').split(',');

			coordTitles[coordTitles.length] = $(this).next('.office-desc').find('.office-title').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-text').html()+$(this).next('.office-desc').find('.show-on-map').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-more').html(); 
			
        });                       

        console.log("coords");
        console.log(coords);

        //$('#map').css('min-height', $('.office-list').height()+600)                                      

        ymaps.ready(init); 



        function init(){     

            myMap = new ymaps.Map("map", {

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

                    iconImageHref: '/includes/img/ymap_icon.png',

                    iconImageSize: [50, 55],

                    iconImageOffset: [-19, -50]

                });

                myCollection.add(myPlacemark);

            } 

            

            myMap.geoObjects.add(myCollection);

            myMap.behaviors.disable('scrollZoom');

            myMap.controls.add("zoomControl", {position: {bottom: '30px', right: '5px'}, size:'small'});

            myMap.controls.add("geolocationControl", {position: {bottom: '100px', right: '5px'}, size:'small'});

            myMap.controls.add("typeSelector");

            

            

            myMap.setBounds( myCollection.getBounds(),{ checkZoomRange: true }).then(function(){ if(myMap.getZoom() > 14) myMap.setZoom(14);});

            

            var position = myMap.getGlobalPixelCenter();

            myMap.setGlobalPixelCenter([ position[0] - 100, position[1] ]);

        }            

    });


    





    

    /* магазин из списка детально */

    $(document).on('click', '.office-title', function(){ 

        /*скрыть*/ 

        if($(this).parent().hasClass('office-desc')){

            $(this).parent('.office-desc').toggle();

            $(this).parent('.office-desc').parent('li').find('.office-title.list-title').toggle();

            myCollection.removeAll();

            for(var i = 0; i < coords.length; i++){

                myPlacemark = new ymaps.Placemark(coords[i], { 

                            content: coordTitles[i], 

                            balloonContentBody: coordTitles[i] 

                    },

                    {

                        iconLayout: 'default#image',

                        iconImageHref: '/includes/img/ymap_icon.png',

                        iconImageSize: [50, 55],

                        iconImageOffset: [-19, -50]

                    });                        

                                   

                myCollection.add(myPlacemark);

            }

            myMap.geoObjects.add(myCollection);

            myMap.setBounds( myCollection.getBounds(),{ checkZoomRange: true }).then(function(){ if(myMap.getZoom() > 14) myMap.setZoom(14);});

            var position = myMap.getGlobalPixelCenter();

            myMap.setGlobalPixelCenter([ position[0] - 100, position[1] ]);
        }

        else{

            /*показать*/               
            
            $('.office-list li').each(function(){

                if($(this).find('.office-desc').is(':visible')){

                   $(this).find('.office-desc').toggle(); 

                   $(this).find('.office-title').toggle(); 

                }

            })

            $(this).parent('li').find('.office-desc').toggle();

            $(this).toggle();

            

            coord = $(this).data('coord').split(',');

            
             coords = [];

		    coordTitles = [];

		    $('.list-title').each(function(){

		        coords[coords.length] = $(this).data('coord').split(',');

		        coordTitles[coordTitles.length] = $(this).next('.office-desc').find('.office-title').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-text').html()+$(this).next('.office-desc').find('.show-on-map').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-more').html(); 

		    });
		    
            myCollection.removeAll();

            for(var i = 0; i < coords.length; i++){

                if($(this).data('coord') == coords[i]){   

                     myPlacemark = new ymaps.Placemark(coords[i], { 

                            content: coordTitles[i], 

                            balloonContentBody: coordTitles[i] 

                    },

                    {

                        iconLayout: 'default#image',

                        iconImageHref: '/includes/img/ymap_icon.png',

                        iconImageSize: [50, 55],

                        iconImageOffset: [-19, -50]

                    });

                }

                else{

                    myPlacemark = new ymaps.Placemark(coords[i], { 

                            content: coordTitles[i], 

                            balloonContentBody: coordTitles[i] 

                    },

                    {

                        iconLayout: 'default#image',

                        iconImageHref: '/includes/img/ymap_icon.png',

                        iconImageSize: [50, 55],

                        iconImageOffset: [-19, -50]

                    });                        

                }                     

                myCollection.add(myPlacemark); 

            }
             $('#map').empty();
            var myMap;
	        myMap = new ymaps.Map("map", {

	                center: coords[0],

	                zoom: 16,

	                controls: []

	        });

            myMap.geoObjects.add(myCollection);

            myMap.setCenter(coord, 16, {

                checkZoomRange: true

            });

        }

            

    });

});

    /* ajax-фильтр по специализации */

       $(document).on('click', '.show-office', function(){

        office = "#office_"+$(this).data('id'); 

        $(office).click(); 

    });




$(document).on('click','ul.list-cities li.addr-item a, .map-item', function(e){
	e.preventDefault();
	$('ul.list-cities').find('li.active').removeClass('active');
	$(this).closest('li').addClass('active');
	var addr = $(this).data("addr");
	
	$.ajax({
		url: '/ajax/address-map.php',
		type: "POST",
		data: {addr: addr},
		dataType: "html",
		success: function(data) {
			if (data){

				var addr_content = $(data).find('ul.office-list');
				console.log("addr_content")
				console.log(addr_content)
				$('.contact-box .office-list').replaceWith(addr_content); 
				
				coords = [];

				coordTitles = [];

		        $('.list-title').each(function(){

		            coords[coords.length] = $(this).data('coord').split(',');

					coordTitles[coordTitles.length] = $(this).next('.office-desc').find('.office-title').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-text').html()+$(this).next('.office-desc').find('.show-on-map').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-more').html(); 

		        });

		        
                $('#map').empty();
                
		        //$('#map').css('min-height', $('.office-list').height()+600);  
		        
	             for(var i = 0; i < coords.length; i++){

	                if($(this).data('coord') == coords[i]){   

	                     myPlacemark = new ymaps.Placemark(coords[i], { 

	                            content: coordTitles[i], 

	                            balloonContentBody: coordTitles[i] 

	                    },

	                    {

	                        iconLayout: 'default#image',

	                        iconImageHref: '/includes/img/ymap_icon.png',

	                        iconImageSize: [50, 55],

	                        iconImageOffset: [-19, -50]

	                    });

	                }

	                else{

	                    myPlacemark = new ymaps.Placemark(coords[i], { 

	                            content: coordTitles[i], 

	                            balloonContentBody: coordTitles[i] 

	                    },

	                    {

	                        iconLayout: 'default#image',

	                        iconImageHref: '/includes/img/ymap_icon.png',

	                        iconImageSize: [50, 55],

	                        iconImageOffset: [-19, -50]

	                    });                        

	                }                     

	                myCollection.add(myPlacemark); 

	            }

	            
	            
	            
	            
	            
	            
	            
	            
	            
	            
	            
	            var myMap;
	            myMap = new ymaps.Map("map", {

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

	                    iconImageHref: '/includes/img/ymap_icon.png',

	                    iconImageSize: [50, 55],

	                    iconImageOffset: [-19, -50]

	                });

	                myCollection.add(myPlacemark);

	            }
	            
	            
	            
	              myMap.geoObjects.add(myCollection);

		            myMap.behaviors.disable('scrollZoom');

		            myMap.controls.add("zoomControl", {position: {bottom: '30px', right: '5px'}, size:'small'});

		            myMap.controls.add("geolocationControl", {position: {bottom: '100px', right: '5px'}, size:'small'});

		            myMap.controls.add("typeSelector");

		            

		            

		            myMap.setBounds( myCollection.getBounds(),{ checkZoomRange: true }).then(function(){ if(myMap.getZoom() > 14) myMap.setZoom(14);});

		            

		            var position = myMap.getGlobalPixelCenter();

		            myMap.setGlobalPixelCenter([ position[0] - 100, position[1] ]);
			}

		}
	});
});