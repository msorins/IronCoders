<?php
require "scripts/config.php";
require ROOT."scripts/user_name.php";
$user_name2=$user_name;
$user_rang2=$user_rang;
require "scripts/secure.php";
if(isset($_GET["p"]))
	$p=secure($_GET["p"]);
else
	$p=1;
	
class arhiva
{
	private $user_name;
	private $user_rang;
	public $p;
	public $problem_name;
	public $name;

	public function cap_tabel()
	{
	?>
	 <div class="table-responsive">
      <table class="table table-striped table-bordered">
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
	}
	public function corp_tabel($nr,$k,$pc)
	{
	?>
	<tr>
		<td> <?php echo $nr; ?></td>
		<td><a href="/arhiva/<?php echo  str_replace(" ", "+",$k["arhiva_nume"]); ?>">  <?php echo $k["arhiva_nume"]; ?> </a> </td>
		<td> <?php echo $k["arhiva_autor"]; ?>  </td>
		<td> <?php echo $k["arhiva_sursa"];?> </td>
		<td> <?php echo $k["arhiva_grupa"]; ?> </td>
		<td> <?php echo $pc; ?> </td>
	</tr>
	<?php
	}
	public function home()
	{
	  $this->cap_tabel();
	  //TOATE PROBLEMELE
	  $query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_concurs` NOT LIKE 'arhiva-educationala' AND `arhiva_afiseaza` = 1 ORDER BY `arhiva`.`arhiva_grupa` DESC"); $nr=0;
	  while($k=mysql_fetch_array($query))
	  {
		$nr++;
		if(($this->p==1 && $nr<=50) || ($this->p!=1 && $nr>($this->p-1)*50 && $nr<=$this->p*50))
		{
		$id=$k["arhiva_id"]; $pc=0; $user_name=$this->user_name;
		if($user_name!=NULL)
		{
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user_name'" );
			while($k2=mysql_fetch_array($query2))
			{
				if($k2["job_total_points"]==100)
				{
				$pc=100;
				break;
				}
				else
				if($k2["job_total_points"]>$pc)
					$pc=$k2["job_total_points"];
			}
		}
	    $this->corp_tabel($nr,$k,$pc);
		}
	  }
	  ?>
      </tbody>
    </table>
	</div>
	<?php 
	}
	public function make()
	{
	?>
	  <h3>Adaugă o problema</h3>
	  <hr>
	  <div style="background-color: white; border: 1px solid #ccc; margin:20px; padding:20px;">
	  <form action="/scripts/arhiva-make.php" method="post" enctype="multipart/form-data" role="form">
	  <div class="row">
	  <div class="col-md-12">
		  <div class="form-group">
				<label for="exampleInputEmail1">Nume Problemă</label>
				<input onchange="form_validation()"  id="arhiva_nume" name="arhiva_nume" type="text" class="form-control" placeholder="Nume Problemă">
				<p id="adaugare_mesaj" style="display:none" class="bg-danger help-block">Numele există deja </p>
		  </div><br>
	  </div>
	  <div class="col-md-6">
		  <label for="text">Sursă</label>
		  <input  name="arhiva_sursa" type="text" class="form-control" placeholder="Nume sursă"><br>
	   </div>
	   <div class="col-md-6">
		  <label for="text">Autor</label>
		  <input  name="arhiva_autor" type="text" class="form-control" placeholder="Nume autor"><br>
	   </div>

	  
	  <div class="col-md-12">
		 <label style="">Cerinţă problemă</label>
		  <textarea name="arhiva_cerinta"id="editor1" rows="10" cols="80">

		  </textarea>
		  <script>
		  // Replace the <textarea id="editor1"> with a CKEditor
		  // instance, using default configuration.
		  CKEDITOR.replace( 'editor1' );
		  </script>
	  </div>
		  <br>
		  
	   <div class="col-md-6">

		  <label for="text">Limită timp</label>
		  <input name="arhiva_timp" type="text" class="form-control" placeholder="ms"><br>
			  
		  <label for="text">Limită memorie</label>
		  <input  name="arhiva_memorie" type="text" class="form-control" placeholder="kbytes"><br>
			  
	  </div>
	  <div class="col-md-6">
		  <label for="exampleInputEmail1">Grupă</label>
		  <select name="arhiva_grupa" class="form-control">
			  <option value="Mica">Mica</option>
			  <option value="Medie">Medie</option>
			  <option value="Mare">Mare</option>
			  <option value="Toate">Toate</option>
		  </select><br>
		  
		  <div class="form-group">
			<label for="exampleInputFile">Teste</label>
			<input name="upload[]" type="file" multiple="multiple" type="file" id="exampleInputFile">
			<p class="help-block">Testele sunt de forma "0.in", "0.ok", "1.in", "1.ok"...etc</p>
			</div>
		  
	  </div>
	  <div style="margin-top:-20px;" class="col-md-6">
	  <label for="exampleInputFile">Categorii:</label>
		<select name="arhiva_categorii[]" multiple class="form-control">
		<?php 
		$query=mysql_query("SELECT * FROM `arhiva_categorii`");
		while($k=mysql_fetch_array($query))
		{
			?>  <option value="<?php echo $k["arhiva_categorii_nume"]; ?>"><?php echo $k["arhiva_categorii_nume"]; ?></option><?php
		}
		?>
		</select>
	 <p class="help-block"> Apăsând tasta "ctrl" pot fi selectate mai multe opțiuni </p>
	  </div>
	  <div style="margin-top:-20px;" class="col-md-6">
	   <label style="margin-top:30px;" for="text">Afișare în lista de probleme: </label>
		  <input <?php if($this->user_rang <3 ) echo "disabled"; ?> name="arhiva_afiseaza2" value="1" type="checkbox">
		  <?php 
		  if($this->user_rang < 3 ) { ?>
		  <p class="help-block">Problema va fi afișată în listă doar după ce este verificată de către un moderator.</p>
		  <?php } ?>
	  </div>
	  <div style="margin-top:20px; margin-bottom:-25px;" class="col-md-12">
		<p style="text-align:center"><button id="form-submit" type="submit" class="btn btn-default">Trimite</button></p>
	  </div>
	  </form>
	  </div>
	  </div>
	  <script>
	  function form_validation()
	  {
		var x=  document.getElementById("arhiva_nume").value;
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
		var body = "id=1&name=" + x;
		xmlhttp.open("POST", "scripts/form-validation.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-Length", body.length);
		xmlhttp.setRequestHeader("Connection", "close");
		xmlhttp.send(body);
	 }
	  </script>
	<?php
	}
	
	// LIMITARE 
	
	public function nerezolvate()
	{
	  $this->cap_tabel();
	  //Nerezolvate
	  $query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_concurs` NOT LIKE 'arhiva-educationala'  AND `arhiva_afiseaza` = 1 ORDER BY `arhiva`.`arhiva_grupa` DESC"); $nr=0;
	  while($k=mysql_fetch_array($query))
	  {
		$id=$k["arhiva_id"]; $pc=0; $ok=false; $user_name=$this->user_name;
		if($user_name!=NULL)
		{
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user_name'" );
			/*
			while($k2=mysql_fetch_array($query2))
			{
				if($k2["job_total_points"]==100)
				{
				$ok=true;
				$pc=100;
				break;
				}
				else
				if($k2["job_total_points"]>$pc)
					$pc=$k2["job_total_points"];
			}*/
			if(mysql_num_rows($query2))
				$ok=true;
		}
		if($ok==false)
		{
			$nr++;
			$this->corp_tabel($nr,$k,$pc);
		}
	  }
	  ?>
      </tbody>
    </table>
	</div>
	<?php
	}
	
