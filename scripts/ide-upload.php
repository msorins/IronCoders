<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
require ROOT."scripts/function.evaluate.php";
//error_reporting(-1);
require "secure.php";

// iau fisierul de intrare & sursa
$evaluate_source=NULL; $evaluate_input=NULL;
$evaluate_input=$_POST["ide_input"];
$evaluate_source=$_POST["ide_source"];
$evaluate_limbaj=$_POST["ide_limbaj"];

// aflu cate surse au fost evaluate pana acum
//$s=mysql_query("SELECT * FROM `evaluate_results` WHERE 1 = 1");
//$evaluate_id=mysql_num_rows($s)+1;
if($user_name!=NULL)
	$evaluate_id=$user_name;
else
	$evaluate_id=rand();

//Creez sursa
$file_name=$evaluate_id.".".$evaluate_limbaj;

//Setez calea catre directorul unde salvez sursele
$cale= ROOT."evaluator/sources/";

//creez fisierul.in
$ff = $cale.$evaluate_id.".in";
file_put_contents($ff, $evaluate_input);

//creez fisierul .cpp sau .c sau .pas
$ff = $cale.$evaluate_id.".".$evaluate_limbaj;
file_put_contents($ff, $evaluate_source);

//setez numele fisierelor .in  .out .error
$in= $evaluate_id.".in";
$out=$evaluate_id.".out";
$error= $evaluate_id.".error";

//Creez clasa
$status=NULL; $time=NULL; $memory=NULL; $errors=NULL;


//Tot procesul de evaluare este aici
evaluate($cale.$file_name , $cale.$evaluate_id , $evaluate_limbaj , $cale.$in , $cale.$out, $cale.$error, 10000, 5000);


//Salvez rezultatele
//mysql_query("INSERT INTO `evaluate_results` (`id`, `status`, `time`, `memory`) VALUES (NULL, '$status', '$time', '$memory')") or die(mysql_error());

//fac fisierul cu eroarea
$fis=$cale.$error;
$text=NULL;
$text=file_get_contents($fis); 
$text=str_replace(ROOT."evaluator/sources/","",$text);

if(!file_exists($cale.$evaluate_id))
{
	if($evaluate_limbaj!="pas")
		echo "Eroare in sintaxa#0#0#0#".$text;
	else
		echo "Eroare in sintaxa#0#0#0";
}
else
{
	$fis=$cale.$out;
	$text=file_get_contents($fis); 
	$text=ltrim($text); 
	$text=$text."#".$status."#".$time."#".$memory;
	echo $text;
}
	  

