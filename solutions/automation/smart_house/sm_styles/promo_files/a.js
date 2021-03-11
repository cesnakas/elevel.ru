function toggleDiv(id)
{
	e = document.getElementById(id);
	if (!e)
		return;

	if(e.style.display == 'none')
		e.style.display = '';
	else
		e.style.display = 'none';

	e.style.left = (document.documentElement.clientWidth - e.clientWidth) / 2 + 'px';
	e.style.top = document.documentElement.scrollTop + 40 + 'px';
}


function toggleDivMod(id)
{
	e = document.getElementById(id);
	if (!e)
		return;

	if(e.style.display == 'none')
		e.style.display = '';
	else
		e.style.display = 'none';

	e.style.left = (document.getElementById('body').clientWidth - e.clientWidth) / 2 + 'px';
	e.style.top = (document.documentElement.clientHeight - e.clientHeight) / 2 + 'px';
}


function toggleDisplay(id)
{
	newWin('/sendquery/' + id + '.php', 'form', 460, 450);
}

function showForm(id, w, h)
{
	newWin('/sendquery/' + id + '.php', 'form', w + 20, h);
}

function toggleDisplayNP(id)
{
	e = document.getElementById(id);
	if (!e)
		return;

	if(e.style.display == 'none')
		e.style.display = '';
	else
		e.style.display = 'none';
}

function closeOpened(id)
{
	e = document.getElementById(id);
	if (!e)
		return;
	e.style.display = 'none';
}

function closeAllOpened(e)
{
	var Wins = new Array('pp-sendquery-cs-1', 'pp-sendquery-cs-2', 'pp-sendquery-cs-3', 'order-form-error', 'pp-sendquery-shild');
	if (!e)
		e = window.event;

	if ((!e) || (!e.target))
		return;

	for (key in Wins)
	{
		if((e.target.id) && (e.target.id == Wins[key]))
			return;
	}

	var parent = e.target.parentNode;
	while (parent)
	{
		for (key in Wins)
			if((parent.id) && (parent.id == Wins[key]))
				return;
		parent = parent.parentNode;
	}

	for (key in Wins)
		closeOpened(Wins[key]);
}

function scJSH(el)
{
	if(el && el.parentNode)
		el.className = (el.className == 'closed')?'jshover':'closed';
}

function newWin(addr, ttl, w, h)
{
	window.open(addr, ttl, "width="+w+", height="+h+", toolbar=0, location=0, directories=0, menubar=0, scrollbars=1, resizable=0, status=0, fullscreen=0");
}

function number_format( number, decimals, dec_point, thousands_sep ) {
	var i, j, kw, kd, km;

	// input sanitation & defaults
	if( isNaN(decimals = Math.abs(decimals)) ){
		decimals = 2;
	}
	if( dec_point == undefined ){
		dec_point = ",";
	}
	if( thousands_sep == undefined ){
		thousands_sep = ".";
	}

	i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

	if( (j = i.length) > 3 ){
		j = j % 3;
	} else{
		j = 0;
	}

	km = (j ? i.substr(0, j) + thousands_sep : "");
	kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
	//kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
	kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");
	return km + kw + kd;
}

function limitChars(textarea, limit, infodiv)
{
	var text = textarea.attr("value");
	var textlength = text.length;
	var info = document.getElementById(infodiv);
	if(textlength > limit)
	{
		info.innerHTML = 0;
		textarea.attr("value", text.substr(0,limit));
		return false;
	}
	else
	{
		info.innerHTML = limit - textlength;
		return true;
	}
}

function hideSelectAction()
{
	$("#select-action").fadeTo("slow", 0, function callback() {
	  	$("#select-action").css({display: "none"});
	  	$("#login").slideToggle("slow");
	});
}

function close_error()
{
	$("#error-msg").css({display: "none"});
	hideSelectAction();
	return false;
}

function trim(s)
{
  return rtrim(ltrim(s));
}

function ltrim(s)
{
  return s.replace(/^\s+/, '');
}

function rtrim(s)
{
  return s.replace(/\s+$/, '');
}

function refreshBasketSmall()
{
	$.ajax({
		async: true,
		type: "GET",
		url: '/includes/ajax/basket.small.php',
		data: "",
		beforeSend: function() {
		},
		success: function(msg) {
			$("#small-basket").html(msg);
		}
	});
}
var pay_titles=[];
var delivery_titles=[];


var delivery_map_by_pay=[];

delivery_map_by_pay[5]=[];

