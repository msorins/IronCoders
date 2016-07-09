<?php
require_once('scripts/config.php');
require ROOT."scripts/user_name.php";
$user_name2=$user_name;
$user_id2=$user_id;	
require "scripts/secure.php";
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IronCoder - Ai carte, ai piramida</title>
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
		font-size:23px;
		font-family: 'Open Sans', sans-serif; 
		color: #2679b5;
	}
	</style>
	<?php include 'views/header.php'; ?>
	<img style="margin-top:-20px; width:100%;" src="../img/site/programming.png" class="img-responsive" alt="Responsive image">
	<div class="main-body" style="width:90%; margin-left:auto; margin-right:auto; min-height:600px;">
	<div style="height:10px;"></div>
	<span class="text-center" style="width:100%; margin-top:15px;">
	<!-- Reclame -->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Responsive Ad -->
	<ins class="adsbygoogle"
		 style="display:block"
		 data-ad-client="ca-pub-1717789082819636"
		 data-ad-slot="7752289100"
		 data-ad-format="auto"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	</span>
	<br>
	<hr>
	<h2 class="text-center"> Ai carte, ai piramida</h3> <hr>
	<br>
	<img style="max-height:350px; margin-left:auto; margin-right:auto" src="/img/site/piramida.jpg" class="img-responsive" alt="Responsive image">
	<br>
	<p style="font-size:25px; margin-top:10px;" class="blue text-center"> 
	"Piramida Cărților" este un proiect comunitar care constă în construirea unei piramide din cărți cu scopul de apropia oamenii de cărți, de a readuce cultura în viață și obiceiurile lor zilnice și de a-i ajuta pe cei mai puțin norocoși care duc lipsă de cărți în bibliotecile lor, cum ar fi orfanii și bătrânii. Proiectul este inițiat și coordonat de două eleve de liceu, Bănică Alexandra Mirela și Gișa Andreea, și își propune să doneze o parte din cărți azilelor și orfelinatelor (în funcție de nevoile lor), iar din cărțile rămase, cele nefolositoare vor ajunge la centrul de reciclare SC GSS Expert Recycling SRL, iar restul vor fi donate sub forma unor Rafturi de Cărti cafenelelor și localurilor publice sau vor fi expuse în parcuri.
	<br><br>
	</p>
	<br>
	<hr>
	<br>
	<?php
	if(isset($_GET["type"]))
		$type=secure($_GET["type"]);
	else
		$type=NULL;
	
	if($type==NULL)
	{
	?>
		<h3 style="text-align:center"> Formular de înscriere </h3>
		<br>
		<hr>
		<div style="background-color: white; border: 1px solid #ccc; margin:20px; padding:20px;">
			<form action="/scripts/piramida-invitatie.php" method="post" enctype="multipart/form-data" role="form">
			<div class="col-md-6">
			  <div class="form-group">
					<label >Nume tău</label>
					<input name="piramida_nume" type="text" class="form-control" placeholder="Numele tău">
			  </div>
			  <br>
			  <div class="form-group">
					<label >Numărul de cărți</label>
					<input name="piramida_nr_carti" type="number" class="form-control" placeholder="Numarul de carti">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label >Mail-ul tău</label>
					<input  name="piramida_mail" type="text" class="form-control">
			  </div>
			  <br>
				<div class="form-group">
					<label >Tip acțiune</label>
					<select name="piramida_tip_actiune" class="form-control">
					  <option value="Donare">Donare</option>
					  <option value="Reciclare">Reciclare</option>
					</select>
				</div>
			</div>
			
			<div style="margin-top:15px;" class="col-md-12">
				<label >Descriere cărți ( starea lor, dimensiunea aproximativa ... etc ) </label>
				<textarea name="piramida_stare_carti" class="form-control" rows="3"></textarea>
				<br>
			</div>
			<div class="col-md-6">
			<label >Vrei să fii voluntar in proiect?</label>
					<select name="piramida_oferta_voluntar" class="form-control">
					  <option value="Da">Da</option>
					  <option value="Nu">Nu</option>
					</select>
					<br>
			</div>
			
			<div class="col-md-6">
			<label > Alte proiecte in care ai vrea sa te implici </label>
				<input  name="piramida_alte_proiecte" type="text" class="form-control">
				<br>
			</div>
			<hr>
			<p style="text-align:center; margin-top:15px;"><button id="form-submit" type="submit" class="btn btn-default">Trimite</button></p>
			</form>
		</div>
	<?php
	}
	if($type=="success")
	{
	?><p style="font-size:22px; margin-top:10px; color:#3C8524;" class="blue text-center"> Salut! Mulțumim pentru implicare. <br> <br> Pe mail ai primit detaliile legate de următoarea întâlnire a echipei <u>Piramida Cărților</u> unde sperăm să poți veni și tu pentru a ne cunoaște.</p><br><?php
	}
	if($type=="adm_ab0wf56s")
	{
	?>
	<div class="table-responsive">
	<table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Nr</th>
          <th>Nume</th>
          <th>Mail</th>
          <th>Număr cărți</th>
          <th>Tip actiune</th>
          <th>Descriere cărți</th>
          <th>Voluntar</th>
          <th>Implicare in alte proiecte</th>
        </tr>
      </thead>
      <tbody>
	  <?php
	  $query=mysql_query("SELECT * FROM `piramida`");
	  while($k=mysql_fetch_array($query))
	  {
		  ?><tr><?php
		  ?><td><?php echo $k["piramida_id"];?></td><?php
		  ?><td><?php echo $k["piramida_nume"];?></td><?php
		  ?><td><?php echo $k["piramida_mail"];?></td><?php
		  ?><td><?php echo $k["piramida_nr_carti"];?></td><?php
		  ?><td><?php echo $k["piramida_tip_actiune"];?></td><?php
		  ?><td><?php echo $k["piramida_stare_carti"];?></td><?php
		  ?><td><?php 
		  if($k["piramida_oferta_voluntar"]==NULL)
			  echo "Nu";
		  else
			echo $k["piramida_oferta_voluntar"];?>
		  </td><?php
		  ?><td><?php echo $k["piramida_alte_proiecte"];?></td><?php
		  ?></tr><?php
	  }
	  ?>
      </tbody>
    </table>
	</div>
	<?php
		
	}
	?>

	</div>
    <?php include 'views/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>