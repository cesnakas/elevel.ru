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
 // - такой же блок есть в компоненте sale.order.full.tezart.new 
 //- если пользователь с таким эмейлом существует (проверка в этом файле)
 //- то запомнить его ID и потом (в строке  ... компонента ...) записать на него заказ
 //- а текущего пользовател€ авторизировать под другим временным эмейлом  (в этом файле)
 //- письмо о заказе отправл€ть на емейл насто€щего пользовател€   (сторока ... компонента ..)
 //- профиль пременного пользовател€  удалить (строка ... компонента ... )
 
    $order = array('sort' => 'asc');
    $tmp = 'sort'; // параметр проигнорируетс€ методом, но об€зан быть      
    $rsUser = CUser::GetList($order, $tmp,array("EMAIL" => $mail),array());
    if($arUser = $rsUser->Fetch()) //- если пользователь с таким эмейлом существует, то запомнить его ID, а текущего пользовател€ авторизировать под другим временным эмейлом 
    {         
    $_SESSION['USER_SPONSOR_ID'] = $arUser["ID"]; //- запоминаем ID спосора в сессию чтобы потом бросить на него  заказ созданный прихлебателем
    $obUser = new CUser;              //- создаем и авторизируем нового пользовател€, которы й сформирует заказ на спонсора, но не сможет воспользоватс€ его учетной записью
    
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
    $tmp = 'sort'; // параметр проигнорируетс€ методом, но об€зан быть
    $rsUser = CUser::GetList($order, $tmp,array("EMAIL" => $UserMail),array());
    if($arUser = $rsUser->Fetch())
    {
        $arGroupAvalaible = array(1,6,8,3,15,42,35,44,38,43,39,36,40,37, 27); // массив групп, в которых нужно проверить доступность пользовател€
        $arGroups = CUser::GetUserGroup($arUser["ID"]); // массив групп, в которых состоит пользователь
        $result_intersect = array_intersect($arGroupAvalaible, $arGroups);// далее провер€ем, если пользователь вошЄл хот€ бы в одну из групп, то позвол€ем ему что-либо делать
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
	    echo 'ѕользователь с логином "'.$mail.'" не найден!';
	}   
}   


?>
