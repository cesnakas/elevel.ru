$(function(){
	$("#profile_login_input").change(function(){
		$("#profile_email_input").val($(this).val());
	});
	
	$("#profile_fio_input").change(function(){
		_val = $(this).val();
		_arFIO = _val.split(" ");
		
		$("#profile_last_name_input").val(_arFIO[0]);
		$("#profile_name_input").val(_arFIO[1]);
		$("#profile_second_name_input").val(_arFIO[2]);
	});
});