$( document ).ready(
	function ()
	{
		
		
		$( '#register-form' ).submit(
			function ()
			{
				var error = '';
				
				var email = $( 'input[name="email"]' ).val();
				var password = $( 'input[name="password"]' ).val();
				var passwordConfirm = $( 'input[name="password_confirm"]' ).val();
				
				if ( !isEmail( email ) )
				{
					error += '�������� ������ email<br />';
				}
				
				
				if ( !password )
				{
					error += '���������� ������� ������<br />';
				}
				else if ( password != passwordConfirm )
				{
					error += '������ � ������������� ������ �� ���������<br />';
				}
				
				
				$( '#register-error' ).html( error );
				
				if ( error )
				{
					$( '#register-error' ).show();
					return false;
				}
				else
				{
					$( '#register-error' ).hide();
				}
			}
		);
		
		
		$( '.check-row.personal .label-holder label, .check-row.personal .chk-area' ).click(
			function ()
			{
				changeSubmitActivity();
			}
		);
		
		
	}
);



function changeSubmitActivity()
{
	setTimeout(
		function ()
		{
			if ( $( '#personal' ).prop( 'checked' ) == true )
			{
				$( '#register-submit' ).prop( 'disabled', false );
			}
			else
			{
				$( '#register-submit' ).prop( 'disabled', true );
			}
		},
		100
	);
}


function isEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}