<!DOCTYPE html>
<?php 
	require_once('scripts/config.php');
	require ROOT."scripts/user_name.php";
	$user_name2=$user_name;
	$user_cursuri_terminate2=$user_cursuri_terminate;
	require "scripts/secure.php";
	if(isset($_GET["type"]))
		$type=secure($_GET["type"]);
	else
		$type=NULL;
	class cursuri
	{
		public $user_name;
		public $user_cursuri_terminate;
		private $user_rang=0;
		public function listeaza_cursuri()
		{
			$query=mysql_query("SELECT * FROM `cursuri` WHERE `cursuri_afiseaza`='1' "); $i=0;
			while($k=mysql_fetch_array($query))
			{
				$curs_nume=str_replace("pp","++",$k["cursuri_nume"]);
				if($i==0)
					echo "<div class=\"row\">";
				$i++;
				?>
				  <div class="col-sm-6 col-md-4">
					<div id="curs" class="thumbnail">
					  <img src="../img/cursuri/<?php echo $k["cursuri_background"];?>" alt="...">
					  <div class="caption">
						<h3><?php echo $curs_nume; ?></h3>
						<p><?php echo $k["cursuri_descriere"]; ?></p>
						<p><a href="/cursuri/<?php echo str_replace(" ","+",$k["cursuri_nume"]); ?>" class="btn btn-default" role="button">Click</a></p>
					  </div>
					</div>
				  </div>
			 <?php
				if($i==3)
				{
					echo "</div>";
					$i=0;
				}
			}
			if($i<3)
				echo "</div>";
		}
		
		public function vedere_curs()
		{
			$curs_nume=NULL; 
			if(isset($_GET["name"]))
				$curs_nume=secure($_GET["name"]);
				
			$query=mysql_query("SELECT * FROM `cursuri` WHERE `cursuri_nume` LIKE '$curs_nume'");
			$k=mysql_fetch_array($query);
			$curs_nume_aux=$curs_nume;
			$curs_nume=str_replace("pp","++",$curs_nume);
			echo "<h3>".$curs_nume."</h3>";
			if($this->user_name==$k["cursuri_facut_de"] || $this->user_rang>=3) 
			{
			?><a href="/cursuri.php?type=edit&name=<?php echo $curs_nume_aux; ?>"><button style="float:right; margin-top:-40px;" type="button" class="btn btn-primary"> Editează </button></a> 
			<?php } ?>
			<p class="help-block"><?php echo $k["cursuri_descriere"]; ?></p>

			<!-- <a href="cursuri.php?type=terminal&name=<?php echo $k["cursuri_nume"];?>&nr_lectie=1"><button style="width:200px;" type="button" class="btn btn-success"> Incepe </button></a> -->

			<hr><?php
			
			$cursuri_grupe_titlu=$k["cursuri_grupe_titlu"];	$cursuri_grupe_titlu=explode("#",$cursuri_grupe_titlu);
			$cursuri_grupe_descriere=$k["cursuri_grupe_descriere"];	$cursuri_grupe_descriere=explode("#",$cursuri_grupe_descriere);
			$cursuri_lectii=$k["cursuri_lectii_titlu"]; $cursuri_lectii=explode("#",$cursuri_lectii);
			$cursuri_lectii_grupe=$k["cursuri_lectii_grupe"]; $cursuri_lectii_grupe=explode("#",$cursuri_lectii_grupe);
			for($i=0; $i<count($cursuri_lectii_grupe)-1; $i++)
			{
				?><div class="panel panel-info">
					  <div class="panel-heading">
						<h3 class="panel-title"><?php echo $cursuri_grupe_titlu[$i];?></h3>
					  </div>
					  <div class="panel-body">
					  <p style="margin-top:-7px;" class="help-block"> <?php echo $cursuri_grupe_descriere[$i]; ?> </p>
					  </div>
					  <p>Lecţii:</p>
					  <ul class="list-group">
					  <?php
					   $grupe=$cursuri_lectii_grupe[$i]; $inceput=0; $sfarsit=0; $ok=true;
					   //echo $grupe;
					   for($j=0; $j<strlen($grupe); $j++)
					   {
							while(is_numeric($grupe[$j]) && $ok==true)
							{
								$inceput=$inceput*10+(int)$grupe[$j];
								$j++;
							}
							if($grupe[$j]=='-')
								$ok=false;
							while(is_numeric($grupe[$j]) && $ok==false)
							{
								$sfarsit=$sfarsit*10+(int)$grupe[$j];
								$j++;
							}
					   }
					   for($j=$inceput-1; $j<=$sfarsit-1; $j++)
					   {
						 ?>  <a href="/cursuri.php?type=terminal&name=<?php echo str_replace(" ", "+",$k["cursuri_nume"]);?>&nr_lectie=<?php echo $j+1; ?>"><li class="list-group-item"><?php echo $cursuri_lectii[$j]; ?>
						 <?php 
						 if(strpos($this->user_cursuri_terminate, "#".$k["cursuri_id"]."-".($j+1)."#")!=NULL)
						 {?>
						 <span class="glyphicon glyphicon-ok"></span>
						 <?php
						 }
						 ?>
						 </li></a><?php
					   }
					   
					  ?>
					  </ul>
				 </div>
			   <?php
		   }
		}
		
		public function make_curs()
		{
		 ?>
		 <h3> Creează un curs </h3>
		 <p class="help-block">Dupa submisia formularului veţi fi redirecţionaţi către pagina de editare a lecţiilor </p>
		<hr>
		<div style="background-color: white; border: 1px solid #ccc; margin-top:30px; padding:20px;">
	    <form action="scripts/cursuri-make.php" method="post" enctype="multipart/form-data" role="form">
		<div style="margin-top:25px;" class="row">
		<div class="col-md-6">
		  <label for="text">Nume curs</label>
		  <input id="cursuri_nume" onchange="form_validation()" name="cursuri_nume" type="text" class="form-control">
		  <p id="adaugare_mesaj" style="display:none" class="bg-danger help-block">Numele există deja </p>
		  <div style="height:35px;"></div>
		 
		  <label style="margin-top:10px;" for="text">Curs oficial: </label>
		  <input <?php if($this->user_rang <3 ) echo "disabled"; ?> name="cursuri_oficial" value="1" type="checkbox">
		  <?php 
		  if($this->user_rang  <3 ) { ?>
		  <p class="help-block">Nu ai suficiente permisiuni pentru a creea un curs oficial. <a href="">Click</a> pentru informaţii</p>
		  <?php } ?>
		
		</div>
		<div class="col-md-6">
		  <label for="text">Descriere </label>
		  <textarea name="cursuri_descriere" type="text" class="form-control"></textarea><br>
		  
		  <label for="exampleInputFile">Imagine fundal</label>
		 <input name="file" type="file" type="file" id="exampleInputFile">
		</div>
		</div>
		<button id="form-submit" style="margin-top:5px;" type="submit" class="btn btn-default">Trimite</button>
		</form>
		</div>
		 <script>
	  function form_validation()
	  {
		var x=  document.getElementById("cursuri_nume").value;
		var xmlhttp;
		if(window.XMLHttpRequest)
		    xmlhttp=new XMLHttpRequest();
		else
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

		xmlhttp.onreadystatechange=function()
		  {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			  var rasp=xmlhttp.responseText;
			  if(rasp==1)
			  {
				document.getElementById("form-submit").disabled = false; 
				document.getElementById("adaugare_mesaj").style.display="none";
			  }
			  else
			  {
				document.getElementById("form-submit").disabled = true;
				document.getElementById("adaugare_mesaj").style.display="block";				
			  }
			}
	      }	
		var body = "id=3&name=" + x;
		xmlhttp.open("POST", "scripts/form-validation.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-Length", body.length);
		xmlhttp.setRequestHeader("Connection", "close");
		xmlhttp.send(body);
	 }
	  </script>
		
		 <?php
		}
		
		public function edit_curs()
		{
		$name=NULL;
		if(isset($_GET["name"]))
			$name=secure($_GET["name"]);
		$query=mysql_query("SELECT * FROM `cursuri` WHERE `cursuri_nume` LIKE '$name'");
		$k=mysql_fetch_array($query);
		?> 
		<h3> Editare curs </h3>
		<button style="float:right; margin-top:-40px;" id="salveaza_lectie" onclick="salveaza_lectie()" type="button" class="btn btn-primary"> Salvează </button>
		<hr>
		<div class="row">
		<div class="col-md-6">
		      <br><p style="margin-top:-18px;" class="help-block">Titlu : <span style="margin-left:5px;" class="glyphicon glyphicon-edit"></span>   <input style="margin-left:5px; color:black;" type="text" name="cursuri_nume" id="cursuri_nume" value="<?php echo $k["cursuri_nume"]; ?>"></p>
		</div>
		 <div class="col-md-6">
		      <p class="help-block">Descriere :<span  style="margin-left:5px;" class="glyphicon glyphicon-edit"></span> <textarea style=" width:350px; height:80px; color:black;" name="cursuri_descriere" id="cursuri_descriere"><?php echo $k["cursuri_descriere"]; ?></textarea></p>
		 </div>
		 </div>
		 
		 <h3>Lectii</h3><div name="lista_exercitii" id="lista-exercitii"  class="lista-exercitii btn-group">
			<button onclick="adauga_exercitiu()" type="button" class="btn btn-default"><span  style="margin-left:5px;" class="glyphicon glyphicon-plus"></span></button>
			<?php 
			$str=$k["cursuri_lectii_titlu"];
			$str=explode("#",$str);
			for($i=1; $i<count($str); $i++)
			{
			?><button type="button" id="<?php echo $i;?>" class="btn btn-default nr-exercitiu"><?php echo $i; ?></button><?php
			}
			?>
		</div>
		<hr>
		<div class="row">
		<div style="border-style: solid; border-width:0px; border-right-width: 1px; border-right-color:#ddd;" class="col-md-6">
			<h4> Lecţia cu nr <span id="lectie_nr">1</span></h4>
			<p class="help-block">Titlu :</p> <input style="color:black;" type="text" name="cursuri_lectii_titlu" id="cursuri_lectii_titlu" value="x">
			<p class="help-block">Explicaţii :</p> <textarea style="color:black; height:200px; width:250px;" name="cursuri_lectii_explicatii" id="cursuri_lectii_explicatii">x</textarea>
			<p class="help-block">Instrucţiuni :</p> <textarea style="color:black; height:200px; width:250px;" name="cursuri_lectii_instructiuni" id="cursuri_lectii_instructiuni">x</textarea>
		</div>
		
		<div class="col-md-6">
		<div class="bs-example bs-example-tabs">
		<ul id="myTab" class="nav nav-tabs" role="tablist">
		  <li class="active"><a  onclick="fa_schimbare_lectie()"href="#home" role="tab" data-toggle="tab">Cod implicit</a></li>
		  <li class=""><a  onclick="fa_schimbare_lectie()" href="#profile" role="tab" data-toggle="tab">Functie corectare lecţie </a></li>
		  <li class=""><a onclick="fa_schimbare_lectie()"  href="#profile2" role="tab" data-toggle="tab">Fişier intrare </a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
		  <div class="tab-pane fade active in" id="home">
			<pre style="height:520px; margin-left:20px; margin-top:60px;" id="editor2"></pre> 
		  </div>
		  <div class="tab-pane fade" id="profile">
			<pre style="height:520px; margin-left:20px; margin-top:60px;" id="editor"></pre> 
		  </div>
		  <div class="tab-pane fade" id="profile2">
			<textarea style="width:100%; height:200px; margin-left:5px; margin-top:20px;" id="fisier_intrare"></textarea> 
		  </div>
		</div>
	  </div>
		<div style="height:520px;"> 
		</div>
		</div>
		</div>
		
		<h3 style="margin-top:40px;" >Grupare lecţii</h3>
		<div name="lista_grupe" id="lista-grupe" class="lista-grupe btn-group">
			<button onclick="adauga_grupa()" type="button" class="btn btn-default"><span  style="margin-left:5px;" class="glyphicon glyphicon-plus"></span></button>
			<?php 
			$str=$k["cursuri_grupe_titlu"];
			$str=explode("#",$str);
			for($i=1; $i<count($str); $i++)
			{
			?><button type="button" id="<?php echo $i;?>" class="btn btn-default nr-grupa"><?php echo $i; ?></button><?php
			}
			?>
		</div>
		<hr>
		<div class="row">
		<div style="border-style: solid; border-width:0px; border-right-width: 1px; border-right-color:#ddd" class="col-md-6">
			<h4> Grupa cu nr <span id="grup_nr">1</span></h4>
			<p style="margin-top:20px;" class="help-block">Titlu grup :</p> <textarea style="color:black; height:100px; width:250px;"name="cursuri_grupe_titlu" id="cursuri_grupe_titlu">x</textarea>
			
			<p class="help-block">Descriere grup :</p> <textarea style="color:black; height:100px; width:250px;"name="cursuri_grupe_descriere" id="cursuri_grupe_descriere">x</textarea>
		
		</div>
		<div class="col-md-6">
			<p class="help-block">Grupare :</p> <textarea style="color:black; height:100px; width:250px;"name="cursuri_lectii_grupe" id="cursuri_lectii_grupe"><?php echo $k["cursuri_lectii_grupe"]; ?></textarea>
		</div>
		</div>
		<br><br>
		<?php
		}
		
		public function terminal()
		{
			?>
			
			<div id="terminal">
			<pre style="min-width:710px; width:73%; margin-top:80px; margin-left:-2px; border-top:0px;" id="editor2">
A aparut o eroare, reincarca pagina.
			</pre>  
			<br>
			  <div class="instructions" style="overflow: scroll; width:27%; float:right; margin-top:-19px; overflow-x:hidden;">
				<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg">
					<div style="height:200px;" class="modal-content">
					  <h3 style="text-align:center;  font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;">Trebuie să fii logat pentru a completa acest curs.</h3> <br>
					
					<p style="text-align:center;">
					<a href="/forum/ucp.php?mode=login"><button type="button" class="btn btn-default btn-lg">Loghează-te</button></a>
					<a href="/forum/ucp.php?mode=register"><button style="margin-left:10px;" type="button" class="btn btn-default btn-lg">Înregistrează-te</button></a>
					</p>
					</div>
				  </div>
				</div>
				<div data-backdrop="static" data-keyboard="false" id="myModal2" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg">
					<div style="height:200px;" class="modal-content">
					  <h3 style="text-align:center;  font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;">Felicitări, ai terminat cursul !</h3> <br>
					  
					  <h4 style="text-align:center;  font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;">Intoarce-te la pagina principală: <a href="/cursuri.php"> Click </a></h4>
					
					</div>
				  </div>
				</div>
			  <div id="terminal_lectie_succes" style="display:none; margin-top:15px;" class="alert alert-success" role="alert">
			   <span class="glyphicon glyphicon-ok"></span>
			   Felicitări ! <button style="margin-left:30px;" onclick="urmatoare_lectie()"type="button" class="btn btn-default">Următoarea lecţie</button>
		   	</div>
			 <div id="terminal_lectie_fail"  style="display:none; margin-top:15px; " class="alert alert-warning" role="alert">
			   <span class="glyphicon glyphicon-remove"></span>
			   Atenţie ! 
		   	</div>
			  <h2 id="cursuri_lectii_titlu" style="text-align:center; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;">x</h2>
			 <p style="text-align:center">
			  <button style="margin-top:10px; " id="evalueaza" onclick="<?php if($this->user_name != NULL) echo "evalueaza()"; else echo "arata_modal()" ?> " type="button" class="btn btn-success"> Evaluează</button>
			  <button onclick="reseteaza_user_input_lectie()" style="margin-top:10px; margin-left:10px;" type="button" class="btn btn-default">Resetează</button>
			  </p>
			  <div style="margin-left:20px; display:block;">
			  <!-- Delimiter  -->
			  <br>
				  <div class="bs-example bs-example-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
					  <li class="active"><a href="#home" role="tab" data-toggle="tab">Rezultat</a></li>
					  <li class=""><a href="#profile" role="tab" data-toggle="tab">Fişier intrare</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
					  <div class="tab-pane fade active in" id="home">
						 <textarea readonly id="rezultat" style="width:90%; margin-top:10px;"></textarea>
					  </div>
					  <div class="tab-pane fade" id="profile">
							<textarea readonly style="width:90%; margin-top:10px;" id="fisier_intrare"></textarea> 
					  </div>
					</div>
				  </div>
			  </div>
			  <hr>
			  
			 <h2 style="text-align:center; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;">Explicatii</h2>
			  

			 <p style="font-size:16px; margin-left:5px; margin-right:5px; "class="help-block" id="cursuri_lectii_explicatii">x</p>
			 <hr>
			  
			  <h2 style="text-align:center; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;">Instructiuni</h2>
			  <p id="cursuri_lectii_instructiuni"  style="font-size:16px; margin-left:5px; margin-right:5px; "class="help-block" id="cursuri_lectii_explicatii">x</p>
			 </div>
		
			</div>
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-46577566-2', 'auto');
			  ga('send', 'pageview');

			</script>
			<?php
		}
		public function set_user_rang($rang)
		{
			$this->user_rang=$rang;
		}
		public function este_cursul_afisat()
		{
			$name=secure($_GET["name"]);
			$query=mysql_query("SELECT * FROM `cursuri` WHERE `cursuri_nume` LIKE '$name'") or die(mysql_error());
			$k=mysql_fetch_array($query);
			if($k["cursuri_afiseaza"]==1)
				return 1;
			else
				return 0;
		}
	}
	$obj=new cursuri;
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="Acesta este un sistem diferit de actualele programe educative din Romania, astfel poți învăța mult mai ușor programarea.">
  <meta name="keywords" content="Informatica,Programare,C++, Probleme Informatica, Cursuri Informatica, Concursuri de programare, Probleme rezolvate, Comunitate IT, Competitii">
  <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
	
  <title>IronCoders - Cursuri interactive</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <style type="text/css" media="screen">
    body {
        overflow-y:auto;
		overflow-x:auto;
    }
    #editor{ 
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
	#editor2{ 
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
  </style>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
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
<body id="body">
<?php include 'views/header.php'; ?>
<?php if($type=="terminal") { 
if($obj->este_cursul_afisat())
{
    $obj->user_name=$user_name2;
	$obj->terminal();
}
 }
