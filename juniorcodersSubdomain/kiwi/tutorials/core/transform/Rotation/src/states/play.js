var Rotation = Rotation || {};

Rotation.Play = new Kiwi.State('Play');

/**
* The PlayState in the core state that is used in the game. 
*
* It is the state where majority of the functionality occurs 'in-game' occurs.
* 
*/


/**
* This create method is executed when a Kiwi state has finished loading any resources that were required to load.
*/
Rotation.Play.create = function () {
  	this.name = new Kiwi.GameObjects.StaticImage(this, this.textures.kiwiName, 10, 10);
	  this.addChild(this.name);

    /**
    * When you want to scale an entity down you can access the transform property that is located on every entity. 
    * Note: Some entities have the scaleX/scaleY aliased for ease of use.
    **/
    
    //create the snake
    this.snakeA = new Kiwi.GameObjects.Sprite(this, this.textures.snake, 50, 100);                 
    this.addChild(this.snakeA);

    //create the seconds snake
    this.snakeB = new Kiwi.GameObjects.StaticImage(this, this.textures.snake, 400, 250);
    this.addChild(this.snakeB); 

    /**
    * In order to change the rotation point you have to go to the transform object. 
    * Note that the coordinates here are in relation to the entities coordinates. 
    * E.g. 0,0 will be the top left corner of the entity.
    *
    * By default the rotation point is the center.
    **/
    this.snakeB.transform.rotPointX = 0;
    this.snakeB.transform.rotPointY = 0;

    this.snakes = new Kiwi.Group(this);
    
    this.snakes.x = 500;
    this.snakes.y = 370;

    var s1 = new Kiwi.GameObjects.Sprite(this, this.textures.snake, 100, 0);
    var s2 = new Kiwi.GameObjects.Sprite(this, this.textures.snake, -100, 0);
    
    this.snakes.addChild(s1);
    this.snakes.addChild(s2);

    this.addChild(this.snakes);
  
}

Rotation.Play.update = function(){
  this.snakes.rotation += 0.05;

  /**
  * Rotate the sprites by 1 degree in opposite directions.
  **/
  this.snakeA.transform.rotation += Kiwi.Utils.GameMath.degreesToRadians(1);
  this.snakeB.rotation -= Kiwi.Utils.GameMath.degreesToRadians(1); // shortcut/shorthand
}




