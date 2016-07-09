<?php 
	require "scripts/config.php";
	require ROOT."scripts/user_name.php";
	require "scripts/secure.php";
	$user_name2=$user_name;
	$user_rang2=$user_rang;
	$type=NULL;
	if(isset($_GET["type"]))
		$type=secure($_GET["type"]);
	
	class clase_virtuale
	{
		public function home()
		{
		  ?> 
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
		  <h3> Clase virtuale <a href="/clase.php?type=make"><button style="float:right; margin-top:-10px;" type="button" class="btn btn-primary"> Creează o clasă </button></a></h3> <hr> 
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="<?php if($this->user_name!=NULL) echo "active"; ?>"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">Clasele tale</a></li>
			  <li role="presentation" class="<?php if($this->user_name==NULL) echo "active"; ?>"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Clase publice</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
			  <div role="tabpanel" class="tab-pane fade <?php if($this->user_name!=NULL) echo "active in"; ?>" id="home" aria-labelledby="home-tab">
			  <br>
			  <?php
			    $query=mysql_query("SELECT * FROM `clase`");
				while($k=mysql_fetch_array($query))
				{
				$var=$k["clase_utilizatori"];
				if(strpos($var,$this->user_name)!=NULL || $this->user_name == $k["clase_facut_de"])
				{
					?>
					<div class="col-sm-6 col-md-4">
						<div style="min-height:200px;" class="thumbnail">
						  <div class="caption">
							<h3><?php echo $k["clase_titlu"];?></h3>
							<p><?php echo $k["clase_descriere"];?></p>
							<p><a href="/clase.php?type=view&name=<?php echo str_replace(" ", "+",$k["clase_titlu"]);?>" class="btn btn-default" role="button">Click</a></p>
						  </div>
						</div>
					  </div>
					<?php
					}
				}
				?>
			  </div>
			  <div role="tabpanel" class="tab-pane fade <?php if($this->user_name==NULL) echo "active in"; ?>" id="profile" aria-labelledby="profile-tab">
				<br>
			  <?php
			    $query=mysql_query("SELECT * FROM `clase` WHERE `clase_public` = 1");
				while($k=mysql_fetch_array($query))
				{
				$var=$k["clase_utilizatori"];
				if(strpos($var,$this->user_name)==NULL)
				{
					?>
					<div class="col-sm-6 col-md-4">
						<div style="min-height:200px;" class="thumbnail">
						  <div class="caption">
							<h3><?php echo $k["clase_titlu"];?></h3>
							<p><?php echo $k["clase_descriere"];?></p>
							<p><a href="/clase.php?type=view&name=<?php echo str_replace(" ", "+",$k["clase_titlu"]);?>" class="btn btn-default" role="button">Click</a></p>
						  </div>
						</div>
					  </div>
					<?php
					}
				}
				?>
			  </div>
			</div>
			<div style="width:100%; height:15px; clear:both"></div>
		  <?php
		
		}
		public function make()
		{
			?> <h3> Creeaza o clasa virtuală </h3>
			<hr>
			<div style="background-color: #f5f5f5; border: 1px solid #ccc; margin-top:30px; padding:20px;">
				<form action="scripts/clase-make.php" method="post" enctype="multipart/form-data" role="form">
				<h4> Informații de baza </h4>
				<div style="margin-top:25px;" class="row">
					<div class="col-md-6">
					  <label for="text">Titlu clasă</label>
					  <input onchange="form_validation2()" id="clase_titlu" name="clase_titlu" type="text" class="form-control">
					  <p id="adaugare_mesaj" style="display:none" class="bg-danger help-block">Numele există deja </p>
					  <br>
					  
					  <label for="text">Clasă publică</label>
					  <input name="clase_public" value="1" type="checkbox">
					</div>
					<div class="col-md-6">
					  <label for="text">Descriere </label>
					  <textarea name="clase_descriere" type="text" class="form-control"></textarea>	
					</div>
				</div>
				
				<button id="form-submit" style="margin-top:10px;" type="submit" class="btn btn-default">Trimite</button>
				
				</form>
			</div>
			<br>
			<?php
		}
		
		public function edit()
		{
			$name=NULL;
			if(isset($_GET["name"]))
				$name=secure($_GET["name"]);
	
			$query=mysql_query("SELECT * FROM `clase` WHERE `clase_titlu` LIKE '$name'");
			$k=mysql_fetch_array($query);
			$utilizatori=explode("#",$k["clase_utilizatori"]);
			if($this->user_rang >=3 || $k["clase_facut_de"]==$this->user_name)
			{
			?> <h3> Editează <a href="/clase.php?type=view&name=<?php echo $k["clase_titlu"];?>"><span id="titlu_clasei"><?php echo $k["clase_titlu"];?></span></a> </h3>
			<hr>
			<div style="background-color: #f5f5f5; border: 1px solid #ccc; margin-top:30px; padding:20px;">
				<h4>Lista participanti </h4>
				<div class="table-responsive">
				  <table id="lista_utilizatori" class="table table-striped table-bordered table-hover">
					  <thead>
						  <tr>
							  <th>#</th>
							  <th>Utilizator</th>
							  <th>Șterge</th>
						  </tr>
					  </thead>
					  <tbody>
						<?php 
						$nr=0;
						for($i=0; $i<count($utilizatori); $i++)
						{
						if($utilizatori[$i]=="")
							continue;
						$nr++;
						?>
						<tr class="linie">
						<td><?php echo $nr; ?></td>
						<td><a href="/profil.php?user=<?php echo $utilizatori[$i];?>"><?php echo $utilizatori[$i];?></a></td>
						<td><a href="/scripts/clase-remove.php?clase_titlu=<?php echo $k["clase_titlu"];?>&remove=<?php echo $utilizatori[$i];?>">Click</a></td>
						</tr>
						<?php
						}
						?>
					  </tbody>
				  </table>
				</div>
			</div>
			<div style="background-color: #f5f5f5; border: 1px solid #ccc; margin-top:30px; padding:20px;">
				<h4>Invita participanti </h4>
				<div style="margin-top:25px;" class="row">
					<div class="col-md-12">
					  <label for="text">Nume utilizator</label>
					  <input style="margin-top:10px;" id="clase_utilizatori" name="clase_utilizatori" type="text" class="form-control">
					  <p class="help-block"><span id="invitatie_mesaj" style="display:none"> </span></p>
					 
					  <button onclick="trimite_invitatie()" id="form-submit" style="margin-top:10px;" type="submit" class="btn btn-default">Trimite invitație </button>
					</div>
				</div>
			</div>
			<div style="background-color: #f5f5f5; border: 1px solid #ccc; margin-top:35px; padding:20px;">
				<form action="scripts/clase-make.php?type=edit&clase_org_titlu=<?php echo $k["clase_titlu"];?>" method="post" enctype="multipart/form-data" role="form">
				<h4> Informații de baza </h4>
				<div style="margin-top:25px;" class="row">
					<div class="col-md-6">
					  <label for="text">Titlu clasă</label>
					  <input readonly onchange="form_validation2()" id="clase_titlu" name="clase_titlu" type="text" class="form-control" value="<?php echo $k["clase_titlu"];?>">
					  <p id="adaugare_mesaj" style="display:none" class="bg-danger help-block">Numele există deja </p>
					  <br>
					  <label for="text">Clasă publică</label>
					  <input <?php if($k["clase_public"]==1) echo "checked"; ?> name="clase_public" value="1" type="checkbox">
					  <br>
					</div>
					<div class="col-md-6">
					  <label for="text">Descriere </label>
					  <textarea name="clase_descriere" type="text" class="form-control"><?php echo $k["clase_descriere"];?></textarea>					  
					</div>

					<div style="margin-top:10px;" class="col-md-12">
						<label for="text">Anunțuri </label>
					    <textarea name="clase_anunturi" type="text" class="form-control"><?php echo $k["clase_anunturi"];?></textarea>
					</div>
				</div>
				
				<div style="margin-top:25px; height:1px; background-color: #ccc;"></div>
				<h4> Editare sarcina </h4>
				<div style="margin-top:25px;" class="row">
					<div class="col-md-6">
					  <label for="text">Probleme</label>
					  <input onchange="form_validation()" value="<?php echo $k["clase_probleme"];?>" onchange="form_validation()" style="margin-top:10px;" id="clase_probleme" name="clase_probleme" type="text" class="form-control">
					  <p id="probleme_mesaj" style="display:none" class="bg-danger help-block">Exista o problemă invalidă</p>
					  <p class="help-block">Problemele se delimitează de către caracterul , ( virgulă ) </p>
					</div>
					<div class="col-md-6">
					  <label for="text">Data limită a sarcinii </label>
					  <input value="<?php echo $k["clase_data_limita"];?>" style="margin-top:10px;"  name="clase_data_limita" type="date" class="form-control">
					</div>
				</div>
				
				<button id="form-submit" style="margin-top:10px;" type="submit" class="btn btn-default">Trimite</button>
				
				</form>
			</div>
			<br>
			<?php
			}
			else
			{
			?>
			<h3> Nu ai suficiente permisiuni pentru această acțiune </h3>
			<?php } 
		}
		
		public function view()
		{
		$name=NULL;
		if(isset($_GET["name"]))
			$name=$_GET["name"];
		$query=mysql_query("SELECT * FROM `clase` WHERE `clase_titlu` LIKE '$name'");
		$k=mysql_fetch_array($query);
		if($k["clase_public"]==1 || strpos($k["clase_utilizatori"],$this->user_name) || $this->user_rang>=3 || $this->user_name == $k["clase_facut_de"])
		{
		?><h3><span id="titlu_clasei2"><?php echo $name;?></span>
		
		<?php if($k["clase_public"]==1 && !strpos($k["clase_utilizatori"],$this->user_name) && $this->user_name!=NULL) { ?>
		<a href="/scripts/clase-trimite-invitatie.php?name=<?php echo $k["clase_titlu"];?>&user=<?php echo $this->user_name;?>"><button style="float:right; margin-top:-10px;" type="button" class="btn btn-primary"> Înscrie-te </button></a>
		<?php }
		if(strpos($k["clase_utilizatori"],$this->user_name)) { ?>
		<button style="float:right; margin-top:-10px;" type="button" class="btn btn-primary"> Înscris </button>
		<?php
		}
		?>
		</h3>
		<?php if($this->user_name==NULL) { ?>
		<p class="help-block"> Trebuie să fii logat pentru a te înscrie in clasa virtuală </p>
		<?php } ?>
		<hr>
		
		<div class="row">
			<div class="col-md-2">
			<table class="table table-hover table-bordered">
			  <thead>
				<tr>
				  <th>Meniu</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> <a href="/clase.php?type=edit&name=<?php echo $name;?>">Editează clasa</a></td>
				</tr>
				<tr>
				  <td><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ajutor</td>
				</tr>
			  </tbody>
			</table>
			</div>
			<div class="col-md-10">
				<h3> Anunțuri </h3>
				
				<div style="background-color: white; border: 1px solid #ccc; margin-top:35px; padding:15px;">
				<?php 
				if($k["clase_anunturi"]!=NULL)
				{
				?> <p style="font-size:17px;" class="help-block"> <?php echo $k["clase_anunturi"]; ?></p> <?php
				}
				else
				{
				?> <p style="font-size:17px;" class="help-block"> Nu sunt anunțuri de afișat . </p> <?php
				}	
				?>
				</div>
				<br>
				<hr>
				<h3> Sarcini </h3>
				<p class="help-block"> Termen limită : <?php echo $k["clase_data_limita"];?></p>
				<hr>
				
				<div class="table-responsive">
				  <table class="table table-striped table-bordered table-hover">
				  <thead>
				  <tr>
					  <th>#</th>
					  <th>Titlu</th>
					  <th>Autor</th>
					  <th>Sursă</th>
					  <th>Grupă</th>
					  <th>Scorul tău</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php
				  $probleme=explode(",",$k["clase_probleme"]);
				  for($i=0; $i<count($probleme); $i++)
				  {
						$prob=$probleme[$i];
						if($prob==NULL)
							continue;
						$query2=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_nume` LIKE '$prob'");
						$k2=mysql_fetch_array($query2); 
						
						$id=$k2["arhiva_id"]; $user_name=$this->user_name;
						
						$query3=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user_name'" );
						while($k3=mysql_fetch_array($query3))
						{
							if($k3["job_total_points"]==100)
							{
							$pc=100;
							break;
							}
							else
							if($k3["job_total_points"]>$pc)
								$pc=$k3["job_total_points"];
						}
						?>
						<tr>
							<td> <?php echo $i+1; ?></td>
							<td><a href="/arhiva/<?php echo  str_replace(" ", "+",$k2["arhiva_nume"]); ?>">  <?php echo $k2["arhiva_nume"]; ?> </a> </td>
							<td> <?php echo $k2["arhiva_autor"]; ?>  </td>
							<td> <?php echo $k2["arhiva_sursa"];?> </td>
							<td> <?php echo $k2["arhiva_grupa"]; ?> </td>
							<td> <?php echo $pc; ?> </td>
						</tr>
						<?php
				  }
				  
				  ?>
				  </tbody>
				  </table>
				</div><br>
				<?php
				 function humanTiming ($time)
					{

						$time = time() - $time; // to get the time since that moment

						$tokens = array (
							31536000 => 'ani',
							2592000 => 'luni',
							604800 => 'saptamani',
							86400 => 'zile',
							3600 => 'ore',
							60 => 'minute',
							1 => 'secunde'
						);

						foreach ($tokens as $unit => $text) {
							if ($time < $unit) continue;
							$numberOfUnits = floor($time / $unit);
							return $numberOfUnits.' '.$text;
						}

					}
				?>
				<h3> Chat </h3> <hr>
				<div style="margin:20px; padding:20px;">
					<div id="chat" style="background-color: white; border: 1px solid #ccc; height:600px; overflow-y: scroll;">
					</div>
					<div class="form-inline">
					<input style="width:90%" type="text" class="form-control" id="text" placeholder="Scrie mesajul">
					<button id="trimite" style="width:9%; min-width:70px;" type="button" class="btn btn-default">Trimite</button>
					</div>
				</div>
				
				<h3> Surse trimise </h3> <hr>
				<div class="table-responsive">
				<table class="table table-striped table-bordered">
				  <thead>
					  <tr>
						  <th>#</th>
						  <th>Utilizator</th>
						  <th>Problemă</th>
						  <th>Limbaj</th>
						  <th>Data trimiterii</th>
						  <th>Punctaj</th>
						  <th>Detalii evaluare</th>
					  </tr>
				  </thead>
				  <tbody>
					<?php 
					 $str="Clasa : ".$name;
					 $query2=mysql_query("SELECT * FROM `jobs` WHERE `job_contest` LIKE '$str'");
					 while($k2=mysql_fetch_array($query2))
					 {
					 ?>
					   <tr>
						<td> <?php echo $k2["job_id"]; ?></td>
						<td><a href="profil.php?user=<?php echo $k2["job_owner"]; ?>">  <?php echo $k2["job_owner"]; ?> </a> </td>
						<td> <a href="/arhiva/<?php echo $k2["job_problem_name"]; ?>"> <?php echo $k2["job_problem_name"]; ?> </a> </td>
						<td><?php echo $k2["job_language"]; ?></td>
						<td>Acum <?php echo humanTiming( strtotime($k2["job_date"])); ?></td>
						<td> <?php  echo $k2["job_total_points"];?> </td>
						<td><a href="monitor.php?type=view&id=<?php echo $k2["job_id"]; ?>">Click</a></td>
					   </tr>
					 <?php
					 }
					?>
				</tbody>
				</table>
				</div>
				<br>
		
			</div>
		
		</div>
		
		<?php
		}
		else
		{
		?>
		<h3> Nu ai suficiente permisiuni pentru această acțiune </h3>
		<?php
		}
		}
		
		public function set_user_name($name)
		{
			$this->user_name=$name;
		}
		public function set_user_rang($rang)
			{
				$this->user_rang=$rang;
			}
	
	}
	$obj=new clase_virtuale;
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Învață și mai multe concurând cu alți membri ai site-ului. Doboară recordurile și depășește-ți limitele avansând în clasament.">
	<meta name="keywords" content="Informatica,Programare,C++, Probleme Informatica, Cursuri Informatica, Concursuri de programare, Probleme rezolvate, Comunitate IT, Competitii">
	<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
	
    <title>IronCoders - Clase virtuale</title>
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	
  </head>
  <body>
  <style>
	.blue
	{
		padding-left:10px;
		padding-top:5px;
		font-size:18px;
		font-family: 'Open Sans', sans-serif; 
		font-weight: lighter; 
		color: #2679b5;
	}
	.mesaj
	{
		font-size:16px;
	}
	
	</style>
<?php include 'views/header.php'; ?>
<img style="margin-top:-20px; width:100%;" src="../img/site/programming.png" class="img-responsive" alt="Responsive image">
<div style="width:all; height:3px; background-color:#e7e7e7;"> </div>
<div style="min-height:580px;">
<div class="main-body" style="width:90%; margin-left:auto; margin-right:auto">
<?php
if($type=="make")
{
	$obj->set_user_name($user_name2);
	$obj->set_user_rang($user_rang2);
	if($user_name2)
		$obj->make();
	else
	{
	?>
	<h3> Trebuie să fii logat pentru a creea o clasă virtuală </h3>
	<?php
	}
}
if($type=="edit")
{
	$obj->set_user_name($user_name2);
	$obj->set_user_rang($user_rang2);
	$obj->edit();
}
if($type==NULL)
{
	$obj->set_user_name($user_name2);
	$obj->set_user_rang($user_rang2);
	$obj->home();
}
if($type=="view")
{
	$obj->set_user_name($user_name2);
	$obj->set_user_rang($user_rang2);
	$obj->view();
}
?>
</div>
</div>
<?php include 'views/footer.php'; ?>
<script>
 function form_validation()
	  {
		var x=  document.getElementById("clase_probleme").value;
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
				document.getElementById("probleme_mesaj").style.display="none";
			  }
			  else
			  {
				document.getElementById("form-submit").disabled = true;
				document.getElementById("probleme_mesaj").style.display="block";				
			  }
			}
	      }	
		var body = "id=4&name=" + x;
		xmlhttp.open("POST", "scripts/form-validation.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send(body);
	 }
	 
	function form_validation2()
	  {
		var x=  document.getElementById("clase_titlu").value;
		if(document.getElementById("titlu_clasei")!=null)
			var n= document.getElementById("titlu_clasei").innerText;
		else
			var n="osfnasifasuihr10912h09124";
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
			  if(rasp==1 || n==x)
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
		var body = "name=" + x;
		xmlhttp.open("POST", "scripts/clase-form-validation.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send(body);
	 }
	 
	 function trimite_invitatie()
	  {
		var x=  document.getElementById("clase_utilizatori").value;
		if(document.getElementById("titlu_clasei")!=null)
			var n= document.getElementById("titlu_clasei").innerText;
		else
			var n="osfnasifasuihr10912h09124";
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
				document.getElementById("invitatie_mesaj").style.display="block";		
				document.getElementById("invitatie_mesaj").innerText="Invitatia a fost trimisa cu succes utilizatorului "+x;		
				$('#lista_utilizatori tr:last').after('<tr class=\"linie\"><td>'+ (document.getElementsByClassName("linie").length +1) +'</td><td><a href=\"/profil.php?user='+x+'\">'+x+'</a></td><td><a href="/scripts/clase-remove.php?clase_titlu='+n+'&remove='+x+'\">Click</a></td></tr>');
			  }
			 if(rasp==2)
			  {
				document.getElementById("invitatie_mesaj").style.display="block";		
				document.getElementById("invitatie_mesaj").innerText="Utilizatorul a fost deja invitat.";	
			  }
			  if(rasp==3)
			  {
				document.getElementById("invitatie_mesaj").style.display="block";		
				document.getElementById("invitatie_mesaj").innerText="Utilizatorul pe care doriți să îl invitați nu este înregistrat pe site.";	
			  }
			}
	      }	
		var body = "user_name=" + x + "&clase_titlu=" + n;
		xmlhttp.open("POST", "scripts/clase-trimite-invitatie.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send(body);
		
	 }
	 
	$(document).ready(function () {
	$(function() {
		$( "#clase_utilizatori" ).autocomplete(
		{
			 minlength:2,
			 source:'scripts/clase-lista-titlu.php',
			 select: function(event, ui) {
					$('#clase_utilizatori').val(ui.item.label);
				}
		})

	});
	});
</script>
<script>
function update_chat()
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
			xmlhttp=new XMLHttpRequest();
		else
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("chat").innerHTML=xmlhttp.responseText;
				if(ok==true)
				{
					$("#chat").scrollTop(document.getElementsByClassName("mesaj").length*30);
					ok=false;
				}
			}
		  }
	  
		var body = "";
		xmlhttp.open("POST", "scripts/chat-receive.php?name="+n, true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send(body);
	}
if(document.getElementById("titlu_clasei2")!=null)
{
	var n= document.getElementById("titlu_clasei2").innerText;
	var ok=true;
	update_chat();
	setInterval(function(){ 
		update_chat();
	}, 1000);
	$(document).ready(function(){

		$('#text').keydown(function(e) {
		if (e.keyCode == 13) {
			send_chat();
		}
		});
		$("#trimite").click(function(){
			send_chat()
		});
	});
	function send_chat()
	{
	var x=document.getElementById('text').value;
			document.getElementById('text').value="";
			var xmlhttp;
			if (window.XMLHttpRequest)
				xmlhttp=new XMLHttpRequest();
			else
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					var x=xmlhttp.responseText;
					console.log(x);
					if(x.length<=2)
						$('#myModal').modal("show");
					else
						document.getElementById("chat").innerHTML=x;
					$("#chat").scrollTop(document.getElementsByClassName("mesaj").length*30);
				}
			  }
	  
			var body = "mesaj=" + x;
			xmlhttp.open("POST", "scripts/chat-send.php?name="+n, true);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlhttp.send(body);
	}
}
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>

</body>
</html>