	public function incercate()
	{
	  $this->cap_tabel();
	  //Incercate
	  $query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_concurs` NOT LIKE 'arhiva-educationala' ORDER BY `arhiva`.`arhiva_grupa` DESC"); $nr=0;
	  while($k=mysql_fetch_array($query))
	  {
		$id=$k["arhiva_id"]; $pc=0; $user=$this->user_name; $ok=false;
		if($user!=NULL)
		{
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user'" );
			while($k2=mysql_fetch_array($query2))
			{
				$ok=true;
				if($k2["job_total_points"]==100)
				{
				$pc=100;
				break;
				}
				else
				if($k2["job_total_points"]>$pc)
					$pc=$k2["job_total_points"];
			}
		}
		if($pc<100 && $ok==true)
		{
		$nr++;
		$this->corp_tabel($nr,$k,$pc);
	  }
	  }
	  ?>
      </tbody>
    </table>
	</div>
	<?php
	}
	
	public function rezolvate()
	{
	  $this->cap_tabel();
	  //REZOLVATE
	  $query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_concurs` NOT LIKE 'arhiva-educationala' ORDER BY `arhiva`.`arhiva_grupa` DESC"); $nr=0;
	  while($k=mysql_fetch_array($query))
	  {
		$id=$k["arhiva_id"]; $pc=0; $user=$this->user_name;
		if($user!=NULL)
		{
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user'" );
			while($k2=mysql_fetch_array($query2))
			{
				if($k2["job_total_points"]==100)
				{
				$pc=100;
				break;
				}
				else
				if($k2["job_total_points"]>$pc)
					$pc=$k2["job_total_points"];
			}
		}
		if($pc==100)
		{
		$nr++;
		$this->corp_tabel($nr,$k,$pc);
	  }
	  }
	  ?>
      </tbody>
    </table>
	</div>
	<?php
	}
	
