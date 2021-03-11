<?
$FilterArr = Array(
	"find_id",
	"find_id_exact_match",
	"find_lamp",
	"find_lang",
	"find_show_count_1",
	"find_show_count_2",
	"find_click_count_1",
	"find_click_count_2",
	"find_ctr_1",
	"find_ctr_2",
	"find_contract_id",
	"find_contract",
	"find_contract_exact_match",
	"find_group",
	"find_group_exact_match",
	"find_status_sid",
	"find_type_sid",
	"find_type",
	"find_type_exact_match",
	"find_name",
	"find_name_exact_match",
	"find_code",
	"find_code_exact_match",
	"find_comments",
	"find_comments_exact_match"
	);
if (strlen($set_filter)>0) InitFilterEx($FilterArr,"ADV_BANNER_LIST","set"); 
else InitFilterEx($FilterArr,"ADV_BANNER_LIST","get");
if (strlen($del_filter)>0) DelFilterEx($FilterArr,"ADV_BANNER_LIST");
InitBVar($find_id_exact_match);
InitBVar($find_status_exact_match);
InitBVar($find_group_exact_match);
InitBVar($find_contract_exact_match);
InitBVar($find_type_exact_match);
InitBVar($find_name_exact_match);
InitBVar($find_code_exact_match);
InitBVar($find_comments_exact_match);
$find_type="SMALL_BANNER_1";
$arFilter = Array(
	"ID"					=> $find_id,
	"ID_EXACT_MATCH"		=> $find_id_exact_match,
	"LAMP"				  => $find_lamp,
	"LANG"				  => $find_lang,
	"SHOW_COUNT_1"		  => $find_show_count_1,
	"SHOW_COUNT_2"		  => $find_show_count_2,
	"CLICK_COUNT_1"		 => $find_click_count_1,
	"CLICK_COUNT_2"		 => $find_click_count_2,
	"CTR_1"				 => $find_ctr_1,
	"CTR_2"				 => $find_ctr_2,
	"GROUP"				 => $find_group,
	"GROUP_EXACT_MATCH"	 => $find_group_exact_match,
	"STATUS_SID"			=> $find_status_sid,
	"CONTRACT_ID"		   => $find_contract_id,
	"CONTRACT"			  => $find_contract,
	"CONTRACT_EXACT_MATCH"  => $find_contract_exact_match,
	"TYPE_SID"			  => $find_type_sid,
	"TYPE"				  => $find_type,
	"TYPE_EXACT_MATCH"	  => $find_type_exact_match,
	"NAME"				  => $find_name,
	"NAME_EXACT_MATCH"	  => $find_name_exact_match,
	"CODE"				  => $find_code,
	"CODE_EXACT_MATCH"	  => $find_code_exact_match,
	"COMMENTS"			  => $find_comments,
	"COMMENTS_EXACT_MATCH"  => $find_comments_exact_match
	);     
$by = 's_weight';
$order = 'asc';
$rsBanners = CAdvBanner::GetList($by, $order, $arFilter, $is_filtered, "N");


$arBanners=array();
while($arBanner = $rsBanners->NavNext(true, "f_"))
{
	$arBanners[]=array(
		'IMG'=>CFile::GetPath($arBanner['IMAGE_ID']),
		'URL'=>$arBanner['URL'],
		'NAME'=>$arBanner['NAME'],
	);
    if($USER->IsAdmin()) {
    //echo "<pre>"; print_r($arBanner); echo "</pre>";
    }

	
};
?>
<?/*<ul class="list269">*/?>
<ul class="right-banner">
	<?foreach($arBanners as $banner){?>
		<li><a href="<?=$banner['URL'];?>"><img src="<?=$banner['IMG'];?>" alt="" /><span><?=$banner['NAME'];?></span></a></li>
	<?}?>    
</ul>
<?/*</ul>*/?>

