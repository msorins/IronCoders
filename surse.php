<?php 
	require "scripts/config.php";
	require ROOT."scripts/user_name.php";
	$user_name2=$user_name;
	require "scripts/secure.php";
	if(isset($_GET["type"]))
		$type=secure($_GET["type"]);
	class surse
	{
		public $user_name;
		public function make()
		{
		?>
		<h3>Salvează o sursă nouă</h3>
		<hr>
		<div style="background-color: #f5f5f5; border: 1px solid #ccc; margin-top:30px; padding:20px;" >
		<div class="row">
		  <div class="col-md-6"><label for="exampleInputEmail1">Titlu sursă* :</label>
		  <input onchange="button()" type="text" class="form-control" id="surse_titlu">
		  </div>
	      <div class="col-md-6">
		 <label for="exampleInputEmail1">Descriere:</label>
		 <textarea style="width:100%;" id="surse_descriere" type="text" class="form-control"></textarea>
	      </div>
	    </div>
		<hr>
		<pre name="surse_sursa" style="height:500px; width:100%; margin-top:25px;" id="editor">
#include &lt;iostream&gt;
using namespace std;
int main()
{
	cout<<"Hello world!";
}
		</pre> 
		<button id="surse_button" disabled onclick="surse_make_function()"style="margin-top:25px;" type="submit" class="btn btn-default">Trimite</button>		
		</div>
		<div style="height:50px;"></div>
		<?php
		}
		
		public function surse_list()
		{
		?>
		<h3> Lista surselor tale </h3>
		<a href="surse.php?type=make"><button style="float:right; margin-top:-40px;" type="button" class="btn btn-primary">Salvează o sursă</button></a>
		<hr>
		<div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Titlu</th>
            <th style="width:300px;">Descriere</th>
            <th>Sursă</th>
            <th>Șterge</th>
          </tr>
        </thead>
        <tbody>
		<?php
		$user=$this->user_name;
		$query=mysql_query("SELECT * FROM `surse` WHERE `surse_utilzator` LIKE '$user'"); $nr=0;
		while($k=mysql_fetch_array($query))
		{
		$nr++;
		?>
          <tr>
            <td><?php echo $nr; ?></td>
            <td><?php echo $k["surse_titlu"]; ?></td>
            <td style="width:300px;" ><?php echo $k["surse_descriere"]; ?></td>
            <td><a href="/surse.php?type=view&id=<?php echo $k["surse_id"]; ?>"> Click </a></td>
			 <td><a href="/scripts/surse-sterge.php?id=<?php echo $k["surse_id"]; ?>"> <img style="margin-left:10px;" src="/img/site/delete.png" class="img-responsive" alt="Responsive image"> </a></td>
          </tr>
        <?php 
		}
		?>
        </tbody>
      </table>
    </div>
		<?php
		}
		public function view()
		{
		if(isset($_GET["id"]))
		{
			$id=secure($_GET["id"]);
			$query=mysql_query("SELECT * FROM `surse` WHERE `surse_id` = '$id'");
			$k=mysql_fetch_array($query);
			?><h3><?php echo $k["surse_titlu"]; ?></h3>
			<p style="margin-left:10px;" class="help-block"><?php echo $k["surse_descriere"]; ?> </p>
			<hr>
			<h3> Sursă </h3>
			<?php
			$z=$k["surse_sursa"];
			$z=ltrim($z); $z=rtrim($z);
?>
<pre class="brush: cpp; tab-size: 4;">
<?php 
echo  htmlspecialchars ($z); 
?>
</pre>
		<?php
		}

		}
		public function login()
		{
		?>
		<h3>Trebuie sa fii logat pentru a accesa aceasta pagina</h3>
		<?php
		}
		public function set_user_name($name)
		{
			$this->user_name=$name;
		}
	}
	$obj=new surse; 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IronCoder - Surse </title>
	<meta name="description" content="Platforma online specializata care faciliteaza invatarea programarii oferind unelte si resurse in acest scop">
	<meta name="keywords" content="Informatica,Programare,C++, Probleme Informatica, Cursuri Informatica">
	
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
	<script type="text/javascript" src="evaluator/syntax/scripts/shCore.js"></script>
	<script type="text/javascript" src="evaluator/syntax/scripts/shBrushCpp.js"></script>
	<link type="text/css" rel="stylesheet" href="evaluator/syntax/styles/shCoreDefault.css"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
  </head>
  <body>
  <style>
   #editor { 
        margin: 0;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
	.box {
	-webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
		}

	</style>
<?php include 'views/header.php'; ?>
<img style="margin-top:-20px; width:100%" src="../img/site/programming.png" class="img-responsive" alt="Responsive image">
<div style="width:all; height:3px; background-color:#e7e7e7;"> </div>
<div class="main-body" style="width:80%; margin-left:auto; margin-right:auto; min-height:600px;">
<?php
if($type=="make")
{
	$obj->set_user_name($user_name2);
	if($obj->user_name==NULL)
		$obj->login();
	else
		$obj->make();
}
if($type=="list")
{
	$obj->set_user_name($user_name2);
	if($obj->user_name==NULL)
		$obj->login();
	else
		$obj->surse_list();
}
if($type=="view")
{
	$obj->view();
}
?>

</div>
<?php include 'views/footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="/ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
	<script>
	function surse_make_function()
	  {
		var x=  document.getElementById("surse_titlu").value;
		var y=  document.getElementById("surse_descriere").value;
		var z=  editor.getValue();
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
			  window.location.replace("http://ironcoders.com/surse.php?type=list");
			}
	      }	
		var body = "surse_titlu=" + encodeURIComponent(x) + "&surse_descriere=" + encodeURIComponent(y) + "&surse_sursa=" + encodeURIComponent(z);
		xmlhttp.open("POST", "scripts/surse-make.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-Length", body.length);
		xmlhttp.setRequestHeader("Connection", "close");
		xmlhttp.send(body);
	 }
	 function button()
	 {
		if(document.getElementById("surse_titlu").value!="")
			document.getElementById("surse_button").disabled = false;
		else
			document.getElementById("surse_button").disabled = true;
	 }
	</script>
	<script>
		var editor = ace.edit("editor");
		editor.setTheme("ace/theme/twilight");
		editor.getSession().setMode("ace/mode/c_cpp");
		editor.setShowPrintMargin(false);
		editor.resize();
		document.getElementById('editor').style.fontSize='14px';
	</script>
  </body>
</html>