<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
$name = htmlspecialchars($_REQUEST["name"]);
$name = iconv("UTF-8", "Windows-1251", $name);
$phone = htmlspecialchars($_REQUEST["phone"]);
$mail = htmlspecialchars($_REQUEST["mail"]);
$cur_step = htmlspecialchars($_REQUEST["cur_step"]);

 $order = array('sort' => 'asc');
    $tmp = 'sort'; // �������� ��������������� �������, �� ������ ����
    $rsUser = CUser::GetList($order, $tmp,array("EMAIL" => $UserMail),array());
   if($arUser = $rsUser->Fetch())                                                
{
	       
	    $arGroupAvalaible = array(1,6,8,3,15,42,35,44,38,43,39,36,40,37,27); // ������ �����, ������� � ������� ����� ��������� ����������� ������������
	    $arGroups = CUser::GetUserGroup($arUser["ID"]); // ������ �����, � ������� ������� ������������
	    $result_intersect = array_intersect($arGroupAvalaible, $arGroups);// ����� ���������, ���� ������������ ����� ���� �� � ���� �� �����, �� ��������� ��� ���-���� ������
	    if(!empty($result_intersect)){
	        header('HTTP/1.1 301 Moved Permanently');
	        header('Location: /personal/order.php?error=auth');
	    }
	    else{
	        $fields = Array(
	            "PERSONAL_PHONE" => $phone,
	            "NAME" => $name,
	        );
	        //$USER->Update($arUser["ID"], $fields);
	        //$USER->Authorize($arUser["ID"]);   
	  
    } 
} else {
	echo '������������ � ������� "'.$mail.'" �� ������!';
}  ?> 