<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");
if($_COOKIE["town"])
    $town = $_COOKIE["town"];
else
    $town = 28205;

/*$res = CIBlockElement::GetList(array(),array("IBLOCK_ID"=>53, "ID"=>"1393606"), false, false, array("ID", "NAME", "PROPERTY_KATEGORIYA_1","PROPERTY_KATEGORIYA_2", "PROPERTY_SROK_POSTAVKI"));
if($ob = $res->GetNext()){
    if($ob["PROPERTY_KATEGORIYA_1_VALUE"] == "S" && $ob["PROPERTY_KATEGORIYA_2_VALUE"]!=""){
        switch($ob["PROPERTY_KATEGORIYA_2_VALUE"]){
            case '+': $base_time = 56; break; // 8 недель
            case 'X': $base_time = 84; break; // 12 недель
            default: $base_time = $ob["PROPERTY_KATEGORIYA_2_VALUE"]*7; break;
        }
    }
    else if($ob["PROPERTY_KATEGORIYA_1_VALUE"] == "R"){
        $base_time = 84;
    }
    else{
        $base_time = $ob["PROPERTY_SROK_POSTAVKI_VALUE"];
    }
}*/

// $_POST["C1"] - S | R 
// $_POST["C2"] - 0-8 | + | X
// $_POST["SP"]
if($_POST["C1"] == "S" && $_POST["C2"]!=""){
    switch($_POST["C2"]){
        case '+': $base_time = 56; break; // 8 недель
        case 'X': $base_time = 84; break; // 12 недель
        case 0: $base_time = 7; break; // 12 недель
        default: $base_time = $_POST["C2"]*7; break;
    }
}
else if($_POST["C1"] == "R"){
    $base_time = 84;
}
else{
    $base_time = $_POST["SP"];
}

$town_time  = array(
    "28205" => array(  // Москва
        "1" => "1",
        "2" => "1",
        "3" => "1",
        "4" => "1",
        "5" => "1",
        "6" => "1",
        "0" => "1",
    ),
    "28214" => array(  // Щелково
        "1" => "1",
        "2" => "1",
        "3" => "1",
        "4" => "1",
        "5" => "1",
        "6" => "1",
        "0" => "1",
    ),
    "45133" => array(  // Дмитров
        "1" => "1",
        "2" => "1",
        "3" => "1",
        "4" => "1",
        "5" => "1",
        "6" => "1",
        "0" => "1",
    ),
    "28209" => array(  // Екатеринбург
        "1" => "6",
        "2" => "9",
        "3" => "8",
        "4" => "7",
        "5" => "9",
        "6" => "8",
        "0" => "7",
    ),
    "28208" => array(  // Санкт-Петербург
        "1" => "6",
        "2" => "5",
        "3" => "4",
        "4" => "7",
        "5" => "6",
        "6" => "8",
        "0" => "7",
    ),
    "28210" => array(  // Новосибирск
        "1" => "12",
        "2" => "11",
        "3" => "10",
        "4" => "9",
        "5" => "15",
        "6" => "14",
        "0" => "13",
    ),
    "28211" => array(  // Ростов
        "1" => "5",
        "2" => "8",
        "3" => "7",
        "4" => "6",
        "5" => "8",
        "6" => "7",
        "0" => "6",
    ),
    "28213" => array(  // Пушкино
        "1" => "1",
        "2" => "1",
        "3" => "1",
        "4" => "1",
        "5" => "1",
        "6" => "1",
        "0" => "1",
    ),
    "33185" => array(  // Сергиев Посад
        "1" => "1",
        "2" => "1",
        "3" => "1",
        "4" => "1",
        "5" => "1",
        "6" => "1",
        "0" => "1",
    ),
    "35155" => array(  // Электросталь
        "1" => "1",
        "2" => "1",
        "3" => "1",
        "4" => "1",
        "5" => "1",
        "6" => "1",
        "0" => "1",
    ),
);
$dayW = date('w');
$dop_time = $town_time[$town][$dayW]; // перемещение на склад филиала
$full_time = $base_time + $dop_time + 2; // +2 дня - оприходование товара на складе 
$res_date = date('d-m-Y', strtotime("+".$full_time." day"));
echo $res_date;

?>