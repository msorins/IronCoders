<?php
function rezultat_partial($in, $ok, $output)
	{
		$ok = preg_replace('/\s+/', ' ', $ok);
		$output = preg_replace('/\s+/', ' ', $output);
	
		$sok=explode(" ",$ok);
		$soutput=explode(" ",$output);
	
		
		//daca nr de copii buni && nr de copii rai este corect acord 40% din punctaj
		if($sok[0]==$soutput[0] && $sok[1]==$soutput[1])
			return 4;
		

		return 0;
	}
?>