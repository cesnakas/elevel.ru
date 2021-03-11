<?
		//T - TOWN, PH - PHONE, CPH - CODE TOWN
			global $citySeo;   
			global $TRGlobalSe;  

            $page = $APPLICATION->GetCurPage(false);
            $shopurl = explode("/", $page);
            
            if($shopurl["1"] == "shop")
            {
               $_SESSION["TOWNS"]["28205"]["PH"]="134-25-21"; 
            }
            else if($shopurl["1"] == 'help' and $shopurl["2"] == 'carry.php')
            {
               $_SESSION["TOWNS"]["28205"]["PH"]="134-25-21"; 
            }
            else
            {
               $_SESSION["TOWNS"]["28205"]["PH"]="363-32-03"; 
            }
           
            
            
            if (count($_SESSION["TOWNS"]) > 1){
			    
                $arTowns = $_SESSION["TOWNS"];
                
			/*$arTowns=array(
				28205=>array('T'=>'Москва', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>2),
				28213=>array('T'=>'Пушкино', 'PH'=>'504-25-44','CT'=>'8 (496)','PRICES'=>2),
				28214=>array('T'=>'Щелково', 'PH'=>'569-72-50','CT'=>'8 (496)','PRICES'=>2),
				33185=>array('T'=>'Сергиев Посад', 'PH'=>'552-21-66','CT'=>'8 (496)','PRICES'=>2),
				28208=>array('T'=>'Санкт-Петербург', 'PH'=>'449-44-11','CT'=>'8 (812)','PRICES'=>3),
				28209=>array('T'=>'Екатеринбург', 'PH'=>'287-01-61','CT'=>'8 (343)','PRICES'=>4),
				28210=>array('T'=>'Новосибирск', 'PH'=>'335-88-09','CT'=>'8 (383)','PRICES'=>5),
				28211=>array('T'=>'Ростов-на-Дону', 'PH'=>'300-78-00','CT'=>'8 (863)','PRICES'=>7),
				33192=>array('T'=>'Красноярск', 'PH'=>'216-01-26','CT'=>'8 (391)','PRICES'=>8)
			);*/    
            $arTowns2=array(
                28205=>array('T'=>$citySeo, 'PH'=>'555-09-84','CT'=>'8 (800)','PRICES'=>3),
                28206=>array('T'=>'Москва', 'PH'=>'518-94-23','CT'=>'8 (495)','PRICES'=>3),
                28207=>array('T'=>'Санкт-Петербург', 'PH'=>'313-22-93','CT'=>'8 (812)','PRICES'=>4),
                28208=>array('T'=>'Екатеринбург', 'PH'=>'237-23-12','CT'=>'8 (343)','PRICES'=>5)
            );             
			} else {	
			$arTowns=array(
				28205=>array('T'=>'Москва', 'PH'=>'518-94-23','CT'=>'8 (495)','PRICES'=>3),
				28213=>array('T'=>'Пушкино', 'PH'=>'555-09-84','CT'=>'8 (800)','PRICES'=>8),
				28214=>array('T'=>'Щелково', 'PH'=>'555-09-84','CT'=>'8 (800)','PRICES'=>8),
				33185=>array('T'=>'Сергиев Посад', 'PH'=>'552-21-66','CT'=>'8 (496)','PRICES'=>8),
				35155=>array('T'=>'Электросталь', 'PH'=>'571-95-79','CT'=>'8 (496)','PRICES'=>8),
				28208=>array('T'=>'Санкт-Петербург', 'PH'=>'313-22-93','CT'=>'8 (812)','PRICES'=>4),
				28209=>array('T'=>'Екатеринбург', 'PH'=>'237-23-12','CT'=>'8 (343)','PRICES'=>5),
				28210=>array('T'=>'Новосибирск', 'PH'=>'555-09-84','CT'=>'8 (800)','PRICES'=>6),
				28211=>array('T'=>'Ростов-на-Дону', 'PH'=>'555-09-84','CT'=>'8 (800)','PRICES'=>8)
			);
			$arTowns2=array(
				28205=>array('T'=>$citySeo, 'PH'=>'555-09-84','CT'=>'8 (800)','PRICES'=>3),
				28206=>array('T'=>'Москва', 'PH'=>'518-94-23','CT'=>'8 (495)','PRICES'=>3),
				28207=>array('T'=>'Санкт-Петербург', 'PH'=>'313-22-93','CT'=>'8 (812)','PRICES'=>4),
				28208=>array('T'=>'Екатеринбург', 'PH'=>'237-23-12','CT'=>'8 (343)','PRICES'=>5)
			);
			}
			?>
          
			<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');
$dir = $APPLICATION->GetCurDir();
$iPriceID = CGeoRegions::GetPriceIDByUser();
//$iUserGeoGroup = GetGroupByIP();
//echo $iPriceID.'==>'.$_SERVER['REMOTE_ADDR']."==>".$_COOKIE['OFFICE_PRICE']."==>".$iUserGeoGroup;
?> 
			
