<?php
function rezultat_partial($in, $ok, $output)
	{
		$ok = preg_replace('/\s+/', ' ', $ok);
		$output = preg_replace('/\s+/', ' ', $output);
		
		$soutput=explode(" ",$output);
		$sok=explode(" ",$ok);
		 if($soutput[0] == $sok[0])
			 return 4;
		 
		 echo $output[0]." - ".$ok;
		 return 0;
	}
?>