$( document ).ready(
	function ()
	{
		
		$( '.search-section' ).click(
			function ()
			{
				var sectionId = $( this ).data( 'id' );
				
				$( '#search-section' ).val( sectionId );
			}
		);
		
	}
);