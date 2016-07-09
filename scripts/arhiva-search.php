<?php
require "config.php";
require "secure.php";
$search_name=NULL; $search_name=secure($_POST["search_name"]);
$search_name=str_replace(" ", "+",$search_name);
header( 'Location: /arhiva.php?type=search&name='.$search_name);
?>