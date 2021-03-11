<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотогалерея");
?>
<div>
<h1>Фотогалерея</h1>

<table cellspacing="1" cellpadding="1" border="0">
  <tbody>
    <tr><td width="100%">
        <p><?$APPLICATION->IncludeComponent("bitrix:photogallery", "wt_photo", array(
	"USE_LIGHT_VIEW" => "N",
	"IBLOCK_TYPE" => "vecancy",
	"IBLOCK_ID" => "11",
	"SECTION_SORT_BY" => "UF_DATE",
	"SECTION_SORT_ORD" => "DESC",
	"ELEMENT_SORT_FIELD" => "rating",
	"ELEMENT_SORT_ORDER" => "desc",
	"PATH_TO_USER" => "",
	"DRAG_SORT" => "Y",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/company/photogallery/",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"DATE_TIME_FORMAT_DETAIL" => "d.m.Y",
	"DATE_TIME_FORMAT_SECTION" => "d.m.Y",
	"SET_TITLE" => "Y",
	"SECTION_PAGE_ELEMENTS" => "12",
	"ELEMENTS_PAGE_ELEMENTS" => "100",
	"PAGE_NAVIGATION_TEMPLATE" => "",
	"ALBUM_PHOTO_SIZE" => "150",
	"THUMBNAIL_SIZE" => "100",
	"JPEG_QUALITY1" => "100",
	"ORIGINAL_SIZE" => "0",
	"JPEG_QUALITY" => "100",
	"ADDITIONAL_SIGHTS" => array(
	),
	"PHOTO_LIST_MODE" => "Y",
	"SHOWN_ITEMS_COUNT" => "6",
	"SHOW_NAVIGATION" => "N",
	"USE_RATING" => "N",
	"SHOW_TAGS" => "N",
	"UPLOADER_TYPE" => "applet",
	"APPLET_LAYOUT" => "extended",
	"UPLOAD_MAX_FILE_SIZE" => "8M",
	"USE_WATERMARK" => "Y",
	"WATERMARK_RULES" => "USER",
	"PATH_TO_FONT" => "",
	"WATERMARK_MIN_PICTURE_SIZE" => "200",
	"SHOW_LINK_ON_MAIN_PAGE" => array(
		0 => "id",
		1 => "shows",
		2 => "rating",
		3 => "comments",
	),
	"SEF_URL_TEMPLATES" => array(
		"index" => "index.php",
		"section" => "#SECTION_ID#/",
		"section_edit" => "#SECTION_ID#/action/#ACTION#/",
		"section_edit_icon" => "#SECTION_ID#/icon/action/#ACTION#/",
		"upload" => "#SECTION_ID#/action/upload/",
		"detail" => "#SECTION_ID#/#ELEMENT_ID#/",
		"detail_edit" => "#SECTION_ID#/#ELEMENT_ID#/action/#ACTION#/",
		"detail_list" => "list/",
		"search" => "search/",
	)
	),
	false
);?></p>
      </td></tr>
  </tbody>
</table>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>