<h1 class="headline-border">���������� ������</h1>

<?if (strlen($arResult["ERRORS"]) > 0):?>
	<div class="text-orange">
		<?=$arResult["ERRORS"]?>
	</div>
<?endif;?>
<form class="form-confirm" action="" id="order-form" method="post">
	<fieldset>
	
		<div class="form-block">
		
			<h2>���������� ����������</h2>
			
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
				<div class="col col-4">
					<div class="input-holder">
						<input placeholder="�.�.�" type="text" name="fio" value="<?=$arResult['USER_INFO']['FIO']?>"/>
					</div>
				</div>
				<div class="col col-4">
					<div class="input-holder required">
						<input required placeholder="�������" type="text" name="phone" value="<?=$arResult['USER_INFO']['PHONE']?>"/>
					</div>
				</div>
				<div class="col col-4">
					<div class="input-holder required">
						<input required placeholder="E-mail" type="text" name="email" value="<?=$arResult['USER_INFO']['EMAIL']?>"/>
					</div>
				</div>
			</div>
			
			<div class="entity-block">
				<div class="form-row columns-container">
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="���" type="text" name="inn" value="<?=$arResult['USER_INFO']['INN']?>"/>
							<div id="dadata-suggestions"></div>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="������������ �����������" type="text" name="company_name" value="<?=$arResult['USER_INFO']['COMPANY_NAME']?>"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="�������� �����" type="text" name="mailing_address" value="<?=$arResult['USER_INFO']['MAILING_ADDRESS']?>"/>
						</div>
					</div>
				</div>
				<div class="form-row columns-container not-for-ip">
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="����������� �����" type="text" name="legal_address"  value="<?=$arResult['USER_INFO']['LEGAL_ADDRESS']?>"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="����������� �����" type="text" name="actual_address" value="<?=$arResult['USER_INFO']['ACTUAL_ADDRESS']?>"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="���" type="text" name="kpp" value="<?=$arResult['USER_INFO']['KPP']?>"/>
						</div>
					</div>
				</div>
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
			</div>
			
		</div>
		
		
		<div class="form-block">
		
			<h2>�������� ������ ��������</h2>
			
			<div class="columns-container delivery-row">
			
				<? if ( !empty( $arResult['PICKUP'] ) ): ?>
			
					<div class="col col-2">
						<div class="check-row">
							<input checked="checked" class="pickup" name="delivery_type" value="pickup" id="pickup" type="radio"/>
							<div class="label-holder pickup">
								<label for="pickup">���������</label>
							</div>
						</div>
						<div class="text">
							����: <?=date( 'd.m.y', time() + 86400 )?>
						</div>
					</div>
					<div class="col col-3 pickup-active visible">
						<select name="delivery_pickup_point">
							
							<? foreach ( $arResult['PICKUP'] as $arPickup ): ?>
							
								<option value="<?=$arPickup['ID']?>"><?=$arPickup['ADDRESS']?></option>
							
							<? endforeach; ?>

						</select>
					</div>
				
				<? endif; ?>
				
				
				<div class="col col-2">
					<div class="check-row delivery clearfix">
						<input <? if ( empty( $arResult['PICKUP'] ) ): ?>checked="checked"<? endif; ?> class="delivery" name="delivery_type" value="delivery" id="delivery" type="radio"/>
						<div class="label-holder delivery">
							<label for="delivery">��������</label>
						</div>
					</div>
					<div class="text">
						����: <?=date( 'd.m.y', time() + 86400 )?>
					</div>
				</div>
				<div class="col delivery-active <? if ( empty( $arResult['PICKUP'] ) ): ?>visible<? endif; ?>">
					
					<? if ( !empty( $arResult['PICKUP'] ) ): ?>
					
						<div class="input-holder">
							<input placeholder="����� ��������" type="text" name="delivery_address" />
						</div>
					
					<? else: ?>
					
						<select class="customOptions" name="delivery_company">
							<option value="���">���</option>
							<option value="DPD">DPD</option>
							<option value="����">����</option>
							<option value="����������������">����������������</option>
							<option value="������� �����">������� �����</option>
						</select>
					
					<? endif; ?>
					
					
					<div class="text">
						<p>�������� �������������� ���������� ������� �� �. ������. � ������ �������� �� ������������ � ����������. ������� �������� ������� 300� ��� ������ �� 10 000 ��� (+ 50 ���/�� �� ����). ���������� ��� ������ �� 10 001 ��� (+ 50 ���/�� �� ����). �������� �� ������������ �������� � ������ - ���������</p>
					</div>
				</div>
			</div>
			
		</div>
		
		
		<div class="form-block">
		
			<h2>�������� ������ ������</h2>
			
			<div class="columns-container payment-row">
				<div class="col col-4 only-pickup-payment">
					<div class="check-row">
						<input name="payment" id="payment_cash_office" checked="checked" value="8" type="radio"/>
						<div class="label-holder">
							<label for="payment_cash_office">��������� � ����� �����</label>
						</div>
					</div>
					<div class="text">
						�� ������ �������� ���� ����� �� ��������� �������, ������������ ������� � ������-������ ������ �������� �: ������, �����-����������, ������������, �������������, �������-��-����
					</div>
				</div>
				<div class="col col-4 only-delivery-payment" style="width: 30%;">
					<div class="check-row">
						<input name="payment" id="payment_cash_courier" value="1" type="radio"/>
						<div class="label-holder">
							<label for="payment_cash_courier">��������� �������</label>
						</div>
					</div>
					<div class="text">
						�� ������ �������� ���� ����� ��������� ��� ���������� �������� � �. ������. ��������! ������ ���������� ��������, ������ ����� ��������� ������.
					</div>
				</div>
				<div class="col col-4">
					<div class="check-row">
						<input name="payment" id="payment_cashless" value="2" type="radio"/>
						<div class="label-holder">
							<label for="payment_cashless">����������� ������</label>
						</div>
					</div>
					<div class="text">
						��� ������ ������ �� ������������ �������, ����� ��������� ������, � ������� 2� ����� ��������� �������� �������� � ���� ��� ��������� ���� ������� ������, ����� ���� ����� ��������� ����.
					</div>
				</div>
				<div class="col col-4">
					<div class="check-row">
						<input name="payment" id="payment_card" value="18" type="radio"/>
						<div class="label-holder">
							<label for="payment_card">������ ������ �� �����</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="columns-container">
				<div class="col col-4 open-close comment-block">
					<div>
						<button class="button opener" type="submit">�������� �����������</button>
						<div class="input-holder slide-block">
							<textarea placeholder="����� ���������" cols="30" rows="10" name="comment"></textarea>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		
		
		<div class="cart-total">
			<span class="sum-block">��������: <span id="total-delivery" >0</span> �</span>
			<span class="discount-block">
				������: <?=number_format( $arResult['TOTAL']['DISCOUNT'], 2, '.', ' ' )?> �</span>
			<strong class="total-sum" data-sum="<?=$arResult['TOTAL']['PRICE']?>" >�����: <span><?=number_format( $arResult['TOTAL']['PRICE'], 2, '.', ' ' )?></span> �</strong>
		</div>
		
		
		<div class="cart-buttons">
			<div class="check-row">
				<input checked="checked" id="agree" type="checkbox"/>
				<div class="label-holder">
					<label for="agree">� ���������� � �������� � <a href="/help/how_to_pay.php">���������� �������</a></label>
				</div>
			</div>
			<button class="button" type="submit" id="order-submit">�������� �����</button>
			<input type="hidden" name="submit" value="y" />
		</div>
		
	</fieldset>
</form>