	public function cele_mai_grele()
	{
	   $this->cap_tabel();
	  //CELE MAI GRELE PROBLEME
	  $query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_concurs` NOT LIKE 'arhiva-educationala' AND `arhiva_afiseaza` = 1 ORDER BY `arhiva_nr_rezolvitori` DESC"); $nr=0;
	  while($k=mysql_fetch_array($query))
	  {
		$id=$k["arhiva_id"]; $pc=0; $user_name=$this->user_name;
		if($user_name!=NULL)
		{
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user_name'" );
			while($k2=mysql_fetch_array($query2))
			{
				if($k2["job_total_points"]==100)
				{
				$pc=100;
				break;
				}
				else
				if($k2["job_total_points"]>$pc)
					$pc=$k2["job_total_points"];
			}
		}
		$nr++;
		$this->corp_tabel($nr,$k,$pc);
	  }
	  ?>
      </tbody>
    </table>
	</div>
	<?php
	}
	
	public function search()
	{
	?>
	<h3> Rezultatele cautarii </h3>
	<hr><br>
	<?php
	$this->cap_tabel();
	  //CAUTA PROBLEME
	  $problem_name=$this->problem_name;
	  $query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_nume` LIKE '%$problem_name%' AND `arhiva_afiseaza` = 1"); $nr=0;
	  while($k=mysql_fetch_array($query))
	  {
		$nr++;
		?> <tr>
		<td> <?php echo $nr; ?></td>
		<td><a href="/arhiva.php?type=view&name=<?php echo $k["arhiva_nume"]; ?>">  <?php echo $k["arhiva_nume"]; ?> </a> </td>
		<td> <a href="/profil.php?user=<?php echo $k["arhiva_autor"]; ?>"> <?php echo $k["arhiva_autor"]; ?> </a> </td>
		<td> <?php echo $k["arhiva_sursa"];?> </td>
		<td> <?php echo $k["arhiva_grupa"]; ?> </td>
		<td> <?php 
		$id=$k["arhiva_id"]; $pc=0;
		$user_name=$this->user_name;
		if($user_name!=NULL)
		{
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user_name'" );
			while($k2=mysql_fetch_array($query2))
			{
				if($k2["job_total_points"]==100)
				{
				$pc=100;
				break;
				}
				else
				if($k2["job_total_points"]>$pc)
					$pc=$k2["job_total_points"];
			}
		}
		echo $pc;
		?> </td>
		</tr>
		<?php
	  }
	  ?>
      </tbody>
    </table>
	</div>
	<?php
	}
	
	public function search_category()
	{
	$name=$this->name;
	?>
	<h3><?php echo $name; ?></h3>
	<p class="help-block"><?php  
	$q=mysql_query("SELECT * FROM `arhiva_categorii` WHERE `arhiva_categorii_nume` LIKE '$name'");
	$k=mysql_fetch_array($q);
	echo $k["arhiva_categorii_descriere"]; 
	?>
	</p>
	<hr><br>
	<?php
	$this->cap_tabel();
	  //CAUTA PROBLEME
	  $name=$this->name;
	  $query=mysql_query("SELECT * FROM `arhiva`"); $nr=0;
	  while($k=mysql_fetch_array($query))
	  {
	    if(strpos($k["arhiva_categorii"],$name)==NULL)
			continue;
		$nr++;
		$id=$k["arhiva_id"]; $pc=0;
		$user_name=$this->user_name;
		if($user_name!=NULL)
		{
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user_name'" );
			while($k2=mysql_fetch_array($query2))
			{
				if($k2["job_total_points"]==100)
				{
				$pc=100;
				break;
				}
				else
				if($k2["job_total_points"]>$pc)
					$pc=$k2["job_total_points"];
			}
		}
		$this->corp_tabel($nr,$k,$pc);
	  }
	  ?>
      </tbody>
    </table>
	</div>
	<?php
	}
	
	public function arhiva_educationala()
	{
	?>
	<h3>Arhiva educatională </h3><hr>

	  <?php
	  $this->cap_tabel();
	  //Arhiva Educationala 
	  $query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_concurs` LIKE 'arhiva-educationala' AND `arhiva_afiseaza` = 1 ORDER BY `arhiva`.`arhiva_grupa` DESC") or die (mysql_error()); $nr=0;
	  while($k=mysql_fetch_array($query))
	  {
		$id=$k["arhiva_id"]; $pc=0; $user_name=$this->user_name;
		if($user_name!=NULL)
		{
			$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user_name'" );
			while($k2=mysql_fetch_array($query2))
			{
				if($k2["job_total_points"]==100)
				{
				$pc=100;
				break;
				}
				else
				if($k2["job_total_points"]>$pc)
					$pc=$k2["job_total_points"];
			}
		}
		$nr++;
		$this->corp_tabel($nr,$k,$pc);
	  }
	  ?>
      </tbody>
    </table>
	</div>
	<?php
	}
	public function is_user_logged()
	{
		if($this->user_name!=NULL)
			return 1;
		else
		{
			?><h3> Trebuie sa fii logat pentru a accesa aceasta pagina </h3> <?php
			return 0;
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
//END CLASS -------------------------------------------------------
$obj=new arhiva;
	?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
	<?php
	if(isset($_GET["type"]) && isset($_GET["name"]))
	{
		$t=secure($_GET["type"]);
		$tt=secure($_GET["name"]);
		echo "IronCoders - ".$tt;
	}
	else
	{ 
	if(isset($_GET["type"]) && secure($_GET["type"])=="arhiva-educationala")
		 echo "IronCoders - Arhivă educatională de probleme";
	else
	{
	?>
	IronCoders - Arhivă de probleme
	<?php }} ?>
	</title>
	<meta name="description" content="Listă cu probleme de informatică date la olimpiade și concursuri școlare sau probleme rezolvate cu scop educațional.">
	<meta name="keywords" content="Informatica,Programare,C++, Probleme Informatica, Cursuri Informatica, Probleme rezolvate, Comunitate IT">
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
  <?php include 'views/header.php'; ?>
  <img style="width:100%; margin-top:-20px;" src="/img/site/programming.png" class="img-responsive" alt="Responsive image">
  <div class="main-body" style="width:90%; margin-left:auto; margin-right:auto; min-height:600px;">
  
  <?php $type=NULL;
  if(isset($_GET["type"]))
	$type=secure($_GET["type"]);
	if($type!="view") 
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
	<?php } ?>
  <?php 
  if(isset($_GET["type"]))
	$type=secure($_GET["type"]);
  else
	$type=NULL;
  if($type=="make") {
  //SCRIE PROBLEMA NOUA !!!!!!!!
  $obj->set_user_name($user_name2);
  $obj->set_user_rang($user_rang2);
	if($obj->is_user_logged())
		$obj->make();
  } 
  if($type==NULL)
	  //FARA TYPE, PAGINA DEFAULT DIN ARHIVA
{  
		?>
		<div>
		 <h3>Arhivă probleme </h3>
		 <?php
		 if(!isset($_GET["type"]))
			{
			$q=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_concurs` NOT LIKE 'arhiva-educationala' AND `arhiva_afiseaza` = 1");
			$nr=mysql_num_rows($q);
			if(isset($_GET["p"]))
				$p=secure($_GET["p"]);
			else
				$p=1;
			$next=$p+1;
			?>
			<ul id="pager" style="float:right; margin-top:-35px; margin-bottom:0px;" class="pager hidden-xs">
			  <li><a href="/arhiva.php?p=<?php if ($p>1) echo $p-1; else echo $p; ?>">Pagina anterioară</a></li>
			  <li><a href="/arhiva.php?p=<?php if ($nr > ($p*50)) echo $next; else echo $p; ?>">Pagina următoare </a></li>
			</ul>
		<?php
			}
		?>
		</div>
		 <hr style="margin-top:30px;">
		 <div class="bs-example bs-example-tabs">
		 <ul id="myTab" class="nav nav-tabs">
			  <li class="active"><a onclick="afiseaza_pager()" href="#home" data-toggle="tab">Toate problemele</a></li>
			  <li class=""><a onclick="sterge_pager()" href="#profile1" data-toggle="tab">Nerezolvate</a></li>
			  <li class=""><a onclick="sterge_pager()" href="#profile2" data-toggle="tab">Încercate</a></li>
			  <li class=""><a onclick="sterge_pager()" href="#profile3" data-toggle="tab">Rezolvate</a></li>
			  
