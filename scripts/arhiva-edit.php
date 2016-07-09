<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
require "secure.php";

$type=secure($_GET["type"]);
if($type==NULL)
	$type=secure($_POST["type"]);
$arhiva_nume=NULL; $arhiva_nume=secure($_GET["arhiva_nume"]);
IF($arhiva_nume==NULL)
 $arhiva_nume=secure($_POST["arhiva_nume"]);
$cale=ROOT."evaluator/arhiva/".$arhiva_nume."/tests/";
if($type==1) // Editez informatii despre problema
{
	$arhiva_id=NULL; $arhiva_id=secure($_GET["arhiva_id"]);
	$arhiva_autor=NULL; $arhiva_autor=secure($_POST["arhiva_autor"]);
	$arhiva_cerinta=NULL; $arhiva_cerinta=secure_just_mysql($_POST["arhiva_cerinta"]);
	$arhiva_timp=NULL; $arhiva_timp=secure($_POST["arhiva_timp"]);
	$arhiva_memorie=NULL; $arhiva_memorie=secure($_POST["arhiva_memorie"]);
	$arhiva_grupa=NULL; $arhiva_grupa=secure($_POST["arhiva_grupa"]);
	
	if($arhiva_grupa=="Mica" || $arhiva_grupa=="Mică")
		$arhiva_grupa_nr=1;
	if($arhiva_grupa=="Medie")
		$arhiva_grupa_nr=2;
	if($arhiva_grupa=="Mare")
		$arhiva_grupa_nr=3;
	if($arhiva_grupa=="Toate")
		$arhiva_grupa_nr=4;
	
	$arhiva_autor=NULL; $arhiva_autor=secure($_POST["arhiva_autor"]);
	$arhiva_sursa=NULL; $arhiva_sursa=secure($_POST["arhiva_sursa"]);
	$arhiva_afiseaza=NULL; $arhiva_afiseaza=secure($_POST["arhiva_afiseaza2"]);
	$arhiva_concurs=NULL; $arhiva_concurs=secure($_POST["arhiva_concurs"]);
	
	$arhiva_categorii2=NULL; $arhiva_categorii2=$_POST["arhiva_categorii"]; $arhiva_categorii=NULL;
	for($i=0; $i<count($arhiva_categorii2); $i++)
		$arhiva_categorii=$arhiva_categorii.",".secure($arhiva_categorii2[$i]);
	
	mysql_query("UPDATE `arhiva` SET `arhiva_autor` = '$arhiva_autor', `arhiva_cerinta` = '$arhiva_cerinta', `arhiva_timp` = '$arhiva_timp', `arhiva_memorie` = '$arhiva_memorie', `arhiva_grupa` = '$arhiva_grupa' , `arhiva_sursa` = '$arhiva_sursa' , `arhiva_categorii` = '$arhiva_categorii' , `arhiva_afiseaza` = '$arhiva_afiseaza', `arhiva_concurs`='$arhiva_concurs' , `arhiva_grupa_nr` = '$arhiva_grupa_nr' WHERE `arhiva`.`arhiva_id` = '$arhiva_id';");
}
if($type==2) // redenumesc teste
{
	$test_old_name=NULL; $test_old_name=secure($_GET["name"]);
	$test_new_name=NULL; $test_new_name=secure($_POST["test_new_name"]);
	
	rename($cale.$test_old_name, $cale.$test_new_name);
}
if($type==3) // sterg teste
{
	$test_delete=NULL; $test_delete=secure($_GET["name"]);
	unlink($cale.$test_delete);
}
if($type==4) // uploadez teste
{
  $arhiva_numar_teste=count($_FILES['upload']['name']);
  for($i=0; $i<$arhiva_numar_teste; $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

  //Make sure we have a filepath
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = $cale.$_FILES['upload']['name'][$i];

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      //Handle other code here

    }
  }
  }
}
if($type==5)// uploadez fisierul de verificare al corectitudinii problemei
{
	$script=NULL; $script=$_POST["script"];
	file_put_contents(ROOT."evaluator/arhiva/".$arhiva_nume."/is_test_ok.php", $script);
}
if($type==6)// uploadez fisierul de verificare al corectitudinii problemei
{

	unlink (ROOT."evaluator/arhiva/".$arhiva_nume."/is_test_ok.php");
}
if($type!=5)
	header('Location: /arhiva.php?type=edit&name='.$arhiva_nume);
?>