<?/*foreach($arTowns as $v=>$office){
    if($USER->IsAdmin()){
       // print_r($office);
    }
    
    ?>
    
<?
                                if($USER->IsAdmin()){
        //print_r($_SESSION);
    }
    if($iPriceID==$office['PRICES']) {
    if($USER->IsAdmin()){
        //print_r($default_town);
    }
	$default_town=$v;

	break;
}

}
*/
//debugArray($iPriceID);

?>

<?//=$_COOKIE['OFFICE_PRICE'];?>
        
<? 
$default_town = 28205;
if ($TRGlobalSe){ 
	$defTowns = $arTowns2;
	switch ($citySeo){
	   
	case "Москва":
		$default_town = 28206;
		break;
	case "Санкт-Петербург":
		$default_town = 28207;
		break;
	case "Екатеринбург":
		$default_town = 28208;
		break;
        
	default:
		
		break;
	}
	
} else {
	$defTowns = $arTowns;
    
}
   
if ($TRGlobalSe && (!isset($_COOKIE['town'])) && 0) :/* //это условие отключаю, может к нему вернусь

	if ($citySeo == "Москва")	{		
		?><p><span><?=$citySeo?></span><a href="#">выбрать офис<img src="/i/pic21.gif" alt=""></a></p>
		<span class="ph1"><span>8 (495)</span> 518-94-23</span><?
	}
	elseif ($citySeo == "Санкт-Петербург")	{
		?><p><span><?=$citySeo?></span><a href="#">выбрать офис<img src="/i/pic21.gif" alt=""></a></p>
		<span class="ph1"><span>8 (812)</span> 313-22-93</span><?
	}
	elseif ($citySeo == "Екатеринбург") {
		?><p><span><?=$citySeo?></span><a href="#">выбрать офис<img src="/i/pic21.gif" alt=""></a></p>
		<span class="ph1"><span>8 (343)</span> 237-23-12</span><?	
	}
	else {
		?><p><span><?=$citySeo?></span><a href="#">выбрать офис<img src="/i/pic21.gif" alt=""></a></p>
		<span class="ph1"><span>8 (800)</span> 555-09-84</span><?
	}
	?>
	
		<div class="list171" prices='<?=$arTowns[$default_town]['PRICES']?>'>
		<p><span><?=$arTowns[$default_town]['T']?></span></p>
		<ul>
		<?
		foreach($arTowns as $ctown=>$town){?>
			<li phone="<?=$town['PH']?>" code_ph="<?=$town['CT']?> " tcode="<?=$ctown;?>" prices="<?=$town['PRICES']?>"><span><?=$town['T']?></span></li>
		<?}?>
			</ul>
		</div> 

<?*/else:?>

<?if(!isset($_COOKIE['town'])):?>
           
<? $_SESSION["office_city"] = $defTowns[$default_town]['T'];?>
		
		<span><?if($dir=="/solutions/svetotekhnicheskie-resheniya/"){?>8 (495) 134-24-21<?}else{?><?=$defTowns[$default_town]['CT']?><?=$defTowns[$default_town]['PH']?><?}?></span>
		<div class="select_block clearfix">
			<div class="select_block_town_menu"><?=$defTowns[$default_town]['T']?></div>

			<ul class="select_town"  prices='<?=$arTowns[$default_town]['PRICES']?>'>
				<?foreach($arTowns as $ctown=>$town):?>
					<li phone="<?=$town['PH']?>" code_ph="<?=$town['CT']?> " tcode="<?=$ctown;?>" prices="<?=$town['PRICES']?>"><?=$town['T']?></li>
				<?endforeach?>
			</ul>
		</div>
	<?else:?>
<? $_SESSION["office_city"] = $arTowns[$_COOKIE['town']]['T'];?>
		<span><?if($dir=="/solutions/svetotekhnicheskie-resheniya/"){?>8 (495) 134-24-21<?}else{?><?=$arTowns[$_COOKIE['town']]['CT']?><?=$arTowns[$_COOKIE['town']]['PH']?><?}?></span>	
		<div class="select_block clearfix">
			<div class="select_block_town_menu"><?=$arTowns[$_COOKIE['town']]['T']?></div>
		
			<ul class="select_town"  prices='<?=$arTowns[$_COOKIE['town']]['PRICES']?>'>
				<?foreach($arTowns as $ctown=>$town):?>
					<li phone="<?=$town['PH']?>" code_ph="<?=$town['CT']?> " tcode="<?=$ctown;?>" prices="<?=$town['PRICES']?>"><?=$town['T']?></li>
				<?endforeach?>
			</ul>
		</div>
	<?endif;?>	
<?endif;?>

