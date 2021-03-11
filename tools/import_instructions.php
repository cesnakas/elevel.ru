<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

//
// Import instructions from directory
// Works only with file names like "Instr_Zamel_ExtaFree_ANT-01_rus.pdf", where ANT-01 - articul
//

global $USER;

if ($USER->isAdmin()){
	

	CModule::IncludeModule("iblock");
	
	// Add new property
	// $arFields = Array(
		// "NAME" => "Инструкция",
		// "ACTIVE" => "Y",
		// "SORT" => "600",
		// "CODE" => "INSTRUCTION",
		// "PROPERTY_TYPE" => "F",
		// "IBLOCK_ID" => CATALOG_ID,
	// );

	// $ibp = new CIBlockProperty;
	// $PropID = $ibp->Add($arFields);
	// echo $PropID;
	
	// die();

	$dir = $_SERVER["DOCUMENT_ROOT"]."/upload/instructions/";
	
	$arAR = array(
		"RNK-02    ",
		"RNK-02    ",
		"RNK-02    ",
		"RNK-04    ",
		"RNK-04    ",
		"RNK-04    ",
		"RNL-01    ",
		"RNM-10    ",
		"P-256/8    ",
		"P-256/36    ",
		"P-257/2    ",
		"P-257/4    ",
		"RCR-01    ",
		"RCL-01    ",
		"RCL-02    ",
		"RCK-01    ",
		"RCT-01    ",
		"RCZ-01    ",
		"RND-01    ",
		"RNL-01    ",
		"RNM-10    ",
		"RNP-01    ",
		"RNP-02    ",
		"GRG-01    ",
		"GRL-01    ",
		"GRM-10    ",
		"	",
		"RDP-01    ",
		"ROB-01/12-24V    ",
		"ROM-01    ",
		"ROM-10    ",
		"ROP-01    ",
		"ROP-02    ",
		"RWG-01    ",
		"RWL-01    ",
		"SRP-01    ",
		"SRP-02    ",
		"SRP-03    ",
		"RZB-01    ",
		"RZB-02    ",
		"RZB-03    ",
		"RZB-04    ",
		"RZB-05    ",
		"RWG-01k    ",
		"RWS-311C/Z    ",
		"ANT-01    ",
		"EFC-02    ",
		"RTI-01    ",
		"RTN-01    ",
		"RXM-01 ",
	);
	
	$arArticulToFileEx = array(
		"RNK-02 белый" => "Instr_Zamel_ExtaFree_RNK-02_rus.pdf",
		"RNK-04 белый" => "Instr_Zamel_ExtaFree_RNK-04_rus.pdf",
		"RWG-01K" => "Instr_Zamel_ExtaFree_RWG-01-K_rus (комплект P-257-2+RWG-01).pdf",
		"ROB-01/12-24V" => "Instr_Zamel_ExtaFree_ROB-01_12-24V_rus.pdf",
		"RWS-311C/Z" => "Instr_Zamel_ExtaFree_RWS-311C_Z_rus (комплект p-257-4+RWS-311).pdf",
		"RNK-02 черный" => "Instr_Zamel_ExtaFree_RNK-02_rus.pdf",
		"RNK-04 черный" => "Instr_Zamel_ExtaFree_RNK-04_rus.pdf",
	);
	
	// set to normal view
	$arNewAR = array();
	foreach($arAR as $val){
		$value = trim($val);
		if(strlen($value) != 0){
			if(!in_array($value, $arNewAR)){
				$arNewAR[] = $value;
			}
		}
	}
	
	// find all instructions and get aticul from file name
	if ($dh = opendir($dir)) {
		
		$arArticul = array();
		$arArticulToFile = array();
		while (($file = readdir($dh)) !== false) {
			
			if (strpos($file, '.pdf') === FALSE) continue;

			$arFile = explode("_",$file);
			
			if(strlen($arFile[3]) > 0){
				$arArticul[] = $arFile[3];
				$arArticulToFile[$arFile[3]] = $dir . $file;
			}
	
		}
		closedir($dh);
	}
	
	
	// echo "<pre>"; print_r($arNewAR); echo "</pre>";
	echo "<pre>"; print_r($arArticul); echo "</pre>";
	echo "<pre>"; print_r($arArticulToFileEx); echo "</pre>";
	// echo "<pre>"; print_r(array_diff($arNewAR, $arArticul)); echo "</pre>";
	// echo "<pre>"; print_r(array_diff($arArticul, $arNewAR)); echo "</pre>";
	
	
	if(!empty($arArticul)){
		
		$arFilter = array(
			"IBLOCK_ID" => CATALOG_ID, 
			"%PROPERTY_" . ARTICUL_PROP => $arArticul
		);
		
		$arSelect = array(
			"ID",
			"NAME",
			"IBLOCK_ID",
			"PROPERTY_" . ARTICUL_PROP,
			"DETAIL_PAGE_URL"
		);

		// echo "<pre>"; print_r($arFilter); echo "</pre>";
		
		// $arMarkingProducer = array();
		$arProblems = array();
		$rsProduct = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
		while($arProduct = $rsProduct->GetNext())
		{
			// $arMarkingProducer[] = $arProduct['PROPERTY_MARKING_PRODUCER_VALUE'];

			$instruction = "";
			if(in_array($arProduct['PROPERTY_MARKING_PRODUCER_VALUE'],$arArticul))
				$instruction = $arArticulToFile[$arProduct['PROPERTY_MARKING_PRODUCER_VALUE']];
			elseif(array_key_exists($arProduct['PROPERTY_MARKING_PRODUCER_VALUE'],$arArticulToFileEx))
				$instruction = $dir . $arArticulToFileEx[$arProduct['PROPERTY_MARKING_PRODUCER_VALUE']];
			
			$arProduct['INSTRUCTION'] = $instruction;
			
			if(strlen($instruction) > 0){
				
				$arFile = CFile::MakeFileArray($instruction);

				if(!empty($arFile)){
					$PropFileArr = array(
						"16777" => array(
						// "INSTRUCTION" => $arFile
						// "INSTRUCTION" => array(
							array(
								'VALUE' => $arFile, 
								'DESCRIPTION' => $arFile['name']
							)
						)
					);
				
					// echo "<pre>"; print_r($arProduct['ID']); echo "</pre>";
					// echo "<pre>"; print_r($PropFileArr); echo "</pre>";
					// CIBlockElement::SetPropertyValuesEx($arProduct['ID'], $arProduct['IBLOCK_ID'], $PropFileArr);
				}
				else{
					// echo "no-file<pre>"; print_r($instruction); echo "</pre>";
					// echo "<pre>"; print_r($arFile); echo "</pre>";
					$arProblems['NO_FILE'][] = $arProduct;
				}
			}
			else
				$arProblems['NO_INSTRUCTION'][] = $arProduct;

			
			echo "<pre>"; print_r("https://elevel.ru" . $arProduct['DETAIL_PAGE_URL']); echo "</pre>";
			
			
		}
		

		// echo "<pre>"; print_r($arProblems); echo "</pre>";

	}

}


?>