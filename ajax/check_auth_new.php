<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
$name = htmlspecialchars($_REQUEST["name"]);
$name = iconv("UTF-8", "Windows-1251", $name);
$phone = htmlspecialchars($_REQUEST["phone"]);
$mail = htmlspecialchars($_REQUEST["mail"]);
$cur_step = htmlspecialchars($_REQUEST["cur_step"]);
?>
<?
if(/*$_SERVER['REMOTE_ADDR'] == "178.219.245.154" || $_SERVER['REMOTE_ADDR'] == "178.219.244.172"*/false){
 // - ����� �� ���� ���� � ���������� sale.order.full.tezart.new 
 //- ���� ������������ � ����� ������� ���������� (�������� � ���� �����)
 //- �� ��������� ��� ID � ����� (� ������  ... ���������� ...) �������� �� ���� �����
 //- � �������� ������������ �������������� ��� ������ ��������� �������  (� ���� �����)
 //- ������ � ������ ���������� �� ����� ���������� ������������   (������� ... ���������� ..)
 //- ������� ���������� ������������  ������� (������ ... ���������� ... )
 
    $order = array('sort' => 'asc');
    $tmp = 'sort'; // �������� ��������������� �������, �� ������ ����      
    $rsUser = CUser::GetList($order, $tmp,array("EMAIL" => $mail),array());
    if($arUser = $rsUser->Fetch()) //- ���� ������������ � ����� ������� ����������, �� ��������� ��� ID, � �������� ������������ �������������� ��� ������ ��������� ������� 
    {         
    $_SESSION['USER_SPONSOR_ID'] = $arUser["ID"]; //- ���������� ID ������� � ������ ����� ����� ������� �� ����  ����� ��������� �������������
    $obUser = new CUser;              //- ������� � ������������ ������ ������������, ������ � ���������� ����� �� ��������, �� �� ������ �������������� ��� ������� �������
    
    $userPassw = 'elevel-forever';
    $arFields = Array(
         "EMAIL"          => 'temp_'.time().'_'.$mail,
         "LOGIN"          => $name,
         "NAME"           => $name,
         "PERSONAL_PHONE" => $phone,
         "LID"            => SITE_ID,
         "ACTIVE"         => "Y",
         "PASSWORD"       => $userPassw,
         "CONFIRM_PASSWORD"  => $userPassw
    );   
      $userID = $obUser->Add($arFields);  
      $USER->Authorize($userID);         
    }            	 
 } else {
    $order = array('sort' => 'asc');
    $tmp = 'sort'; // �������� ��������������� �������, �� ������ ����
    $rsUser = CUser::GetList($order, $tmp,array("EMAIL" => $UserMail),array());
    if($arUser = $rsUser->Fetch())
    {
        $arGroupAvalaible = array(1,6,8,3,15,42,35,44,38,43,39,36,40,37, 27); // ������ �����, � ������� ����� ��������� ����������� ������������
        $arGroups = CUser::GetUserGroup($arUser["ID"]); // ������ �����, � ������� ������� ������������
        $result_intersect = array_intersect($arGroupAvalaible, $arGroups);// ����� ���������, ���� ������������ ����� ���� �� � ���� �� �����, �� ��������� ��� ���-���� ������
        if(!empty($result_intersect)){
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: /personal/order.php?error=auth');
        }
        else{
            $fields = Array(
                "PERSONAL_PHONE" => $phone,
                "NAME" => $UserName,
            );
            //$USER->Update($arUser["ID"], $fields);
           // $USER->Authorize($arUser["ID"]);   
        }
    } else {
	    echo '������������ � ������� "'.$mail.'" �� ������!';
	}   
}   


?>
