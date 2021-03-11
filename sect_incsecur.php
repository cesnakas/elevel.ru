<?
function _sec_check_permissions($pga)
{
	global $USER;
	$arGroups = $USER->GetUserGroupArray();
	foreach($pga as $aid)
		foreach($arGroups as $uid)
			if ($aid == $uid)
				return true;
	return false;
}

$secure_dir = $_SERVER['DOCUMENT_ROOT'] . '/secure/';
if (file_exists($secure_dir))
{
	$inc_started = false;
	$inc_exist = false;
	$inc_files = scandir($secure_dir);
	if ($inc_files)
	{
		foreach($inc_files as $incfile)
		{
			if (!is_file($secure_dir . $incfile))
				continue;

			$path_parts = pathinfo($secure_dir . $incfile);
			if ($path_parts['extension'] != 'php')
				continue;

			// catch inc out
			ob_start();
				include $secure_dir . $incfile;
			$output = ob_get_contents();
			ob_end_clean();
			
			if (strlen($output) < 2)
				continue;
			
			$inc_exist = true;
			if (!$inc_started)
			{
				$inc_started = true;
				echo '<div id="secureinc">'."\n";
			}
			else
				echo "<hr />\n";
			
			echo $output;
		}
		if ($inc_exist)
			echo '</div>';
	}
}
?>