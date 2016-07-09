<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(ALL);
require "secure.php";

$cpp=NULL; $cpp=$_POST["cpp"];
$cursuri_nume=NULL; $cursuri_nume=secure($_POST["name"]);
$nr_lectie=NULL; $nr_lectie=secure($_POST["nr_lectie"]);
$evaluate_input=NULL; $evaluate_input=$_POST["evaluate_input"];

$query=mysql_query("SELECT * FROM `cursuri` WHERE `cursuri_nume` LIKE '$cursuri_nume'");
$k=mysql_fetch_array($query);

$file_name=$user_name."-".$k["cursuri_id"]."-".$nr_lectie;
$cale= ROOT."cursuri/users_code/";
	 
 // creez fisierul.in
file_put_contents($cale.$file_name.".in", $evaluate_input);

// creez fisierul.cpp
file_put_contents($cale.$file_name.".cpp", $cpp);

$in= $file_name.".in";
$out=$file_name.".out";
$error= $file_name.".error";
$file_name2=$file_name;
$file_name.=".cpp";
//compilez sursa
$compiler=exec("g++ '$cale''$file_name' -o '$cale''$file_name2'  2> '$cale''$error'");
//evaluez sursa 
$syscalls=ROOT."evaluator/bad_syscalls";
$evaluator=shell_exec("$jrun_link  --redirect-stdin '$cale'/'$in' --redirect-stdout '$cale'/'$out' --prog '$cale'/'$file_name2' --memory-limit 90000 --time-limit 5000 --block-syscalls-file='$syscalls'");
	  
$bucati_evaluator=explode(" ", $evaluator);
$status=NULL;
for($i=5; $i<=10; $i++)
	{
		if(!isset($bucati_evaluator[$i]))
			break;
		if(strlen($bucati_evaluator[$i])==0)
			break;
		$status=$status.$bucati_evaluator[$i];
		$status=$status." ";
	}
$time=str_replace("ms","",$bucati_evaluator[2]); $time=(int)$time; 
$memory=str_replace("kb:","",$bucati_evaluator[4]); $memory=(int)$memory; $memory-=1024;
	  
if($memory<0)
	$memory=0;
		
if($compiler!=NULL)
{
	$errors=htmlspecialchars($compiler);
	$errors=mysql_real_escape_string($errors);
	$poz = strpos($errors, "error: ");  
    $errors=str_replace("error: ","",$errors);
	for($i=$poz; $i<=strlen($errors); $i++)
	{
	  if($i>=500)
		  break;
	  $errors2=$errors2.$errors[$i];
	}
	$errors=$errors2;
}
$fis=$cale.$error;
$text=file_get_contents($fis); 
$text=str_replace(ROOT."cursuri/users_code/","",$text);
if(strlen($text)!=0)
 {
   echo "0#".$text; // nu atribui punctajul si scriu eroarea
 }
else
 {
	$fis=$cale.$out;
	$text=file_get_contents($fis); 
	$text=ltrim($text); 
	require(ROOT."cursuri/submission_test/".$k["cursuri_id"]."-".$nr_lectie.".php");
	
	$rez=verificare($cpp,$text);
	echo $rez."#".$text;
	
	$adaugat=$k["cursuri_id"]."-".$nr_lectie."#";
	if(strpos($user_cursuri_terminate, "#".$adaugat)==NULL)
	{
		$user_cursuri_terminate.=$adaugat;
		mysql_query("UPDATE `phpbb_users` SET `user_cursuri_terminate` = '$user_cursuri_terminate' WHERE `phpbb_users`.`user_id` = '$user_id';");
	}
  }
	  
?>