<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$nr_lectie=NULL; $nr_lectie=secure($_POST["nr_lectie"]);
$cursuri_nume=NULL; $cursuri_nume=secure($_POST["cursuri_nume"]);
$type=NULL; $type=$_POST["type"]; 
if($type=="undefined") $type=1; else $type=secure($type);
$reseteaza=NULL; $reseteaza=secure($_POST["reseteaza"]);

$query=mysql_query("SELECT * FROM `cursuri` WHERE `cursuri_nume` LIKE '$cursuri_nume'");
$k=mysql_fetch_array($query);
$id=$k["cursuri_id"];

$fis=ROOT.'cursuri/submission_test/'.$id.'-'.$nr_lectie.'.php';
if(file_exists ($fis))
	$functie_corectare=file_get_contents($fis); 
else
	$functie_corectare="<?php

function verificare(\$string, \$output)
{
		
}

?>";

$ok=false;
if($type==2)
{
	$fis=ROOT.'cursuri/users_code/'.$user_name.'-'.$id.'-'.$nr_lectie.'.cpp';
	if(file_exists ($fis) && $reseteaza==0)
	{
		$default_code=file_get_contents($fis); 
		$ok=true;
	}
}
if($type==1 || $ok==false)
{
	$fis=ROOT.'cursuri/default_code/'.$id.'-'.$nr_lectie.'.cpp';
	if(file_exists ($fis))
		$default_code=file_get_contents($fis); 
	else
		$default_code=file_get_contents(ROOT.'cursuri/default_code/default.cpp');
}
	
$fis=ROOT.'cursuri/input_file/'.$id.'-'.$nr_lectie.'.in';
if(file_exists ($fis))
	$fisier_intrare=file_get_contents($fis); 
else
	$fisier_intrare=NULL;
	
$default_code=str_replace("#","diez",$default_code);
$functie_corectare=str_replace("#","diez",$functie_corectare);

$cursuri_lectii_titlu=explode("#",$k["cursuri_lectii_titlu"]);
$cursuri_lectii_explicatii=explode("#",$k["cursuri_lectii_explicatii"]);
$cursuri_lectii_instructiuni=explode("#",$k["cursuri_lectii_instructiuni"]);


$total_lectii= explode("#",$k["cursuri_lectii_grupe"]);
$total_lectii= $total_lectii[count($total_lectii)-2];
$total_lectii= explode("-",$total_lectii);
$total_lectii= $total_lectii[1];


if($nr_lectie <= $total_lectii)
{
 if($type==2)
 {
	$explicatii=nl2br($cursuri_lectii_explicatii[$nr_lectie-1]);
	$instructiuni=nl2br($cursuri_lectii_instructiuni[$nr_lectie-1]);
	echo $cursuri_lectii_titlu[$nr_lectie-1]."#".$explicatii."#".$instructiuni."#".$functie_corectare."#".$default_code."#".$fisier_intrare;
 }
 else
	echo $cursuri_lectii_titlu[$nr_lectie-1]."#".$cursuri_lectii_explicatii[$nr_lectie-1]."#".$cursuri_lectii_instructiuni[$nr_lectie-1]."#".$functie_corectare."#".$default_code."#".$fisier_intrare;
}
else
{
	if($type==2)
		echo "Curs_Terminat";
	else
	{
		if(($nr_lectie)<=count($cursuri_lectii_titlu))
			echo $cursuri_lectii_titlu[$nr_lectie-1]."#".$cursuri_lectii_explicatii[$nr_lectie-1]."#".$cursuri_lectii_instructiuni[$nr_lectie-1]."#".$functie_corectare."#".$default_code."#".$fisier_intrare;
		else
			echo nl2br("###".$functie_corectare."#".$default_code."#");
	}
}

?>