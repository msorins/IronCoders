<!DOCTYPE html>
<?php 
require "scripts/config.php";
require "scripts/secure.php";
require ROOT."scripts/user_name.php";
$user_name2=$user_name;
$user_rang2=$user_rang;

if(isset($_GET["name"]))
	$problem_name=secure($_GET["name"]);
else
	$problem_name=NULL;

class ide
{
	private $problem_name;
	
	public function normal_header()
	{
		?>
		<div style="min-width:920px; margin-top:-10px;" class="row">
		  <div class="col-md-3 col-xs-3"> <h2 style="font-size:20px; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;"> Selectare limbaj</h2>
		  <select class="form-control" name="ide_limbaj" id="limbaj" style="margin-left:4px; width:90%" onchange="alege_input()">
			<option value="cpp">C++</option>
			<option value="c">C</option>
			<option value="pas">Pascal</option>
		  </select>
		  <p id="info" style="margin-top:10px; font-size:15px; font-weight: lighter; display:none;">Timp executie <span style="color: #2679b5;" id="timp">x</span> ms . Memorie folosita <span style="color: #2679b5;" id="memorie">x</span> kb</p>
		  
		  </div>
		  <div class="col-md-4 col-xs-4"><h2 style="font-size:20px; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;"> Input</h2>
		   <textarea class="form-control" name="input" id="input" style="resize: none; width:90%" ></textarea>
		  </div>
		  <div class="col-md-3 col-xs-3"><h2 style="font-size:20px; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;"> Output</h2>
		   <textarea class="form-control" name="output" id="output" style="resize: none; width:90%" ></textarea>
		  </div>
		  <div class="col-md-2 col-xs-2">
		  <button style="margin-top:55px; " id="trimite" onclick="trimite()" type="button" class="btn btn-primary"> Trimite <span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
			</div>
		</div>
		<?php
	}
	
	public function solve_problem_header()
	{
		
		?>
		<div class="center-block" style="min-width:920px; margin-top:-10px; " class="row">
		  <div class="col-md-3 col-xs-3"> <h2 style="font-size:20px; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;"> Selectare limbaj</h2>
		  <select class="form-control" name="ide_limbaj" id="limbaj" style="margin-left:4px; width:90%;" onchange="alege_input()">
			<option value="cpp">C++</option>
			<option value="c">C</option>
		  </select>
		  <p id="info2" style="margin-top:10px; font-size:15px; font-weight: lighter;">Punctaj: <span style="color: #2679b5;" id="punctaj"> ? </span> <span id="raport_evaluare">   . Evaluează sursa</span></p>
		  
		  </div>
		  <div class="col-md-3 col-xs-3"><h2 style="font-size:20px; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;"> Problemă</h2>
		   <select onchange="ide_runda()" class="form-control" name="ide_problem_name" id="ide_problem_name"  style="margin-left:4px;">
		    <?php
			$query=mysql_query("SELECT * FROM `arhiva`");
			while($k=mysql_fetch_array($query))
			{
			?>
				<option <?php if($k["arhiva_nume"] == $this->problem_name ) echo "selected"; ?> value="<?php echo $k["arhiva_nume"];?>"><?php echo $k["arhiva_nume"];?></option>
			<?php
			}
			?>
		  </select>
		  </div>
		  <div class="col-md-4 col-xs-4"> <h2 style="font-size:20px; font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;"> Selectare rundă</h2>
			  <select style="margin-top:0px;"  id="arhiva_runda" name="arhiva_runda" class="form-control">
				
			  </select>
		 </div>
		  <div class="col-md-2 col-xs-2">
			<button style="margin-top:55px; " id="trimite" onclick="trimite_problema()" type="button" class="btn btn-primary"> Trimite <span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
		  </div>
		</div>
		<?php
	}
	
	public function set_problem_name($name)
		{
			$this->problem_name=$name;
		}
}
	$obj=new ide;

?>
<html lang="en">
<head>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="Este adresat persoanelor care doresc să programeze fără a avea instalat vreun soft specializat pentru acest lucru.">
  <meta name="keywords" content="Informatica,Programare,C++, Probleme Informatica, Cursuri Informatica, Concursuri de programare, Probleme rezolvate, Comunitate IT, Competitii">
  <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  <title>IronCoders - IDE</title>
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

    @media screen and (min-width: 1001px) {
	    #headerindex {
	        display:block;
	    }
	}
	@media screen and (max-width: 1000px) {
	    #headerindex {
	        display:none;
	    }
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
<?php include 'views/header.php'; ?>
<hr style="margin-top:-10px">
<?php
if($problem_name==NULL)
	$obj->normal_header();
else
{
	$obj->set_problem_name($problem_name);
	$obj->solve_problem_header();
}
?>

<!-- Spatiul de programare -->
<pre style="min-width:920px; margin-top:215px; border-top:0px;" id="editor">
#include &lt;iostream&gt;
using namespace std;
int main()
{
	cout<<"Hello world!";
}
</pre>  

