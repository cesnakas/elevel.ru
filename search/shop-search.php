<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("�����");
?>

<?/*   
CModule::IncludeModule("search");

$count=15;

    function count_search($q, $module_id, $param="")
    {
        $obSearch = new CSearch;
        if ($module_id == "tags")
        {
            $obSearch->Search(array("TAGS" => $tag, "SITE_ID" => "s1"));
        }
        elseif ($module_id == "all")
        {
            $obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1"));
        }
        else
        {
            $obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1", "MODULE_ID"=>$module_id, "PARAM2"=>$param));
        }
        $obSearch->NavStart();
        $count = $obSearch->SelectedRowsCount();
        return $count;
    }
    function correct_param(&$module_id, &$param)
    {
        if ($module_id != "iblock" && $module_id != "main" && $module_id != "tags")
        {
            $module_id = ""; $param = "";
            return ;
        }
        $arrayID = array(53);
        $param = intval($param);
        if (!in_array($param, $arrayID)) $param = "";
    }

    function title($module_id, $param)
    {
        $array = array("iblock_2"=>"��������", "iblock_6"=>"��������", "iblock_7"=>"������", "iblock_12"=>"�������", "iblock_9"=>"���������", "iblock_11"=>"�����������",
                        "iblock_48"=>"�������-��������", "main_"=>"��������� ���������", "tags_"=>"����� �������", "_"=>"����� �����");
        return $array[$module_id."_".$param];
    }
?>

<?
    if (isset($_GET['q']) || isset($_GET['tags']))
    {
        $select = Array("NAME");
        $filter = Array("IBLOCK_ID"=>"55", "PROPERTY_TRANSLITE_CODE" => urldecode(htmlspecialchars(urlencode($_GET['q']))));
        $result = CIBlockElement::GetList(Array(), $filter, false, false, $select);
        if($items = $result->Fetch()){
            $sel = $items["NAME"];
            
        }
        else {
            $sel = $_GET['q'];
        }
        
        $q = urldecode(htmlspecialchars(urlencode($sel)));
        if (empty($q)) $q = htmlspecialchars($_GET['tags']);
        $arrayStop = array("quot", "amp", "lt", "gt");
        if (in_array($q, $arrayStop))
        {
            echo '<font class="text">� ��������� ����� ���������� ������:</font>';
            echo ShowError("������ Special Entities");
            echo '<font class="text">��������� ��������� ����� � ��������� �����.</font>';
        }

        else
        {
            if (isset($_GET['module_id']) && isset($_GET['param']))
            {
                $module_id = $_GET['module_id'];
                $param = $_GET['param'];
                correct_param($module_id, $param);

                $obSearch = new CSearch;
                if ($module_id == "tags")
                {
                    $obSearch->Search(array("TAGS" => $q, "SITE_ID" => "s1"));
                }
                else
                {
                    if (!empty($module_id))
                    {
                        $obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1", "MODULE_ID"=>$module_id, "PARAM2"=>$param));
                    }
                    else
                    {
                        $obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1"));
                    }
                }
                $obSearch->NavStart(50);
                //print_r($obSearch);

                if ($obSearch->errorno != 0)
                {
                    echo '<font class="text">� ��������� ����� ���������� ������:</font>';
                    echo ShowError($obSearch->error);
                    echo '<font class="text">��������� ��������� ����� � ��������� �����.</font>';
                }
                else
                {
                    CPageOption::SetOptionString("main", "nav_page_in_session", "N");

                    $title = "��������� ������ �� ".title($module_id, $param).": ";
                    $obSearch->NavPrint($title, true, "", "/search/navprint.php");
                    echo '<br /><hr size="1" color="#DFDFDF">';
                    global $APPLICATION;
                    while($arResult = $obSearch->GetNext())
                    {
                        $arResult["BODY_FORMATED"] = str_replace('\n', "", $arResult["BODY_FORMATED"]);
                        $arResult["BODY_FORMATED"] = htmlspecialchars_decode($arResult["BODY_FORMATED"]);
                        echo '<a href="'.$arResult["URL"].'">'.$arResult["TITLE_FORMATED"].'</a><br />';
                        echo '<div align="justify">'.$arResult["BODY_FORMATED"].'</div>';
                        echo '<br />';
                        echo '<div style="font-size: 11px">';
                        echo '����: '.$arResult['DATE_CHANGE'].'<br />';
                        echo '����: '.$APPLICATION->GetNavChain($arResult["URL"], 0, false, true);
                        echo '</div>';
                        echo '<hr size="1" color="#DFDFDF">';
                    }
                    echo '<br />';
                    $obSearch->NavPrint($title, true, "", "/search/navprint.php");
                }
            }
            else
            {*/;?>
               <div class="s_catalog_title"><h2>���������� ������ �������</h2></div>
  			   <div>

           
