<?php ob_start(); ?>
<?php
require "config.php";
require ROOT."scripts/user_name.php";
error_reporting(-1);
require "secure.php";

$file=$_POST["file"];
$file=ltrim($file); 
$file=rtrim($file); 

$content=$_POST["content"];
$content=ltrim($content); 
$content=rtrim($content); 


$cale=ROOT.$file;
file_put_contents($cale,$content);
echo $cale;
?>