else
{
?>
	<img style="margin-top:-20px; width:100%;" src="../img/site/programming.png" class="img-responsive" alt="Responsive image">
	<div class="main-body" style="width:80%; margin-left:auto; margin-right:auto; min-height:660px;">
	<?php
	if($type==NULL){ ?>
		<div style="height:10px;"></div>
		<span class="text-center" style="width:100%;">
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
		<h3> Lista cursurilor </h3>
		<hr>
		<?php 
			$obj->listeaza_cursuri();
     } 
	if($type=="view"){
		$obj->user_name=$user_name2;
		$obj->user_cursuri_terminate=$user_cursuri_terminate2;
		$obj->set_user_rang($user_rang);
		$obj->vedere_curs();
	}
	if($type=="make"){
		if($user_name2!=NULL)
		{
		$obj->set_user_rang($user_rang);
		$obj->make_curs();
		}
		else
		{
		?>
		<h3>Trebuie să fii logat pentru această acţiune </h3>
		<?php
		}
	}
	if($type=="edit"){
		$obj->edit_curs();
	}
  ?></div><?php 
} ?>
<script>
var reseteaza_input=0;
var params = getSearchParameters();
var cursuri_nr=0,grupe_nr=0;
if(params.nr_lectie!=null)
	schimba_lectie(parseFloat(params.nr_lectie),2);
