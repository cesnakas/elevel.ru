<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "�level - ��������-������� ��������� � �������������� | ������������������ ������������ ������ ����� � � �������");
$APPLICATION->SetPageProperty("tags", "������, �level, elevel, elevel.ru, �������������������, ����������������, �������, �����������, �����������, ������, ������, ���������, �������������, ������������, �������������� ����������������, ������������� ����������, �������������� �����������");
$APPLICATION->SetPageProperty("keywords", "���������, �������������, ������� ���������, �������� ������� ��������������, �������� ������� ���������, ��������� �����, ��������� ������, ������������� � ������");
$APPLICATION->SetPageProperty("description", "�������� �level ���������� ������ ������������� � ������������������� �� ������� ������� �������������� �� ��������� ����� ����� � � �������. ����������� �������� ������������ ������������������� ������������.");
$APPLICATION->SetPageProperty("not_show_nav_chain", "Y");
$APPLICATION->SetTitle("�������� �level ���������� ������� � ����������� ����� �����, � ����� ����� ������������������  ������������  �� ������� ����������� ��������������.");
?>


<script type="text/javascript" src="/js/jcarousellite.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $("#gallery").jCarouselLite({
            speed:1000,
            scroll:1,
            //auto: 800,
            btnNext:".next_but",
            btnPrev:".prev_but"
        });

        var a = $(".banner_1 img").width();
        var b = $(".banner_2 img").width();
        var c = $(".banner_3 img").width();
        var d = $(".banner_4 img").width();

        //--������� ����� ���� ������� �����������--

        //if(a == 0 && b == 0){
        //$("#main_banners").hide();
        //}

        //--!������� ����� ���� ������� �����������--

        if ((a > 350 && a < 400) && (b > 350 && b < 400)) {
            $(".banner_1").show();
            $(".banner_1").css("width", "370px");
            $(".banner_2").show();
            $(".banner_2").css("width", "370px");
            $(".banner_2").css("left", "380px");
            $(".banner_3").hide();
            $(".banner_4").hide();
        }
        if (
                (a > b && a > 540 && (b > 150 && b < 200))
                        ||
                        (a < b && b > 540 && (a > 150 && a < 200))
                ) {
            $(".banner_1").show();
            $(".banner_1").css("width", "560px");
            $(".banner_2").show();
            $(".banner_2").css("width", "180px");
            $(".banner_2").css("left", "570px");
            $(".banner_3").hide();
            $(".banner_4").hide();
        }
        if (
                ((a > b && a > c && a > 350 && a < 400) && (b > 150 && b < 200) && (c > 150 && c < 200))
                        ||
                        ((a < b && b > c && b > 350 && b < 400) && (a > 150 && a < 200) && (c > 150 && c < 200))
                        ||
                        ((a < c && b < c && c > 350 && c < 400) && (a > 150 && a < 200) && (b > 150 && b < 200))
                ) {
            $(".banner_1").show();
            $(".banner_1").css("width", "370px");
            $(".banner_2").show();
            $(".banner_2").css("width", "180px");
            $(".banner_2").css("left", "380px");
            $(".banner_3").css("width", "180px");
            $(".banner_3").css("left", "570px");
            $(".banner_4").hide();
        }
    })
</script>

<div class="block124">
    <ul>
        <li><a href="/services/project/" ><img src="/i/pic49a.png"  /><span>��������������</span></a></li>

        <li><a href="/services/complect/" ><img src="/i/pic49b.png"  /><span>������������</span></a></li>

        <li><a href="/services/installation/" ><img src="/i/pic49c.png"  /><span>������, ����������������</span></a></li>

        <li><a href="/services/supervision/" ><img src="/i/pic49d.png"  /><span>����������� � ��������� ������</span></a></li>

        <li><a href="/services/electrolaboratory/" ><img src="/i/pic49e.png"  /><span>������������������</span></a></li>
    </ul>
</div>

<?
$APPLICATION->ShowBanner("BANNER_MONTH_NEW");
?>
<?
$APPLICATION->ShowBanner("LEFT_BANNER_6");
?>

