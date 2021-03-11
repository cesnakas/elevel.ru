<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<?// Additional goods 07.09.2020?>
<?
if(!empty($arResult['Add_Goods']))
{ ?>
    <h2 class="js-slider-title">Сопутствующие товары</h2>
    <? $lineCountAdditional = 2;
    foreach ($arResult['Add_Goods'] as $key => $arItem) {
        if (strlen($arItem['NAME']) > 35 && strlen($arItem['NAME']) <= 50){
            $lineCountAdditional = 3;
        } elseif (strlen($arItem['NAME']) > 50 && strlen($arItem['NAME']) <= 65){
            $lineCountAdditional = 4;
        } elseif (strlen($arItem['NAME']) > 65 && strlen($arItem['NAME']) <= 80){
            $lineCountAdditional = 5;
        }
    } ?>
    <div id="id-slide-blocks-additional" class="slide-blocks-additional jce-horizontal-mobile lines-count__<?=$lineCountAdditional;?>">
        <? foreach ($arResult['Add_Goods'] as $key => $arItem) { ?>

            <? if ($arItem['CATALOG_PRICE_1'] < 5000 && $arItem['CATALOG_PRICE_1'] > 50) {
                ?>
                <div class="jce-element-wrapper">
                    <div class="jce-product">
                        <div class="jce-product__image-wrapper">
                            <a class="jce-product__image-link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <img class="jce-product__image" src="<?= $arItem['PICTURE_SRC'] ?>">
                            </a>
                        </div>
                        <div class="jce-product__title-container">
                            <a class="jce-product__title" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <?= $arItem['NAME'] ?>
                            </a>
                        </div>
                        <div class="jce-product__stock-container">
                            <div class="jce-product__stock-shops">
                                <a class="ui-pseudolink" href="<?= $arItem['DETAIL_PAGE_URL'] ?>#availability" >В наличии</a>
                            </div>
                            <div class="jce-product__stock-delivery">
                                Доставка: 3-5 дней
                            </div>
                        </div>
                        <div class="jce-product__price-container">
                            <a class="jce-price-number"><?= $arItem['CATALOG_PRICE_1']; ?></a><a class="jce-price-text"> руб.</a>
                        </div>
                        <div class="jce-product__buy-container">
                            <button class="jce-product__buy-button jce-button" id="add-goods_<?=$arItem['ID']?>" onclick="buy(<?= $arItem['ID'] ?>);" type="submit" name="actionADD2BASKET" title="В корзину">Купить</button>
                        </div>

                    </div>
                </div>

            <? }
        }?>

    </div>
    <br>
    <br>
    <script>
        function buy( product_id )
        {

            $.post(
                "/shop/ajax/add2basket.php",
                {
                    quantity: 1,
                    productID: product_id
                },
                onAjaxSuccess
            ).complete(function() {
                document.getElementById('add-goods_' + product_id).innerHTML = 'Добавлен в корзину!';
                document.getElementById('add-goods_' + product_id).classList.add('success');
            });



            function onAjaxSuccess(data)
            {
                if (!!data) // получили json данные
                {
                    var json = $.parseJSON(data);

                    if (json.count > 0)
                    {

                        $("#bx_basket1").html('<div class="block-cart full">\
							<a title="Корзина" class="link-cart" href="/personal/basket.php">\
									Товаров (' + json.count + ')<br/>\
									' + json.summ.toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.') + ' руб.\
							</a>\
						</div>');

                        $("#bx_basket2").html('<div class="block-cart popup-active">\
							<a title="Корзина" class="open" href="/personal/basket.php">Корзина</a>\
						</div>');
                    }
                    else
                    {
                        $("#bx_basket1").html('<div class="block-cart">\
							<a title="Корзина" class="link-cart" href="/personal/basket.php">\
									В корзине нет товаров\
							</a>\
						</div>');

                        $("#bx_basket2").html('<div class="block-cart">\
							<a title="Корзина" class="open" href="/personal/basket.php">Корзина</a>\
						</div>');
                    }
                }
            }
            return false;
        }
    </script>

<?}?>

<?
if(!empty($arResult['SIMILAR_PROD']))
{
	//$this->addExternalCss(SITE_TEMPLATE_PATH."/css/slick.css");
	//$this->addExternalCss(SITE_TEMPLATE_PATH."/css/slick-theme.css");
	//$this->addExternalJs(SITE_TEMPLATE_PATH."/js/slick.js");
	if($arResult['PROPERTIES']['PRODUCER']['VALUE'] == 45895){?>
		<h2 class="js-slider-title">Похожие товары</h2>
	<?}elseif($arResult['PROPERTIES']['PRODUCER']['VALUE'] == 45941){?>
		<h2 class="js-slider-title">Связанные товары</h2>
	<?}?>

    <? $lineCountSimilar = 2;
    foreach ($arResult['SIMILAR_PROD'] as $key => $arItem) {
        if (strlen($arItem['NAME']) > 38 && strlen($arItem['NAME']) <= 50){
            $lineCountSimilar = 3;
        } elseif (strlen($arItem['NAME']) > 50 && strlen($arItem['NAME']) <= 65){
            $lineCountSimilar = 4;
        } elseif (strlen($arItem['NAME']) > 65 && strlen($arItem['NAME']) <= 80){
            $lineCountSimilar = 5;
        }
    } ?>

    <div id="id-slide-blocks-similar" class="slide-blocks-similar jce-horizontal-mobile lines-count__<?=$lineCountSimilar;?>">
        <? foreach ($arResult['SIMILAR_PROD'] as $key => $arItem) { ?>

            <? if ($arItem['CATALOG_PRICE_1'] != null) {
                ?>
                <div class="jce-element-wrapper">
                    <div class="jce-product">
                        <div class="jce-product__image-wrapper">
                            <a class="jce-product__image-link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <img class="jce-product__image" src="<?= $arItem['PICTURE_SRC'] ?>">
                            </a>
                        </div>
                        <div class="jce-product__title-container">
                            <a class="jce-product__title" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <?= $arItem['NAME'] ?>
                            </a>
                        </div>
                        <div class="jce-product__stock-container">
                            <div class="jce-product__stock-shops">
                                <? if($arItem['CATALOG_QUANTITY]'] >= 1) {
                                    echo '<a class="ui-pseudolink" href="'. $arItem['DETAIL_PAGE_URL'] .'>#availability" >В наличии</a>';
                                }
                                else{
                                    echo '<a class="ui-pseudolink" href="'. $arItem['DETAIL_PAGE_URL'] .'" >Под заказ</a>';
                                } ?>
                            </div>
                            <div class="jce-product__stock-delivery">
                                <? if($arItem['CATALOG_QUANTITY]'] >= 1) {
                                    echo 'Доставка: 3-5 дней';
                                }
                                else {
                                    echo 'Доставка: по уточнению менеджера';
                                } ?>
                            </div>
                        </div>
                        <div class="jce-product__price-container">
                            <a class="jce-price-number"><?= $arItem['CATALOG_PRICE_1']; ?></a><a class="jce-price-text"> руб.</a>
                        </div>
                        <div class="jce-product__buy-container">
                            <button class="jce-product__buy-button jce-button" id="add-goods_<?=$arItem['ID']?>" onclick="buy(<?= $arItem['ID'] ?>);" type="submit" name="actionADD2BASKET" title="В корзину">Купить</button>
                        </div>

                    </div>
                </div>

            <? }
        }?>

    </div>


	<script>
	/* $(function(){
		$('#id-slide-blocks-recommended-prod').slick({
		  slidesToShow: 6,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 5000,
		  dots: false,
		  infinite: true,
		  speed: 300,
		  //slidesToShow: 1,
		  centerMode: false,
		  variableWidth: true
		})

	})
	 */

	function buy( product_id )
	{
		 
		$.post(
				"/shop/ajax/add2basket.php",
				{
					quantity: 1,
					productID: product_id
				},
				onAjaxSuccess
			).complete(function() {
                document.getElementById('add-goods_' + product_id).innerHTML = 'Добавлен в корзину!';
                document.getElementById('add-goods_' + product_id).classList.add('success');
			});
			
		

			function onAjaxSuccess(data)
			{
				if (!!data) // получили json данные
				{
					var json = $.parseJSON(data);
				
					if (json.count > 0)
					{
						$("#bx_basket1").html('<div class="block-cart full">\
							<a title="Корзина" class="link-cart" href="/personal/basket.php">\
									Товаров (' + json.count + ')<br/>\
									' + json.summ.toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.') + ' руб.\
							</a>\
						</div>');
						
						$("#bx_basket2").html('<div class="block-cart popup-active">\
							<a title="Корзина" class="open" href="/personal/basket.php">Корзина</a>\
						</div>');
					}
					else
					{
						$("#bx_basket1").html('<div class="block-cart">\
							<a title="Корзина" class="link-cart" href="/personal/basket.php">\
									В корзине нет товаров\
							</a>\
						</div>');
						
						$("#bx_basket2").html('<div class="block-cart">\
							<a title="Корзина" class="open" href="/personal/basket.php">Корзина</a>\
						</div>');
					}
				}
			}		
		return false;
	}
	</script>
 
<?}?>

