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
function PlayerObj(name, color, x, y){
    this.name = name;
    this.color = color;
    this.x = x;
    this.y = y;

    var canvas = document.getElementById("gameCanvas");
    var ctx = canvas.getContext("2d");
    ctx.fillStyle = color;
    ctx.fillRect(x,y, 20, 20);
}
