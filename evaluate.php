<?php
	require_once('scripts/config.php');
	require ROOT."scripts/user_name.php";
	require_once('scripts/secure.php');
	$id=NULL;
	if(isset($_GET["id"]))
		$id=secure($_GET["id"]);
	?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IronCoder Home Page</title>
	<link href="css/stylesheet.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javascript" src="evaluator/syntax/scripts/shCore.js"></script>
	<script type="text/javascript" src="evaluator/syntax/scripts/shBrushCpp.js"></script>
	<link type="text/css" rel="stylesheet" href="evaluator/syntax/styles/shCoreDefault.css"/>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
	<script type="text/javascript">SyntaxHighlighter.all();</script>
	<link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
  </head>
  <body>
<?php include 'views/header.php'; ?>
<iframe src="http://files.bannersnack.com/iframe/embed.html?hash=bu8y7yqi7&userId=15389836&bgcolor=%233D3D3D&wmode=opaque&t=1413013286" width="180" height="150" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
<img style="margin-top:-20px;" src="../img/site/code.png" class="img-responsive" alt="Responsive image">
<div style="width:all; height:3px; background-color:#e7e7e7;"> </div>
<div class="main-body" style="width:80%; margin-left:auto; margin-right:auto">
<div style="min-height:700px;" class="main-body" style="width:80%; margin-left:auto; margin-right:auto">
<?php 
if($id!=NULL) {  ?>
<table class="table">
      <thead>
        <tr>
          <th>Stare</th>
		  <th>Timp </th>
		  <th>Memorie </th>
        </tr>
      </thead>
      <tbody>
        <tr class="info">
		 <td> <?php
		 $query=mysql_query("SELECT * FROM `evaluate_results` WHERE `id` = '$id'");
		 $data=mysql_fetch_array($query);
		 echo $data["status"];
		 ?>  </td>
		 <td> <?php echo $data["time"]." ms";?></td>
		 <td> <?php echo (int)$data["memory"]. " kb";?></td>
        </tr>
 
      </tbody>
</table>
<?php 
$fis=ROOT.'evaluator/sources/'.$id;
$text=file_get_contents($fis.".error"); 
$text=str_replace($fis.".cpp:","<br>",$text);
$text=ltrim($text); 
if($text!=NULL) { 
?>
<table class="table">
      <thead>
        <tr>
          <th>Erori</th>
        </tr>
      </thead>
      <tbody>
        <tr class="warning">
		 <td>
		 <?php
		 $text[0]=NULL; $text[1]=NULL; $text[2]=NULL; $text[3]=NULL; $text[4]=NULL; 
		 if($text[5]==':')
			$text[5]=NULL;
		 echo $text;
		 ?>  </td>
        </tr>
      </tbody>
</table>
<?php } ?>
<div class="row">
	<div  class="col-md-6">
	<?php
	echo "\n";
	$fis=$id.".cpp";
    $text=file_get_contents(ROOT.'evaluator/sources/'.$fis); 
	$text=ltrim($text); 
	?>	<pre class="brush: cpp; tab-size: 4;"> <?php
	echo htmlspecialchars ($text);
	?>
	</pre>
	</div>
	
	<div class="col-md-6">
		<label  for="exampleInputFile">Date de intrare ( stdin ):</label>
		<textarea class="form-control" rows="5"> <?php
		$fis=$id.".in";
	    echo file_get_contents(ROOT.'evaluator/sources/'.$fis);  ?></textarea>
	</div>
	<br>
	<div style="float:right;" class="col-md-6">
		<label  for="exampleInputFile">Date de iesire ( stdout ):</label>
		<?php echo ""; ?>
		<textarea class="form-control" rows="5"> <?php
		echo "";
		$fis=$id.".out";
	    echo file_get_contents(ROOT.'evaluator/sources/'.$fis);  ?></textarea>
	</div>

</div>
<br><hr>
<?php } ?>
<form action="/scripts/evaluate-upload.php" role="form" method="post" enctype="multipart/form-data">
<br>
<div class="row">
<?php if($id!=NULL) {  ?>
<h3 > Evalueaza alta sursa </h3> <br>
<? } ?>
	<div class="col-md-6">
		<div class="form-group">
		<label for="exampleInputFile">Alege sursa</label>
		<br>
		<input name="file" type="file" id="exampleInputFile">
		<p class="help-block">Extensie : cpp , c ,pas .</p>
		<p class="help-block">c si pas in curand.</p>
		</div>
	</div>
	<div class="col-md-6">
	<label  for="exampleInputFile">Date de intrare:</label>
	<br>
	<textarea name="evaluate_input" class="form-control" rows="7"></textarea>
	</div>
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>
</div>
<?php include 'views/footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>