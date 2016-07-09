<?php

function verificare($string, $output)
{
	if(strpos($string,"char str[" ) && strpos($string,"100" ))
		  return "1";
	 else
		 return "0#Gresit";
}

?>