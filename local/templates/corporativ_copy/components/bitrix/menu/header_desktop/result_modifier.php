<?
$currentParentKey = false;


foreach ( $arResult as $key => $arItem )
{
	if ( $arItem['IS_PARENT'] )
	{
		$currentParentKey = $key;
	}
	elseif ( $currentParentKey !== false && $arItem['DEPTH_LEVEL'] == 2 )
	{
		$arResult[$currentParentKey]['CHILDS'][] = $arItem;
		unset( $arResult[$key] );
	}
}
?>