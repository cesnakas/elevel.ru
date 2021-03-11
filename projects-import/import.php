<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$projects = array();

$type_object2enum_id = array(
	"�����" => 47454,
	"������� ��������������" => 47455,
	"���������" => 47456,
	"��������, �������" => 47457,
	"���������� �������" => 47458,
	"����������������" => 47459,
	"���������� �������" => 47460,
	"���������������, �������" => 47461,
	"����������������, ���������" => 47462,
	"���������" => 47463,
	"����������� ����������" => 47464,
	"�����" => 47454,
	"���������������, �������" => 47455,
);

$type_solution2enum_id = array(
	"�������� ������������" => 47467,
	"�������������� ����������������" => 47468,
	"�������������� ����������� ������" => 47469,
	"������������� � ���������������" => 47470,
	"����� ���" => 47471,
	"������������ ������������" => 47472,
	"���������������� ������" => 47473,
	"���������������� �������" => 47474,
	"������ ������������������" => 47475,
	"������������������" => 47475,
	"����������" => 47476,
	"������������ 6-10��" => 47477,
	"��������� ��������� ������� ���|���" => 47478,
	"������������� ��������� ���" => 47479,
);

if (($handle = fopen("projects.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
		list($num, $name, $type_object, $year, $descr, $equip, $type_solution, $temp) = $data;
		
		if ($num)
		{
			$year = str_replace(" �.", "", $year);
			
			if (isset($type_object2enum_id[ trim($type_object) ]))
				$type_object = $type_object2enum_id[ trim($type_object) ];
			
			$arTypeSolution = array();
			$type_solution_arr = explode(", ", $type_solution);
			foreach($type_solution_arr as $type_sol)
			{
				if (isset($type_solution2enum_id[ trim($type_sol) ]))
				{
					$arTypeSolution[] = $type_solution2enum_id[ trim($type_sol) ];
				}
				else
				{
					$arTypeSolution[] = trim($type_sol);
				}
			}
			
			$projects[ $num ] = array(
				"MODIFIED_BY"    => $USER->GetID(), // ������� ������� ������� �������������
				"IBLOCK_SECTION_ID" => false,          // ������� ����� � ����� �������
				"IBLOCK_ID"      => 88,
				"ACTIVE"         => "Y",
				
				"NAME" => $name,
				"DETAIL_TEXT" => $descr,
				"PROPERTY_VALUES" => array(
					"OBJECT_TYPE" => $type_object,
					"YEAR" => $year,
					"SOLUTION_TYPE" => $arTypeSolution,
					"EQUIPMENT" => $equip,
				)
			);
		}
    }
    fclose($handle);
}

if ($handle = opendir('imgs')) {
    while (false !== ($file = readdir($handle))) { 
        if ($file != "." && $file != "..") { 
            
			$fileNameArr = explode(" ", $file);
			
			$num = $fileNameArr[0];
			
			if (isset($projects[ $num ]))
			{
				$projects[ $num ]["PROPERTY_VALUES"]["MORE_PHOTO"][] = array("VALUE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/projects-import/imgs/" . $file));
				
				if (!isset($projects[ $num ]["DETAIL_PICTURE"]))
				{
					$projects[ $num ]["DETAIL_PICTURE"] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/projects-import/imgs/" . $file);
				}
				
				if (!isset($projects[ $num ]["PREVIEW_PICTURE"]))
				{
					$projects[ $num ]["PREVIEW_PICTURE"] = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/projects-import/imgs/" . $file);
				}
			}
        } 
    }
    closedir($handle); 
}
//echo "<pre>".print_r($projects,true)."</pre>";

CModule::IncludeModule("iblock");

$el = new CIBlockElement;

foreach($projects as $num => $project)
{
	if($PRODUCT_ID = $el->Add($project))
	  echo "New ID: ".$PRODUCT_ID . "<br/>";
	else
	  echo "Error: ".$el->LAST_ERROR . "<br/>";
}