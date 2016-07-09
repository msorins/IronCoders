<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$nr_grup=NULL; $nr_grup=secure($_POST["nr_grup"]);
$cursuri_nume=NULL; $cursuri_nume=secure($_POST["cursuri_nume"]);

$query=mysql_query("SELECT * FROM `cursuri` WHERE `cursuri_nume` LIKE '$cursuri_nume'");
$k=mysql_fetch_array($query);


$cursuri_grupe_descriere=explode("#",$k["cursuri_grupe_descriere"]);
$cursuri_grupe_titlu=explode("#",$k["cursuri_grupe_titlu"]);


if(($nr_grup)<=count($cursuri_grupe_descriere))
{
	echo $cursuri_grupe_descriere[$nr_grup-1]."#".$cursuri_grupe_titlu[$nr_grup-1];
}
else
{
	echo "##";
}
?>