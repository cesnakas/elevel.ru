<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������� ��������");
?>

<?$count =0;
$rsProperty = CIBlockProperty::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>83));
while($arProperty = $rsProperty->GetNext())
{
	echo $arProperty["NAME"]."<br/>";
	
	
	$count++;
}

echo "�����: ".$count;
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>