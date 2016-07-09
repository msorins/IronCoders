<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$competitii_nume=NULL; $competitii_nume=secure($_POST["competitii_nume"]);
$competitii_data_incepere=NULL; $competitii_data_incepere=secure($_POST["competitii_data_incepere"]);
$competitii_descriere=NULL; $competitii_descriere=secure($_POST["competitii_descriere"]);
$competitii_probleme=NULL; $competitii_probleme=secure($_POST["competitii_probleme"]);
$competitii_durata=NULL; $competitii_durata=secure($_POST["competitii_durata"]);
$competitii_oficial=NULL; $competitii_oficial=secure($_POST["competitii_oficial"]);
$competitii_status="In asteptare";
$competitii_adaugat_de=$user_name;

mysql_query("INSERT INTO `competitii` (`competitii_id`, `competitii_nume`, `competitii_adaugat_de`, `competitii_status`, `competitii_probleme`, `competitii_data_incepere`, `competitii_durata`, `competitii_descriere`, `competitii_oficial`) VALUES (NULL, '$competitii_nume', '$competitii_adaugat_de', '$competitii_status', '$competitii_probleme', '$competitii_data_incepere', '$competitii_durata', '$competitii_descriere', '$competitii_oficial')");
header('Location: /competitii.php');
?>

