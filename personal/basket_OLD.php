<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");?>
<?//if($USER->IsAdmin()):?>
<?session_start(); error_reporting(0);
ini_set("memory_limit","4096M");
?>
<script type="text/javascript">
    $(function(){
        var btnUpload=$('#upl_button');
        var status=$('#upl_status');
        new AjaxUpload(btnUpload, {
            action: '/ajax/uploader.php',
            name: 'upl_file',
            data: {sid : '<?=session_id()?>'},
            onSubmit: function(file, ext){
                $('.middle_popup_download').addClass('active');
                $('.popup_download_xls').addClass('active');
                $('.save_xls_list').show();
                $('.save_xls_ok').show();
                $('.save_xls_cancel').hide();
                $('#upl_status').show();
                status.html('');
                if (! (ext && /^(jpg|xls|xlsx|jpeg|png|bmp|gif|ico)$/.test(ext))){
                    status.html('Допустимые форматы:'+"<br />"+'jpg / xls / xlsx / jpeg / bmp / png / gif / ico');
                    return false;
                }
                $('#file').fadeOut(0);
                $('#loading').attr('src', '/img/loading.gif').fadeIn(0);
            },
            onComplete: function(file, response){
                status.html('');
                $('#file').html('');
                var arr_resp = response.split("#%#");
                if(arr_resp[0]==="true"){
                    $('#loading').fadeOut(0);
                    $('#file').attr('src', '/files/' + arr_resp[1]).fadeIn(0);
                }else{
                    status.html(response);
                    $('.uploader-for-errors div').each(function(){
                        if($(this).hasClass('dimension-errors')){
                            $('#popup_dimension').val("Y");
                            $('.err-dimension').html($(this).html());
                            /*$('.popup_download_dimension').addClass('active');
                            $('.popup_download_dimension').show(); */                           
                        }    
                    });
                }
            }
        });
    });
    $(document).ready(function(){
        $('.download_xls').on('click', function(){
            $('.popup_download_xls').show();    
        });          
        $('.save_xls_ok').on('click', function(){
            $('.popup_download_xls').hide();
            var arr = new Array();
            var i = 0;
            $('.multipl_goods_choose input').each(function(){
                if($(this).attr('checked') == 'checked'){
                    arr[i] = $(this).data('id');
                    arr[i+1] = $(this).data('quantity');
                    i += 2;   
                }
            });
            if($('#popup_dimension').val() == "Y"){
                $('.popup_download_dimension').show();
            }
            else{
                if(arr.length>0){
                    $.post("/ajax/ajax_to_basket.php", { elements_to_basket : arr }, function(data){window.location.reload();} );                   
                } 
                else{
                    window.location.reload();
                }
            }
        }); 
        $('.save_xls_list').on('click', function(){
            url = $('.for_download_errors').attr('href');            
            window.open(url);               
        });         
        $('.save_xls_cancel').on('click', function(){
            $('.popup_download_xls').hide();  
            
        }); 
        $('.top_popup_btn span').on('click', function(){
            $('.popup_download_xls').hide();
            if($('#popup_dimension').val() == "Y"){
                $('.popup_download_dimension').show();
            }
        })
        $('.top_popup_btn_dimension span, .bottom_popup_btn_dimension span').on('click', function(){
            $('.popup_download_dimension').removeClass('active');    
            $('.popup_download_dimension').hide(); 
            var arr = new Array();
            var i = 0;
            $('.multipl_goods_choose input').each(function(){
                if($(this).attr('checked') == 'checked'){
                    arr[i] = $(this).data('id');
                    arr[i+1] = $(this).data('quantity');
                    i += 2;   
                }
            });
            if(arr.length>0){
                $.post("/ajax/ajax_to_basket.php", { elements_to_basket : arr }, function(data){window.location.reload();} );                   
            } 
            else{
                window.location.reload();
            }
               
        });      
   
    });