			  <li class="dropdown">
				<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Mai multe opţiuni<b class="caret"></b></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
				  <li><a onclick="sterge_pager()" href="#dropdown1" tabindex="-1" data-toggle="tab">Caută probleme</a></li>
				  <li><a onclick="sterge_pager()" href="#dropdown2" tabindex="-1" data-toggle="tab">Cele mai grele probleme</a></li>
				</ul>
			  </li>
		 </ul>
		<div id="myTabContent" class="tab-content">
		  <div class="tab-pane fade active in" id="home">
		  <?php 
		  $obj->p=$p;
		  $obj->set_user_name($user_name2);
		  $obj->home();
		  ?>
		 </div>
		  
		  <div class="tab-pane fade1" id="profile1">
			  <?php
			   $obj->set_user_name($user_name2);
			   if($obj->is_user_logged())
					$obj->nerezolvate();
			   ?>
		  </div>
		 <div class="tab-pane fade1" id="profile2">
			 <?php 
			  $obj->set_user_name($user_name2);
			  if($obj->is_user_logged())
				 $obj->incercate();
			 ?>
		  </div>
		  <div class="tab-pane fade1" id="profile3">
			  <?php
			  $obj->set_user_name($user_name2);
			  if($obj->is_user_logged())
				  $obj->rezolvate();
			  ?>
		  </div>
		  <div class="tab-pane fade1" id="dropdown1">
		  <div class="col-md-6">
			  <form action="/scripts/arhiva-search.php" role="form" method="post" enctype="multipart/form-data" class="form-inline" role="form">
			  <br>
			  <div class="form-group">
				<label for="inputEmail3" class="control-label">Nume problemă</label>
				<input style="max-width:250px;" type="text" class="form-control" name="search_name" >
				<button type="submit" class="btn btn-default">Caută</button>
			  </div>
			</form>
		 </div>
		   <div class="col-md-6">
			  <form action="/scripts/arhiva-search-cat.php" role="form" method="post" enctype="multipart/form-data" class="form-inline" role="form">
			  <br>
			  <div class="form-group">
				<label for="inputEmail3" class="control-label">Categorie</label>
				<select name="name" class="form-control">
				<?php 
				$query=mysql_query("SELECT * FROM `arhiva_categorii`");
				while($k2=mysql_fetch_array($query))
				{
					?>  <option <?php if(strpos($k["arhiva_categorii"],$k2["arhiva_categorii_nume"])!=NULL) echo "selected"; ?> value="<?php echo $k2["arhiva_categorii_nume"]; ?>"><?php echo $k2["arhiva_categorii_nume"]; ?></option><?php
				}
				?>
				</select>
				<button type="submit" class="btn btn-default">Caută</button>
			  </div>
			</form>
		 </div>
		  </div>
		  <div class="tab-pane fade1" id="dropdown2">
		  <?php
			$obj->set_user_name($user_name2);
			$obj->cele_mai_grele();
		  ?>
		  </div>
		  
		  
		</div>

