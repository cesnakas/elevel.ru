<?$arTowns = $_SESSION["TOWNS"];?>

<?//T - TOWN, PH - PHONE, CPH - CODE TOWN
/*$arTowns=array(
	28205=>array('T'=>'Москва', 'PH'=>'363-32-03','CT'=>'8 (495)'),
	28213=>array('T'=>'Пушкино', 'PH'=>'504-25-44','CT'=>'8 (496)'),
	28214=>array('T'=>'Щелково', 'PH'=>'569-72-50','CT'=>'8 (496)'),
	33185=>array('T'=>'Сергиев Посад', 'PH'=>'552-21-66','CT'=>'8 (496)'),
	28208=>array('T'=>'Санкт-Петербург', 'PH'=>'449-44-11','CT'=>'8 (812)'),
	28209=>array('T'=>'Екатеринбург', 'PH'=>'449-44-11','CT'=>'8 (343)'),
	28210=>array('T'=>'Новосибирск', 'PH'=>'335-88-09','CT'=>'8 (383)'),
	28211=>array('T'=>'Ростов-на-Дону', 'PH'=>'300-78-00','CT'=>'8 (863)'),
	33192=>array('T'=>'Красноярск', 'PH'=>'216-01-26','CT'=>'8 (391)')
);*/?>

<div class="h1" style="padding-bottom:15px; ">
	Контакты в г. 
	<?if(!isset($_COOKIE['town_contact'])){?>
		<?if(!isset($_COOKIE['town'])):?>
			<span class="city"><?=$arTowns[28205]['T']?></span><span class="selector04">выбрать город<img src="/i/pic21.gif" alt="" /></span>
			
			<div class="list173">
			<p><span>Москва</span></p>
			<ul>
			<?
			foreach($arTowns as $ctown=>$town){?>
				<li phone="<?=$town['PH']?>" code_ph="<?=$town['CT']?> " tcode="<?=$ctown;?>"><span><?=$town['T']?></span></li>
			<?}?>
				</ul>
			</div>
		<?else:?>
			<span class="city"><?=$arTowns[$_COOKIE['town']]['T']?></span><span class="selector04">выбрать город<img src="/i/pic21.gif" alt="" /></span>
			<div class="list173">
			<p><span><?=$arTowns[$_COOKIE['town']]['T']?></span></p>
			<ul>
			<?
			foreach($arTowns as $ctown=>$town){
				?>
				<li phone="<?=$town['PH']?>" code_ph="<?=$town['CT']?> " tcode="<?=$ctown;?>"><span><?=$town['T']?></span></li>
			<?}?>
				</ul>
			</div>
		<?endif;?>
	<?}else{?>
		<span class="city"><?=$arTowns[$_COOKIE['town_contact']]['T']?></span><span class="selector04">выбрать город<img src="/i/pic21.gif" alt="" /></span>
		<div class="list173">
		<p><span><?=$arTowns[$_COOKIE['town_contact']]['T']?></span></p>
		<ul>
		<?
		foreach($arTowns as $ctown=>$town){
			?>
			<li phone="<?=$town['PH']?>" code_ph="<?=$town['CT']?> " tcode="<?=$ctown;?>"><span><?=$town['T']?></span></li>
		<?}?>
			</ul>
		</div>
	<?}?>
</div>