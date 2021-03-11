<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новостная рассылка");
?>

<?if(CModule::IncludeModule("subscribe")):

	$rubricIDs = array(
		13,	// Генподрядчикам и инвесторам
		12,	// Электромонтажным организациям
		11,	// Промпредприятиям и OEM-партнерам
		10,	// Поставщикам
		9,	// Архитекторам и дизайнерам
		8,	// Щитовым производствам
		7,	// Торговым компаниям
	);
?>
	<h1 class="headline news">Новостная рассылка</h1>

	<?if (!empty($_GET)):?>
		<?
		$errors = "";
		$obSubscription = new CSubscription;
		
		if ($_GET['action'] == 'add') // подписка
		{
			$email = htmlspecialchars($_GET["email"]);

			if (!check_email($email)) $errors .= "E-mail адрес '$email' указан неверно.<br/>";
					
			// собираем id рубрик
			$arRubrics = [];
			
			foreach($_GET["rubrics"] as $rubricId => $val)
				if (in_array($rubricId, $rubricIDs))
					$arRubrics[] = $rubricId;
			
			if (count($arRubrics) == 0) $errors .= "Вы не выбрали ни одну рассылку.<br/>";
			
			if (empty($errors))
			{
				// ищем подписку по текущему email
				$rsSubscription = $obSubscription->GetList(array(), array("EMAIL" => $email));
				$arSubscription = $rsSubscription->Fetch();

				if(is_array($arSubscription))
				{
					$errors .= "Ошибка. В системе уже есть подписка с таким email.";
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
					
					if ($ID) echo "Подписка на адрес " . $email . " успешно добавлена. Активируйте ее, перейдя по ссылке в письме.";
					else $errors .= $obSubscription->LAST_ERROR;
				}
			}
		}
		elseif ($_GET['action'] == 'activate') // активация
		{
			$ID = intval($_GET['ID']);
			$CONFIRM_CODE = htmlspecialchars($_GET['CONFIRM_CODE']);
			
			if ($ID && $CONFIRM_CODE)
			{
				//subscribtion confirmation
				if($obSubscription->Update($ID, array("CONFIRM_CODE"=>$CONFIRM_CODE)))	echo "Подписка успешно активирована.";
				else $errors .= $obSubscription->LAST_ERROR;
			}
		}
		elseif ($_GET['action'] == 'unsubscribe') // отписка
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
						$errors .= "При попытке удаления подписки произошла ошибка. Попробуйте еще раз.";
					else
						echo "Ваша подписка была удалена.";					
				}
				else $errors .= "Ошибка. Код подтверждения неверный.";
			}
		}
		elseif ($_GET['action'] == 'edit') // изменение
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
						// собираем id рубрик
						$arRubrics = [];
						
						foreach($_GET["rubrics"] as $rubricId => $val)
							if (in_array($rubricId, $rubricIDs))
								$arRubrics[] = $rubricId;
			
						// получаем массив ID рубрик, который должен получиться у подписки (сначала убираем из массива все новостные id, потом добавляем только выбранные)
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
						
						if ($rs) echo "Настройки подписки на www.elevel.ru для " . $arSubscription["EMAIL"] . " успешно изменены.";
						else $errors .= "При попытке изменения подписки произошла ошибка. Попробуйте еще раз.";
					}
				}
				else $errors .= "Ошибка. Код подтверждения неверный.";
			}
		}
		?>
	<?endif;?>
	
	<?if (!empty($errors)) echo $errors . "<br/>";?>
	
	<?if (
		empty($_GET) ||																// если попали на страницу в первый раз чтобы подписаться
		($_GET['action'] == 'add' && !empty($errors)) ||							// если отправили форму на подписку, но произошла ошибка
		($_GET['action'] == 'edit' && !isset($_GET['rubrics']) && empty($errors))	// если захотели отредактировать подписку и перешли по ссылке в письме, при этом ошибок нет
	):?>
		<h3>Выберите, какие новости вы хотели бы получать:</h3>

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
				<h3>Введите адрес вашей электронной почты:</h3>

				<div class="subscribe-form">
					<div class="input-holder required">
						<input name="email" required="" placeholder="Email" type="text" <?if (!empty($_GET['email'])):?>value="<?=htmlspecialchars($_GET['email'])?>"<?endif;?>>
					</div>

					<button class="button">Отправить</button>
				</div>
			<?else:?>
				<br />
				<div class="subscribe-form">
					<button class="button">Отправить</button>
				</div>
				
			<?endif;?>
		</form>
	<?
	endif;
endif;
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>