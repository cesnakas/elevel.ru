var currentRequest = null;
var timer;   
$(document).on("keyup", '#title-search-input-catalog', function(e) {
	if ($(this).val().length > 2) 
	{
		if (e.keyCode != 16 && e.keyCode != 17 && e.keyCode != 18)
		{
			$(".search-page-ajax").remove();
			window.clearTimeout(timer);		                               	
			$(".tz_search_ajax").css("display", "block");    
			query = $(this).val();
		    timer = setTimeout(function () {
			currentRequest = $.ajax({   
		        beforeSend : function() {           
		            if(currentRequest != null) {
		                currentRequest.abort();
		            }
		        },
		        url: '/ajax/ajax_fast_search_catalog.php',
		        type: 'GET',
		        cache: true,
		        data: 'q=' + query +'&submit=from_ajax',
		        success: function(response) {
					$(".search-page-ajax").remove();        	
	        		$(".tz_search_ajax").css("display","none");
					$("#title-search").append(response);
		        }
		    }); 
			}, 350);
		}
	}
	else {
		$(".tz_search_ajax").css("display", "none");
		$(".search-page-ajax").remove();		
	}	
})
$(document).on("click", ".note.tz_n_mess .example", function(){
	$("#title-search-input-catalog").val($(this).html());
	$("#title-search-input-catalog").trigger("keyup");	
})

$(document).on("click", ".note.tz_n_mess_main .example", function(){
	$("#title-search-input").val($(this).html());
	$("#title-search-input").trigger("keyup");	
})
$(document).on("mouseup", ".search-page-ajax td.form_buy a", function(){
	$(this).css("display", "none");
	$(this).parent().children("span").css("display", "block");	
});
$(document).on("click", ".view_search_result", function(){
	$("#title-search-catalog .btn122a").trigger("click");
})



var currentRequest_main = null;
var timer_main;   
$(document).on("keyup", '#title-search-input', function(e) {		
	if ($(this).val().length > 2) {
		if (e.keyCode != 16 && e.keyCode != 17 && e.keyCode != 18)
		{
			
			$(".ajax_content_main, .note_rem").remove();
			window.clearTimeout(timer_main);

			query = $(this).val();
			category = $('#search-category span').attr('category');
			category = "1";
		    timer_main = setTimeout(function () {
			currentRequest_main = $.ajax({   
		        beforeSend : function() {           
		            if(currentRequest_main != null) {
		                currentRequest_main.abort();
		            }
		        },
		        url: '/search/search_ajax_nano.php',
		        type: 'GET',
		        cache: true,
//		        data: 'q=' + query,
		        data    : "q=" + query + "&cat=" + category, 
//		        data: {'q' : query, 'cat' : category},
        //		datatype: "json",
		        success: function(response) {
					$("#title-search").html('');
	        		$(".ajax_search_main_loading").css("display","none");
					$("#title-search").append(response);
					
					$(".ajax_search_main_loading").css("display", "block");
					$("#title-search").show();
					$(".popup-search").show();
		        }
		    }); 
			}, 100);
		}
	}
	else {
		$("#title-search").hide();
		$(".tz_search_ajax").css("display", "none");
		$(".ajax_content_main, .note_rem").remove();		
	}	
})
$(document).on("hover", ".s_ajax_item", function(){
	var categoryId = $(this).attr("data-id");
	$("#fast_ajax_main_cat_"+categoryId).toggleClass("tz_orange");
})
$(document).on("mouseup", ".search_main_catalog_items .form_buy a.buy_fast_search", function(){
	$(this).parent().find(".buy_fast_search").css("display", "block");
	$(this).css("display", "none");
})
$(document).on("click", ".tz_btn_s_more", function(){
	var findId = $(this).attr("data-find-id");
	if (!$(this).hasClass("tz_all_open"))
	{
		$(this).addClass("tz_all_open");
		$(this).text("Скрыть");
		$(".tz_hidden.s_ajax_item_"+findId).css("display", "table-row");
	} else {
		$(this).removeClass("tz_all_open");
		$(this).text("Показать ещё");
		$(".tz_hidden.s_ajax_item_"+findId).css("display", "none");		
	}
	
	
})



$(document).ready(function() {

	$('.search-category > span').click(function(event) {
		event.stopPropagation();
		$('.list-cat').show();
	});
	
	$('.search-category .list-cat > span').click(function() {
		$('.list-cat').hide();
	});
	
	
	$('.search-category .list-cat li span').click(function() {
		
		cat = $(this).attr('category');
		text = $(this).text();
		
		search_elem = $('.search-category > span');
		header_list_elem = $('.search-category .list-cat > span');
		
		search_elem.text(text);
		search_elem.append("<i class='tz-caret'></i>");
		search_elem.attr('category',cat);
		
		
		header_list_elem.text(text);
		header_list_elem.append("<i class='tz-caret'></i>");
		header_list_elem.attr('category',cat);
		
		$('.list-cat').hide();
		
		$('#title-search-input').keyup();
	});
	
	$('body').click(function() {
		$('.list-cat').hide();
	});
})