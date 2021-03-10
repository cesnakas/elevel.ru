<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
session_start();
if(session_id() != $_POST['sid']) die('Access_denied');

//������� ��� ������������ ������ �� ������������ ������� 
function recursive_array_search($needle,$haystack) {
    foreach($haystack as $key=>$value) {
        $current_key=$key;
        if($needle===$value OR (is_array($value) && recursive_array_search($needle,$value) !== false)) {
            return $current_key;
        }
    }
    return false;
}

//��������� ������������ �����
$ext = substr($_FILES['upl_file']['name'], 1 + strrpos($_FILES['upl_file']['name'], "."));
$ext = strtolower($ext);
$valid_ext = array('jpg','xls','xlsx','jpeg','png','bmp','gif','ico'); // ���������� ����������
if(in_array($ext, $valid_ext)){
    $filename = session_id().'.'.$ext; // ��������������� ������
    $filepath = $_SERVER['DOCUMENT_ROOT'].'/files/'.$filename;
    if(!copy($_FILES['upl_file']['tmp_name'], $filepath)){
        echo '���� �� ��������. ��������� �������';
    }
    else
    {
        //�������� ������ �����
        require_once($_SERVER['DOCUMENT_ROOT']."/ajax/Classes/PHPExcel.php");
        $inputFileType = PHPExcel_IOFactory::identify($filepath);  // ������ ��� �����, excel ����� ������� ����� � ������ ��������, xls, xlsx � ������
        $objReader = PHPExcel_IOFactory::createReader($inputFileType); // ������� ������ ��� ������ �����
        $objPHPExcel = $objReader->load($filepath); // ��������� ������ ����� � ������
        $ar = $objPHPExcel->getActiveSheet()->toArray(); // ��������� ������ �� ������� � ������
        
       
        
        //������������ ������, ������������, ������� �� ����������� ������
        foreach($ar as $key=>$ar_lines){
            if(!empty($ar_lines[0])){
                $encode =  mb_detect_encoding($ar_lines[0]);
                $ar[$key][0] =  iconv($encode, "WINDOWS-1251", $ar_lines[0]);                 
                $ar[$key][1] =  iconv($encode, "WINDOWS-1251", $ar_lines[1]);                  
                $ar[$key][2] =  iconv($encode, "WINDOWS-1251", $ar_lines[2]);                  
            }
            else{
                unset($ar[$key]);
            }                     
        }
        
        $inc = 0;      
        //�������� ������ ���������
        foreach($ar as $key=>$arNewArt){
            if(!empty($arNewArt[1]) && $arNewArt[1] == "�������"){
                continue;
                $inc = 1;    
            }            
            elseif(!empty($arNewArt[1])){
                $arArts[$key+1] = $arNewArt[1]; 
            }
            else{
                $ar[$key]["ERROR"] = "�� �������� �������";
                $ar[$key]["ERROR_CODE"] = 2;
                $arErrors[$key+1+$inc] = $ar[$key];                
            }    
        }
        
        
        
        //�������� �� �������� �������� �� ��
        CModule::IncludeModule('iblock');
        //"PROPERTY_ARTIKUL_POSTAVSHCHIKA"=>$arArts
        $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_CODE" => "new_catalog", "ACTIVE"=>"Y", array("LOGIC" => "OR", array("PROPERTY_CML2_ARTICLE" => $arArts), array("PROPERTY_ARTIKUL_POSTAVSHCHIKA" => $arArts))), false, false, Array("ID", "NAME", "CODE", "PROPERTY_CML2_ARTICLE", "PROPERTY_ARTIKUL_POSTAVSHCHIKA", "PROPERTY_KRATNOST_OTGRUZKI", "PROPERTY_CML2_BASE_UNIT"));
        while($ar_res = $res->Fetch()){
            $arFound[] = $ar_res;
        }          
         
        //��������� ���� �� �������
        foreach($arArts as $index=>$arCheckArts){
            if(recursive_array_search($arCheckArts, $arFound) == false && recursive_array_search($arCheckArts, $arFound) !== 0){
                $arFailArts[$index] = $arCheckArts;
            }    
        }  
        
        //�������� �� ������ ��������
        foreach($arFailArts as $key=>$arErrArt){
            $ar[$key-1]["ERROR"] = '�������� �������';   
            $ar[$key-1]["ERROR_CODE"] = 1;   
        }
        
        //��������� �� ������� ���������� ��������� � ���������� �������
        foreach($arFound as $key=>$arSameArt){
            if(!in_array($arSameArt["PROPERTY_CML2_ARTICLE_VALUE"], $arArticuls)){
                $arArticuls[] = $arSameArt["PROPERTY_CML2_ARTICLE_VALUE"];   
            }
            else{              
                $ArticulErr[] = $arSameArt;
                foreach($arFound as $index=>$arBasketEx){                    
                    if(array_search($arSameArt["PROPERTY_CML2_ARTICLE_VALUE"], $arBasketEx)){                       
                        $keys = recursive_array_search($arBasketEx["PROPERTY_CML2_ARTICLE_VALUE"], $ar);                        
                        $arArticulsBad[$arSameArt["PROPERTY_CML2_ARTICLE_VALUE"]][$index] = $arBasketEx;   
                        $arArticulsBad[$arSameArt["PROPERTY_CML2_ARTICLE_VALUE"]][$index]["QUANTITY"] = $ar[$keys][2];   // 2 - Quantity
                    }                                             
                }                                            
            }             
            if(!in_array($arSameArt["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"], $arArticuls1)){
                $arArticuls1[] = $arSameArt["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"];   
            }
            else{              
                $ArticulErr[] = $arSameArt;
                foreach($arFound as $index=>$arBasketEx){                    
                    if(array_search($arSameArt["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"], $arBasketEx)){                       
                        $keys = recursive_array_search($arBasketEx["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"], $ar);                        
                        $arArticulsBad[$arSameArt["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"]][$index] = $arBasketEx;   
                        $arArticulsBad[$arSameArt["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"]][$index]["QUANTITY"] = $ar[$keys][2];   // 2 - Quantity
                    }                                             
                }                                            
            }        
        }
        //�������� ������������� ��������
        foreach($ArticulErr as $arrErr){
            $keys = recursive_array_search($arrErr["PROPERTY_CML2_ARTICLE_VALUE"], $ar);
            if(!empty($keys) || $keys == 0){
                $ar[$keys]["ERROR"] = "������������� �������";
                $ar[$keys]["ERROR_CODE"] = "3";                
            }                
        }        
        //�������� ������������� �������� ��������������
        foreach($ArticulErr as $arrErr){
            $keys = recursive_array_search($arrErr["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"], $ar);
            if(!empty($keys) || $keys == 0){
                $ar[$keys]["ERROR"] = "������������� �������";
                $ar[$keys]["ERROR_CODE"] = "3";                
            }                
        }
        
        //��������� ������ ������ � ������ ��� �������, � �� ������ � ������ � ��������

        foreach($ar as $index=>$arBask){
            if($arBask[0] == "������������"){
                $inc = 1;
                continue;
            }
            elseif(!$arBask["ERROR"]){               
                $keys = recursive_array_search($arBask['1'], $arFound);
                if(!empty($keys) || $keys == 0){
                    $arBask["ID"] = $arFound[$keys]["ID"];
                    $arBask[0] = $arFound[$keys]["NAME"];                
                    $arBask["DIMENSION"] = $arFound[$keys]["PROPERTY_KRATNOST_OTGRUZKI_VALUE"];                
                    $arBask["CML2_BASE_UNIT"] = $arFound[$keys]["PROPERTY_CML2_BASE_UNIT_VALUE"];                
                }                     
                $arToBasket[$index+1] = $arBask;
            } 
            else{
                $arErrors[$index+1] = $arBask;                  
            }   
        }
        
        //��������� ���������� �� �������������, ��������� ��������� �������
        foreach($arToBasket as $index=>$arAddBask){
            if(!empty($arAddBask[2])){
                $checker = $arAddBask[2]%$arAddBask["DIMENSION"];
                if($checker !== 0 ){
                    //����� �������� ��������� � ��������� ����������
                    $arDimension[$index]["CML2_BASE_UNIT"]=$arAddBask["CML2_BASE_UNIT"];
                    $arDimension[$index]["NAME"]=$arAddBask[0];
                    $arDimension[$index]["DIMENSION"]=$arAddBask["DIMENSION"];
                    $arDimension[$index]["QUANTITY"]=$arAddBask[2];
                    
                    $calc = $arAddBask[2] - $checker + $arAddBask["DIMENSION"];
                    $arToBasket[$index][2] = $calc;
                }  
            }   
            else{
                $arToBasket[$index][2] = $arAddBask["DIMENSION"];    
            }   
        }
        //��������� ������ �� ������ ������ � xls
        ksort($arErrors);
        
        //������������ ��� �������� � xls
        foreach($arErrors as $key=>$ar_lines){
            if($ar_lines["ERROR_CODE"] !== "3"){
                $arErrorsXLS[$key][0] =  iconv("WINDOWS-1251", "UTF-8", $ar_lines[0]);                 
                $arErrorsXLS[$key][1] =  iconv("WINDOWS-1251", "UTF-8", $ar_lines[1]);                                     
                $arErrorsXLS[$key][2] =  $ar_lines[2];     
                $arErrorsXLS[$key]["ERROR"] =  iconv("WINDOWS-1251", "UTF-8", $ar_lines["ERROR"]);   
            }                                  
        } 
        
        if (function_exists('mb_internal_encoding')) {
            $oldEncoding=mb_internal_encoding();
            //mb_internal_encoding('latin1');
        }
        if(!empty($arErrorsXLS)){
            //������� ���� ��� ��������
            $excel = new PHPExcel();
            
            // ������������� ������ ��������� �����
            $excel->setActiveSheetIndex(0);
            $sheet = $excel->getActiveSheet();
            // ����������� ����
            $sheet->setTitle('Price');
            
            $sheet->mergeCells("A1:E1");
            $sheet->setCellValue('A1', iconv("WINDOWS-1251", "UTF-8", "��� �������� xls ����� �� ��������� ��������� �������"));
            $sheet->setCellValueByColumnAndRow( 0, 2, iconv("WINDOWS-1251", "UTF-8", "���������� �����" ));
            $sheet->setCellValueByColumnAndRow( 1, 2, iconv("WINDOWS-1251", "UTF-8", "������������" ));
            $sheet->setCellValueByColumnAndRow( 2, 2, iconv("WINDOWS-1251", "UTF-8", "�������" ));
            $sheet->setCellValueByColumnAndRow( 3, 2, iconv("WINDOWS-1251", "UTF-8", "����������" ));                 
            $sheet->setCellValueByColumnAndRow( 4, 2, iconv("WINDOWS-1251", "UTF-8", "������� ������" ));                 

            //$excelWriter = PHPExcel_IOFactory::createWriter( $excel, 'Excel2007' );
            $rowNum = 3;
            foreach($arErrorsXLS as $keys=>$data){//foreach($arErrorsXLS as $rowNum => $data){                                
                $sheet->setCellValueByColumnAndRow( 0, $rowNum, $keys );
                $sheet->setCellValueByColumnAndRow( 1, $rowNum, $data[0] );// iconv(mb_detect_encoding($data[0]), "UTF-8", $data[0])
                $sheet->setCellValueByColumnAndRow( 2, $rowNum, $data[1] );
                $sheet->setCellValueByColumnAndRow( 3, $rowNum, $data[2] ); 
                $sheet->setCellValueByColumnAndRow( 4, $rowNum, $data["ERROR"] ); 
                $rowNum++;                       
            }
            $objWriter = new PHPExcel_Writer_Excel5($excel);
            $objWriter->save($_SERVER["DOCUMENT_ROOT"].'/files/'.session_id().'_output.xls');
            /*header("Content-Type: application/vnd.ms-excel\r\n");//���� ����� popup
            header("Content-Disposition: attachment; filename=\"my.xls\"\r\n");
            header("Cache-Control: max-age=0\r\n");*/
            //$excelWriter->save($_SERVER["DOCUMENT_ROOT"].'/files/'.session_id().'_output.'.$ext);//��������� ������ ����
        }  
        if (function_exists('mb_internal_encoding')){
            mb_internal_encoding($oldEncoding);
        }
        //������ ��������� � �������
        if (CModule::IncludeModule("catalog"))
        {
            foreach($arToBasket as $key=>$arBasketNewEl){
                Add2BasketByProductID($arBasketNewEl["ID"], $arBasketNewEl[2], array(), array());              
            }
        }

        ?>
     
        <!-- ������� �� ����������� �������� -->
        <?if(!empty($arErrors)):?>
        <div class="upload-not-add-goods">
            <label>��� �������� ����� �� ��������� ��������� �������</label>
            <a class="for_download_errors" style="display: none;" href="<?='/files/'.session_id().'_output.xls'?>" target="_blank"><?=session_id().'_output.xls'?></a>
            <table>
                <thead>
                    <th>�</th>
                    <th>������������</th>
                    <th>�������</th>
                </thead>
                <tbody>            
                    <?foreach($arErrors as $index=>$arToLogErr):?>               
                    <tr <?if($arErrors[$index]["ERROR_CODE"] == "1"):?>style="background: orange;"<?endif?><?if($arErrors[$index]["ERROR_CODE"] == "2"):?>style="background: red;"<?endif?><?if($arErrors[$index]["ERROR_CODE"] == "3"):?>style="background: yellow;"<?endif?>>                   
                        <td><?=$index?></td>
                        <?foreach($arToLogErr as $key=>$arToLogErrProp):?>
                            <?if($key !== "ERROR" && $key !== "ERROR_CODE" && $key !== 2):?>
                                <td style="padding: 0 2px;"><?=$arToLogErrProp?></td>
                            <?endif?>
                        <?endforeach?>
                    </tr>
                    <?endforeach?>                
                </tbody>
            </table>   
        </div>
        <?else:?>
        <div class="upload-not-add-goods">
            <p>������ ���������� �������!</p>
        </div>  
        <?endif?>
        <!-- �������� ������ ������ -->
        <?if(!empty($arArticulsBad)):?>
        <div class="upload-multipl-goods">
            <?foreach($arArticulsBad as $key=>$arOptions):?>
                <div class="multipl_goods_choose"><span>�������� ���������� ������ ��� �������� <?=$key?></span>
                <?foreach($arOptions as $arCases):?>                                            
                    <div><input type="checkbox" data-id="<?=$arCases["ID"]?>" data-quantity="<?=$arCases["QUANTITY"]?>" value="<?=$arCases["NAME"]?>" /><label><?=$arCases["NAME"]?></label></div>                    
                <?endforeach?>
                </div>
            <?endforeach;?>         
        </div> 
        <?endif?>   
        <?if(!empty($arErrors)):?>
        <div class="uploader-for-errors">
        <? /*   <p>��������: ��� ���������� �������� ������ ������� ���������� ���������:</p>
            <p>1. ������������ ��������</p>
            <p>2. ������� ������ � ����� ��������-��������</p>
            */ 
         ?> 
            <div class="upload-errors-goods"><span style="border: 5px solid red; display: inline-block; width: 10px;"></span> &mdash; ������� ������ </div>
            <div class="upload-errors-goods"><span style="border: 5px solid orange; display: inline-block; width: 10px;"></span> &mdash; ������� �������� </div>
            <div class="upload-errors-goods"><span style="border: 5px solid yellow; display: inline-block; width: 10px;"></span> &mdash; ������������� ������� </div>
            <?if(!empty($arDimension)):?>
                <div class="dimension-errors" style="max-height: 150px; overflow: auto; border-top: 1px solid #d2d1cf; display: none;">
                    <?foreach($arDimension as $key=>$arElDim):?>
                        <p>������ ����� <?=$arElDim["NAME"]?> ����� ��������� <?=$arElDim["DIMENSION"]?> <?=$arElDim["CML2_BASE_UNIT"]?>, ������� ������� ������� ���������� �������������.</p>
                    <?endforeach?>
                </div>
            <?endif?>
        </div>
        <?endif?>
        <?/*
        <!-- ������� ����������� �������� -->
        <table>
            <thead>
                <th>������������</th>
                <th>�������</th>
                <th>����������</th>
            </thead>
            <tbody>                
                <?foreach($arToBasket as $arToLog):?>
                <tr>
                    <?foreach($arToLog as $key=>$arToLogProp):?>
                        <?if($key !== "ID" && $key !== "SORT" && $key !== "CODE" && $key !== "PROPERTY_CML2_ARTICLE_VALUE_ID"):?>
                            <td><?=$arToLogProp?></td>
                        <?endif?>
                    <?endforeach?>
                </tr>
                <?endforeach?>               
            </tbody>
        </table>
        */?>
        <?
    }
}else{
    echo '������������ ������ �����.';
}
?>