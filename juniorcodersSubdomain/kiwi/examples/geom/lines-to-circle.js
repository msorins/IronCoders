var state = new Kiwi.State("Play");

state.preload = function () {
	// Adds texture atlas for the sprite to use
	this.addSpriteSheet( "circle", "./assets/img/shapes/circle.png", 70, 70 );
}

state.create = function () {
	this.mouse = this.game.input.mouse;

	this.drawLines();

	this.myLine1 = new Kiwi.Geom.Line ( 0, 100, this.game.stage.width, 100 );
	this.myLine2 = new Kiwi.Geom.Ray ( this.game.stage.width * 0.5, 250, this.game.stage.width, 250 );
	this.myLine3 = new Kiwi.Geom.Line ( 200, 400, 550, 410 );

	this.cursor = new Kiwi.GameObjects.Sprite ( this, this.textures.circle, -100, -100 );
	this.cursorBounds = new Kiwi.Geom.Circle( -100, -100, 70 );
	this.addChild( this.cursor );

	this.moveCursor();
}

state.update = function () {
	Kiwi.State.prototype.update.call( this );
	this.moveCursor();

	this.checkCollisions();
}

state.checkCollisions = function () {

	var lineResult1 = Kiwi.Geom.Intersect.lineToCircle (
		this.myLine1, this.cursorBounds );
	var lineResult2 = Kiwi.Geom.Intersect.rayToCircle (
		this.myLine2, this.cursorBounds );
	var lineResult3 = Kiwi.Geom.Intersect.lineSegmentToCircle (
		this.myLine3, this.cursorBounds );

	if ( lineResult1.result || lineResult2.result || lineResult3.result ) {
		this.cursor.cellIndex = 2;
	} else {
		this.cursor.cellIndex = 0;
	}
}

state.moveCursor = function () {
	this.cursor.x = this.mouse.x - this.cursor.width * 0.5;
	this.cursor.y = this.mouse.y - this.cursor.height * 0.5;

	this.cursorBounds.x = this.mouse.x;
	this.cursorBounds.y = this.mouse.y;
}

state.drawLines = function () {
	var params = {
		state: this,
		x: 0,
		y: 100,
		strokeColor: [ 1.0, 0, 0 ],
		strokeWidth: 3,
		points: [ [ 0, 0 ], [ this.game.stage.width, 0 ] ]
	};

	this.line1 = new Kiwi.Plugins.Primitives.Line( params );
	this.addChild( this.line1 );

	params = {
		state: this,
		x: this.game.stage.width * 0.5,
		y: 250,
		strokeColor: [ 1, 0, 0 ],
		strokeWidth: 3,
		points: [ [ 0, 0 ], [ this.game.stage.width * 0.5, 0 ] ]
	};

	this.line2 = new Kiwi.Plugins.Primitives.Line( params );
	this.addChild( this.line2 );

	params = {
		state: this,
		x: 200,
		y: 400,
		strokeColor: [ 1, 0, 0 ],
		strokeWidth: 3,
		points: [ [ 0, 0 ], [ 350, 0 ] ]
	};

	this.line3 = new Kiwi.Plugins.Primitives.Line( params );
	this.addChild( this.line3 );
}

var gameOptions = {
	width: 768,
	height: 512
};

var game = new Kiwi.Game("game-container", "Lines to circle", state, gameOptions);
