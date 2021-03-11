<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<?// Additional goods 07.09.2020?>
<?
if(!empty($arResult['Add_Goods']))
{ ?>
    <h2 class="js-slider-title">������������� ������</h2>
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
                                <a class="ui-pseudolink" href="<?= $arItem['DETAIL_PAGE_URL'] ?>#availability" >� �������</a>
                            </div>
                            <div class="jce-product__stock-delivery">
                                ��������: 3-5 ����
                            </div>
                        </div>
                        <div class="jce-product__price-container">
                            <a class="jce-price-number"><?= $arItem['CATALOG_PRICE_1']; ?></a><a class="jce-price-text"> ���.</a>
                        </div>
                        <div class="jce-product__buy-container">
                            <button class="jce-product__buy-button jce-button" id="add-goods_<?=$arItem['ID']?>" onclick="buy(<?= $arItem['ID'] ?>);" type="submit" name="actionADD2BASKET" title="� �������">������</button>
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
                document.getElementById('add-goods_' + product_id).innerHTML = '�������� � �������!';
                document.getElementById('add-goods_' + product_id).classList.add('success');
            });



            function onAjaxSuccess(data)
            {
                if (!!data) // �������� json ������
                {
                    var json = $.parseJSON(data);

                    if (json.count > 0)
                    {

                        $("#bx_basket1").html('<div class="block-cart full">\
							<a title="�������" class="link-cart" href="/personal/basket.php">\
									������� (' + json.count + ')<br/>\
									' + json.summ.toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.') + ' ���.\
							</a>\
						</div>');

                        $("#bx_basket2").html('<div class="block-cart popup-active">\
							<a title="�������" class="open" href="/personal/basket.php">�������</a>\
						</div>');
                    }
                    else
                    {
                        $("#bx_basket1").html('<div class="block-cart">\
							<a title="�������" class="link-cart" href="/personal/basket.php">\
									� ������� ��� �������\
							</a>\
						</div>');

                        $("#bx_basket2").html('<div class="block-cart">\
							<a title="�������" class="open" href="/personal/basket.php">�������</a>\
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
		<h2 class="js-slider-title">������� ������</h2>
	<?}elseif($arResult['PROPERTIES']['PRODUCER']['VALUE'] == 45941){?>
		<h2 class="js-slider-title">��������� ������</h2>
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
                                    echo '<a class="ui-pseudolink" href="'. $arItem['DETAIL_PAGE_URL'] .'>#availability" >� �������</a>';
                                }
                                else{
                                    echo '<a class="ui-pseudolink" href="'. $arItem['DETAIL_PAGE_URL'] .'" >��� �����</a>';
                                } ?>
                            </div>
                            <div class="jce-product__stock-delivery">
                                <? if($arItem['CATALOG_QUANTITY]'] >= 1) {
                                    echo '��������: 3-5 ����';
                                }
                                else {
                                    echo '��������: �� ��������� ���������';
                                } ?>
                            </div>
                        </div>
                        <div class="jce-product__price-container">
                            <a class="jce-price-number"><?= $arItem['CATALOG_PRICE_1']; ?></a><a class="jce-price-text"> ���.</a>
                        </div>
                        <div class="jce-product__buy-container">
                            <button class="jce-product__buy-button jce-button" id="add-goods_<?=$arItem['ID']?>" onclick="buy(<?= $arItem['ID'] ?>);" type="submit" name="actionADD2BASKET" title="� �������">������</button>
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
                document.getElementById('add-goods_' + product_id).innerHTML = '�������� � �������!';
                document.getElementById('add-goods_' + product_id).classList.add('success');
			});
			
		

			function onAjaxSuccess(data)
			{
				if (!!data) // �������� json ������
				{
					var json = $.parseJSON(data);
				
					if (json.count > 0)
					{
						$("#bx_basket1").html('<div class="block-cart full">\
							<a title="�������" class="link-cart" href="/personal/basket.php">\
									������� (' + json.count + ')<br/>\
									' + json.summ.toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.') + ' ���.\
							</a>\
						</div>');
						
						$("#bx_basket2").html('<div class="block-cart popup-active">\
							<a title="�������" class="open" href="/personal/basket.php">�������</a>\
						</div>');
					}
					else
					{
						$("#bx_basket1").html('<div class="block-cart">\
							<a title="�������" class="link-cart" href="/personal/basket.php">\
									� ������� ��� �������\
							</a>\
						</div>');
						
						$("#bx_basket2").html('<div class="block-cart">\
							<a title="�������" class="open" href="/personal/basket.php">�������</a>\
						</div>');
					}
				}
			}		
		return false;
	}
	</script>
 
<?}?>

