/**
 * This file holds all the functions relating to the player controlled
 * object that is drawn to the canvas
 */

/**
 * Constructor for new Player object
 *
 * @class      Player
 * @param      {string}  name   Player username
 * @param      {string}  color  Player color
 * @param      {int}  x         Starting X coord
 * @param      {int}  y         Starting Y coord
 */
function Player(name, color, x, y) {
    this.speedX = 0;
    this.speedY = 0;
    this.name = name;
    this.color = color;
    this.x = x;
    this.y = y;
    this.onCooldown = false;

    /**
     * Draws Player object on canvas
     */
    this.draw = function() {
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
    },
    this.resetspeed = function(){
        this.speedX = 0;
        this.speedY = 0;
        this.onCooldown = false;
    },
    this.dash = function(){
        if (this.onCooldown == false) {
            this.speedX = 2*this.speedX;
            this.speedy = 2*this.speedy;

            this.onCooldown = true;

            setInterval(this.resetspeed, 2000);
        }
    }
}
