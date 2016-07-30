var state = new Kiwi.State('Play');

state.preload = function () {
    
    this.addSpriteSheet('player', './assets/img/anime/squid.png', 150, 117);
    this.addAudio('sfx', './assets/audio/misc-sound-effects/sound-sheet.mp3');
};

state.create = function () {

	this.player = new Kiwi.GameObjects.Sprite(this, this.textures.player, 275, 150);
	this.player.animation.add( 'walk', [ 1, 2, 3, 4, 5, 6 ], 0.035, true, true );
	this.addChild(this.player);

	this.sfx = new Kiwi.Sound.Audio(this.game, 'sfx', 1, true);
	
	// Adds market to the 'this.sfx' Audio object.
	this.sfx.addMarker( 'coin', 2.50, 4.22, false );
	this.sfx.play( 'coin', true );

	// Adds method to run to the onDown signal of the game.input.mouse.
	this.game.input.mouse.onDown.add( this.mouseDown, this );

};

state.mouseDown = function (){
	// Plays 'coin' sound effect
	this.sfx.play( 'coin', true );
}

var gameOptions = {
	width: 768,
	height: 512
};

var game = new Kiwi.Game('game-container', 'Add Marker', state, gameOptions);


