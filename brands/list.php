<?
if(!ctype_lower(preg_replace('/[^\w]+/', '', $_SERVER["REQUEST_URI"]))){
    $new_url = str_replace('_', '-', mb_strtolower($_SERVER["REQUEST_URI"]));      
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: {$new_url}");     
}        
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("keywords_inner", "ABB");
$APPLICATION->SetTitle("Бренды");
?>

<?
$ServiceIBlockID = 5;
$pathers=explode('/',$dir);
$u=count($pathers)-2;
$RootSectionID=$pathers[$u];
//echo $RootSectionID;
//$RootSectionID = trim($_REQUEST['sid']);
CModule::IncludeModule("iblock");

$secRs = CIBlockSection::GetList(Array(), Array('IBLOCK_ID'=>$ServiceIBlockID, 'GLOBAL_ACTIVE'=>'Y', 'CODE'=>$RootSectionID), 
false, array("UF_*"));

if (!$CurrentSection = $secRs->GetNext())
{
	header('Location: http://www.elevel.ru/404.php'); exit; 
}
$RootSectionID = $CurrentSection["ID"];

$title = !empty($CurrentSection['UF_BROWSER_TITLE']) ? $CurrentSection['UF_BROWSER_TITLE'] : $CurrentSection['NAME'];
$title_h1 = !empty($CurrentSection['UF_TITLE_H1']) ? $CurrentSection['UF_TITLE_H1'] : '';
$APPLICATION->AddChainItem((!empty($CurrentSection["UF_MENUBRANDNAME"]))?$CurrentSection["UF_MENUBRANDNAME"]:$CurrentSection['NAME']);
$APPLICATION->SetTitle($title);
$APPLICATION->SetPageProperty("keywords", $CurrentSection['UF_KEYWORDS']);
$APPLICATION->SetPageProperty("description", $CurrentSection['UF_DESCRIPTION']);
$CurrentSectionLink = $CurrentSection["CODE"];
?>

<center><?$APPLICATION->IncludeComponent(
	"bitrix:advertising.banner",
	".default",
	Array(
	"TYPE" => "PB_BANNER_1",	// Тип баннера
	"CACHE_TYPE" => "N",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	)
);?></center>
<style>
.brands_img img{
height: 44px;
}
</style>
<div class="brands_img">
<h1><?=$title_h1;?></h1>
<?=html_entity_decode($CurrentSection['UF_CG'])?>
</div>
<br />
<? include("missing_products.php"); ?>
<div>
<?
//------------------------ перебираем секции внутри текущего раздела --------------------------------
  $db_list = CIBlockSection::GetList(Array("sort"=>"asc"),Array('IBLOCK_ID'=>$ServiceIBlockID,'SECTION_ID'=>$RootSectionID),false,
  Array('UF_*'));
  while($arItem = $db_list->GetNext())
  {
     $CurrentSectionID = $arItem["ID"];
?>
<?if($arItem["NAME"]!="Каталоги"){?>
<p style="color:#F05922;"><?=$arItem["NAME"]?></p>

<? $out = ""; $cnt=0; $CatTable="";  $cols=4; // таблица в 3 колонки
//-----------------------------------------------------------------------------
    $items = GetIBlockElementList($ServiceIBlockID, $CurrentSectionID);
    while($arItem = $items->GetNext()) 
     {
	$beginRow=""; $endRow="";
	//if ($cnt==0) $beginRow="<tr vAlign=\"middle\">"; 	if ($cnt==($cols-1)){ $endRow="</tr>";}

	$arItemLink = empty($arItem["CODE"]) ? $arItem["ID"] : $arItem["CODE"];
	$out = "";

     if(IntVal($arItem['PREVIEW_PICTURE']) > 0):
     

															
	$out .= "<center><a href='/brands/".$CurrentSectionLink."/".$arItemLink."/' title='".$CurrentSection['NAME'].", ".$arItem['NAME']."' style='width: 132px; height: 132px; display:block; position: relative; top:5px' >
                  <img src=\"".CFile::GetPath($arItem['PREVIEW_PICTURE'])."\" 
                     align='baseline'
					 title='".$CurrentSection['NAME'].", ".$arItem['NAME']."'
                     alt='".$CurrentSection['NAME'].", ".$arItem['NAME']."' /></a></center>
                ";
     endif;
     $out .= "<a href='/brands/".$CurrentSectionLink."/".$arItemLink."/' class='shop-section-title'>".$arItem['NAME']."</a>";
     
	//$out .= "<a class='gray' href='/brands/".$CurrentSectionLink."/".$arItemLink."/' title='".$CurrentSection['NAME'].", ".$arItem['NAME']."'>".$arItem['NAME']."</a>";
	//$out .= "<p><a href='/brands/".$CurrentSectionLink."/".$arItemLink."/'>Перейти в раздел</a></p>";

   $CatTable .= $beginRow."<li style='text-align: center; font-size: 11px; margin-right: 5px !important'>".$out."</li>"; 
   $cnt++; 
         if ($cnt > ($cols-1)){ $cnt=0; $out="";}
}
//-----------------------------------------------------------------------
?>
<ul class="list172"><?=$CatTable?></ul>
<?
//unset($_SESSION["catalogs_id"]);
}
else {
session_start();
$_SESSION['catalogs_id'] = $arItem["ID"];
$APPLICATION->IncludeFile("/brands/catalog_pdf.php");
}
}
//--------------------------------- while($arItem = $SectItems->GetNext()) ---------------------------------------------------
?>
</div>
<div class="svc_full" style="margin-top:20px;"><?=$CurrentSection['DESCRIPTION']?> </div>

</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>