<span id="count_span" style="display: none;"></span>
    <script>
        $('#count_page').html('<?=($this->NavRecordCount);?>');

    </script>
<?

echo ('<ul class="pager">');

if($this->NavPageNomer > 1)
    echo('<li style="padding-right: 7px;">
           <a  href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.($this->NavPageNomer-1).$strNavQueryString.'#nav_start'.$add_anchor.'">
                <img src="/i/icon13c_rov.gif" alt="">
            </a>
	    </li>
	    <li style="padding-right: 7px;"><a  href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'=1'.$strNavQueryString.'#nav_start'.$add_anchor.'">
                <img src="/i/icon13d_rov.gif" alt="">
            </a>
        </li>

            ');
else
    echo('<li style="padding-right: 7px;">
           <a>
                <img src="/i/icon13a.gif" alt="">
            </a>
	    </li>
	    <li style="padding-right: 7px;">
	        <a>
                <img src="/i/icon13b.gif" alt="">
            </a>
        </li>');

//echo('&nbsp;|&nbsp;');

$NavRecordGroup = $nStartPage;
while($NavRecordGroup <= $nEndPage)
{
    if($NavRecordGroup == $this->NavPageNomer)
        echo('<li style="padding-right: 7px;"><b>'.$NavRecordGroup.'</b></li>');
    else
        echo('<li style="padding-right: 7px;">
            <a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.$NavRecordGroup.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$NavRecordGroup.'</a>
        </li>');
    $NavRecordGroup++;
}

//echo('|&nbsp;');
if($this->NavPageNomer < $this->NavPageCount)
    echo ('<li style="padding-right: 7px;">
        <a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.($this->NavPageNomer+1).$strNavQueryString.'#nav_start'.$add_anchor.'">
            <img src="/i/icon13c.gif" alt="">
        </a>
        </li>
        <li style="padding-right: 7px;">

            <a href="'.$sUrlPath.'?PAGEN_'.$this->NavNum.'='.$this->NavPageCount.$strNavQueryString.'#nav_start'.$add_anchor.'">
                <img src="/i/icon13d.gif" alt="">
             </a>
        </li>');
else
    echo ('<li  style="padding-right: 7px;">
        <a>
            <img src="/i/icon13b_rov.gif" alt="">
        </a>
        </li>
        <li >
            <a>
                <img src="/i/icon13a_rov.gif" alt="">
             </a>
        </li>');
/*
if($this->bShowAll)
    echo ($this->NavShowAll? '<li style="padding-right: 7px;">
        <a class="tablebodylink" href="'.$sUrlPath.'?SHOWALL_'.$this->NavNum.'=0'.$strNavQueryString.'#nav_start'.$add_anchor.'">
            <img src="/i/icon13c.gif" alt="">
        </a></li>' : '|&nbsp;<a class="tablebodylink" href="'.$sUrlPath.'?SHOWALL_'.$this->NavNum.'=1'.$strNavQueryString.'#nav_start'.$add_anchor.'">'.$sAll.'</a>&nbsp;');

echo('</font>');
*/
echo('</ul>');
?>