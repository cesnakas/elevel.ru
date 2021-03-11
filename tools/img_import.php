<?



$_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__) . "/../");
echo $_SERVER['DOCUMENT_ROOT'];

require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );
ini_set("display_errors",0);
error_reporting(0);
set_time_limit(0);

global $USER;
$USER->Authorize("53044");

CModule::IncludeModule( 'iblock' );
//define("OLD_CATALOG_IBLOCK_ID", 6);
define("NEW_CATALOG_IBLOCK_ID", 83);


// Get all iblock properties
// $arPropertyFilter = Array(
	// "ACTIVE"=>"Y", 
	// "IBLOCK_ID"=>NEW_CATALOG_IBLOCK_ID,
	// "ID" => 15380 // SERIES
// );
// $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), $arPropertyFilter);
// while ($prop_fields = $properties->GetNext())
// {
	// echo "<pre>"; print_r($prop_fields); echo "</pre>";
// }


$obLog = new CCustomLog();

$obLog->Write("INITIALIZE");
$obLog->Write("Получение данных" . date(DATE_RFC2822));

// Получение товаров нового каталога
// $arId=array(1461281, 1626758, 1420955);
$arFilter = Array(
	"IBLOCK_ID" => NEW_CATALOG_IBLOCK_ID,	
	// "PROPERTY_PRODUCER" => 48972, // Favourite
//	"PROPERTY_SERIES" => 1664805, // Unica NEW
	"PREVIEW_PICTURE" => false,
	//"DETAIL_PICTURE" => false,
	"!PROPERTY_IMAGES" => false,
	// "PROPERTY_IMAGES" => false,
	
	//'ID' => $arId,
	// "SECTION_ID" => 46841, // Светильники
	// "INCLUDE_SUBSECTIONS" => "Y",
	
	// "ID" => 1664798,	
	);
$arSelect = Array(
	"ID",	
	"ACTIVE",
	"NAME",
	"IBLOCK_ID",
	"PREVIEW_PICTURE",
	"DETAIL_PICTURE",
	"CODE",
	"PROPERTY_IMAGES",
	// "PROPERTY_GALLERY",
	);



$time_start = getmicrotime1();
// $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
$res = CIBlockElement::GetList(Array(), $arFilter, false, array(), $arSelect);
$arNew = array();

// https://eway-test.elevel.ru/upload/raec/3e6a/d854/824d/922d84769be280e8c00ba09472deddda.jpg
// https://eway-test.elevel.ru/upload/raec/3e6a/f964/3884/31cad1f14bd9564f79439b481cbe9848.jpg
// https://eway-test.elevel.ru/upload/raec/3e6a/c0b4/d815/49f339554f18a0b02673fff97dc28948.jpg
// https://eway-test.elevel.ru/upload/raec/3e6a/e5de/e96f/7f0272588228c846379f8faa03fbd55c.jpg

$arElements = array();
$arProductsErr = array();
$i=0;
while($arElement = $res->GetNext())
{	
	$arElements[] = $arElement;
	$arNew['CODE'][$arElement['ID']] = $arElement['CODE'];	
	
	// Только те, у которых не установлено фото и есть ссылки
	if(!$arElement['PREVIEW_PICTURE'] && $arElement['PROPERTY_IMAGES_VALUE']){
		// Если массива еще нет
		if(!is_array($arNew['IMAGES'][$arElement['ID']]))
			$arNew['IMAGES'][$arElement['ID']] = array();
			
		// Если есть ссылка и она уникальна
		if($arElement['PROPERTY_IMAGES_VALUE'] && !in_array($arElement['PROPERTY_IMAGES_VALUE'],$arNew['IMAGES'][$arElement['ID']]))
			$arNew['IMAGES'][$arElement['ID']][] = $arElement['PROPERTY_IMAGES_VALUE'];	
	}
		
	// Проверка на косяки при импорте (если массив полон, значит какие то изображения не импортировались)
	// if($arElement['PROPERTY_IMAGES_VALUE'] && !$arElement['PREVIEW_PICTURE'])
		// $arProductsErr[$arElement['ID']] = $arElement['ID'];
	
}

// echo "<pre>"; print_r(count($arNew['IMAGES'])); echo "</pre>";

// return;
$obLog->Write("-------------- ошибка импорт изображений" . $t);
$obLog->Write($arProductsErr);
$obLog->Write("-------------- ошибка импорт изображений " . $t);

$t = (getmicrotime() - $time_start);
$obLog->Write("Импорт изображений " . $t);

$arProducts = array();

$el = new CIBlockElement; 

