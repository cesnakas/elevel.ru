$(function(){
	
	$("ul.list-partners li").hover(
		function() {
			if ($( this ).find("span.text.second").length > 0)
			{				
				$( this ).find( "span.text" ).css("display", "none");
				$( this ).find( "span.text.second" ).css("display", "inline-block");			
			}
		},
		function() {			
			$( this ).find( "span.text" ).css("display", "inline");
			$( this ).find( "span.text.second" ).css("display", "none");
		}
	);
});