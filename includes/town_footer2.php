<?
		//T - TOWN, PH - PHONE, CPH - CODE TOWN, E - email
			$arTowns = $_SESSION["TOWNS"];

			global $citySeo;
			global $TRGlobalSe;
			//echo $citySeo;
			//echo $TRGlobalSe;
			//$TRGlobalSe = 1;
			//$citySeo = "Ростов-на-Дону";
			
			if ($TRGlobalSe) : 
			
				if ($citySeo == "Москва")	{
					?> 
					<span><?=$citySeo?></span>
  					<b>8 (495)&nbsp; 363 32 03</b>	
<?
				}
				elseif ($citySeo == "Санкт-Петербург")	{
					?>
					<span><?=$citySeo?></span>
  					<b>8 (812)&nbsp; 324-69-95</b>	
<?
				}
				elseif ($citySeo == "Екатеринбург") {
					?>
					<span><?=$citySeo?></span>
  					<b>8 (343)&nbsp; 287-01-61</b>	
<?
				}
				else {
					?>
					<span><?=$citySeo?></span>
  					<b>8 (383)&nbsp; 335-88-09</b>	
<?
				}
			?>
			
			<?else:?>
			
			<?
			/*echo "_SESSION[TOWNS]<pre>"; print_r($_SESSION["TOWNS"]); echo "</pre>";
			echo "arTowns<pre>"; print_r($arTowns); echo "</pre>";
			echo "<pre>"; print_r($_COOKIE['town']); echo "</pre>"; */
			?>
			
				<?if(!isset($_COOKIE['town'])):?> 					
					<span><?=$arTowns[28205]['T']?></span>
  					<b><?=$arTowns[28205]['CT']?>&nbsp;<?=$arTowns[28205]['PH']?></b>	
 				<?else:?>
					<span><?=$arTowns[$_COOKIE['town']]['T']?></span>
  				
  					<b><?=$arTowns[$_COOKIE['town']]['CT']?>&nbsp;<?=$arTowns[$_COOKIE['town']]['PH']?></b>				
 			<?endif;?>
	<?endif;?>