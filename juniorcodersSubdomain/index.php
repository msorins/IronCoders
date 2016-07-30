<!DOCTYPE html>
<?php
include 'scripts/class_core.php'; 
?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <!-- Chrome, Firefox OS and Opera --> 
  <meta name="theme-color" content="#00796B"> 
  <!-- Windows Phone --> 
  <meta name="msapplication-navbutton-color" content="#00796B"> 
  <!-- iOS Safari --> 
  <meta name="apple-mobile-web-app-status-bar-style" content="#00796B">
  <!-- No CACHE => for developing -->
  <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
  
  <title>JuniorCoders </title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php include 'views/header.php';?>


  <div style="max-height:300px; width:100%; z-index:2; margin-top:-5px;" class="parallax-container">
	  <div class="section no-pad-bot" id="index-banner">
		<div class="container">
		  <br><br>
		  <h1 class="header center white-text light">JuniorCoders - Logo </h1>
		</div>
	  </div>
      <div class="parallax responsive-img" style=" overflow:hidden;"><img style="" src="img/index-bg.png"></div>
    </div>
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">TEXT1</h5>

            <p class="light">Text de test - We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text"><i class="material-icons">group</i></h2>
            <h5 class="center">TEXT2</h5>

            <p class="light">Text de test - By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">TEXT3</h5>

            <p class="light">Text de test - We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>
	
  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Despre Platforma</h5>
          <p class="grey-text text-lighten-4">Text de test - We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Link-uri</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contact</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Realizat de <a class="orange-text text-lighten-3" href="https://mirceasorin.ro">Mircea Sorin Sebastian</a>
      </div>
    </div>
  </footer>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
  $(document).ready(function() {
	  $('.modal-trigger').leanModal();
	});
	
  $(document).ready(function(){
      $('.parallax').parallax();
    });
</script>
  </body>
</html>
