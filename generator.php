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
    //���� ������� ������
      if ($PROFILE_ID)
      {
          echo "okay";
         //��������� ������ �������
         $PROPS=Array(
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 1,
               "NAME" => "���",
               "VALUE" => "������"
            ),
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 30,
               "NAME" => "�������",
               "VALUE" => "DDDDDDDD"
            ),         
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 2,
               "NAME" => "�������",
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
               "NAME" => "�����",
               "VALUE" => 537
            ),              
            array(
               "USER_PROPS_ID" => $PROFILE_ID,
               "ORDER_PROPS_ID" => 48,
               "NAME" => "��������� �� ��������� ������",
               "VALUE" => "Y"
            )           

         );
         //��������� �������� ������� � ���������� ����� �������
         foreach ($PROPS as $prop) {
            if (CSaleOrderUserPropsValue::Add($prop)) {
                
            }
         }
      }     
    ?>