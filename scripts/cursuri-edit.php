<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

//iau datele transmise
$cursuri_nr=NULL; $cursuri_nr=secure($_POST["cursuri_nr"]);
$grupe_nr=NULL; $grupe_nr=secure($_POST["grupe_nr"]);
$editor_value=NULL; $editor_value=$_POST["editor_value"];
$editor2_value=NULL; $editor2_value=$_POST["editor2_value"];
$cursuri_org_nume=NULL; $cursuri_org_nume=secure($_POST["cursuri_org_nume"]);
$cursuri_nume=NULL; $cursuri_nume=secure($_POST["cursuri_nume"]);
$cursuri_fisier_intrare=NULL; $cursuri_fisier_intrare=$_POST["fisier_intrare"];
$cursuri_descriere=NULL; $cursuri_descriere=secure($_POST["cursuri_descriere"]);
$cursuri_lectii_titlu=NULL; $cursuri_lectii_titlu=secure($_POST["cursuri_lectii_titlu"]);
$cursuri_lectii_explicatii=NULL; $cursuri_lectii_explicatii=secure_just_mysql($_POST["cursuri_lectii_explicatii"]);
$cursuri_lectii_instructiuni=NULL; $cursuri_lectii_instructiuni=secure_just_mysql($_POST["cursuri_lectii_instructiuni"]);


$cursuri_lectii_grupe=NULL; $cursuri_lectii_grupe=secure($_POST["cursuri_lectii_grupe"]);
$cursuri_grupe_descriere=NULL; $cursuri_grupe_descriere=secure($_POST["cursuri_grupe_descriere"]);
$cursuri_grupe_titlu=NULL; $cursuri_grupe_titlu=secure($_POST["cursuri_grupe_titlu"]);



//iau datele existente si le fac un explode
$query=mysql_query("SELECT * FROM `cursuri` WHERE `cursuri_nume` LIKE '$cursuri_org_nume'");
$k=mysql_fetch_array($query);
$id=$k["cursuri_id"];

$cale= ROOT."cursuri/default_code/";
file_put_contents($cale.$id."-".$cursuri_nr.".cpp", $editor2_value);
$cale= ROOT."cursuri/submission_test/";
file_put_contents($cale.$id."-".$cursuri_nr.".php", $editor_value);
$cale= ROOT."cursuri/input_file/";
file_put_contents($cale.$id."-".$cursuri_nr.".in", $cursuri_fisier_intrare);

$cursuri_lectii_titlu2=explode("#",$k["cursuri_lectii_titlu"]);
$cursuri_lectii_explicatii2=explode("#",$k["cursuri_lectii_explicatii"]);
$cursuri_lectii_instructiuni2=explode("#",$k["cursuri_lectii_instructiuni"]);

$cursuri_grupe_descriere2=explode("#",$k["cursuri_grupe_descriere"]);
$cursuri_grupe_titlu2=explode("#",$k["cursuri_grupe_titlu"]);

//inlocuiesc datele existente cu unele noi
$cursuri_lectii_titlu2[$cursuri_nr-1]=$cursuri_lectii_titlu;
$cursuri_lectii_explicatii2[$cursuri_nr-1]=$cursuri_lectii_explicatii;
$cursuri_lectii_instructiuni2[$cursuri_nr-1]=$cursuri_lectii_instructiuni;

$cursuri_grupe_descriere2[$grupe_nr-1]=$cursuri_grupe_descriere;
$cursuri_grupe_titlu2[$grupe_nr-1]=$cursuri_grupe_titlu;


//formez noi stringuri pentru a le baga in dba_close
$cursuri_lectii_titlu=NULL; $cursuri_lectii_explicatii=NULL; $cursuri_lectii_instructiuni=NULL; $cursuri_grupe_descriere=NULL; $cursuri_grupe_titlu=NULL;
for($i=0; $i<max(count($cursuri_lectii_titlu2),$cursuri_nr+1)-1; $i++)
	$cursuri_lectii_titlu=$cursuri_lectii_titlu.$cursuri_lectii_titlu2[$i]."#";

for($i=0; $i<max(count($cursuri_lectii_titlu2),$cursuri_nr+1)-1; $i++)
	$cursuri_lectii_explicatii=$cursuri_lectii_explicatii.$cursuri_lectii_explicatii2[$i]."#";
	
for($i=0; $i<max(count($cursuri_lectii_titlu2),$cursuri_nr+1)-1; $i++)
	$cursuri_lectii_instructiuni=$cursuri_lectii_instructiuni.$cursuri_lectii_instructiuni2[$i]."#";
	
for($i=0; $i<max(count($cursuri_grupe_descriere2),$grupe_nr+1)-1; $i++)
	$cursuri_grupe_descriere=$cursuri_grupe_descriere.$cursuri_grupe_descriere2[$i]."#";

for($i=0; $i<max(count($cursuri_grupe_titlu2),$grupe_nr+1)-1; $i++)
	$cursuri_grupe_titlu=$cursuri_grupe_titlu.$cursuri_grupe_titlu2[$i]."#";

mysql_query("UPDATE `cursuri` SET `cursuri_nume` = '$cursuri_nume', `cursuri_lectii_titlu` = '$cursuri_lectii_titlu', `cursuri_lectii_explicatii` = '$cursuri_lectii_explicatii', `cursuri_lectii_instructiuni` = '$cursuri_lectii_instructiuni', `cursuri_descriere` = '$cursuri_descriere' , `cursuri_grupe_titlu` = '$cursuri_grupe_titlu' , `cursuri_grupe_descriere` = '$cursuri_grupe_descriere' , `cursuri_grupe_titlu`= '$cursuri_grupe_titlu', `cursuri_lectii_grupe` = '$cursuri_lectii_grupe' WHERE `cursuri`.`cursuri_id` = '$id'");

?>