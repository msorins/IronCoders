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
  
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> 
  
  <title>JuniorCoders </title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
  <!-- Blockly -->
  <script src="blockly/blockly_compressed.js"></script>
  <script src="blockly/blocks_compressed.js"></script>
  <script src="blockly/javascript_compressed.js"></script>
  <script src="blockly/msg/js/ro.js"></script>
  
  <!-- Custom Blockly blocks for JuniorCoders-->
  <script src="js/custom_blocks.js"></script>
  
  <!-- Kiwi -->
  <script src="js/kiwi.js"></script>
</head>

<body style="min-width:1300px; background-image: url(img/bg.jpg); overflow-x: scroll;" onresize="set_height()">
  <?php include 'views/header.php';?>

  <!-- KIWI & Blockly -->	
 <div class="row" style="height:100%;">
     <div class="col s8">
	  <p>
		<button style="float:right; " class="btn-floating btn-large waves-effect waves-light red" onclick="executeCode()"><i class="material-icons">code</i></button>
      </p>
	<div style="width:100%; margin-left:auto; margin-right:auto; margin-top:5%"  id="game-container"></div>
  </div>
      <div class="col s4" style="margin-top:15px; height:100%;"> <div id="blocklyDiv" style="-webkit-overflow-scrolling: touch; height:100%;"></div></div>
 </div>
  

  <!-- List of available blocks -->
  <xml id="toolbox" >
	<block type="mergi_dreapta"></block>
    <block type="sari_dreapta"></block>
  </xml>

  <!-- List of startBlocks -->
  <xml id="startBlocks">
 
  </xml>
	
	
  <!--Bottom for finishing the level-->
  <div id="modal_level_done" class="modal bottom-sheet">
    <div class="modal-content">
      <h4 class="green-text">Felicitari</h4>
      <p>Ai terminat nivelul</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
  
  <!-- Code for KIWI JS -->
  <script>
	  var state = new Kiwi.State('Play');
      var gata =0;

		//Preload the assets
		state.preload = function () {
			
			this.addJSON( 'tilemap', 'second_map2.json' );
			this.addSpriteSheet( 'tiles', 'second_map2.png', 70, 70 );
			this.addSpriteSheet( 'character', 'p1.png', 72, 100 );
			this.addImage( 'background', 'sky-bg.png' );
		};


		//Setup our game world
		state.create = function () {

			//Create the background layer
			this.background = new Kiwi.GameObjects.StaticImage( this, this.textures.background );
			this.addChild( this.background );
			

			//Create our character
			this.character = new Kiwi.GameObjects.Sprite(this, this.textures.character, 100, 75);	


			//Add physics to the character
			this.character.box.hitbox = new Kiwi.Geom.Rectangle( 0, 0, 66, 92 ); 
			this.character.physics = this.character.components.add( new Kiwi.Components.ArcadePhysics( this.character, this.character.box ) );
			this.character.physics.acceleration.y = 77;
			this.character.physics.maxVelocity.y = 140;

			//Create the characters animation
			this.character.animation.add('walking', [ 1, 2, 3, 4, 5, 6 ], 0.1, true);
			this.character.animation.add('idle', [ 0 ], 0.1, true, false);
			this.character.animation.add('jump', [ 10 ], 0.1, true);
			this.character.animation.add('fall', [ 9 ], 0.1, true);

			//Add to the screen.
			this.addChild(this.character);


			//Create the tilemap
			this.tilemap = new Kiwi.GameObjects.Tilemap.TileMap(this, 'tilemap', this.textures.tiles);

			for( var i = 0; i < this.tilemap.layers.length; i++ ) {
				this.addChild( this.tilemap.layers[ i ] );
			}

			for(var i = 1; i < this.tilemap.tileTypes.length; i++) {
				this.tilemap.tileTypes[i].allowCollisions = Kiwi.Components.ArcadePhysics.ANY;
			}
		}


		state.update = function () {
			//Update all the gameobjects
			Kiwi.State.prototype.update.call(this);

			//Update physics
			this.checkCollision();

			this.updateCharacterMovement();
			this.updateCharacterAnimation();
			
			this.resetCharacter();
		}


		//Resolve collisions between the character and the first layer. 
		state.checkCollision = function () {
			this.tilemap.layers[0].physics.overlapsTiles( this.character, true );
			if(this.tilemap.layers[1].physics.overlapsTiles( this.character, true ))
				if(!gata)
				{
					gata=1;
					$('#modal_level_done').openModal();
					console.log("Level Done");
				}
		}


		//Updated the characters velocities
		state.updateCharacterMovement = function () {
			
			//Move the player/character
			if ( this.leftPressed ) {
				this.character.scaleX = -1;
				this.character.physics.velocity.x = -40;

			} else if ( this.rightPressed ) {
				this.character.scaleX = 1;
				this.character.physics.velocity.x = 40;

			} else {
				this.character.physics.velocity.x = 0;
			}

			if (this.jumpPressed && this.character.physics.isTouching( Kiwi.Components.ArcadePhysics.DOWN ) ){
				this.character.physics.velocity.y = -295;
			}

		}
		
		function sari_dreapta()
		{
			state.character.physics.velocity.y = -295;
			mergi_dreapta();
			
		}
		
		function mergi_dreapta()
		{
			state.character.animation.play('walking', true);
			state.character.scaleX = 1;
			var interval = setInterval(function(){ state.character.physics.velocity.x=23; }, 2);
			setTimeout(function (){

			  clearInterval(interval);
			  state.character.animation.play('walking', false);
			  state.character.animation.play('idle', true);

			}, 650); // Delay
			
		}
		
		//Changes the characters animation to match what he is doing
		state.updateCharacterAnimation = function () {
			
			//Are we in the air?
			if( !this.character.physics.isTouching( Kiwi.Components.ArcadePhysics.DOWN ) ) {

				//Are we going down or up?
				if( this.character.physics.velocity.y > 0 ) {
					this.character.animation.play('fall', false);
				} else {
					this.character.animation.play('jump', false);
				}

			} 
			

		}


		//Check to see if the character has fallen and needs to reset
		state.resetCharacter = function() {

			if( this.character.y > this.game.stage.height + this.game.stage.height / 2 ) {
				this.character.y = 75;
				this.character.x = 0;
				this.character.physics.velocity.y = 0;
			}

		}
		
		function do_reset()
		{
			state.character.y = 75;
			state.character.x = 100;
			state.character.physics.velocity.y = 0;
		}

		//Create the game.
		var gameOptions = {
			width: 768,
			height: 512
		};

		var game = new Kiwi.Game('game-container', 'Tilemap with Arcade Physics', state, gameOptions);

  </script>
	  
  <script>
    //Blockly setup
    var workspace = Blockly.inject('blocklyDiv',
        {media: 'blockly/media/',
		 trashcan: true,
         toolbox: document.getElementById('toolbox')});
    Blockly.Xml.domToWorkspace(workspace,
        document.getElementById('startBlocks'));

	//Kiwi Interface
	function execute(crt_action, pos)
	{
		if(crt_action[pos]=="sari_dreapta()")
		{
			sari_dreapta();
			console.log("sari_dreapta();");
		}
			
		if(crt_action[pos]=="mergi_dreapta()")
		{
			mergi_dreapta();
			console.log("mergi_dreapta();");
		}
		
		//If there are any more blocks to be evaluated
		if(pos < crt_action.length)
			 setTimeout(function(){ execute(crt_action,pos+1); }, 900);
		else
		{
			if(!gata)
			{
				  Materialize.toast('Incearca din nou', 4000)
				  do_reset();
			}
		}
	}
	
	// Get code from Blockly and pass it to KIWI
    function executeCode() {
      Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
      var code = Blockly.JavaScript.workspaceToCode(workspace);
	  var res = code.split(";");
	  
	  //If there are placed blocks
	  if(res.length)
		  execute(res,0);

    }
  </script>

    
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
  $(document).ready(function() {
	  $('.modal-trigger').leanModal();
	  $('.parallax').parallax();
	   document.getElementById('blocklyDiv').style.height = $(document).height()-90+'px';
	});
  function set_height()
  {
	   document.getElementById('blocklyDiv').style.height = $(document).height()-90+'px';
  }
</script>
  </body>
</html>
