<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<? $APPLICATION->IncludeComponent("bxmaker:geoip.city",  // ����� ������
    "shop",
    array(
        "COMPONENT_TEMPLATE" => "shop",
        "CITY_SHOW" => "Y",
        "CITY_LABEL" => "��� �����:",
        "QUESTION_SHOW" => "N",
        "QUESTION_TEXT" => "��� �����<br/>#CITY#?",
        "INFO_SHOW" => "N",
        "INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">��������� � ��������</a>",
        "BTN_EDIT" => "�������� �����",
        "SEARCH_SHOW" => "Y",
        "FAVORITE_SHOW" => "Y",
        "CITY_COUNT" => "30",
        "FID" => "1",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "POPUP_LABEL" => "�� ���������� �� ���� ������!",
        "INPUT_LABEL" => "������� �������� ������...",
        "MSG_EMPTY_RESULT" => "������ �� �������"
    ),
    false
); ?>