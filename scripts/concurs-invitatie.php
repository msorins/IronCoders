<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$concurs_nume=NULL; $concurs_nume=secure($_POST["concurs_nume"]);
$concurs_clasa=NULL; $concurs_clasa=secure($_POST["concurs_clasa"]);
$concurs_liceu=NULL; $concurs_liceu=secure($_POST["concurs_liceu"]);

mysql_query("INSERT INTO `concursuri` (`concurs_id`, `concurs_nume`, `concurs_clasa`, `concurs_liceu`) VALUES (NULL, '$concurs_nume', '$concurs_clasa', '$concurs_liceu');");

header('Location: /concurs.php?type=registered');

?>

