 <nav class="light-blue lighten-1" role="navigation" style="height:65px;">
    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">JuniorCoders</a>
	    <!-- Menu for desktop version -->
      <ul class="right hide-on-med-and-down">
		 <?php if($obj_core->get_from_session("is_logged")==1 ) {  ?>
		 
		 <li><a class="waves-effect waves-light dropdown-button" data-activates="dropdown-user"><i class="material-icons right">perm_identity</i>Salut, <?php echo $obj_core->get_from_session("user_name"); ?> </a></li>
		 
		 <ul id="dropdown-user" class="dropdown-content">
		  <li><a href="#!">one</a></li>
		  <li><a href="#!">two</a></li>
		  <li class="divider"></li>
		  <li><a href="scripts/class_core.php?type=logout">Logout</a></li>
		</ul>
		
		 <?php } 
		 else { ?>
		 <li><a class="modal-trigger waves-effect waves-light " href="#modal_login"><i class="material-icons right">perm_identity</i>Cont utilizator</a></li>
		 <?php } ?>
		 <li><a href="/code.php"><i class="material-icons right">view_module</i></a></li>
		 
      </ul>
	  
	  <!-- Menu for mobile version -->
      <ul id="nav-mobile" class="side-nav">
	     <?php if($obj_core->get_from_session("is_logged")==1 ) {  ?>
		 <li><a class="waves-effect waves-light "><i class="material-icons right">perm_identity</i>Salut, <?php echo $obj_core->get_from_session("user_name"); ?> </a></li>
		 <?php } 
		 else {
		 ?>
		  <li><a class="modal-trigger waves-effect waves-light " href="#modal_login"><i class="material-icons right">perm_identity</i>Cont utilizator</a></li>
		 <?php } ?>
		  <li><a href="#"><i class="material-icons right">view_module</i></a></li>
      </ul>
      <a href="/code.php" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  
  <div id="modal_login" class="modal modal-fixed-footer">
    <div class="modal-content">
	
	 <div class="row">
		<div class="col s12">
		  <ul class="tabs">
			<li class="tab col s3"><a class="active" href="#test1">Retele sociale</a></li>
			<li class="tab col s3"><a href="#test2">Cont utilizator</a></li>
		  </ul>
		</div>
		<div id="test1" class="col s12">
		
		  <div class="card">
			  <div class="card-content white-text" style="height:100px;">
				  <div class="row center-align">
					<div class="col m6 s12"> <?php $obj_core->google_login();?> </div>
					
					<div class="col m6 s12"> <?php $obj_core->fb_login();?> </div>
				  </div>
			  </div>
		  </div>
		
		</div>
		<div id="test2" class="col s12">
			  
			  <div class="row center-align" style="min-height:270px;">
			  <div class="card">
			  <div class="card-content green-text" style="min-height:270px;">
			   <h5 class="left-align red-text"> Autentificare </h5>
				<form action="scripts/class_core.php?type=classic_login" method="post" enctype="multipart/form-data" role="form" style="margin-top:25px;" class="col s10 center-align">
				  <div class="row">
					<div class="input-field col m6 s12">
					  <input name="email" id="email" type="email" class="validate">
					  <label for="name">Email:</label>
					</div>
					<div class="input-field col m6 s12">
					  <input name="password" id="password" type="password" class="validate">
					  <label for="password">Parolă</label>
					</div>
				  </div>
				  <button  style=" float:right; margin-right:15px;" class="btn-floating btn-large waves-effect waves-light red right-align"><i class="material-icons">done</i></button>
				</form>
				</div>
				
			  </div>
			  </div>
			  
			  <div class="row center-align" style="min-height:460px; margin-top:50px;">
			  <div class="card">
			  <div class="card-content green-text" style="min-height:460px;">
			   <h5 class="left-align red-text"> Înregistrare </h5>
				<form action="scripts/class_core.php?type=classic_register" method="post" enctype="multipart/form-data" role="form" style="margin-top:25px;" class="col s10 center-align">
				  <div class="row">
					<div class="input-field col m6 s12">
					  <input name="name" id="name" type="text" class="validate">
					  <label for="name">Nume</label>
					</div>
				  </div>
				  <div class="row">
					<div class="input-field col s12">
					  <input name="password" id="password" type="password" class="validate">
					  <label for="password">Parolă</label>
					</div>
				  </div>
				  <div class="row">
					<div class="input-field col s12">
					  <input name="email" id="email" type="email" class="validate">
					  <label for="email">Email</label>
					</div>
				  </div>
				   <button  style=" float:right; margin-right:15px;" class="btn-floating btn-large waves-effect waves-light red right-align"><i class="material-icons">done</i></button>
				</form>
				</div>
			  </div>
			  </div>
		</div>
	  </div>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "><i class="material-icons dp48">clear_all</i> Închidere</a>
    </div>
  </div>
  