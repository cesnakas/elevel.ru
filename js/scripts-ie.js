$(document).ready(function() {
	
	$('.w798, .w588').focus(function() {
		$(this).val('');
	});
		
	$('.w798, .w588').blur(function() {
		if(	$(this).val() == '' ) {
			$(this).val('Поиск по каталогу');
		}
	});
		
	$('.w214').focus(function() {
		$(this).val('');
	});
	
	$('.w214').blur(function() {
		if(	$(this).val() == '' ) {
			$(this).val('Поиск по сайту');
		}
	});
	
	$('.menu2 ul li ul li:first-child').css('padding-top','8px');
	$('.menu2 ul li ul li:last-child').addClass('lst10');
	$('.block33 p a:first').addClass('o1');
	$('.block124 ul li:last').css('background','none').css('padding','19px 31px 0 25px');
	$('.block124 ul li:last').css('background','none').css('padding','19px 31px 0 25px');
	$('<div style="clear:both"></div>').insertAfter('.menu2 ul, .icons25, .block124, .block282, .col756, .list172, .crumbs ul, .list232a, .list232b, .b200 ul, .block620, .list182, .btn295a, #tmpl, .block693, .srvLink2, .srv7, .btn202a, .totalBlock, .block238 ul, .list333');
	$('.subContentBlock1 ul li:even').css('margin-right','52px');
	$('<li style="float:none; clear:both"></li>').insertAfter('.subContentBlock1 ul li:odd');
	$('.foot1 table td ul li:last-child').css('background','none');
	$('.blockH47 ul li:last').css('padding-right','0').css('background','none');
	$('.crumbs ul li:last').css('background','none');
	/*$('.list172 li:nth-child(5n)').css('margin-right','0');*/
	
	$('.list172 li').each(function() {
		$('table td:first',this).height('128px');
		$('table td:last',this).height('61px').css('padding','0 10px 0 10px');		
	});

	$('.menu1 ul li:first').addClass('mag');
		
	
	$('.menu1 ul li ul li:last-child').addClass('lst1');
	
	$('.menu1 > ul > li:not(".mag, .active6")').hover(function() {
		$(this).css('background','#202020');								
	}, function() {
		$(this).css('background','url(/i/bg44a.gif) repeat-x top');
	});
	/*
	$('.menu1 ul li.mag').hover(function() {
		$(this).css('background','url(/i/bg-mag-on2.gif) no-repeat');							 
	}, function() {
		$(this).css('background','url(/i/bg-mag.gif) no-repeat');	 
	});
*/
	
	
	$('.menu1 ul li:has("ul")').hover(function() {
		$('ul',this).css('visibility','visible');								
	}, function() {
		$('ul',this).css('visibility','hidden');								
	});
	
	$('.menu2 ul li:has("ul")').hover(function() {
		$('ul',this).css('visibility','visible');								
	}, function() {
		$('ul',this).css('visibility','hidden');								
	});
	
	/*$('.list171 ul li').hover(function() {
		$(this).css('background','url(/i/bg150a.gif) no-repeat');
	}, function() {
		$(this).css('background','none');
	});*/
	$('.list171 ul li').hover(function() {
		$(this).css('border','1px solid #ccc');
	}, function() {
		$(this).css('border','1px solid #fff');		
	});
	/*
	$('.block124 ul li').hover(function() {
		$(this).css('background','#faf9fa');								
	}, function() {
		$(this).css('background','url(/i/bg124b.gif) no-repeat right top');
	});
	*/
	$('.block124 ul li:not(:last)').hover(function() {
        $(this).css('background','#faf9fa');                                        
   }, function() {
        $(this).css('background','url(/i/bg124b.gif) no-repeat right top');
   });
   
   $('.block124 ul li:last').hover(function() {
        $(this).css('background','#faf9fa');                                        
   }, function() {
        $(this).css('background','none');
   });

	
	$('.list172 li').hover(function() {
		$(this).css('background','url(/i/bg172-on.jpg) no-repeat');
		$('table td span a',this).css('color', '#fff');
	}, function() {
		$(this).css('background','url(/i/bg172.jpg) no-repeat');
		$('table td span a',this).css('color', '#282828');
	});
	
	$('.txt1 p a').click(function() {
		$('.list171').css('display','block');						  
	});
	
	$('.list171 li').click(function() {
		t1 = $(this).text();
		phone='<span>'+$(this).attr('code_ph')+'</span>'+$(this).attr('phone');
		ctown=$(this).attr('tcode');
		$(this).parent().prev().html(t1);

		$.cookie("town", ctown,{expires: 7, path: '/', domain: 'elevel.ru'});
		//$.cookie("town", ctown,{expires: 7, path: '/', domain: 'elevel.infodaymedia.com'});
		
		$('.txt1 p:first span').html(t1);
		$('.txt1 span.ph1:first').html(phone);
		$('.list171').css('display','none');
		location.reload();
	});
	
	$('.txt1 p a').click(function() {
		$('.list171').css('display','block');	
		$('#srv1').css('display','block');
	});
	
	$('.list171 li').click(function() {
		t1 = $(this).text();
		$(this).parent().prev().html(t1);
		$('.txt1 p:first span').html(t1);
		$('.list171').css('display','none');
		$('#srv1').css('display','none');
	});
	$('#srv1').click(function() {
		$(this).css('display','none');
		$('.list171').css('display','none');
	});
	
	stl();
	
	$(window).resize(function () {
		stl();
	});

	function stl() {
		a = $('body').width();
		if(a<1200) {$('.toplink').css('display','none');}
		else {$('.toplink').css('display','block');}
	}
	
	
	$('.pic711:first').css('display','block');
	$('.list269 li img').each(function(index) {
		$(this).click(function() {
			$('.pic711').css('display','none');
			$('.pic711:eq('+index+')').fadeIn('slow');			   			
		});
	});
	
	/*03*/
	$('.mod3 li:nth-child(3n)').css('margin-right','0');
	$('.mod4 li:nth-child(4n)').css('margin-right','0');
	$('.sortings table td:last ul li').css('padding-right','7px');
	$('.sortings table td:first').width('70px');
	$('.sortings table td:last').css('text-align','right');
	$('.sortings table td:last-child ul').css('display','block').css('float','right').css('margin-right','10px');
	$('.sortings table td:last-child ul li').css('padding-right','7px');
	$('.sortings table td:last-child ul a').css('color','#8e8e8e');
	$('.sortings td ul li:last-child span').css('border','none');
	
	
	$('<img src="/i/pic154a.gif" alt="" class="pic154" />').appendTo('.list232b li');
	$('<img src="/i/pic154b.gif" alt="" class="pic154" />').appendTo('.bsk18');
	$('.list232b li img:first-child').hover(function() {
		$(this).closest('li').find('.quick').css('display','block');
	}, function() {
		$(this).closest('li').find('.quick').css('display','none');
	});
	
	/*04*/
	$('.srv1 a').click(function() {
		$(this).closest('li').css('background','url(/i/bg232bc.jpg) no-repeat');
		$(this).html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Перейти к оформлению');
		$(this).closest('li').find('.pic154').fadeIn('slow').delay(500).fadeOut('slow');
		
		return false;
	});
	$('a.btn236b img:first-child ').click(function() {
		$(this).attr('src','/i/btn236b.gif');
		
	});
	$('a.btn236b').click(function() {
		$('a.btn236b').attr('href','/personal/order.php');
	});
	
/*	$('.list232b li img.quick').click(function(e) {
		var x = $('body').height();
		$('#fade').height(x);
		$('#container2').fadeIn('slow');
		$('#fade').fadeTo('slow',0.5);	
		e.preventDefault();
		id=$(this).attr('id');
		$.ajax( {
		          type:   "POST",
		          url:    '/ajax_datail.php',
			      data:   "ELEMENT_ID="+id,
		          success: function(data){   
		        	  $('#container2').html(data); 
		        	  $('#serias').append($('#breads2').html());
		        	  $('#categor_prop').append($('#breads3').html());
		          }
				}
			);
		
		
		});*/
		
	$('.list232b li img.quick').click(function(e) {
		e.preventDefault();
		id=$(this).attr('id');

		$.ajax( {
		      type:   "POST",
		      url:    '/ajax_datail.php',
			  data:   "ELEMENT_ID="+id,
		      success: function(data){   
					$("<div id='container3'></div>").after('#container2');
					$('#container3').css('position','absolute');
					var x = $('body').height();
					$('#fade').height(x);
					$('#fade').fadeTo('slow',0.5);
					$('#container3').css('top','50px');
		          
					$('#container3').empty().html(data);
					$('#serias').append($('#breads2').html());
					$('#categor_prop').append($('#breads3').html());
					
    				$("#container3").css("top", ($(window).height() - $("#container3").outerHeight()) / 2 + $(window).scrollTop() + "px");
    				$("#container3").css("left", ($(window).width() - $("#container3").outerWidth()) / 2 + $(window).scrollLeft() + "px");
					
					$('#container3').css('display','block');
		      }
			}
		);
	});
	
	$('a.shablon').click(
			function()
			{
				var x = $('body').height();
				$('#fade').height(x);
				$('#container2').fadeIn('slow');
				$('#fade').fadeTo('slow',0.5);		
			}
	);		
	
	$('.closer67').live('click',function() {
		$('#fade, #container2, #container3').fadeOut('slow');
	});
	
	
	$('.dec9').live(
			'click',
			function() {
				$('input[name="count"]').val(parseInt($('input[name="count"]').val())-1);
				if (parseInt($('input[name="count"]').val())<1)$('input[name="count"]').val(1); 
				}
	);
	$('.inc9').live(
			'click',
			function() {
				$('input[name="count"]').val(parseInt($('input[name="count"]').val())+1);
			});
	/*05*/
	$('.b200 ul li:last').css('padding-right','0');
	$('.txt5').hover(function() {
		$('.block142',this).css('display','block');
		}, function() {
		$('.block142',this).css('display','none');
	});
	
	$('.bsk18').hover(function() {
		$('img:first',this).attr({'src':'/i/bsk18a-on.gif'});
		}, function() {
		$('img:first',this).attr({'src':'/i/bsk18a.gif'});
	});
	
	$('.table2 td h5').hover(function() {
		$('img',this).css('display','block');
		}, function() {
		$('img',this).css('display','none');
	});
	
	
	
	$('.bsk18, .btn236b').click(function() {
		$('.pic154',this).fadeIn('slow').delay(500).fadeOut('slow');
	});
	
	$('.table1 th:first div').addClass('crl');
	$('.table1 th:last div').addClass('crr');	
	
	$('.table2 th:first div').addClass('crl');
	$('.table2 th:last div').addClass('crr');	
	
	if(navigator.appVersion.indexOf('MSIE') !=-1) {
		$('.w798, .w588').css('padding-top','6px').height('24px');
		$('.table2 .crl, .table2 .crr').parent().css('padding-top','1px');
		$('.table2.qx .crl, .table2.qx .crr, .table2.z12 .crl, .table2.z12 .crr').parent().css('padding-top','0');
	}
	
	/*06*/
	$('.qData1 td:first').width('380px');
	$('.qData1 td:last').css('padding-top','19px');	
	
	
	$('.tabs1 ul li:eq(0)').addClass('active1');
	$('.tabData1:eq(0)').css('display','block');			

	$('.tabs1 ul li').each(function(index) {
		$(this).click(function() {
			$('.tabs1 ul li').removeClass('active1');
			$(this).addClass('active1');
			$('.tabData1').css('display','none');
			$('.tabData1:eq('+index+')').css('display','block');			
		});
	});
	
	/*07*/
	$('.table1 td:first').width('100px');
	$('.table1 td:eq(1)').width('480px');
	$('.table1 td:last-child img').css('cursor','pointer');
	
	/*08*/
	$('.list182 li:last-child').css('margin-right','0');
	//$('.list182 li:last-child span').css('padding-top','27px');
	$('.table4 .w249:first').css('margin-right','190px');
	
	$('.qCell-1 img').click(function() {
		
		
		
		
		if ( $('#template').is(':checked')) 
		{
			//$('.qCell-1 input').removeAttr('checked');
			$('#template').removeAttr('checked');
			$('.qCell-1 img').attr({'src':'/i/pic17-unchecked.gif'});
			//$('#template').attr('checked','checked');
			//$('.qCell-1 img').attr({'src':'/i/pic17-checked.gif'});
		}
		else {
			$('#template').attr('checked','checked');
			$('.qCell-1 img').attr({'src':'/i/pic17-checked.gif'});
		
		//	$('.qCell-1 input').removeAttr('checked');
		//	$('#template').removeAttr('checked');
		//	$('.qCell-1 img').attr({'src':'/i/pic17-unchecked.gif'});
		}
	});
	/*
	$('.block200a ul li label').each(function() {
		$(this).click(function() {
			$('.block200a ul li img').attr({'src':'/i/pic12unchecked.gif'});				   
			$(this).prev().attr({'src':'/i/pic12checked.gif'});				   			
		});
	});
	
	$('.block200a ul li img').each(function() {
		$(this).click(function() {
			$('.block200a ul li img').attr({'src':'/i/pic12unchecked.gif'});				   
			$(this).attr({'src':'/i/pic12checked.gif'});				   			
		});
	});
	
	*/
	$('.block200a ul li img').each(function() {
		$(this).click(function() {
			$('.block200a ul li img').attr({'src':'/i/pic12unchecked.gif'});				   
			$(this).attr({'src':'/i/pic12checked.gif'});
			id=$(this).prev().attr('value');
			
			$(this).prev().attr("checked", "checked")
			if (id)
			{
				$('.txt693 p').css('display','none');
				str="#description-"+id;
				$(str).css('display','block');
			} 
			
			if ( $(this).prev().attr('name')=='PAY_SYSTEM_ID' ){
				 if ($(this).prev().val()=='2')
				 {
					 if ($("input[name=ORDER_PROP_47]").val()=='url')
					 {
						 $("#urlic").css("display","block"); 
					 }
					 else{
						 $("#urlic").css("display","none");
					 }
				 }else{
					 $("#urlic").css("display","none");
				 }
			}
		});
	});
	$('.block200a ul li label').click(
		function(){
			$(this).prev().click();	
		}
	)
	
	
	
	$('.table2.qx td:first-child').css('border-right','1px solid #fff');
	$('.totalBlock table td:first-child').css('padding-right','20px');	
	
	/*09*/
	$('.block238 ul li:even').css('margin-right','14px');
	
	/*12*/
	$('.list3 li:last-child').css('border','none');
	
	/*13*/
	$('.z12  th div:first').css('padding-right','0');
	$('.z12 .qx th div').css('border-radius','0');
	$('.z12 .qx td:first-child').css('border-right','1px solid #ebeded');
	$('.z12 .qx td:last-child').css('border-right','1px solid #fff');
	$('.z12 .qx tr:last td').css('border-bottom','1px solid #fff');
	
	$('.pic19').click(function() {
		$(this).closest('tr').next().find('td').slideToggle('slow');
		$(this).toggleClass('x55');
		var src = $(this).hasClass('x55') ? '/i/pic19b.gif' : '/i/pic19a.gif';
		$(this).attr({'src':src});
	});
	
	/*14*/
	$('.profList li  td:first-child input').css('margin-right','25px');
	$('.profList li .table7 td:has(".btn140")').css('vertical-align','bottom').css('text-align','right').css('padding-bottom','5px');
	
	
	/*15*/
	$('.table8 td ul li img').click(function() {
		
		if(!$(this).prev().attr('checked')) {
			$(this).prev().attr('checked','checked');
			$(this).attr('src','/i/pic17-checked.gif');
		}
		
		else {
			$(this).prev().removeAttr('checked');
			$(this).attr('src','/i/pic17-unchecked.gif');
		}
	});
	
	/*15*/
	$('.table8 td ul a').click(function() {
		
		if( $(this).prev().prev().attr('checked')==false ) {
			
				$(this).prev().prev().attr('checked','checked');
				$(this).prev().attr('src','/i/pic17-checked.gif');
		}
		
		else {
			$(this).prev().prev().removeAttr('checked');
			$(this).prev().attr('src','/i/pic17-unchecked.gif');
		}
	});
	
	$('.quick').hover(function() {
        $(this).css('display','block');
   }, function() {
        $(this).css('display','none');
   });
	
	$('img.table_view').click(function() {

		$.cookie("view", "table",{expires: 7, path: '/', domain: 'elevel.ru'});
		location.reload();
	});
	
	$('img.block_view').click(function() {
		$.cookie("view", "block",{expires: 7, path: '/', domain: 'elevel.ru'});
		location.reload();
	});
	
	$('<img src="/i/bg398a.png" alt="" class="dec398" />').insertBefore('.popup398Content');
	$('<img src="/i/bg398c.png" alt="" class="dec398" />').insertAfter('.popup398Content');	
	
	$('<img src="/i/bg560a.png" alt="" class="dec560" />').insertBefore('.popup560Content');
	$('<img src="/i/bg560c.png" alt="" class="dec560" />').insertAfter('.popup560Content');	
	
	
	$('.toplink2 a').click(function() {
		var x = $('body').height();
		$('#fade').height(x);
		$('#container2, .popup398').css('display','block');
		$('#fade').fadeTo('slow',0.5);		
	});
	/*
	$('.popup398Content h6 img').click(function() {
		$('#fade, #container2, .popup398').css('display','none');
		
	});
	*/
	
	
	$('.toplink1 a').click(function() {
		var x = $('body').height();
		$('#fade').height(x);
		$('#container2, .popup398:eq(1)').css('display','block');
		$('#fade').fadeTo('slow',0.5);		
	});
	
	$('.q29 td ul').each(function(index) {
		$('li label',this).click(function() {
			$('.q29 td ul:eq('+index+') li img').attr({'src':'/i/pic12unchecked.gif'});				   
			$(this).prev().attr({'src':'/i/pic12checked.gif'});				   			
		});
	});
	
	$('.banner460:first').css('display','block');
	$('.block460 ul li:first').addClass('active29');
	
	$('.block460 ul li').each(function(index) {
		$(this).click(function() {							   
			$('.block460 ul li').removeClass('active29');
			$(this).addClass('active29');
			$('.banner460').fadeOut('slow');
			$('.banner460:eq('+index+')').fadeIn('slow');		
		});
	});
	$('.inc7,').click(function() {
		var kolvo=$(this).attr('ids');
		var val=$("#"+kolvo).val();
		//alert(val);
		var kolvos=parseInt(val)+1;
		$("#"+kolvo).val(kolvos);
	});
	
	/*
	$('.inc9').click(function() {
		var val=$(".dt-cnt").val();
		//alert(val);
		var kolvos=parseInt(val)+1;
		$(".dt-cnt").val(kolvos);
	});
	*/
	
	$('.dec7').click(function() {
		var kolvo=$(this).attr('ids');
		var val=$("#"+kolvo).val();
		//alert(val);
		var kolvos=parseInt(val)-1;
		if(kolvos>1){
		$("#"+kolvo).val(kolvos);}
		else{$("#"+kolvo).val(1);}
	});
	/*
	$('.dec9').click(function() {

		var val=$(".dt-cnt").val();
		//alert(val);
		var kolvos=parseInt(val)-1;
		if(kolvos>1){
		$(".dt-cnt").val(kolvos);}
		else{$(".dt-cnt").val(1);}
	});
	*/
	
	$('.banner711:first').css('display','block');
	$('.block711 ul li:first').addClass('active30');
	
	$('.block711 ul li').each(function(index) {
		$(this).click(function() {							   
			$('.block711 ul li').removeClass('active30');
			$(this).addClass('active30');
			$('.banner711').fadeOut('slow');
			$('.banner711:eq('+index+')').fadeIn('slow');		
		});
	});
	
	/*kagr*/
	$('.title_news').css('width','230px');
	
	//alert(lcol);
	
	
$('.srv7:last').css('border-radius','4px 0 4px 0');
	
	$('.menu1 ul li ul li').hover(function() {
		$(this).addClass('active308');
	}, function() {
	   $(this).removeClass('active308');
	});
	
	$('.mod3 h2 a').css('height','43px');
	/*$('.mod3 h2').css('margin-bottom','6px');*/
	$('.menu1 ul li:last-child ul').css('left','-76px');
	$('.menu2 ul li:last-child ul').css('left','-132px');
	
	$('#serias').append($('#breads2').html());
	$('#categor_prop').append($('#breads3').html());
	
	
	$('.list173 ul li').hover(function() {
		$(this).css('background','url(/i/bg150a.gif) no-repeat');
	}, function() {
		$(this).css('background','none');
	});
	
	
	
	$('.selector04').click(function() {
		$('.list173').css('display','block');						  
	});
	
	$('.list173 li').click(function() {
		t1 = $(this).text();
		$('.city').html(t1);
		ctown=$(this).attr('tcode');
/*		$.cookie("town_contact", ctown,{expires: 7, path: '/', domain: 'elevel.infodaymedia.com'}); */
		$.cookie("town_contact", ctown,{expires: 7, path: '/', domain: 'elevel.ru'});
		$('.list173').css('display','none');
		location.reload();
	});

	$("#callback_close").live("click", function(){
		$('#fade, #container2').fadeOut('slow');
	})
	
});
/*
$(window).load(function(){
	var lcol = $('.col224').height();
	var  cont = $('.col756').height();
	var  bread = $('.crumbs').height();
	if(lcol>cont && location.href!='http://elevel.infodaymedia.com/company/management/') {
		$('.block980a').css('height',(lcol-50)+'px')
		
	}		
	
});
*/

$(document).ready(function() {
	$('.slider').nivoSlider();
	$('.slider_big').nivoSliderBig();
	if ($('.block756a').height()>100){
		$('.blockH1075').css('height', $('.block756a').height() );
	}
});