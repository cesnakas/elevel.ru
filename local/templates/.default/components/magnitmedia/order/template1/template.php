<h1 class="headline-border">���������� ������</h1>
<span class="order-input-error">����������, ��������� ������������ ��������� ������</span>
<? if (strlen($arResult["ERRORS"]) > 0): ?>
    <div class="text-orange">
        <?= $arResult["ERRORS"] ?>
    </div>
<? endif; ?>
<div class="order-mobile-header-container">
    <span class="order-mobile-header-back">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="40" height="40" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17 11H9.414l2.293-2.293a.999.999 0 1 0-1.414-1.414L5.586 12l4.707 4.707a.997.997 0 0 0 1.414 0a.999.999 0 0 0 0-1.414L9.414 13H17a1 1 0 0 0 0-2z" fill="#323232"/></svg>
    </span>
    <h1 class="order-mobile-header-title">���������� ������</h1>
    <span class="order-mobile-header-close">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="40" height="40" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" fill="#323232"/></svg>
    </span>
    <span class="order-mobile-header-step">��� <span class="order-mobile-header-step-number">1</span> �� 3</span>
</div>
<form class="form-confirm" action="" id="order-form" method="post">

    <fieldset class="jce-confirm-inputs">

        <? // first row ?>
        <div class="form-block jce-order-first jce-order-mobile-first">
            <h2>����� ���������</h2>
            <div class="jce-order-city-input-container">
                <input class="jce-hidden" name="SDEK_CITY" style="display: none"/>
                <span class="jce-order-city-input-label">���������� �����</span>
                <div class="input-holder">
                    <!--<input placeholder="����� ��������" type="text" name="delivery_city" value=""/>-->
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:sale.location.selector.search",
                        ".default",
                        array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "ID" => "",
                            "CODE" => "",
                            "INPUT_NAME" => "ORDER_PROP_4",
                            "PROVIDE_LINK_BY" => "id",
                            "FILTER_BY_SITE" => "N",
                            "SHOW_DEFAULT_LOCATIONS" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "JS_CONTROL_GLOBAL_ID" => "",
                            "JS_CALLBACK" => "",
                            "SUPPRESS_ERRORS" => "N",
                            "INITIALIZE_BY_GLOBAL_EVENT" => ""
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
        <div class="form-block jce-order-second jce-order-mobile-first">

            <h2>������ ���������</h2>

            <div class="columns-container delivery-row <? foreach ($arResult['PICKUP'] as $arPickup): ?>
								                       <? if ($arPickup['ID'] == 47) echo 'delivery-spb' ?>
                                                       <? endforeach; ?>" id="delivery-block">


                <? /*
                <div class="col col-3 point-sdek"> <!---<div class="col col-2">-->
                    <div class="check-row clearfix">
                        <input class="sdek" name="delivery_type" value="point_sdek" id="point_sdek" type="radio" required />
                        <div class="label-holder sdek">
                            <label for="point_sdek">�� �� ���������</label>
                        </div>
                    </div>
                </div>

                <div class="col col-3"> <!--<div class="col col-2">-->
                    <div class="check-row clearfix">
                        <input class="sdek" name="delivery_type" value="courier_sdek" id="courier_sdek" type="radio" required />
                        <div class="label-holder sdek">
                            <label for="courier_sdek">�� �� �������</label>
                        </div>
                    </div>
                </div>

                <input type='hidden' name='delivery_company'>
                */ ?>

                <? /* SDEK */ ?>

                <div class="col col-3"> <!--<div class="col col-2">-->
                    <div class="check-row clearfix">
                        <input checked="checked" class="sdek" name="delivery_type" value="courier_sdek" id="courier_sdek" type="radio"
                               required/>
                        <div class="label-holder sdek">
                            <label for="courier_sdek">���� ��������</label>
                            <span class="jce-delivery-label-comment">� ������� ��� ��� ����</span>
                            <span class="jce-delivery-label-date">� <? $dateCurr = date('d.m');
                                echo date('d.m', strtotime($dateCurr. ' +3 days'));?>, �� 3-� �.</span>
                        </div>
                    </div>

                    <? /*  <div class="form-row columns-container delivery-address" style="display: none;">
                        <div class="input-holder">
                            <input placeholder="����� ��������" type="text" name="address_sdek" value=""/>
                        </div>
                        <? ?>
                        <div class="col col-4">
                            <? /*
                                <div class="input-holder">
                                <!--<input placeholder="����� ��������" type="text" name="delivery_city" value=""/>-->
                                <? /*$APPLICATION->IncludeComponent(
                                    "bitrix:sale.location.selector.search",
                                    ".default",
                                    array(
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "ID" => "",
                                        "CODE" => "",
                                        "INPUT_NAME" => "ORDER_PROP_4",
                                        "PROVIDE_LINK_BY" => "id",
                                        "FILTER_BY_SITE" => "N",
                                        "SHOW_DEFAULT_LOCATIONS" => "N",
                                        "CACHE_TYPE" => "A",
                                        "CACHE_TIME" => "36000000",
                                        "JS_CONTROL_GLOBAL_ID" => "",
                                        "JS_CALLBACK" => "",
                                        "SUPPRESS_ERRORS" => "N",
                                        "INITIALIZE_BY_GLOBAL_EVENT" => ""
                                    ),
                                    false
                                );
                            </div>

                        </div>

                    </div> */ ?>
                </div>

                <div class="col col-3 point-sdek"> <!---<div class="col col-2">-->
                    <div class="check-row clearfix">
                        <input class="sdek" name="delivery_type" value="point_sdek" id="point_sdek" type="radio"
                               required/>
                        <div class="label-holder sdek">
                            <label for="point_sdek">���� ����� ������</label>
                        </div>
                    </div>
                    <a class="lightbox-open" id="cdek_delivery_point_button" href="#ipolsdek" style="display: none;">������� ����� ������</a>
                    <p class='point_sdek'></p>
                    <input type='hidden' name='address_point'>
                    <input type='hidden' name='delivery_company'>
                </div>



                <? ?>
                <? if (!empty($arResult['PICKUP'])): ?>

                    <div class="col col-3">    <!--<div class="col col-2">-->
                        <div class="check-row">
                            <input class="pickup" name="delivery_type" value="pickup" id="pickup"
                                   type="radio" required/>
                            <div class="label-holder pickup">
                                <label for="pickup">���������</label>
                                <span class="jce-delivery-label-comment">��� ������ ��� � ����� ������</span>
                            </div>
                        </div>
                        <select id="pickupvariants" name="delivery_pickup_point" style="display: none;">
                            <? foreach ($arResult['PICKUP'] as $arPickup): ?>
                                <option value="<?= $arPickup['ID'] ?>"><?= $arPickup['NAME'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
					</div>
					<div class="row" id="delivery_pickup_info" style="display:none" >
                    <div class="col-lg-3">
						<span class="pickupinfo">��� ������� ������ ��������� � <?= date('d.m ');?>, �������</span>
                    </div>
                    <!--
					<div class="col col-3 pickup-active visible">
						<select name="delivery_pickup_point">

							<? foreach ($arResult['PICKUP'] as $arPickup): ?>

								<option value="<?= $arPickup['ID'] ?>"><?= $arPickup['NAME'] ?></option>

							<? endforeach; ?>

						</select>
					</div>
					-->
                <? endif; ?>

            </div>


        </div>


        <div class="form-block jce-order-third jce-order-mobile-first">

            <h2>�������� ����������</h2>

            <div class="columns-container" style="margin-top:20px;">
                <div class="col col-12"> <!--<div class="col col-2">-->
                    <div class="form-row columns-container delivery-address">
                        <div class="input-holder required">
                            <input required placeholder="����� ����������" type="text" name="address_sdek" value=""/>
                        </div>
                    </div>
                </div>
            </div>
            <? /*<div class="columns-container delivery-address-extra">
                <div class="col col-4"> <!--<div class="col col-2">-->
                    <div class="form-row columns-container delivery-address-flat">
                        <div class="input-holder">
                            <input placeholder="��������" type="text" name="address_flat" value=""/>
                        </div>
                    </div>
                </div>
                <div class="col col-4"> <!--<div class="col col-2">-->
                    <div class="form-row columns-container delivery-address-entrance">
                        <div class="input-holder">
                            <input placeholder="�������" type="text" name="address_entrance" value=""/>
                        </div>
                    </div>
                </div>
                <div class="col col-4"> <!--<div class="col col-2">-->
                    <div class="form-row columns-container delivery-address-floor">
                        <div class="input-holder">
                            <input placeholder="����" type="text" name="address_floor" value=""/>
                        </div>
                    </div>
                </div>
            </div>
            */ ?>
            <div class="check-row ownership">
				<span class="mobile-row">
					<input checked="checked" name="ownership" value="1" type="radio"/>
					<div class="label-holder">
						<label for="individual">���������� ����</label>
					</div>
				</span>
                <span class="mobile-row entity-row">
					<input class="entity" name="ownership" value="4" type="radio"/>
					<div class="label-holder entity">
						<label for="entity">����������� ����</label>
					</div>
				</span>
                <span class="mobile-row entity-ip">
					<input class="entity" value="5" name="ownership" type="radio"/>
					<div class="label-holder entity">
						<label for="ip">��</label>
					</div>
				</span>
            </div>

            <div class="columns-container form-row">
                <div class="col col-12">
                    <div class="input-holder required">
                        <input placeholder="�.�.�" required type="text" name="fio"
                               value="<?= $arResult['USER_INFO']['FIO'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="columns-container">
                <div class="col col-6">
                    <div class="input-holder required">
                        <input id="phone-mask-order" required placeholder="�������" type="text" name="phone"
                               value="<?= $arResult['USER_INFO']['PHONE'] ?>"/>
                    </div>
                </div>
                <div class="col col-6">
                    <div class="input-holder required">
                        <input required placeholder="E-mail" type="email" name="email"
                               value="<?= $arResult['USER_INFO']['EMAIL'] ?>"/>
                    </div>
                </div>
            </div>

            <div class="entity-block">
                <div class="form-row columns-container">
                    <div class="col col-4">
                        <div class="input-holder required">
                            <input placeholder="���" type="text" name="inn"
                                   value="<?= $arResult['USER_INFO']['INN'] ?>"/>
                            <div id="dadata-suggestions"></div>
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="input-holder required">
                            <input placeholder="������������ �����������" type="text" name="company_name"
                                   value='<?= $arResult['USER_INFO']['COMPANY_NAME'] ?>'/>
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="input-holder">
                            <input placeholder="�������� �����" type="text" name="mailing_address"
                                   value="<?= $arResult['USER_INFO']['MAILING_ADDRESS'] ?>"/>
                        </div>
                    </div>
                </div>
                <div class="form-row columns-container">
                    <div class="col col-4">
                        <div class="input-holder required">
                            <input placeholder="������������ ����������� ��� ���" type="text"
                                   name="company_name_without_opf"
                                   value='<?= $arResult['USER_INFO']['COMPANY_NAME_WITHOUT_OPF'] ?>'/>
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="input-holder required">
                            <input placeholder="���" type="text" name="company_opf"
                                   value='<?= $arResult['USER_INFO']['COMPANY_OPF'] ?>'/>
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="input-holder required">
                            <input placeholder="������� ������������ �����������" type="text" name="company_name_short"
                                   value='<?= $arResult['USER_INFO']['COMPANY_NAME_SHORT'] ?>'/>
                        </div>
                    </div>
                </div>
                <div class="form-row columns-container">
                    <div class="col col-4">
                        <div class="input-holder">
                            <input placeholder="����������� �����" type="text" name="legal_address"
                                   value="<?= $arResult['USER_INFO']['LEGAL_ADDRESS'] ?>"/>
                        </div>
                    </div>
                    <div class="col col-4 not-for-ip">
                        <div class="input-holder">
                            <input placeholder="����������� �����" type="text" name="actual_address"
                                   value="<?= $arResult['USER_INFO']['ACTUAL_ADDRESS'] ?>"/>
                        </div>
                    </div>
                    <div class="col col-4 not-for-ip">
                        <div class="input-holder">
                            <input placeholder="���" type="text" name="kpp"
                                   value="<?= $arResult['USER_INFO']['KPP'] ?>"/>
                        </div>
                    </div>
                </div>
                <? /*?>
				<div class="form-row columns-container">
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="��������� ����" type="text" name="checking_account" value="<?=$arResult['USER_INFO']['CHECKING_ACCOUNT']?>"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="������������ �����" type="text" name="bank_name" value="<?=$arResult['USER_INFO']['BANK_NAME']?>"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="���" type="text" name="bik" value="<?=$arResult['USER_INFO']['BIK']?>"/>
						</div>
					</div>
				</div>
				<?*/ ?>

                <? /*?>
				<div class="form-row columns-container">
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="����������� ����" type="text" name="cadastre_account" value="<?=$arResult['USER_INFO']['CADASTRE_ACCOUNT']?>"/>
						</div>
					</div>
				</div>
				<?*/ ?>
            </div>
        </div>

        <div class="order-mobile-next-container">
            <a id="order-mobile-next-button">����������</a>
        </div>
        <? // second row ?>
        <div class="form-block jce-order-mobile-second">

            <h2>�������� ������ ������</h2>

            <div class="columns-container payment-row">


                <? // if ( $troro == true ): ?>

                <div class="col col-12 cloud_payment">
                    <div class="check-row">
                        <input name="payment" id="payment_card_cloudpayments" value="cloudpayments" checked="checked"
                               type="radio"/>
                        <div class="label-holder">
                            <label for="payment_card_cloudpayments">������ ������ �� �����</label>
                        </div>
                    </div>
                    <div class="text">
                        ����������� ����� Visa � MasterCard, � ����� ����� ������������ ��������� ������� ���. ��������
                        �� ���������.
                    </div>
                </div>

                <? // endif; ?>

                <? // if ( !empty( $arResult['PICKUP'] ) ): ?>

                <div class="col col-12 only-pickup-payment" id="cash_payment_container">
                    <div class="check-row">
                        <input name="payment" id="payment_cash_office" value="cash" type="radio"/>
                        <div class="label-holder">
                            <label for="payment_cash_office">������ ��� ��������� ������</label>
                        </div>

                    </div>
                    <? foreach ($arResult['PICKUP'] as $arPickup): ?>
                        <? if ($arPickup['ID'] == 47) echo '<div class="payment-unavailable" style="display: block; color: #90321f; margin-left: 31px; font-weight: 600">
                            ���������� ��� ���������� � �����-����������
                        </div>' ?>
                    <? endforeach; ?>

                    <div class="text detailed-description">
                        <? /*
							������ ������������ ��������� �������� ��� ���������� ������ � ������ ��������� ������. �������������� ����� ������ �������� ���������� �������� ���, ��������� �� ����� ��������� � ������ ������. 
							*/ ?>
                        ������ ������������ ��������� �������� ��� ���������� ������ � ������ ��������� ������. ������
                        ������ ������ �������� �� ��� ���� ��������.
                    </div>
                </div>


                <? /*
					<div class="col col-3 only-delivery-payment">
						<div class="check-row">
							<input name="payment" id="payment_cash_courier" value="courier" type="radio"/>
							<div class="label-holder">
								<label for="payment_cash_courier">��������� �������</label>
							</div>
						</div>
						<div class="text">
							�� ������ �������� ���� ����� ��������� ��� ���������� �������� � �. ������. ��������! ������ ���������� ��������, ������ ����� ��������� ������.
						</div>
					</div>
					*/ ?>

                <? // else: ?>

                <? /*
					<div class="col col-3">
						<div class="check-row">
							<input name="payment" id="payment_cash_courier" value="courier" type="radio"/>
							<div class="label-holder">
								<label for="payment_cash_courier">��������� �������</label>
							</div>
						</div>
						<div class="text">
							�� ������ �������� ���� ����� ��������� ��� ���������� �������� � �. ������. ��������! ������ ���������� ��������, ������ ����� ��������� ������.
						</div>
					</div>
					*/ ?>

                <? // endif; ?>

                <div class="col col-12 beznal" style="display: none;">
                    <div class="check-row">
                        <input name="payment" id="payment_cashless" value="cashless" type="radio"/>
                        <div class="label-holder">
                            <label for="payment_cashless">����������� ������</label>
                        </div>
                    </div>
                    <div class="text">
                        ��� ������ ������ �� ������������ �������, ����� ��������� ������, � ������� 2� ����� ���������
                        �������� �������� � ���� ��� ��������� ���� ������� ������, ����� ���� ����� ��������� ����.
                    </div>
                </div>

                <? if ($arResult['TOTAL']['PRICE'] >= 99999999999999999999999999999999999999999999999999) { ?>
                    <div class="col col-3 cloud_payment">
                        <div class="check-row">
                            <input name="payment" id="payment_credit" value="credit" type="radio"/>
                            <div class="label-holder">
                                <label for="payment_credit">������ � ���������</label>
                            </div>
                        </div>
                        <div class="text">
                            ��������� ��������������� ������ ��������
                        </div>
                    </div>
                <? } ?>

                <!--old
                <div class="col col-4">
                    <div class="check-row">
                        <input name="payment" id="payment_card" value="card" type="radio"/>
                        <div class="label-holder">
                            <label for="payment_card">������ ������ �� �����</label>
                        </div>
                    </div>
                </div>
                -->
            </div>

            <div class="columns-container" id="order-comment-field">
                <div class="col col-8  comment-block">
                    <div class="input-holder slide-block">
                        <textarea placeholder="��� �����������" cols="20" rows="7" name="comment"></textarea>
                    </div>
                </div>
            </div>

        </div>


    </fieldset>
    <? //third row ?>
    <fieldset class="jce-confirm-cart jce-order-mobile-third">



        <div class="jce-order-cart-summary">
            <div>
                <? //print_r($arResult); ?>
            </div>
            <p class="jce-order-summary-heading">��� �����</p>

            <div class="jce-order-cart-count-container">
                <span class="jce-order-cart-count__name left">������: </span>
                <span class="jce-order-cart-count__value right"><?= $arResult['TOTAL']['QUANTITY'] ?></span>
            </div>
            <div class="jce-order-cart-weight-container">
                <span class="jce-order-cart-weight__name left">����� ���: </span>
                <span class="jce-order-cart-weight__value right"><?= number_format(($arResult['TOTAL']['WEIGHT'] / 1000), 2, ',', ' ') ?></span>
            </div>

            <div class="jce-order-cart-sum-container">
                <span class="jce-order-cart-sum__name left">����� �������: </span>
                <span class="jce-order-cart-sum__value right"><?= number_format($arResult['TOTAL']['PRICE'], 2, '.', ' ') ?></span>
            </div>
        </div>
        <div class="jce-order-delivery-summary">
            <p class="jce-order-summary-heading">��������</p>
            <div class="cart-total">
                <input type='hidden' name='total-delivery'>
                <div class="jce-order-delivery-type-container">
                    <span class="jce-order-delivery-type__name left">������ ���������: </span>
                    <span class="jce-order-delivery-type__value right">���� ��������</span>
                </div>
                <div class="jce-order-delivery-address-container">
                    <span class="jce-order-delivery-address__name left">����� ��������: </span>
                    <span class="jce-order-delivery-address__value right">�� �������</span>
                </div>
                <? //<span class="discount-block">������: <?= number_format($arResult['TOTAL']['DISCOUNT'], 2, '.', ' ') ?><? // �</span> ?>
                <div class="jce-order-delivery-price-container">
                    <span class="jce-order-delivery-price__name left">��������: </span>
                    <span class="jce-order-delivery-price__value right" id="total-delivery">0</span>
                </div>
                <div class="jce-order-total-price-container">
                    <span class="jce-order total-sum"
                          data-sum="<?= $arResult['TOTAL']['PRICE'] ?>">�����: </span>
                    <span class="jce-order-total-price__value"><?= number_format($arResult['TOTAL']['PRICE'], 2, '.', ' ') ?></span>
                </div>

            </div>
        </div>

        <button class="button disabled" type="submit" id="order-submit">�������� �����</button>
        <input type="hidden" name="submit" value="y"/>
        <div class="check-row jce-agreement" style="float: none; padding: 0 0 15px;">
            <input id="agree" type="checkbox"/>
            <div class="label-holder">
                <label for="agree"><a href="/upload/usloviya konfedencialnosty elevel.ru.pdf" target="_blank">�
                        ���������� � ��� �������� �� �������� � ��������� ������������ ������</a></label>
            </div>
        </div>

        <div class="jce-order-cart-list">

        </div>


    </fieldset>
</form>