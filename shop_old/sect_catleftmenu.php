<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>

<?
if ($_REQUEST["print"] !== "Y")
    {
?>

    <div class = "block210b">
        <p class="tz-menu-title">Каталог товаров</p>

        <? /*
         if (!$USER->IsAdmin()):?>                    
             <?$APPLICATION->IncludeComponent("custom:catalog.section.list", "", array(
                 "IBLOCK_TYPE" => "Каталог товаров",
                 "IBLOCK_ID" => "10",
                 "SECTION_ID" => "",
                 "SECTION_CODE" => "",
                 "COUNT_ELEMENTS" => "N",
                 "TOP_DEPTH" => "4",
                 "SECTION_URL" => "/shop/#SECTION_ID#/",
                 "CACHE_TYPE" => "N",
                 "CACHE_TIME" => "36000",
                 "CACHE_GROUPS" => "Y",
                 "DISPLAY_PANEL" => "N",
                 "ADD_SECTIONS_CHAIN" => "N"
                 ),
                 false
             );?>  
         <?else:*/
        ?>

    <?
        if(CUR_SECTION_ID_FOR_MENU){
            $sect_id = CUR_SECTION_ID_FOR_MENU;
        }
        else $sect_id = false;
        $APPLICATION->IncludeComponent("custom:catalog.section.list", "shop-left-menu", array(
	        "IBLOCK_TYPE" => "Каталог товаров",
	        "IBLOCK_ID" => "53",
	        "SECTION_ID" => $sect_id,
	        "SECTION_CODE" => "",
	        "COUNT_ELEMENTS" => "Y",
	        "TOP_DEPTH" => "4",
	        "SECTION_FIELDS" => array(
		        0 => "",
		        1 => "",
	        ),
	        "SECTION_USER_FIELDS" => array(
		        0 => "",
		        1 => "",
	        ),
	        "SECTION_URL" => "/shop/#SECTION_CODE_PATH#/",
	        "CACHE_TYPE" => "N",
	        "CACHE_TIME" => "36000",
	        "CACHE_GROUPS" => "Y",
	        "ADD_SECTIONS_CHAIN" => "N"
	        ),
	        false
        );
    ?>
    </div>

<?

    }
    
?>