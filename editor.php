<!DOCTYPE html>
<?php 
	require_once('scripts/config.php');
	require ROOT."scripts/user_name.php";
?>
<html lang="en">
<head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Editor</title>
  <style type="text/css" media="screen">
    body {
        overflow: hidden;
    }
    
    #editor { 
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
  </style>
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
<body style="min-width:920px;">
<?php
if($user_rang>=5)
{
?>
<button style="position:absolute; display:none;  z-index: 100;" id="afiseaza" type="button" class="btn btn-default">Afiseaza</button>
<button style="position:absolute; display:none;  z-index: 100;" id="salveaza2" onclick="salveaza()" type="button" class="btn btn-primary"> Salveaza</button>
<?php include 'views/header.php'; ?>
<div style="width:98%;" id="menu">
<br><br><br>
<div style="margin-top:-75px;" class="row">
  <div class="col-md-4 col-xs-4"> <h2 style="font-size:20px; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;"> Selectare fisier</h2>
  <select id="fisiere" style="margin-left:4px;" onchange="alege_fisier()">
  <optgroup label="Root folder">
  <?php
  $cale= ROOT;
  $dir = scandir($cale); $i=0;
  foreach($dir as $k)
	  if(strstr($k,".")!=NULL && $k[0]!=".")
		echo " <option value=\" ".$k. " \">".$k."</option>" ;
  ?>
  </optgroup>
  <optgroup label="Scripts folder">
  <?php
  $cale= ROOT."scripts/";
  $dir = scandir($cale); $i=0;
  foreach($dir as $k)
	  if(strstr($k,".")!=NULL && $k[0]!=".")
		echo " <option value=\"/scripts/".$k. " \">".$k."</option>" ;

  ?>
   </optgroup>

  </select>
  </div>
  <div class="col-md-5 col-xs-5"><h2 style="font-size:20px; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;"> Selectare limbaj</h2>
   <select id="tema" style="margin-left:4px;" onchange="alege_tema()">
   <option value="php">php</p>
   <option value="html">html</p>
   <option value="css">css</p>

   </select>
  </div>
  <div class="col-md-3 col-xs-3"><button style="margin-top:35px; " id="salveaza" onclick="salveaza()" type="button" class="btn btn-primary"> Salveaza</button>
   <button style="margin-top:35px; " id="ascunde" type="button" class="btn btn-default"> Ascunde</button>
   <button  style="margin-top:35px; " class="btn btn-default" id="sus" onclick="sus()" ><span class="glyphicon glyphicon-arrow-up"></span></button>
</div>
</div>
</div>
<pre style=" min-width:920px; width:100%; margin-top:165px; border-top:0px;" id="editor">
</pre>  

<script>
function resizeAce() {
  return $('#editor').height($(window).height());
};
//listen for changes
$(window).resize(resizeAce);
//set initially
resizeAce();
function sus()
{
	editor.gotoLine(1);
}
function alege_tema(){
	var tema = document.getElementById('tema').value;
	editor.getSession().setMode("ace/mode/"+tema);
}

function alege_fisier(){
	var file = document.getElementById('fisiere').value;
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
		editor.gotoLine(1);
		editor.setValue(xmlhttp.responseText);
		editor.gotoLine(1);
		editor.focus();
		console.log("Da");
		editor.gotoLine(1);
		}
	} 
	xmlhttp.open('POST', 'scripts/editor-get-file.php');
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("file="+file);
}
$(document).ready(function(){
	document.getElementById("fisiere").selectedIndex = -1;
	$("#afiseaza").css("margin-left",($(window).width()-100)+'px');
	$("#salveaza2").css("margin-left",($(window).width()-190)+'px');
	$(".navbar").css("width",($(window).width())+'px');
	$("#ascunde").click(function(){
		 $("#menu").hide();
		 $("#editor").css("margin-top","0");
		 $("#afiseaza").show();
		 $("#salveaza2").show();
		 resizeAce();
	});
	$("#afiseaza").click(function(){
		 $("#afiseaza").hide();
		 $("#editor").css("margin-top","165px");
		 $("#menu").show();
		 $("#salveaza2").hide();
		 resizeAce();
	});
	

});
function salveaza() {
    document.getElementById("salveaza").innerHTML = "In progres...";
    document.getElementById("salveaza2").innerHTML = "In progres...";
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
		document.getElementById("salveaza").innerHTML = "Salveaza";
		document.getElementById("salveaza2").innerHTML = "Salveaza";
		}
	} 
	var body = "content=" + encodeURIComponent(editor.getValue()) + "&file="+ document.getElementById('fisiere').value;
	xmlhttp.open("POST", "scripts/editor-save.php", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-Length", body.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(body);
	
	//xmlhttp.open('POST', 'scripts/editor-save.php');
    //xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   // xmlhttp.send("content=" + editor.getValue() + "&file="+ document.getElementById('fisiere').value);
}
</script>
<script src="/ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
    editor.getSession().setMode("ace/mode/php");
    editor.setShowPrintMargin(false);
	editor.resize();
	document.getElementById('editor').style.fontSize='14px';
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<?php } ?>
</body>
</html>