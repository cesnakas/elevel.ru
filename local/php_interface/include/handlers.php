<?
use Bitrix\Main\Diag;

if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true)die();

#
# События и обработчики
#

AddEventHandler("main", "OnAfterUserRegister", "OnAfterUserRegisterNew");
AddEventHandler("main", "OnAfterUserAdd", "OnAfterUserRegisterNew");
AddEventHandler('sale', 'OnSaleComponentOrderOneStepComplete', 'Subscrible');

function OnAfterUserRegisterNew(&$arFields)
{
    if (intval($arFields["ID"])>0)
    {
        $toSend = Array();
        $toSend["PASSWORD"] = $arFields["CONFIRM_PASSWORD"];
        $toSend["EMAIL"] = $arFields["EMAIL"];
        $toSend["USER_ID"] = $arFields["ID"];
        $toSend["USER_IP"] = $arFields["USER_IP"];
        $toSend["USER_HOST"] = $arFields["USER_HOST"];
        $toSend["LOGIN"] = $arFields["LOGIN"];
        $toSend["NAME"] = (trim ($arFields["NAME"]) == "")? $toSend["NAME"] = htmlspecialchars('<Не указано>'): $arFields["NAME"];
        $toSend["LAST_NAME"] = (trim ($arFields["LAST_NAME"]) == "")? $toSend["LAST_NAME"] = htmlspecialchars('<Не указано>'): $arFields["LAST_NAME"];
        CEvent::SendImmediate ("MY_NEW_USER", SITE_ID, $toSend);
    }
    return $arFields;
}

function Subscrible($ID, &$arFields)
{

    // если выбран "Электромонтажник, инсталлятор"
    if($_REQUEST['ORDER_PROP_35'] == '5') {
        // берем е-мейл с формы        
        $EMAIL =  $_REQUEST['ORDER_PROP_19'];
        $USER = $arFields['USER_ID'];
        // получим все активные рубрики 
        CModule::IncludeModule("subscribe");
        $RUB_ID = array();
        $rsRubric = CRubric::GetList(array(), array("ACTIVE" => "Y"));
        while($arRubric = $rsRubric->GetNext()) {
            $RUB_ID[] = $arRubric['ID'];
        }
        /* создадим массив на подписку */
        $subscr = new CSubscription;
        $arFields = Array(
            "USER_ID" => $USER,
            "FORMAT" => "html/text",
            "EMAIL" => $EMAIL,
            "ACTIVE" => "Y",
            "RUB_ID" => $RUB_ID,
            "SEND_CONFIRM" => "N",
            "CONFIRMED" => "Y"
        );
        $idsubrscr = $subscr->Add($arFields, SITE_ID);
    }

}

function create_watermark($image, $watermark)
{
    // ширина и высота водяного знака
    $width = imagesx($watermark);
    $height = imagesy($watermark);
    $coef = $width/$height;

    // водяной знак будет по центру если он меньше картинки
    if(intval($width) < intval(imagesx($image)) || intval($height) < intval(imagesy($image))) {
        $dest_x = 0;
        $dest_y = 0;
        $new_height = intval(imagesy($image));
        $new_width  = intval(imagesx($image));
        //маштабируем и выравниваем по ширине (помещаем на центр по ширине)
        if(intval($width) < intval(imagesx($image)) && intval($height) > intval(imagesy($image)) ) {
            $new_width = $coef * intval(imagesy($image));
            $dest_x = 0.5*(intval(imagesx($image)) - $new_width);
        }

        //маштабируем и выравниваем по высоте (помещаем на центр по высоте)
        if(intval($height) < intval(imagesy($image)) && intval($width) > intval(imagesx($image)))    {
            $new_height = (1/$coef) * intval(imagesx($image));
            $dest_y = 0.5*(intval(imagesy($image)) - $new_height);
        }
        //выравниваем по ширине и высоте (помещаем на центр по ширине и высоте)
        if(intval($height) < intval(imagesy($image)) && intval($width) < intval(imagesx($image)))    {
            $new_height = $height;
            $new_width = $width;
            $dest_x = 0.5*(intval(imagesx($image)) - $new_width);
            $dest_y = 0.5*(intval(imagesy($image)) - $new_height);
        }


        imagecopyresampled($image, $watermark, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $width, $height);
    }
    else {
        //или заполнит всю картинку, если больше неё
        imagecopyresampled($image, $watermark, 0, 0, 0, 0, intval(imagesx($image)), intval(imagesy($image)), $width, $height);
    }

    return $image;
}




AddEventHandler("form", "onBeforeResultAdd", "onServiceProjectAdd");
function onServiceProjectAdd($WEB_FORM_ID, $arFields, $arrVALUES){
    $forms = array(1, 3, 4, 5, 7, 8, 10, 11, 12, 13, 14, 18, 21, 24, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 58, 59, 60, 61, 62, 65, 66, 68, 69, 71, 72, 73, 74, 75, 76, 77, 78, 79);   //forms id's for check spam
    if(in_array($WEB_FORM_ID, $forms)){ 
        foreach($arrVALUES as $val){
            if(preg_match('/<.+>/', $val)){
                global $APPLICATION;
                die('SPAM!');    
            }  
        }                               

    }             
}

