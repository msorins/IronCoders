<?php
require "scripts/config.php";
	require ROOT."scripts/user_name.php";
$user_name2=$user_name;
$user_id2=$user_id;
if(isset($_GET["p"]))
	$p=secure($_GET["p"]);
else
	$p=1;
		
require "scripts/secure.php";
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IronCoder - Resurse</title>
		<meta name="description" content="Orice materiale care vă sunt necesare programării pe care doriți să o faceți se găsesc aici.">
		<meta name="keywords" content="Informatica,Programare,C++, Probleme Informatica, Cursuri Informatica, Concursuri de programare, Probleme rezolvate, Comunitate IT">
		<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
		
		<!--Bootstrap-->
		<link href="/css/bootstrap.css" rel="stylesheet">
		
		<!--Design -->
		<link href="/css/stylesheet.css" rel="stylesheet">
		<link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/prettyPhoto.css" rel="stylesheet">
		<link href="/css/animate.css" rel="stylesheet">
		<link href="/css/main.css" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
		
		<!--Scripts -->
		<script src="/js/editor/ckeditor.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		
	</head>
	<body>
	<style>
	.blue
	{
		font-size:20px;
		font-family: 'Open Sans', sans-serif; 
		font-weight: lighter; 
		color: #2679b5;
	}
	</style>
	<?php include 'views/header.php'; ?>
	<img style="margin-top:-20px; width:100%;" src="../img/site/programming.png" class="img-responsive" alt="Responsive image">
	<div class="main-body" style="width:90%; margin-left:auto; margin-right:auto; min-height:600px;">
	<h3> Utilitare </h3> <hr>
	<dl class="dl-horizontal">
	  <dt style="margin-top:-5px;" class="blue" >Codeblocks : </dt>
	  <dd>IDE pentru Windows / Linux .  <a href="http://www.codeblocks.org/downloads/26"> Click </a></dd><br>
	  
	  <dt class="blue">MinGW : </dt>
	  <dd style="margin-top:5px;" >IDE pentru Windows / Linux. <a href="http://sourceforge.net/projects/mingw/files/"> Click</a> </dd>
	</dl>
	<br>
	<h3> Site-uri folositoare </h3><hr>
	
	<dl class="dl-horizontal">
	  <dt style="margin-top:-5px;" class="blue" >Infoarena: </dt>
	  <dd>Comunitate romaneasca pentru cei pasionați de informatică și programare .  <a href="http://www.infoarena.ro"> Click </a></dd><br>
	  
	  <dt class="blue">Campion: </dt>
	  <dd style="margin-top:5px;" >Arhivă de probleme. <a href="http://campion.edu.ro/arhiva"> Click</a> </dd>
	  
	  <br>
	  <dt class="blue">Info.Mcip: </dt>
	  <dd style="margin-top:5px;" >Arhivă de probleme rezolvate. <a href="http://info.mcip.ro/"> Click</a> </dd>
	  
	  <br>
	  <dt class="blue">TopCoder: </dt>
	  <dd style="margin-top:5px;" >Concursuri de algoritmică<a href="http://topcoder.com/"> Click</a> </dd>
	  
	  <br>
	  <dt class="blue">Coderbyte: </dt>
	  <dd style="margin-top:5px;" >Exerciții de algoritmică<a href="http://coderbyte.com/"> Click</a> </dd>
	  
	  <br>
	  <dt class="blue">CodeAcademy: </dt>
	  <dd style="margin-top:5px;" >Tutoriale interactive pentru Web Development. <a href="http://codeacademy.com/"> Click</a> </dd>
	  
	  <br>
	  <dt class="blue">W3Schools: </dt>
	  <dd style="margin-top:5px;" >Tutoriale pentru Web Development. <a href="http://www.w3schools.com/"> Click</a> </dd>
	</dl>
	
	</div>
    <?php include 'views/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>