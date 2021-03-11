<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

$arFilter = Array(
	"IBLOCK_ID" => 116,
);

$section_zero2sections_first = array();
$section_zero2producers = array();

$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, Array("NAME", "ID", "PROPERTY_SECTIONS_FIRST_LEVEL"));
while($ar_fields = $res->GetNext())
{	
	$section_zero2sections_first[ $ar_fields["ID"] ][] = $ar_fields["PROPERTY_SECTIONS_FIRST_LEVEL_VALUE"];
}
//echo "<pre>".print_r($section_zero2sections_first,true)."</pre>";

foreach($section_zero2sections_first as $section_zero => $section_first)
{
	$arFilter = Array(
		"IBLOCK_ID" => 83,
		"SECTION_ID" => $section_first,
		"INCLUDE_SUBSECTIONS" => "Y"
	);
	
	$resEls = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, Array("PROPERTY_PRODUCER"));
	while($arInfo = $resEls->GetNext())
	{	
		//echo "<pre>".print_r($arInfo,true)."</pre>";

		if ($arInfo["PROPERTY_PRODUCER_VALUE"])
			if (!in_array($arInfo["PROPERTY_PRODUCER_VALUE"], $section_zero2producers[ $section_zero ]))
				$section_zero2producers[ $section_zero ][] = $arInfo["PROPERTY_PRODUCER_VALUE"];
	}
	
}

//echo "<pre>".print_r($section_zero2producers,true)."</pre>";

foreach($section_zero2producers as $section_zero => $array)
{
	/*echo "<pre>".print_r($section_zero,true)."</pre>";
	echo "<pre>".print_r($array,true)."</pre>";*/
	
	CIBlockElement::SetPropertyValuesEx($section_zero, 116, array("PRODUCERS" => $array));
}
?>
done!