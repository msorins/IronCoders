<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$surse_id=NULL; $surse_id=secure($_GET["id"]);

$query=mysql_query("SELECT * FROM `surse` WHERE `surse_id` = '$surse_id'");
$k=mysql_fetch_array($query);
echo $k["surse_utilzator"]."  ".$user_name;
if($k["surse_utilzator"]==$user_name)
{
	mysql_query("DELETE FROM `surse` WHERE `surse`.`surse_id` = '$surse_id'");
}
header('Location: /surse.php?type=list');
?>