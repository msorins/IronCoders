<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
require ROOT."scripts/function.evaluate.php";
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


evaluate($cale.$file_name , $cale.$file_name2 , 'cpp' , $cale.$in , $cale.$out, $cale.$error, $memorie, $timp, True);


$text=file_get_contents($cale.$error);
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
		//mysql_query("UPDATE `phpbb_users` SET `user_cursuri_terminate` = '$user_cursuri_terminate' WHERE `phpbb_users`.`user_id` = '$user_id';");
		$m = new MongoClient();
		$db = $m->ironcoders_MongoDB;
		$db -> objects -> update(
				array('uid' => $user_id),
				array('$set' =>  array("user_cursuri_terminate" => $user_cursuri_terminate ))
			);

	    $_SESSION["user_cursuri_terminate"] = $user_cursuri_terminate;
	}
  }

?>