<?if($_REQUEST["print"] !== "Y"):?>
    <div>
        <?$APPLICATION->IncludeComponent("bitrix:search.title", 
			"", 
			//"wt_search_catalog", 
			array(
            "NUM_CATEGORIES" => "5",
            "TOP_COUNT" => "5",
            "ORDER" => "date",
            "USE_LANGUAGE_GUESS" => "Y",
            "CHECK_DATES" => "N",
            "SHOW_OTHERS" => "N",
            "PAGE" => "#SITE_DIR#search/shop-search.php",
            "CATEGORY_1_TITLE" => "�������",
            "CATEGORY_1" => array(
                0 => "iblock_������� �������",
            ),
            "CATEGORY_1_iblock__�������_�������" => array(
                0 => "all",
            ),
            "SHOW_INPUT" => "Y",
            "INPUT_ID" => "title-search-input-catalog",
            "CONTAINER_ID" => "title-search-catalog"
            ),
            false
        );?>
    </div>
<?endif;?>
                <div class="search_text"><table width="100%">
                    <?//$countSearch = count_search($q, "iblock", 53);?>
                    <tr>
                    <td>
                    <?/*<div class="blockH48">
                        <?$APPLICATION->IncludeComponent("bitrix:search.title", "wt_search_catalog", array(
                            "NUM_CATEGORIES" => "5",
                            "TOP_COUNT" => "5",
                            "ORDER" => "date",
                            "RESTART" => "N",
                            "USE_LANGUAGE_GUESS" => "Y",
                            "CHECK_DATES" => "N",
                            "SHOW_OTHERS" => "N",
                            "PAGE" => "#SITE_DIR#search/shop-search.php",
                            "CATEGORY_1_TITLE" => "�������",
                            "CATEGORY_1" => array(
                                0 => "iblock_������� �������",
                            ),
                            "CATEGORY_1_iblock__�������_�������" => array(
                                0 => "all",
                            ),
                            "SHOW_INPUT" => "Y",
                            "INPUT_ID" => "title-search-input-catalog",
                            "CONTAINER_ID" => "title-search-catalog"
                            ),
                            false
                        );?>
                    </div>*/?>
                    <div id="catalog">
                		<?$APPLICATION->IncludeFile('/search/s_catalog_filter.php');?>
                    </div>
                    </td></tr>
                    <tr><td colspan="2"><div class="border">&nbsp;</div></td></tr>
                   <tr><td colspan="2"><br></td></tr></table></div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#filter_cnt_checkbox, #filter_cnt_form select").live("change",function(){
            $('#filter_cnt_form').submit();
        });
        
    $('#title-search-input-catalog').val('<?=htmlspecialcharsEx($_GET['q'])?>');
    $(".change_img").click(function(){
        var inp = $("input[name=by]").val();
        if (inp == "ASC") {
            $("input[name=by]").val("DESC");
        }
        else {
            $("input[name=by]").val("ASC");
        }
        $("#filter_cnt_form").submit();
    })    
    $(".on_chan").click(function(){
        var inp = $("input[name=view]").val();
        if (inp == "grid") {
            $("input[name=view]").val("list");
        }
        else {
            $("input[name=view]").val("grid");
        }
        $("#filter_cnt_form").submit();
    })
    });
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>