else
{
	schimba_lectie(1,1); schimba_grup(1);
}
function reseteaza_user_input_lectie()
{
	reseteaza_input=1;
	schimba_lectie(cursuri_nr,2);
}
function scoate_mesaje_terminal()
{
	if(document.getElementById("terminal_lectie_succes")!=null && document.getElementById("terminal_lectie_fail")!=null)
	{
		document.getElementById("terminal_lectie_succes").style.display="none";
		document.getElementById("terminal_lectie_fail").style.display="none";
	}
}
function schimba_lectie(x,tip)
{
	scoate_mesaje_terminal();
	if(cursuri_nr!=0)
		salveaza_lectie();
	cursuri_nr=x;
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		reseteaza_input=0;
		var str=xmlhttp.responseText;
		if(str=="Curs_Terminat")
		{
			$('#myModal2').modal("show");
			document.getElementById("btnPlaceOrder").disabled = true; 
		}
		else
		{
			str=str.split("#"); 
			if(	document.getElementById("lectie_nr") !=null)
				document.getElementById("lectie_nr").innerHTML=x;
			if(document.getElementById("cursuri_lectii_titlu")!=null)
			{
				document.getElementById("cursuri_lectii_titlu").value=str[0];
				document.getElementById("cursuri_lectii_titlu").innerHTML=str[0];
			}
			if(document.getElementById("cursuri_lectii_explicatii")!=null)
			{
				document.getElementById("cursuri_lectii_explicatii").value=str[1];
				document.getElementById("cursuri_lectii_explicatii").innerHTML=str[1];
			}
			if(document.getElementById("cursuri_lectii_instructiuni")!=null)
			{
				document.getElementById("cursuri_lectii_instructiuni").value=str[2];
				document.getElementById("cursuri_lectii_instructiuni").innerHTML=str[2];
			}
			if(document.getElementById("editor")!=null)
			{
				editor.setValue(str[3].replace(/diez/g,"#"));
				editor.gotoLine(1);
				editor.focus();
			}
			if(document.getElementById("editor2")!=null)
			{
				editor2.setValue(str[4].replace(/diez/g,"#"));
				editor2.gotoLine(1);
				editor2.focus();
			}
			if(document.getElementById("fisier_intrare")!=null)
			{
				document.getElementById("fisier_intrare").value=str[5];
				document.getElementById("fisier_intrare").innerHTML=str[5];
			}
		}
		}
	 } 
	var body = "nr_lectie="+x+"&cursuri_nume="+getURLParameter("name")+"&type="+tip+"&reseteaza="+reseteaza_input;
	xmlhttp.open("POST", "scripts/cursuri-change-lesson.php", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-Length", body.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(body);
}
function fa_schimbare_lectie()
{
	schimba_lectie(cursuri_nr,1);
}
function urmatoare_lectie()
{
    document.getElementById("rezultat").innerHTML='';
	schimba_lectie(cursuri_nr+1,2);
}
function schimba_grup(x)
{
	if(grupe_nr!=0)
		salveaza_lectie();
	grupe_nr=x;
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		var str=xmlhttp.responseText;
		str=str.split("#"); 
		if(document.getElementById("grup_nr")!=null)
			document.getElementById("grup_nr").innerHTML=x;
		if(document.getElementById("cursuri_grupe_descriere")!=null)
			document.getElementById("cursuri_grupe_descriere").value=str[0];
		if(document.getElementById("cursuri_grupe_titlu")!=null)
		document.getElementById("cursuri_grupe_titlu").value=str[1];
		}
	 } 
	var body = "nr_grup="+x+"&cursuri_nume="+getURLParameter("name");
	xmlhttp.open("POST", "scripts/cursuri-change-group.php", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-Length", body.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(body);
}
$('body').on('click', '.nr-exercitiu', function() {
    schimba_lectie($(this).text());
});

