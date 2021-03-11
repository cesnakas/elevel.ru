<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ( $this->StartResultCache( 86400, array($arParams) ) )
{
    CModule::IncludeModule( 'iblock' );  
               
    $arBrandsFilter = Array(
        'IBLOCK_ID' => 84,
        'CODE' => $arParams['BRAND_CODE'],
        'ACTIVE' => 'Y'
    );
    $arBrandsSelect = Array(
        'ID',
        'NAME',
        'PICTURE',
        'DESCRIPTION',
        'UF_QUALITY',
        'UF_POPULARITY',
        'UF_GUARANTEE',
        'UF_RELIABILITY',
        'UF_SERVICE'
    );
    $arBrandsNav = Array(
        'nTopCount' => 1
    );
    $dbBrand = CIBlockSection::GetList( Array(), $arBrandsFilter, false, $arBrandsSelect, $arBrandsNav );
    if ( $arBrand = $dbBrand->Fetch() )
    {
        $brandId = $arBrand['ID'];
        $brandName = $arBrand['NAME'];
        $brandPicture = $arBrand['PICTURE'];

        $arResult['BRAND']['DESCRIPTION'] = $arBrand['DESCRIPTION'];

        $brandQuality = $arBrand['UF_QUALITY'];
        $brandPopularity = $arBrand['UF_POPULARITY'];
        $brandGuarantee = $arBrand['UF_GUARANTEE'];
        $brandReliability = $arBrand['UF_RELIABILITY'];
        $brandService = $arBrand['UF_SERVICE'];
    }



    if ( $brandName )
    {
        $arResult['META']['NAV_CHAIN'][] = Array(
            'NAME' => $brandName,
            'URL' => '/brands/' . $arParams['BRAND_CODE'] . '/'
        );

        $arResult['META']['TITLE'] = $brandName;

        $arResult['BRAND']['NAME'] = $brandName;
    }



    if ( $brandPicture )
    {
        $pic = CFile::ResizeImageGet( $arBrand['PICTURE'], Array( 'width' => 1042, 'height' => 138 ) );

        $arResult['BRAND']['PICTURE'] = $pic['src'];
    }




    if ( $brandQuality || $brandPopularity || $brandGuarantee || $brandService || $brandReliability )
    {
        global $DB;

        $arParamsIds = Array();
        $arParamsValues = Array();

        if ( $brandQuality )
        {
            $arParamsIds[] = $brandQuality;
        }

        if ( $brandPopularity )
        {
            $arParamsIds[] = $brandPopularity;
        }

        if ( $brandGuarantee )
        {
            $arParamsIds[] = $brandGuarantee;
        }

        if ( $brandService )
        {
            $arParamsIds[] = $brandService;
        }

        if ( $brandReliability )
        {
            $arParamsIds[] = $brandReliability;
        }

        $dbEntities = $DB->Query( 'SELECT ID,VALUE FROM b_user_field_enum WHERE ID IN (' . implode( ',', $arParamsIds ) . ')' );
        while ( $arEntity = $dbEntities->Fetch() )
        {
            $arParamsValues[$arEntity['ID']] = $arEntity['VALUE'];
        }
    }


    if ( $brandQuality )
    {
        $arResult['BRAND']['PARAMS'][] = Array(
            'NAME' => 'Качество',
            'VALUE' => $arParamsValues[$brandQuality]
        );
    }

    if ( $brandPopularity )
    {
        $arResult['BRAND']['PARAMS'][] = Array(
            'NAME' => 'Популярность',
            'VALUE' => $arParamsValues[$brandPopularity]
        );
    }

    if ( $brandGuarantee )
    {
        $arResult['BRAND']['PARAMS'][] = Array(
            'NAME' => 'Гарантия',
            'VALUE' => $arParamsValues[$brandGuarantee]
        );
    }

    if ( $brandService )
    {
        $arResult['BRAND']['PARAMS'][] = Array(
            'NAME' => 'Сервис',
            'VALUE' => $arParamsValues[$brandService]
        );
    }

    if ( $brandReliability )
    {
        $arResult['BRAND']['PARAMS'][] = Array(
            'NAME' => 'Надёжность',
            'VALUE' => $arParamsValues[$brandReliability]
        );
    }



    if ( $brandId )
    {		
        $brandFilterParam = 'filter/producer-is-'.$arParams['BRAND_CODE'].'/';



        $itemsCount = 0;
        $arSectionsCount = Array();


        $arItemsFilter = Array(
            'IBLOCK_ID' => 83,
            'PROPERTY_PRODUCER' => $brandId,
            'ACTIVE' => 'Y',
            'SECTION_GLOBAL_ACTIVE' => 'Y'
        );
        $arItemsSelect = Array(
            'ID',
            'IBLOCK_SECTION_ID'
        );
        $dbItems = CIBlockElement::GetList( Array(), $arItemsFilter, false, false, $arItemsSelect );
        while ( $arItem = $dbItems->Fetch() )
        {
            $itemsCount++;

            $arSectionsCount[$arItem['IBLOCK_SECTION_ID']]++;

            $arResult['BRAND_ITEMS_IDS'][] = $arItem["ID"];
        }


        $itemsCountWord = 'товаров';

        $lastOne = substr( $itemsCount, -1, 1 );
        $lastTwo = substr( $itemsCount, -2, 1 );

        if ( $lastOne == '1' && $lastTwo != '11' )
        {
            $itemsCountWord = 'товар';
        }
        elseif ( ( $lastOne == '2' || $lastOne == '3' || $lastOne == '4' ) && ( $lastTwo != '12' && $lastTwo != '13' && $lastTwo != '14' ) )
        {
            $itemsCountWord = 'товара';
        }

        $arResult['BRAND']['ITEMS_COUNT'] = intval( $itemsCount ) . ' ' . $itemsCountWord;
        $arResult['BRAND']['ITEMS_COUNT_NUM'] = intval( $itemsCount );



        $arSectionsOrder = Array(
            'ID' => 'ASC',
            'NAME' => 'ASC'
        );
        $arSectionsFilter = Array(
            'IBLOCK_ID' => 83,
            'ACTIVE' => 'Y',
            'SECTION_GLOBAL_ACTIVE' => 'Y',
            'INCLUDE_SUBSECTIONS' => 'Y'
        );
        $arSectionsSelect = Array(
            'ID',
            'IBLOCK_SECTION_ID',
            'DEPTH_LEVEL',
            'NAME',
            'SECTION_PAGE_URL'
        );
        $dbSections = CIBlockSection::GetList( $arSectionsOrder, $arSectionsFilter, false, $arSectionsSelect );
        while ( $arSection = $dbSections->GetNext() )
        {
            $arSectionsData[$arSection['ID']] = $arSection;
        }



        $arParentsCount = Array();
        foreach ( $arSectionsCount as $sectionId => $itemsCount )
        {
            if ( $arSectionsData[$sectionId]['DEPTH_LEVEL'] >= 2 && !$section )
            {
                $parentId = $arSectionsData[$sectionId]['IBLOCK_SECTION_ID'];

                $arParentsCount[$parentId] += $itemsCount;

                unset( $arSectionsCount[$sectionId] );
            }
        }



        foreach ( $arSectionsCount as $sectionId => $itemsCount )
        {
            $arResult['SECTIONS'][] = Array(
                'ID' => $sectionId,
                'NAME' => $arSectionsData[$sectionId]['NAME'],
                'ITEMS_COUNT' => $itemsCount,
                'URL' => $arSectionsData[$sectionId]['SECTION_PAGE_URL'] . $brandFilterParam
            );
        }

        foreach ( $arParentsCount as $sectionId => $itemsCount )
        {
            $arResult['SECTIONS'][] = Array(
                'ID' => $sectionId,
                'NAME' => $arSectionsData[$sectionId]['NAME'],
                'ITEMS_COUNT' => $itemsCount,
                'URL' => $arSectionsData[$sectionId]['SECTION_PAGE_URL'] . $brandFilterParam
            );
        }



        $arSeriesOrder = Array(
            'SORT' => 'ASC',
            'NAME' => 'ASC'
        );
        $arSeriesFilter = Array(
            'IBLOCK_ID' => 84,
            'SECTION_ID' => $brandId,
            'ACTIVE' => 'Y',
            'SECTION_GLOBAL_ACTIVE' => 'Y'
        );
        $arSeriesSelect = Array(
            'NAME',
            'PREVIEW_PICTURE',
            'DETAIL_PICTURE',
            'CODE',
            'PREVIEW_TEXT',
            'DETAIL_TEXT',
            'ID', 
            'IBLOCK_ID',
            'IBLOCK_CODE',
            'IBLOCK_TYPE',
        );
        $dbSeries = CIBlockElement::GetList( $arSeriesOrder, $arSeriesFilter, false, false, $arSeriesSelect );          
        

        while ( $arSeries = $dbSeries->Fetch() )
        {    
            $arItemsFilterSeries = Array(
                'IBLOCK_ID' => 83,
                'ACTIVE' => 'Y',
                'PROPERTY_SERIES' => $arSeries['ID'],
                'SECTION_GLOBAL_ACTIVE' => 'Y'
            );
            $arItemsSelectSeries = Array(
                'ID', 
            );
            /*$series_count = CIBlockElement::GetList( Array(), $arItemsFilterSeries, false, array ('nTopCount' => 1), $arItemsSelectSeries ) -> SelectedRowsCount ();
            if ($series_count <= 0) continue;*/ 

            $seriesDescription = $arSeries['PREVIEW_TEXT'];

            /*if ( !$seriesDescription && $arSeries['DETAIL_TEXT'] )
            {
            $seriesDescription = $arSeries['DETAIL_TEXT'];
            }*/

            $pic['src'] = '';
            $picId = false;

            if ( $arSeries['PREVIEW_PICTURE'] )
            {
                $picId = $arSeries['PREVIEW_PICTURE'];
            }
            elseif ( $arSeries['DETAIL_PICTURE'] )
            {
                $picId = $arSeries['DETAIL_PICTURE'];
            }

            if ( $picId )
            {
                $pic = CFile::ResizeImageGet( $picId, Array( 'width' => 720, 'height' => 95 ) );
            }



            $arResult['SERIES'][$arSeries['ID']] = Array(
                'NAME' => $arSeries['NAME'],
                'URL' => '/brands/' . $arParams['BRAND_CODE'] . '/' . $arSeries['CODE'] . '/',
                'DESCRIPTION' => $seriesDescription,
                'PICTURE' => $pic['src']
            );


            if ( $arSeries['CODE'] == $arParams['SERIES_CODE'] && $arParams['SERIES_CODE'] )
            {
                $arResult['META']['NAV_CHAIN'][] = Array(
                    'NAME' => $arSeries['NAME']
                );

                $arResult['META']['TITLE'] = $arSeries['NAME'];

                $arResult['SERIES_NAME'] = $arSeries['NAME'];
                $seriesId = $arSeries['ID'];
            }
        }

        if ($seriesId) // мы на странице элемента инфоблока - Серии, проставляем нужные SEO значения
        {
            $arResult["PAGE"] = "SERIE";

            $ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(IBLOCK_BRAND_ID, $seriesId);
            $arResult["IPROPERTY_VALUES"] = $ipropValues->getValues();
        }
        elseif($arParams['SERIES_CODE'] && is_null($seriesId))
        {

            Bitrix\Iblock\Component\Tools::process404(
               'Не найден', //Сообщение
               true, // Нужно ли определять 404-ю константу
               true, // Устанавливать ли статус
               true, // Показывать ли 404-ю страницу
               false // Ссылка на отличную от стандартной 404-ю
            );

        }
        elseif($brandId)  // мы на странице раздела инфоблока - Бренда, проставляем нужные SEO значения
        {
            $arResult["PAGE"] = "BRAND";

            $ipropValues = new \Bitrix\Iblock\InheritedProperty\SectionValues(IBLOCK_BRAND_ID, $brandId);
            $arResult["IPROPERTY_VALUES"] = $ipropValues->getValues();
        }

        if ( !$arParams['SERIES_CODE'] )
        {
            $arArticlesOrder = Array(
                'ACTIVE_FROM' => 'DESC',
                'ID' => 'DESC'
            );
            $arArticlesFilter = Array(
                'IBLOCK_ID' => 117,
                'ACTIVE' => 'Y',
                'PROPERTY_BRAND' => $brandId
            );
            $arArticlesNav = Array(
                'nTopCount' => 4
            );
            $arArticlesSelect = Array(
                'NAME',
                'ID',
                'DETAIL_TEXT',
                'DETAIL_PICTURE',
                'ACTIVE_FROM',
                'DETAIL_PAGE_URL'
            );
            $dbArticles = CIBlockElement::GetList( $arArticlesOrder, $arArticlesFilter, false, $arArticlesNav, $arArticlesSelect );
            while ( $arArticle = $dbArticles->GetNext() )
            {
                $pic['src'] = '';

                if ( $arArticle['DETAIL_PICTURE'] )
                {
                    $pic = CFile::ResizeImageGet( $arArticle['DETAIL_PICTURE'], Array( 'width' => 967, 'height' => 395 ) );
                }		



                $description = $arArticle['DETAIL_TEXT'];

                if ( strlen( $description ) > 150 )
                {
                    $description = substr( $description, 0, strpos( $description, ' ', 150 ) );
                }



                $date = $arArticle['ACTIVE_FROM'];
                $arrDate = explode( ' ', $date );
                $arDate = explode( '.', $arrDate[0] );
                $day = intval( $arDate[0] );
                $month = $arDate[1];
                $year = $arDate[2];

                $arMonths = Array(
                    '01' => 'января',
                    '02' => 'февраля',
                    '03' => 'марта',
                    '04' => 'апреля',
                    '05' => 'мая',
                    '06' => 'июня',
                    '07' => 'июля',
                    '08' => 'августа',
                    '09' => 'сентября',
                    '10' => 'октября',
                    '11' => 'ноября',
                    '12' => 'декабря',
                );

                $date = $day . ' ' . $arMonths[$month] . ' ' . $year;



                $arResult['ARTICLES'][] = Array(
                    'NAME' => $arArticle['NAME'],
                    'URL' => $arArticle['DETAIL_PAGE_URL'],
                    'PICTURE' => $pic['src'],
                    'DESCRIPTION' => $description,
                    'DATE' => $date
                );
            }
        }
    }



    if ( $seriesId )
    {
        $itemsCount = 0;

        $arItemsFilter = Array(
            'IBLOCK_ID' => 83,
            'PROPERTY_SERIES' => $seriesId,
            'ACTIVE' => 'Y',
            'SECTION_GLOBAL_ACTIVE' => 'Y'
        );
        $arItemsSelect = Array(
            'ID'
        );
        $dbItems = CIBlockElement::GetList( Array(), $arItemsFilter, false, false, $arItemsSelect );

        while ( $arItem = $dbItems->Fetch() )
        {
            $itemsCount++;

            $arResult['SERIES_ITEMS_IDS'][] = $arItem['ID'];
        }

        $itemsCountWord = 'товаров';

        $lastOne = substr( $itemsCount, -1, 1 );
        $lastTwo = substr( $itemsCount, -2, 1 );

        if ( $lastOne == '1' && $lastTwo != '11' )
        {
            $itemsCountWord = 'товар';
        }
        elseif ( ( $lastOne == '2' || $lastOne == '3' || $lastOne == '4' ) && ( $lastTwo != '12' && $lastTwo != '13' && $lastTwo != '14' ) )
        {
            $itemsCountWord = 'товара';
        }


        $arResult['SERIES_ITEMS_COUNT'] = $itemsCount . ' ' . $itemsCountWord;
        $arResult['SERIES_ITEMS_NUM'] = intval($itemsCount);
    }

    $this->EndResultCache();
}

global $SECTION_NAME;
$SECTION_NAME = $arResult['BRAND']['NAME'] . " " . $arResult['META']['NAV_CHAIN'][1]['NAME'];

$this->IncludeComponentTemplate();
?>