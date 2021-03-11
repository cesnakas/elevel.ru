<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";?>
<?CModule::IncludeModule('iblock');?>
<script>
$(document).ready(function(){
	$('#view_catalogs').append($('#catalogs>div'));
	$('#catalogs').remove();
});
</script>
<?if(isset($_SESSION['catalogs_id'])):?>
	<div id="catalogs" style="display: none;">
	<div class="block208a" style="margin-top: 10px;">
	<p>Каталоги:</p>
    <div style="">
    
    
    
    <?
    
    //$arSelect = Array("ID", "NAME", "DETAIL_TEXT","IBLOCK_SECTION_ID");
    $arFilter = Array("IBLOCK_ID"=>5, "SECTION_ID"=>$_SESSION['catalogs_id'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false);
    while($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        //print_r();
        if($_SESSION['catalogs_id']==24386||$_SESSION['catalogs_id']==24392||$_SESSION['catalogs_id']==24395||$_SESSION['catalogs_id']==24394||$_SESSION['catalogs_id']==24653||$_SESSION['catalogs_id']==26825||$_SESSION['catalogs_id']==24650||$_SESSION['catalogs_id']==24645||$_SESSION['catalogs_id']==24656||$_SESSION['catalogs_id']==24647||$_SESSION['catalogs_id']==24583||$_SESSION['catalogs_id']==26876||$_SESSION['catalogs_id']==27947||$_SESSION['catalogs_id']==33297||$_SESSION['catalogs_id']==45886){
        echo $arFields['DETAIL_TEXT'];   
        
        }
        
    }
    ?>
    <?/* 
	<?=$_SESSION['catalogs_id'];?>
			<ul class="list_pdf">
				<li><span>Электрощита</span></li>
			</ul>
			*/?>
            <?//=$_SESSION['catalogs_id'];?>
            </div>
	</div>
	</div>
<?endif;?>