$('body').on('click', '.nr-grupa', function() {
    schimba_grup($(this).text());
});

function getURLParameter(name) {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    );
}

function salveaza_lectie()
{
	var cursuri_org_nume=getURLParameter("name");
	if(document.getElementById('cursuri_nume')!=null)
	{
	
		var cursuri_nume=document.getElementById('cursuri_nume').value;
		var cursuri_descriere=document.getElementById('cursuri_descriere').value;
		var cursuri_lectii_titlu=document.getElementById('cursuri_lectii_titlu').value;
		var cursuri_lectii_explicatii=document.getElementById('cursuri_lectii_explicatii').value;
		var cursuri_lectii_instructiuni=document.getElementById('cursuri_lectii_instructiuni').value;
		var cursuri_grupe_titlu=document.getElementById('cursuri_grupe_titlu').value;
		var cursuri_lectii_grupe=document.getElementById('cursuri_lectii_grupe').value;
		var cursuri_grupe_descriere=document.getElementById('cursuri_grupe_descriere').value;
		var editor_value=editor.getValue();
		var editor2_value=editor2.getValue();
		var fisier_intrare=document.getElementById('fisier_intrare').value;;
		
		document.getElementById("salveaza_lectie").innerHTML = "In progres...";
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			//document.getElementById("salveaza_lectie").innerHTML=xmlhttp.responseText;
			document.getElementById("salveaza_lectie").innerHTML = "Salveaza";
			}
		} 
		var body = "cursuri_nr=" + cursuri_nr + "&cursuri_org_nume="+cursuri_org_nume+"&cursuri_nume="+cursuri_nume+"&cursuri_descriere="+cursuri_descriere+"&cursuri_lectii_titlu="+cursuri_lectii_titlu+"&cursuri_lectii_explicatii="+encodeURIComponent(cursuri_lectii_explicatii)+"&cursuri_lectii_instructiuni="+encodeURIComponent(cursuri_lectii_instructiuni)+"&grupe_nr="+grupe_nr+"&cursuri_grupe_titlu="+cursuri_grupe_titlu+"&cursuri_grupe_descriere="+cursuri_grupe_descriere+"&cursuri_lectii_grupe="+cursuri_lectii_grupe+"&editor_value="+encodeURIComponent(editor_value)+"&editor2_value="+encodeURIComponent(editor2_value)+"&fisier_intrare="+fisier_intrare;
		xmlhttp.open("POST", "scripts/cursuri-edit.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-Length", body.length);
		xmlhttp.setRequestHeader("Connection", "close");
		xmlhttp.send(body);
	}
}	

