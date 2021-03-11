$(document).ready(function () {

    $('.basket-quantity input').change(function () {
        var input = $(this);
        var basketId = input.data('id');
        var quantity = input.val();
        var price = input.data('price');
        var giftTimer;

        updateItemQuantity(basketId, quantity, price, $(this).closest('.cart-list__li-main').find('span.sum'));

        clearTimeout(giftTimer);
        giftTimer = setTimeout(function () {
            updateGifts();
        }, 300);

    });
    $('.basket-quantity .ui-spinner-button').click(function () {
        var input = $(this).closest('.basket-quantity').find('input.basket-item-quantity');
        var basketId = input.data('id');
        var quantity = input.val();
        var price = input.data('price');
        var giftTimer;

        updateItemQuantity(basketId, quantity, price, $(this).closest('.cart-list__li-main').find('span.sum'));

        clearTimeout(giftTimer);
        giftTimer = setTimeout(function () {
            updateGifts();
        }, 300);
    });

    $('.addgift').on('click', function(){

        _this = $(this);
        var quantity = 1;
        var product_id = _this.attr("id").substr(3);
        $.post(
            "/shop/ajax/add2basket.php",
            {
                quantity: quantity,
                productID: product_id
            },
        ).complete(function() {             
            window.location.reload();           
        });

        return false;
    });


    $('#clear-basket').click(
        function () {
            // получаем актуальную корзину
            var actualBasketItems;
            $.post(
                '/ajax/get_basket.php',
                function (response) {
                    actualBasketItems = response;
                }
            );

            $.post(
                '/ajax/clear_basket.php',
                function () {
                    // Yandex.Ecommerce
                    dataLayerYa.push({
                        "ecommerce": {
                            "remove": {
                                "products": actualBasketItems
                            }
                        }
                    });
                    // /Yandex.Ecommerce

                    window.location.reload();
                }
            );
        }
    );

});


function updateGifts(){
    var giftBlock = $('#gifts_block');
    //giftBlock.addClass('is-spin');
    $.get(
        '/personal/basket.php',
        {
            AJAX: 'Y',
        },
        function (data) {
            giftBlock.html(data);
            //giftBlock.removeClass('is-spin');
        }
    );
}

function updateItemQuantity(basketId, quantity, price, sumElement) {
    sumElement.text(nf(quantity * price));
    $('#js-cartInfo').addClass('is-spin');
    $.post(
        '/ajax/update_basket_quantity.php',
        {
            BASKET_ID: basketId,
            QUANTITY: quantity,
            PRICE: price
        },
        function (data) {
            //sumElement.text( data );
            //updateTotalSum();
            $.post(
                window.location.href ,
                {},
                function (data) {
                    var block = $(data).find('#js-cartInfo').html();
                    $('#js-cartInfo').html(block);
                    $('#js-cartInfo').removeClass('is-spin');
                }
            );
        }
    );
}
function updateTotalSum(){
    var sum = 0;
    var discount = 0;
    var priceDiscount = 10000;
    var new_discount = 0;

    var couponsActive = false, discountActive = false;

    $('.basket-item-quantity').each(
        function (index, element) {
            var quantity = $(element).attr('aria-valuenow');
            var price = $(element).data('price');
            var s = quantity * price;

            sum += s;
        }
    );

    $('.basket-item-quantity').each(
        function (index, element) {
            var quantity = $(element).attr('aria-valuenow');
            var coupon = $(element).data('coupon');

            if (coupon == 'true') couponsActive = true;

            var price = $(element).data('price');
            var s = quantity * price;

            // if (sum > priceDiscount)
            // {
            // $( element ).data( 'discount', price * 0.05 );
            // $( element ).parents('.tablet-block').find(".old_price").text(nf( price ));
            // $( element ).parents('.tablet-block').find(".current_price").text(nf( price * 0.95 ));
            // $( element ).parents('.tablet-block').find(".sum").text(nf( price * 0.95 * quantity ));
            // }
            // else
            // {
            $(element).data('discount', 0);
            $(element).parents('.tablet-block').find(".old_price").text('');
            $(element).parents('.tablet-block').find(".current_price").text(nf(price));
            $(element).parents('.tablet-block').find(".sum").text(nf(price * quantity));
            // }

            var disc = $(element).data('discount');

            if (disc > 0) discountActive = true;

            new_discount += s;

            var d = quantity * disc;
            discount += d;
        }
    );


    //if( coupon == 'true' || (sum  > priceDiscount && coupon == 'false') )
    // if( sum  > priceDiscount && !couponsActive && !discountActive)
    // {
    // //sum *= 0.95;
    // discount += new_discount * 0.05;
    // }

    $('#order-sum').text(nf(sum));
    $('#order-discount').text(nf(discount));
    $('#order-total').text(nf(sum - discount));
}

function enterCoupon() {
    var newCoupon = $('#coupon').val();
    var price = $('#order-sum').attr('data-num');
    if (newCoupon) {
        $.post(
            '/ajax/set_coupon.php',
            {
                COUPON: newCoupon,
                PRICE: price
            },
            function (data) {
                //window.location.reload();
                var _data = data;
                $('#js-cartInfo').addClass('is-spin');
                $.post(
                    window.location.href,
                    {},
                    function (data) {
                        var block = $(data).find('#js-cartInfo').html();
                        console.log(block);
                        $('#js-cartInfo').html(block);
                        $('#js-cartInfo').removeClass('is-spin');
                        if(_data=='error'){
                            $('#js-couponError').addClass('is-active');
                            setTimeout(function(){
                                $('#js-couponError').removeClass('is-active');
                            }, 2000);
                        }else if(_data=='ok'){
                            $('#js-couponOk').addClass('is-active');
                            setTimeout(function(){
                                $('#js-couponOk').removeClass('is-active');
                            }, 2000);
                        }
                    }
                );
            }
        );
    }
    return false;
}


function nf(number) {

    var i, j, kw, kd, km;


    i = parseInt(number = (+number || 0).toFixed(2)) + "";

    if ((j = i.length) > 3) {
        j = j % 3;
    } else {
        j = 0;
    }

    km = (j ? i.substr(0, j) + ' ' : "");
    kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ' ');
    kd = '.' + Math.abs(number - i).toFixed(2).replace(/-/, 0).slice(2);


    return km + kw + kd;
}