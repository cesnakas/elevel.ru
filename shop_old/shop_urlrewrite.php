<?
//require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
//include($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/lib/text/encoding.php");
//include($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/lib/web/json.php");
?>
<?/*error_reporting(E_ALL);
ini_set('display_errors','On');*/?>
<?//use \Bitrix\Main\Web;?>
<?
//ДЕЛАЕМ РЕДИРЕКТ СО СТАРЫХ СТРАНИЦ ЭЛЕМЕНТОВ КАТАЛОГА
$parse = parse_url($_SERVER["REQUEST_URI"]);
$exp = explode("/", $parse["path"]);
$array_empty = array(null);
$mass = array_diff($exp, $array_empty);
$select = Array();
$filter = Array("IBLOCK_ID" => "53", "CODE" => $mass[count($mass)]);
$result = CIBlockElement::GetList(Array(), $filter, false, false, $select);
while($items = $result->GetNext()){
    if ($items["DETAIL_PAGE_URL"] != $parse["path"]) {
        LocalRedirect($items["DETAIL_PAGE_URL"]);    
    }    
}

function recursive_array_search($needle,$haystack) {
    foreach($haystack as $key=>$value) {
        $current_key=$key;
        if($needle===$value OR (is_array($value) && recursive_array_search($needle,$value) !== false)) {
            return $current_key;
        }
    }
    return false;
}
$_SESSION["TZ_FOR_SEO"] = array();
?>
<?if($_SESSION["no_url_params"] !== "Y"):?>
<?$page = $APPLICATION->GetCurPage();
$url = explode('/',$page);
$_SESSION["arrFilter"] = array();
$res_el = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("CODE"=>$url[count($url)-2], "IBLOCK_CODE" => "new_catalog", "ACTIVE" => "Y"), false, false, Array('ID'));
if($ar_el_res = $res_el->GetNext()){
    if(isset($ar_el_res["ID"]) && !empty($ar_el_res["ID"])){
        $ELEMENT_ID = $ar_el_res["ID"];        
    }
}

