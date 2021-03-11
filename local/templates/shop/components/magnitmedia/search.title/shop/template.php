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
$this->setFrameMode(true);?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

/*if($arParams["SHOW_INPUT"] !== "N"):?>
	<div id="<?echo $CONTAINER_ID?>">
	<form action="<?echo $arResult["FORM_ACTION"]?>">
		<input id="<?echo $INPUT_ID?>" type="text" name="q" value="" size="40" maxlength="50" autocomplete="off" />&nbsp;<input name="s" type="submit" value="<?=GetMessage("CT_BST_SEARCH_BUTTON");?>" />
	</form>
	</div>
<?endif*/?>

<?
// Список разделов каталога для поиска. Отключен из за невозможности стандартного поиска Битрикс по подразделам.
/*
if ( $APPLICATION->GetCurDir() == '/shop/search/' && !$_GET['section'] )
{
	$_GET['section'] = 0;
}
?>
<?

<div class="block-categories popup-holder">
	<a title="Все разделы" class="open" href="">
		<span class="inner">
			<span class="text">
			
				<? if ( $_GET['section'] ): ?>
				
					<? foreach ( $arResult['SECTIONS'] as $arSection ): ?>
					
						<? if ( $arSection['ID'] == $_GET['section'] ): ?>
						
							<?
							echo $arSection['NAME'];
							break;
							?>
						
						<? endif; ?>
					
					<? endforeach; ?>
				
				<? else: ?>
					Все разделы
				<? endif; ?>
			</span>
		</span>
	</a>
	<div class="popup">
		<div class="popup-inner">
			<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<ul>
				
					<li data-id="0" class="search-section">
						<a class="close-link" itemprop="url" href="javascript:;" title="Все разделы">
							<span itemprop="name">Все разделы</span>
						</a>
					</li>
					
					<? foreach ( $arResult['SECTIONS'] as $arSection ): ?>
					
						<li data-id="<?=$arSection['ID']?>" class="search-section">
							<a class="close-link" itemprop="url" href="javascript:;" title="<?=$arSection['NAME']?>">
								<span itemprop="name"><?=$arSection['NAME']?></span>
							</a>
						</li>
					
					<? endforeach; ?>
				
				</ul>
			</nav>
		</div>
	</div>
</div>
*/
?>
<form class="search-form popup-holder" action="<?echo $arResult["FORM_ACTION"]?>" accept-charset="windows-1251">
	<fieldset id="<?=$CONTAINER_ID?>">
		<input class="open" id="<?echo $INPUT_ID?>" name="q" value="<?=urldecode($_GET['q'])?>" maxlength="80" autocomplete="off" type="text" placeholder="Введите название товара или артикул..."/>
		<input value="Поиск" type="submit"/>
		<?/*<input type="hidden" name="section" id="search-section" value="<?=$_GET['section']?>" />*/?>
	</fieldset>
</form>

<script>
	BX.ready(function(){
		new JCTitleSearch({
			'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
			'INPUT_ID': '<?echo $INPUT_ID?>',
			'MIN_QUERY_LEN': 2
		});
	});
</script>