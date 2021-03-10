<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?><?
$arFilter = Array(
    "ID"                      => "13970 | 13969 | 13968 | 13965 | 13963 | 13962 | 13959 | 13956 | 13948",
    "ID_EXACT_MATCH"          => "Y",         // точное совпадение для ID
    "ACTIVE"                  => "Y",         // флаг активности
);

// получим список всех ответов вопроса #143
$rsAnswers = CFormAnswer::GetList(
    $QUESTION_ID, 
    $by="s_id", 
    $order="desc", 
    $arFilter, 
    $is_filtered
    );
while ($arAnswer = $rsAnswers->Fetch())
{
    echo "<pre>"; print_r($arAnswer); echo "</pre>";
}?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>