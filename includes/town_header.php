<?
Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("geotip");
		//T - TOWN, PH - PHONE, CPH - CODE TOWN
			global $citySeo;   
			global $TRGlobalSe;  

            $page = $APPLICATION->GetCurPage(false);
            $shopurl = explode("/", $page);
            
            if($shopurl["1"] == "shop")
            {
               //$_SESSION["TOWNS"]["28205"]["PH"]="134-25-21"; 
               $_SESSION["TOWNS"]["28205"]["PH"]="363-32-03"; 
            }
            else if($shopurl["1"] == 'help' and $shopurl["2"] == 'carry.php')
            {
               //$_SESSION["TOWNS"]["28205"]["PH"]="134-25-21"; 
               $_SESSION["TOWNS"]["28205"]["PH"]="363-32-03"; 
            }
            else
            {
               //$_SESSION["TOWNS"]["28205"]["PH"]="363-32-03"; 
               $_SESSION["TOWNS"]["28205"]["PH"]="363-32-03"; 
            }
           
            
            
            if (count($_SESSION["TOWNS"]) > 1){

                $arTowns = $_SESSION["TOWNS"];
                
			/*$arTowns=array(
				28205=>array('T'=>'������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>2),
				28213=>array('T'=>'�������', 'PH'=>'504-25-44','CT'=>'8 (496)','PRICES'=>2),
				28214=>array('T'=>'�������', 'PH'=>'569-72-50','CT'=>'8 (496)','PRICES'=>2),
				33185=>array('T'=>'������� �����', 'PH'=>'552-21-66','CT'=>'8 (496)','PRICES'=>2),
				28208=>array('T'=>'�����-���������', 'PH'=>'449-44-11','CT'=>'8 (812)','PRICES'=>3),
				28209=>array('T'=>'������������', 'PH'=>'287-01-61','CT'=>'8 (343)','PRICES'=>4),
				28210=>array('T'=>'�����������', 'PH'=>'227-71-30','CT'=>'7 (383)','PRICES'=>5), 
				28211=>array('T'=>'������-��-����', 'PH'=>'300-78-00','CT'=>'8 (863)','PRICES'=>7),
				33192=>array('T'=>'����������', 'PH'=>'216-01-26','CT'=>'8 (391)','PRICES'=>8)
			);*/    
            $arTowns2=array(
                28205=>array('T'=>$citySeo, 'PH'=>'555-09-84','CT'=>'8 (800)','PRICES'=>3),
                28206=>array('T'=>'������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>3),
				28213=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				28214=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				33185=>array('T'=>'������� �����', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				35155=>array('T'=>'������������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
                28207=>array('T'=>'�����-���������', 'PH'=>'313-22-93','CT'=>'8 (812)','PRICES'=>4),
                28208=>array('T'=>'������������', 'PH'=>'237-23-12','CT'=>'8 (343)','PRICES'=>5)
            );             
			} else {	
			$arTowns=array(
				28205=>array('T'=>'������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>3),
				28213=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				28214=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				33185=>array('T'=>'������� �����', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				35155=>array('T'=>'������������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				28208=>array('T'=>'�����-���������', 'PH'=>'313-22-93','CT'=>'8 (812)','PRICES'=>4),
				28209=>array('T'=>'������������', 'PH'=>'237-23-12','CT'=>'8 (343)','PRICES'=>5),
				28210=>array('T'=>'�����������', 'PH'=>'227-71-30','CT'=>'7 (383)','PRICES'=>6),
				28211=>array('T'=>'������-��-����', 'PH'=>'300-78-00','CT'=>'7 (863)','PRICES'=>8)
			);
			$arTowns2=array(
				28205=>array('T'=>$citySeo, 'PH'=>'555-09-84','CT'=>'8 (800)','PRICES'=>3),
				28206=>array('T'=>'������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>3),
				28213=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				28214=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				33185=>array('T'=>'������� �����', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				35155=>array('T'=>'������������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				28207=>array('T'=>'�����-���������', 'PH'=>'313-22-93','CT'=>'8 (812)','PRICES'=>4),
				28208=>array('T'=>'������������', 'PH'=>'237-23-12','CT'=>'8 (343)','PRICES'=>5)
			);
			}





			$arTowns=array(
				28205=>array('T'=>'������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>3),
				28213=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				28214=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				33185=>array('T'=>'������� �����', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				35155=>array('T'=>'������������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				28208=>array('T'=>'�����-���������', 'PH'=>'313-22-93','CT'=>'8 (812)','PRICES'=>4),
				28209=>array('T'=>'������������', 'PH'=>'237-23-12','CT'=>'8 (343)','PRICES'=>5),
				28210=>array('T'=>'�����������', 'PH'=>'227-71-30','CT'=>'7 (383)','PRICES'=>6),
				28211=>array('T'=>'������-��-����', 'PH'=>'300-78-00','CT'=>'7 (863)','PRICES'=>8)
			);
			$arTowns2=array(
				28205=>array('T'=>$citySeo, 'PH'=>'555-09-84','CT'=>'8 (800)','PRICES'=>3),
				28206=>array('T'=>'������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>3),
				28213=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				28214=>array('T'=>'�������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				33185=>array('T'=>'������� �����', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				35155=>array('T'=>'������������', 'PH'=>'363-32-03','CT'=>'8 (495)','PRICES'=>8),
				28207=>array('T'=>'�����-���������', 'PH'=>'313-22-93','CT'=>'8 (812)','PRICES'=>4),
				28208=>array('T'=>'������������', 'PH'=>'237-23-12','CT'=>'8 (343)','PRICES'=>5)
			);
			?>

    
          
			<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');

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
	   
	case "������":
		$default_town = 28206;
		break;
	case "�����-���������":
		$default_town = 28207;
		break;
	case "������������":
		$default_town = 28208;
		break;
	case "�������":
		$default_town = 28213;
		break;
	case "�������-�����":
		$default_town = 33185;
		break;
	case "������������":
		$default_town = 35155;
		break;
        
	default:
		
		break;
	}
	
} else {
	$defTowns = $arTowns;
    
}
 ?>

 <?
if ($TRGlobalSe && (!isset($_COOKIE['town'])) && 0) :/* //��� ������� ��������, ����� � ���� �������

	if ($citySeo == "������" || $citySeo == "������" || $citySeo == "�������" || $citySeo == "�������" || $citySeo == "�������-�����" || $citySeo == "������������" || $citySeo == "�������" || $citySeo == "������� ")	{		
		?><p><span><?=$citySeo?></span><a href="#">������� ����<img src="/i/pic21.gif" alt=""></a></p>
		<span class="ph1"><span>8 (495)</span> 363-32-03</span><?
	}
	elseif ($citySeo == "�����-���������")	{
		?><p><span><?=$citySeo?></span><a href="#">������� ����<img src="/i/pic21.gif" alt=""></a></p>
		<span class="ph1"><span>8 (812)</span> 313-22-93</span><?
	}
	elseif ($citySeo == "������������") {
		?><p><span><?=$citySeo?></span><a href="#">������� ����<img src="/i/pic21.gif" alt=""></a></p>
		<span class="ph1"><span>8 (343)</span> 237-23-12</span><?	
	}
	else {
		?><p><span><?=$citySeo?></span><a href="#">������� ����<img src="/i/pic21.gif" alt=""></a></p>
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
		<a href="#"><span><?=$defTowns[$default_town]['T']?></span><i class="tz-icon"></i></a>
		<span class="tz-phone"><span><?=$defTowns[$default_town]['CT']?></span> <?=$defTowns[$default_town]['PH']?></span>
		
		<div class="list171" prices='<?=$arTowns[$default_town]['PRICES']?>'>
			<a href="#"><span><?=$arTowns[$default_town]['T']?></span><i class="tz-icon"></i></a>
			<ul>
				<?foreach($arTowns as $ctown=>$town):?>
					<li phone="<?=$town['PH']?>" code_ph="<?=$town['CT']?> " tcode="<?=$ctown;?>" prices="<?=$town['PRICES']?>"><span><?=$town['T']?></span></li>
				<?endforeach?>
			</ul>
		</div>
	<?else:?>
<? $_SESSION["office_city"] = $arTowns[$_COOKIE['town']]['T'];?>
		<a href="#"><span><?=$arTowns[$_COOKIE['town']]['T']?></span><i class="tz-icon"></i></a>
		<span class="tz-phone"><span><?=$arTowns[$_COOKIE['town']]['CT']?></span> <?=$arTowns[$_COOKIE['town']]['PH']?></span>
		
		<div class="list171" prices='<?=$arTowns[$_COOKIE['town']]['PRICES']?>'>
			<a href="#"><span><?=$arTowns[$_COOKIE['town']]['T']?></span><i class="tz-icon"></i></a>
			<ul>
			<?foreach($arTowns as $ctown=>$town):?>
				<li phone="<?=$town['PH']?>" code_ph="<?=$town['CT']?> " tcode="<?=$ctown;?>" prices="<?=$town['PRICES']?>"><span><?=$town['T']?></span></li>
			<?endforeach?>
			</ul>
		</div>
	<?endif;?>	

<?endif;?>

<?Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("geotip", "");?>