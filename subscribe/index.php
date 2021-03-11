<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������� ��������");
?>

<?if(CModule::IncludeModule("subscribe")):

	$rubricIDs = array(
		13,	// �������������� � ����������
		12,	// ���������������� ������������
		11,	// ���������������� � OEM-���������
		10,	// �����������
		9,	// ������������ � ����������
		8,	// ������� �������������
		7,	// �������� ���������
	);
?>
	<h1 class="headline news">��������� ��������</h1>

	<?if (!empty($_GET)):?>
		<?
		$errors = "";
		$obSubscription = new CSubscription;
		
		if ($_GET['action'] == 'add') // ��������
		{
			$email = htmlspecialchars($_GET["email"]);

			if (!check_email($email)) $errors .= "E-mail ����� '$email' ������ �������.<br/>";
					
			// �������� id ������
			$arRubrics = [];
			
			foreach($_GET["rubrics"] as $rubricId => $val)
				if (in_array($rubricId, $rubricIDs))
					$arRubrics[] = $rubricId;
			
			if (count($arRubrics) == 0) $errors .= "�� �� ������� �� ���� ��������.<br/>";
			
			if (empty($errors))
			{
				// ���� �������� �� �������� email
				$rsSubscription = $obSubscription->GetList(array(), array("EMAIL" => $email));
				$arSubscription = $rsSubscription->Fetch();

				if(is_array($arSubscription))
				{
					$errors .= "������. � ������� ��� ���� �������� � ����� email.";
				}
				else
				{
					$ID = $obSubscription->Add(array(
						"ACTIVE" => "Y",
						"EMAIL" => $email,
						"FORMAT" => "html",
						"CONFIRMED" => "N",
						"SEND_CONFIRM" => "Y",
						"RUB_ID" => $arRubrics,
					));
					
					if ($ID) echo "�������� �� ����� " . $email . " ������� ���������. ����������� ��, ������� �� ������ � ������.";
					else $errors .= $obSubscription->LAST_ERROR;
				}
			}
		}
		elseif ($_GET['action'] == 'activate') // ���������
		{
			$ID = intval($_GET['ID']);
			$CONFIRM_CODE = htmlspecialchars($_GET['CONFIRM_CODE']);
			
			if ($ID && $CONFIRM_CODE)
			{
				//subscribtion confirmation
				if($obSubscription->Update($ID, array("CONFIRM_CODE"=>$CONFIRM_CODE)))	echo "�������� ������� ������������.";
				else $errors .= $obSubscription->LAST_ERROR;
			}
		}
		elseif ($_GET['action'] == 'unsubscribe') // �������
		{
			$ID = intval($_GET['ID']);
			$CONFIRM_CODE = htmlspecialchars($_GET['CONFIRM_CODE']);
			
			if ($ID && $CONFIRM_CODE)
			{
				$rsSubscription = CSubscription::GetByID($ID);
				$arSubscription = $rsSubscription->Fetch();
				
				if ($arSubscription["CONFIRM_CODE"] == $CONFIRM_CODE)
				{
					if (($res = CSubscription::Delete($ID)) && $res->result != true || $res == false)
						$errors .= "��� ������� �������� �������� ��������� ������. ���������� ��� ���.";
					else
						echo "���� �������� ���� �������.";					
				}
				else $errors .= "������. ��� ������������� ��������.";
			}
		}
		elseif ($_GET['action'] == 'edit') // ���������
		{
			$ID = intval($_GET['ID']);
			$CONFIRM_CODE = htmlspecialchars($_GET['CONFIRM_CODE']);
			
			if ($ID && $CONFIRM_CODE)
			{
				$rsSubscription = CSubscription::GetByID($ID);
				$arSubscription = $rsSubscription->Fetch();
				
				if ($arSubscription["CONFIRM_CODE"] == $CONFIRM_CODE)
				{
					if (isset($_GET["rubrics"]))
					{
						// �������� id ������
						$arRubrics = [];
						
						foreach($_GET["rubrics"] as $rubricId => $val)
							if (in_array($rubricId, $rubricIDs))
								$arRubrics[] = $rubricId;
			
						// �������� ������ ID ������, ������� ������ ���������� � �������� (������� ������� �� ������� ��� ��������� id, ����� ��������� ������ ���������)
						$arNewRubrics = array_merge(
							(array) array_diff($arSubscription["RUB_ID"], $rubricIDs),
							(array) $arRubrics
						);
						
						$rs = $obSubscription->Update(
							$arSubscription["ID"],
							array(
								"FORMAT" => "html",
								"RUB_ID" => $arNewRubrics,
							),
							false
						);
						
						if ($rs) echo "��������� �������� �� www.elevel.ru ��� " . $arSubscription["EMAIL"] . " ������� ��������.";
						else $errors .= "��� ������� ��������� �������� ��������� ������. ���������� ��� ���.";
					}
				}
				else $errors .= "������. ��� ������������� ��������.";
			}
		}
		?>
	<?endif;?>
	
	<?if (!empty($errors)) echo $errors . "<br/>";?>
	
	<?if (
		empty($_GET) ||																// ���� ������ �� �������� � ������ ��� ����� �����������
		($_GET['action'] == 'add' && !empty($errors)) ||							// ���� ��������� ����� �� ��������, �� ��������� ������
		($_GET['action'] == 'edit' && !isset($_GET['rubrics']) && empty($errors))	// ���� �������� ��������������� �������� � ������� �� ������ � ������, ��� ���� ������ ���
	):?>
		<h3>��������, ����� ������� �� ������ �� ��������:</h3>

		<?  
		$arFilter = array(
			"ACTIVE" => "Y",
			"LID" => "s1",
			"VISIBLE" => "Y",
			"ID" => $rubricIDs,
		);
		$rsRubrics = CRubric::GetList(array("SORT" => "ASC"), $arFilter);
		$arRubrics = array();
		while($arRubric = $rsRubrics->GetNext())
			if (in_array($arRubric["ID"], $rubricIDs))
				$arRubrics[] = $arRubric;
		?>

		<form name="Subscribe" action="" method="GET">
			<?if ($_GET['action'] == 'edit'):?>
				<input type="hidden" name="action" value="edit">
				<input type="hidden" name="ID" value="<?=intval($_GET["ID"])?>">
				<input type="hidden" name="CONFIRM_CODE" value="<?=htmlspecialchars($_GET["CONFIRM_CODE"])?>">
			<?else:?>
				<input type="hidden" name="action" value="add">
			<?endif;?>
			<div class="subscribe-list">
				<?foreach($arRubrics as $i => $arRubric):?>
					<div class="radio-wrap">
						<input type="checkbox" class="checkbox" name="rubrics[<?=$arRubric["ID"]?>]" id="rubric<?=$arRubric["ID"]?>" <?if ($_GET['rubrics'][ $arRubric["ID"] ] == 'on'):?>checked="checked"<?endif;?>>
						<label for="rubric<?=$arRubric["ID"]?>"><?=$arRubric["NAME"]?></label>
						<div class="clear"></div>
					</div>
				<?endforeach;?>
			</div>

			<?if ($_GET['action'] != 'edit'):?>
				<h3>������� ����� ����� ����������� �����:</h3>

				<div class="subscribe-form">
					<div class="input-holder required">
						<input name="email" required="" placeholder="Email" type="text" <?if (!empty($_GET['email'])):?>value="<?=htmlspecialchars($_GET['email'])?>"<?endif;?>>
					</div>

					<button class="button">���������</button>
				</div>
			<?else:?>
				<br />
				<div class="subscribe-form">
					<button class="button">���������</button>
				</div>
				
			<?endif;?>
		</form>
	<?
	endif;
endif;
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>