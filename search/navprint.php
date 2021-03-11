<?
echo '<div class="navprint">';
	echo "<div style='color: #727071'>".$title;
	echo (($this->NavPageNomer-1)*$this->NavPageSize+1);
	echo (' - ');
	if ($this->NavPageNomer != $this->NavPageCount)
	  echo($this->NavPageNomer * $this->NavPageSize);
	else
	  echo($this->NavRecordCount); 
	echo(' '.GetMessage("nav_of").' ');
	echo($this->NavRecordCount);
	echo "</div>";
	
	if($this->NavPageNomer > 1)
	  echo('<a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'=1'.
	  $strNavQueryString.'#nav_start'.$add_anchor.'">в начало</a> | <a href="'.$sUrlPath.'?PAGEN_'.
	  $this->NavNum.'='.($this->NavPageNomer-1).$strNavQueryString.'#nav_start'.
	  $add_anchor.'">&lt;</a> ');
	else
	  echo('в начало | &lt; ');
	
	echo(' | '); 
	
	$NavRecordGroup = $nStartPage;
	while($NavRecordGroup <= $nEndPage)
	{
	  if($NavRecordGroup == $this->NavPageNomer) 
	    echo('<span>'.$NavRecordGroup.'</span> '); 
	  else
	    echo('<a class="tablebodylink" href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.
		$NavRecordGroup.$strNavQueryString.'#nav_start'.$add_anchor.'">'.
		$NavRecordGroup.'</a> ');
	
	  $NavRecordGroup++;
	}
	
	echo('| ');
	if($this->NavPageNomer < $this->NavPageCount)
	  echo (' <a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.
	  ($this->NavPageNomer+1).$strNavQueryString.'#nav_start'.$add_anchor.'">&gt;</a> | <a href="'.$sUrlPath.'?PAGEN_'.
	  $this->NavNum.'='.$this->NavPageCount.$strNavQueryString.
	  '#nav_start'.$add_anchor.'">в конец</a> ');
	else
	  echo (' &gt; | в конец ');
	
	if($this->bShowAll)
	  echo ($this->NavShowAll? '| <a class="tablebodylink"  href="'.$sUrlPath.'?SHOWALL_'.$this->NavNum.'=0'.$strNavQueryString.'#nav_start'.$add_anchor.'">^ по страницам</a> ' : 
	  							'| <a class="tablebodylink" href="'.$sUrlPath.'?SHOWALL_'.$this->NavNum.'=1'.$strNavQueryString.'#nav_start'.$add_anchor.'">^ все</a> ');
echo '</div>';
?>