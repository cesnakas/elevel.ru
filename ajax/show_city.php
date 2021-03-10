<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<? $APPLICATION->IncludeComponent("bxmaker:geoip.city",  // выбор города
    "shop",
    array(
        "COMPONENT_TEMPLATE" => "shop",
        "CITY_SHOW" => "Y",
        "CITY_LABEL" => "Ваш город:",
        "QUESTION_SHOW" => "N",
        "QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
        "INFO_SHOW" => "N",
        "INFO_TEXT" => "<a href=\"#\" rel=\"nofollow\" target=\"_blank\">Подробнее о доставке</a>",
        "BTN_EDIT" => "Изменить город",
        "SEARCH_SHOW" => "Y",
        "FAVORITE_SHOW" => "Y",
        "CITY_COUNT" => "30",
        "FID" => "1",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "POPUP_LABEL" => "МЫ ДОСТАВЛЯЕМ ПО ВСЕЙ РОССИИ!",
        "INPUT_LABEL" => "Введите название города...",
        "MSG_EMPTY_RESULT" => "Ничего не найдено"
    ),
    false
); ?>