<!DOCTYPE html>
<?php
    //Imports
	require "scripts/config.php";
	require ROOT."scripts/user_name.php";
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IronCoders - Comunitate dedicată programării</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
	<?php
	if(isset($_GET["msg"]) && $_GET["msg"] == "loggedInvalid"){
		echo "<div style=\" margin-bottom:-5px;, border-radius: 25px; \" class=\"alert alert-danger\" role=\"alert\"><b>Ops, încearcă din nou !</b></div>";
	}

	?>
    <?php include 'views/header.php'; ?>
<script>
document.getElementById("headerindex").style.marginTop = "-15px";
</script>

    <section id="main-slider" class="no-margin">
        <div class="carousel slide wet-asphalt">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
                <li data-target="#main-slider" data-slide-to="3"></li>
            </ol>
            <div style="max-height:385px;" class="carousel-inner">
                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content centered">
                                    <div class="carousel-content center centered">
                                    <h2 class=" animation animated-item-1">IronCoders</h2><br>
                                    <h3 class=" animation animated-item-2">IronCoders este o platforma online care faciliteaza invatarea programarii oferind unelte si resurse in acest scop.</h3>
                                    <br>
                                    <a class="btn btn-md animation animated-item-3" href="/blog/prezentare-ironcoders/">Mai Multe</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
                <div class="item" style="background-image: url(img/site/bluepattern.png)">
                    <div class="container">
                        <div class="row">
							<div class="col-lg-12">
								<div class="center">
									<h2>De ce să inveți să programezi ? </h2>

								</div>
								<div class="gap"></div>
								<div style="margin-top:-10px;" class="row">
									<div class="col-md-6">
										<blockquote style="color:#E6E6E6;">
											<p>Mintea umană iubeşte provocările. În loc să o antrenezi cu un joc de Şah sau Sudoku, poţi lucra la un proiect în domeniu web development, android development sau chiar rezolvând probleme de diferite dificultăţi.</p>

										</blockquote>
										<blockquote style="color:#E6E6E6;">
											<p>Pentru că îţi oferă şansa să îţi pui în aplicare toate ideile și astfel poţi începe propriile proiecte care în viitor vor putea deveni afaceri de succes.</p>

										</blockquote>
									</div>
									<div class="col-md-6">
										<blockquote style="color:#E6E6E6;">
											<p>Pentru că este un domeniu de viitor, aflat în continuă expansiune unde se găsesc nenumărate locuri de muncă bine plătite.<p>

										</blockquote>
										<blockquote style="color:#E6E6E6;">
											<p>Pentru că este amuzant, în informatică nu trebuie să stai şi să toceşti o grămadă de cărţi şi cursuri pentru a putea profesa, tot ce trebuie să faci este să înveţi strictul necesar şi apoi restul va veni de la sine prin practică. </p>

										</blockquote>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div><!--/.item-->
                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content center centered">
                                    <h2 class=" animation animated-item-1">Mesot@ IT</h2><br>
                                    <h4 class=" animation animated-item-2">C.N “Dr. Ioan Mesota” impreuna cu site-ul IronCoders.com va invita la concursul de programare Mesota IT.</h4>
                                    <br>
                                    <a class="btn btn-md animation animated-item-3" href="/concurs.php">Mai multe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content centered">
                                    <h2 class="animation animated-item-1">Invata sa programezi</h2>
									<br>
                                    <h4 class="animation animated-item-2">Parcurge cursuri, citeste articole, testeaza-ti cunostiintele !</h4>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="centered">
                                    <div class="embed-container">
                                       <iframe width="560" height="315" src="https://www.youtube.com/embed/BjKmWk3oE4E" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="icon-angle-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="icon-angle-right"></i>
        </a>
    </section><!--/#main-slider-->
    <section id="services" class="emerald" style="background-color:#486D88" >
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="media">
                        <div class="pull-left">
                            <a href="/arhiva.php"><img class="img-responsive" src="images/glyphcons/g1.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <a href="/arhiva.php"><h3 class="media-heading" style="color:#d3d4d5">Arhivă de probleme</h3></a>
                            <p>Locul perfect în care îți poți aprofunda cunoștințele! Aici poți alege dintr-o varietate de probleme de la olimpiade școlare și concursuri.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="media">
                        <div class="pull-left">
                            <a href="/ide.php"><img class="img-responsive" src="images/glyphcons/g2.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <a href="/ide.php"><h3 class="media-heading" style="color:#d3d4d5">Compilator online ( IDE )</h3></a>
                            <p>Acesta este adresat persoanelor care doresc să programeze însă nu au instalat vreun soft specializat.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="media">
                        <div class="pull-left">
                           <a href="/cursuri.php"><img class="img-responsive" src="images/glyphcons/g3.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <a href="/cursuri.php"><h3 class="media-heading" style="color:#d3d4d5">Cursuri interactive</h3></a>
                            <p>Acesta este un sistem diferit de actualele programe educative din Romania, astfel poți învăța mult mai ușor programarea.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
			</div>
			<div style="height:1px; background-color:#d3d4d5; width:100%"></div>
			<div class="row" style="margin-top:50px; clear:both">
					<div class="col-md-4 col-sm-6">
						<div class="media">
							<div class="pull-left">
							   <a href="/competitii.php"><img class="img-responsive" src="images/glyphcons/g6.png" alt=""></a>
							</div>
							<div class="media-body">
								<a href="/competitii.php"><h3 class="media-heading" style="color:#d3d4d5">Competiţii online</h3></a>
								<p>Învață și mai multe concurând cu alți membri ai site-ului. Doboară recordurile și depășește-ți limitele avansând în clasament..</p>
							</div>
						</div>
					</div><!--/.col-md-4-->
					<div class="col-md-4 col-sm-6 hidden-xs hidden-sm">
						<img class="img-responsive" style="margin-top:-65px; margin-left:45px;" src="img/site/index-img.png" alt="">
					</div><!--/.col-md-4-->
					<div class="col-md-4 col-sm-6">
						<div class="media">
							<div class="pull-left">
							   <a href="/clase.php.php"><img class="img-responsive" src="images/glyphcons/g7.png" alt=""></a>
							</div>
							<div class="media-body">
								<a href="/clase.php"><h3 class="media-heading" style="color:#d3d4d5">Clase virtuale</h3></a>
								<p>Oferă o experiență similară cu cea oferita în școli, în sălile de curs. Iți permite să înveți alături de o persoană experimentată precum un profesor care iți va corecta munca și iți va explica unde ai greșit.</p>
							</div>
						</div>
					</div><!--/.col-md-4-->
			</div>
			<div style="height:1px; background-color:#d3d4d5; width:100%"></div>
			<div class="row" style="margin-top:50px; clear:both">
					<div class="col-md-4 col-sm-6">
						<div class="media">
							<div class="pull-left">
							   <a href="/chat.php"><img class="img-responsive" src="images/glyphcons/g9.png" alt=""></a>
							</div>
							<div class="media-body">
								<a href="/chat.php"><h3 class="media-heading" style="color:#d3d4d5">Chat</h3></a>
								<p>De la rezolvări de probleme până la discuții amicale în timp real cu alți utilizatori.</p>
							</div>
						</div>
					</div><!--/.col-md-4-->
					<div class="col-md-4 col-sm-6">
						<div class="media">
							<div class="pull-left">
							   <a href="#"><img class="img-responsive" src="images/glyphcons/g10.png" alt=""></a>
							</div>
							<div class="media-body">
								<a href="#"><h3 class="media-heading" style="color:#d3d4d5">Quizz</h3></a>
								<p>Dacă dorești să-ți testezi cunoștințele acumulate, o poți face în oricare din quiz-urile existente. (În curând)</p>
							</div>
						</div>
					</div><!--/.col-md-4-->
					<div class="col-md-4 col-sm-6">
						<div class="media">
							<div class="pull-left">
							   <a href="/resurse.php"><img class="img-responsive" src="images/glyphcons/g8.png" alt=""></a>
							</div>
							<div class="media-body">
								<a href="/resurse.php"><h3 class="media-heading" style="color:#d3d4d5">Resurse</h3></a>
								<p>Orice materiale care vă sunt necesare programării pe care doriți să o faceți se găsesc aici..</p>
							</div>
						</div>
					</div><!--/.col-md-4-->
			</div>
            </div>
    </section><!--/#services-->

    <section style=" background-color:#2c3e50;" id="bottom" class="wet-asphalt">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>About Us</h4>
                    <p>Acest website este înființat  din dorința de a ajuta cât mai multă lume să descopere tainele informaticii și de a forma o comunitate de oameni care împart aceiași pasiune, programarea..</p>

                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>Link-uri utile</h4>
                    <div>
                        <ul class="arrow">
                            <li><a href="/forum/ucp.php?mode=login">Autentificare</a></li>
                            <li><a href="/forum/ucp.php?mode=register">Înregistrare</a></li>
                            <li><a href="/arhiva.php">Arhivă</a></li>
                            <li><a href="/ide.php">Compilator online</a></li>
                            <li><a href="/cursuri.php">Cursuri interactive</a></li>
                            <li><a href="/clase.php">Clase virtuale</a></li>
                            <li><a href="/resurse.php">Resurse</a></li>
                            <li><a href="/monitor.php">Monitorul de evaluare</a></li>
                            <li><a href="/forums">Forum</a></li>
                            <li><a href="/blog">Blog</a></li>

                        </ul>
                    </div>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>Noutăți blog</h4>
                    <div>
                        <div class="media">
                            <div class="pull-left">
                                <img src="images/blog/thumb1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="/blog/116/">Analiza complexității unui algoritm</a></span>
                                <small class="muted">Postat pe 21 noiembrie 2014</small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <img src="images/blog/thumb2.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="/blog/prezentare-ironcoders/">Prezentarea platformei</a></span>
                                <small class="muted">Postat pe 18 noiembrie 2014</small>
                            </div>
                        </div>
                    </div>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>Contact</h4>
                    <address>
                        sorynsoo@gmail.com
                    </address>
                    <h4>Newsletter</h4>
                    <form role="form">
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Email-ul tău">
                            <span class="input-group-btn">
                                <button onclick="news()" class="btn btn-danger" type="button">Go!</button>
                            </span>
                        </div>
                        <br>
                        <b><p id="newsletter" style="display:none" class="text-success">Newsletter confirmat</p></b>
                    </form>

					<div id="google_translate_element"></div><script type="text/javascript">
						function googleTranslateElementInit() {
						  new google.translate.TranslateElement({pageLanguage: 'ro', includedLanguages: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
						}
						</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                </div> <!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->
    <footer style="margin-top:-60px;" id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="/">Acasa</a></li>
                        <li><a href="/blog/despre-mine/">Despre mine</a></li>
                        <li><a href="www.mesota.ro">Mesota.ro</a></li>
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
    function news()
    {
        document.getElementById("newsletter").style.display= "block";
    }
    </script>
	<script>
	$(window).scroll(function(e){
	  parallax();
	});

	function parallax(){
	  var scrolled = $(window).scrollTop();
	  $('.para').css('top',-(scrolled*0.1)+'px');
	}

	</script>
</body>
</html>
