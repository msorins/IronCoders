<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";


$clase_titlu=NULL; $clase_titlu=secure($_POST["clase_titlu"]);
$user=NULL; $user=secure($_POST["user_name"]);
$ok=false;
if($clase_titlu==NULL && $user==NULL)
{
	$clase_titlu=secure($_GET["name"]);
	$user=secure($_GET["user"]);
	$ok=true;
}



mysql_select_db("ironcoders_forum");
$query=mysql_query("SELECT * FROM `phpbb_users` WHERE `username` LIKE '$user'");

if(!mysql_num_rows($query))
	echo "3";
else
{
	mysql_select_db("ironcoders");

	$query=mysql_query("SELECT * FROM `clase` WHERE `clase_titlu` LIKE '$clase_titlu'");
	$k=mysql_fetch_array($query);

	if(!strpos($k["clase_utilizatori"],$user))
		{
			$clase_utilizatori=$k["clase_utilizatori"]."#".$user;
			mysql_query("UPDATE `clase` SET `clase_utilizatori` = '$clase_utilizatori' WHERE `clase`.`clase_titlu` = '$clase_titlu'") or die(mysql_error());
			echo "1";
		}
	else
		echo "2";
}
if($ok)
	header( 'Location: /clase.php?type=view&name='.$clase_titlu);
?>