// очистка фильтра
$(document).on('click', '#projects_filter_reset', function(){
	$(".form-projects-filter select option:selected").each(function(){
		$(this).removeAttr('selected');
	});
	
	$(".form-projects-filter select").each(function(){
		$(this).find("option:first").prop('selected', true);
	});
	
	$(".form-projects-filter select:first").change();
});