<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вакансии");

?>
<div class="vacancy-box">
<h1>Вакансии</h1>

<p>В нашей компании всегда рады тем, кому близок активный стиль жизни Эlevel, в основу которого заложены прежде всего высокий профессионализм, взаимное доверие и нацеленность на результат.</p><br>
<p><strong>Что такое Эlevel для каждого из нас?</strong></p><br>
<table width="100%" cellspacing="2" border="0"> 
  <tbody> 
    <tr><td width="5%"><a href="/help/how_to_pay.php" title="Как оплатить заказ?" ><img hspace="5" src="/i/1s.png" vspace="5" border="0" alt="Как оплатить заказ?" title="Как оплатить заказ?"  /></a></td><td width="85%"> Это компания, где ценен опыт и достижения каждого члена коллектива. Ваш успех – это удача для всех нас. </td></tr>
   
    <tr><td width="5%"><a href="/help/delivery.php" title="Условия доставки заказа" ><img hspace="5" src="/i/2s.png" vspace="5" border="0" alt="Условия доставки заказа" title="Условия доставки заказа"  /></a></td><td width="85%"> Это чётко поставленные задачи и максимальные возможности для их решения. </td></tr>
   
    <tr><td width="5%"><a href="/help/delivery2.php" title="Условия доставки заказа для интернет-магазина" ><img hspace="5" src="/i/3s.png" vspace="5" border="0" alt="Условия доставки заказа для интернет-магазина" title="УУсловия доставки заказа для интернет-магазина"  /></a></td><td width="85%"> Это современные темпы и динамичность, инновации и перспективы. </td></tr>
   
    <tr><td width="5%"><a href="/help/feed.php" title="Как подписаться на Новости на сайте www.elevel.ru?" ><img hspace="5" src="/i/4s.png" vspace="5" border="0" alt="Как подписаться на Новости на сайте www.elevel.ru?" title="Как подписаться на Новости на сайте www.elevel.ru?"  /></a></td><td width="85%"> Это по достоинству оцениваемые заслуги и поощрение новых идей. </td></tr>
   
    <tr><td width="5%"><a href="/help/search.php" title="Как искать на сайте www.elevel.ru?" ><img hspace="5" src="/i/5s.png" vspace="5" border="0" alt="Как искать на сайте www.elevel.ru?" title="Как искать на сайте www.elevel.ru?"  /></a></td><td width="85%"> Это взаимоподдержка и профессиональный рост. </td></tr>
   
    <tr><td width="5%"><a href="/help/how_to_order.php" title="Как заказать на сайте www.elevel.ru?" ><img hspace="5" src="/i/6s.png" vspace="5" border="0" alt="Как заказать на сайте www.elevel.ru?" title="Как заказать на сайте www.elevel.ru?"  /></a></td><td width="85%"> И, наконец, это - целый мир позитива! </td></tr>
   </tbody>
 </table><br>
<p>Эlevel для молодых специалистов - это возможность реализовать свой потенциал, поддержка и знания более опытных сотрудников. Для состоявшихся специалистов – это профессиональная среда и широкие возможности. Каждый в Эlevel – творец решений с максимальным уровнем доверия.</p><br>
<p>Мы открываем новые перспективы, ставим общие цели и достигаем их благодаря тому, что мы – команда единомышленников. Для нас это не набор громких лозунгов и пустых фраз, а мировоззрение.</p><br>
<div class="border"> </div>
<p><strong>Присоединяйтесь, мы ждём Вас в Эlevel!</strong></p>
<p align="right"><em>Директор по персоналу Марич Н.Е.</em></p><br>
<?
$ServiceIBlockID = 9;
CModule::IncludeModule("iblock");
$items = GetIBlockSectionList($ServiceIBlockID, IntVal($_REQUEST['sid']));
while($arItem = $items->GetNext())
{
?>
<div class="service">
<?if(IntVal($arItem['PICTURE']) > 0):?>
	<img src="<?=CFile::GetPath($arItem['PICTURE']);?>"  />
<?endif;?>
	<h2><a href="/company/vacancy/<?=$arItem['ID']?>/"><?=$arItem['NAME']?></a></h2>
	<?=$arItem['DESCRIPTION']?>
</div>
<?
$Elements = GetIBlockElementList($ServiceIBlockID, $arItem['ID']);
while($element = $Elements->GetNext())
{
?>
<?if(IntVal($element['PREVIEW_PICTURE']) > 0):?>
	<img src="<?=CFile::GetPath($element['PREVIEW_PICTURE']);?>"  />
<?endif;?>
	<ul class="list_sol"><li><a class="gray" href="/company/vacancy/<?=$arItem['ID'];?>/<?=$element['ID']?>/"><?=$element['NAME']?></a></li></ul>
	<?=$element['PREVIEW_TEXT']?>

<?
}
?>
<?
}
?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>