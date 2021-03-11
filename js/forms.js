$(document).ready(function() {
	
	/*обратный звонок*/
	$(".pp-callback,#pp-callback").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/pp-callback.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','240px');
	});
	
	$(".pp-proschet,#pp-proschet").click(function(){
		$('#container2').css('position','absolute');
		$('.popup398Content').empty();
		$('.popup560Content').empty().load('/sendquery/pp-proschet.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup398').css('display','none');
			$('#container2, .popup560').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','50px');
	});
	
	$(".pp-sendquery,#pp-sendquery").click(function(){
		$('#container2').css('position','absolute');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/pp-sendquery.php');
		var x = $('body').height();
		$('#fade').height(x);
		$('#container2, .popup560').css('display','none');
		$('#container2, .popup398').css('display','block');
		$('#fade').fadeTo('slow',0.5);
		$('#container2').css('top','50px');
	});
	
	$(".hot_home,#hotdom").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/hot_home.php');
			var x = $('body').height();
				$('#fade').height(x);
				$('#container2, .popup560').css('display','none;');
				$('#container2, .popup398').css('display','block');
				$('#fade').fadeTo('slow',0.5);
				$('#container2').css('top','20px');
			});
	
	
	$(".sneg,#sneg").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/sneg.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','4px');
		});
	
	$(".simple_i,#simple_i").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/presentation_i.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','4px');
		});
	
	$(".simple_h,#simple_h").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/presentation_h.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','4px');
		});
		

	$(".simple_ckc,#simple_ckc").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/presentation_ckc.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','50px');
		});
	
	$(".simple_d,#simple_d").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/presentation_d.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','50px');
		});
	
	$(".simple_s,#simple_s").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/presentation_s.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','50px');
		});
	
	$(".simple_t,#simple_t").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/presentation_t.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','4px');
		});
	
	$(".smart_zapros,#smart_zapros").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/smart_zapros.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','4px');
		});
	
	
	
	$(".trubi,#trubi").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/trubi.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup560').css('display','none');
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
			$('#container2').css('top','4px');
		});
	
	$(".electroshit,#shild").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/electroshit.php');
			var x = $('body').height();
				$('#fade').height(x);
				$('#container2, .popup560').css('display','none;');
				$('#container2, .popup398').css('display','block');
				$('#fade').fadeTo('slow',0.5);
				$('#container2').css('top','20px');
			});
            
    $(".project,#project").click(function(){
        $('#container2').css('position','fixed');
        $('.popup560Content').empty();
        $('.popup398Content').empty().load('/sendquery/srvc-project.php');
            var x = $('body').height();
                $('#fade').height(x);
                $('#container2, .popup560').css('display','none;');
                $('#container2, .popup398').css('display','block');
                $('#fade').fadeTo('slow',0.5);
                $('#container2').css('top','20px');
            });
            
    $(".complect,#complect").click(function(){
        $('#container2').css('position','fixed');
        $('.popup560Content').empty();
        $('.popup398Content').empty().load('/sendquery/srvc-complect.php');
            var x = $('body').height();
                $('#fade').height(x);
                $('#container2, .popup560').css('display','none;');
                $('#container2, .popup398').css('display','block');
                $('#fade').fadeTo('slow',0.5);
                $('#container2').css('top','20px');
            });
            
    $(".installation,#installation").click(function(){
        $('#container2').css('position','fixed');
        $('.popup560Content').empty();
        $('.popup398Content').empty().load('/sendquery/srvc-installation.php');
            var x = $('body').height();
                $('#fade').height(x);
                $('#container2, .popup560').css('display','none;');
                $('#container2, .popup398').css('display','block');
                $('#fade').fadeTo('slow',0.5);
                $('#container2').css('top','20px');
            });
    
    $(".supervision,#supervision").click(function(){
        $('#container2').css('position','fixed');
        $('.popup560Content').empty();
        $('.popup398Content').empty().load('/sendquery/srvc-supervision.php');
            var x = $('body').height();
                $('#fade').height(x);
                $('#container2, .popup560').css('display','none;');
                $('#container2, .popup398').css('display','block');
                $('#fade').fadeTo('slow',0.5);
                $('#container2').css('top','20px');
            });
            
    $(".electrolab,#electrolab").click(function(){
        $('#container2').css('position','fixed');
        $('.popup560Content').empty();
        $('.popup398Content').empty().load('/sendquery/srvc-electrolab.php');
            var x = $('body').height();
                $('#fade').height(x);
                $('#container2, .popup560').css('display','none;');
                $('#container2, .popup398').css('display','block');
                $('#fade').fadeTo('slow',0.5);
                $('#container2').css('top','20px');
            });
			
	$(".pp-sendquery-osi,#osickc").click(function(){
		$('#container2').css('position','fixed');
		$('.popup398Content').empty();
		$('.popup560Content').empty().load('/sendquery/pp-sendquery-osi.php');
			var x = $('body').height();
				$('#fade').height(x);
				$('#container2, .popup398').css('display','none;');
				$('#container2, .popup560').css('display','block');
				$('#fade').fadeTo('slow',0.5);
				$('#container2').css('top','20px');
			});
	
	$(".home_price, #umd").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/pp-home_price.php');
		    var x = $('body').height();
			    $('#fade').height(x);
			    $('#container2, .popup560').css('display','none;');
			    $('#container2, .popup398').css('display','block');
			    $('#fade').fadeTo('slow',0.5);
			    $('#container2').css('top','20px');
		});
        
    $(".intbuilding,#intbuilding").click(function(){
        $('#container2').css('position','fixed');
        $('.popup560Content').empty();
        $('.popup398Content').empty().load('/sendquery/sa-intbuilding.php');
            var x = $('body').height();
                $('#fade').height(x);
                $('#container2, .popup560').css('display','none;');
                $('#container2, .popup398').css('display','block');
                $('#fade').fadeTo('slow',0.5);
                $('#container2').css('top','20px');
            });
            
    $(".elpsupply,#elpsupply").click(function(){
        $('#container2').css('position','fixed');
        $('.popup560Content').empty();
        $('.popup398Content').empty().load('/sendquery/s-elpsupply.php');
            var x = $('body').height();
                $('#fade').height(x);
                $('#container2, .popup560').css('display','none;');
                $('#container2, .popup398').css('display','block');
                $('#fade').fadeTo('slow',0.5);
                $('#container2').css('top','20px');
            });
	
	$(".pp-presentation,#pp-presentation").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/pp-presentation.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
		});
	
	$(".print_cat").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/catprint.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
		});
	
		$("#diod, .diod").click(function(){
		$('#container2').css('position','fixed');
		$('.popup560Content').empty();
		$('.popup398Content').empty().load('/sendquery/pp-svetodiod.php');
		var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
		});

		$("#gen, .gen").click(function(){
			$('#container2').css('position','fixed');
			$('.popup560Content').empty();
			$('.popup398Content').empty().load('/sendquery/generator_request.php');
				var x = $('body').height();
					$('#fade').height(x);
					$('#container2, .popup560').css('display','none;');
					$('#container2, .popup398').css('display','block');
					$('#fade').fadeTo('slow',0.5);
					$('#container2').css('top','50px');
				});
		
	$('.enter').click(function() {
		$('#container2').css('position','fixed');
		$('.popup398Content').empty().load('/sendquery/auth.php');
		var x = $('body').height();
		$('#fade').height(x);
		$('#container2, .popup398').css('display','block');
		$('#fade').fadeTo('slow',0.5);		
	});
	
	$('.registr').click(function() {
		$('#container2').css('position','fixed');
		$('.popup398Content').empty().load('/sendquery/registr.php');
		var x = $('body').height();
		$('#fade').height(x);
		$('#container2, .popup398').css('display','block');
		$('#fade').fadeTo('slow',0.5);		
	});
	
	$('.forget_form').click(function() {
		$('#container2').css('position','absolute');
		/*alert('ffff');
		$('.popup398Content').empty().load('/sendquery/forget_form.php');
		var x = $('body').height();
		$('#fade').height(x);
		$('#container2, .popup398').css('display','block');
		$('#fade').fadeTo('slow',0.5);*/		
	});
	
	
	
	
	$('.last ul li').css('width','200px');
	$('ul.menu3 li span.selected').css('color','#f05922');
	$('ul.menu3').css('padding-bottom','12px');
	$('.w798,.w588').css('font-size','18px');
	$('.list232b img.pic74').remove();

	/*
	
	$('.scrollTop img').click(function(){
		$('.blockH1075').scrollTo( '-=100px', 800 );
		
	});
	
	$('.scrollBottom img').click(function(){
		$('.blockH1075').scrollTo( '+=100px', 800 );
		
	});
	*/
	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	    return pattern.test(emailAddress);
	}
	$('input[name="ORDER_PROP_2"]').parent().append('<span id="pnone_name"></span>');
	
	$('input[name="CODE"],input[name="ORDER_PROP_2"]').keypress(function (e){
		if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
			
			$("#pnone_name").html("Только цифры").show().fadeOut(3000); 
			return false;
		}
	});
	
	//$('input[name="ORDER_PROP_1"]').parent().css('position','relation');
	
	      
	$('input[name="contButton"]').click(function(){
        NAME = $('input.order_name').val();
        error='';
        EMAIL = $('input.order_email').val();
        PHONE = $('input.order_phone').val();
        cur_step = $('input[name=CurrentStep]').val(); 
        var person_type = $('form > input[name=PERSON_TYPE]').val();
        if(person_type != 1 && person_type != 4 && person_type != 5){
            person_type = $('input[name=PERSON_TYPE]').val();
        }

        if(person_type == 1){
            NAME = $('input[name=ORDER_PROP_1]').val();
            if(NAME.length == 0 || cur_step == 6){
                NAME = $('#container > input[name=ORDER_PROP_1]').val()   
            }
            error='';
            EMAIL = $('input[name=ORDER_PROP_19]').val();
            if(EMAIL.length == 0 || cur_step == 6){
                EMAIL = $('#container > input[name=ORDER_PROP_19]').val()   
            }
            PHONE = $('input[name=ORDER_PROP_2]').val();    
            if(PHONE.length == 0 || cur_step == 6){
                PHONE = $('#container > input[name=ORDER_PROP_2]').val()   
            }
        }        
        if(person_type == 4){
            NAME = $('input[name=ORDER_PROP_65]').val();
            if(NAME.length == 0 || cur_step == 6){
                NAME = $('#container > input[name=ORDER_PROP_65]').val()   
            }
            error='';
            EMAIL = $('input[name=ORDER_PROP_67]').val();
            if(EMAIL.length == 0 || cur_step == 6){
                EMAIL = $('#container > input[name=ORDER_PROP_67]').val()   
            }
            PHONE = $('input[name=ORDER_PROP_66]').val();    
            if(PHONE.length == 0 || cur_step == 6){
                PHONE = $('#container > input[name=ORDER_PROP_66]').val()   
            }
        }        
        if(person_type == 5){
            NAME = $('input[name=ORDER_PROP_78]').val();
            if(NAME.length == 0 || cur_step == 6){
                NAME = $('#container > input[name=ORDER_PROP_78]').val()   
            }
            error='';
            EMAIL = $('input[name=ORDER_PROP_80]').val();
            if(EMAIL.length == 0 || cur_step == 6){
                EMAIL = $('#container > input[name=ORDER_PROP_80]').val()   
            }
            PHONE = $('input[name=ORDER_PROP_79]').val();  
            if(PHONE.length == 0 || cur_step == 6){
                PHONE = $('#container > input[name=ORDER_PROP_79]').val()   
            }  
        }  
        /*var person_type = $('input[name=PERSON_TYPE]').val();
        if(person_type == 1){
            NAME = $('input[name="ORDER_PROP_1"]').val();
            error='';
            EMAIL = $('input[name="ORDER_PROP_19"]').val();
            PHONE = $('input[name="ORDER_PROP_2"]').val();    
        } */

        /*NAME = $('.order_name').val();
        error='';
        EMAIL = $('.order_email').val();
        PHONE = $('.order_phone').val(); */ 
        
        obLogic = {};
        obLogic['cur_step'] = $('input[name=CurrentStep]').val(); 
        //obLogic['phone'] = $('.order_phone').val(); 
        obLogic['phone'] = PHONE; 
        obLogic['mail'] = EMAIL; 
        obLogic['name'] = NAME; 
        BX.ajax({
            url: "/ajax/check_auth.php",
            method: 'POST',
            data: obLogic,
            dataType: 'html',
            async: false,
            processData: true,
            scriptsRunFirst: true,
            emulateOnload: true,
            start: true,
            cache: false,
            //onsuccess: function(data){error=1}
        }); 
        
        if(person_type == 1){
            var this_name = $('input[name=ORDER_PROP_1]');
            var this_phone = $('input[name=ORDER_PROP_2]');
            var this_ofis = $('select[name=ORDER_PROP_4]');
            var this_mail = $('input[name=ORDER_PROP_19]');
            var this_addr = $('input[name=ORDER_PROP_82]');
        }
        if(person_type == 4){
            var this_name = $('input[name=ORDER_PROP_65]');
            var this_phone = $('input[name=ORDER_PROP_66]');
            var this_ofis = $('select[name=ORDER_PROP_83]');
            var this_mail = $('input[name=ORDER_PROP_67]');
            var this_addr = $('input[name=ORDER_PROP_59]');

            var this_inn = $('input[name=ORDER_PROP_55]');
            var this_kpp = $('input[name=ORDER_PROP_56]');
            var this_org_name = $('input[name=ORDER_PROP_57]');
            var this_ur_addr = $('input[name=ORDER_PROP_58]');
            
            var this_ras_schet = $('input[name=ORDER_PROP_61]');
            var this_bik = $('input[name=ORDER_PROP_62]');
            var this_bank_name = $('input[name=ORDER_PROP_63]');
            var this_kad = $('input[name=ORDER_PROP_64]');

        }
        if(person_type == 5){
            var this_name = $('input[name=ORDER_PROP_78]');
            var this_phone = $('input[name=ORDER_PROP_79]');
            var this_ofis = $('select[name=ORDER_PROP_84]');
            var this_mail = $('input[name=ORDER_PROP_80]');
            
            var this_addr = $('input[name=ORDER_PROP_72]');

            var this_inn = $('input[name=ORDER_PROP_68]');
            var this_kpp = $('input[name=ORDER_PROP_56]');
            var this_org_name = $('input[name=ORDER_PROP_70]');
            var this_ur_addr = $('input[name=ORDER_PROP_71]');
            
            var this_ras_schet = $('input[name=ORDER_PROP_74]');
            var this_bik = $('input[name=ORDER_PROP_75]');
            var this_bank_name = $('input[name=ORDER_PROP_76]');
            var this_kad = $('input[name=ORDER_PROP_77]');

        }

        if(this_name.val() == '' || this_name.val() == undefined){
            this_name.css('border-color','#f25b26');
            if($('#new_name').length == 0){
                this_name.parent().append('<br><span id="new_name"></span>');
                $('#new_name').html('Заполните имя');
            }
            error=1;
        }  
        else{
            if($('#new_name').length != 0){
                this_name.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                $('#new_name').remove(); 
            }
        }    
       
        if(this_phone.val() == '' || this_phone.val() == undefined){
            this_phone.css('border-color','#f25b26');
            if($('#new_phone').length == 0){
                this_phone.parent().append('<br><span id="new_phone"></span>');
                $('#new_phone').html('Заполните телефон');
            }
            error=1;
        } 
        else{
             if($('#new_phone').length != 0){
                this_phone.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                $('#new_phone').remove(); 
            }
        }   
       
        if(this_mail.val() == '' || this_mail.val() == undefined ||!isValidEmailAddress(this_mail.val())){
            this_mail.css('border-color','#f25b26');
            if($('#new_mail').length == 0){
                this_mail.parent().append('<br><span id="new_mail"></span>');
                $('#new_mail').html('Неверно указан e-mail'); 
            }
            error=1;
        }   
        else{
            if($('#new_mail').length != 0){
                this_mail.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                $('#new_mail').remove(); 
            }
        } 

        /*if(this_addr.val() == '' || this_addr.val() == undefined){
            this_addr.css('border-color','#f25b26');
            if($('#new_addr').length == 0){
                this_addr.parent().append('<br><span id="new_addr"></span>');
                $('#new_addr').html('Заполните адрес');
            }
            error=1;
        } 
        else{
            if($('#new_addr').length != 0){
                this_addr.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                $('#new_addr').remove(); 
            }
        }*/

        if(this_ofis.find('option:selected').val() == '(выберите город)' || this_ofis.find('option:selected').val() == undefined){
            if($('#new_ofis').length == 0){
                this_ofis.parent().append('<br><span id="new_ofis"></span>');
                $('#new_ofis').css('color', '#f25b26');
                $('#new_ofis').html('Выберите офис');
            }   
            error=1;
        }

        if(person_type == 4){
            if(this_kpp.val() == '' || this_kpp.val() == undefined){
                this_kpp.css('border-color','#f25b26');
                if($('#new_kpp').length == 0){
                    this_kpp.parent().append('<br><span id="new_kpp"></span>');
                    $('#new_kpp').html('Заполните КПП');
                }
                error=1;
            } 
            else{
                if($('#new_kpp').length != 0){
                    this_kpp.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                    $('#new_kpp').remove(); 
                }
            }
        }

        if(person_type == 4 || person_type == 5){
            if(this_inn.val() == '' || this_inn.val() == undefined){
                this_inn.css('border-color','#f25b26');
                if($('#new_inn').length == 0){
                    this_inn.parent().append('<br><span id="new_inn"></span>');
                    $('#new_inn').html('Заполните ИНН');
                }
                error=1;
            } 
            else{
                if($('#new_inn').length != 0){
                    this_inn.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                    $('#new_inn').remove(); 
                }
            }            
            if(this_org_name.val() == '' || this_org_name.val() == undefined){
                this_org_name.css('border-color','#f25b26');
                if($('#new_org_name').length == 0){
                    this_org_name.parent().append('<br><span id="new_org_name"></span>');
                    $('#new_org_name').html('Заполните наименование организации');
                }
                error=1;
            } 
            else{
                if($('#new_org_name').length != 0){
                    this_org_name.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                    $('#new_org_name').remove(); 
                }
            }
            if(this_ur_addr.val() == '' || this_ur_addr.val() == undefined){
                this_ur_addr.css('border-color','#f25b26');
                if($('#new_ur_addr').length == 0){
                    this_ur_addr.parent().append('<br><span id="new_ur_addr"></span>');
                    $('#new_ur_addr').html('Заполните юридический адрес');
                }
                error=1;
            } 
            else{
                if($('#new_ur_addr').length != 0){
                    this_ur_addr.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                    $('#new_ur_addr').remove(); 
                }
            }
            if(this_ras_schet.val() == '' || this_ras_schet.val() == undefined){
                this_ras_schet.css('border-color','#f25b26');
                if($('#new_ras_schet').length == 0){
                    this_ras_schet.parent().append('<br><span id="new_ras_schet"></span>');
                    $('#new_ras_schet').html('Заполните расчетный счет');
                }
                error=1;
            } 
            else{
                if($('#new_ras_schet').length != 0){
                    this_ras_schet.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                    $('#new_ras_schet').remove(); 
                }
            }
            if(this_bik.val() == '' || this_bik.val() == undefined){
                this_bik.css('border-color','#f25b26');
                if($('#new_bik').length == 0){
                    this_bik.parent().append('<br><span id="new_bik"></span>');
                    $('#new_bik').html('Заполните БИК');
                }
                error=1;
            } 
            else{
                if($('#new_bik').length != 0){
                    this_bik.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                    $('#new_bik').remove(); 
                }
            }
            if(this_bank_name.val() == '' || this_bank_name.val() == undefined){
                this_bank_name.css('border-color','#f25b26');
                if($('#new_bank_name').length == 0){
                    this_bank_name.parent().append('<br><span id="new_bank_name"></span>');
                    $('#new_bank_name').html('Заполните наменование банка');
                }
                error=1;
            } 
            else{
                if($('#new_bank_name').length != 0){
                    this_bank_name.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                    $('#new_bank_name').remove(); 
                }
            }
            if(this_kad.val() == '' || this_kad.val() == undefined){
                this_kad.css('border-color','#f25b26');
                if($('#new_kad').length == 0){
                    this_kad.parent().append('<br><span id="new_kad"></span>');
                    $('#new_kad').html('Заполните кадастровый счет');
                }
                error=1;
            } 
            else{
                if($('#new_kad').length != 0){
                    this_kad.css('border-color', '#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7');
                    $('#new_kad').remove(); 
                }
            }        
        }
        /*if(NAME==''){
            $('input[name="ORDER_PROP_1"]').css('border-color','#f25b26');
            if($('#new_name').text() !== 'Заполните имя'){
                $('input[name="ORDER_PROP_1"]').parent().append('<br><span id="new_name"></span>');
                $('#new_name').html('Заполните имя');//&nbsp; 
            }
            error=1;
        };		
        if(PHONE==''){
			$('input[name="ORDER_PROP_2"]').css('border-color','#f25b26');
            if($('#new_phone').text() !== 'Заполните телефон'){
			    $('input[name="ORDER_PROP_2"]').parent().append('<br><span id="new_phone"></span>');
			    $('#new_phone').html('Заполните телефон');
            }
			error=1;
		};
		
		if(EMAIL==''||!isValidEmailAddress(EMAIL)){
			$('input[name="ORDER_PROP_19"]').css('border-color','#f25b26');
            if($('#new_name').text() !== 'Неверно указан e-mail'){
			    $('input[name="ORDER_PROP_19"]').parent().append('<br><span id="new_err"></span>');
			    $('#new_err').html('Неверно указан e-mail');
            }
			error=1;
		} else {
			$('#new_err').html('&nbsp; <img alt="" src="/i/pic17-checked.gif">');
	    }*/

		if(error!=''){
			return false;
		}
		//$('input[name="ORDER_PROP_19"],input[name="ORDER_PROP_1"]').css('border-color','#B7B7B7 #E4E3E3 #E4E3E3 #B7B7B7');
	});
	
	
	
	$('.block270 #title-search-input').bind('keypress', function(e) {
	      if (e.keyCode == '13') { // Если был нажат ENTER
	          e.preventDefault(); // Игнорируем действие по умолчанию)
	      $('.btn22a').click();
	      }
	});
	$('.blockH48 #title-search-input').bind('keypress', function(e) {
	      if (e.keyCode == '13') { // Если был нажат ENTER
	          e.preventDefault(); // Игнорируем действие по умолчанию)
	      $('.btn122a').click();
	      }
	});
	$('.blockH48 #title-search-input-catalog').bind('keypress', function(e) {
	      if (e.keyCode == '13') { // Если был нажат ENTER
	          e.preventDefault(); // Игнорируем действие по умолчанию)
	      $('.btn122a').click();
	      }
	});
	
	
	/*
	$('.block270 #title-search-input').keypress(function (e){
		//alert(e);
		if(e.which==13){
			$('.block270 #title-search-input>.btn22a').submit(); 
		}
	});*/
	
	/**/
	
	$("body").keypress(function (e){
		if( e.which==13){
			NAMEUSER = $('input[name="form_text_323"]').val();
			PHONEUSER = $('input[name="form_text_325"]').val();
			textError='';
			error = 0;
			if(NAMEUSER==''){textError='Введите имя<br>';error = 1;};
			if(PHONEUSER==''){textError+='Введите номер телефона<br>';error = 1;};
			if(error!=0){
			$('.error').empty();
			$('.error').show().fadeOut(3000);
			$('.error').html(textError);
			} else {
				$('#suber').click();
				}
			return false;
		}
	});	
	$('.counts').mouseover(function(){
		
		//$('.uved').show();
		$(this).next().show();
	});
$('.counts').mouseout(function(){
		
		//$('.uved').hide();
		$(this).next().hide();
	});
	
//////////////////
	$('.counts_pr').mouseover(function(){
		$('.uved_pr').show();
	});
	
	$('.counts_pr').mouseout(function(){
		$('.uved_pr').hide();
		})
	

	
});
