<?php ob_start(); ?>
<?php
error_reporting(-1);
require "config.php";
require ROOT."scripts/user_name.php";
require "secure.php";
mysql_select_db("ironcoders_forum");
$req=mysql_query("SELECT * FROM `phpbb_users` WHERE `username` LIKE  '%" . secure($_GET['term']) . "%'  ");
$c=0;
while($row = mysql_fetch_array($req))
{
	$c++;
	$results[] = array('label' => $row['username']);
	if($c>15)
		{
			$results[] = array('label' => "..");
			break;
		}
}

echo json_encode($results);
?>