<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "config.php";
require "secure.php";

$surse_titlu=NULL; $surse_titlu=secure($_POST["surse_titlu"]);
$surse_utilizator=$user_name;
$surse_descriere=NULL; $surse_descriere=secure($_POST["surse_descriere"]);
$surse_sursa=NULL; $surse_sursa=secure_just_mysql($_POST["surse_sursa"]);
echo $surse_titlu." ".$surse_descriere." ".$surse_sursa;

mysql_query("INSERT INTO `surse` (`surse_id`, `surse_utilzator`, `surse_titlu`, `surse_descriere`, `surse_sursa`) VALUES (NULL, '$surse_utilizator', '$surse_titlu', '$surse_descriere', '$surse_sursa');");

?>