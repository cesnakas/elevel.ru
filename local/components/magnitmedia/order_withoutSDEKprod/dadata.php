<?
$query = htmlspecialchars( $_POST['QUERY'] );



if ( $query )
{
	$curl = curl_init( 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/party' );
	
	if ( $curl )
	{
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
		
		$arHeader = Array(
			'Content-Type: application/json',
			'Accept: application/json',
			'Authorization: Token 3ddfe6802b17d1459b1980a966f8270d7cd684a6'
		);
		curl_setopt( $curl, CURLOPT_HTTPHEADER, $arHeader );
		
		curl_setopt( $curl, CURLOPT_POST, 1 );
		
		$arPost = Array(
			'query' => $query,
			'count' => 10
		);
		curl_setopt( $curl, CURLOPT_POSTFIELDS, json_encode( $arPost ) );
		
		
		$answerJson = curl_exec( $curl );
		
		curl_close( $curl );
		
		echo iconv( 'UTF-8', 'Windows-1251', $answerJson );
	}
}
?>