<aside class="col224">
    <div class="block208a"><span class="left-menu-header">���� �������:</span>
        <ul class="list1">
            <li><span><a href="/solutions/automation/smart_house/" title="����� ���" target="_blank">�����
                ���</a></span></li>

            <li><span><a href="/solutions/cable_systems/" title="������ ���">Ҹ���� ���</a></span></li>

            <li><span><a href="/solutions/cable_systems/heating_outdoor/" title="������� �����������" target="_blank">�������
                �����������</a></span></li>

            <li><span><a href="/solutions/cable_systems/heating_gutters_roofs/" title="������ ���� �� ����������"
                         target="_blank">������ ����</a></span></li>

            <li><span><a href="/solutions/electroboards/" title="������������ ������������"
                         target="_blank">�����������</a></span></li>
        </ul>
    </div>
    <?
$APPLICATION->ShowBanner("LEFT_BANNER_1");
?>
    <div class="block208a">
        <span class="left-menu-header">�����-����</span>
        <ul class="list1">
            <li><a href="/upload/Elevel_Price.xls">������� �����-���� � .xls</a>
                <br/>
                <a class="osl"
                   href="/upload/Elevel_Price.xls">�� <?= date("d.m.Y", filemtime($_SERVER['DOCUMENT_ROOT'] . '/upload/Elevel_Price.xls')); ?></a>
            </li>
        </ul>
    </div>
</aside>


<div class="col756">
    <div class="contentBlock1">
        <?
$APPLICATION->IncludeComponent("bitrix:news.list", "main_banners", array(
    "IBLOCK_TYPE" => "vecancy",
    "IBLOCK_ID" => "41",
    "NEWS_COUNT" => "4",
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "SORT_BY2" => "SORT",
    "SORT_ORDER2" => "ASC",
    "FILTER_NAME" => "",
    "FIELD_CODE" => array(
        0 => "",
        1 => ""
    ),
    "PROPERTY_CODE" => array(
        0 => "",
        1 => ""
    ),
    "CHECK_DATES" => "Y",
    "DETAIL_URL" => "",
    "AJAX_MODE" => "N",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "AJAX_OPTION_HISTORY" => "N",
    "CACHE_TYPE" => "N",
    "CACHE_TIME" => "",
    "CACHE_FILTER" => "N",
    "CACHE_GROUPS" => "Y",
    "PREVIEW_TRUNCATE_LEN" => "",
    "ACTIVE_DATE_FORMAT" => "d.m.Y",
    "SET_TITLE" => "N",
    "SET_STATUS_404" => "N",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "ADD_SECTIONS_CHAIN" => "N",
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "DISPLAY_TOP_PAGER" => "N",
    "DISPLAY_BOTTOM_PAGER" => "N",
    "PAGER_TITLE" => "�������",
    "PAGER_SHOW_ALWAYS" => "N",
    "PAGER_TEMPLATE" => "",
    "PAGER_DESC_NUMBERING" => "N",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    "PAGER_SHOW_ALL" => "N",
    "DISPLAY_DATE" => "N",
    "DISPLAY_NAME" => "N",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "N",
    "AJAX_OPTION_ADDITIONAL" => ""
), false);
?>



<br>

<div class="subContentBlock1Float">
<br>
<h2 style="color:red">���������� <span>%</span></h2>
    <div class="gallery_block">
        <div id="gallery">
            <ul class="list232b mod3">
                <?
