<? 
if  (!defined( 'B_PROLOG_INCLUDED' ) || B_PROLOG_INCLUDED !== true ) die();
?>



<h1 class="headline-border">���������� ������</h1>

<pre><? print_r( $arResult ) ?></pre>

<form class="form-confirm" action="">
	<fieldset>
		<div class="form-block">
			<h2>���������� ����������</h2>
				<div class="check-row ownership">
					<span class="mobile-row">
						<input checked="checked" name="ownership" id="individual" type="radio"/>
						<div class="label-holder">
							<label for="individual">���������� ����</label>
						</div>
					</span>
					<span class="mobile-row entity-row">
						<input class="entity" id="entity" name="ownership" type="radio"/>
						<div class="label-holder entity">
							<label for="entity">����������� ����</label>
						</div>
					</span>
					<span class="mobile-row">
						<input class="entity" id="ip" name="ownership" type="radio"/>
						<div class="label-holder entity">
							<label for="ip">��</label>
						</div>
					</span>
				</div>
				<div class="columns-container form-row">
					<div class="col col-4">
						<div class="input-holder required">
							<input required placeholder="�.�.�" type="text"/>
						</div>
					</div>
					<div class="col col-4">
						<div class="input-holder required">
							<input required placeholder="�������" type="text"/>
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
								<input placeholder="���" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="������������ �����������" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="���" type="text"/>
							</div>
						</div>
					</div>
					<div class="form-row columns-container">
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="����������� �����" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="����������� �����" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="�������� �����" type="text"/>
							</div>
						</div>
					</div>
					<div class="form-row columns-container">
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="��������� ����" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="������������ �����" type="text"/>
							</div>
						</div>
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="���" type="text"/>
							</div>
						</div>
					</div>
					<div class="form-row columns-container">
						<div class="col col-4">
							<div class="input-holder">
								<input placeholder="����������� ����" type="text"/>
							</div>
						</div>
					</div>
				</div>
		</div>
	</fieldset>
</form>