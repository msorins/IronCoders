<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$name=$_POST["name"]; $name=secure($name);
$id=$_POST["id"]; $id=secure($id);

if($id<=3)
{
	if($id==1)//Arhiva
		$query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_nume` LIKE '$name'");
	if($id==2)//Competitii
		$query=mysql_query("SELECT * FROM `competitii` WHERE `competitii_nume` LIKE '$name'");
	if($id==3)//Cursuri	
		$query=mysql_query("SELECT * FROM `cursuri` WHERE `cursuri_nume` LIKE '$name'");	
	if(mysql_num_rows($query)>0 || $name=="")
		echo "0";
	else
		echo "1";
}
else
{ // Competitii validare probleme
	$prob=explode(",",$name); $ok=true;
	for($i=0; $i<count($prob); $i++)
	{
		$name=$prob[$i];
		$query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_nume` LIKE '$name'");
		if(mysql_num_rows($query)==0)
		{
			echo "0";
			$ok=false;
			break;
		}
	}
	if($ok==true)
		echo "1";
	
}
	
?>