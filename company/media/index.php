<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "elevel, elevel engeener, эlevel, эlevel инженер, элевел, фильм о компании, видео эlevel, видео компани эlevel, файлы, медиафайлы, видеогалерея эlevel, видеофайлы компании эlevel");
//$APPLICATION->SetPageProperty("not_show_nav_chain", "Y");
$APPLICATION->SetPageProperty("keywords", "elevel, elevel engeener, эlevel, эlevel инженер, элевел, фильм о компании, видео эlevel, видео компани эlevel, файлы, медиафайлы, видеогалерея эlevel, видеофайлы компании эlevel");
$APPLICATION->SetPageProperty("description", "Видеогалерея компании Эlevel");
$APPLICATION->SetTitle("Видеогалерея");
?> 
<h1>Видеогалерея компании Эlevel</h1>
 
<table align="center"> 
  <tbody> 
    <tr><td><?$APPLICATION->IncludeComponent(
	"bitrix:player",
	".default",
	Array(
		"PLAYER_TYPE" => "flv",
		"USE_PLAYLIST" => "Y",
		"PATH" => "/media/list.xpsf",
		"PLAYLIST_DIALOG" => "",
		"WIDTH" => "400",
		"HEIGHT" => "800",
		"PREVIEW" => "",
		"LOGO" => "",
		"FULLSCREEN" => "Y",
		"SKIN_PATH" => "/bitrix/components/bitrix/player/mediaplayer/skins",
		"SKIN" => "bitrix.swf",
		"CONTROLBAR" => "bottom",
		"WMODE" => "transparent",
		"PLAYLIST" => "bottom",
		"PLAYLIST_SIZE" => "500",
		"HIDE_MENU" => "N",
		"AUTOSTART" => "N",
		"REPEAT" => "N",
		"VOLUME" => "50",
		"DISPLAY_CLICK" => "play",
		"MUTE" => "N",
		"HIGH_QUALITY" => "Y",
		"SHUFFLE" => "N",
		"START_ITEM" => "0",
		"ADVANCED_MODE_SETTINGS" => "Y",
		"PLAYER_ID" => "",
		"BUFFER_LENGTH" => "10",
		"DOWNLOAD_LINK" => "",
		"DOWNLOAD_LINK_TARGET" => "_self",
		"ALLOW_SWF" => "N",
		"CONTENT_TYPE" => ""
	)
);?><?$APPLICATION->IncludeComponent(
	"bitrix:iblock.tv",
	".default",
	Array(
		"IBLOCK_TYPE" => "",
		"IBLOCK_ID" => "",
		"DEFAULT_SMALL_IMAGE" => "/bitrix/components/bitrix/iblock.tv/templates/.default/images/default_small.png",
		"DEFAULT_BIG_IMAGE" => "/bitrix/components/bitrix/iblock.tv/templates/.default/images/default_big.png",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	)
);?></td></tr>
   </tbody>
 </table>
 
<br />
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>