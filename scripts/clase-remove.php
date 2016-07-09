<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);

require "secure.php";
$user_name2=$user_name;

$clase_titlu=NULL; $clase_titlu=secure($_GET["clase_titlu"]);
$remove=NULL; $remove=secure($_GET["remove"]);

$query=mysql_query("SELECT * FROM `clase` WHERE `clase_titlu` LIKE '$clase_titlu'");
$k=mysql_fetch_array($query);
$clase_utilizatori_aux=explode("#",$k["clase_utilizatori"]);
$clase_utilizatori=NULL;
for($i=0; $i<count($clase_utilizatori_aux); $i++)
{
	if(trim($clase_utilizatori_aux[$i])!=trim($remove) && $clase_utilizatori_aux[$i]!="")
		$clase_utilizatori=$clase_utilizatori.$clase_utilizatori_aux[$i]."#";
}
mysql_query("UPDATE `clase` SET `clase_utilizatori` = '$clase_utilizatori' WHERE `clase`.`clase_titlu` = '$clase_titlu'");
header('Location: /clase.php?type=edit&name='.$clase_titlu);
?>

