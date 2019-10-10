/*
This file holds all the functions relating to the player controlled
object that is drawn to the canvas
*/

/*
Constructor for a new player object.
@param name, the name of the object, given by controlling player.
@param color, the color of the object, given by controlling player.
@param x, corrosponds to its x position on the canvas, randomly generated
@param y, corrosponds to its y position on the canvas, randomly generated
*/

function player(name, color, x, y){
    this.speedX = 0;
    this.speedY = 0;
    this.name = name;
    this.color = color;
    this.x = x;
    this.y = y;

    // This function will draw the player object on to the canvas
    this.draw = function(){
        // Set to draw onto the canvas
        player = canvas.context;
        // Set the color of the object to player chosen color
        player.fillStyle = color;
        // Create a 20x20 square at the provided position
        player.fillRect(this.x,this.y,20,20);
    },

    this.moveLeft = function(){
        this.x -= this.speedX;
    },
    this.moveRight = function(){
        this.x += this.speedX;
    },
    this.moveUp = function(){
        this.y -= this.speedY;
    },
    this.moveDown = function(){
        this.y += this.speedY;
    }
}