AddEventHandler("iblock", "OnAfterIBlockElementAdd",    Array("MyClass", "OnAfterIBlockElementAddHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("MyClass", "OnAfterIBlockElementAddHandler"));
//AddEventHandler("iblock", "OnBeforeIBlockElementAdd",    Array("MyClass", "OnBeforeIBlockElementAddHandler"));
//AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("MyClass", "OnBeforeIBlockElementAddHandler"));
// AddEventHandler( 'iblock', 'OnAfterIBlockElementSetPropertyValuesEx', Array("MyClass", 'OnAfterIBlockElementSetPropertyValuesExHandler') );
// AddEventHandler( 'iblock', 'OnAfterIBlockElementSetPropertyValues', Array("MyClass", 'OnAfterIBlockElementSetPropertyValuesHandler') );

class MyClass
{
    // function OnAfterIBlockElementSetPropertyValuesExHandler($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUES, $FLAGS){

    // if($IBLOCK_ID){

    // }
    // }
    // function OnAfterIBlockElementSetPropertyValuesHandler($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUES, $PROPERTY_CODE){

    // }

    public function PutWaterMark($sOriginalFileName, $sWaterMarkFileName, $sOutputFileName)
    {
        if(!extension_loaded('gd'))
        {
            return false;
        }

        // Получаем дескриптор исходного изображения
        $arOriginalFile = getimagesize($sOriginalFileName);
        switch($arOriginalFile['mime'])
        {
            case 'image/png':
                $rOriginalFile = imagecreatefrompng($sOriginalFileName);
                break;
            case 'image/jpeg':
                $rOriginalFile = imagecreatefromjpeg($sOriginalFileName);
                break;
        }

        // Определяем размеры исходного изображения
        $arOriginalFileSize = Array(
            'WIDTH' => $arOriginalFile[0],
            'HEIGHT' => $arOriginalFile[1]
        );

        // Получаем дескриптор изображения водяного знака
        $arWaterMarkFile = getimagesize($sWaterMarkFileName);
        switch($arWaterMarkFile['mime'])
        {
            case 'image/png':
                $rWaterMarkFile = imagecreatefrompng($sWaterMarkFileName);
                break;
            case 'image/jpeg':
                $rWaterMarkFile = imagecreatefromjpeg($sWaterMarkFileName);
                break;
        }

        // Определяем размеры изображения водяного знака
        $arWaterMarkFileSize = Array(
            'WIDTH' => $arWaterMarkFile[0],
            'HEIGHT' => $arWaterMarkFile[1]
        );

        // Масштабируем водяной знак
        $fWidthCoeff = 1.0;
        $fHeightCoeff = 1.0;
        if($arOriginalFileSize['WIDTH'] != $arWaterMarkFileSize['WIDTH'])
        {
            $fWidthCoeff = floatval($arOriginalFileSize['WIDTH'])/$arWaterMarkFileSize['WIDTH'];
        }

        if($arOriginalFileSize['HEIGHT'] != $arWaterMarkFileSize['HEIGHT'])
        {
            $fHeightCoeff = floatval($arOriginalFileSize['HEIGHT'])/$arWaterMarkFileSize['HEIGHT'];
        }

        $arWaterMarkFileReSize = Array();

        if($fWidthCoeff != $fHeightCoeff)
        {
            if($fWidthCoeff > $fHeightCoeff)
            {
                $arWaterMarkFileReSize['WIDTH'] = intval($arWaterMarkFileSize['WIDTH']*$fHeightCoeff);
                $arWaterMarkFileReSize['HEIGHT'] = intval($arWaterMarkFileSize['HEIGHT']*$fHeightCoeff);
            }
            else
            {
                $arWaterMarkFileReSize['WIDTH'] = intval($arWaterMarkFileSize['WIDTH']*$fWidthCoeff);
                $arWaterMarkFileReSize['HEIGHT'] = intval($arWaterMarkFileSize['HEIGHT']*$fWidthCoeff);
            }
        }
        else
        {
            if(($fWidthCoeff > 0) && ($fWidthCoeff != 1.0))
            {
                $arWaterMarkFileReSize['WIDTH'] = intval($arWaterMarkFileSize['WIDTH']*$fWidthCoeff);
                $arWaterMarkFileReSize['HEIGHT'] = intval($arWaterMarkFileSize['HEIGHT']*$fWidthCoeff);
            }
        }

        // Выполняем позиционирование водяного знака
        $iOriginalFileX = 0;
        $iOriginalFileY = 0;

        if($arOriginalFileSize['WIDTH'] > $arWaterMarkFileReSize['WIDTH'])
        {
            $iOriginalFileX = intval(($arOriginalFileSize['WIDTH'] - $arWaterMarkFileReSize['WIDTH'])/2);
        }

        if($arOriginalFileSize['HEIGHT'] > $arWaterMarkFileReSize['HEIGHT'])
        {
            $iOriginalFileY = intval(($arOriginalFileSize['HEIGHT'] - $arWaterMarkFileReSize['HEIGHT'])/2);
        }

        // "Наносим" водяной знак на исходное изображение
        $iResult = imagecopyresized(
            $rOriginalFile,
            $rWaterMarkFile,
            $iOriginalFileX,
            $iOriginalFileY,
            0,
            0,
            $arWaterMarkFileReSize['WIDTH'],
            $arWaterMarkFileReSize['HEIGHT'],
            $arWaterMarkFileSize['WIDTH'],
            $arWaterMarkFileSize['HEIGHT']
        );

        if($iResult !== false)
        {
            $arOriginalFile = getimagesize($sOriginalFileName);
            switch($arOriginalFile['mime'])
            {
                case 'image/png':
                    imagepng($rOriginalFile, $sOutputFileName);
                    break;
                case 'image/jpeg':
                    imagejpeg($rOriginalFile, $sOutputFileName);
                    break;
            }
        }

        imagedestroy($rOriginalFile);
        imagedestroy($rWaterMark);

        return ($iResult !== false);
    }

    function OnAfterIBlockElementAddHandler(&$arFields)
    {
        if($arFields['IBLOCK_ID'] == 13)
        {
            global $USER, $APPLICATION;
            echo $arFields;
            $fd1 = fopen($_SERVER['DOCUMENT_ROOT'] . '/F2Log', 'w');
            ob_start();
            print_r($arFields);
            fwrite($fd1, ob_get_contents());
            ob_end_clean();
            fclose($fd1);

            $watermark = imagecreatefrompng($_SERVER["DOCUMENT_ROOT"].'/watermark.png');

            foreach($arFields['PROPERTY_VALUES'][96] as $key=>$value)
            {
                //$url = CFile::GetPath($ar["VALUE"]);
                $path = $_SERVER["DOCUMENT_ROOT"].$value;
                if(file_exists($path))
                {
                    //print_r($ar);
                    $extention = getimagesize($path);
                    //print_r($extention);
                    switch($extention[2]) {
                        case 2  : $image = imagecreatefromjpeg($path);     break;
                        case 1     : $image = imagecreatefromgif($path);     break;
                        case 3     : $image = imagecreatefrompng($path);    break;
                    }
                    $image = imagecreatefromjpeg($path);

                    $image_watermark = create_watermark($image, $watermark);

                    //header('Content-Type: image/jpeg');
                    switch($extention[2]) {
                        case 2  : imagejpeg($image_watermark, $path);     break;
                        case 1     : imagegif($image_watermark, $path);     break;
                        case 3     : imagepng($image_watermark, $path);    break;
                    }
                    //imagejpeg($image_watermark, $path);
                }
            }
        }
        elseif($arFields['IBLOCK_CODE'] == 'new_catalog')
        {
            // Нанесение водяного знака
            if(
            (isset($arFields['PREVIEW_PICTURE']) && is_array($arFields['PREVIEW_PICTURE']) && !isset($arFields['PREVIEW_PICTURE']['del'])) ||
            (isset($arFields['DETAIL_PICTURE']) && is_array($arFields['DETAIL_PICTURE']) && !isset($arFields['DETAIL_PICTURE']['del'])) &&
            CModule::IncludeModule('iblock')
            )
            {
                $arSelectFields = Array();
                if(isset($arFields['PREVIEW_PICTURE']))
                {
                    $arSelectFields[] = 'PREVIEW_PICTURE';
                }
                if(isset($arFields['DETAIL_PICTURE']))
                {
                    $arSelectFields[] = 'DETAIL_PICTURE';
                }
                $dbElement = CIBlockElement::GetList(
                    Array(),
                    Array(
                        'IBLOCK_ID' => $arFields['IBLOCK_ID'],
                        'ID' => $arFields['ID']
                    ),
                    false,
                    Array('nTopCount' => 1),
                    $arSelectFields
                );
                if($arElement = $dbElement->Fetch())
                {
                    if(isset($arElement['PREVIEW_PICTURE']))
                    {
                        $sFileName = $_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arElement['PREVIEW_PICTURE']);
                        // Наносим водяной знак
                        $bResult = self::PutWaterMark(
                            $sFileName,
                            //$_SERVER['DOCUMENT_ROOT'].'/images/watermark.png',
                            $_SERVER['DOCUMENT_ROOT'].'/images/wtm.png',
                            $sFileName
                        );
                    }
                    if(isset($arElement['DETAIL_PICTURE']))
                    {
                        $sFileName = $_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arElement['DETAIL_PICTURE']);
                        // Наносим водяной знак
                        $bResult = self::PutWaterMark(
                            $sFileName,
                            //$_SERVER['DOCUMENT_ROOT'].'/images/watermark.png',
                            $_SERVER['DOCUMENT_ROOT'].'/images/wtm.png',
                            $sFileName
                        );
                    }
                }
            }
        }
        // Set product field
        elseif($arFields['IBLOCK_ID'] == CATALOG_ID){

            // Get items 
            $arSelect = Array(
                "ID", 
                "NAME", 
                "PROPERTY_PRODUCER",
                "PROPERTY_PRODUCER_S",
            );
            $arFilter = Array(
                "IBLOCK_ID" => $arFields['IBLOCK_ID'], 
                "ID" => $arFields['ID'], 
                "!PROPERTY_PRODUCER" => false, 
            );
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

            if($arItem = $res->GetNext())
            {
                // get producer
                if(intval($arItem['PROPERTY_PRODUCER_VALUE']) > 0){

                    $arFilter = Array(
                        'IBLOCK_ID' => IBLOCK_BRAND_ID, 
                        'ID' => $arItem['PROPERTY_PRODUCER_VALUE'], 
                    );
                    $rsSection = CIBlockSection::GetList(Array($by=>$order), $arFilter, false, array('ID', 'NAME'));
                    if($arProducer = $rsSection->GetNext())
                    {

                        // set value to new property
                        CIBlockElement::SetPropertyValuesEx($arItem['ID'], false, array('PRODUCER_S' => $arProducer['NAME']));

                    }

                }

            }

        }
    }
    /*function OnBeforeIBlockElementAddHandler(&$arFields){

    //задача 24526
    if($arFields['IBLOCK_ID'] == 83)//Для E-way товаров
    {
    foreach($arFields['PROPERTY_VALUES'][15377] as $val){
    $article=strtolower($val["VALUE"]);
    }
    $article=preg_replace("#[^a-zA-Z0-9-_\-]*#is","",$article);
    //артикул
    if($article!="" && $article!=$arFields['CODE']){
    $arFields["CODE"]=$article;
    }

    }
    if($arFields["IBLOCK_CODE"] == 'new_catalog'){
    $arTransParams = array(
    "max_len" => 100,
    "change_case" => 'L', // 'L' - toLower, 'U' - toUpper, false - do not change
    "replace_space" => '-',
    "replace_other" => '-',
    "delete_repeat_replace" => true
    );
    $transName = CUtil::translit($arFields["NAME"], "ru", $arTransParams);
    $arFields["CODE"] = $transName;
    }
    }*/
}