if($url[1] == 'shop' && empty($ELEMENT_ID)){
        
    //определяем в какой мы секции отрезая параметры фильтра
    $section = 1;
    $current_url = '/shop/';
    //$element = 0;
    $i = 2;
    while($section == 1){
        //$arFilter = array("CODE" => $url[$i], "IBLOCK_ID" => 10, "ACTIVE" => "Y");
        $arFilter = array("CODE" => $url[$i], "IBLOCK_ID" => 53, "ACTIVE" => "Y");//"IBLOCK_CODE" => "new_catalog"
        $arSelect = array('ID');
        $res = CIBlockSection::GetList(array(), $arFilter, false, false, $arSelect);
        if($ob = $res->GetNext())
        {
            $current_url .= $url[$i]."/";
            $this_section = $ob["ID"];
            /*
            $subsections = CIBlockSection::GetCount(Array("IBLOCK_ID" => 48,"SECTION_ID" => $ob["ID"], "ACTIVE" => "Y"));
            //$subsections = CIBlockSection::GetCount(Array("IBLOCK_ID" => 10,"SECTION_ID" => $ob["ID"], "ACTIVE" => "Y"));
            if($subsections == 0){
                $this_section = $ob["ID"];    
            }
            if($i == (count($url)-3) && $subsections !== 0){
                $this_section = $ob["ID"];                           
            }            
            */
        }
        else{
            //echo '<pre>'; print_r($url[$i]." - это не секция"); echo '</pre>';
            $first_filter_param = $i;
            $section = 0;
        }
        $i++;
    }

    $_SESSION["set_fil"] = 0;
    $_SESSION["filter_cur_url"] = $current_url;

    //собираем параметры фильтрации из урла
    for($i = $first_filter_param; $i < count($url); $i++){
        if($url[$i] != 'index.php' && $url[$i] != ' '){
            $ar_filter_fields[] = $url[$i];  
        }  
    }
    if(!empty($ar_filter_fields)){
        $_SESSION["set_fil"] = 1;    
    }
    if(!empty($_GET)){
        foreach($_GET as $key=>$arGet){
            $pos = strpos($key, 'arrFilter');
            if($pos !== false){
                $_SESSION["set_fil"] = 1;                 
            }
        }    
    } 

    //ИД текущей секции
    $SECTION_ID = $this_section;
    //собираем все свойства, по которым разрешена фильтрация 
    $res_alt = CIBlockSectionPropertyLink::GetArray(53, $SECTION_ID);
    foreach($res_alt as $PropID=>$arFilPropes){
        if($arFilPropes["SMART_FILTER"] == "Y"){
            $fil_prop[] = $PropID;    
        }    
    }
    
    //получаем значения для свойств по которым разрешена фильтрация и формируем массив
    //if($USER->IsAdmin()){
        $arFilter = array("SECTION_ID"=>$SECTION_ID, "ACTIVE"=>"Y", "IBLOCK_ID" => 53, "INCLUDE_SUBSECTIONS" => "Y");
        
        foreach($fil_prop as $key=>$filter_pr){
            $arSelect[] = 'PROPERTY_'.$filter_pr;   
        }
                
        $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNext())
        {
            foreach($fil_prop as $filter_pr){
                if(!array_key_exists($ob["PROPERTY_".$filter_pr."_VALUE"], $ar_el_filter[$filter_pr]) && !empty($ob["PROPERTY_".$filter_pr."_VALUE"]))                {
                    $arParams1 = array("replace_space"=>"_","replace_other"=>"_");
                    $trans = CUTIL::translit($ob["PROPERTY_".$filter_pr."_VALUE"],"ru",$arParams1);
                    $ar_el_filter[$filter_pr][$ob["PROPERTY_".$filter_pr."_VALUE"]] = $trans;
                    $ar_el_filter_translits[$filter_pr][$trans] = $ob["PROPERTY_".$filter_pr."_VALUE"];
                }                
            }
        }       
    //}    
    /*else{    
    foreach($fil_prop as $filter_pr){        
        $arFilter = array("!PROPERTY_".$filter_pr=>false, "SECTION_ID"=>$SECTION_ID, "ACTIVE"=>"Y", "IBLOCK_ID" => 53, "INCLUDE_SUBSECTIONS" => "Y");
        $arSelect = array("PROPERTY_".$filter_pr);
        $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
        while($ob = $res->GetNext())
        {
            if(!array_key_exists($ob["PROPERTY_".$filter_pr."_VALUE"], $ar_el_filter[$filter_pr])){
                $arParams1 = array("replace_space"=>"_","replace_other"=>"_");
                $trans = CUTIL::translit($ob["PROPERTY_".$filter_pr."_VALUE"],"ru",$arParams1);
                $ar_el_filter[$filter_pr][$ob["PROPERTY_".$filter_pr."_VALUE"]] = $trans;
            }
        }  
    }
    }*/

    $_SESSION["arrFilter_choosen"] = array();
    foreach($ar_el_filter as $key=>$arrr){
        $properties =  CIBlockProperty::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID" => 53, "ID" =>$key));
        if ($prop_fields = $properties->GetNext())
        {
            $arParams1 = array("replace_space"=>"_","replace_other"=>"_");
            $trans = CUTIL::translit($prop_fields["NAME"],"ru",$arParams1);
            $arrTranslits[$trans] = $prop_fields["ID"];
            $arrTranslit["TZ_PROP_TRANSLIT"][$prop_fields["NAME"]] = $trans;        
            $arrTranslit["TZ_PROP_BY_ID"][$prop_fields["ID"]] = $prop_fields["NAME"]; 
        }    
    }

    //получаем массив значений, которые будут фильтроваться
    $correct_link = "";
    if(!empty($ar_filter_fields) && $ar_filter_fields[0] !== ''){
        foreach($ar_filter_fields as $arURLParamsF){
            if($arURLParamsF !== " "){
                $tz_exp = explode("-", $arURLParamsF); 
                $tz_IDs = $arrTranslits[$tz_exp[0]];
                unset($tz_exp[0]);
                foreach($tz_exp as $this_part){
                    $pas = array_search($this_part, $ar_el_filter[$tz_IDs]);

                    if($pas != false){
                        $correct_link .= $arURLParamsF."/";
                    }

                    $_SESSION["arrFilter"]["arrFilter"."_".$tz_IDs."_".abs(crc32($pas))] = "Y";
                    $_SESSION["arrFilter_choosen"][$tz_IDs][] = $this_part; 
                    $arNewSmartFilterParams["arrFilter"]["arrFilter"."_".$tz_IDs."_".abs(crc32($pas))] = "Y";                        
                }
            }    
        }
    }

    //ТКДЗ и хлебные крошки
    $arForSEO = array();
    if(!empty($_SESSION["arrFilter_choosen"])){
        foreach($_SESSION["arrFilter_choosen"] as $key=>$arElems){
            if(count($arElems) == 1){
                $arForSEO[] = array(
                    "PROP_NAME" => $arrTranslit["TZ_PROP_BY_ID"][$key], 
                    "PROP_VALUE" => $ar_el_filter_translits[$key][$arElems[0]], 
                    "LINK" => $_SESSION["filter_cur_url"].$arrTranslit["TZ_PROP_TRANSLIT"][$arrTranslit["TZ_PROP_BY_ID"][$key]].'-'.$arElems[0].'/'
                );     
            }    
        }
    }

    $_SESSION["TZ_FOR_SEO"] = $arForSEO;
    
    //получаем массив значений, которые будут фильтроваться
    /*foreach($ar_filter_fields as $arURLParamsF){
        if($arURLParamsF !== " "){
            $pos = recursive_array_search($arURLParamsF, $ar_el_filter);
            if($pos != false){
                $pas = array_search($arURLParamsF, $ar_el_filter[$pos]);
                if($pas !== false){
                    $NewFilterParams[$ar_el_filter[$pos][$pas]] = $pas;
                    $_SESSION["arrFilter"]["arrFilter"."_".$pos."_".abs(crc32($pas))] = "Y";
                    $arNewSmartFilterParams["arrFilter"]["arrFilter"."_".$pos."_".abs(crc32($pas))] = "Y";
                }
            }
            else{
                $arURLParamsF = explode('-', $arURLParamsF);
                foreach($arURLParamsF as $arResFilterSep){
                    $pos = recursive_array_search($arResFilterSep, $ar_el_filter);
                    if($pos != false){
                        $pas = array_search($arResFilterSep, $ar_el_filter[$pos]);
                        if($pas !== false){
                            $NewFilterParams[$ar_el_filter[$pos][$pas]] = $pas;
                            $_SESSION["arrFilter"]["arrFilter"."_".$pos."_".abs(crc32($pas))] = "Y";
                            $arNewSmartFilterParams["arrFilter"]["arrFilter"."_".$pos."_".abs(crc32($pas))] = "Y";
                        }                             
                    }   
                    else{
                        header("HTTP/1.1 404 Not Found"); 
                        header("Location: /404.php");     
                    } 
                }    
            }  
        }  
    }*/
    
    //echo "<pre>";print_r($_SESSION["arrFilter"]);echo "</pre>";
    $_SESSION["arrFilter"] = array_merge($_SESSION["arrFilter"], $_GET);
    if($arNewSmartFilterParams["arrFilter"]){
        $arNewSmartFilterParams["arrFilter"] = array_merge($arNewSmartFilterParams["arrFilter"], $_GET);    
    }
    else{
        $arNewSmartFilterParams["arrFilter"] = $_GET;  
    }       
    foreach($NewFilterParams as $index=>$FilParams){
        $arParams2 = array("replace_space"=>"_","replace_other"=>"_");
        $trans = CUTIL::translit($FilParams,"ru",$arParams2);
        $FilterNewParams[$index] =  $trans;
    }
 
    $In_Filter = $arNewSmartFilterParams["arrFilter"];
    unset($In_Filter["set_filter"]) ;
    unset($In_Filter["search"]) ;
    unset($In_Filter["view"]) ;
    //echo "<pre>";print_r($ELEMENT_ID);echo "</pre>";
    //echo "<pre>";print_r($_SESSION["ADD_URL_PROP"]);echo "</pre>";
    //echo '<pre>'; print_r($_SESSION["arrFilter"]); echo '</pre>';
}

