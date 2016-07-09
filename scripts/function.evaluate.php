<?php
function evaluate($path, $source, $compiled_name, $language, $in, $out, $error, $memory_limit, $time_limit)
	{
		global $time,$memory,$status,$error;
		
		//compilez sursa
		if($language=="cpp")
			$compiler=exec("g++ '$path''$source' -o '$path''$compiled_name'  2> '$path''$error'");
		if($language=="c")
			$compiler=exec("gcc '$path''$source' -o '$path''$compiled_name'  2> '$path''$error'");
	    if($language=="pas")
			$compiler=exec("fpc '$path''$source'  2> '$path''$error'");
			
			
		//evaluez sursa 
		$syscalls=ROOT."evaluator/bad_syscalls";
		$jrun_link=ROOT."evaluator/jrun";
		$evaluator=shell_exec("'$jrun_link'  --redirect-stdin '$path'/'$in' --redirect-stdout '$path'/'$out' --prog '$path'/'$compiled_name' --memory-limit '$memory_limit' --time-limit '$time_limit' --block-syscalls-file='$syscalls'");
			  
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
	
		$errors = "Execution is stopped for now :)";
		$status = "Execution is stopped for now :)";
	}
?>