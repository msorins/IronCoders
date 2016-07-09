<?php
	require_once('login/config/config.php');
	require_once('login/translations/en.php');
	require_once('login/libraries/PHPMailer.php');
	require_once('login/classes/Login.php');
	$login = new Login();
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
	<script type="evaluator/syntax/text/javascript">SyntaxHighlighter.all();</script>
  </head>
  <body>
<?php include 'views/header.php'; ?>
<img style="margin-top:-20px;" src="../img/site/code.png" class="img-responsive" alt="Responsive image">
<div style="width:all; height:3px; background-color:#e7e7e7;"> </div>
<div class="main-body" style="width:80%; margin-left:auto; margin-right:auto">
<div style="min-height:700px;" class="main-body" style="width:80%; margin-left:auto; margin-right:auto">
<?php 
if(isset($_GET['type'])==2) {  ?>
<table class="table">
      <thead>
        <tr>
          <th>Informatii Evaluator</th>
        </tr>
      </thead>
      <tbody>
        <tr class="info">
		 <td> <?php  echo $_GET['evaluator'] ?>  </td>
        </tr>
 
      </tbody>
    </table>
<div class="row">
	<div class="col-md-6">
	<pre class="brush: cpp;">
	<?php
	$fis=$_GET["id"].".cpp";
    $text=file_get_contents('/var/zpanel/hostdata/zadmin/public_html/ironcoders_com/evaluator/sources/'.$fis);  
	?>
	</pre>
	</div>
	
	<div class="col-md-6">
		<label  for="exampleInputFile">Output rezultat:</label>
		<textarea class="form-control" rows="5"> <?php
		$fis=$_GET["id"].".out";
	    echo file_get_contents('/var/zpanel/hostdata/zadmin/public_html/ironcoders_com/evaluator/sources/'.$fis);  ?></textarea>
	</div>

</div>
<br><hr>
<?php } ?>
<form action="/scripts/evaluate-upload.php" role="form" method="post" enctype="multipart/form-data">
<br>
<div class="row">
<?php if(isset($_GET['type'])==2) {  ?>
<h3 style="margin-left:50px;"> Evalueaza alta sursa </h3> <br>
<? } ?>
	<div class="col-md-6">
		<div class="form-group">
		<label for="exampleInputFile">Alege sursa</label>
		<br>
		<input name="file" type="file" id="exampleInputFile">
		<p class="help-block">Extensie : cpp , c ,pas .</p>
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