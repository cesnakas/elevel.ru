<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Новинки ассортимента компании Эlevel - по выгодным ценам самая новая продукция от ведущих производителей в магазинах Эlevel.");
$APPLICATION->SetPageProperty("keywords", "элевел, эlevel, elevel, elevel.ru, электрооборудование, электроснабжение, розетки, выключатели, электрощиты, кабель, электрика, электромонтаж, abb, schneider electric, legrand, merten, gira, bticino, lexel, elso, eljo, mk electric, t&j electric, fede, fontini, gi gambrelli, дкс, nexans, hensel, сст, sst");
$APPLICATION->SetPageProperty("title", "Новинки ассортимента Эlevel");
$APPLICATION->SetTitle("Новинки");
?>

<div class="novelty-box">
	<h1>Новинки</h1>
	<ul>
		<?
		$ServiceIBlockID = 6;
		$CurrentSectionID = false;
		CModule::IncludeModule("iblock");

		$items = GetIBlockElementList($ServiceIBlockID, $CurrentSectionID);
		while($arItem = $items->GetNext()):
		?>
		<li>
			<h2><a href="/company/novelty/<?=$arItem['ID']?>/"><?=$arItem['NAME']?></a></h2>
			<?if(IntVal($arItem['PREVIEW_PICTURE']) > 0):?>
				<div class="photo-box"><a href="/company/novelty/<?=$arItem['ID']?>/"><img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE']);?>" /></a></div>
			<?endif;?>

			<div class="preview-text"><?=TruncateText($arItem['PREVIEW_TEXT'], 150);?></div>
			<?if($_REQUEST["print"] !== "Y"):?>
				<div class="btn-wrap"><a href="/company/novelty/<?=$arItem['ID']?>/" class="lnk-detail"><span>Подробнее</span></a></div>
			<?endif;?>
		</li>
		<?endwhile?>
	</ul>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>