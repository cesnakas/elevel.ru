<?
$sChainProlog = "";   // HTML выводимый перед навигационной цепочкой
$sChainBody = "";     // пункт навигационной цепочки
$sChainEpilog = "";   // HTML выводимый после навигационной цепочки

// разделитель
if ($ITEM_INDEX > 0)
   $sChainBody = " / ";

$sChainBody .= htmlspecialchars($TITLE, ENT_COMPAT, "cp1251");
?>