AddEventHandler( 'sale', 'OnBeforeBasketAdd', 'tezOnBeforeBasketAdd' );

//обработчик добавления товаров в корзину для исключения попкупки товаров распродажи, превышающих фактический остаток 
function tezOnBeforeBasketAdd( &$aFields ) { 
    //echo '<pre>'; print_r($aFields); echo '</pre>';
    //получаем свойство товара, проверяем, относится ли он к распродаже
    CModule::IncludeModule('iblock');
    CModule::IncludeModule('catalog');
    $arSelect = Array("ID", "NAME");
    $arFilter = Array("ID" => $aFields["PRODUCT_ID"], array("LOGIC" => "OR", array("PROPERTY_SALE_VALUE" => 1), array("SECTION_ID" => SALE_SECTION_ID)), "INCLUDE_SUBSECTIONS" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    if($ob = $res->Fetch()){   //товар в разделе распродаж
        $arProduct = CCatalogProduct::GetByID($aFields["PRODUCT_ID"]); //в наличии 
        //echo '<pre>'; print_r($arProduct); echo '</pre>';
        //проверяем, сколько уже есть в корзине товаров
        $dbBasketItems = CSaleBasket::GetList(
            array("ID" => "ASC"),
            array(
                "FUSER_ID" => $aFields["FUSER_ID"],
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL",
                "PRODUCT_ID" => $aFields["PRODUCT_ID"]
            ),
            false,
            false,
            array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "PRODUCT_PROVIDER_CLASS")
        );    
        $cur_cnt = 0;
        while($item = $dbBasketItems->GetNext()){
            $cur_cnt += $item["QUANTITY"];     //сколько уже есть в корзине
        }  
        //cho $cur_cnt;
        if($arProduct["QUANTITY"] - $cur_cnt <= 0){
            return false; //товаров уже больше, чем можно купить
        }
        else{
            $future_cnt = $cur_cnt + $aFields["QUANTITY"];
            if($future_cnt > $arProduct["QUANTITY"]){
                $aFields["QUANTITY"] = $arProduct["QUANTITY"] - $cur_cnt;    
                return true;
            }
            else{
                return true;
            }
        }
    }
}

