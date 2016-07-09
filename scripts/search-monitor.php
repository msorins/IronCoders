<?php
require "config.php";
require "secure.php";

$type=NULL; $type=secure($_GET["type"]);
$search_name=NULL; $search_name=secure($_POST["search_name"]);
header( 'Location: /monitor.php?type=search-'.$type.'&name='.$search_name);
?>