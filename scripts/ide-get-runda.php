<?php ob_start(); ?>
<?php
require "config.php";
require "secure.php";
require ROOT."scripts/user_name.php";

$arhiva_nume=NULL; $arhiva_nume=secure($_POST["arhiva_nume"]);

$query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_nume` LIKE '$arhiva_nume'");
$k=mysql_fetch_array($query);

if($k["arhiva_concurs"]=="arhiva-educationala")
	echo "Arhiva educatională#";
else
	echo "Arhiva#";

$query2=mysql_query("SELECT * FROM `competitii` WHERE `competitii_status` LIKE '$str'");
while($k2=mysql_fetch_array($query2))
{
	$str=explode(",",$k2["competitii_probleme"]);
	for($i=0; $i<count($str); $i++)
	{
		if($str[$i]==$k["arhiva_nume"])
		{
			echo "Competitie : ".$k2["competitii_nume"]."#";
		    break;
		}
	}
}
			  
$query2=mysql_query("SELECT * FROM `clase`");
while($k2=mysql_fetch_array($query2))
{
	$ok2=false;
	$str=explode(",",$k2["clase_probleme"]);
	for($i=0; $i<count($str); $i++)
	{
		if( $str[$i]==$k["arhiva_nume"] && ($k2["arhiva_public"]==1 || strpos($k2["clase_utilizatori"],$user_name)))
		{
			 echo "Clasa : ".$k2["clase_titlu"]."#";
			 break;
		}
	}
}

?>