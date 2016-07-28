<?php
require "scripts/config.php";
require ROOT."scripts/user_name.php";
$user_name2=$user_name;
$user_id2=$user_id;

$user=$_GET["user"]; 
$url =  'http://forum.ironcoders.com/user/'.$user;
header('Location: '.$url);


if(isset($_GET["p"]))
	$p=secure($_GET["p"]);
else
	$p=1;
		
require "scripts/secure.php";
class profil
{
	private $user_name;
	public function vedere ()
	{
		$user=$_GET["user"]; $user=secure($user); mysql_select_db("ironcoders_forum");
		
		$query=mysql_query("SELECT * FROM `phpbb_users` WHERE `username` LIKE '$user'");

		if(mysql_num_rows($query)==0)
		{
			?> <h3> Nu a fost gasit nici un utilizator cu acest nume </h3> 
			<?php
		}
		else
		{
			$k=mysql_fetch_array($query); $id=$k["user_id"];
			
			$query=mysql_query("SELECT * FROM `phpbb_profile_fields_data` WHERE `user_id` = '$id'");
			$k2=mysql_fetch_array($query);
			?>
			<div style="background-color: white; border: 1px solid #ccc; margin:20px; padding:20px;">
				<div class="row">
					<div class="col-md-2">
						<?php
						if(file_exists(ROOT."/forum/download/file.php?avatar=".$k["user_avatar"]))
						{
							?><img src="/forum/download/file.php?avatar=<?php echo $k["user_avatar"]; ?>" class="img-responsive" alt="Profil utilizator"><?php
						}
						else
						{
							?><img style="max-height:120px; max-width:120px;" src="/images/site/default_avatar.jpg" class="img-responsive" alt="Profil utilizator"><?php 
						}
							
						?>
					</div>
					<div class="col-md-7 col-xs-7">
						<h4><?php echo $k["username"]; ?></h4>
						<p class="help-block"><?php echo $k2["pf_descriere"]; ?></p>
					</div>
					<div style="margin-top:10px;" class="col-md-3 col-xs-3">
						<p style="text-align:right; margin-right:10px;" >Locație: <b><?php echo $k2["pf_locatie"]; ?></b></p>
						<p style="text-align:right; margin-right:10px;">Studii: <b><?php echo $k2["pf_studii"]; ?> </b> </p>
					</div>

				</div>
			</div>
			<br>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li class="active"><a href="#home" role="tab" data-toggle="tab">Probleme rezolvate</a></li>
			  <li><a href="#profile" role="tab" data-toggle="tab">Probleme încercate</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active" id="home">
			  <?php $this->rezolvate(); ?>
			  </div>
			  <div class="tab-pane" id="profile">
			    <?php $this->incercate(); ?>
			  </div>
			</div>
		<?php
		}
	}
	public function rezolvate()
	{ ?>
	<div class="table-responsive">
					<table class="table table-striped table-bordered">
				  <thead>
				  <tr>
					  <th>#</th>
					  <th>Titlu</th>
					  <th>Autor</th>
					  <th>Sursa</th>
					  <th>Grupa</th>
					  <th>Scorul tau</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php
				  //REZOLVATE
				  mysql_select_db("ironcoders");
				  $query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_afiseaza` = 1 ORDER BY `arhiva`.`arhiva_grupa` DESC"); $nr=0;
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
					?> <tr>
					<td> <?php echo $nr ?></td>
					<td><a href="/arhiva/<?php echo str_replace(" ", "+", $k["arhiva_nume"]); ?>">  <?php echo $k["arhiva_nume"]; ?> </a> </td>
					<td> <a href="#"> <?php echo $k["arhiva_autor"]; ?> </a> </td>
					<td> <?php echo $k["arhiva_sursa"];?> </td>
					<td> <?php echo $k["arhiva_grupa"]; ?> </td>
					<td> <?php echo $pc;?> </td>
					</tr>
					<?php
				  }
				  }
				  ?>
				  </tbody>
				</table>
				</div>
				
	<?php }
	
	public function incercate()
	{
	?>
	<div class="table-responsive">
       <table class="table table-striped table-bordered">
      <thead>
	  <tr>
          <th>#</th>
          <th>Titlu</th>
          <th>Autor</th>
          <th>Sursa</th>
          <th>Grupa</th>
          <th>Scorul tau</th>
        </tr>
      </thead>
	  <tbody>
	  <?php
	  //Incercate
	  $query=mysql_query("SELECT * FROM `arhiva` WHERE `arhiva_afiseaza` = 1 ORDER BY `arhiva`.`arhiva_grupa` DESC"); $nr=0; 
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
		?> <tr>
		<td> <?php echo $nr; ?></td>
		<td><a href="/arhiva/<?php echo str_replace(" ", "+", $k["arhiva_nume"]); ?>">  <?php echo $k["arhiva_nume"]; ?> </a> </td>
		<td> <a href="#"> <?php echo $k["arhiva_autor"]; ?> </a> </td>
		<td> <?php echo $k["arhiva_sursa"];?> </td>
		<td> <?php echo $k["arhiva_grupa"]; ?> </td>
		<td> <?php echo $pc;
		?> </td>
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
	
	public function set_user_name($user)
	{
		$this->user_name=$user;
	}

}
$obj = new profil; 
$obj->set_user_name(secure($_GET["user"]));
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IronCoders - <?php 
		if(isset($_GET["user"]))
			echo secure($_GET["user"]);
		?>
		</title>
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
	<div class="main-body" style="width:90%; margin-left:auto; margin-right:auto; min-height:600px;">
	<?php $obj->vedere(); ?>
	</div>
    <?php include 'views/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>