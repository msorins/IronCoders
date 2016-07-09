<style>
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form
{
	background-color:#2c3e50;
}
</style>
<header style="height:80px;" class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navigatie</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a style="font-family: 'Open Sans', sans-serif; height:80px" class="navbar-brand" href="/"><img id="headerindex" style="margin-top:-19px; margin-bottom:0px; height:80px; width:260px; position:relative" src="/img/site/logo.png" alt=""></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
					 <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Algoritmică <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
							<li><a href="/arhiva.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Arhivă Probleme</a></li>
							<li><a href="/arhiva-educationala"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Arhivă educatională</a></li>
							<li><a href="/clase.php"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Clase virtuale</a></li>
							<li><a href="/monitor.php"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Monitorul de evaluare</a></li>
							<li class="divider"></li>
							<li style="margin-top:-10px;"><a href="/arhiva.php?type=make"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adaugă o problemă</a></li>
						</ul>
                    </li>
                   <li class="dropdown">
					  <a style="font-family: 'Open Sans', sans-serif;" href="#" class="dropdown-toggle active" data-toggle="dropdown">Competiţii<b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="/competitii.php"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Listă</a></li>
						<li><a href="/competitii.php?type=clasament"> <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Clasament</a></li>
						<li class="divider"></li>
						<li style="margin-top:-10px;"><a href="/competitii.php?type=make"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Creează o competiţie</a></li>
					  </ul>
					</li>
                    <li class="dropdown">
					  <a style="font-family: 'Open Sans', sans-serif;" href="#" class="dropdown-toggle active" data-toggle="dropdown">Cursuri<b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="/cursuri.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Listă</a></li>
						<?php
						if($user_rang>=3 && $user_name!=NULL) { ?>
						<li class="divider"></li>
						<li style="margin-top:-10px;"><a href="/cursuri.php?type=make"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Creează un curs</a></li>
						<?php } ?>
					  </ul>
					</li>
                    <li><a href="/forum">Forum</a></li>
					<?php if ($user_name==NULL) { ?>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="/forum/ucp.php?mode=login">Autentificare</a></li>
						<li><a href="/forum/ucp.php?mode=register">Înregistrare</a></li>
					  </ul>
					</li>
					<?php } else { //?>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Salut <?php echo $user_name; ?> <b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="/profil.php?user=<?php echo $user_name;?>"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Profil</a></li>
						<li><a href="/surse.php?type=list"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Sursele mele</a></li>
						<li class="divider"></li>
						<li><a href="/forum/ucp.php?i=173"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Setări</a></li>
					  </ul>
					</li>
					<?php } ?>
				  </ul>
                </ul>
            </div>
        </div>
    </header><!--/header-->