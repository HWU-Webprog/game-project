/**
 * This file holds all the functions relating to the player controlled
 * object that is drawn to the canvas
 */

// enum for direction
const direction = {
    N: 'north',
    NE: 'north east',
    E: 'east',
    SE: 'south east',
    S: 'south',
    SW: 'south west',
    W: 'west',
    NW: 'north west',
    DEFAULT: 'stationary'
}

// array for holding keys pressed
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


        if(!this.boostActive){
            // keep the player from going past a set speed while boost is not active
            this.speedCap(); 
        }

        // applies traction to object, constantly slowing it
        this.traction();

        // check if player object has collided with boundaries
        this.checkBounds();       
    
        // Create a 20x20 square at the provided position
        player.fillRect(this.x,this.y,this.myWidth,this.myHeight);
    },
    /**
     * If the player moves out of bounds of the canvas, loop
     */
    this.checkBounds = function(){
        /***** Wrapping *****/
        /*
        if(this.y > 500){
            this.y = 0;
        } else if (this.y < -20){
            this.y = 500;
        }

        if(this.x > 500){
            this.x = 0;
        } else if (this.x < -20){
            this.x = 500;
        }*/

        /***** Bounce *****/
        // y bounces at: 0 , 480
        // x bounces at: 0 , 480
        if(this.y > 480){
            this.velocityY = -this.velocityY;
        } else if (this.y < 0){
            this.velocityY = -this.velocityY;
        }

        if(this.x > 480){
            this.velocityX = -this.velocityX;
        } else if (this.x < 0){
            this.velocityX = -this.velocityX;
        }
        
    },
    this.traction = function(){
        if(this.velocityX > 0){
            this.velocityX -= this.tractionAmount;
        } else if (this.velocityX < 0){
            this.velocityX += this.tractionAmount;
        }

        if(this.velocityY > 0){
            this.velocityY -= this.tractionAmount;
        } else if (this.velocityY < 0){
            this.velocityY += this.tractionAmount;
        }
    },
    this.speedCap = function(){
        if (this.velocityX > 5){
            this.velocityX = 5
        } else if (this.velocityX < -5){
            this.velocityX = -5;
        }

        if (this.velocityY > 5){
            this.velocityY = 5;
        } else if (this.velocityY < -5){
            this.velocityY = -5;
        }
    }
}

// increase velocity to the left
function moveLeft(){
    testplayer.velocityX -= 0.5; 
}

// increase velocity to the right
function moveRight(){
    testplayer.velocityX += 0.5;
}

// increase velocity upwards
function moveUp() {
    testplayer.velocityY -= 0.5;
}

// increase velocity downwards
function moveDown(){
    testplayer.velocityY += 0.5;
}

// A function which causes the player to experience a boost in speed for a short time
function dash(){
    var prevX = testplayer.velocityX;
    var prevY = testplayer.velocityY;
    var prevTract = testplayer.tractionAmount;
    var boostAmount = 5;

    testplayer.boostActive = true;
    
    var currentDirection = getDirection();
    console.log(currentDirection);

    // increase traction amount to slow down after boost
    testplayer.tractionAmount = 2 * testplayer.tractionAmount;

    switch(currentDirection){
        case "north":
            testplayer.velocityY -= boostAmount;
            break;
        case "north east":
            testplayer.velocityY -= boostAmount;
            testplayer.velocityX += boostAmount;
            break;
        case "east":
            testplayer.velocityX += boostAmount;
            break;
        case "south east":
            testplayer.velocityY += boostAmount;
            testplayer.velocityX += boostAmount;
            break;
        case "south":
            testplayer.velocityY += boostAmount;
            break;
        case "south west":
            testplayer.velocityY += boostAmount;
            testplayer.velocityX -= boostAmount;
            break;
        case "west":
            testplayer.velocityX -= boostAmount;
            break;
        case "north west":
            testplayer.velocityY -= boostAmount;
            testplayer.velocityX -= boostAmount;
            break;
        default:
            break;
    }

    // set a time for boost to be active, 3 seconds with this function, then return to previous speed
    setTimeout(function(){ 
        testplayer.boostActive = false;
        testplayer.tractionAmount = prevTract;
    }, 3000);
}

/**
 * Function to get the direction the player object is currently travelling in
 */
function getDirection(){
    // variables for easy of readiblity
    var velX = testplayer.velocityX;
    var velY = testplayer.velocityY;

    if(velY < 0){
        if(velX == 0){
            // moving north
            return direction.N;
        } else if(velX > 0){
            // moving north east
            return direction.NE;
        } else if(velX < 0){
            // moving north west
            return direction.NW;
        }
    } else if (velY > 0){
        if (velX == 0){
            // moving south
            return direction.S;
        } else if (velX > 0){
            // moving south east
            return direction.SE;
        } else if (velX < 0){
            // moving south west
            return direction.SW;
        }
    } else if (velY == 0){
        if (velX > 0){
            // moving east
            return direction.E;
        } else if (velX < 0){
            // moving west
            return direction.W;
        } else if (velX == 0){
            return direction.DEFAULT;
        }
    }
}

// Key is down
$(document).keydown(function(e) {
    // set keys array to true
    keys[e.which] = true;

    // determine which key is being pressed

    // left arrow
    if(keys && keys[37])
        moveLeft();

    // up arrow
    if(keys && keys[38])
        moveUp();
        
    // right arrow
    if(keys && keys[39])
        moveRight();
    
    // down arrow
    if(keys && keys[40])
        moveDown();

    // Q, only usable while boost is not active
    if(keys && keys[81] && (!testplayer.boostActive))
        dash();
})

// If a key is no longer being pressed, set keys array to false
$(document).keyup(function(e) {
    keys[e.which] = false;
})
