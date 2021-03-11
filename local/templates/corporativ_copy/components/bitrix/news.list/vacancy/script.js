$(function(){
	
	// По клику на ссылки Начало карьеры и Розничная сеть меняем значения скрытых полей
	$("a.carier_start, a.retail_net").on("click", function(e){
		e.preventDefault();
		
		var property_name = $(this).attr('class');
		var parent_li = $(this).parents("li");
		
		if (parent_li.hasClass("active"))
		{
			parent_li.removeClass("active");
			$("input[name=" + property_name + "]").val("").trigger('change');
		}
		else
		{
			parent_li.addClass("active");
			$("input[name=" + property_name + "]").val("Y").trigger('change');
		}
	});
	
	// При любом изменении полей фильтра подгружаем новые данные
	$("form.vacancy_filter select, form.vacancy_filter input").on("change", function(e){
		
		var data = $("form.vacancy_filter").serialize();
		
		$.ajax({
				type: "GET",
				url: window.location.href,
				data: data,
				timeout: 3000,
				success: function(data) {
					$(".vacancies .right-block").html($(data).find(".vacancies .right-block").html());
				}
		});
	});
});