<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$name=$_POST["name"]; $name=secure($name);


$query=mysql_query("SELECT * FROM `clase` WHERE `clase_titlu` LIKE '$name'");
if(mysql_num_rows($query)>0 || $name=="")
	echo "0";
else
	echo "1";

?>