<h1 class="headline-border">Оформление заказа</h1>

<?if (strlen($arResult["ERRORS"]) > 0):?>
	<div class="text-orange">
		<?=$arResult["ERRORS"]?>
	</div>
<?endif;?>
<form class="form-confirm" action="" id="order-form" method="post">
	<fieldset>
	
		<div class="form-block">
		
			<h2>Контактная информация</h2>
			
			<div class="check-row ownership">
				<span class="mobile-row">
					<input checked="checked" name="ownership" value="1" type="radio"/>
					<div class="label-holder">
						<label for="individual">Физическое лицо</label>
					</div>
				</span>
				<span class="mobile-row entity-row">
					<input class="entity" name="ownership" value="4" type="radio"/>
					<div class="label-holder entity">
						<label for="entity">Юридическое лицо</label>
					</div>
				</span>
				<span class="mobile-row entity-ip">
					<input class="entity" value="5" name="ownership" type="radio"/>
					<div class="label-holder entity">
						<label for="ip">ИП</label>
					</div>
				</span>
			</div>
			
			<div class="columns-container form-row">
				<div class="col col-4">
					<div class="input-holder required">
						<input placeholder="Ф.И.О" required type="text" name="fio" value="<?=$arResult['USER_INFO']['FIO']?>"/>
					</div>
				</div>
				<div class="col col-4">
					<div class="input-holder required">
						<input id="phone-mask-order" required placeholder="Телефон" type="text" name="phone" value="<?=$arResult['USER_INFO']['PHONE']?>"/>
					</div>
				</div>
				<div class="col col-4">
					<div class="input-holder required">
						<input required placeholder="E-mail" type="email" name="email" value="<?=$arResult['USER_INFO']['EMAIL']?>"/>
					</div>
				</div>
			</div>
			
			<div class="entity-block">
				<div class="form-row columns-container">
					<div class="col col-4">
						<div class="input-holder required">
							<input placeholder="ИНН" type="text" name="inn" value="<?=$arResult['USER_INFO']['INN']?>"/>
							<div id="dadata-suggestions"></div>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder required">
							<input placeholder="Наименование организации" type="text" name="company_name" value='<?=$arResult['USER_INFO']['COMPANY_NAME']?>'/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="Почтовый адрес" type="text" name="mailing_address" value="<?=$arResult['USER_INFO']['MAILING_ADDRESS']?>"/>
						</div>
					</div>
				</div>
				<div class="form-row columns-container">
					<div class="col col-4">
						<div class="input-holder required">
							<input placeholder="Наименование организации без ОПФ" type="text" name="company_name_without_opf" value='<?=$arResult['USER_INFO']['COMPANY_NAME_WITHOUT_OPF']?>'/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder required">
							<input placeholder="ОПФ" type="text" name="company_opf" value='<?=$arResult['USER_INFO']['COMPANY_OPF']?>'/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder required">
							<input placeholder="Краткое наименование организации" type="text" name="company_name_short" value='<?=$arResult['USER_INFO']['COMPANY_NAME_SHORT']?>'/>
						</div>
					</div>
				</div>
				<div class="form-row columns-container">
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="Юридический адрес" type="text" name="legal_address"  value="<?=$arResult['USER_INFO']['LEGAL_ADDRESS']?>"/>
						</div>
					</div>
					<div class="col col-4 not-for-ip">
						<div class="input-holder">
							<input placeholder="Фактический адрес" type="text" name="actual_address" value="<?=$arResult['USER_INFO']['ACTUAL_ADDRESS']?>"/>
						</div>
					</div>
					<div class="col col-4 not-for-ip">
						<div class="input-holder">
							<input placeholder="КПП" type="text"  name="kpp" value="<?=$arResult['USER_INFO']['KPP']?>"/>
						</div>
					</div>
				</div>
				<?/*?>
				<div class="form-row columns-container">
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="Расчетный счет" type="text" name="checking_account" value="<?=$arResult['USER_INFO']['CHECKING_ACCOUNT']?>"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="Наименование банка" type="text" name="bank_name" value="<?=$arResult['USER_INFO']['BANK_NAME']?>"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="БИК" type="text" name="bik" value="<?=$arResult['USER_INFO']['BIK']?>"/>
						</div>
					</div>
				</div>
				<?*/?>
				
				<?/*?>
				<div class="form-row columns-container">
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="Кадастровый счет" type="text" name="cadastre_account" value="<?=$arResult['USER_INFO']['CADASTRE_ACCOUNT']?>"/>
						</div>
					</div>
				</div>
				<?*/?>				
			</div>
		</div>
		
		
		<div class="form-block">
		
			<h2>Выберите способ доставки</h2>
			
			<div class="columns-container delivery-row" id="delivery-block">
			
				<? if ( !empty( $arResult['PICKUP'] ) ): ?>
			
					<div class="col col-3">	<!--<div class="col col-2">-->
						<div class="check-row">
							<input checked="checked" class="pickup" name="delivery_type" value="pickup" id="pickup" type="radio" required />
							<div class="label-holder pickup">
								<label for="pickup">Самовывоз</label>
							</div>
						</div>	
						<select name="delivery_pickup_point">						
							<? foreach ( $arResult['PICKUP'] as $arPickup ): ?>							
								<option value="<?=$arPickup['ID']?>"><?=$arPickup['NAME']?></option>							
							<? endforeach; ?>
						</select>						
					</div>
				
					<!--
					<div class="col col-3 pickup-active visible">
						<select name="delivery_pickup_point">
							
							<? foreach ( $arResult['PICKUP'] as $arPickup ): ?>
							
								<option value="<?=$arPickup['ID']?>"><?=$arPickup['NAME']?></option>
							
							<? endforeach; ?>

						</select>
					</div>
					-->
				<? endif; ?>				
				
				<div class="col col-3 point-sdek"> <!---<div class="col col-2">-->
					<div class="check-row clearfix">
						<input class="sdek" name="delivery_type" value="point_sdek" id="point_sdek" type="radio" required />
						<div class="label-holder sdek">
							<label for="point_sdek">ТК до терминала</label>
						</div>
					</div>					
				</div>
				
				<div class="col col-3"> <!--<div class="col col-2">-->
					<div class="check-row clearfix">
						<input class="sdek" name="delivery_type" value="courier_sdek" id="courier_sdek" type="radio" required />
						<div class="label-holder sdek">
							<label for="courier_sdek">ТК до клиента</label>
						</div>
					</div>								
				</div>								
			
				<input type='hidden' name='delivery_company'>
				
				<? /* SDEK 
				<div class="col col-3 point-sdek"> <!---<div class="col col-2">-->
					<div class="check-row clearfix">
						<input class="sdek" name="delivery_type" value="point_sdek" id="point_sdek" type="radio" required />
						<div class="label-holder sdek">
							<label for="point_sdek">Пункт выдачи СДЭК</label>
						</div>
					</div>					
					<a class="lightbox-open" id="cdek_delivery_point_button" href="#ipolsdek">Выбрать пункт самовывоза</a>
					<p class='point_sdek'></p>
					<input type='hidden' name='address_point'>
					<input type='hidden' name='delivery_company'>
				</div>
				
				<div class="col col-3"> <!--<div class="col col-2">-->
					<div class="check-row clearfix">
						<input class="sdek" name="delivery_type" value="courier_sdek" id="courier_sdek" type="radio" required />
						<div class="label-holder sdek">
							<label for="courier_sdek">Доставка курьером СДЭК</label>
						</div>
					</div>					
					
					<div class="form-row columns-container delivery-address" style="display: none;">
						<div class="input-holder">
							<input placeholder="Адрес доставки" type="text" name="address_sdek" value="" />
						</div>
						<?/*?>
						<div class="col col-4">
							<div class="input-holder">
								<!--<input placeholder="Город доставки" type="text" name="delivery_city" value=""/>-->
								<?$APPLICATION->IncludeComponent(
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
								);?>
							</div>
						</div>				
						<??>
					</div>	
				</div>
				*/?>
				
			</div>			
			
			<div class="columns-container" style="margin-top:20px;">
				<div class="col col-3"> <!--<div class="col col-2">-->
					<div class="form-row columns-container delivery-address" style="display: none;">
						<div class="input-holder">
							<input placeholder="Адрес доставки" type="text" name="address_sdek" value="" />
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="form-block">
		
			<h2>Выберите способ Оплаты</h2>
			
			<div class="columns-container payment-row">
			
				<div class="col col-4 cloud_payment">
					<div class="check-row">
						<input name="payment" id="payment_card_cloudpayments" value="cloudpayments" checked="checked" type="radio"/>
						<div class="label-holder">
							<label for="payment_card_cloudpayments">Оплата картой на сайте</label>
						</div>
					</div>
					<div class="text">
						Оплата картой осуществляется через сервис CloudPayments. Принимаются карты Visa и MasterCard, а также по карты национальной платежной системы МИР. Проценты не взымаются.
					</div>
				</div>
			
				<? if ( !empty( $arResult['PICKUP'] ) ): ?>
				
					<div class="col col-3 only-pickup-payment">
						<div class="check-row">
							<input name="payment" id="payment_cash_office" value="cash" type="radio"/>
							<div class="label-holder">
								<label for="payment_cash_office">Наличными в кассе офиса</label>
							</div>
						</div>
						<div class="text">
							Вы можете оплатить свой заказ по наличному расчёту, банковскеими картами в кассах-офисах продаж компании в: Москве, Санкт-Петербурге, Новосибирске, Екатеринбурге, Ростове-на-Дону
						</div>
					</div>
					
					<div class="col col-3 only-delivery-payment">
						<div class="check-row">
							<input name="payment" id="payment_cash_courier" value="courier" type="radio"/>
							<div class="label-holder">
								<label for="payment_cash_courier">Наличными курьеру</label>
							</div>
						</div>
						<div class="text">
							Вы можете оплатить свой заказ наличными при курьерской доставке в г. Москве. Внимание! Заказы передаются курьером, только после получения оплаты.
						</div>
					</div>
					
				<? else: ?>
				
					<div class="col col-3">
						<div class="check-row">
							<input name="payment" id="payment_cash_courier" value="courier" type="radio"/>
							<div class="label-holder">
								<label for="payment_cash_courier">Наличными курьеру</label>
							</div>
						</div>
						<div class="text">
							Вы можете оплатить свой заказ наличными при курьерской доставке в г. Москве. Внимание! Заказы передаются курьером, только после получения оплаты.
						</div>
					</div>
				
				<? endif; ?>
				
				<div class="col col-3">
					<div class="check-row">
						<input name="payment" id="payment_cashless" value="cashless" type="radio"/>
						<div class="label-holder">
							<label for="payment_cashless">Безналичный расчет</label>
						</div>
					</div>
					<div class="text">
						При оплате заказа по безналичному расчету, после обработки заказа, в течении 2х часов сотрудник компании свяжется с Вами для уточнения всех деталей заказа, после чего будет выставлен счет.
					</div>
				</div>
				
                <? if ($arResult['TOTAL']['PRICE'] >= 3000) { ?>
                    <div class="col col-3 cloud_payment">
                        <div class="check-row">
                            <input name="payment" id="payment_credit" value="credit" type="radio"/>
                            <div class="label-holder">
                                <label for="payment_credit">Купить в рассрочку</label>
                            </div>
                        </div>
                        <div class="text">
                            Рассрочка предоставляется банком Тинькофф
                        </div>
                    </div>
                <? } ?>

				<!--old
				<div class="col col-4">
					<div class="check-row">
						<input name="payment" id="payment_card" value="card" type="radio"/>
						<div class="label-holder">
							<label for="payment_card">Оплата картой на сайте</label>
						</div>
					</div>
				</div>
				-->
			</div>
			
			<div class="columns-container">
				<div class="col col-4 open-close comment-block">
					<div>
						<button class="button opener" type="button">Оставить комментарий</button>
						<div class="input-holder slide-block">
							<textarea placeholder="Текст сообщения" cols="30" rows="10" name="comment"></textarea>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		
		
		<div class="cart-total">
			<input type='hidden' name='total-delivery'>
			<span class="sum-block">Доставка: <span id="total-delivery" >0</span> Р</span>
			<span class="discount-block">
				Скидка: <?=number_format( $arResult['TOTAL']['DISCOUNT'], 2, '.', ' ' )?> Р</span>
			<strong class="total-sum" data-sum="<?=$arResult['TOTAL']['PRICE']?>" >Итого: <span><?=number_format( $arResult['TOTAL']['PRICE'], 2, '.', ' ' )?></span> Р</strong>
		</div>
		
		
		<div class="cart-buttons">
			<div class="check-row" style="float: none; padding: 0 0 15px;">
				<input id="agree" type="checkbox"/>
				<div class="label-holder">
					<label for="agree"><a href="/upload/usloviya konfedencialnosty elevel.ru.pdf" target="_blank">Я ознакомлен и даю согласие на передачу и обработку персональных данных</a></label>
				</div>
			</div>
			<button class="button disabled" type="submit" id="order-submit">Оформить заказ</button>
			<input type="hidden" name="submit" value="y" />
		</div>
		
	</fieldset>
</form>