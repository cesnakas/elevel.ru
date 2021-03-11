<?$IsRuss = (substr($APPLICATION->GetCurDir(), 0, 4) != '/en/');?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.forget_form').click(function() {
			$('.popup398Content').empty().load('/sendquery/forget_form.php');
			var x = $('body').height();
			$('#fade').height(x);
			$('#container2, .popup398').css('display','block');
			$('#fade').fadeTo('slow',0.5);
		});
	})
</script>

<?$dir=$APPLICATION->GetCurDir();?>

<p id="select-action">
<a href="#" class="enter">Личный кабинет</a>
		<?if (isset($_GET['register']) && $_GET['register'] == "Y"):?>
			
		<?else :?>
			
			<?if(!$USER->IsAuthorized()){?>
				<?/*<div class="forgot-lnk" style="width: 74px; <?if($dir=="/"){?>width: 83px;<?}?>">*/?>

			<?}?>
		<?endif;?>

	<div id="login" style="display: none;text-align: right;">
		<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "header", 
		array("REGISTER_URL"=>"/auth/","PROFILE_URL"=>"/personal/profile/","SHOW_ERRORS"=>"Y"),false);?>
	</div>
	
</p>