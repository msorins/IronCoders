<?php
require "config.php";
require "secure.php";
$name=NULL; $name=secure($_POST["name"]);
$name=str_replace(" ", "+",$name);
header( 'Location: /arhiva.php?type=search_category&name='.$name);
?>