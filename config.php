<?
	define("ROOT", "/var/zpanel/hostdata/zadmin/public_html/ironcoders_com/");
	$host = "localhost"; 
	$users = "sorynsoo"; 
	$pass = "inventor15"; 
	$db = "zadmin_main";
	// open connection 
	$connection = mysql_connect($host, $users, $pass) or die ("Unable to connect!". mysql_error());
	// select database 
	mysql_select_db($db) or die ("Unable to select database!". mysql_error());
?>
