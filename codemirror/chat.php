<?php
require "scripts/config.php";
require ROOT."scripts/user_name.php";
$user_name2=$user_name;
$user_id2=$user_id;
if(isset($_GET["p"]))
	$p=secure($_GET["p"]);
else
	$p=1;
		
require "scripts/secure.php";
require "scripts/config.php";
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IronCoder - Chat</title>
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
	<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg">
					<div style="height:200px;" class="modal-content">
					  <h3 style="text-align:center;  font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;">Trebuie sa fii logat pentru a vorbi pe chat.</h3> <br>
					
					<p style="text-align:center;">
					<a href="/forum/ucp.php?mode=login"><button type="button" class="btn btn-default btn-lg">Logheaza-te</button></a>
					<a href="/forum/ucp.php?mode=register"><button style="margin-left:10px;" type="button" class="btn btn-default btn-lg">Inregistreaza-te</button></a>
					</p>
					</div>
				  </div>
				</div>
	<div class="main-body" style="width:90%; margin-left:auto; margin-right:auto; min-height:600px;">
	<h3 style="font-size:27px; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;" > Chat </h3> <hr>
		<div style="margin:20px; padding:20px;">
			<div id="chat" style="background-color: #f5f5f5; border: 1px solid #ccc; height:600px; overflow-y: scroll;">
			</div>
			<div class="form-inline">
			<input style="width:90%" type="text" class="form-control" id="text" placeholder="Scrie mesajul">
			<button id="trimite" style="width:9%; min-width:70px;" type="button" class="btn btn-default">Trimite</button>
			</div>
		</div>
	</div>
    <?php include 'views/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
<script>
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
		xmlhttp.open("POST", "scripts/chat-send.php?name=chat", true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send(body);
}
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
	xmlhttp.open("POST", "scripts/chat-receive.php?name=chat", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.send(body);
}
</script>
</html>