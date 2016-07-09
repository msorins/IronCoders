<link href="/css/stylesheet.css" rel="stylesheet">
    <!-- Bootstrap -->
 <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'/>
<nav class="navbar navbar-inverse" style="border-radius: 0px;" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="font-family: 'Open Sans', sans-serif;" class="navbar-brand" href="/index.php">IronCoder</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		 <li class="dropdown">
          <a style="font-family: 'Open Sans', sans-serif;" href="#" class="dropdown-toggle active" data-toggle="dropdown">Algoritmica<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/arhiva.php">Arhiva Probleme</a></li>
            <li><a href="/arhiva.php?type=arhiva-educationala">Arhiva educationala</a></li>
			<li><a href="/monitor.php">Monitorul de evaluare</a></li>
            <li class="divider"></li>
			<li><a href="/arhiva.php?type=make">Adauga o problema</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a style="font-family: 'Open Sans', sans-serif;" href="#" class="dropdown-toggle active" data-toggle="dropdown">Competitii<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/competitions.php">Competitii active</a></li>
			<li><a href="/competitions.php?type=ranking">Clasament</a></li>
            <li class="divider"></li>
            <li><a href="/competitions.php?type=make">Creeaza o competitie noua</a></li>
          </ul>
        </li>
        <li><a style="font-family: 'Open Sans', sans-serif;"  href="/forum">Forum</a></li>
		<li><a style="font-family: 'Open Sans', sans-serif;" href="/blog">Blog</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<?php if ($login->isUserLoggedIn() == false) { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cont utilizator <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/forum/ucp.php?mode=login">Login</a></li>
            <li><a href="/forum/ucp.php?mode=register">Register</a></li>
          </ul>
        </li>
		<?php } else { ?>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Salut <?php echo $_SESSION['user_name']; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
			<li><a href="#">Profil</a></li>
		    <li class="divider"></li>
			<li><a href="#">Setari</a></li>
            <li><a href="?logout">Logout</a></li>
          </ul>
        </li>
		<? } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>