<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
CModule::IncludeModule("form");

header('Content-type: application/json');

$errors = "";

if (!check_bitrix_sessid()) $errors .= "Параметр сессии неверен. Попробуйте отправить форму еще раз.";
else
{
	// ID веб-формы
	$FORM_ID = intval($_POST["WEB_FORM_ID"]);
	
	$arValues = array (
		"form_text_1149"		=> utf8win1251(htmlspecialchars($_POST["form_text_1149"])), // Имя
		"form_text_1150"        => htmlspecialchars($_POST["form_text_1150"]), // Телефон
		"form_email_1151"       => htmlspecialchars($_POST["form_email_1151"]),	// Email
		"form_textarea_1152"        => utf8win1251(htmlspecialchars($_POST["form_textarea_1152"])),	// Сообщение
		"form_dropdown_shop"	=> htmlspecialchars($_POST["form_dropdown_shop"]), // Магазин
		"form_text_1162"        => utf8win1251(htmlspecialchars($_POST["form_text_1162"])), // Тема
	);
	
	// Файл
	if (count($_FILES) > 0)
	{
		foreach($_FILES as $fieldName => $file)
		{
			$uploaddir = $_SERVER["DOCUMENT_ROOT"] . "/upload/";
			
			$ext = getExtension1(basename($file['name']));
			$file_path_new = $uploaddir . str2url(utf8win1251(basename($file['name']))) . "." . $ext;
			
			
			if( move_uploaded_file( $file['tmp_name'], $file_path_new ) ){
				$arFile = CFile::MakeFileArray($file_path_new);
				
				if ($arFile["size"] > 5 * 1024 * 1024) $errors .= "Размер файла превышает 5 мб.<br/>";
				else $arValues[$fieldName] = $arFile;
			}
		}
	}
	
	if (mb_strlen($errors) <= 0) {
		// создадим новый результат
		if (!$RESULT_ID = CFormResult::Add($FORM_ID, $arValues))
		{
			global $strError;
			$errors .= $strError . "<br />";
		}
		else
		{
			$arEventFields = array(
				"LINK" => "https://" . SITE_SERVER_NAME . "/bitrix/admin/form_result_edit.php?lang=ru&WEB_FORM_ID=". $FORM_ID . "&RESULT_ID=". $RESULT_ID . "&WEB_FORM_NAME=SHOP_REQUEST"
			);
			CEvent::Send("SHOP_NEW_REQUEST", "s1", $arEventFields);
		}
	}
}

	
if (mb_strlen($errors) > 0) {
	echo \Bitrix\Main\Web\Json::encode(array(
		'type' => 'error',
		'message' => $errors,
	));
} else {
	echo \Bitrix\Main\Web\Json::encode(array('type' => 'ok ' . $errors));
}

function getExtension1($filename) {
	return end(explode(".", $filename));
}

function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}
function str2url($str) {
    // переводим в транслит
    $str = rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '_', $str);
    // удаляем начальные и конечные '-'
    $str = trim($str, "_");
    return $str;
}

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');
?>