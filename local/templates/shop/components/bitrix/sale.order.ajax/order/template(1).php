<? 
if  (!defined( 'B_PROLOG_INCLUDED' ) || B_PROLOG_INCLUDED !== true ) die();
?>



<h1 class="headline-border">Оформление заказа</h1>

<pre><? print_r( $arResult ) ?></pre>

<form class="form-confirm" action="">
	<fieldset>
		<div class="form-block">
			<h2>Контактная информация</h2>
				<div class="check-row ownership">
					<span class="mobile-row">
						<input checked="checked" name="ownership" id="individual" type="radio"/>
						<div class="label-holder">
							<label for="individual">Физическое лицо</label>
						</div>
					</span>
					<span class="mobile-row entity-row">
						<input class="entity" id="entity" name="ownership" type="radio"/>
						<div class="label-holder entity">
							<label for="entity">Юридическое лицо</label>
						</div>
					</span>
					<span class="mobile-row">
						<input class="entity" id="ip" name="ownership" type="radio"/>
						<div class="label-holder entity">
							<label for="ip">ИП</label>
						</div>
					</span>
				</div>
				<div class="columns-container form-row">
					<div class="col col-4">
						<div class="input-holder required">
							<input required placeholder="Ф.И.О" type="text"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder required">
							<input required placeholder="Телефон" type="text"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder">
							<input placeholder="E-mail" type="text"/>
						</div>
					</div>
				</div>
				<div class="entity-block">
					<div class="form-row columns-container">
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="ИНН" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="Наименование организации" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="КПП" type="text"/>
							</div>
						</div>
					</div>
					<div class="form-row columns-container">
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="Юридический адрес" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="Фактический адрес" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="Почтовый адрес" type="text"/>
							</div>
						</div>
					</div>
					<div class="form-row columns-container">
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="Расчетный счет" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="Наименование банка" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="БИК" type="text"/>
							</div>
						</div>
					</div>
					<div class="form-row columns-container">
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="Кадастровый счет" type="text"/>
							</div>
						</div>
					</div>
				</div>
		</div>
	</fieldset>
</form>