if (CModule::IncludeModule("catalog"))
{
$aS = array(
    "ID",
    "NAME",
    "SECTION_PAGE_URL",
    "IBLOCK_ID",
    "PREVIEW_PICTURE",
    "DETAIL_PAGE_URL",
    "PROPERTY_SPETS_SKIDKA",
    "PROPERTY_*"
);
$aF = array(
    "IBLOCK_CODE" => "new_catalog",
    "ACTIVE"  => 'Y',
    "!PROPERTY_SPETS_SKIDKA" => false
);

$result = CIBlockElement::GetList(
    Array(
     "RAND" => "ASC"
    
),
    $aF,
    false,
    array("nPageSize" =>10),
    $aS
);

while($p = $result->GetNext()){
   $sale_price = CPrice::GetBasePrice($p['ID']);
            $sale_img = CFile::ShowImage($p['PREVIEW_PICTURE'], 132, 99, "border=0", "", true);
           
            if(isset($p['PROPERTY_SPETS_SKIDKA'])){
   ?>
                        <li>
                            <div class="sale_img"></div>
                            <div style="height:134px;">
                                <a href="<?= $p['DETAIL_PAGE_URL']; ?>"></a>
                                <a href="<?= $p['DETAIL_PAGE_URL']; ?>"> 
                                <?
                                if(empty($sale_img)){
                        
                            if(!isset($p['PROPERTY_181'])){
                                echo '<img src="/i/no-photo.jpg" width="99" height="99"/>';
                            }else{
                                echo '<img width="95" height="71" border="0" alt="" src="'.$p['PROPERTY_181'].'">';        
                            }
                        
                    }else{
                        echo $sale_img;
                    }
                    ; ?></a>
                            </div>
                            <div class="cat-item-title">
                                <a href="<?= $p['DETAIL_PAGE_URL']; ?>"><?= $p['NAME'] ?></a></div>
                            <p class="pr1">����: <span>
                                <?
        if (strlen($sale_price['PRICE']) > 0) {
            echo $sale_price['PRICE'] . " ���.";
        }
?>
                            </span>
                                <s class="old_price">

                                </s>
                            </p>

                            <p style="padding-left: 0px;" class="srv1">
                                <a title="������" alt="������" style="display: block;padding-left: 16px;"
                                   href="?action=ADD2BASKET&amp;id=<?= $p['ID'] ?>">�������� � �������</a>
                            </p>
                            <img style="display: none;" src="/i/pic144a.png" alt="" id="<?= $p['ID'] ?>"
                                 class="quick">
                            <img src="/i/pic154a.gif" alt="" class="pic154">
                            <img class="pic154" alt="" src="/i/pic154a.gif">
                        </li>
                        <?
                        }
                        
}

}
$arFilter  = Array(
    "IBLOCK_CODE" => "new_catalog",
    'UF_SALE' => 1
);
$db_list_i = CIBlockSection::GetList(Array(
    "SORT" => "ASC"
), $arFilter, false, array(
    'UF_SALE'
));
if (CModule::IncludeModule('iblock')) {
}

while ($ar_result_i = $db_list_i->GetNext()) {
    $arSelect = array(
        "ID",
        "NAME",
        "SECTION_PAGE_URL",
        "IBLOCK_ID",
       // "PROPERTY_965_VALUE",
        "DETAIL_URL",
        "PROPERTY_SPETS_SKIDKA"
    );
    
    $arFilter2 = array(
        "IBLOCK_CODE" => "new_catalog",
        "SECTION_ID" => $ar_result_i["ID"],
        "ACTIVE" => "Y",    
    );
    
    $res = CIBlockElement::GetList(Array(
        "RAND" => "ASC"
        
    ), $arFilter2, false, Array(
        "nTopCount" => 5
    ));
    
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $price    = CPrice::GetBasePrice($arFields['ID']);
        $img      = CFile::ShowImage($arFields['PREVIEW_PICTURE'], 132, 99, "border=0", "", true);
        if(!empty($arFields['PREVIEW_PICTURE'])){

        
?>
                        <li class="asdasd">
                            <div class="sale_img"></div>
                            <div style="height:134px;">
                                <a href="<?= $arFields['DETAIL_PAGE_URL']; ?>"></a>
                                <a href="<?= $arFields['DETAIL_PAGE_URL']; ?>"> <?= $img; ?></a>
                            </div>
                            <div class="cat-item-title">
                                <a href="<?= $arFields['DETAIL_PAGE_URL']; ?>"><?= $arFields['NAME'] ?></a></div>
                            <p class="pr1">����: <span>
                                <?
        if (strlen($price['PRICE']) > 0) {
            echo $price['PRICE'] . " ���.";
        }
?>
                            </span>
                                <s class="old_price">

                                </s>
                            </p>

                            <p style="padding-left: 0px;" class="srv1">
                                <a title="������" alt="������" style="display: block;padding-left: 16px;"
                                   href="?action=ADD2BASKET&amp;id=<?= $arFields['ID'] ?>">�������� � �������</a>
                            </p>
                            <img style="display: none;" src="/i/pic144a.png" alt="" id="<?= $arFields['ID'] ?>"
                                 class="quick">
                            <img src="/i/pic154a.gif" alt="" class="pic154">
                            <img class="pic154" alt="" src="/i/pic154a.gif">
                        </li>
                        <?
                        }
    }
}
?>
            </ul>
        </div>
        <button class="prev_but">�����</button>
        <button class="next_but">������</button>
    </div>
    <div class="all_sale">
        <a href="/sale/sale.php">��� ������ ����������</a>
    </div>