$(document).ready(function(){


	var v=$("select[name='ORDER_PROP_26']").val();
	if(!v)
	{
		$("select[name='ORDER_PROP_26']").children('option').each(
			function()
			{
				if($(this).attr('value')==1) $(this).attr('selected',true);
			}
		);
	}

/*	$(".enter").click(function() {
		hideSelectAction();
		return false;
	});

*/
	$("#pay_system").change(function()
		{
			console.log($(this).val());
			var t=pay_titles[$(this).val()];
			$("#pay_hint").html(t);
			if(t) $("#pay_hint").show();
			else $("#pay_hint").hide();
		}
	);

	$("#delivery").change(function()
		{
			var t=delivery_titles[$(this).val()];
			$("#delivery_hint").html(t);
			if(t) $("#delivery_hint").show();
			else $("#delivery_hint").hide();


			if($(this).val()==2 || $(this).val()==5) $("#address_delivery").show();
			else $("#address_delivery").hide();
		}
	);


	$("a[name=enter]").click(function() {
		$("#form-auth").submit();
		return false;
	});

	$("#clear-basket").live('click', function() {
		$.ajax({
			async: true,
			type: "GET",
			url: '/includes/ajax/basket.clear.php',
			data: "",
			beforeSend: function() {
			},
			success: function(msg) {
				$("#small-basket").html(msg);
				location.reload();
			}
		});
		return false;
	});

	$("input[type=radio]").css({width: "13px"});

	var count = 0;
	$("td[class=count]").each(function(i, item) {
		var value = $(item).html();
		if (trim(value) == "") count ++;
	});
	if (count == $("td[class=count]").size())
	{
		$("td[class=count], th[class=count]").remove();
	}
	else
	{
		$("th[class=count]").html("<div>остатки</div>");
	}


	$("a[name=delete-item]").live('click', function() {
		var id = $(this).attr("class");

		$.ajax({
			async: true,
			type: "GET",
			url: '/includes/ajax/basket.delete.php?id='+id,
			data: "",
			beforeSend: function() {
			},
			success: function(msg) {
				$("#basket").html(msg);
				refreshBasketSmall();
			}
		});

		return false;
	});

	$("a.extfilter").click(function() {
		$("#rs-extss").slideToggle("slow");
		return false;
	});

	$("a[href*=ADD2BASKET]").click(function() {
		var link = $(this);
		var href = $(this).attr("href").substr($(this).attr("href").indexOf("?")+1);
		var id = parseInt(href.substr(href.indexOf("id=")+3));
		var count = $("#good_id_"+id).val();
		href += "&count="+count;

		$("div.in_basket").hide();

		if (count <= 0)
		{
			$(link).parent().find("div.in_basket").html('<p>Необходимо указать кол-во товара и только после этого нажать «добавить в корзину»</p><p><a class="close" href="#">Продолжить покупки</a></p>');
			$(link).parent().find("div.in_basket").show();
		}
		else
		{
			$.ajax({
				async: true,
				type: "GET",
				url: "/includes/ajax/basket.add.php?"+href,
				data: "",
				beforeSend: function() {
				},
				success: function(msg) {
					$.ajax({
						async: true,
						type: "GET",
						url: '/includes/ajax/basket.small.php',
						data: "",
						beforeSend: function() {
						},
						success: function(msg) {
							
							$("#small-basket").html(msg);
							//$(link).parent().find("div.in_basket").html('<p>Товар добавлен в корзину</p><p><a href="/personal/order.php">Оформить заказ</a></p><p><a class="close" href="#">Продолжить покупки</a></p>');
							//$(link).parent().find("div.in_basket").show();
							$(".bsk18").closest('li').find('.pic154').fadeIn('slow').delay(500).fadeOut('slow');
							
						}
					});
					
				}
			});
			if ($(this).attr('class')!='bsk18') 	$(this).unbind('click');
		}
		//
		return false;
	})

	$("div.in_basket a.close").live('click', function() {
		$(this).parent().parent().hide();
		return false;
	})
	
	$('#PROFILE_ID').change(
			function () {
				var PROFILE_ID=$(this).val();
				var url_profile = '/includes/ajax/profile.php';
		        $.ajax(
		        	{
		        	type: "POST",
		            url: url_profile,
		        	async: false,
		            data: "PROFILE="+PROFILE_ID,
		            dataType : "json",
		            success:onAjaxSuccess
		     		}
		        );
		 }
	);
	function onAjaxSuccess(data)
	{
		//alert(data.length);
		for (i=0; i< data.length; i++)
		{
			VAL=data[i].VALUE;
			PROP_TYPE=data[i].PROP_TYPE;
			NAME="ORDER_PROP_"+data[i].ORDER_PROPS_ID;
            ID=data[i].ORDER_PROPS_ID;
			if (PROP_TYPE=='LOCATION')
			{	
				$('[name$="'+NAME+'"] [value='+VAL+']').attr("selected", "selected");
				//$('[name$="'+NAME+'"] [value='+VAL+']').trigger('refresh');
				//$('select.stylize').trigger('refresh');
				//$('select.stylize').selectbox();
			}
			else if ( PROP_TYPE=='SELECT')
			{	//alert('---');
				$('[name$="'+NAME+'"] [value='+VAL+']').attr("selected", "selected");
				//$('[name$="'+NAME+'"] [value='+VAL+']').trigger('refresh');
				//$('select.stylize').trigger('refresh');
				//$('select.stylize').selectbox();
				//alert(VAL);
			}
			else if (ID=='2')
			{
				ar=VAL.split('-',2);
				if (ar.length>1)
				{
					$('input[name$="CODE"]').val(ar[0]);
					$('input[name$="'+NAME+'"]').val(ar[1]);
				}else{
					$('input[name$="'+NAME+'"]').val(ar[0]);
				}
			}
			else if(PROP_TYPE=='TEXT')
			{
				
				$('input[name$="'+NAME+'"]').val(VAL);
				//$("#my_select [value='2']").attr("selected", "selected");
			}
			else if(PROP_TYPE=='CHECKBOX')
			{
				if (VAL=='Y'){
					$('#template').attr('checked','checked');
					$('.qCell-1 img').attr({'src':'/i/pic17-checked.gif'});
				}
			}
		}
		$('[name$="ORDER_PROP_4"]').trigger('refresh');
		$('[name$="ORDER_PROP_35"]').trigger('refresh');
		
	}
	
	
});
	