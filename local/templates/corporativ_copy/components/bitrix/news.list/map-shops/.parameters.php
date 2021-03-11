<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
    "PARAMETERS" => array(
        "CITY" => array(
            "NAME" => "ID города",
            "PARENT" => "BASE",
            "TYPE" => "INTEGER",
            "DEFAULT" => intval($_GET["city"]),
        ),
    )
);