<?php
	define("ROOT", "/home/ironcoders/public_html/");
	$host = "localhost"; 
	$users = "root"; 
	$pass = "inventor15"; 
	$db = "ironcoders";
	$jrun_link= ROOT."evaluator/jrun";
	// open connection 
	$connection = mysql_connect($host, $users, $pass) or die ("Unable to connect!". mysql_error());
	// select database 
	mysql_select_db($db) or die ("Unable to select database!". mysql_error());
?>