</div>
<div class="txt3">
    <h2>�level: ������, ��� ��������. ����, ��� ������.</h2>

    <p>����������� ������������ ������������������� ������������ �������� ������, ���� ����������� �������. �� ��� ��
        ���������� � ���� ������������ � ������� ���������� ����� �� ������� ���� � ������? ����� ������� ���������,
        ������� ������� ��������� � ������ ������� � ��������� �����, ��������� ������.</p>

    <p>������ ������� � ������ �level � ��� ����, ����� ��� ������� ����� ������������� � ����������� ��� ����� 15 ���.
        �level � ��� ����� ���������, ����������� �������� ��������������� � ���������� �������� ����� � ������
        ����������, ��� ������� � ���������������.</p>

    <p>�� ��������� ������ ����� ������ � ����������������, ����� ���������� ����� �������, ��� ������ ���, ��������,
        ������������. �� ���������� ��� ������������ �� ���������� ����� ���� � ������.</p>

    <h2>������ � �������� ��������</h2>

    <p>����� ����� �������� ������������� � ������� ������������, ���������, ��������� � ������� �����������, �������
        ��������� �������������� ���������� ���� ���. � ������� ��������� ���� ������, ���������� � ���� �� ������
        ��������� ����������� �������������������. ��� ��� ����� �������� ������� � ��� �������������� �������. �����
        �����, ������ <a href="/shop/">��������� �������</a> � ���� ����� ���� ������ � ��� ���������������� ������,
        ����������� � ����������� ����� � ������ � <a href="/solutions/">���������� ��������</a>. </p>

    <h2>���, ��� ��</h2>

    <p>����� �� ������ �������, ������� �� ������ � ������������ ��������. ��� ��� �������� �������� ����� �������������
        ������������. <a href="/services/">��� ������</a>, �� �������������� �� ���������� ������������ �� ������
        �������� � �level, �� ����� ����� �� ������ ���������� �����������. ��� ��� �� ���������� ������� ���� ����� �
        ������������ ������������ �� ������������:</p>
    <ul class="list_sol">
        <li><a href="/solutions/automation/">�������������</a></li>
        <li><a href="/solutions/electroboards/">������������ ������������</a></li>
        <li><a href="/solutions/lighting_work/">���������������� �������</a></li>
        <li><a href="/solutions/cable_systems/">������� ���������� ��������</a></li>
        <li><a href="/solutions/electric_power_supply/">����������������</a></li>
        <li><a href="/solutions/energy_conservation/">����������������</a></li>
    </ul>
    <p>�� ��������� ��������� ������� �������� �����. ��������� ������������ ����������, �� �� �������� ���������� �
        �������� ������������. ������ � ������������ ��������, ������ � �������, ��������������� ������� � ���������
        ������������. ������� ����������� ����� ��������, ����������� ����� �������������� � ��������� ������� ��������
        ��������� � ������������� ������� ������ ������ ���������.</p>

    <p>����� �� ��������� ������ �� ������������ ��������. �level � ����������� ������������ <a href="/brands/">�������
        ����������� ��������������</a> �������������� � ������ ������������� ������. � ����� �������� �����������
        ������������������ ������������, ��������-������������� � ���������������� ���������. ��� ������� - ��������
        ��������� � ������� ����������, ��� ����������� ������� ������ ������������������ ��������������. ������ ��� ��
        ������� � ���������� ����� � �����������. ����������� �level � ��� ������ ������� �� ����������
        ������������������� �� ��������� ������ lux � ������������ ������������ �� �������� ����� � �����������
        ��������. </p>

    <p>�� ������ � � ��������� ������������ � � ����� ������� ���� ��������� ��������� ������ ������.</p>

    <p>���� ������� �������� - ������� � �������������� ����� ��������, ������� �� ������� ������.</p>
    <a href="/company/about/" class="srv7">��� ������ � ���, ��� �� ����������</a>
</div>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>