/**
* Транслит имени в символьный код (для ЧПУ)*/
function slugTranslit(&$arFields) {

    // Если заполнено имя и не заполнен символьный код
    if (strlen($arFields["NAME"]) > 0 && strlen($arFields["CODE"]) <= 0) 
    {
        $arParams = array(
            "max_len" => "100", // обрезаем символьный код до 100 символов
            "change_case" => "L", // приводим к нижнему регистру
            "replace_space" => "-", // меняем пробелы на тире
            "replace_other" => "-", // меняем плохие символы на тире
            "delete_repeat_replace" => "true", // удаляем повторяющиеся тире
            "use_google" => "false", // отключаем использование google
        );
        $arFields["CODE"] = Cutil::translit($arFields["NAME"], "ru", $arParams);
    }
}
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", 'slugTranslit');
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", 'slugTranslit');

/****ДОБАВЛЕНИЕ НОВЫХ ПРОИЗВОДИТЕЛЕЙ ПРИ ВЫГРУЗКЕ***/ 
AddEventHandler("catalog", "OnSuccessCatalogImport1C", "addVendors");
function addVendors(){    //получаем существующих производителей
    //получаем существующих производителей
    $arVend = array();
    $arSelect = Array("ID", "NAME", "IBLOCK_ID");//IBLOCK_ID или ID обязательно должен быть указан, см. описание arSelectFields выше
    $arFilter = Array("IBLOCK_CODE" => "tz_vendors");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->Fetch()){
        $arVend[] = $ob["NAME"];    
    }

    //получаем производителей из свойств ИБ
    $arNew = array();
    $property_enums = CIBlockElement::GetList(Array(), Array("IBLOCK_CODE"=>"new_catalog"), array("PROPERTY_MANUFACTURER"), false, ("PROPERTY_MANUFACTURER"));
    while($enum_fields = $property_enums->Fetch())
    {
        if(!in_array($enum_fields["PROPERTY_MANUFACTURER_VALUE"], $arVend)){
            $arNew[] = $enum_fields["PROPERTY_MANUFACTURER_VALUE"];    
        }           
    }
    ;
    //создаем новых производителей
    foreach($arNew as $newVendor){

        $el = new CIBlockElement;
        $params = Array(
            "max_len" => "100", // обрезает символьный код до 100 символов
            "change_case" => "L", // буквы преобразуются к нижнему регистру
            "replace_space" => "-", // меняем пробелы на нижнее подчеркивание
            "replace_other" => "-", // меняем левые символы на нижнее подчеркивание
            "delete_repeat_replace" => "true", // удаляем повторяющиеся нижние подчеркивания
            "use_google" => "false", // отключаем использование google
        );  
        $arLoadProductArray = Array(
            "IBLOCK_ID"      => getIBlockIDByCode("tz_vendors"),                //производители
            "NAME"           => $newVendor,
            "ACTIVE"         => "Y",            // активен
            "CODE" => CUtil::translit($newVendor, "ru" , $params)
        );

        $PRODUCT_ID = $el->Add($arLoadProductArray);

    }

}

