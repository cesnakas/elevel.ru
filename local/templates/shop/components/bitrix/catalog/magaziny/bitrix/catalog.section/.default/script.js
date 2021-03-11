$(function(){     
    var coords;
    var coordTitles;
    var myMap;  
    
    /* инициализация карты */
    $(document).ready(function(){
        coords = [];
        coordTitles = [];
        $('.list-title').each(function(){
            coords[coords.length] = $(this).data('coord').split(',');
            //coordTitles[coordTitles.length] = $(this).find('a.office-name').text(); 
            if($('.list-title').size() == 1)
                coordTitles[coordTitles.length] = $(this).parent('.office-desc').find('.office-title-single').html()+"<br>"+$(this).parent('.office-desc').find('.office-desc-text').html()+$(this).parent('.office-desc').find('.office-desc-more').html(); 
            else
                coordTitles[coordTitles.length] = $(this).next('.office-desc').find('.office-title').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-text').html()+$(this).next('.office-desc').find('.show-on-map').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-more').html(); 
                  
        });                       
        
        $('#ya_map_all').css('min-height', $('.office-list').height()+600)                                      
        ymaps.ready(init); 

        function init(){     
            myMap = new ymaps.Map("ya_map_all", {
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
                    iconImageHref: '/bitrix/templates/wt-elevel-contacts/images/contacts/ymap_icon.png',
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
            
            
            myMap.setBounds( myCollection.getBounds()).then(function(){ if(myMap.getZoom() > 14) myMap.setZoom(14);});
            
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
                        iconImageHref: '/bitrix/templates/wt-elevel-contacts/images/contacts/ymap_icon.png',
                        iconImageSize: [50, 55],
                        iconImageOffset: [-19, -50]
                    });                        
                                   
                myCollection.add(myPlacemark);
            }
            myMap.geoObjects.add(myCollection);
            myMap.setBounds( myCollection.getBounds()).then(function(){ if(myMap.getZoom() > 14) myMap.setZoom(14);});
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
            
            myCollection.removeAll();
            
            for(var i = 0; i < coords.length; i++){
                if($(this).data('coord') == coords[i]){   
                     myPlacemark = new ymaps.Placemark(coords[i], { 
                            content: coordTitles[i], 
                            balloonContentBody: coordTitles[i] 
                    },
                    {
                        iconLayout: 'default#image',
                        iconImageHref: '/bitrix/templates/wt-elevel-contacts/images/contacts/ymap_icon.png',
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
                        iconImageHref: '/bitrix/templates/wt-elevel-contacts/images/contacts/ymap_icon.png',
                        iconImageSize: [50, 55],
                        iconImageOffset: [-19, -50]
                    });                        
                }                     
                myCollection.add(myPlacemark); 
            }
            myMap.geoObjects.add(myCollection);
            myMap.setCenter(coord, 16, {
                checkZoomRange: true
            });
        }
            
    });
    
    /* ajax-фильтр по специализации */
    $(document).on('click', '.contacts-spec-filter a', function(){
       $(this).parents('ul').find('li.active').removeClass('active');
       $(this).parent('li').addClass('active');  
       $.post(window.location.pathname, {'spec': $(this).data('spec')}, function(data){
            $('ul.office-list').replaceWith($('ul.office-list', data));
            coords = [];
            coordTitles = [];
            $('.list-title').each(function(){
                coords[coords.length] = $(this).data('coord').split(',');
                //coordTitles[coordTitles.length] = $(this).find('a.office-name').text(); 
                if($('.list-title').size() == 1)
                    coordTitles[coordTitles.length] = $(this).parent('.office-desc').find('.office-title-single').html()+"<br>"+$(this).parent('.office-desc').find('.office-desc-text').html()+$(this).parent('.office-desc').find('.office-desc-more').html(); 
                else
                    coordTitles[coordTitles.length] = $(this).next('.office-desc').find('.office-title').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-text').html()+$(this).next('.office-desc').find('.show-on-map').html()+"<br>"+$(this).next('.office-desc').find('.office-desc-more').html(); 
                
            });               
            myCollection.removeAll();
            for(var i = 0; i < coords.length; i++){
                myPlacemark = new ymaps.Placemark(coords[i], { 
                            content: coordTitles[i], 
                            balloonContentBody: coordTitles[i] 
                    },
                    {
                        iconLayout: 'default#image',
                        iconImageHref: '/bitrix/templates/wt-elevel-contacts/images/contacts/ymap_icon.png',
                        iconImageSize: [50, 55],
                        iconImageOffset: [-19, -50]
                    });
                myCollection.add(myPlacemark); 
            }  
            
            $('#ya_map_all').css('min-height', $('.office-list').height()+600);
            myMap.container.fitToViewport();
            
            myMap.geoObjects.add(myCollection);             
            myMap.setBounds( myCollection.getBounds()).then(function(){ if(myMap.getZoom() > 14) myMap.setZoom(14);});            
            var position = myMap.getGlobalPixelCenter();
            myMap.setGlobalPixelCenter([ position[0] - 100, position[1] ]); 
       }); 
    });
    
    $(document).on('click', '.show-office', function(){
        office = "#office_"+$(this).data('id'); 
        $(office).click(); 
    });
    
});