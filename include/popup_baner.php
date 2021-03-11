<!--<?//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>-->
<!--<div id="banerfriday" class="">
	<div class="background"></div>
	<div class="popup">
		<div class="close">x</div>
	</div>
</div>
<style>
	#banerfriday{
		display: none;
		/*display: block;*/
	}
	#banerfriday.show{
		display: block;
	}
	#banerfriday .background{
		position: fixed;
		z-index: 998;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		overflow: hidden;
		background: #444444;
		opacity: 0.8;
	}
	#banerfriday .popup{
		position: fixed;
		z-index: 999;
		height:400px;
		width: 292px;
		background: url('/include/image/orange-november-24.jpg') no-repeat;
		background-size: contain;
		top:50%;
		left:50%;
		margin-left: -146px;
		margin-top: -200px;
		cursor: pointer;
	}
	#banerfriday .popup .close{
		color: #000;
		cursor: pointer;
		opacity: 1;
		text-shadow: none;
		position: absolute;
		right: -21px;
		top: 95px;
		border: 4px solid #ef7f1b;
		border-radius: 30px;
		display: block;
		width: 30px;
		line-height: 17px;
		text-align: center;
		padding-bottom: 4px;
		font-family: Tahoma;
		background: #fff;
		z-index: 99;
	}
	@media (max-width:400px){
		#banerfriday .popup{
			height:350px;
			width: 242px;
			margin-left: -124px;
			margin-top: -175px;
		}
		#banerfriday .popup .close{
			top: 69px;
		}
	}
</style>
<script>
	function getCookie(name) {
		var matches = document.cookie.match(new RegExp(
		  "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		))
		return matches ? decodeURIComponent(matches[1]) : undefined 
	}
	function setCookie(name, value, props) {
		props = props || {}
		var exp = props.expires
		if (typeof exp == "number" && exp) {
			var d = new Date()
			d.setTime(d.getTime() + exp*1000)
			exp = props.expires = d
		}
		if(exp && exp.toUTCString) { props.expires = exp.toUTCString() }

		value = encodeURIComponent(value)
		var updatedCookie = name + "=" + value
		for(var propName in props){
			updatedCookie += "; " + propName
			var propValue = props[propName]
			if(propValue !== true){ updatedCookie += "=" + propValue }
		}
		document.cookie = updatedCookie

	}
	function deleteCookie(name) {
		setCookie(name, null, { expires: -1 })
	}
	if(getCookie("ShowlackFriday") === undefined){//если куки пусты
		$("#banerfriday").addClass("show");
		$( "#banerfriday .popup .close" ).click(function() {
		  $("#banerfriday").removeClass("show");
		  return false;
		});
		$( "#banerfriday .background" ).click(function() {
		  $("#banerfriday").removeClass("show");
		});
		$( "#banerfriday .popup" ).click(function() {
			if( $(this).attr("class")!="close" ) window.location.href="/company/news/1633447/";
		});
		setCookie("ShowlackFriday","Y", { expires:86400, path: "/" })
	}else{
		$("#banerfriday").html("");
	}

</script>-->
<!--<?//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>-->