<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
CModule::IncludeModule("form");

header('Content-type: application/json');

$errors = "";

if (!check_bitrix_sessid()) $errors .= "�������� ������ �������. ���������� ��������� ����� ��� ���.";
else
{
	// ID ���-�����
	$FORM_ID = intval($_POST["WEB_FORM_ID"]);
	
	$arValues = array (
		"form_text_1149"		=> utf8win1251(htmlspecialchars($_POST["form_text_1149"])), // ���
		"form_text_1150"        => htmlspecialchars($_POST["form_text_1150"]), // �������
		"form_email_1151"       => htmlspecialchars($_POST["form_email_1151"]),	// Email
		"form_textarea_1152"        => utf8win1251(htmlspecialchars($_POST["form_textarea_1152"])),	// ���������
		"form_dropdown_shop"	=> htmlspecialchars($_POST["form_dropdown_shop"]), // �������
		"form_text_1162"        => utf8win1251(htmlspecialchars($_POST["form_text_1162"])), // ����
	);
	
	// ����
	if (count($_FILES) > 0)
	{
		foreach($_FILES as $fieldName => $file)
		{
			$uploaddir = $_SERVER["DOCUMENT_ROOT"] . "/upload/";
			
			$ext = getExtension1(basename($file['name']));
			$file_path_new = $uploaddir . str2url(utf8win1251(basename($file['name']))) . "." . $ext;
			
			
			if( move_uploaded_file( $file['tmp_name'], $file_path_new ) ){
				$arFile = CFile::MakeFileArray($file_path_new);
				
				if ($arFile["size"] > 5 * 1024 * 1024) $errors .= "������ ����� ��������� 5 ��.<br/>";
				else $arValues[$fieldName] = $arFile;
			}
		}
	}
	
	if (mb_strlen($errors) <= 0) {
		// �������� ����� ���������
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
        '�' => 'a',   '�' => 'b',   '�' => 'v',
        '�' => 'g',   '�' => 'd',   '�' => 'e',
        '�' => 'e',   '�' => 'zh',  '�' => 'z',
        '�' => 'i',   '�' => 'y',   '�' => 'k',
        '�' => 'l',   '�' => 'm',   '�' => 'n',
        '�' => 'o',   '�' => 'p',   '�' => 'r',
        '�' => 's',   '�' => 't',   '�' => 'u',
        '�' => 'f',   '�' => 'h',   '�' => 'c',
        '�' => 'ch',  '�' => 'sh',  '�' => 'sch',
        '�' => '\'',  '�' => 'y',   '�' => '\'',
        '�' => 'e',   '�' => 'yu',  '�' => 'ya',
        
        '�' => 'A',   '�' => 'B',   '�' => 'V',
        '�' => 'G',   '�' => 'D',   '�' => 'E',
        '�' => 'E',   '�' => 'Zh',  '�' => 'Z',
        '�' => 'I',   '�' => 'Y',   '�' => 'K',
        '�' => 'L',   '�' => 'M',   '�' => 'N',
        '�' => 'O',   '�' => 'P',   '�' => 'R',
        '�' => 'S',   '�' => 'T',   '�' => 'U',
        '�' => 'F',   '�' => 'H',   '�' => 'C',
        '�' => 'Ch',  '�' => 'Sh',  '�' => 'Sch',
        '�' => '\'',  '�' => 'Y',   '�' => '\'',
        '�' => 'E',   '�' => 'Yu',  '�' => 'Ya',
    );
    return strtr($string, $converter);
}
function str2url($str) {
    // ��������� � ��������
    $str = rus2translit($str);
    // � ������ �������
    $str = strtolower($str);
    // ������� ��� �������� ��� �� "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '_', $str);
    // ������� ��������� � �������� '-'
    $str = trim($str, "_");
    return $str;
}

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');
?>