//Пишем обработчик для антиспама (чтобы формы использовались не чаще, чем раз в мниуту);
function my_onBeforeResultAdd($WEB_FORM_ID, &$arFields, &$arrVALUES)
{
    global $APPLICATION;
    $nextFormTime = date("d-m-Y H:i:s", strtotime(date("d-m-Y H:i:s")."+ 60 sec"));
    if ($_SESSION["RESULT_FORM_".$WEB_FORM_ID] > 0)
    {
        $diff = strtotime($_SESSION["RESULT_FORM_".$WEB_FORM_ID]) - strtotime(date("d-m-Y H:i:s"));	  
    }
    if ($diff > 0)
    {
        $APPLICATION->ThrowException("Необходимо подождать, ".$diff." секунд прежде, чем Вы сможете выполнить снова действие.");	  
    } else {
        $_SESSION["RESULT_FORM_".$WEB_FORM_ID] = $nextFormTime;
    }   
}
AddEventHandler('form', 'onBeforeResultAdd', 'my_onBeforeResultAdd');
/*END*/   


//устанавливаем свойства для сортировки каталога по наличию картинок и остатков  
AddEventHandler("iblock", "OnAfterIBlockElementAdd", "SetFlagsPhotoAndQuantity");
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "SetFlagsPhotoAndQuantity");
function SetFlagsPhotoAndQuantity(&$arFields)
{
    CModule::IncludeModule("iblock");

    $arSelect = array(
        "ID",
        "IBLOCK_ID",
        "CATALOG_QUANTITY"
    );

    $arFilter = array("IBLOCK_ID" => CATALOG_ID, "ID" => $arFields["ID"]);

    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>1), $arSelect);
    while($ob = $res->GetNext())
    {

        $hasFoto = false;
        $havAva = $ob['CATALOG_QUANTITY']>0?true:false;

        $g = CIBlockElement::GetProperty(CATALOG_ID, $ob["ID"], Array("SORT"=>"ASC"), Array("ACTIVE"=>"Y", "CODE"=>"IMAGES"));
        while($ar_res = $g->Fetch())
        {
            if (strlen($ar_res["VALUE"]) > 0)
            {
                $hasFoto = true;    
            }    
        }    

        $arSelectSetProp = array(
            "FLAG_MAIN_PHOTO" =>  $hasFoto ? PROPERTY_FLAG_MAIN_PHOTO_YES : 0,
            "FLAG_MAIN_QUANTITY" =>  $havAva ? PROPERTY_FLAG_MAIN_QUANTITY_YES : 0,
        ); 

        CIBlockElement::SetPropertyValuesEx($ob['ID'], CATALOG_ID, $arSelectSetProp); 
    }
}

