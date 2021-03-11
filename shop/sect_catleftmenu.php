<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>


<?if ($_REQUEST["print"] !== "Y"):?>
    <div class = "block210b">

	    <?
		    if(CUR_SECTION_ID_FOR_MENU)
	    		$sect_id = CUR_SECTION_ID_FOR_MENU;
		    
		    else 
		        $sect_id = false;
		        
		    $APPLICATION->IncludeComponent("custom:catalog.section.list", "shop-left-menu", array(
			    "IBLOCK_TYPE" => CATALOG_TYPE,
			    "IBLOCK_ID" => CATALOG_ID,
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
			    "CACHE_TYPE" => "Y",
			    "CACHE_TIME" => "37000",
			    "CACHE_GROUPS" => "Y",
			    "ADD_SECTIONS_CHAIN" => "N"
			    ),
			    false
		    );
	    ?>
    </div>

<?endif;?>