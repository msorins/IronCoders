<?php

function verificare($string, $output)
{
	if(strpos($string,"x!=0") || strpos($string,"x!= 0") || strpos($string,"x != 0"))
		  return "1";
	 else
		 return "0#Gresit.";
}

?>