// посылаем pdf - приглашение для Опроса 25 лет Элевелу
AddEventHandler("vote", "onAfterVoting", "OnAfterVoteAnswerAddHadler");
function OnAfterVoteAnswerAddHadler($VOTE_ID, $EVENT_ID)
{ 
    CModule::IncludeModule("vote");

    if ($VOTE_ID == 27){

        $is_inv = false;

        $arAllQuestions = array();
        //выбираем вопросы по нашей форме 
        $rsQuestions = CVoteQuestion::GetList($VOTE_ID, $by, $order, array(), $is_filtered);
        while ($arQuestion = $rsQuestions->Fetch())
        {
            $arAllAnswers = array();
            $rsAnswers = CVoteAnswer::GetList($arQuestion["ID"]);
            while ($arAnswer = $rsAnswers->Fetch())
            {
                $arAllAnswers[$arAnswer['ID']]=$arAnswer;
            }
            $arAllQuestions[] = array('ID' => $arQuestion["ID"], 'ANSWERS' => $arAllAnswers);

        }

        // список свойств, которые нужны для формирования приглашения и отправки письма
        // это email, ФИО, компания, должность,номер билета
        $propsList = array("269", "270", "271", "272", "279","280");

        foreach ($arAllQuestions as $arQuestion)
        {
            $txt = '';
            foreach($arQuestion["ANSWERS"] as $arAnswer)
            {
                if (in_array($arAnswer['QUESTION_ID'], $propsList)){

                    if ($msg = CVoteEvent::GetAnswer( $EVENT_ID, $arAnswer['ID']))
                    {
                        $txt = htmlspecialcharsbx($msg);

                        switch($arAnswer['QUESTION_ID']){
                            case "269": $is_inv = true; break;
                            case "270": $FIO = $txt; break;
                            case "271": $COMPANY = $txt; break;
                            case "272": $EMAIL_TO = $txt; break;
                            case "279": $POST = $txt; break;
                            case "280": $TICKET_N = $txt; break;
                        }
                    }
                }
            }
        }
        // формирование тела письма в html
        //if ($_SERVER["REMOTE_ADDR"] == '178.219.245.154' || $_SERVER["REMOTE_ADDR"] == '46.175.142.6'){
        $html = '<html>
        <head>
        <style>
        body { font-family: times-roman }
        </style>
        </head>
        <body>  
        <div style="width: 500px; height: auto; position: relative; text-align: center; margin: 0 auto;">
        <img src="'.$_SERVER["DOCUMENT_ROOT"].'/images/celebration25/form-ticket25.png" width="500" style="vertical-align: top;" /> 
        <div style="position: absolute; width: 60px; font-size: 24px; top: 184px; right: 283px; ">#TICKET_N#</div>
        <div style="position: absolute; width: 335px; font-size: 20px; top: 265px; right: 64px; line-height: 20px; text-align: right;">#FIO#</div>
        <div style="position: absolute; width: 310px; font-size: 20px; top: 316px;; right: 64px; line-height: 20px; text-align: right;">#POST#</div>
        <div style="position: absolute; width: 310px; font-size: 20px; top: 367px; right: 64px; line-height: 20px; text-align: right;">#COMPANY#</div>
        </div>
        </body>
        </html>';
        // это старая версия письма, пусть пока полежит на всякий случай
        /*}
        else{
        $html = '<html>
        <head>
        <style>
        body { font-family: times-roman }
        </style>
        </head>
        <body>
        <div style="width: 500; height: auto; position: relative;">
        <img src="'.$_SERVER["DOCUMENT_ROOT"].'/upload/img/'.'25_elevel_invitation.png" width="500" style="vertical-align: top;" /> 
        <div style="position: absolute; width: 60px; font-size: 24px; top: 230px; left: 405px; ">#TICKET_N#</div>
        <div style="position: absolute; width: 330px; font-size: 20px; top: 295px; left: 145px; line-height: 20px;">#FIO#</div>
        <div style="position: absolute; width: 330px; font-size: 20px; top: 344px; left: 153px; line-height: 20px; ">#POST#</div>
        <div style="position: absolute; width: 330px; font-size: 20px; top: 391px; left: 147px; line-height: 20px; ">#COMPANY#</div>
        </div>
        </body>
        </html>';
        }                              */

        $ifio = iconv('windows-1251','UTF-8',$FIO);		
        $ipost = iconv('windows-1251','UTF-8',$POST);		
        $icompany = iconv('windows-1251','UTF-8',$COMPANY);		

        $html = str_replace(array( "#TICKET_N#", "#FIO#" , "#POST#" , "#COMPANY#"), array($TICKET_N , $ifio , $ipost, $icompany), $html);		

        // подключаем библиотеку для генерации pdf и создаем соотвествующий класс	
        require_once $_SERVER["DOCUMENT_ROOT"].'/pdf_library/dompdf/autoload.inc.php';

        // use Dompdf\Dompdf;
        $dompdf = new Dompdf\Dompdf();
        $dompdf->load_html($html);
        $dompdf->render();


        // генерируем имя в виде invite_[случайный набор из 5 символов].pdf
        $ticket_name = "invite_".generate_name(5).".pdf";
        $path_name = $_SERVER["DOCUMENT_ROOT"] . "/pdf_tickets/". $ticket_name;

        file_put_contents($path_name, $dompdf->output()); 

        $arEventFields = array(
            "EMAIL_TO" => $EMAIL_TO,
        );

        $file = CFile::MakeFileArray($path_name);
        // сохраняем созданный файл физически и посылаем приглашение
        $fid = CFile::SaveFile($file);
        CEvent::Send("SEND_INV_25_YEARS", array("s1"), $arEventFields, "Y" , "", array($fid));

    }
}

/*
AddEventHandler("sale", "OnOrderSave", "OnOrderSaveHandler");
function OnOrderSaveHandler($orderId, $arFields, $arOrder, $isNew) {
    AddMessage2Log("Успешно сработало событие OnOrderSave");
    AddMessage2Log($orderId,"orderId");
    AddMessage2Log($arFields,"arFields");
    AddMessage2Log($arOrder,"arOrder");
    AddMessage2Log($isNew,"isNew");
}
*/
AddEventHandler("sale", "OnSaleOrderSaved", "OnSaleOrderSavedHandler");
function OnSaleOrderSavedHandler($orderId, $arFields, $arOrder, $isNew) {
    /*$arEventFields = array(
    "ORDER_ID"                  => $orderId,
    "ORDER_LOGIN"        => $CONTRACT_ID,
    "EMAIL"              => $mess,
    "USER_FULL_ADDRESS"  => implode(",", $EMAIL_TO),
    "ORDER_TABLE"        => implode(",", $ADMIN_EMAIL),//параметры заказа
    "ORDER_LIST"         => implode(",", $ADD_EMAIL),//состав заказа
    );
    CEvent::Send("RS_SALE_NEW_ORDER", SITE_ID, $arEventFields,"Y",259);
    CEvent::Send("RS_SALE_NEW_ORDER_SELF", SITE_ID, $arEventFields,"Y",257);
    */
}

