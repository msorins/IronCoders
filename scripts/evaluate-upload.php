<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

// iau fisierul de intrare 
$evaluate_input=secure($_POST["evaluate_input"]);
// aflu cate surse au fost evaluate pana acum
$s=mysql_query("SELECT * FROM `evaluate_results` WHERE 1 = 1");
$evaluate_id=0;
while($k=mysql_fetch_array($s))
{
	$evaluate_id++;
}
$evaluate_id++;

//ma ocup de uploadarea sursei
$path = $_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$file_name=$evaluate_id.".".$ext;

echo $file_name."          ";

if ($ext=="cpp" || $ext=="c" || $ext=="pas")
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
	  $cale= ROOT."evaluator/sources/";
	  // creez fisierul.in
	  $ff = $cale.$evaluate_id.".in";
	  file_put_contents($ff, $evaluate_input);
	  // creez fisierul.cpp
      move_uploaded_file($_FILES["file"]["tmp_name"],$cale . $file_name);
	  $in= $evaluate_id.".in";
	  $out=$evaluate_id.".out";
	  $error= $evaluate_id.".error";
	  //compilez sursa
	   $compiler=exec("g++ '$cale''$file_name' -o '$cale''$evaluate_id'  2> '$cale''$error'");
	  //evaluez sursa 
	  $evaluator=shell_exec("'$jrun_link'  --redirect-stdin '$cale'/'$in' --redirect-stdout '$cale'/'$out' --prog '$cale'/'$evaluate_id' --memory-limit 90000 --time-limit 5000");
	  
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
	  
	  //trimit rezultatele
	  header( 'Location: /evaluate.php?id='.$evaluate_id);
	 }
	  
    }
  }
else
  {
  echo "Invalid file";
  }
