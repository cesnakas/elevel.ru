<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("altasib.kladr");
if(intval($_REQUEST["index"]) > 1){
    $ob = new CAltasibKladrIndex();
    $values = array();
    if($rsRes = $ob->GetListIndex(trim($_REQUEST["index"])))
        {
            while($arRes = $rsRes->GetNext())
            {
                ?><option value="<?=$arRes["POSTINDEX"];?>"><?=$arRes["POSTINDEX"];?></option><?
            }
                        
        }
                    
}