/*
AddEventHandler("sale", "OnBeforeOrderAdd", "OnBeforeOrderAddHandler");
function OnBeforeOrderAddHandler($ID,&$arFields) {
    $arEventFields = array(
        "ORDER_ID"                  => $ID
    );
    //CEvent::Send("RS_SALE_NEW_ORDER", SITE_ID, $arEventFields,"Y",262);
    //CEvent::Send("RS_SALE_NEW_ORDER_SELF", SITE_ID, $arEventFields,"Y",263);
}

// define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log_mail.txt");
AddEventHandler("sale", "OnOrderNewSendEmail", "SendMail");
function SendMail($ID,&$eventName,&$arFields) {
    // AddMessage2Log("Заказ = ".$ID);
    // AddMessage2Log($eventName,"Название события");
    // AddMessage2Log($arFields,"Поля");
}
*/
AddEventHandler('main', 'OnEpilog', '_Check404Error',1);
function _Check404Error()
{
    if (defined('ERROR_404') && ERROR_404=='Y' && !defined('ADMIN_SECTION'))
    {
        GLOBAL $APPLICATION;
        $APPLICATION->RestartBuffer();
        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/header.php");    
        require $_SERVER['DOCUMENT_ROOT'].'/404.php';
        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/footer.php");    
    }
}

// На событии создания заказа увеличиваем значение свойства Количество продаж товара
Bitrix\Main\EventManager::getInstance()->addEventHandler('sale', 'OnSaleOrderSaved', 'ChangeAmountOfSalesGoods');
function ChangeAmountOfSalesGoods(\Bitrix\Main\Event $event)
{
    if($event->getParameter('IS_NEW')) // проверяем, новый заказ ли?
    {
        $order = $event->getParameter('ENTITY');
        $basket = $order->getBasket();
        $basketItems = $basket->getBasketItems();
        $productIDs = array();

        if (!empty($basketItems))
        {
            foreach ($basketItems as $basketItem) {
                if (!in_array($basketItem->getProductId(), $productIDs))
                    $productIDs[] = $basketItem->getProductId();
            }
        }

        if (!empty($productIDs))
        {
            $goods_arr = CCatalogSKU::getProductList($productIDs);
            if ($goods_arr)
            {
                foreach($goods_arr as $good)
                {
                    if (!in_array($good["ID"], $productIDs))
                        $productIDs[] = $good["ID"];
                }
            }
        }

        if (!empty($productIDs))
        {	
            $arSelect = Array("ID", "PROPERTY_SALES_AMOUNT");
            $arFilter = Array("IBLOCK_ID" => CATALOG_ID, "ID" => $productIDs);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
            while($goodInfo = $res->GetNext())
            {
                $current_sales_amount = intval($goodInfo["PROPERTY_SALES_AMOUNT_VALUE"]);

                CIBlockElement::SetPropertyValuesEx($goodInfo["ID"], CATALOG_ID, array("SALES_AMOUNT" => ($current_sales_amount + 1) ));
            }
        }
    }
}

// Если в письме есть файл, то прикрепляем его к письму
AddEventHandler("main", "OnBeforeEventAdd", array("SendMailCorporativ", "attacheFiles"));
class SendMailCorporativ
{
    function attacheFiles(&$event, &$lid, &$arFields, &$messageId, &$files)
    {
        if (isset($arFields["file"]))
        {
            $arAnswer = CFormResult::GetDataByID(
                $arFields["RS_RESULT_ID"], 
                array("file"),
                $arResult, 
                $arAnswer2
            );

            foreach($arAnswer2["file"] as $answ)
            {
                if (isset($answ["USER_FILE_ID"]))
                {
                    $files[] = $answ["USER_FILE_ID"];
                }
            }
        }
    }
}


AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("SubscribeNews", "SubscribeNewsAdd"));
AddEventHandler("subscribe", "BeforePostingSendMail", Array("SubscribeNews", "AddLinksToChangeAndUnsubscribe"));

