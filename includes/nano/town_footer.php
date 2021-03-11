<?
		//T - TOWN, PH - PHONE, CPH - CODE TOWN, E - email
			$arTowns = $_SESSION["TOWNS"];
/*			$arTowns=array(
				28205=>array('T'=>'Москва', 'PH'=>'363-32-03','CT'=>'8 (495)'),
				28213=>array('T'=>'Пушкино', 'PH'=>'504-25-44','CT'=>'8 (496)'),
				28214=>array('T'=>'Щелково', 'PH'=>'569-72-50','CT'=>'8 (496)'),
				33185=>array('T'=>'Сергиев Посад', 'PH'=>'552-21-66','CT'=>'8 (496)'),*/
				/*28215=>array('T'=>'Одинцово', 'PH'=>'076-24-16','CT'=>'8 (916)'),*/
/*				28208=>array('T'=>'Санкт-Петербург', 'PH'=>'324-69-95','CT'=>'8 (812)'),
				28209=>array('T'=>'Екатеринбург', 'PH'=>'449-44-11','CT'=>'8 (343)'),
				28210=>array('T'=>'Новосибирск', 'PH'=>'335-88-09','CT'=>'8 (383)'),
				28211=>array('T'=>'Ростов-на-Дону', 'PH'=>'300-78-00','CT'=>'8 (863)'),
				33192=>array('T'=>'Красноярск', 'PH'=>'216-01-26','CT'=>'8 (391)')
			);*/
			
			global $citySeo;
			global $TRGlobalSe;
			//echo $citySeo;
			//echo $TRGlobalSe;
			//$TRGlobalSe = 1;
			//$citySeo = "Ростов-на-Дону";
			
			if ($TRGlobalSe) : 
			
				if ($citySeo == "Москва")	{
					?> 
					<div class="am"><?=$citySeo?>
  						<p><span>8 (495)</span> 518-94-23</p>
 						<a href="mailto:<?=$arTowns[28205]['E']?>" ><?=$arTowns[28205]['E']?></a>
 					</div>
<?
				}
				elseif ($citySeo == "Санкт-Петербург")	{
					?>
					<div class="am"><?=$citySeo?>
  						<p><span>8 (812)</span> 313-22-93</p>
 						<a href="mailto:<?=$arTowns[28208]['E']?>" ><?=$arTowns[28208]['E']?></a>
 					</div>
<?
				}
				elseif ($citySeo == "Екатеринбург") {
					?>
					<div class="am"><?=$citySeo?>
  						<p><span>8 (343)</span> 237-23-12</p>
 						<a href="mailto:<?=$arTowns[28209]['E']?>" ><?=$arTowns[28209]['E']?></a>
 					</div>
<?
				}
				else {
					?>
					<div class="am"><?=$citySeo?>
  						<p><span>8 (800)</span> 555-09-84</p>
 						<a href="mailto:<?=$arTowns[28205]['E']?>" ><?=$arTowns[28205]['E']?></a>
 					</div>
<?
				}
			?>
			
			<?else:?>
				<?if(!isset($_COOKIE['town'])):?> 					
					<div class="am"><?=$arTowns[28205]['T']?>
  						<p><span><?=$arTowns[28205]['CT']?></span> <?=$arTowns[28205]['PH']?></p>
 						<a href="mailto:<?=$arTowns[28205]['E']?>" ><?=$arTowns[28205]['E']?></a>
 					</div>
 				<?else:?>
				<div class="am"><?=$arTowns[$_COOKIE['town']]['T']?>
  					<p>
  						<span><?=$arTowns[$_COOKIE['town']]['CT']?></span>
  						<?=$arTowns[$_COOKIE['town']]['PH']?>
  					</p>
 					<?if(isset($arTowns[$_COOKIE['town']]['E'])):?>
 						<a href="mailto:<?=$arTowns[$_COOKIE['town']]['E']?>" ><?=$arTowns[$_COOKIE['town']]['E']?></a>
 	 				<?endif;?>
 				</div> 				
 			<?endif;?>
	<?endif;?>