/**
 * This file holds all the functions relating to the player controlled
 * object that is drawn to the canvas
 */

const PLAYER_DIMENSIONS = 50;
// variable to hold the keys pressed by user
var keys = {};

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
    this.velocityX = 0;
    this.velocityY = 0;
    this.tractionAmount = 0.025;
    this.boostActive = false;
    this.myWidth = 20;
    this.myHeight = 20;


    /**
     * Draws Player object on canvas
     */
    this.draw = function() {
            // Set to draw onto the canvas
            player = canvas.context;
            // Set the color of the object to player chosen color
            player.fillStyle = color;

            // Move object relative to velocity
            this.x += this.velocityX;
            this.y += this.velocityY;


            if (!this.boostActive) {
                // keep the player from going past a set speed while boost is not active
                this.speedCap();
            }

            // applies traction to object, constantly slowing it
            this.traction();

            // check if player object has collided with boundaries
            this.checkBounds();

            // Create a 20x20 square at the provided position
            player.fillRect(this.x, this.y, this.myWidth, this.myHeight);
        },

        /**
         * Moves Player object left
         */
        this.checkBounds = function() {

            /***** Bounce *****/
            // y bounces at: 0 , 480
            // x bounces at: 0 , 480
            if (this.y > 480) {
                this.velocityY = -this.velocityY;
            } else if (this.y < 0) {
                this.velocityY = -this.velocityY;
            }

            if (this.x > 480) {
                this.velocityX = -this.velocityX;
            } else if (this.x < 0) {
                this.velocityX = -this.velocityX;
            }

        },
        /**
         * Applies traction to player object, gradually slowing each frame update
         */
        this.traction = function() {
            // checks direction the player is going, makes sure negative or position traction is applied correctly
            if (this.velocityX > 0) {
                this.velocityX -= this.tractionAmount;
            } else if (this.velocityX < 0) {
                this.velocityX += this.tractionAmount;
            }

            if (this.velocityY > 0) {
                this.velocityY -= this.tractionAmount;
            } else if (this.velocityY < 0) {
                this.velocityY += this.tractionAmount;
            }
        },
        // makes sure the player object cannot travel faster than a certain speed
        this.speedCap = function() {
            if (this.velocityX > 5) {
                this.velocityX = 5
            } else if (this.velocityX < -5) {
                this.velocityX = -5;
            }

            if (this.velocityY > 5) {
                this.velocityY = 5;
            } else if (this.velocityY < -5) {
                this.velocityY = -5;
            }
        }
}

// increase velocity to the left
function moveLeft() {
    testplayer.velocityX -= 0.5;
}

// increase velocity to the right
function moveRight() {
    testplayer.velocityX += 0.5;
}

// increase velocity upwards
function moveUp() {
    testplayer.velocityY -= 0.5;
}

// increase velocity downwards
function moveDown() {
    testplayer.velocityY += 0.5;
}

// A function which causes the player to experience a boost in speed for a short time
function dash() {
    var prevX = testplayer.velocityX;
    var prevY = testplayer.velocityY;
    var prevTract = testplayer.tractionAmount;
    var boostAmount = 2.5;

    // set boostActive to true to prevent continued use
    testplayer.boostActive = true;

    // increase traction amount to slow down after boost
    testplayer.tractionAmount *= 2;

    // Multiply the current X and Y velocities by boostAmount
    testplayer.velocityX *= boostAmount
    testplayer.velocityY *= boostAmount


    // set a time for boost to be active, 3 seconds with this function, then return to previous speed
    setTimeout(function() {
        testplayer.boostActive = false;
        testplayer.tractionAmount = prevTract;
    }, 3000);
}

// murder the player
function murder() {
    //murder player and kick them from current game. Maybe respawn
}


// Key is down
$(document).keydown(function(e) {
    // set keys array to true
    keys[e.which] = true;

    // determine which key is being pressed

    // left arrow
    if (keys && keys[37])
        moveLeft();

    // up arrow
    if (keys && keys[38])
        moveUp();

    // right arrow
    if (keys && keys[39])
        moveRight();

    // down arrow
    if (keys && keys[40])
        moveDown();

    // Q, only usable while boost is not active
    if (keys && keys[81] && (!testplayer.boostActive))
        dash();
});

// If a key is no longer being pressed, set keys array to false
$(document).keyup(function(e) {
    keys[e.which] = false;
});
