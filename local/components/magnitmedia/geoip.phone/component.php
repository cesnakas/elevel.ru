<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	/** @var CBitrixComponent $this */
	/** @var array $arParams */
	/** @var array $arResult */
	/** @var string $componentPath */
	/** @var string $componentName */
	/** @var string $componentTemplate */
	/** @global CDatabase $DB */
	/** @global CUser $USER */
	/** @global CMain $APPLICATION */
	/** @global CCacheManager $CACHE_MANAGER */


	use Bitrix\Main\Loader;
	use \Bitrix\Main\Localization\Loc as Loc;

	Loc::loadMessages(__FILE__);

	$this->setFrameMode(true);

	\CJSCore::Init();

	$PARTNER_COMPONENT_ID = 'BXMAKER.GEOIP.MESSAGE';
	$BXMAKER_MODULE_ID            = "bxmaker.geoip";

	if (!Loader::includeSharewareModule($BXMAKER_MODULE_ID)) {
		ShowError(GetMessage($PARTNER_COMPONENT_ID . "_MODULE_NOT_INSTALLED"));
		return false;
	}
	Loader::includeModule($BXMAKER_MODULE_ID);
	Loader::includeModule('iblock');


	$oManager               = \Bxmaker\GeoIP\Manager::getInstance();

	
	$arParams['CACHE_TYPE'] = (isset($arParams['CACHE_TYPE']) ? $arParams['CACHE_TYPE'] : 'A');
	$arParams['CACHE_TIME'] = (isset($arParams['CACHE_TIME']) ? $arParams['CACHE_TIME'] : 3600);
	$arParams['TYPE']       = (isset($arParams['TYPE']) && strlen(trim($arParams['TYPE'])) > 0 ? $arParams['TYPE'] : '');
	$arParams['CITY']       = (isset($arParams['CITY']) && strlen(trim($arParams['CITY'])) > 0 ? $arParams['CITY'] : $oManager->getCity());
	$arParams['LOCATION']       = (isset($arParams['LOCATION']) && strlen(trim($arParams['LOCATION'])) > 0 ? $arParams['LOCATION'] : $oManager->getLocation());
	$arParams['AJAX']       = (isset($arParams['AJAX']) && $arParams['AJAX'] == 'Y' ? 'Y' : 'N');


	$arParams['SUBDOMAIN_ON']           = $oManager->getParam('SUBDOMAIN_ON', 'N');
	$arParams['BASE_DOMAIN']           = $oManager->getParam('BASE_DOMAIN', $oManager->getBaseDomain());
	$arParams['COOKIE_PREFIX'] = $oManager->getCookiePrefix();
	$arParams['PAGE'] = $APPLICATION->GetCurPage(false);


	if ($arParams["CACHE_TYPE"] == "N" || $arParams["CACHE_TYPE"] == "A" && COption::GetOptionString("main", "component_cache_on", "Y") == "N") {
		$CACHE_TIME = 0;
	}
	else {
		$CACHE_TIME = $arParams["CACHE_TIME"];
	}

	if ($this->StartResultCache($CACHE_TIME)) {


		$arResult = array(
			'DEFAULT' => array(),
			'CURRENT' => array(),
			'DEBUG' =>  $oManager->getParam('DEBUG', 'N')
		);

		if (defined('BX_COMP_MANAGED_CACHE') && is_object($GLOBALS['CACHE_MANAGER']))
		{
			$GLOBALS['CACHE_MANAGER']->RegisterTag('bxmaker_geoip_message');
		}


		$arLocationGroupId = array();
		if(Loader::includeModule('sale'))
		{
			$dbGroup = \CSaleLocationGroup::GetLocationList(array("LOCATION_ID" => $arParams['LOCATION']));
			while ($arGroup = $dbGroup->Fetch()) {
				$arLocationGroupId[] = $arGroup['LOCATION_GROUP_ID'];
			}
		}
		
		// default value
		$arResult['PHONE'] = "";
		
		// if there is bxmaker settings - use them 
		$oMessage = new \Bxmaker\GeoIP\MessageTable();
		$dbr      = $oMessage->getList(array(
			'filter' => array(
				'TYPE.TYPE'    => $arParams['TYPE'],
				'TYPE.SITE_ID' => SITE_ID
			)
		));
		if ($ar = $dbr->fetch()) {
			
			if(strlen($ar['MESSAGE']) > 0)
				$arResult['PHONE'] = $ar['MESSAGE'];
			
		}
		
		// search for iblock settings
		if(!empty($arLocationGroupId)){
			
			if(Loader::includeModule('iblock'))
			{
				// search for iblock
				$rsIblock = CIBlock::GetList(
					Array(), 
					Array(
						// 'SITE_ID' => SITE_ID, 
						'ACTIVE' => 'Y', 
						"CODE" => 'phone_number_settings',
						"CHECK_PERMISSIONS" => "N"
					), false
				);
		
				if($arIblock = $rsIblock->Fetch())
				{
					
					$arSelect = Array(
						"ID", 
						"NAME", 
						"IBLOCK_ID",
						"PROPERTY_PHONE"
					);
					$arFilter = Array(
						"IBLOCK_ID" => $arIblock['ID'], 
						// "PROPERTY_LOCATION_GROUP" => $arLocationGroupId,
						"PROPERTY_PAGE_URL" => $arParams['PAGE'],
						
					);
					
					if(count($arLocationGroupId) == 1)
						$arFilter["PROPERTY_LOCATION_GROUP"] = $arLocationGroupId[0];
					else{
						
						$arFilterLocation = array(
							"LOGIC" => "OR",
						);
						
						foreach($arLocationGroupId as $groupId){
							$arFilterLocation[] = array(
								"PROPERTY_LOCATION_GROUP" => $groupId
							);
						}
						
						$arFilter[] = $arFilterLocation;
					}
					
					$rsPhoneSettings = CIBlockElement::GetList(Array("SORT" => "DESC"), $arFilter, false, false, $arSelect);
					if($arPhoneSettings = $rsPhoneSettings->GetNext())
					{
						
						if(strlen($arPhoneSettings['PROPERTY_PHONE_VALUE']) > 0){
							
							$arResult['PHONE'] = $arPhoneSettings['PROPERTY_PHONE_VALUE'];
							
						}
					}
				}
			}
		}

		$this->setResultCacheKeys(array());

		$this->IncludeComponentTemplate();
	}



