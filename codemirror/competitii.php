<?php 
	require "scripts/config.php";
	require ROOT."scripts/user_name.php";
	require "scripts/secure.php";
	$type=NULL;
	if(isset($_GET["type"]))
		$type=secure($_GET["type"]);
	if(isset($_GET["p"]))
		$p=secure($_GET["p"]);
	else
		$p=1;
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Învață și mai multe concurând cu alți membri ai site-ului. Doboară recordurile și depășește-ți limitele avansând în clasament.">
	<meta name="keywords" content="Informatica,Programare,C++, Probleme Informatica, Cursuri Informatica, Concursuri de programare, Probleme rezolvate, Comunitate IT, Competitii">
	<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
	
    <title>IronCoders - Competiţii</title>
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
<?php include 'views/header.php'; ?>
<img style="margin-top:-20px; width:100%;" src="../img/site/programming.png" class="img-responsive" alt="Responsive image">
<div style="width:all; height:3px; background-color:#e7e7e7;"> </div>
<div style="min-height:580px;">
<div class="main-body" style="width:90%; margin-left:auto; margin-right:auto">
<?php 
	if($type=="make")
	{ 
		if($user_name!=NULL)
		{?>
		<h3> Creează o competitie online </h3>
		<hr>
		<div style="background-color: white; border: 1px solid #ccc; margin-top:30px; padding:20px;">
	    <form action="scripts/competitii-make.php" method="post" enctype="multipart/form-data" role="form">
		<div style="margin-top:25px;" class="row">
		<div class="col-md-6">
		  <label for="text">Nume competiţie</label>
		  <input id="competitii_nume" onchange="form_validation()" name="competitii_nume" type="text" class="form-control">
		  <p id="adaugare_mesaj" style="display:none" class="bg-danger help-block">Numele există deja </p>
		  <div style="height:35px;"></div>
			
	
		  <label for="text">Dată începere</label>
		  <input name="competitii_data_incepere" type="datetime-local" class="form-control"><br>
		  
		  <label for="text">Descriere </label>
		  <textarea name="competitii_descriere" type="text" class="form-control"></textarea><br>
	
		</div>
		<div class="col-md-6">
		  <label for="text">Probleme</label>
		  <input onchange="form_validation2()" id="competitii_probleme" name="competitii_probleme" type="text" class="form-control">
		  <p id="probleme_mesaj" style="display:none" class="bg-danger help-block">Exista o problemă invalidă</p>
		  <p class="help-block">Problemele se delimitează de către caracterul , ( virgulă ) </p>

		  
		  <label for="exampleInputEmail1">Durată ( minute )</label>
		  <input name="competitii_durata" type="number" class="form-control"><br>
		  
		  <label style="margin-top:30px;" for="text">Competiţie oficială: </label>
		  <input <?php if($user->data['user_rang'] <3 ) echo "disabled"; ?> name="competitii_oficial" value="1" type="checkbox">
		  <?php 
		  if($user->data['user_rang'] <3 ) { ?>
		  <p class="help-block">Nu ai suficiente permisiuni pentru a creea o competiţie oficială. <a href="">Click</a> pentru informaţii</p>
		  <?php } ?>
		 </label>
		</div>
		</div>
		<button id="form-submit" type="submit" class="btn btn-default">Trimite</button>
		</form>
		</div>
		 <script>
	  function form_validation()
	  {
		var x=  document.getElementById("competitii_nume").value;
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
		var body = "id=2&name=" + x;
		xmlhttp.open("POST", "scripts/clase-form-validation.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-Length", body.length);
		xmlhttp.setRequestHeader("Connection", "close");
		xmlhttp.send(body);
	 }
	 
	 
	 function form_validation2()
	  {
		var x=  document.getElementById("competitii_probleme").value;
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
		xmlhttp.setRequestHeader("Content-Length", body.length);
		xmlhttp.setRequestHeader("Connection", "close");
		xmlhttp.send(body);
	 }
	  </script>
		<?php
		}
		else
		{?>
		<h3> Trebuie să fii logat pentru a accesa această pagină ! </h3>
		<?php
		}
	}
	else
	
	if($type==NULL) {
	?>
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
	<h3>Competiţii</h3>
	<hr>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
	  <li class="active"><a href="#home" role="tab" data-toggle="tab">Oficiale</a></li>
	  <li><a href="#profile" role="tab" data-toggle="tab">Neoficiale</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="home">
	  <div class="table-responsive">
		  <table class="table table-striped table-bordered">
		  <thead>
		  <tr>
			  <th>#</th>
			  <th>Nume</th>
			  <th>Autor</th>
			  <th>Dată de începere</th>
			  <th>Stare</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
		  //COMPETITII OFICIALE
		  $query=mysql_query("SELECT * FROM `competitii` WHERE `competitii_oficial` = 1 ORDER BY `competitii_id` DESC"); $nr=0;
		  while($k=mysql_fetch_array($query))
		  {
			$nr++;
			if(($p==1 && $nr<=50) || ($p!=1 && $nr>($p-1)*50 && $nr<=$p*50))
			{
			?> <tr>
			<td> <?php echo $nr; ?></td>
			<td><a href="/competitii/<?php echo $k["competitii_nume"];?>">  <?php echo $k["competitii_nume"]; ?> </a> </td>
			<td> <a href="profil.php?user=<?php echo $k["competitii_adaugat_de"]; ?>"> <?php echo $k["competitii_adaugat_de"] ?> </a> </td>
			<td> <?php echo $k["competitii_data_incepere"];?> </td>
			<td> <?php echo $k["competitii_status"]; ?> </td>
				</tr>
			<?php
			}
		  }
		  ?>
		  </tbody>
		</table>
	</div>
	  </div>
	  <div class="tab-pane" id="profile">
	  <div class="table-responsive">
	  <table class="table table-striped table-bordered">
      <thead>
	  <tr>
          <th>#</th>
          <th>Nume</th>
          <th>Autor</th>
          <th>Dată de începere</th>
          <th>Stare</th>
        </tr>
      </thead>
	  <tbody>
	  <?php
	  //COMPETITII Neoficiale
	  $query=mysql_query("SELECT * FROM `competitii` WHERE `competitii_oficial` = 0  ORDER BY `competitii_id` DESC"); $nr=0;
	  while($k=mysql_fetch_array($query))
	  {
		$nr++;
		if(($p==1 && $nr<=50) || ($p!=1 && $nr>($p-1)*50 && $nr<=$p*50))
		{
		?> <tr>
		<td> <?php echo $nr; ?></td>
		<td><a href="/competitii/<?php echo $k["competitii_nume"];?>">  <?php echo $k["competitii_nume"]; ?> </a> </td>
		<td> <a href="profil.php?user=<?php echo $k["competitii_adaugat_de"]; ?>"> <?php echo $k["competitii_adaugat_de"] ?> </a> </td>
		<td> <?php echo $k["competitii_data_incepere"];?> </td>
		<td> <?php echo $k["competitii_status"]; ?> </td>
	    	</tr>
		<?php
		}
	  }
	  ?>
      </tbody>
    </table>
	</div>
	  </div>
	</div>
	<?php
	}
	else
	if($type=="view")
	{
		//VEDERE COMPETITIE
		if(isset($_GET["name"]))
			$name=secure($_GET["name"]);
		else
			$name=NULL;
		$query=mysql_query("SELECT * FROM `competitii` WHERE `competitii_nume` LIKE '$name'");
		$k=mysql_fetch_array($query);
		?>
		<div class="row">
	<div style="margin-top:20px;" class="col-md-2">
	<table style="background-color:white;" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>Meniu</th>
        </tr>
      </thead>
      <tbody>
		<tr>
          <td><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> <a href="/competitii.php?type=clasament&name=<?php echo $k["competitii_nume"];?>">Clasament</a></td>
        </tr>
		<tr>
          <td><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> <a href="/monitor.php?type=competitii&name=<?php echo $k["competitii_nume"];?>">Monitor</td>
        </tr>
		<tr>
          <td><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ajutor</td>
        </tr>
      </tbody>
    </table>
	</div>
	<div class="col-md-10">
			<div style="background-color: white; border: 1px solid #ccc; margin-top:20px;"  class="row">
			<h3 style="margin-left:10px;"><?php echo $k["competitii_nume"]; ?> </h3>
			<p style="margin-left:10px;" class="help-block"><?php echo $k["competitii_descriere"]; ?> </p>
			<?php
			$date1 = strtotime($k["competitii_data_incepere"]);
			$date2 = time();
			$subTime = $date1 - $date2;
			$y = ($subTime/(60*60*24*365));
			$d = ($subTime/(60*60*24))%365;
			$h = ($subTime/(60*60))%24;
			$m = ($subTime/(60))%60;
			if($k["competitii_status"]=="In asteptare")
			{
				if($m>=0)
				{
					?> <p style="margin-left:10px;"> <?php 
					echo "Va incepe in ";
					if($d>1)
						echo $d." zile ";
					else
					if($d==1)
						echo $d." zi ";
						
					if($h>=1)
					{
						if($d>=1)
							echo ", ";
						if($h>1)	
							echo $h." ore ";
						else
						if($h==1)
							echo $h." ora ";
					}
		
						
					if($m>=1)
					{
						if($h>=1)
							echo ", ";
						if($m>1)
							echo $m." minute ";
						else
						if($m==1)
							echo $m." minut ";
					}
					else
						echo " scurt timp";
					?> </p> <?php
				}
			}
			else
			{
			$dur=$k["competitii_durata"]+$subTime/(60); $dur=(int)$dur;
			?> <p style="margin:10px;"> <?php
			 if($k["competitii_status"]=="In desfasurare")
			 {
				echo "Competiţia este în desfăşurare. Se termină peste ". $dur ." minut";
				if($dur>1)
					echo "e";
			 }
			 else
				echo "Competiţia s-a terminat, felicitări primilor clasaţi. "; ?> <?php
			 ?> </p> <?php
			 }
			?>
			<img style="float:right; margin-right:10px; margin-top:-95px; height:80px; width:100px;" src="/img/site/contest.png" class="img-responsive hidden-xs" alt="Responsive image">
			</div>
			
			<h3> Probleme </h3>
			<div  style="margin-top:20px;" class="table-responsive">
			<?php
			 if($k["competitii_status"]!="In asteptare")
			  { 
			  ?>
			  <table class="table table-striped table-bordered">
			  <thead>
			  <tr>
				  <th>#</th>
				  <th>Titlu problemă</th>
				  <th>Autor</th>
				  <th>Sursă</th>
				  <th>Scorul tău</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
			  $nr=0;
			  $probleme=explode(",",$k["competitii_probleme"]);
			  for($i=0; $i<count($probleme); $i++)
			  {
			  $nume=$probleme[$i];
			  $query2=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_nume` LIKE '$nume'");
			  $nr++;
			  $k2=mysql_fetch_array($query2);
			  ?> <tr> <?php
			  ?><td><?php echo $nr; ?></td> <?php
			  ?><td><a href="/arhiva.php?type=view&name=<?php echo $k2["arhiva_nume"]; ?>"><?php echo $k2["arhiva_nume"]; ?></a></td> <?php
			  ?><td><a href="profil.php?user=<?php echo $k2["arhiva_adaugat_de"]; ?>"><?php echo $k2["arhiva_adaugat_de"]; ?></a></td> <?php
			  ?><td><?php echo $k2["arhiva_sursa"]; ?></td> <?php
			  ?><td>
			  <?php 
			  $id=$k2["arhiva_id"]; $competitii_nume=$k["competitii_nume"]; $pc=0;
			  $query3=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner` LIKE '$user_name' AND `job_contest` LIKE '$competitii_nume'" );
			  while($k3=mysql_fetch_array($query3))
			  {
					$pc=$k3["job_total_points"];
			  }
			  echo $pc;
			  ?></td> 
			  </tr>
			  <?php } ?>
			
			  </tbody>
			</table>
		<?php }  else { ?>
		 <p class="help-block">Lista de probleme va deveni vizibilă în momentul începerii competiţiei </p>
		<?php } ?>
			</div>

	</div>
	</div>
		<?php
	}
	if($type=="clasament")
	{
		$name=NULL;
		if(isset($_GET["name"])) //CLASAMENTUL COMPETITIEI
		{
			$name=secure($_GET["name"]);
			$query=mysql_query("SELECT * FROM `competitii` WHERE `competitii_nume` LIKE '$name'");
			$k=mysql_fetch_array($query);
			$probleme=explode(",",$k["competitii_probleme"]);
			?><h3> Clasamentul competiţiei <a href="competitii.php?type=view&name=<?php echo $name; ?>"><?php echo $name; ?> </a></h3><hr>
			
		  <div class="table-responsive">
		  <table class="table table-striped table-bordered">
		  <thead>
		  <tr>
			  <th>#</th>
			  <th>Nume</th>
			  <?php 
			  for($i=0; $i<count($probleme); $i++)
			  {
			  ?> <th><?php echo $probleme[$i]; ?></th> <?php
			  }
			  ?>
			  <th>Punctaj total</th>
			</tr>
		  </thead>
		  <tbody>
			<?php  
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_contest` LIKE '$name'");
			//populez userii si numarul de puncte luate la fiecare problema & nr de puncte total
			$puncte_total_aux=NULL; $puncte_total=NULL; $puncte=NULL; $user=NULL; $nr_user=0;
			while($k2=mysql_fetch_array($query2))
			{
				$ok=true;
				for($i=0; $i<$nr_user; $i++)
					if($user[$i]==$k2["job_owner"])
					{
						$ok=false;
						$id=$i;
						break;
					}
				if($ok==true)
				{
					$user[$nr_user]=$k2["job_owner"];
					$id=$nr_user;
					$nr_user++;
				}
				for($i=0; $i<count($probleme); $i++)
					if($probleme[$i]==$k2["job_problem_name"])
						{
							$id_problem=$i;
							break;
						}
				//if($k2["job_total_points"]>=$puncte[$id][$id_problem])
				//{
				$puncte_total[$id]=$puncte_total[$id]-$puncte[$id][$id_problem]+$k2["job_total_points"];
				$puncte_total_aux[$id]=$puncte_total[$id];
				$puncte[$id][$id_problem]=$k2["job_total_points"];
				//}
			}
			//sortez userii dupa punctajul total;
			$sort=NULL;
			for($i=0; $i<$nr_user; $i++)
				$sort[$i]=$i;
			for($i=0; $i<$nr_user; $i++)
			{
				for($j=$i+1; $j<$nr_user; $j++)
				{
					if($puncte_total_aux[$i]<$puncte_total_aux[$j])
					{
						$aux=$puncte_total_aux[$i];
						$puncte_total_aux[$i]=$puncte_total_aux[$j];
						$puncte_total_aux[$j]=$aux;
						
						$aux=$sort[$i];
						$sort[$i]=$sort[$j];
						$sort[$j]=$aux;
					}
				}
			}
			for($i=0; $i<$nr_user; $i++)
			{
			  ?>
			  <tr><td><?php echo $i+1; ?> </td>
			  <td><a href=""><?php echo $user[$sort[$i]]; ?></a></td> <?php
	
			  for($j=0; $j<count($probleme); $j++)
			  {
			   ?> <td><?php if($puncte[$sort[$i]][$j]==NULL) echo "0"; else echo $puncte[$sort[$i]][$j]; ?> </td><?php 
			  }
			  ?><td><?php echo $puncte_total[$sort[$i]]; ?></td>
			  
			  </tr> <?php
			}
			?>
		  </tbody>
		</table>
	</div>

			<?php
		}
		else
		{
		?>
		<h3> Clasamentul competiţilor oficiale </h3>
		<p class="help-block"> Sunt afişate doar punctajele diferite de 0 </p>
		<hr>
		<div class="table-responsive">
		  <table class="table table-striped table-bordered">
		  <thead>
		  <tr>
			  <th>#</th>
			  <th>Nume</th>
			  <th>Punctaj</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
		  //COMPETITII OFICIALE
		  mysql_select_db("admin_forum");
		  $query=mysql_query("SELECT * FROM `phpbb_users` ORDER BY `user_puncte_competitii` DESC "); $nr=0;
		  while($k=mysql_fetch_array($query))
		  {
			if($k["user_puncte_competitii"]!=0)
			{
			$nr++;
			?> <tr>
			<td> <?php echo $nr; ?></td>
			<td><a href="">  <?php echo $k["username_clean"]; ?> </a> </td>
			<td> <?php echo $k["user_puncte_competitii"] ?>  </td>
			</tr>
			<?php
			}
		  }
		  ?>
		  </tbody>
		</table>
		</div>
		<?php
		}
	}
?>
</div>
</div>
<?php include 'views/footer.php'; ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>

</body>
</html>