<!-- Mesaj eroare sintaxa -->
<div id="myModal" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Erori în sintaxa</h4>
      </div>
      <div id="modal-content1" class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Închide</button>
      </div>
    </div>
  </div>
</div>

<div id="myModal2" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
		<div style="height:200px;" class="modal-content">
		<h3 style="text-align:center;  font-family: 'Open Sans', sans-serif; font-weight: lighter; color: #2679b5;">Trebuie să fii logat pentru a rezolva aceasta problema</h3> <br>
					
	<p style="text-align:center;">
	<a href="/forum/ucp.php?mode=login"><button type="button" class="btn btn-default btn-lg">Loghează-te</button></a>
	<a href="/forum/ucp.php?mode=register"><button style="margin-left:10px;" type="button" class="btn btn-default btn-lg">Înregistrează-te</button></a>
	</p>
	</div>
	</div>
</div>
</div>
<script>
function alege_input()
{
	var x=document.getElementById("limbaj").selectedIndex;
	if(x=='0')
		editor.setValue("#include <iostream>\nusing namespace std;\nint main()\n{\n cout<<\"Hello World!\"; \n}");
	if(x=='1')
		editor.setValue("#include <stdio.h>\nint main()\n{\n  printf(\"Hello World!\");\n  return 0;\n}");
	if(x=='2')
	{
		editor.setValue("Program Lesson1_Program1;\nBegin\n  Write('Hello World!');\nReadln;\nEnd.");
		editor.getSession().setMode("ace/mode/pascal");
	}
	else
		 editor.getSession().setMode("ace/mode/c_cpp");
	editor.gotoLine(1);
	editor.focus();
}
function sus()
{
	editor.gotoLine(1);
}
function alege_tema(){
	var tema = document.getElementById('tema').value;
	editor.getSession().setMode("ace/mode/"+tema);
}
function trimite() {
    document.getElementById("trimite").innerHTML = "In progres...";
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
		document.getElementById("info").style.display="block";
		document.getElementById("trimite").innerHTML = "Trimite";
		var str=xmlhttp.responseText;
		str=str.split("#");
		document.getElementById("output").innerHTML=str[0];
		document.getElementById("timp").innerHTML=str[2];
		document.getElementById("memorie").innerHTML=str[3];
		if(str[0]=="Eroare in sintaxa" && str[4]!=null)
		{
			document.getElementById("modal-content1").innerHTML="<br>"+str[4];
			$('#myModal').modal('show');
		}
		}
	} 
	var body = "ide_input=" + encodeURIComponent(document.getElementById("input").value) + "&ide_source="+ encodeURIComponent(editor.getValue()) +"&ide_limbaj=" +encodeURIComponent(document.getElementById("limbaj").value);
	xmlhttp.open("POST", "scripts/ide-upload.php", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-Length", body.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(body);

}
function trimite_problema() {
    document.getElementById("trimite").innerHTML = "In progres...";
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
		var str=xmlhttp.responseText;
		str=str.split("#"); 
		document.getElementById("trimite").innerHTML = "Trimite";
		if(str==991)
		{
			$('#myModal2').modal('show');
		}
		else
		{
			document.getElementById("info2").style.display="block";
			document.getElementById("punctaj").innerHTML = str[0]+" pc.";
			document.getElementById("raport_evaluare").innerHTML = "<a href=\"/monitor.php?type=view&id="+str[1]+"\">Raportul evaluării</a>";
		}
		}
	} 
	var body = "from=ide&ide_source="+ encodeURIComponent(editor.getValue()) +"&ide_limbaj=" +encodeURIComponent(document.getElementById("limbaj").value) + '&arhiva_nume=' + encodeURIComponent(document.getElementById("ide_problem_name").value) + "&job_contest="+ encodeURIComponent(document.getElementById("arhiva_runda").value);
	xmlhttp.open("POST", "scripts/arhiva-solve.php", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-Length", body.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(body);
	
	//xmlhttp.open('POST', 'scripts/editor-save.php');
    //xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   // xmlhttp.send("content=" + editor.getValue() + "&file="+ document.getElementById('fisiere').value);
}

function ide_runda() {
	var xmlhttp;
	if (window.XMLHttpRequest)
	  xmlhttp=new XMLHttpRequest();
	else
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	 
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  var str=xmlhttp.responseText;
		  str=str.split("#");
		  var select = document.getElementById("arhiva_runda");
		  while (select.hasChildNodes()) {
				select.removeChild(select.lastChild);
		  }
		  for(var i=0; i<str.length-1; i++)
		  {
			  var opt = str[i];
			  var el = document.createElement("option");
			  el.textContent = opt;
			  el.value = opt;
			  select.appendChild(el);
		  }
		}
	  } 
	var body = "arhiva_nume=" + encodeURIComponent(document.getElementById("ide_problem_name").value);
	xmlhttp.open("POST", "scripts/ide-get-runda.php", true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.send(body);

}
ide_runda()
</script>
<script src="/ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
    editor.getSession().setMode("ace/mode/c_cpp");
    editor.setShowPrintMargin(false);
	editor.resize();
	document.getElementById('editor').style.fontSize='14px';
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46577566-2', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
