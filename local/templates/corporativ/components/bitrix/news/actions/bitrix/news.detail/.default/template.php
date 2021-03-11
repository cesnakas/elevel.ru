<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$CURRENT_SITE = (CMain::IsHTTPS()) ? "https://" : "http://";
$CURRENT_SITE .= $_SERVER["HTTP_HOST"];
$CURRENT_PAGE = $CURRENT_SITE . $APPLICATION->GetCurUri();
?>
<article class="news-article">
	<header class="news-article-heading clearfix">
		<div class="block-left">
			<h1><?=$arResult["NAME"]?></h1>
			<?if ($arResult["DATES"]):?>
				<span class="date"><?=$arResult["DATES"]?></span>
			<?endif;?>
		</div>
		<div class="popup-holder">
			<a class="link-share open" href="">Поделиться</a>
			<div class="popup">
				<div class="popup-inner">
					<ul class="social-share">
						<li><a title="facebook" target="_blank" class="fb" href="https://www.facebook.com/sharer.php?u=<?=$CURRENT_PAGE?>">facebook</a></li>
						<li><a title="vk" target="_blank" class="vk" href="https://vk.com/share.php?url=<?=$CURRENT_PAGE?>&image=<?=$CURRENT_SITE?><?=$arResult["DETAIL_PICTURE"]["SRC"]?>">vk</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<?=$arResult["DETAIL_TEXT"];?>
</article>
<?if( $APPLICATION->GetCurPage() == '/actions/dlya-shchitovikov/1656682/index.php' ):?>
<section class="section-special-offer">
	<?$APPLICATION->IncludeComponent(
		"magnitmedia:form.result.new", 
		"form2", 
		array(
			"CACHE_TIME" => "3600",
			"CACHE_TYPE" => "A",
			"CHAIN_ITEM_LINK" => "",
			"CHAIN_ITEM_TEXT" => "",
			"COMPONENT_TEMPLATE" => "form2",
			"EDIT_URL" => "",
			"FORM_TITLE" => "Спецпредложение или дополнительная услуга",
			"IGNORE_CUSTOM_TEMPLATE" => "N",
			"LIST_URL" => "",
			"MANAGER_EMAIL" => "orsch_msk@elevel.ru",
			"PAGE_URL" => "",
			"SEF_MODE" => "N",
			"SUCCESS_URL" => "",
			"USE_EXTENDED_ERRORS" => "N",
			"WEB_FORM_ID" => "102",
			"PAGE_TITLE" => "Сборщикам электрощитов",
			"VARIABLE_ALIASES" => array(
				"WEB_FORM_ID" => "WEB_FORM_ID",
				"RESULT_ID" => "RESULT_ID",
			)
		),
		false
	);?>
</section>
<?endif;?>