<?require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');?>
<?/*
if(!CModule::IncludeModule("subscribe"))
{
	ShowError(GetMessage("SUBSCR_MODULE_NOT_INSTALLED"));
	return;
}

?><pre>
<?var_dump($_GET);?>
</pre>
<?if(isset($_GET['unsub'])){

$arFields = Array(
			"USER_ID" => ($USER->IsAuthorized()? $USER->GetID():false),
			"FORMAT" => ($_REQUEST["FORMAT"] <> "html"? "text":"html"),
			"EMAIL" => $_REQUEST["EMAIL"],
			"RUB_ID" => $_GET['unsub'],
		);

		$res = false;
		if($ID>0)
		{
			//allow edit only after authorization
			if(CSubscription::IsAuthorized($ID))
			{
				$res = $obSubscription->Update($ID, $arFields);
				if($res)
					$iMsg = ($obSubscription->LAST_MESSAGE<>""? $obSubscription->LAST_MESSAGE:"UPD");
			}
		}
		else
		{
			//can add without authorization
			$arFields["ACTIVE"] = "Y";
			$ID = $obSubscription->Add($arFields);
			$res = ($ID>0);
			if($res)
			{
				$iMsg = "SENT";
				CSubscription::Authorize($ID);
			}
		}
		
}
    ?>
<table class="table8">
			<tr>
				<td><p>E-mail:</p></td>
				<td><input type="text" class="w249" /></td>
			</tr>
			<tr>
				<td colspan="2">
				<form method="get">
					<ul>
					<?
					
$aSubscr = CSubscription::GetUserSubscription();
$aSubscrRub = CSubscription::GetRubricArray(intval($aSubscr["ID"]));

$rub = CRubric::GetList(array("SORT"=>"ASC", "NAME"=>"ASC"), array("ACTIVE"=>"Y", "LID"=>LANG));
while($rub->ExtractFields("r_")):
?>
<li><input type="checkbox" <?if(in_array($r_ID,$aSubscrRub)):?>checked="checked"<?endif;?> name="sf_RUB_ID[]" value="<?echo $r_ID?>"/><img <?if(in_array($r_ID,$aSubscrRub)):?>src="/i/pic17-checked.gif"<?else:?>src="/i/pic17-unchecked.gif"<?endif;?> alt="" /><?echo $r_NAME?><?if(in_array($r_ID,$aSubscrRub)):?><a href="?unsub=<?=$r_ID?>">Отписаться</a><?endif;?></li>
<?
endwhile;
?>
					</ul>
					<input type="submit" name="submit">
					</form>
				</td>
			</tr>
		</table>
		



<?
//var_dump()
/*$APPLICATION->IncludeComponent(
			"bitrix:subscribe.simple",
			"user",
			Array(
				"AJAX_MODE" => "N",
				"SHOW_HIDDEN" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"SET_TITLE" => "N",
				"AJAX_OPTION_SHADOW" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"AJAX_OPTION_HISTORY" => "N"
			),
		false
);*/?>
<?/*
 $APPLICATION->IncludeComponent("bitrix:subscribe.form", "personal", Array(
	"USE_PERSONALIZATION" => "Y",	// Определять подписку текущего пользователя
	"SHOW_HIDDEN" => "N",	// Показать скрытые рубрики подписки
	"PAGE" => "/personal/profile/subscribe.php",	// Страница редактирования подписки (доступен макрос #SITE_DIR#)
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	),
	false
);	*/	
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:subscribe.edit",
	"wt_subscribe",
	Array(
		"SHOW_HIDDEN" => "N",
		"ALLOW_ANONYMOUS" => "Y",
		"SHOW_AUTH_LINKS" => "Y",
		"CACHE_TIME" => "3600",
		"SET_TITLE" => "Y"
	)
);?>

<?/*$APPLICATION->IncludeComponent("bitrix:subscribe.index", ".default", Array(
	"SHOW_COUNT"	=>	"N",
	"SHOW_HIDDEN"	=>	"N",
	"PAGE"	=>	"/personal/profile/subscr_edit.php",
	"CACHE_TIME"	=>	"3600",
	"SET_TITLE"	=>	"Y"
	)
);*/?>

<?require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>