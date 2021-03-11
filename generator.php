<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
global $USER;
  $USER_ID=$USER->GetID();
    CModule::IncludeModule("sale");        
    $arFields_rec = array(
       "NAME" => "LoGeN322",
       "USER_ID" => intval($USER_ID),
       "PERSON_TYPE_ID" => "1"
    );
    $PROFILE_ID = CSaleOrderUserProps::Add($arFields_rec);   
    //если профиль создан
      if ($PROFILE_ID)
      {
          echo "okay";
         //формируем массив свойств
         $PROPS=Array(
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 1,
               "NAME" => "Имя",
               "VALUE" => "ыыыыыы"
            ),
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 30,
               "NAME" => "Фамилия",
               "VALUE" => "DDDDDDDD"
            ),         
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 2,
               "NAME" => "Телефон",
               "VALUE" => "0000000"
            ), 
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 19,
               "NAME" => "E-mail",
               "VALUE" => "mail@Mai.ru"
            ),               
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 4,
               "NAME" => "Город",
               "VALUE" => 537
            ),              
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 48,
               "NAME" => "Сохранить ка платежный шаблон",
               "VALUE" => "Y"
            )           

         );
         //добавляем значения свойств к созданному ранее профилю
         foreach ($PROPS as $prop) {
            if (CSaleOrderUserPropsValue::Add($prop)) {
                
            }
         }
      }     
    ?>