?>
<?endif?>
<?
    //получаем свойства, которые будут в url
    $arFilter = array("ACTIVE"=>"Y", "IBLOCK_CODE"=> "tz_seo_props"); 
    $arSelect = array("NAME");
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext())
    {
            $properties = CIBlockProperty::GetList(array('SORT'=>'ASC'), array("IBLOCK_ID" => 53, "NAME"=>$ob["NAME"], "ACTIVE"=>"Y"));
            while ($prop_fields = $properties->GetNext())
            {
                $ar_add_url[] = $prop_fields["ID"];        
            }
    }
    //echo "<pre>";print_r($FilterNewParams);echo "</pre>";
    $_SESSION["ADD_URL_PROP"] = $ar_add_url;   
?>
<?

$correct_cur_page = $_SESSION["filter_cur_url"].$correct_link;
$get_cur_page = $APPLICATION->GetCurPage(false);

if($correct_cur_page != $get_cur_page && $get_cur_page != '/shop/' && empty($ELEMENT_ID)){  
    CHTTP::SetStatus("404 Not Found");
    @define("ERROR_404","Y");
}

?>
<?if(empty($ELEMENT_ID)):?>
<script type="text/javascript">
    $(document).ready(function(){
        var ar_res = <?=json_encode(htmlspecialcharsex($In_Filter))?>;        
        var j = 0;
        if(ar_res !== null){
            $('.filtren li input').each(function(){
                chosen_sort_el = $(this).attr('name');
                if(ar_res[chosen_sort_el]){
                    if($(this).val() == "Y"){
                        $(this).trigger('click');
                        //$(this).attr('checked','checked');
                        ul_id = $(this).closest('ul').attr('id')
                        $('select#'+ul_id+' #'+chosen_sort_el).attr('selected', 'selected');   
                    } 
                    else{
                        $(this).val(ar_res[chosen_sort_el]);  
                        _this_slider = $(this).closest('li').find('#tezart-range');
                        
                        if(j == 0){
                            _this_slider.data('range-from', ar_res[chosen_sort_el]);
                            j++;
                        }
                        else{
                            _this_slider.data('range-to', ar_res[chosen_sort_el]);
                            j = 0;
                        }
                    }   
                }    
            }); 
            $('.filtren select').select2(); 
            $('.filtren select').select2("destroy");
            $('.filtren select').select2();  
        }
        else{
            $('.filtren select').select2();             
        }
                
        var link = '';  
        var query = '';
        var query_del = '';    
        $('.filtren ul.ul_checkbox').each(function(){
            ul_this = $(this).attr('id');
            $('.filtren ul#'+ul_this+' li input[type="checkbox"]').each(function(){
                last = link.slice(-1);         
                if($(this).attr('checked') == 'checked' ){                   
                    if(!$(this).hasClass('add_url_prop')){
                        query += $(this).attr('name')+'='+$(this).val()+'&';                         
                    }
                    else{
                        if(last !== '/' && link !== ''){
                            link += '-'+$(this).data('filter');     
                        }
                        else{
                            link += $(this).data('filter-name')+'-'+$(this).data('filter');    
                        }    
                    }  
                } 
            });
            if(link !== '' && last !== '/'){ 
                link += '/';    
            } 
        });        
        /*$('.filtren ul li input.tezart-input').each(function(){            
            checker = 0;
            if($(this).hasClass('tezart-num-from')){
                min = $(this).val();
                min_name = $(this).attr('name');
                max = $(this).closest('li').find('.tezart-num-to').val();
                max_name = $(this).closest('li').find('.tezart-num-to').attr('name');
                data_min = $(this).closest('li').find('#tezart-range').data('min');
                data_max = $(this).closest('li').find('#tezart-range').data('max');
                if(data_min != min && checker == 0){
                    query += min_name+'='+min+'&';    
                    query += max_name+'='+max+'&'; 
                    checker += 1;   
                } 
                if(data_max != max && checker == 0){   
                    query += min_name+'='+min+'&';    
                    query += max_name+'='+max+'&'; 
                    checker += 1;   
                }    
            }            
            query += $(this).attr('name')+'='+$(this).val()+'&';    
        });*/
        $('.filtren ul li input#tezart-range').each(function(){                    
            var slider_range_from = $(this).attr('data-range-from');
            var slider_range_to = $(this).attr('data-range-to');            
            var slider_min = $(this).attr('data-min');
            var slider_max = $(this).attr('data-max');
            
            if(slider_min != slider_range_from){
                query += $(this).closest('li').find('.tezart-from input').attr('name')+'='+slider_range_from+'&';       
            }            
            if(slider_max != slider_range_to){
                query += $(this).closest('li').find('.tezart-to input').attr('name')+'='+slider_range_to+'&';       
            }
        });     
        //query_checker = query;
        query += 'set_filter=%CF%EE%EA%E0%E7%E0%F2%FC';
        query_del += 'del_filter=%D1%E1%F0%EE%F1%E8%F2%FC';
        
        var cur_page = "<?=$_SESSION["filter_cur_url"]?>";
        /*if(query_checker != ""){
            cur_page += link+'index.php?'+query;    
        }
        else{
            cur_page += link+'index.php';    
        } */
        last = link.slice(-1);
        if(link !== '' && last !== '/'){ 
            link += '/';    
        }
        cur_page += link;
        /*cur_page += '?';
        cur_page += query; */
        var get_cur_page = "<?=$APPLICATION->GetCurPage()?>";
        get_cur_page = get_cur_page.replace("index.php", "");
        //var get_cur_page = "<?//=$APPLICATION->GetCurPageParam("", array("search", "view"))?>";
        /*if(cur_page !== get_cur_page && query !== 'set_filter=%CF%EE%EA%E0%E7%E0%F2%FC'){
            document.location.href = cur_page+'?'+query;
        }*/
        if(cur_page !== get_cur_page && get_cur_page != '/shop/'){
            if(query !== 'set_filter=%CF%EE%EA%E0%E7%E0%F2%FC'){                
                //document.location.href = cur_page+'?'+query;    
            }
            else{
                //document.location.href = cur_page;    
            }         
        }

        if(ar_res !== null && get_cur_page != "/shop/"){
            document.getElementById('filter_link').href  = "<?=$_SESSION["filter_cur_url"]?>"+link+'?'+query;
            document.getElementById('filter_link_bottom').href  = "<?=$_SESSION["filter_cur_url"]?>"+link+'?'+query;
            document.getElementById('filter_link_del').href  = "<?=$_SESSION["filter_cur_url"]?>"+link+'?'+query_del;
        /*if(query !== 'set_filter=%CF%EE%EA%E0%E7%E0%F2%FC'){
            document.getElementById('filter_link').href  = "<?//=$_SESSION["filter_cur_url"]?>"+link+'?'+query;
            document.getElementById('filter_link_bottom').href  = "<?//=$_SESSION["filter_cur_url"]?>"+link+'?'+query;
            document.getElementById('filter_link_del').href  = "<?//=$_SESSION["filter_cur_url"]?>"+link+'?'+query_del;
        }
        else{
            document.getElementById('filter_link').href  = "<?//=$_SESSION["filter_cur_url"]?>"+link;    
            document.getElementById('filter_link_bottom').href  = "<?//=$_SESSION["filter_cur_url"]?>"+link;    
            document.getElementById('filter_link_del').href  = "<?//=$_SESSION["filter_cur_url"]?>"+link+'?'+query_del;    
        }   */
        }
    });      
</script>
<?endif?>