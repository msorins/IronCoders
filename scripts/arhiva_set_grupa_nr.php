<?php ob_start(); ?>
<?php
require ROOT."scripts/user_name.php";
require "config.php";
require "secure.php";

$query=mysql_query("SELECT * FROM `arhiva`");
while($k= mysql_fetch_array($query))
{
	if($k["arhiva_grupa"]=="Mică" || $k["arhiva_grupa"]=="Mica")
		$gr=1;
	if($k["arhiva_grupa"]=="Medie")
		$gr=2;
	if($k["arhiva_grupa"]=="Mare")
		$gr=3;
	if($k["arhiva_grupa"]=="Toate")
		$gr=4;
	$id=$k["arhiva_id"];
	mysql_query("UPDATE `arhiva` SET `arhiva_grupa_nr` = '$gr' WHERE `arhiva`.`arhiva_id` = '$id'");
}
?>