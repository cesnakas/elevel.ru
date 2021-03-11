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
					$("#title-search-catalog").append(response);
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
			$(".ajax_search_main_loading").css("display", "block");    
			query = $(this).val();
		    timer_main = setTimeout(function () {
			currentRequest_main = $.ajax({   
		        beforeSend : function() {           
		            if(currentRequest_main != null) {
		                currentRequest_main.abort();
		            }
		        },
		        url: '/search/search_ajax.php',
		        type: 'GET',
		        cache: true,
		        data: 'q=' + query,
		        success: function(response) {
					$(".ajax_content_main").remove();        	
	        		$(".ajax_search_main_loading").css("display","none");
					$(".ajax_search_main").append(response);
		        }
		    }); 
			}, 100);
		}
	}
	else {
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