// Цикл по всем изображениям
foreach($arNew['IMAGES'] as $PRODUCT_ID => $arImg){
	
	$arLog = array();
	$arLoadProductArray = array();
	$arLoadProductProperties = array();
	$t = (getmicrotime() - $time_start);
	$obLog->Write("PRODUCT_ID = " . $PRODUCT_ID . ", time = " . $t);
	
	// Если есть ссылки на фото
	if(!empty($arImg)){
		
		$arLog = array(
			"PRODUCT_ID" => $PRODUCT_ID,
		);
		
		// Цикл по всем ссылкам товара
		foreach($arImg as $i=>$imageUrl){
			
			$arLog['IMAGES'][$i] = array(
				"URL" => $imageUrl
			);
			
			
			
			// Проверка ответа сервера
			if ($o = open_url($imageUrl))
			{
				// Получение массива файла
				$arFile = CFile::MakeFileArray($imageUrl);
				
				// Получили массив
				if(!empty($arFile)){
					
					// Попытка сохранения
					// $fid = CFile::SaveFile($arFile, "eway_images");
					
					// // Сохранили
					// if (intval($fid)>0){
						
						// Записываем id файла в товаре
						// $arUploadedFile = CFile::MakeFileArray($fid);
						$arUploadedFile = $arFile;
						
						// Если одно изображение, то сохраняем его в анонсе и в детальном изображениях
						if($i == 0){

							$arLoadProductArray["PREVIEW_PICTURE"] = $arUploadedFile;
							$arLoadProductArray["DETAIL_PICTURE"] = $arUploadedFile;
						}
						// Если больше одного, то сохраняем в дополнительном свойстве GALLERY
						else{
							$arLoadProductProperties['GALLERY'][] = $arUploadedFile;
						}
						
						//$arLoadProductArray[$FIELD_CODE] = $arFile;
					// }
					// // Не сохранили
					// else
						// $arLog['IMAGES'][$i]['ERROR'] = 'Не сохранилось изображение';

				}
				// Получить массив не удалось
				else{
					$arLog['IMAGES'][$i]['ERROR'] = 'Получить массив не удалось';
				}
				
			}
			else
			{
				$arLog['IMAGES'][$i]['ERROR'] = 'Сервер не отвечает';
			}
		}
		
		// Обновляем элемент
		if(!empty($arLoadProductArray)){

			if($res = $el->Update($PRODUCT_ID, $arLoadProductArray)){
			}
			else{
				$arLog['ERROR'] = 'Ошибка обновления элемента: ' . $el->LAST_ERROR;
				$arLog['arLoadProductArray'] = $arLoadProductArray;
			}
		}
		
		// Обновляем свойства элемента
		if(!empty($arLoadProductProperties)){
			
			CIBlockElement::SetPropertyValuesEx($PRODUCT_ID, NEW_CATALOG_IBLOCK_ID, $arLoadProductProperties);
		}
		
		$arProducts['PRODUCTS_WITH_PHOTO'][] = $arLog;
			
	}
	// Если ссылок нет
	else
		$arProducts['PRODUCTS_WITHOUT_PHOTO'][] = $PRODUCT_ID;
	
}

$t = (getmicrotime() - $time_start);
$obLog->Write($arProducts);
$obLog->Write("Всего " . count($arProducts));
$obLog->Write("Всего без фото" . count($arProducts['PRODUCTS_WITHOUT_PHOTO']));
$obLog->Write("Конец импорта изображений " . $t);

// =====================================

// $obLog->Write("Старт импорта текстов");

// $arProducts = array();
// foreach($arOld as $article => $value):
	
	// $arLog = array();
	
	// if($id = array_search($article,$arNew['CODE']))
	// {
		
		// // Если есть описания
		// if(strlen($value['PREVIEW_TEXT']) > 0 || strlen($value['DETAIL_TEXT'])){
			
			// $arLoadProductArray = Array(
				// //"PREVIEW_TEXT"   => $value['PREVIEW_TEXT'],
				// //"DETAIL_TEXT"    => $value['DETAIL_TEXT'],  
				// "PREVIEW_TEXT_TYPE" =>"html",
				// "DETAIL_TEXT_TYPE" =>"html",
				// "PREVIEW_TEXT" => $value['PREVIEW_TEXT'], 
				// "DETAIL_TEXT" => $value['DETAIL_TEXT'],
			// );
			
			// $arLog = array(
				// "ID" => $id,
				// "article" => $article,
				// "arLoadProductArray" => $arLoadProductArray
			// );
			
			
			// $res = $el->Update($id, $arLoadProductArray);
			
			// $arProducts['PRODUCTS_WITH_DESCRIPTION'][] = $arLog;
		// }
		// else{
			// $arLog = array(
				// "ID" => $id,
				// "article" => $article,
				// "ERROR" => "Нет описаний"
			// );
			// $arProducts['PRODUCTS_WITHOUT_DESCRIPTION'][] = $arLog;
		// }
	// }
	// else{
		// $arLog = array(
			// "article" => $article,
			// "ERROR" => "Не найден товар с данным кодом в новом каталоге"
		// );
		// $arProducts['PRODUCTS_NA'][] = $arLog;
	// }
	