var contor=0,contor2=0;
$(document).ready(function(){
	contor=document.getElementsByClassName("nr-exercitiu").length;
	contor2=document.getElementsByClassName("nr-grupa").length;
});

function adauga_exercitiu()
{
	 contor++;
	 $('.lista-exercitii').append(" <button type=\"button\" id=\""+contor+"\" class=\"btn btn-default nr-exercitiu\">"+contor+"</button>");
	 $('.btn-group').toggleClass('myClass');
;}

function adauga_grupa()
{
	 contor2++;
	 $('.lista-grupe').append(" <button type=\"button\" id=\""+contor+"\" class=\"btn btn-default nr-grupa\">"+contor2+"</button>");
	 $('.btn-group').toggleClass('myClass');
;}

function getSearchParameters() {
      var prmstr = window.location.search.substr(1);
      return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray( prmstr ) {
    var params = {};
    var prmarr = prmstr.split("&");
    for ( var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    return params;
}
if(params.type=="terminal")
	document.getElementById("body").style.minWidth="1000px";
	
function arata_modal()
{
	$('#myModal').modal("show");
}
function evalueaza() {
	scoate_mesaje_terminal();
    document.getElementById("evalueaza").innerHTML = "In progres...";
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		var str=xmlhttp.responseText;
		document.getElementById("evalueaza").innerHTML = "Evalueaza";
		str=str.split("#");
		if(str[0]==1)//totul e bine, scriu rezultatul si il las sa mearga la lectia urmatoare_lectie
		{
			document.getElementById("terminal_lectie_succes").style.display="block";
			document.getElementById("rezultat").innerHTML=str[1];
		}
		else
		{
			document.getElementById("terminal_lectie_fail").style.display="block";
			document.getElementById("rezultat").innerHTML=str[2];
			document.getElementById("terminal_lectie_fail").innerHTML="   \<span class=\"glyphicon glyphicon-remove\"\>\<\/span\> Atentie ! \<br\>" + str[1];
		}
		}
	} 
	var evaluate_input = document.getElementById("fisier_intrare").innerHTML;
	var p=getSearchParameters();
	var body = "cpp=" + encodeURIComponent(editor2.getValue()) + "&name="+p.name+"&nr_lectie="+cursuri_nr+"&evaluate_input="+evaluate_input;
	xmlhttp.open("POST", "scripts/cursuri-evaluate.php", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-Length", body.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(body);
}

$(document).ready(function(){
   $('.instructions').css('height', ($(window).height()-60)+'px');
   
   });

</script>
<script src="/ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
if(document.getElementById('editor')!=null)
{
 var editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
	if(getURLParameter("type")=="edit")
		editor.getSession().setMode("ace/mode/php");
	else
		editor.getSession().setMode("ace/mode/c_cpp");
    editor.setShowPrintMargin(false);
	editor.getSession().setUseWrapMode(true);
	editor.resize();
	document.getElementById('editor').style.fontSize='14px';
}
</script>
<script>
if(document.getElementById('editor2')!=null)
{
	var editor2 = ace.edit("editor2");
     editor2.setTheme("ace/theme/twilight");
     editor2.getSession().setMode("ace/mode/c_cpp");
     editor2.setShowPrintMargin(false);
	 editor2.getSession().setUseWrapMode(true);
	 editor2.resize();
	 document.getElementById('editor2').style.fontSize='14px';
}
</script>
<?php 
if($type!="terminal") 
   include 'views/footer.php';
 ?>
</body>
</html>