class SubscribeNews
{
    function SubscribeNewsAdd(&$arFields)
    {		
        if ($arFields["IBLOCK_ID"] == NEWS_IBLOCK_ID && $arFields["ID"] > 0)
        {
            CModule::IncludeModule("subscribe");

            $val_id2rubric_id = array(
                PROPERTY_SUBSCRIBE_RUBRICS_SHIT => RUBRIC_SHIT,
                PROPERTY_SUBSCRIBE_RUBRICS_TORG => RUBRIC_TORG,
                PROPERTY_SUBSCRIBE_RUBRICS_ARCH => RUBRIC_ARCH,
                PROPERTY_SUBSCRIBE_RUBRICS_PROM => RUBRIC_PROM,
                PROPERTY_SUBSCRIBE_RUBRICS_ELECTRO => RUBRIC_ELECTRO,
                PROPERTY_SUBSCRIBE_RUBRICS_GEN => RUBRIC_GEN,
                PROPERTY_SUBSCRIBE_RUBRICS_SVET => RUBRIC_SVET,
            );

            $arRubrics = array();

            foreach($arFields["PROPERTY_VALUES"][PROPERTY_SUBSCRIBE_RUBRICS_ID] as $val)
            {
                if (!empty($val["VALUE"]) && isset($val_id2rubric_id[ $val["VALUE"] ]))
                    $arRubrics[] = $val_id2rubric_id[ $val["VALUE"] ];
            }

            $subscr = CSubscription::GetList(
                array("ID"=>"ASC"),
                array("RUBRIC" => $arRubrics, "CONFIRMED"=>"Y", "ACTIVE"=>"Y")
            );
            while(($subscr_arr = $subscr->Fetch()))
                $emails[] = $subscr_arr["EMAIL"];

            if (!empty($arRubrics) && !empty($emails))
            {
                $SITE_ROOT = (CMain::IsHTTPS() ? "https://" : "http://") . SITE_DOMAIN;
                $body = "Добрый день!<br /><br />";
                $body .= date("d.m.Y") . "<br /><br />";
                $body .= "<b>" . $arFields["NAME"] . "</b><br /><br />";

                if ($arFields["PREVIEW_PICTURE_ID"])
                    $img = CFile::GetPath($arFields["PREVIEW_PICTURE_ID"]);

                if ($img)
                    $body .= '<img src="' . $SITE_ROOT . $img . '" style="max-width:100%;" /><br /><br />';

                $body .= $arFields["PREVIEW_TEXT"] . "<br />";
                $body .= '<a href="' . $SITE_ROOT . '/company/news/' . $arFields["ID"] . '/">' . $SITE_ROOT . '/company/news/' . $arFields["ID"] . '/</a><br /><br />';

                $body .= 'Если вы получили это письмо, вы подписались на рассылку на сайте elevel.ru.<br />';

                $body .= 'Изменить настройки подписки можно здесь: #EDIT_LINK# <br />';
                $body .= 'Отписаться от рассылки: #UNSUBSCRIBE_LINK# <br />';

                $cPostingFields = array(
                    "RUB_ID" => $arRubrics,
                    "SUBJECT" => "Новости Эlevel",
                    "FROM_FIELD" => "info@" . SITE_DOMAIN,
                    "TO_FIELD" => implode(", ", $emails),
                    "BODY_TYPE" => "html",
                    "BODY" => $body,
                    "DIRECT_SEND" => "Y",
                    "CHARSET" => "windows-1251",
                );

                $cPosting = new CPosting;
                $ID = $cPosting->Add($cPostingFields);
                if($ID)
                {
                    $cPosting->ChangeStatus($ID, "P");
                    $cPosting->AutoSend($ID);
                }

                if($ID == false)
                {
                    //Diag\Debug::writeToFile($cPosting->LAST_ERROR, "", "subscribe.txt");
                }   

                //Diag\Debug::writeToFile($arFields, "", "subscribe.txt");
            }
        }
    }

    function AddLinksToChangeAndUnsubscribe($arFields)
    {
        //Diag\Debug::writeToFile("test", "", "subscribe.txt");

        \Bitrix\Main\Loader::includeModule("subscribe");

        $rs = CSubscription::GetByEmail($arFields["EMAIL"]);

        if($ar = $rs->Fetch())
        {
            if(is_array($ar))
            {
                $ID = $ar["ID"];
                $CONFIRM_CODE = $ar["CONFIRM_CODE"];
            }
        }

        if ($ID && $CONFIRM_CODE)
        {
            $SITE_ROOT = (CMain::IsHTTPS() ? "https://" : "http://") . SITE_DOMAIN;

            $arFields["BODY"] = str_replace("#EDIT_LINK#", '<a href="' . $SITE_ROOT . '/subscribe/?action=edit&ID=' . $ID . '&CONFIRM_CODE=' . $CONFIRM_CODE . '">' . $SITE_ROOT . '/subscribe/?action=edit&ID=' . $ID . '&CONFIRM_CODE=' . $CONFIRM_CODE . '</a>', $arFields["BODY"]);

            $arFields["BODY"] = str_replace("#UNSUBSCRIBE_LINK#", '<a href="' . $SITE_ROOT . '/subscribe/?action=unsubscribe&ID=' . $ID . '&CONFIRM_CODE=' . $CONFIRM_CODE . '">' . $SITE_ROOT . '/subscribe/?action=unsubscribe&ID=' . $ID . '&CONFIRM_CODE=' . $CONFIRM_CODE . '</a>', $arFields["BODY"]);
        }
        else
        {
            $arFields["BODY"] = str_replace("#EDIT_LINK#", 'При формировании ссылки возникла ошибка.', $arFields["BODY"]);
            $arFields["BODY"] = str_replace("#UNSUBSCRIBE_LINK#", 'При формировании ссылки возникла ошибка.', $arFields["BODY"]);
        }

        //Diag\Debug::writeToFile($arFields, "", "subscribe.txt");

        return $arFields;
    }
}

AddEventHandler("catalog", "OnProductAdd", "OnProductAdd");

function OnProductAdd($ID,$Fields)
{   
    $res=Array("VAT_INCLUDED"=>'Y');
    CCatalogProduct::Update($ID,$res);

} 
//редирект на маленькие буквы

AddEventHandler("main", "OnBeforeProlog", Array("OnBeforeProlog", "MyOnBeforePrologHandler"));

class OnBeforeProlog
{
    function MyOnBeforePrologHandler()
    {
        global $APPLICATION;
        $curDir = $APPLICATION -> GetCurPage (false);        

        if ( $curDir != strtolower( $curDir )) {
            header('Location: //'.$_SERVER['HTTP_HOST'] . strtolower($curDir), true, 301);
            exit();
        }
    }
}
