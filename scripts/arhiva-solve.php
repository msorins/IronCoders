<?php ob_start(); ?>
<?php

require "config.php";
require ROOT."scripts/user_name.php";
require "secure.php";
require "ClassMongoExport.php";
require ROOT."scripts/function.evaluate.php";

$first=true;

$from=null; $from=secure($_POST["from"]);
if($from=="ide")
{
	//iau datele de la compilator
	$arhiva_source=$_POST["ide_source"];
	$ext=NULL; $ext=secure($_POST["ide_limbaj"]);
	$arhiva_nume=NULL; $arhiva_nume=secure($_POST["arhiva_nume"]);
	
	//gasesc id-ul job-ului
	$chat=file_get_contents (ROOT."scripts/nr-jobs.txt") ;
	$chat=(int) $chat; $chat++;
	file_put_contents (ROOT."scripts/nr-jobs.txt", $chat);
	$id=$chat;
	
	//setez arhiva_id
	$query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_nume` LIKE '$arhiva_nume'");
	$k=mysql_fetch_array($query);
	$arhiva_id=$k["arhiva_id"];
	
	$file_name=$id.".".$ext;
}
if($from==NULL)
{
	$arhiva_nume=NULL; $arhiva_nume=secure($_GET["arhiva_nume"]);
	$arhiva_id=NULL; $arhiva_id=secure($_GET["arhiva_id"]);

	//gasesc id-ul job-ului
	$chat=file_get_contents (ROOT."scripts/nr-jobs.txt") ;
	$chat=(int) $chat; $chat++;
	file_put_contents (ROOT."scripts/nr-jobs.txt", $chat);
	$id=$chat;

	$query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_id` = '$arhiva_id'");
	$k=mysql_fetch_array($query);


	//ma ocup de uploadarea sursei
	$path = $_FILES['file']['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	$file_name=$id.".".$ext;
}

//daca respecta formatul bun
if($user_name!=NULL)
{
	if ($ext=="cpp" || $ext=="c")
	  {
	  if ($_FILES["file"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
	  else
		{
		// cale fisiere
		$cale= ROOT."evaluator/arhiva/".$arhiva_nume."/sources/";
		$error= ROOT."evaluator/arhiva/".$arhiva_nume."/errors/".$id.".error"; 
		
		// creez fisierul.cpp
		if($from==NULL)
			move_uploaded_file($_FILES["file"]["tmp_name"],$cale . $file_name);
		
		if($from=="ide")
			file_put_contents($cale.$file_name, $arhiva_source);

		//limite problema
		$timp=$k["arhiva_timp"];
		$memorie=$k["arhiva_memorie"]+1024;
		
		//rezultatele
		$job_status=NULL;
		$job_owner=$user_name;
		$job_contest=NULL; $job_contest=secure($_POST["job_contest"]);
		$job_total_points=0;
		$job_tests_points=NULL;
		$job_tests_time=NULL;
		$job_tests_memory=NULL;
		$job_tests_message=NULL;
		$job_tests_groups=NULL;
		if($ext=="cpp")
			$job_language="C++";
		else
			$job_language="C";
		
		//Iau testele si le numar
		$cale2= ROOT."evaluator/arhiva/".$arhiva_nume."/tests";
		$tests = scandir($cale2);
		$nr=0;
		foreach($tests as $z)
		{
			if($z[0]!='.')
				$nr++;
		}
		$nr/=2;
		//Daca nr de teste a fost editat updatez si in baza de date
		if($nr!=$k["arhiva_numar_teste"])
		{
			mysql_query("UPDATE `arhiva` SET `arhiva_numar_teste` = '$nr' WHERE `arhiva`.`arhiva_id` = '$arhiva_id';");
		}
		
		$syscalls=ROOT."evaluator/bad_syscalls";

		//incep evaluarea 
		for($i=0; $i<$nr; $i++) // iau testele pe rand
		{
			//evaluarea propriu-zisa 
			$in=ROOT."evaluator/arhiva/".$arhiva_nume."/tests/".$i.".in"; 
			$out=ROOT."evaluator/arhiva/".$arhiva_nume."/outputs/".$id."-".$i.".out"; 
			
		
			evaluate($cale.$file_name , $cale.$id , $ext , $in , $out, $error, $memorie, $timp);

			
			if( strcmp($status, "Execution successful.") )
				$ok = true;
			else
				$ok = false;
			
			if($ok==true)// daca intra in timp si memorie
			{
			
				if(file_exists(ROOT."evaluator/arhiva/".$arhiva_nume."/tests/".$i.".out"))
				{
					//echo "out";
					$str1=file_get_contents(ROOT."evaluator/arhiva/".$arhiva_nume."/tests/".$i.".out");
				}
				else
				{
					//echo "ok";
					$str1=file_get_contents(ROOT."evaluator/arhiva/".$arhiva_nume."/tests/".$i.".ok");
				}

				$str2=file_get_contents(ROOT."evaluator/arhiva/".$arhiva_nume."/outputs/".$id."-".$i.".out");
				
				// Folosesc o functie de evaluare
				if(file_exists(ROOT."evaluator/arhiva/".$arhiva_nume."/is_test_ok.php"))
				{
					if($first==true)
					{
						$first=false;
						require(ROOT."evaluator/arhiva/".$arhiva_nume."/is_test_ok.php");
					}
					$ok=is_test_ok(file_get_contents($in), $str1, $str2);
				}

				$str1 = preg_replace('/\s+/', '', $str1);
				$str2 = preg_replace('/\s+/', '', $str2);			
				

				if(strcmp($str1,$str2)==0) // daca rezutatul e bun
				{
					$status="OK";
					$pc=100/$nr;
					$job_tests_points=$job_tests_points.$pc."#";
					$job_total_points+=$pc;
				}
				else
				{
					$status="Incorect";
					$job_tests_points=$job_tests_points."0#";
				}
			}
			else
				$job_tests_points=$job_tests_points."0#";
				
			$time=str_replace("ms","",$bucati_evaluator[2]); $time=(int)$time; 
			$memory=str_replace("kb:","",$bucati_evaluator[4]); $memory=(int)$memory; 
			if($memory>=1024)
			$memory-=1024;
			
			$job_tests_time=$job_tests_time.$time."#";
			$job_tests_memory=$job_tests_memory.$memory."#";
			$job_tests_message=$job_tests_message.$status."#";
			//acord punctajul , trec la urmatorul test
		}
		$job_status="Evaluat";
		mysql_query("INSERT INTO `jobs` (`job_id`, `job_problem_id`, `job_problem_name` ,`job_owner`, `job_status`, `job_contest`, `job_total_points`,`job_tests_points`, `job_tests_time`, `job_tests_memory`, `job_tests_message`, `job_tests_groups`, `job_date`, `job_language`) VALUES ('$id', '$arhiva_id' , '$arhiva_nume' ,'$job_owner' ,'$job_status', '$job_contest','$job_total_points' ,'$job_tests_points', '$job_tests_time', '$job_tests_memory', '$job_tests_message', '$job_tests_groups', NULL, '$job_language')")or die(mysql_error());
		
		if($job_total_points==100)
			mysql_query("UPDATE `arhiva` SET `arhiva_nr_rezolvitori` = `arhiva_nr_rezolvitori`+1 WHERE `arhiva`.`arhiva_id` = '$arhiva_id'");
		else
			mysql_query("UPDATE `arhiva` SET `arhiva_nr_incercari` = `arhiva_nr_incercari`+1 WHERE `arhiva`.`arhiva_id` = '$arhiva_id'");
		
		//Update user list of problems
		//$mongoExportObj-> jobsJsonToMongo( $mongoExportObj -> jobsToJson() );
		//$mongoExportObj-> userProblemsJsonToMongo( $mongoExportObj -> usersListMongo() );

		if($from==NULL)
		{
			//header( 'Location: /arhiva.php?type=view&name='.$arhiva_nume);
		}
		else
			echo $job_total_points."#".$id;
		 }
		  
		}
		else
			echo "Fisierul incarcat nu are formatul corespunzator ! "; 
}
else
	echo 991;

?>


