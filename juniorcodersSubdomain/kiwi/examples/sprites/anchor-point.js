var state = new Kiwi.State('Play');

state.preload = function () {
    this.addSpriteSheet( 'sprite', './assets/img/solar-system/earth.png', 110, 110 );
};

state.create = function () {
	this.sprite1 = new Kiwi.GameObjects.Sprite(this, this.textures.sprite, 175, 150);
	this.addChild(this.sprite1);

	this.sprite2 = new Kiwi.GameObjects.Sprite(this, this.textures.sprite, 300, 150);
	this.addChild(this.sprite2);

	// Changes the Anchor Point of the sprite to the top left corner.
	this.sprite2.anchorPointX = 0;
	this.sprite2.anchorPointY = 0;

	this.sprite3 = new Kiwi.GameObjects.Sprite(this, this.textures.sprite, 425, 150);
	this.addChild(this.sprite3);

	// Changes the Anchor Point of the sprite to the bottom right corner.
	this.sprite3.anchorPointX = this.sprite3.width;
	this.sprite3.anchorPointY = this.sprite3.height;

	this.sprite1.rotation = 0;
	this.sprite2.rotation = 0;
	this.sprite3.rotation = 0;

	
};

state.update = function () {
	this.sprite1.rotation += Math.PI * 0.01;
	this.sprite2.rotation += Math.PI * 0.01;
	this.sprite3.rotation += Math.PI * 0.01;
}

var gameOptions = {
	width: 768,
	height: 512
};

var game = new Kiwi.Game('game-container', 'Anchor Point', state, gameOptions);