</script>
<div class="download_xls"><label>Загрузить EXCEL файл</label></div>
<div class="popup_download_xls">
    <div class="popup_download_xls_btns top_popup_btn"><label>Загрузить XLS</label><span><img alt="close" src="/images/close_popup.png" /></span></div>
    <div class="middle_popup_download">
        <div id="add_file">
            <div class="xls_loader">
                <label>Выберите XLS-файл</label><div id="upl_button">загрузить файл</div>
            </div>
            <!--<hr />-->
            <!--<img id="loading" src="/img/loading.gif" height="28" style="display: none;" />-->
            <img id="file" src="" height="150" style="display: none;" />
            <div id="upl_status"></div>
            <span>Список столбцов: Наименование, Артикул, Количество (<a href="/document/basket.xls" target="_blank">Скачать шаблон</a>)</span>
        </div>
    </div>
    <div class="popup_download_xls_btns bottom_popup_btn">
        <span class="save_xls_cancel">Отменить</span>
        <span class="save_xls_ok">Ок</span>
        <span class="save_xls_list">Сохранить список</span>        
    </div>
</div>

<div class="popup_download_dimension" style="display: none;">
    <div class="popup_download_xls_btns_dimension top_popup_btn_dimension"><label>Загрузить XLS</label><span><img alt="close" src="/images/close_popup.png" /></span></div>
    <div class="err-dimension">
    </div>
    <div class="popup_download_xls_btns_dimension bottom_popup_btn_dimension">
        <span>Ок</span>       
    </div>
</div>


<div>
    <input type="hidden" name="popup_dimension" id="popup_dimension" value="N">
    <div class="steps">  
        <a class="act_step" style="cursor: pointer;" href="/personal/basket.php"><img src="/i/icon_step/step_1_act.png" alt="" />Корзина</a>
        <a style="cursor: pointer;" href="/personal/order.php"><img src="/i/icon_step/step_2.png" alt="" />Информация о покупателе</a>
        <a style="cursor: pointer;" href="/personal/order.php?del_pay=Y"><img src="/i/icon_step/step_3.png" alt="" />Доставка и оплата</a>  
    </div>
    <div id="basket">
        <?$APPLICATION->IncludeComponent(
            "tezart:sale.basket.basket", 
           	"tezart_newlevel_cart", 
            array(
                "COUNT_DISCOUNT_4_ALL_QUANTITY" => "Y",
                "COLUMNS_LIST" => array(
                    0 => "NAME",
                    1 => "DISCOUNT",
                    2 => "WEIGHT",
                    3 => "PROPS",
                    4 => "DELETE",
                    5 => "DELAY",
                    6 => "TYPE",
                    7 => "PRICE",
                    8 => "QUANTITY",
                    9 => "PROPERTY_MANUFACTURER",
                    10 => "PROPERTY_MORE_PHOTO",
                ),
                "PATH_TO_ORDER" => "/personal/order.php",
                "HIDE_COUPON" => "Y",
                "QUANTITY_FLOAT" => "N",
                "PRICE_VAT_SHOW_VALUE" => "N",
                "SET_TITLE" => "Y",
                "USE_PREPAYMENT" => "N",
                "ACTION_VARIABLE" => "action"
            ),
            false
        );?>
    </div>
</div>
<?/*else:?>
<div>
	<div id="basket">
		<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket", 
	"cart", 
	array(
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "Y",
		"COLUMNS_LIST" => array(
			0 => "NAME",
			1 => "DISCOUNT",
			2 => "WEIGHT",
			3 => "PROPS",
			4 => "DELETE",
			5 => "DELAY",
			6 => "TYPE",
			7 => "PRICE",
			8 => "QUANTITY",
			9 => "PROPERTY_MANUFACTURER",
			10 => "PROPERTY_MORE_PHOTO",
		),
		"PATH_TO_ORDER" => "/personal/order.php",
		"HIDE_COUPON" => "Y",
		"QUANTITY_FLOAT" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"SET_TITLE" => "Y",
		"USE_PREPAYMENT" => "N",
		"ACTION_VARIABLE" => "action"
	),
	false
);?>
	</div>
</div>
<?endif*/?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>