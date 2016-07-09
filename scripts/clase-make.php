<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";
$user_name2=$user_name;

$clase_titlu=NULL; $clase_titlu=secure($_POST["clase_titlu"]);
$clase_descriere=NULL; $clase_descriere=secure($_POST["clase_descriere"]);
$clase_probleme=NULL; $clase_probleme=secure($_POST["clase_probleme"]);
$clase_data_limita=NULL; $clase_data_limita=secure($_POST["clase_data_limita"]);
$clase_public=NULL; $clase_public=secure($_POST["clase_public"]);
$clase_anunturi=NULL; $clase_anunturi=secure($_POST["clase_anunturi"]);

$type=NULL;
if(isset($_GET["type"]))
	$type=secure($_GET["type"]);
if($type!="edit")
	mysql_query("INSERT INTO `clase` (`clase_id`, `clase_titlu`, `clase_facut_de`, `clase_descriere`, `clase_utilizatori`, `clase_probleme`, `clase_data_limita`, `clase_public`) VALUES (NULL, '$clase_titlu', '$user_name2','$clase_descriere', '', '$clase_probleme', '$clase_data_limita', '$clase_public')");
else
	{
		$clase_org_titlu=NULL; $clase_org_titlu=secure($_GET["clase_org_titlu"]);
		mysql_query("UPDATE `clase` SET `clase_titlu` = '$clase_titlu', `clase_descriere` = '$clase_descriere', `clase_probleme` = '$clase_probleme', `clase_data_limita` = '$clase_data_limita', `clase_anunturi` = '$clase_anunturi', `clase_public` = '$clase_public' WHERE `clase`.`clase_titlu` = '$clase_org_titlu'");
	}
$clase_titlu=str_replace(" ", "+",$clase_titlu);
header('Location: /clase.php?type=edit&name='.$clase_titlu);
?>

