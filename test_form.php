<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetPageProperty("description", "��������-������� �������������� ��������.��: ������ ��������� ����� � � �������. ������� ������������������� ������� ������� � ��������� �� ������ � ������. ���� �� 1 ���. ������ �� 20%.");
$APPLICATION->SetPageProperty("keywords", "�������������, �������������������, ��������������, ���������, ������, ����, ���������, �������, �������, ��������-�������, ��������, amperkin");
$APPLICATION->SetTitle("��������-������� ��������� | ������ ������������� � ������������������� | ���� �� 1���. � ��������.��");
?>
<?
CModule::IncludeModule("form");


CForm::GetResultAnswerArray(1, $arrColumns, $arrAnswers, $arrAnswersVarname, array("RESULT_ID" => "13970"));
foreach($arrAnswersVarname as $k=>$v){
        echo "���������: <br>";
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
        echo "���������: <br>";
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
        echo "���������: <br>";
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
        echo "���������: <br>";
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
        echo "���������: <br>";
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
        echo "���������: <br>";
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
        echo "���������: <br>";
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
        echo "���������: <br>";
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