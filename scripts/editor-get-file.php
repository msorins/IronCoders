<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$file=$_POST["file"];
$file=ltrim($file); 
$file=rtrim($file); 

$fis=ROOT.$file;
$text=file_get_contents($fis); 
$text=ltrim($text); 
echo $text;

?>