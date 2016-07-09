<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

// iau fisierul de intrare & sursa
$evaluate_source=NULL; $evaluate_input=NULL;
$evaluate_input=$_POST["ide_input"];
$evaluate_source=$_POST["ide_source"];
// aflu cate surse au fost evaluate pana acum
$s=mysql_query("SELECT * FROM `evaluate_results` WHERE 1 = 1");
$evaluate_id=mysql_num_rows($s)+1;

$file_name=$evaluate_id.".cpp";

$cale= ROOT."evaluator/sources/";
	  // creez fisierul.in
	  $ff = $cale.$evaluate_id.".in";
	  file_put_contents($ff, $evaluate_input);
	  // creez fisierul.cpp
	  $ff = $cale.$evaluate_id.".cpp";
	  file_put_contents($ff, $evaluate_source);

	  $in= $evaluate_id.".in";
	  $out=$evaluate_id.".out";
	  $error= $evaluate_id.".error";
	  //compilez sursa
	   $compiler=exec("g++ '$cale''$file_name' -o '$cale''$evaluate_id'  2> '$cale''$error'");
	  //evaluez sursa 
	  $syscalls=ROOT."evaluator/bad_syscalls";
	  $evaluator=shell_exec("jrun  --redirect-stdin '$cale'/'$in' --redirect-stdout '$cale'/'$out' --prog '$cale'/'$evaluate_id' --memory-limit 90000 --time-limit 5000 --block-syscalls-file='$syscalls'");
	  
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

	  mysql_query("INSERT INTO `evaluate_results` (`id`, `status`, `time`, `memory`) VALUES (NULL, '$status', '$time', '$memory')") or die(mysql_error());
	  $fis=$cale.$error;
	  $text=file_get_contents($fis); 
	  if(strlen($text)!=0)
	  {
		echo "Eroare#".$text;
	  }
	  else
	  {
		  $fis=$cale.$out;
		  $text=file_get_contents($fis); 
		  $text=ltrim($text); 
		  $text=$text."#".$status."#".$time."#".$memory;
		  echo $text;
	   }
	  

