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
		NAME = $('input[name="ORDER_PROP_1"]').val();
		error='';
		EMAIL = $('input[name="ORDER_PROP_19"]').val();
		if(NAME==''){
			$('input[name="ORDER_PROP_1"]').css('border-color','#f25b26');

			$('input[name="ORDER_PROP_1"]').parent().append('<br><span id="new_name"></span>');
			$('#new_name').html('&nbsp; Заполните имя');
			error=1;
		};
		
		if(EMAIL==''||!isValidEmailAddress(EMAIL)){
			$('input[name="ORDER_PROP_19"]').css('border-color','#f25b26');
			$('input[name="ORDER_PROP_19"]').parent().append('<br><span id="new_err"></span>');
			$('#new_err').html('&nbsp; Неверно указан e-mail');
			error=1;
		} else {
			$('#new_err').html('&nbsp; <img alt="" src="/i/pic17-checked.gif">');
	    }
		if(error!=''){
			return false;
		}
		$('input[name="ORDER_PROP_19"],input[name="ORDER_PROP_1"]').css('border-color','#B7B7B7 #E4E3E3 #E4E3E3 #B7B7B7');
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
