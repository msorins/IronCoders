<?php
function evaluate($source, $compiled, $language, $in, $out, $errorP, $memory_limit, $time_limit, $doCompile)
	{
		global $time,$memory,$status,$error;

		$source_name = explode('/', $source); $source_name = $source_name[ count($source_name) -1 ];
		$compiled_name = explode('/', $compiled); $compiled_name = $compiled_name[ count($compiled_name) -1 ];
		$in_name = explode('/', $in); $in_name = $in_name[ count($in_name) -1 ];
		$out_name = explode('/', $out); $out_name = $out_name[ count($out_name) -1 ];
		$error_name = explode('/', $errorP); $error_name = $error_name[ count($error_name) -1 ];

		//Copiez fisierul .in de pe Host in Docker
		$exec = "sudo docker cp ".$in." eval:/eval-folder/".$in_name;
		exec($exec);

		//Copiez fisierul .in de pe Host in Docker
		$exec = "sudo docker cp ".$source." eval:/eval-folder/".$source_name;
		exec($exec);


		//compilez sursa
		if($doCompile == True ) {

		if($language=="cpp")
			$compiler=exec("sudo docker exec eval g++  /eval-folder/'$source_name' -o /eval-folder/'$compiled_name'  2> '$errorP'");
		if($language=="c")
			$compiler=exec("sudo docker exec eval gcc /eval-folder/'$source_name' -o /eval-folder/'$compiled_name'  2> '$errorP'");
	    if($language=="pas")
			$compiler=exec("sudo docker exec eval fpc /eval-folder/'$source_name'  2> '$errorP'");

		}


		//evaluez sursa
		$evaluator=shell_exec("sudo docker exec eval /eval-folder/jrun  --redirect-stdin /eval-folder/'$in_name' --redirect-stdout /eval-folder/'$out_name' --prog /eval-folder/'$compiled_name' --memory-limit '$memory_limit' --time-limit '$time_limit' --no-ptrace ");


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
		$memory=str_replace("kb:","",$bucati_evaluator[4]); $memory=(int)$memory; //$memory-=1024;

		if($memory<0)
			$memory=0;

			if($compiler!=NULL && $language!="pas")
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

		//$errors = "Execution is stopped for now :)";

		//Copy the output file from Docker to host
		exec("sudo docker cp eval:/eval-folder/".$out_name." ".$out);

		//Copy the compiled file from Docker to host
		exec("sudo docker cp eval:/eval-folder/".$compiled_name." ".$compiled);
	}
?>
