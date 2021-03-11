$(document).ready(function() {
	
    $("*").click(function(){
        if (!$(this).hasClass("main_brands_list"))
        {
            $(".brands_items").css("display", "none");
        }
    })
	/*the same row*/ 
	function setEqualHeight(columns, min){
        var tallestcolumn = 0;
        columns.each(
        function(){
            currentHeight = $(this).height();
            if(currentHeight > tallestcolumn){
                tallestcolumn = currentHeight;
            }
        });
        
        if (min === true)
			columns.css("min-height",tallestcolumn);	
		else
		columns.height(tallestcolumn);
    }
    /*the same row [end]*/ 
    
	if ($(".client-item"))
		setEqualHeight($(".client-item"), false);
		
	if ($(".novelty-box h2"))
		setEqualHeight($(".novelty-box h2"), true);
		
	if ($(".news-name"))
		setEqualHeight($(".news-name"), false);
		
	if ($(".novelty-box li"))
		setEqualHeight($(".novelty-box li"), true);
		
	if ($(".actions-box li p"))
		setEqualHeight($(".actions-box li p"), true);
		
	if ($(".actions-box li h4"))
		setEqualHeight($(".actions-box li h4"), true);
		
    if ($(".tz-slide-inner li figcaption"))
		setEqualHeight($(".tz-goods li figcaption"), false);
		
    if ($(".tz-slide-inner li figcaption"))
		setEqualHeight($(".tz-goods li figcaption"), false);
		
	/*if ($(".news-section .news-list li"))
		setEqualHeight($(".news-section .news-list li"), true);*/
		
/*	if ($(".news-section .meta"))
		setEqualHeight($(".news-section .meta"), true);
		
	if ($(".news-section .news-info"))
		setEqualHeight($(".news-section .news-info"), true);*/
	
	
	$('.sortings #filter_sort111, .sortings #filter_sort, .sortings #filter_counts').selectbox();	
//	$('.sortings #filter_sort').selectbox();	
//	$('.sortings #filter_counts').selectbox();	
		
	/* якоря */
	$(document).on('click', '.foot-box a[href*=#]', function(e){
		var anchor = $(this);
		var headerHeight = $('header').height();
		_nameAnchor = $(anchor).attr('href').split("#")[1];
		destination = $('a[name*="'+_nameAnchor+'"]').offset().top;
		destination = destination - headerHeight;
		$('html, body').stop().animate({
		 scrollTop: destination
		}, 1000);
		e.preventDefault();
	});

	$('.w798, .w588').focus(function() {
		$(this).val(''); 
	});
	
	$('.w798, .w588').blur(function() {
		if(	$(this).val() == '' ) {
			$(this).val('Поиск по каталогу');
		}
	});
	
	/*	
	$('.w214').focus(function() {
		$(this).val('');
	});
	
	$('.w214').blur(function() {
		if(	$(this).val() == '' ) {
			$(this).val('Поиск по сайту');
		}
	});
	*/
	
	$('.menu2 ul li ul li:first-child').css('padding-top','8px');
	$('.menu2 ul li ul li:last-child').addClass('lst10');
	$('.block33 p a:first').addClass('o1');
/*	$('.block124 ul li:last').css('background','none').css('padding','19px 31px 0 25px');
	$('.block124 ul li:last').css('background','none').css('padding','19px 31px 0 25px');*/
//	$('<div style="clear:both"></div>').insertAfter('.menu2 ul, .icons25, .block124, .block282, .col756, .list172, .crumbs ul, .list232a, .list232b, .b200 ul, .block620, .list182, .btn295a, #tmpl, .block693, .srvLink2, .srv7, .btn202a, .totalBlock, .block238 ul, .list333');
	$('<div style="clear:both"></div>').insertAfter('.menu2 ul, .icons25, .block124, .block282, .list172, .list232a, .list232b, .b200 ul, .block620, .list182, .btn295a, #tmpl, .block693, .srvLink2, .srv7, .btn202a, .totalBlock, .block238 ul, .list333');
//	$('.subContentBlock1 ul li:even').css('margin-right','52px');
//	$('<li style="float:none; clear:both"></li>').insertAfter('.subContentBlock1 ul li:odd');
//	$('.foot1 table td ul li:last-child').css('background','none');
//	$('.blockH47 ul li:last').css('padding-right','0').css('background','none');
//	$('.crumbs ul li:last').css('background','none');
	/*$('.list172 li:nth-child(5n)').css('margin-right','0');*/
	
	/*$('.list172 li').each(function() {
		$('table td:first',this).height('128px');
		$('table td:last',this).height('61px').css('padding','0 10px 0 10px');		
	});/.

	
	/*$('.menu1 > ul > li:not(".mag, .active6")').hover(function() {
		$(this).css('background','#202020');								
	}, function() {
		$(this).css('background','url(/i/bg44a.gif) repeat-x top');
	});*/
	/*
	$('.menu1 ul li.mag').hover(function() {
		$(this).css('background','url(/i/bg-mag-on2.gif) no-repeat');							 
	}, function() {
		$(this).css('background','url(/i/bg-mag.gif) no-repeat');	 
	});
*/

	$('.menu1 ul li:first').addClass('mag');
	$('.menu1 ul li ul li:last-child').addClass('lst1');
	
	
	$('.menu1 ul li:has("ul")').hover(function() {
		$(this).children("ul").css('visibility','visible');								
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

	
	/*$('.list172 li').hover(function() {
		$(this).css('background','url(/i/bg172-on.jpg) no-repeat');
		$('table td span a',this).css('color', '#fff');
	}, function() {
		$(this).css('background','url(/i/bg172.jpg) no-repeat');
		$('table td span a',this).css('color', '#282828');
	});*/
	
	$('.town-box > a').click(function() {
		$('.list171').show();
	});
	
	$('.list171 li').click(function() {
		t1 = $(this).text();
		phone='<span>'+$(this).attr('code_ph')+'</span>'+$(this).attr('phone');
		ctown=$(this).attr('tcode');
		$(this).parent().prev().html(t1);
		prices=$(this).attr('prices');
		
		
//		console.log(phone)
//		return false;
		
		$.cookie("town", ctown,{expires: 7, path: '/', domain: 'elevel.ru'});
		$.cookie("OFFICE_PRICE", prices,{expires: 7, path: '/', domain: 'elevel.ru'});
		
		$('.txt1 p:first span').html(t1);
		$('.txt1 span.ph1:first').html(phone);
		$('.am p').html(phone);
		$(".tz-phone").html(phone);
		$('.list171').css('display','none');
		location.reload();
	});
	
	$('.town-box > a').click(function() {
		$('.list171').show();	
		$('#srv1').show();
		$('#srv1_header').show();
	});
	
	$('.list171 li').click(function() {
		t1 = $(this).text();
//		$(this).parent().prev().html(t1);
		$('.town-box > a:first span').html(t1);
		$('.list171').hide();
		$('#srv1').hide();
	});
	
	
	$('#srv1_header').click(function() {
		$(this).hide();
		$('#srv1').hide();
		$('.list171').hide();
	});
	
	$('textarea[name=REASON_CANCELED]').attr('class','h92');
	
	$('#srv1').click(function() {
		$(this).hide();
		$('#srv1_header').hide();
		$('.list171').hide();
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
//	$('.mod3 li:nth-child(3n)').css('margin-right','0');
//	$('.mod4 li:nth-child(4n)').css('margin-right','0');
//	$('.sortings table td:last ul li').css('padding-right','7px');
//	$('.sortings table td:first').width('70px');
//	$('.sortings table td:last').css('text-align','right');
//	$('.sortings table td:last-child ul').css('display','block').css('float','right').css('margin-right','10px');
//	$('.sortings table td:last-child ul li').css('padding-right','7px');
//	$('.sortings table td:last-child ul a').css('color','#8e8e8e');
//	$('.sortings td ul li:last-child span').css('border','none');
	
	
	$('<img src="/i/pic154a.gif" alt="" class="pic154" />').appendTo('.list232b li');
	$('<img src="/i/pic154b.gif" alt="" class="pic154" />').appendTo('.bsk18');
	
	$('.list232b li img:first-child, .tz-slide-inner li figure .photo-box').hover(function() {
		$(this).closest('li').find('.quick').css('display','block');
	}, function() {
		$(this).closest('li').find('.quick').css('display','none');
	});
	
	/*04*/
	$('.srv1 a').click(function() {
		$(this).closest('li').css('background','url(/i/bg232bc.jpg) no-repeat');
		$(this).html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Перейти к оформлению');
		$(this).closest('li').find('.pic154').fadeIn('slow').delay(500).fadeOut('slow');
		$(this).attr('href','/personal/order.php');
		
		return false;
	});
	$('a.btn236b').click(function() {
		$('a.btn236b').css({
        'background':"url('/i/btn236b.png')",    
        'font-size':"14px",    
        'text-align':"right"    
        });
        $('a.btn236b').attr('href','/personal/order.php'); 
        $('a.btn236b span').html('Перейти к оформлению&nbsp;&nbsp;&nbsp;');       
	});

	$('img.quick').click(function(e) {
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
	
//	$('.closer67').live('click',function() {
	$('.closer67').on('click',function() {
		$('#fade, #container2, #container3').fadeOut('slow');
	});
	
	
//	$('.dec9').live(
	$('.dec9').on(
			'click',
			function() {
				$('input[name="count"]').val(parseInt($('input[name="count"]').val())-1);
				if (parseInt($('input[name="count"]').val())<1)$('input[name="count"]').val(1); 
				}
	);
//	$('.inc9').live(
	$('.inc9').on(
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
	
	
	
    $('.btn236b').click(function() {
        $('.pic154',this).fadeIn('slow').delay(500).fadeOut('slow');
    });    
    $('.btn236b_to_basket').click(function() {
        $('.pic154_dc').fadeIn('slow').delay(500).fadeOut('slow').delay(500);
        $('.tz_alert_el').fadeIn('slow').delay(1000).fadeOut('slow').delay(1000);
        $(this).delay(500).css("display", "none");
        $("#basket_b").css("display", "block");
    });
    $(".basket_viewed").click(function(){ 
        $(this).css("display", "none");
        var pred = $(this).parents(".view-item");
        $(pred).find(".basket_basket").css("display", "block");
        return false;
    });
	$('.bsk18').click(function() {
        $(this).unbind('hover');           
        $('img:first',this).attr('src', '/i/bsk18a-on.gif');
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
//	$('.table1 td:first').width('100px');
//	$('.table1 td:eq(1)').width('480px');
//	$('.table1 td:last-child img').css('cursor','pointer');
	
	/*08*/
	$('.list182 li:last-child').css('margin-right','0');
	//$('.list182 li:last-child span').css('padding-top','27px');
	$('.table4 .w249').css('margin-right','190px');
	
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
	//$('.profList li  td:first-child input').css('margin-right','25px');
	$('.profList li .table7 td:has(".btn140")').css('vertical-align','bottom').css('text-align','right').css('padding-bottom','5px');
	
	
	
	
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
	
//	$('.mod3 h2 a').css('height','43px');
	/*$('.mod3 h2').css('margin-bottom','6px');*/
//	$('.menu1 ul li:last-child ul').css('left','-76px');
//	$('.menu2 ul li:last-child ul').css('left','-132px');
	
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
		$.cookie("town_contact", ctown,{expires: 7, path: '/', domain: 'elevel.ru'});
		$('.list173').css('display','none');
		location.reload();
		
		
	});
	
	$(".pager").clone().appendTo("#sort_clone");
	
});
/*
$(window).load(function(){
	var lcol = $('.col224').height();
	var  cont = $('.col756').height();
	var  bread = $('.crumbs').height();
	if(lcol>cont && location.href!='http://elevel.ru/company/management/') {
		$('.block980a').css('height',(lcol-50)+'px')
		
	}		
	
});
*/
/*$(window).load(function() {
	$('.slider').nivoSlider();
	$('.slider_big').nivoSliderBig();
    if ($('.block756a').height()>100){
	$('.blockH1075').css('height', $('.block756a').height() );
    
    }
	
});*/

$(document).ready(function() {
	$('.slider').nivoSlider();
	$('.slider_big').nivoSliderBig();
	if ($('.block756a').height()>100){
		$('.blockH1075').css('height', $('.block756a').height() );
	}
});

//shop-left-menu switcher
$(document).on('click', '.menu-switcher', function(){
   $(this).siblings('ul').toggle(500); 
   $(this).parent('li').toggleClass('active');
}); 

//shop image viewer
$(document).on('mouseenter', 'img.mini_img', function(){
    console.log('here');
    href = $(this).attr('src');
    krd = $(this).offset();//element koordinats
    doc_w = ($(window).width()-$('#container').width()) / 2 - 64;
    $("#big_image_wrap").empty();
    $("#big_image_wrap").css({'top':krd.top, 'left':krd.left - doc_w});
    $("#big_image_wrap").append('<img alt="" src="'+href+'" style="max-height: 256px;">');
}); 

$(document).on('mouseleave', 'img.mini_img', function(){
    $("#big_image_wrap").empty();
}); 
/*15*/
    $(document).on("click", '.table8 td ul li img', function() {
        
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
    $(document).on("click", '.table8 td ul a', function() {
        
        if( $(this).prev().prev().attr('checked')==false ) {
            
                $(this).prev().prev().attr('checked','checked');
                $(this).prev().attr('src','/i/pic17-checked.gif');
        }
        
        else {
            $(this).prev().prev().removeAttr('checked');
            $(this).prev().attr('src','/i/pic17-unchecked.gif');
        }
    });
    

$(document).on("click", ".marker", function(){
    if ($(this).parent(".profile_colums").find("span").css("display") == "none") {
        $(this).parent(".profile_colums").find("span").css("display", "inline");
        $(this).parent(".profile_colums").find(".profile_dates").css("display", "none");
    }
    else {
        $(this).parent(".profile_colums").find("span").css("display", "none");
        $(this).parent(".profile_colums").find(".profile_dates").css("display", "inline");
        $(this).parent(".profile_colums").find(".profile_dates").addClass("prof_data_show");   
    }
})

function deleteOrder(id) {
        $.ajax({
        type: 'POST',
        url: '/ajax/cancle_order.php',
        data: 'ID='+id,
        success: function(data){
            if (data == id) {
                $(".status_"+id+" .status_order").html("Отменён");
                $(".status_"+id+" img").attr("src", "/i/status_icons/otmenen.png");
                $(".del_ord").css("display", "none");
            }
            else {
                console.log("Что-то пошло не так, или нехер подделовать запросы")
            }
        }
    });        
        return false;
}
$(document).on("click", ".all_orders", function(){
    var all_orders = $(".count_all_orders").val();
    console.log($(".count_all_orders").val());
    if ($(this).html() != "Скрыть") {
        $(".hide_orders ").css("display", "table-row");
        $(this).html("Скрыть");
    }
    else {
        $(".hide_orders ").slideUp(0);
        $(this).html("Все заказы ("+all_orders+")");
        $("body").scrollTop(300);
    }
    

})
$(document).on("click", ".canle_order span", function() {
     $(":not(.del_ord), :not(.del_ord span)").click(function(){
         $(".del_ord").css("display", "none");
     })
    $(".del_ord").css("display", "none");
    var id = $(this).attr("data-val");
    $(".delete_order_"+id).css("display", "block");
})


$(document).on("click", ".b_name", function(){   
    $(".brands_items ul").css("display", "none");
    var id = $(this).attr("data-href");
    $(".brands_items ."+id).css("display", "inline-block");
    $(".brands_items").show(0);
})
$(".col980, header, .menu1, .menu2, .foot2, foot1").click(function(){
    $(".brands_items").hide();
})
$(document).on("click", ".to_en", function(){
    $(".to_en, .en_brand").css("display", "none");
    $(".to_ru, .ru_brand").css("display", "inline-block");
})       
$(document).on("click", ".to_ru", function(){
    $(".to_en, .en_brand").css("display", "inline-block");
    $(".to_ru, .ru_brand").css("display", "none");
});
$(document).on("mouseup", ".tz-slide-wrap li .btn-to-basket", function(){
    if(!$(this).hasClass('in-basket')){
        $(this).css("display", "none");
        $(this).parent(".btn-wrap").find(".now_cart").css("display", "block");
    }
    return false;
});





/*$(document).on("click", ".new_test", function(){
	var thisForm = $(this).parent("#bottom_form > form");
	var GetDataInputs1 = thisForm.serialize();
	alert(GetDataInputs1);
});*/

//$(document).on("click", "#tz-test-submit", function(){
$(document).on("click", ".tz-test-submit", function(){
	//----------------------не удалять!!!!!!!!!!!!!!!!!!!!!!!!!!!!-----------------------
	//var GetFormName = $("#bottom_form > form").attr("name");
	//var GetDataInputs = $('#bottom_form > form[name="' + GetFormName + '"]').serialize();
	//------------------------------------------------------------------------------------
	
	var thisForm = $(this).closest("#bottom_form > form");
	var GetDataInputs = thisForm.serialize();
	//alert(GetDataInputs);
	
/*	var getEmail = $(".tz-email-input").val();
    var getName = $(".tz-name-input").val();
    var getPhone = $(".tz-phone-input").val(); */
    
    var getEmail = $(this).closest('form').find(".tz-email-input").val();
    var getName = $(this).closest('form').find(".tz-name-input").val();
    var getPhone = $(this).closest('form').find(".tz-phone-input").val();
    var inputCityIsset = "no";
    if($(this).closest('form').find(".tz-city-input").val() != undefined){
        var getCity = $(this).closest('form').find(".tz-city-input").val(); 
         if(getCity.length == 0)
        {
            var errorNameMsg = "<div class='tz-error-validate-city-msg inline-block-tz'>Поле 'Город' должно быть заполнено.</div>" 
            //$(".tz-name-input").addClass("tz-email-input-error");
            $(this).closest('form').find(".tz-city-input").addClass("tz-email-input-error"); 
            
            //проверяем, нет ли у нас уже этого сообщения (errorNameMsg)
            if($(".tz-error-validate-city-msg").length == 0)
            {  
                //$(errorNameMsg).insertAfter(".tz-name-input");        
                $(errorNameMsg).insertAfter($(this).closest('form').find(".tz-city-input"));        
            }        
        }
        else{
            if($(".tz-city-input").hasClass("tz-email-input-error"))
            {
                $(".tz-city-input").removeClass("tz-email-input-error");
                $(".tz-error-validate-city-msg").remove();
            } 
            var cityValidate = true;
        }
        inputCityIsset = "yes";     
    }
    
 /*   console.log(getEmail);
    console.log(getName);
    console.log(getPhone);   */

/*    
    var getEmail = $(thisForm + "> .tz-email-input").val();
    var getName = $(thisForm + "> .tz-name-input").val();
    var getPhone = $(thisForm + "> .tz-phone-input").val();   */
	console.log("данные с формы: ");
	console.log(GetDataInputs);
	if(getName.length == 0)
	{
		var errorNameMsg = "<div class='tz-error-validate-name-msg inline-block-tz'>Поле 'Имя' должно быть заполнено.</div>"
		//$(".tz-name-input").addClass("tz-email-input-error");
		$(this).closest('form').find(".tz-name-input").addClass("tz-email-input-error");
		
		//проверяем, нет ли у нас уже этого сообщения (errorNameMsg)
		if($(".tz-error-validate-name-msg").length == 0)
		{
			//$(errorNameMsg).insertAfter(".tz-name-input");		
			$(errorNameMsg).insertAfter($(this).closest('form').find(".tz-name-input"));		
		}		
	}
	else
	{
		// убраем сообщение об ошибке, если есть
		if($(".tz-name-input").hasClass("tz-email-input-error"))
		{
			$(".tz-name-input").removeClass("tz-email-input-error");
			$(".tz-error-validate-name-msg").remove();
		} 
		var nameValidate = true;	
	}
	
	if(getPhone.length == 0)
	{
		//alert("заполни телефон");
		//вывод ошибки, если телефон не введен
		var errorPhoneMsg = "<div class='tz-error-validate-phone-msg inline-block-tz'>Поле 'Телефон' должно быть заполнено.</div>"
		$(".tz-phone-input").addClass("tz-email-input-error");
		
		//проверяем, нет ли у нас уже этого сообщения (errorMailMsg)
		if($(".tz-error-validate-phone-msg").length == 0)
		{
			//$(errorPhoneMsg).insertAfter(".tz-phone-input");		
			$(errorPhoneMsg).insertAfter($(this).closest('form').find(".tz-phone-input"));		
		}
	}
	else
	{
		//var regExp = /^(([0-9])[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
		var regExp = /^((\d|\+\d)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
						
		if(getPhone.search(regExp) != -1)
		{
			//alert("валидация пройдена");
			if($(".tz-error-validate-phone-number-msg").length > 0)
			{
				$(".tz-error-validate-phone-number-msg").remove();	
			}
			var phoneValidate = true;
			console.log("норм тел");
		}
		else
		{
			//alert("валидация НЕ пройдена");
			var errorPhoneValidMsg = "<div class='tz-error-validate-phone-number-msg inline-block-tz'>Приемлемо использование только: (цифры, скобки () и тире) </div>"
			$(".tz-phone-input").addClass("tz-email-input-error");
			
			if($(".tz-error-validate-phone-number-msg").length == 0)
			{
				//$(errorPhoneValidMsg).insertAfter(".tz-phone-input");
				$(errorPhoneValidMsg).insertAfter($(this).closest('form').find(".tz-phone-input"));			
			}
		}
		
		if($(".tz-phone-input").hasClass("tz-email-input-error"))
		{
			$(".tz-phone-input").removeClass("tz-email-input-error");
			$(".tz-error-validate-phone-msg").remove();
		}
	}
	
	
	if(getEmail.length > 0 || getEmail.length == 0)
	{
		if(getEmail.search("@") != -1)
		{
			//если есть @
			if($(".tz-email-input").hasClass("tz-email-input-error"))
			{
				$(".tz-email-input").removeClass("tz-email-input-error");
				$(".tz-error-validate-msg").remove();
			}
			var emailvalidate = true;
		}
		else
		{
			var errorMailMsg = "<div class='tz-error-validate-msg inline-block-tz'>Поле 'E-mail' должно содержать символ '@'.</div>"
			$(".tz-email-input").addClass("tz-email-input-error");
			
			//проверяем, нет ли у нас уже этого сообщения (errorMailMsg)
			if($(".tz-error-validate-msg").length == 0)
			{
				//$(errorMailMsg).insertAfter(".tz-email-input");
				$(errorMailMsg).insertAfter($(this).closest('form').find(".tz-email-input"));		
			}
		}
	}
	else
	{
		var emailvalidate = true;	
	}
    if(inputCityIsset == "yes"){
	    if(nameValidate == true && emailvalidate == true && phoneValidate == true && cityValidate == true)  
	    {
		    //alert("POST");
		    $.post("/aj.php", GetDataInputs, function(data){
			    //alert(data);  
			    $(".tz-susses-form-popup").css({
				    "top": $(document).scrollTop() + 300, 
			    })
			    $(".tz-susses-form-popup").addClass("tz-susses-form-popup-active");
			    $(".tz-susses-form-popup-msg").html(data);

		    });  
	    }
    }
    else{
        if(nameValidate == true && emailvalidate == true && phoneValidate == true )  //&& cityValidate == true
        {
            //alert("POST");
            $.post("/aj.php", GetDataInputs, function(data){
                //alert(data);  
                $(".tz-susses-form-popup").css({
                    "top": $(document).scrollTop() + 300, 
                })
                $(".tz-susses-form-popup").addClass("tz-susses-form-popup-active");
                $(".tz-susses-form-popup-msg").html(data);

            });  
        }
    }
   
	
/*	$.post("/aj.php", GetDataInputs, function(data){
		//alert(data);
		$(".tz-susses-form-popup").addClass("tz-susses-form-popup-active");
		$(".tz-susses-form-popup-msg").html(data);
	});*/
})

$(document).on("click", ".tz-close-btn", function(){
	 $(".tz-susses-form-popup").removeClass("tz-susses-form-popup-active");
			
	if($(".tz-susses-form-popup-msg > span").hasClass("tz-suc-msg"))
	{
		 $(".tz-name-input").val("");
		 $(".tz-email-input").val("");
		 $(".tz-phone-input").val("");				
	}
	else
	{
		console.log("non class");
	}
	 
});

$(document).on('change', '.radio-conteiner-tz input[type=radio]', function(){
    var radio_value = $(this).val();
    $('.radio-conteiner-tz label').removeClass('label-checked');
    $('.radio-conteiner-tz label[for='+radio_value+']').addClass('label-checked');
    $('.radio-conteiner-tz label[for=bottom_'+radio_value+']').addClass('label-checked');
});
$(document).ready(function(){
    $('.radio-conteiner-tz input').each(function(index){
        if($(this).attr("checked") == "checked"){
            $('.radio-conteiner-tz label[for='+$(this).val()+']').addClass('label-checked');
            $('.radio-conteiner-tz label[for=bottom_'+$(this).val()+']').addClass('label-checked');
        }
    })   
});


//чекбокс "Я даю согласие на обработку предоставленных персональных данных" в форме регистрации
$(document).on("click", "#label_for_header_registr_personal_checkbox", function(){
	 var prop = $("#header-registr-personal-checkbox").prop("checked");
	 if(prop == true)
	 {
		 console.log("не отмечен");
		 if($("#label_for_header_registr_personal_checkbox > div").hasClass("label-for-header-registr-personal-checkbox-checked"))
		 {
			 $("#label_for_header_registr_personal_checkbox > div").removeClass("label-for-header-registr-personal-checkbox-checked");	
		 }
	 }
	 else
	 {
		 console.log("отмечен");
		 $("#label_for_header_registr_personal_checkbox > div").addClass("label-for-header-registr-personal-checkbox-checked");		 		 
	 }
	 /*console.log("prop of check - ");
	 console.log(prop); */
	//$("#label_for_header_registr_personal_checkbox > div").addClass("label-for-header-registr-personal-checkbox-checked");
})


//чекбокс "Я даю согласие на обработку предоставленных персональных данных" в форме регистрации
$(document).on("click", "#label_for_header_registr_product_props_checkbox", function(){
	 var propProductProps = $("#header-registr-product-props-checkbox").prop("checked");
	 if(propProductProps == true)
	 {
		 console.log("не отмечен");
		 if($("#label_for_header_registr_product_props_checkbox > div").hasClass("label-for-header-props-personal-checkbox-checked"))
		 {
			 $("#label_for_header_registr_product_props_checkbox > div").removeClass("label-for-header-props-personal-checkbox-checked");	
		 }
	 }
	 else
	 {
		 console.log("отмечен");
		 $("#label_for_header_registr_product_props_checkbox > div").addClass("label-for-header-props-personal-checkbox-checked");		 		 
	 }
	 /*console.log("prop of check - ");
	 console.log(prop); */
	//$("#label_for_header_registr_personal_checkbox > div").addClass("label-for-header-registr-personal-checkbox-checked");
})

$(document).ready(function() {
	$(document).on("click", "#vote_radio_269_1269", function(){
		$(".hide-form-prop").fadeIn("slow");
        });    
    $(document).on("click", "#vote_radio_269_1270", function(){          
		$(".hide-form-prop").fadeOut("slow");
		
        }); 
//$("#shares").delay(5000).fadeIn(3000);   
$("#shares").animate({height: "show"}, 3000);     
$('#hides').click(function() {
         // $("#news").hide(1500);
          $(".news-line").hide(1500);          
          var date = new Date(new Date().getTime() + 60 * 1000 * 60 * 24 * 30 * 12);
          var name_cookie = $('.news-line').attr("data_shares"); 
          document.cookie = name_cookie+"=YES; path=/;expires=" + date.toUTCString(); 
          console.log(name_cookie);
    });
  
});

