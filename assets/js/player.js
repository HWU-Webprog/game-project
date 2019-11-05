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
    this.name = name;
    this.color = color;
    this.x = x;
    this.y = y;

    /**
     * Draws Player object on canvas
     */
    this.draw = function() {
        // Set to draw onto the canvas
        playerDraw = canvas.context;
        // Set the color of the object to player chosen color
        playerDraw.fillStyle = color;
        // Create a 20x20 square at the provided position
        playerDraw.fillRect(x, y, 20, 20);
    },

    /**
     * Moves Player object left
     */
    this.moveLeft = function() {
        this.x -= 5;
    }
}
