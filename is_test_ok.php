<?php
function prim($nr)
{
	for($h=2; $h<=$nr/2; $h++)
		if($nr % $h==0)
			return 0; // nu este prim
		
	return 1; //este prim
}
function fib($nr)
{
	for($b=1,$c=1,$a=2; $a<=$nr; $a=$b+$c)
    {
        if($a==$nr)
			return 1;
        $c=$b;
        $b=$a;
    }
	
	return 0;
}
function is_test_ok($in, $ok, $output)
	{
		$n=0; $c_n=0; $first=true;
		$c1=0; $c2=0; $c3=0;
		$nr_bune=array();
		for($i=0; $i<=100000; $i++)
			$nr_bune[$i]=0;
		
		for($i=0; $i<strlen($in); $i++)
		  if($first==true)
		  {
			  $first=false; $ok=true;
			  if($ok==true && is_numeric($in[$i]))
			  while($i<strlen($in) && is_numeric($in[$i]))
				{
					$n=$n*10+$in[$i];
					$i++;
					$ok=false;
				}

		  }
		  else
		  {
				if(is_numeric($in[$i]))
				{
					$nr=0;
					while($i<strlen($in) && is_numeric($in[$i]))
					{
						$nr=$nr*10+$in[$i];
						$i++;
					}
					if(prim($nr) && fib($nr))
					{
					  $c3++;
					  $nr_bune[$nr]=3;
					}
					else
					{
						 if(prim($nr))
						 {
							 $c1++;
							 $nr_bune[$nr]=1;
						 }
						 if(fib($nr))
						 {
							 $c2++;
							 $nr_bune[$nr]=2;
						 }
					}
				}
		  }
		  
		  //pacurg fisierul de iesire al utilizatorului
		  $nr_cifre_output=0; $first=true; 
		  for($i=0; $i<strlen($output); $i++)
		  {
			  if(is_numeric($output[$i]))
			  {
				  $nr_cifre_output++;  $nr=0;
				  while($i<strlen($output) && is_numeric($output[$i]))
				  {
					 $nr=$nr*10+$output[$i];
					 $i++;
				  }

				  if($nr_bune[$nr]!=1 && $nr_bune[$nr]!=2 && $nr_bune[$nr]!=3)
					  return 0; // contine un numar X
				  
				  if($first==true)
					  $ant=$nr_bune[$nr];
				  else
				  {
					  if($ant==$nr_bune[$nr] && $ant!=3)
						return 0; // caz A A sau B B
					  
					  $ant=$nr_bune[$nr];
				  }
			  }
		  }
		  if($nr_cifre_output!= $c1+$c2+$c3)
			  return 0;
		 
		  return 1;
	}
require "scripts/config.php";
$file=file_get_contents(ROOT."a.in");
$file2=file_get_contents(ROOT."a.out");
echo is_test_ok($file, "", $file2);
?>