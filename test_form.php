<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetPageProperty("description", "Интернет-магазин электротоваров Амперкин.ру: купить электрику оптом и в розницу. Продажа электрооборудования ведущих брендов с доставкой по Москве и России. Цены от 1 руб. Скидки до 20%.");
$APPLICATION->SetPageProperty("keywords", "электротовары, электрооборудование, электротехника, электрика, купить, цена, стоимость, каталог, продажа, интернет-магазин, амперкин, amperkin");
$APPLICATION->SetTitle("Интернет-магазин электрики | Купить электротовары и электрооборудование | Цены от 1руб. – Амперкин.ру");
?>
<?
CModule::IncludeModule("form");


CForm::GetResultAnswerArray(1, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => "13970"));
foreach($arrAnswersVarname as $k=>$v){
        echo "Результат: <br>";
    foreach($v as $t=>$u){
        foreach($u as $key=>$value){
            if($value["USER_TEXT"]!=""){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value["TITLE"].": ".iconv("utf-8","cp1251",$value["USER_TEXT"])."<br>";                
            }
            // echo "+<pre>";print_r($value);echo "</pre>+";
        }
    }
}

CForm::GetResultAnswerArray(1, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => "13969"));
foreach($arrAnswersVarname as $k=>$v){
        echo "Результат: <br>";
    foreach($v as $t=>$u){
        foreach($u as $key=>$value){
            if($value["USER_TEXT"]!=""){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value["TITLE"].": ".iconv("utf-8","cp1251",$value["USER_TEXT"])."<br>";                
            }
            // echo "+<pre>";print_r($value);echo "</pre>+";
        }
    }
        echo "<br><br><br><br>";
}

CForm::GetResultAnswerArray(1, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => "13965"));
foreach($arrAnswersVarname as $k=>$v){
        echo "Результат: <br>";
    foreach($v as $t=>$u){
        foreach($u as $key=>$value){
            if($value["USER_TEXT"]!=""){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value["TITLE"].": ".iconv("utf-8","cp1251",$value["USER_TEXT"])."<br>";                
            }
            // echo "+<pre>";print_r($value);echo "</pre>+";
        }
    }
}

CForm::GetResultAnswerArray(1, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => "13963"));
foreach($arrAnswersVarname as $k=>$v){
        echo "Результат: <br>";
    foreach($v as $t=>$u){
        foreach($u as $key=>$value){
            if($value["USER_TEXT"]!=""){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value["TITLE"].": ".iconv("utf-8","cp1251",$value["USER_TEXT"])."<br>";                
            }
            // echo "+<pre>";print_r($value);echo "</pre>+";
        }
    }
}

CForm::GetResultAnswerArray(1, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => "13962"));
foreach($arrAnswersVarname as $k=>$v){
        echo "Результат: <br>";
    foreach($v as $t=>$u){
        foreach($u as $key=>$value){
            if($value["USER_TEXT"]!=""){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value["TITLE"].": ".iconv("utf-8","cp1251",$value["USER_TEXT"])."<br>";                
            }
            // echo "+<pre>";print_r($value);echo "</pre>+";
        }
    }
}

CForm::GetResultAnswerArray(1, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => "13959"));
foreach($arrAnswersVarname as $k=>$v){
        echo "Результат: <br>";
    foreach($v as $t=>$u){
        foreach($u as $key=>$value){
            if($value["USER_TEXT"]!=""){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value["TITLE"].": ".iconv("utf-8","cp1251",$value["USER_TEXT"])."<br>";                
            }
            // echo "+<pre>";print_r($value);echo "</pre>+";
        }
    }
}

CForm::GetResultAnswerArray(1, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => "13956"));
foreach($arrAnswersVarname as $k=>$v){
        echo "Результат: <br>";
    foreach($v as $t=>$u){
        foreach($u as $key=>$value){
            if($value["USER_TEXT"]!=""){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value["TITLE"].": ".iconv("utf-8","cp1251",$value["USER_TEXT"])."<br>";                
            }
            // echo "+<pre>";print_r($value);echo "</pre>+";
        }
    }
}

CForm::GetResultAnswerArray(1, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => "13948"));
foreach($arrAnswersVarname as $k=>$v){
        echo "Результат: <br>";
    foreach($v as $t=>$u){
        foreach($u as $key=>$value){
            if($value["USER_TEXT"]!=""){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value["TITLE"].": ".iconv("utf-8","cp1251",$value["USER_TEXT"])."<br>";                
            }
            // echo "+<pre>";print_r($value);echo "</pre>+";
        }
    }
}


?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>