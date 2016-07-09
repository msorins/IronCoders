<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$name=NULL; $name=secure($_GET["name"]);
if($user_name!=NULL)
{
	$mesaj=$_POST["mesaj"]; $mesaj=secure($mesaj);
	$chat=file_get_contents (ROOT."chat/".$name.".txt") ;
	if($mesaj!=NULL)
		$chat=$chat."<div class=\"mesaj\"><a href=\"/profil.php?user=".$user_name."\"><span class=\"blue\">".$user_name."</a> : </span>". $mesaj."\n";
	file_put_contents (ROOT."chat/".$name.".txt", $chat);
	echo $chat;
}
else
	echo 0;
?>

