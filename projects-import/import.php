<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$projects = array();

$type_object2enum_id = array(
	"Жилье" => 47454,
	"Объекты инфраструктуры" => 47455,
	"Гостиницы" => 47456,
	"Торговые, офисные" => 47457,
	"Культурные объекты" => 47458,
	"Административные" => 47459,
	"Спортивные объекты" => 47460,
	"Обрузовательные, учебные" => 47461,
	"Производственные, складские" => 47462,
	"Транспорт" => 47463,
	"Медицинские учреждения" => 47464,
	"Жильё" => 47454,
	"Образовательные, учебные" => 47455,
);

$type_solution2enum_id = array(
	"поставка оборудования" => 47467,
	"проектирование электроснабжения" => 47468,
	"проектирование слаботочных систем" => 47469,
	"автоматизация и диспетчеризация" => 47470,
	"умный дом" => 47471,
	"производство электрощитов" => 47472,
	"электромонтажные работы" => 47473,
	"светотехнические решения" => 47474,
	"услуги электролабаратории" => 47475,
	"электролабаратория" => 47475,
	"шинопровод" => 47476,
	"оборудование 6-10кВ" => 47477,
	"резервные источники питания ИБП|ДГУ" => 47478,
	"газопоршневые установки ГПУ" => 47479,
);

if (($handle = fopen("projects.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
		list($num, $name, $type_object, $year, $descr, $equip, $type_solution, $temp) = $data;
		
		if ($num)
		{
			$year = str_replace(" г.", "", $year);
			
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
				"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
				"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
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