// endforeach;

//$obLog->Write($arProducts);

// $t = (getmicrotime() - $time_start);
// $obLog->Write("Конец импорта текстов" . $t);
//$obLog->Write("END");

//echo "<pre>";print_r($arText);echo "</pre>";
//$el = new CIBlockElement; 
/*
foreach($arText as $PRODUCT_ID => $value):
	
	$arLoadProductArray = Array(
		//"PREVIEW_TEXT"   => $value['PREVIEW_TEXT'],
		//"DETAIL_TEXT"    => $value['DETAIL_TEXT'],  
		"PREVIEW_TEXT_TYPE" =>"html",
		"DETAIL_TEXT_TYPE" =>"html",
		"PREVIEW_TEXT" => $value['PREVIEW_TEXT'], 
		"DETAIL_TEXT" => $value['DETAIL_TEXT'],
	);
	
	
	$res = $el->Update($PRODUCT_ID, $arLoadProductArray);
	//echo "+.<br>";

endforeach;
*/
//end element



/*
//section
$arFilter = Array(
	"IBLOCK_ID" => 6,	
	//"SECTION_ID" => 20006
	);
$arSelect = Array(
	//"ID",	
	//"PROPERTY_ARTICLE_SYMBOL",
	//"PROPERTY_CML2_ARTICLE",
	//"PREVIEW_TEXT",
	"CODE",
	"DESCRIPTION"
	);

$db_list = CIBlockSection::GetList(Array(), $arFilter, false, $arSelect);
$arOld = array();
while($ob = $db_list->Fetch())
{
	//$arOld['CODE'][] = $ob["CODE"];
	//$arOld['DESCRIPTION'][] = $ob["DESCRIPTION"];
	$arOld[$ob['CODE']] = $ob["DESCRIPTION"];
}

$arFilter = Array(
	"IBLOCK_ID" => 52,	
	);
$arSelect = Array(
	"ID",	
	//"PROPERTY_ARTICLE_SYMBOL",
	//"PROPERTY_CML2_ARTICLE",
	//"PREVIEW_TEXT",
	"CODE",	
	);

$db_list1 = CIBlockSection::GetList(Array(), $arFilter, false, $arSelect);
$arNew = array();
while($ob = $db_list1->Fetch())
{
	//$arNew['ID'][] = $ob['ID'];
	//$arNew['CODE'][] = $ob['CODE'];	
	$arNew[$ob['ID']] = $ob['CODE'];
}

foreach($arOld as $code => $desc):
	if($id = array_search($code,$arNew))
	{			
		$arText[$id] = $desc;		
	}
endforeach;


$bs = new CIBlockSection;
foreach($arText as $PRODUCT_ID => $value):
	
	$arLoadProductArray = Array(
		"DESCRIPTION"   => $value,		
	);
	
	if($res = $bs->Update($PRODUCT_ID, $value))
	{echo "+.<br>";}
endforeach;
//end section
*/

 // Существование ссылки (URL)
function open_url($url)
{
 $url_c=parse_url($url);
 
  if (!empty($url_c['host']) and checkdnsrr($url_c['host'], "A"))
  {
	  
    // Ответ сервера
    if ($otvet=@get_headers($url)){
      return substr($otvet[0], 9, 3);
    }
  }
  return false;     
}

// Класс лога
class CCustomLog{
	
	var $logFile; // log file
	
	function __construct($fileSrc=false){
		
		if($fileSrc)
			$this->logFile = $fileSrc;
		else
			$this->logFile = $_SERVER["DOCUMENT_ROOT"] . '/tools/import_'.date("d_m_y").'_images.log';
		
	}

	// Запись в лог
	function Write($message)
	{
		if($this->logFile){
			$file = fopen($this->logFile, 'a');
		
			// write to file
				
			if(is_array($message) || is_object($message))
				$message = "\n" . print_r($message,true);
		
			fwrite($file, date("d.m.Y H:i:s") . " " .  $message . "\n");
			
			fclose($file);
			
			return true;
		}
		
	}
	
}

function getmicrotime1() 
{ 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
}

?>