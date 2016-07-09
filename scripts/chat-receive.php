<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$name=NULL; $name=secure($_GET["name"]);
if(!file_exists(ROOT."chat/".$name.".txt")) 
{ 
   $fp = fopen(ROOT."chat/".$name.".txt","w");  
   fwrite($fp,"");  
   fclose($fp); 
}  
$chat=file_get_contents (ROOT."chat/".$name.".txt") ;
echo $chat;
?>

