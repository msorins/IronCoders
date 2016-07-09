<?php ob_start(); ?>
<?php
require "config.php";
error_reporting(-1);
require ROOT."scripts/user_name.php";
require "secure.php";

$first=true;
$partial_first=true;

$ajob_descriere=NULL; $ajob_descriere=secure($_POST["ajob_descriere"]);
$timp=NULL; $timp=secure($_POST["timp"]);
$memorie=NULL; $memorie=secure($_POST["memorie"]);
$nume_fisier=NULL; $nume_fisier=secure($_POST["fisier"]);

//gasesc id-ul ajob-ului
$id=file_get_contents (ROOT."scripts/nr-ajobs.txt") ;
$id=(int) $id; $id++;
file_put_contents (ROOT."scripts/nr-ajobs.txt", $id);

$query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_id` = '$arhiva_id'");
$k=mysql_fetch_array($query);

//fac folderele necesare
$cale= ROOT."evaluator/ajobs/".$id;
mkdir($cale.'/tests', 0777, true);
mkdir($cale.'/sources', 0777, true);
mkdir($cale.'/outputs', 0777, true);
mkdir($cale.'/errors', 0777, true);
mkdir($cale.'/eval', 0777, true);

//uploadez testele
$ajobs_numar_teste=count($_FILES['upload-teste']['name']);
for($i=0; $i<$ajobs_numar_teste; $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['upload-teste']['tmp_name'][$i];

  //Make sure we have a filepath
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = $cale."/tests/". $_FILES['upload-teste']['name'][$i];

    //Upload the file into the temp dir
    move_uploaded_file($tmpFilePath, $newFilePath);

    }
  }
  
//uploadez sursele
$ajobs_numar_surse=count($_FILES['upload-surse']['name']);
for($i=0; $i<$ajobs_numar_surse; $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['upload-surse']['tmp_name'][$i];

  //Make sure we have a filepath
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = $cale."/sources/". $_FILES['upload-surse']['name'][$i];

    //Upload the file into the temp dir
    move_uploaded_file($tmpFilePath, $newFilePath);
    }
  }
 
//uploadez fisierul de evaluare , daca exista

$tmpFilePath = $_FILES['upload-evaluator']['tmp_name'];
if ($tmpFilePath != ""){
  //Upload the file into the temp dir
  move_uploaded_file($tmpFilePath, ROOT."evaluator/ajobs/".$id."/is_test_ok.php");
}

//uploadez fisierul de rezultat partal , daca exista

$tmpFilePath = $_FILES['upload-partial']['tmp_name'];
if ($tmpFilePath != ""){
  //Upload the file into the temp dir
  move_uploaded_file($tmpFilePath, ROOT."evaluator/ajobs/".$id."/rezultat-partial.php");
}
	
//parcurg fiecare sursa pentru evaluare
 $dir = scandir($cale."/sources"); $i=0;
  foreach($dir as $k)
	  if($k[0]!=".")
	  {
			$path=$cale."/sources/".$k;
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$file_name=$k;
			$file_eval_name=explode(".",$file_name); $file_eval_name=$file_eval_name[0];
			
			//daca respecta formatul bun
			if ($ext=="cpp" || $ext=="c")
			  {
			  if ($_FILES["file"]["error"] > 0)
				{
				echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
				}
			  else
				{
					// cale fisiere
					$cale= ROOT."evaluator/ajobs/".$id."/sources/";
					$eval= ROOT."evaluator/ajobs/".$id."/eval/";
					$error= ROOT."evaluator/ajobs/".$id."/errors/".$file_eval_name.".error"; 

					//compilez sursa
					$compiler=NULL;
					if($ext=="cpp")
						$compiler=exec("g++ '$cale''$file_name' -o '$cale''$file_eval_name'  2> '$error'");
					if($ext=="c")
						$compiler=exec("gcc '$cale''$file_name' -o '$cale''$file_eval_name'  2> '$error'");
					
					//copiez sursa in folderul de evaluare
					copy($cale.$file_eval_name,$eval.$file_eval_name);
					chmod($eval.$file_eval_name, 0777);
					
					//rezultatele
					$ajob_name=$k;
					$ajob_total_points=0;
					$ajob_tests_points=NULL;
					$ajob_tests_time=NULL;
					$ajob_tests_memory=NULL;
					$ajob_tests_message=NULL;
					$ajob_tests_groups=NULL;
					
					//aleg extensia
					if($ext=="cpp")
						$job_language="C++";
					else
						$job_language="C";
					
					//iau testele si le numar
					$nr=$ajobs_numar_teste/2;
					
					
					$syscalls=ROOT."evaluator/bad_syscalls";
					
					//incep evaluarea 
					for($i=0; $i<$nr; $i++) // iau testele pe rand
					{
						//evaluarea propriu-zisa 
						$in=ROOT."evaluator/ajobs/".$id."/tests/".$i.".in"; 
						$out=ROOT."evaluator/ajobs/".$id."/eval/".$nume_fisier.".out"; 
						
						$stime=0;
						$smemory=0;
						$c1=0;
						
						//copiez testul de intrare
						copy($in,$eval.$nume_fisier.".in");
						chmod($eval.$nume_fisier.".in",0777);
						
						//evaluez fiecare test de 4 ori
						for($j=1; $j<=4; $j++)
						{
							echo $eval.$file_eval_name."  ";
							$evaluator=shell_exec("'$jrun_link' --dir '$eval' --prog '$eval''$file_eval_name' --memory-limit '$memorie' --time-limit '$timp' --block-syscalls-file='$syscalls'");
							
							echo $evaluator;
							?> <br> <?php
							
							if($evaluator[0]=='O' && $evaluator[1]=='K')
								$ok=true;
							else
								$ok=false;
							
							$bucati_evaluator=explode(" ", $evaluator);
							$status=NULL;
							for($i2=5; $i2<=10; $i2++)
							  {
								if(!isset($bucati_evaluator[$i2]))
									break;
								if(strlen($bucati_evaluator[$i2])==0)
								   break;
								$status=$status.$bucati_evaluator[$i2];
								$status=$status." ";
							}
							if($ok==true)// daca intra in timp si memorie
							{
								if(file_exists(ROOT."evaluator/ajobs/".$id."/tests/".$i.".out"))
								{
									$str1=file_get_contents(ROOT."evaluator/ajobs/".$id."/tests/".$i.".out");
						
								}
								else
								{
									$str1=file_get_contents(ROOT."evaluator/ajobs/".$id."/tests/".$i.".ok");
								}
								$str1_aux=$str1;
								
								//Fisierul de iesire
								if(!file_exists($out))
								{
									$status="Fisierul de iesire inexistent";
									$ajob_tests_points=$ajob_tests_points."0#";
								}
								else
								{
									
									// Folosesc o functie de evaluare
									$str2=file_get_contents($out);
									$str2_aux=$str2;
									copy($out,ROOT."evaluator/ajobs/".$id."/outputs/".$file_eval_name."-".$i.".out");
									if(file_exists(ROOT."evaluator/ajobs/".$id."/is_test_ok.php"))
									{
										if($first==true)
										{
											$first=false;
											require(ROOT."evaluator/ajobs/".$id."/is_test_ok.php");
										}
										$ok=is_test_ok(file_get_contents($in), $str1, $str2);
										if($ok)
										{
											$status="OK";
											$c1++;
										}
										else
										{
											$status="Incorect";
										}
									}
									else
									{
										$str1 = preg_replace('/\s+/', '', $str1);
										$str2 = preg_replace('/\s+/', '', $str2);			
										
										if(strcmp($str1,$str2)==0) // daca rezutatul e bun
										{
											$status="OK";
											$c1++;
										}
										else
										{
											$status="Incorect";
										}
									}
								}
								
							}
								
							$time=str_replace("ms","",$bucati_evaluator[2]); $time=(int)$time; 
							$memory=str_replace("kb:","",$bucati_evaluator[4]); $memory=(int)$memory; 
							if($memory>=1024)
								$memory-=1024;
								
							$stime+=$time;
							$smemory+=$memory;

						}
						//fac media testelor
						$stime/=4;
						$smemory/=4;
						if($c1>2)
							{
								$pc=100/$nr;
								$ajob_tests_points=$ajob_tests_points.$pc."#";
								$ajob_total_points+=$pc;
							}
						else
							{
								if(file_exists(ROOT."evaluator/ajobs/".$id."/rezultat-partial.php") && $partial_first==true)
								{
									require(ROOT."evaluator/ajobs/".$id."/rezultat-partial.php");
									$partial_first=false;
								}
								
								if($partial_first==false && $status=="Incorect") // daca doar fisierul de output nu se potriveste
								{
									$pc_partial=rezultat_partial(file_get_contents($in), $str1_aux, $str2_aux);
									if($pc_partial!=0)
									{
										$ajob_tests_points=$ajob_tests_points.$pc_partial."#";
										$ajob_total_points+=$pc_partial;
										$status="Rezultat partial";
									}
									else
										$ajob_tests_points=$ajob_tests_points."0#";
								}
								else
									$ajob_tests_points=$ajob_tests_points."0#";
							}
						

						
						$ajob_tests_time=$ajob_tests_time.$time."#";
						$ajob_tests_memory=$ajob_tests_memory.$memory."#";
						$ajob_tests_message=$ajob_tests_message.$status."#";
						//acord punctajul , trec la urmatorul test
						?>
						<br>
						<?php
					}
					
					//pun datele in baza de date
					mysql_query("INSERT INTO `ajobs` (`ajob_id`, `ajob_descriere`, `ajob_name`, `ajob_owner`, `ajob_total_points`, `ajob_tests_points`, `ajob_tests_time`, `ajob_tests_memory`, `ajob_tests_message`, `ajob_date`, `ajob_language` ,`ajob_numar_teste`) VALUES ('$id', '$ajob_descriere','$file_eval_name', '$user_name', '$ajob_total_points', '$ajob_tests_points', '$ajob_tests_time', '$ajob_tests_memory', '$ajob_tests_message', CURRENT_TIMESTAMP, '$job_language', '$nr')");
				}
			}
			?>
			<hr>
			<?php
	  }
	  
header('Location: /admin-eval.php?type=view&id='.$id); 

?>