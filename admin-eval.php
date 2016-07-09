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
		  <h3> Evaluator </h3> <hr> 
		  <div style="background-color: white; border: 1px solid #ccc; margin:20px; padding:20px;">
			  <h4> Evaluare noua </h4>
			  <form action="/scripts/admin-eval-solve.php" method="post" enctype="multipart/form-data" role="form">
			  <div class="row">
			   
			   <div class="col-md-6">
			      <label for="text">Descriere job</label>
				  <input name="ajob_descriere" type="text" class="form-control" placeholder="descriere">
				    
				  <label for="text">Nume fisier input/output</label>
				  <input name="fisier" type="text" class="form-control" placeholder="Nume"><br>
				  
				  <label for="text">Limită timp</label>
				  <input name="timp" type="text" class="form-control" placeholder="ms"><br>
					  
				  <label for="text">Limită memorie</label>
				  <input  name="memorie" type="text" class="form-control" placeholder="kbytes"><br>
					  
			  </div>
			  <div class="col-md-6">				  
				  <div class="form-group">
					<label for="exampleInputFile">Teste</label>
					<input name="upload-teste[]" type="file" multiple="multiple" type="file" id="exampleInputFile">
					<p class="help-block">Testele sunt de forma "0.in", "0.ok", "1.in", "1.ok"...etc</p>
				 </div>
				 
				  <div class="form-group">
					<label for="exampleInputFile">Surse</label>
					<input name="upload-surse[]" type="file" multiple="multiple" type="file" id="exampleInputFile">
					<p class="help-block">Extensia .c sau .cpp</p>
				 </div>
				 
				 <div class="form-group">
					<label for="exampleInputFile">Evaluator php</label>
					<input name="upload-evaluator" type="file" multiple="multiple" type="file" id="exampleInputFile">
					<p class="help-block">Extensia .php</p>
				 </div>
				 
				 <div class="form-group">
					<label for="exampleInputFile">Rezultat partial</label>
					<input name="upload-partial" type="file" multiple="multiple" type="file" id="exampleInputFile">
					<p class="help-block">Extensia .php</p>
				 </div>
				  
			  </div>
			  <div style="margin-top:20px; margin-bottom:-25px;" class="col-md-12">
				<p style="text-align:center"><button id="form-submit" type="submit" class="btn btn-default" id="buton-evalueaza" data-loading-text="Se evaluează...">Trimite</button></p>
			  </div>
			  </form>
			  </div>
			</div>
			<br>
			<div style="background-color: white; border: 1px solid #ccc; margin:20px; padding:20px;">
			<h4> Ultimele evaluari efectuate </h4>
			<table class="table table-bordered table-hover table-stripped">
				<thead>
				<tr>
				   <th>#</th>
				   <th>Descriere</th>
				   <th>Detalii</th>
				</tr>
			   </thead>
			   <tbody>
			<?php
				$query=mysql_query("SELECT * FROM `ajobs` ORDER BY `ajobs`.`nr` DESC") or die(mysql_error());
				$vec[501]; $nr=0;
				while($k=mysql_fetch_array($query))
				{
				if($vec[$k["ajob_id"]]==0)
				{
					$nr++;
					$vec[$k["ajob_id"]]=1;
					  ?>
						<tr>
						  <th scope="row"><?php echo $nr;?></th>
						  <td><?php echo $k["ajob_descriere"];?></td>
						  <td><a href="/admin-eval.php?type=view&id=<?php echo $k["ajob_id"];?>">Click</a></td>
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
		public function make()
		{

		}
		
		public function edit()
		{
			
		}
		
		public function view()
		{
		?>
		<h3>Raportul evaluării</h3>
		<hr>
		<div class="table-responsive">
		  <table class="table table-striped table-bordered">
		  <thead>
		  <tr>
			  <th>#</th>
			  <th>Numele sursei</th>
			  <th>Limbaj</th>
			  <th>Punctaj</th>
			  <th>Detalii evaluare</th>
			</tr>
		  </thead>
		  <tbody>
		 <?php
		 if(isset($_GET["id"]))
			$job_id=secure($_GET["id"]);
		 else
			$job_id=NULL;
			
		 $query=mysql_query("SELECT * FROM `ajobs` WHERE `ajob_id` = '$job_id' ORDER BY `ajobs`.`ajob_total_points` DESC");
		 $nr=0;
		 while($k=mysql_fetch_array($query))
		 {
			$nr++;
		 ?>
			<tr>
				<td><b><?php echo $nr; ?></b></td>
				<td><?php echo $k["ajob_name"];?></td>
				<td><?php echo $k["ajob_language"];?></td>
				<td><?php echo $k["ajob_total_points"];?></td>
				<td><a href="/monitor.php?type=view-admin-eval&id=<?php echo $k["nr"];?>">Click</a></td>
			</tr>
		 <?php
		 }
		 ?>
		 </table>
		 </div>
		 <?php
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
	
    <title>IronCoders - Evaluator pentru concursuri</title>
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
	$obj->set_user_name($user_name2);
	$obj->set_user_rang($user_rang2);
	if($user_name2)
		$obj->make();
	else
	{
	?>
	<h3> </h3>
	<?php
	}
}
if($type==NULL)
{
	$obj->set_user_name($user_name2);
	$obj->set_user_rang($user_rang2);
	if($user_rang2>=5)
		$obj->home();
	else
	{
	?><h3> Nu ai suficiente permisiuni pentru a accesa pagina </h3>
	<?php
	}
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
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>

</body>
</html>