	  </div>
	  <ul id="pager2" style="float:left;  margin-bottom:0px;" class="pager visible-xs-* hidden-sm hidden-md hidden-lg">
			  <li><a href="/arhiva.php?p=<?php if ($p>1) echo $p-1; else echo $p; ?>">Pagina anterioara</a></li>
			  <li><a href="/arhiva.php?p=<?php if ($nr > ($p*50)) echo $next; else echo $p; ?>">Pagina urmatoare </a></li>
	 </ul>
		<br><br><br>
		
<?php } 
	else if($type=="view")
	{
	//VEDERE PROBLEMA !!!
	if(isset($_GET["name"]))
		$name=secure($_GET["name"]);
	else
		$name=NULL;
	$query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_nume` LIKE '$name'");
	if(mysql_num_rows($query))
	{
	$k=mysql_fetch_array($query);
	if($k["arhiva_afiseaza"]==0 && $user_rang2<=2) {
	?> <h3>Nu există nicio problemă cu acest nume </h3> <?php
	}
	else
	{
	$id=$k["arhiva_id"]; $pc=0; $ok=true;
	if($user_name!=NULL)
	{
		$query2=mysql_query("SELECT * FROM `jobs` WHERE `job_problem_id` = '$id' AND `job_owner`= '$user_name' ORDER BY `job_id` DESC" );
		while($k2=mysql_fetch_array($query2))
		{
			if($ok==true)
			{
				$teste=$k2["job_tests_points"];
				$ok=false;
				$pc_first=$k2["job_total_points"];
			}
			if($k2["job_total_points"]==100)
			{
				$pc=100;
				break;
			}
			else
				if($k2["job_total_points"]>$pc)
					$pc=$k2["job_total_points"];
		 }
	}
	?>
	<div class="row">
	<div class="col-md-2">
	<table style="margin-top:25px; background-color:white;" class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>Meniu</th>
        </tr>
      </thead>
      <tbody>
	    <tr>
          <td><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> <a href="/monitor.php?type=search-3&name=<?php echo $name; ?>">Toate soluțiile</a></td>
        </tr>
		<tr>
          <td><span class="glyphicon glyphicon-file" aria-hidden="true"></span> <a href="/monitor.php?type=search-1&name=<?php echo $name; ?>">Soluţii trimise de tine</a></td>
        </tr>
		<?php if($user_rang2>=3) { ?>
		<tr>
          <td><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> <a href="/arhiva.php?type=edit&name=<?php echo $name; ?>">Editează problema</td>
        </tr>
		<?php } ?>
	<?php
	if($pc_first<100 && $ok==false)
	{
	$teste=explode("#",$teste);
	for($i=0; $i<count($teste); $i++)
	{
		if($teste[$i]==0)
			{
				break;
			}
	}
	$path="/evaluator/arhiva/".$name."/tests/";
	$in=$path.$i.".in";
	if(file_exists($path.$i.".out"))
		$out=$path.$i.".out";
	else
		$out=$path.$i.".ok";
	?>
	<tr>
      <td><a href="<?php echo $in; ?>" download><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Primul test greşit (input)</a></td>
    </tr>
	<tr>
      <td><a href="<?php echo $out; ?>" download><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Primul test greşit (output)</a></td>
    </tr>
	
	
	<?php } ?>
		<tr>
          <td><span class="glyphicon glyphicon-play" aria-hidden="true"></span> <a href="/ide.php?name=<?php echo $k["arhiva_nume"]; ?>">Compilator online</td>
        </tr>
		<tr>
          <td><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <a href="/forum/viewtopic.php?f=19&t=124">Ajutor</a></td>
        </tr>
      </tbody>
    </table>
	<span class="hidden-xs hidden-sm">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Vertical Banner Ad -->
	<ins class="adsbygoogle"
		 style="display:inline-block;width:160px;height:600px"
		 data-ad-client="ca-pub-1717789082819636"
		 data-ad-slot="3182488700"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	</span>
	</div>
	<div class="col-md-10">
			<div style="background-color: white; border: 1px solid #ccc; margin-top:20px;"  class="row">
			<div class="col-md-5 col-xs-6">
				<h3> <?php echo $k["arhiva_nume"]; ?> </h3>
				<dl class="dl-horizontal">
				<dt > Adăugată de : </dt>
				<dd style="margin-top:5px;"><a href="/profil.php?user=<?php echo $k["arhiva_adaugat_de"]; ?>"> <?php echo $k["arhiva_adaugat_de"]; ?> </a></dd>
				<dt style="margin-top:5px;"> Sursă : </dt>
				<dd style="margin-top:5px;"> <?php echo $k["arhiva_sursa"];?> </dd>
				<dt style="margin-top:5px;"> Autor : </dt>
				<dd style="margin-top:5px;"> <?php echo $k["arhiva_autor"];?> </dd>
				<dt style="margin-top:5px;"> Grupă : </dt>
				<dd style="margin-top:5px;"> <?php echo $k["arhiva_grupa"]; ?> </dd>
				<dt style="margin-top:5px;"> Punctaj : </dt>
				<dd style="margin-top:5px;"><?php echo $pc." pc"; ?></dd>
				</dl>
			</div>
			<div class="col-md-2 hidden-xs hidden-sm">
			<img style="margin-top:15px;" src="/img/site/icon_programming.png" class="img-responsive" >
			</div>
			<div class="col-md-5 col-xs-6">
				<dl class="dl-horizontal">
				<h3>Restricţii</h3>
				  <dt>Citire / Scriere : </dt>
				  <a href=""><dd>stdin</a>, <a href="">stdout</dd></a>
				  <dt style="margin-top:5px;" >Limită timp :</dt>
				  <a href=""><dd style="margin-top:5px;"  ><?php echo $k["arhiva_timp"]; ?> </a> ms </dd>
				  <dt style="margin-top:5px;" >Limită memorie :</dt>
				  <a href=""><dd style="margin-top:5px;" ><?php echo $k["arhiva_memorie"]; ?> </a> kbytes </dd>
				</dl>
			</div>
			</div>
	 <div style="margin-left:5px; margin-top:15px;">
	 <div style="width:100%; overflow-x: auto;">
		 <?php echo $k["arhiva_cerinta"]; ?>
	</div>
		 <hr>
		 <form action="/scripts/arhiva-solve.php?arhiva_nume=<?php echo $k["arhiva_nume"];?>&arhiva_id=<?php echo $k["arhiva_id"]?>" method="post" enctype="multipart/form-data" role="form" >
		 
		 <div class="row">
		 <h3 style="margin-left:12px;"> Trimite o solutie</h3>
		 <div class="col-md-4 col-xs-12">
		  <label for="exampleInputEmail1"></label>
			<input name="file" type="file" id="exampleInputFile">
			<p class="help-block">Format: cpp şi c </p>
		 </div>
		 <div class="col-md-3 col-xs-6">
			  <select name="job_contest" class="form-control">
			<option  selected value="Arhiva<?php if($k["arhiva_concurs"]=="arhiva-educationala") echo" educatională"; ?>">Arhivă<?php if($k["arhiva_concurs"]=="arhiva-educationala") echo" educatională"; ?></option>
			 
			  <?php
			  $str="In desfasurare";
			  $query2=mysql_query("SELECT * FROM `competitii` WHERE `competitii_status` LIKE '$str'");
			  while($k2=mysql_fetch_array($query2))
			  {
				$str=explode(",",$k2["competitii_probleme"]);
				for($i=0; $i<count($str); $i++)
				{
					if($str[$i]==$k["arhiva_nume"])
					{
					?>  <option value="<?php echo $k2["competitii_nume"];?>"><?php echo $k2["competitii_nume"];?></option><?php
						 break;
					}
				}
			  }
			  
			  $query2=mysql_query("SELECT * FROM `clase`");
			  while($k2=mysql_fetch_array($query2))
			  {
				$ok2=false;
				$str=explode(",",$k2["clase_probleme"]);
				for($i=0; $i<count($str); $i++)
				{

					if( $str[$i]==$k["arhiva_nume"] && ($k2["arhiva_public"]==1 || strpos($k2["clase_utilizatori"],$user_name2)))
					{
					?>  <option value="<?php echo "Clasa : ".$k2["clase_titlu"];?>"><?php echo "Clasa : ".$k2["clase_titlu"];?></option><?php
						 break;
					}
				}
			  }
			  ?>
			  </select>
			  <p class="help-block">Selectează runda</p>
		 </div>
		 <div class="col-md-4 col-xs-6">
			 <button style="float:right;" <?php if($user_name2==NULL) echo "disabled"; ?> type="submit" class="btn btn-default" id="arhiva_evalueaza_buton" data-loading-text="Se evaluează..." >Evaluează <span class="glyphicon glyphicon-send" aria-hidden="true"></span></button> 
			 <?php if($user_name2==NULL) { ?>
			 <p class="help-block">Trebuie să fii logat pentru a trimite surse </p> 
			 <?php } ?>
			 <script>
			 $(document).ready(function(){
				$('#arhiva_evalueaza_buton').click(function () {
				var btn = $(this)
				btn.button('loading')
			  });
			  });
			</script>
		 </div>
		 </div>
		 </form> 
		 <hr>
		<h3> Indicații rezolvare </h3>

		<div style="background-color: white; border: 1px solid #ccc; padding:10px; margin-top:5px;">
		<?php $categorii=explode(",",$k["arhiva_categorii"]); 
		for($i=1; $i<count($categorii); $i++)
			{
			  ?><a href="/arhiva.php?type=search_category&name=<?php echo str_replace(" ", "+",$categorii[$i]); ?>"><?php echo $categorii[$i]; ?></a><?php
			  if($i<count($categorii)-1)
				echo ", ";
			}
		if(count($categorii)==1)
		{
		?>
			<p> Nu există indicații de rezolvare </p>
		<?php
		}
		?>
		</div>
		<br><hr>
		<h3> Comentarii </h3>
		<?php
			$topicApi = file_get_contents('http://tst.ironcoders.com/scripts/ClassMongoExport.php?type=getNodeBBTopicContent&title='.urlencode($k["arhiva_nume"]));
			$topicApi = json_decode($topicApi);
			$posts = $topicApi->posts;
		
		?>
		<p class="help-block"> Adauga un comentariu: <a href="http://forum.ironcoders.com/topic/<?php echo $topicApi->slug;?>">Click</a> ! </p> 
		<style>
		.comentariu-header
		{
			background-color: #f5f5f5; 
			border: 1px solid #ccc;
			padding: .2em;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			font-size:17px;
		}
		.comentariu-body
		{
			margin-left:8px; 
			margin-top:3px; 
			font-family: 'Open Sans', sans-serif;
			font-weight: lighter;
			font-size:18px;
		}
		</style>
		<?php 
		foreach($posts as $k3)
		{
			?>
			<div style="background-color:white" class="comentariu-header">
			<a style="margin:4px;" href="http://tst.ironcoders.com/profil.php?user=<?php echo $k3->user->username; ?>"><?php echo $k3->user->username;
			?></a></div>
			<div class="comentariu-body">
			<?php
			echo $k3->content;
			?></div><br><?php
		}
		?>

		<style>
		.emoji
		{
			height:20px;
			width:20px;
		}
		</style>
	 </div>
	</div>
	</div>
	<?php }
	}
	else 
	{
	?>
	<h3> Nu există nicio problemă cu acest nume </h3>
	<?php
	}
	
	} 
	if($type=="search_category") 
	{
		$obj->set_user_name($user_name2);
		$obj->name=secure($_GET["name"]);
		$obj->search_category();
	}
	if($type=="arhiva-educationala") 
	{ 
		?>
		<div class="tab-pane fade1" id="profile3">
		<?php
		$obj->set_user_name($user_name2);
		$obj->arhiva_educationala();
		?>
		</div>
	<?php }
	if($type=="search")
	{
		$problem_name=NULL;
		if(isset($_GET["name"]))
			$problem_name=secure($_GET["name"]);
		$obj->problem_name=$problem_name;
		$obj->set_user_name($user_name2);
		$obj->search();
	    ?>
</div>
		<?php
	}
	if($type=="edit")//TO DO
	{
		if($user_name!=null)
		{
			mysql_select_db("ironcoders_forum") or die ("Unable to select database!". mysql_error());
			$query=mysql_query("SELECT * FROM `phpbb_users` WHERE `username_clean` LIKE '$user_name'");
			$k=mysql_fetch_array($query);
			mysql_select_db("ironcoders") or die ("Unable to select database!". mysql_error());
		}
		if($user_name!=NULL && $k["user_rang"]>=3)
		{
		$problem_name=NULL;
		if(isset($_GET["name"]))
			$problem_name=secure($_GET["name"]);
		$query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_nume` LIKE '$problem_name'");
		$k=mysql_fetch_array($query);
		?>
		<h3>Editare problema <a href="arhiva.php?type=view&name=<?php echo $problem_name;?>"><?php echo $problem_name ?></a></h3>
		<form action="/scripts/arhiva-edit.php?type=1&arhiva_id=<?php echo $k["arhiva_id"]; ?>&arhiva_nume=<?php echo $k["arhiva_nume"];?>" method="post" enctype="multipart/form-data" role="form">
		<br><br>
		<div class="row">
			<div class="col-md-6"> 
				<label for="exampleInputEmail1">Limită timp ( ms )</label>
				<input name="arhiva_timp" class="form-control" value="<?php echo $k["arhiva_timp"];?>">
			</div>
			<div class="col-md-6"> 
				<label for="exampleInputEmail1">Limită memorie ( kbytes )</label>
				<input name="arhiva_memorie" class="form-control"  value="<?php echo $k["arhiva_memorie"];?>">
			</div>
			
			<div style="margin-top:15px;" class="col-md-12 col-xs-12">
				 <label style="">Cerință problemă</label>
				  <textarea name="arhiva_cerinta"id="editor1" rows="10" cols="80">
				   <?php echo $k["arhiva_cerinta"];?>
				  </textarea>
				  <script>
				  // Replace the <textarea id="editor1"> with a CKEditor
				  // instance, using default configuration.
				  CKEDITOR.replace( 'editor1' );
				  </script>
			</div>
			<div style="margin-top:15px;" class="col-md-6 col-xs-6"> 
				<label for="exampleInputEmail1">Autor:</label>
				<input name="arhiva_autor" class="form-control" id="exampleInputEmail1" value="<?php echo $k["arhiva_autor"];?>">
			</div>
			
			<div style="margin-top:15px;" class="col-md-6 col-xs-6"> 
				<label for="exampleInputEmail1">Sursă:</label>
				<input name="arhiva_sursa" class="form-control" id="exampleInputEmail1" value="<?php echo $k["arhiva_sursa"];?>">
			</div>
			
			<div style="margin-top:15px;" class="col-md-6 col-xs-6"> 
				<label for="exampleInputEmail1">Grupă</label>
			  <select name="arhiva_grupa" class="form-control">
				  <option <?php if($k["arhiva_grupa"] =="Mica") echo "selected"; ?> >Mică</option>
				  <option <?php if($k["arhiva_grupa"] =="Medie") echo "selected"; ?>>Medie</option>
				  <option <?php if($k["arhiva_grupa"] =="Mare") echo "selected"; ?>>Mare</option>
				  <option <?php if($k["arhiva_grupa"] =="Toate") echo "selected"; ?>>Toate</option>
			  </select>
			</div>
			
			<div style="margin-top:15px;" class="col-md-6 col-xs-6"> 
			<label for="exampleInputFile">Categorii:</label>
			<select name="arhiva_categorii[]" multiple class="form-control">
			<?php 
			$query=mysql_query("SELECT * FROM `arhiva_categorii`");
			while($k2=mysql_fetch_array($query))
			{
				?>  <option <?php if(strpos($k["arhiva_categorii"],$k2["arhiva_categorii_nume"])!=NULL) echo "selected"; ?> value="<?php echo $k2["arhiva_categorii_nume"]; ?>"><?php echo $k2["arhiva_categorii_nume"]; ?></option><?php
			}
			?>
			</select>
			</div>
			<div style="margin-top:-30px;" class="col-md-6">
			<label  for="text">Arhivă educatională: </label>
			<input <?php if($k["arhiva_concurs"]=="arhiva-educationala") echo "checked"; ?> value="arhiva-educationala" name="arhiva_concurs" type="checkbox" id="inlineCheckbox1" value="option1">
			
			<br>
			  <label  for="text">Afișare în lista de probleme: </label>
			  <input <?php if($k["arhiva_afiseaza"]==1) echo "checked"; ?> name="arhiva_afiseaza2" value="1" type="checkbox">
			</div>
		</div>
		<br>
		<button type="submit" class="btn btn-default">Editează</button>
		</form>
		<hr>
		<h3> Editare teste </h3>
		<table style="" class="table table-hover table-condensed table-bordered">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Nume</th>
			  <th>Redenumește</th>
			  <th>Operații</th>
			</tr>
		  </thead>
		  <tbody>
		<?php
		$cale= ROOT."evaluator/arhiva/".$problem_name."/tests";
		$tests = scandir($cale); $i=0;
		if(isset($_GET["name"]))
			$problem_name=secure($_GET["name"]);
		else
			$problem_name=NULL;
		foreach($tests as $k)
		{
			$ext=explode(".",$k);
			if($k[0]!='.')
			{
			 ?>
			<tr>
			  <td><?php echo $i; ?></td>
			  <td><?php echo $k ?></td>
			  <td>
				<form style="margin-bottom:0px;" action="/scripts/arhiva-edit.php?type=2&arhiva_nume=<?php echo $problem_name; ?>&name=<?php echo $k; ?>" role="form" method="post" enctype="multipart/form-data" class="form-inline" role="form">
				<input placeholder="Nume nou" style="max-width:250px;" type="text" class="form-control" name="test_new_name" >
				<button  type="submit" class="btn btn-default">Modifică</button>
				</form>
			  </td>
			  <td><a href="/scripts/arhiva-edit.php?type=3&name=<?php echo $k; ?>&arhiva_nume=<?php echo $problem_name; ?>">Șterge </a> / <a href="<?php echo "/evaluator/arhiva/".$problem_name."/tests/".$k ?>" download="<?php echo $k; ?>">Descarcă</a> </td>
			</tr>
			 <?php 
			 $i++;
			}
		}
			?>
		</tbody>
		</table>
		<br>
		<form action="/scripts/arhiva-edit.php?type=4&arhiva_nume=<?php echo $problem_name; ?>" method="post" enctype="multipart/form-data" role="form">
			<h3 for="exampleInputFile">Încarcă teste</h3>
			<hr>
			<input name="upload[]" type="file" multiple="multiple" type="file" id="exampleInputFile">
			<p class="help-block">Testele sunt de forma  "0.in", "0.ok", "1.in", "1.ok"...etc<br>
			Dacă testele deja există ele vor fi înlocuite.
			</p>
			<button type="submit" class="btn btn-default">Trimite</button>
		</form>
		<hr>
		<h3> Editează scriptul de testare </h3>
<?php
$file=ROOT.'evaluator/arhiva/'.$problem_name.'/is_test_ok.php';
if(file_exists($file))
{
	$fisier=file_get_contents($file);
	echo "<p class=\"help-block\">Este activat</p>";
}
else
{
   $fisier=file_get_contents(ROOT."evaluator/is_test_ok_default.php");
   echo "<p class=\"help-block\">Nu este activat</p>";
}

?>
<pre style="min-height:500px;" id="editor">
<?php
echo htmlspecialchars($fisier);
?>
</pre> 
<button onclick="editeaza_script_corectare()" id="trimite-script" type="submit" class="btn btn-default">Trimite</button> 
<a href="scripts/arhiva-edit.php?type=6&arhiva_nume=<?php echo $problem_name; ?>"> <button type="submit" class="btn btn-default">Sterge</button> 
<br><br>
	<?php
		}
		else
		{?>
		<h3> Nu ai suficiente permisiuni pentru a accesa această pagină ! </h3>
		<?php }
	}
	?>
	</div>
  <?php include 'views/footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
 <script>
 function afiseaza_pager()
 {
	link = document.getElementById('pager');
	link.style.display = 'block';
	
	link = document.getElementById('pager2');
	link.style.display = 'block';
 }
 function sterge_pager()
 {
	link = document.getElementById('pager');
	link.style.display = 'none';
	
	link = document.getElementById('pager2');
	link.style.display = 'none';
 }
 </script>
 <script src="/ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
 <script>
	var editor = ace.edit("editor");
	editor.setTheme("ace/theme/twilight");
	editor.getSession().setMode("ace/mode/php");
	editor.setShowPrintMargin(false);
	document.getElementById('editor').style.fontSize='14px';
 </script>
 <script>
 function getURLParameter(name) {
    return decodeURI(
        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
    );
}

 function editeaza_script_corectare() {
    document.getElementById("trimite-script").innerHTML = "In progres...";
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
		document.getElementById("trimite-script").innerHTML = "Trimite";
		}
	} 
	var body = "type=5" + "&script="+ encodeURIComponent(editor.getValue())+"&arhiva_nume="+getURLParameter("name");
	xmlhttp.open("POST", "scripts/arhiva-edit.php", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.send(body);
	

}
 </script>
</html>