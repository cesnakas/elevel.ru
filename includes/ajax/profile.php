<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("sale");
$arResult['PROFILES']=array();
$arResult['PROFILE_ID']=array();
$arResult['PROPS']=array();
//$_REQUEST['PROFILE']=657;
if (
	(isset($_REQUEST['PROFILE']))


	&&

	(!empty($_REQUEST['PROFILE']))
)
{
	$dbUserProfiles = CSaleOrderUserProps::GetList(
	   array("ORDER_PROPS_ID" => "DESC"),
	   array(
	 	 "PERSON_TYPE_ID" => 1,//$arResult["PERSON_TYPE"],
		 "USER_ID" => IntVal($USER->GetID())
	   )
	);
	while($ar=$dbUserProfiles->Fetch())
	{
		
		$arResult['PROFILE_ID'][]=$ar['ID'];
	}
	
	if (in_array($_REQUEST['PROFILE'],$arResult['PROFILE_ID']))
	{
		$dbUserPropsValues = CSaleOrderUserPropsValue::GetList(
			array("SORT" => "ASC"),
			array("USER_PROPS_ID" => $_REQUEST['PROFILE']),
			false,
	        false,
	        array("VALUE", "PROP_TYPE", "VARIANT_NAME", "SORT", "ORDER_PROPS_ID","CODE")
		);
		$arResult=Array();
		while($ar=$dbUserPropsValues->Fetch())
		{
			if ($ar["PROP_TYPE"]=="SELECT")
			{
				$db_vars = CSaleOrderPropsVariant::GetList(
                	array("SORT" => "ASC"),
                	array("ORDER_PROPS_ID" => $ar["ORDER_PROPS_ID"])
           		);
         		while ($vars = $db_vars->Fetch())
         		{
         			if ($vars["ID"]==$ar["VALUE"])
         			{
         				$ar["VALUE"]=$vars["VALUE"];
         			}
				}
				
			}			
			$ar['VALUE']=iconv('cp1251','utf-8',$ar['VALUE']);
			$arResult['PROPS'][]=$ar;
		}
		//echo "<pre>";
		//var_dump($arResult['PROPS']);
		//echo "</pre>";
		echo json_encode($arResult['PROPS']);
	  }
	}

?>