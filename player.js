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
    this.boostActive = false;

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

        this.checkBounds();
        
    
        // Create a 20x20 square at the provided position
        player.fillRect(this.x,this.y,20,20);
    },
    this.checkBounds = function(){
        if(this.y > 500){
            this.y = 0;
        } else if (this.y < -20){
            this.y = 500;
        }

        if(this.x > 500){
            this.x = 0;
        } else if (this.x < -20){
            this.x = 500;
        }
    },
    this.boost = function(){

    },
    this.noboost = function(){
        
    }
}

function moveLeft(){
    testplayer.velocityX -= 0.5; 
}

function moveRight(){
    testplayer.velocityX += 0.5;
}

function moveUp() {
    testplayer.velocityY -= 0.5;
}

function moveDown(){
    testplayer.velocityY += 0.5;
}

function resetspeed(){
    testplayer.speedX = 0;
    testplayer.speedY = 0;
    testplayer.onCooldown = false;
}

function dash(){
    var prevX = testplayer.velocityX;
    var prevX = testplayer.velocityY;

    testplayer.boostActive = true;
    
    var currentDirection = getDirection();
    console.log(currentDirection);

    switch(currentDirection){
        case "north":
            testplayer.velocityY -= 10;
            break;
        case "north east":
            testplayer.velocityY -= 10;
            testplayer.velocityX += 10;
            break;
        case "east":
            testplayer.velocityX += 10;
            break;
        case "south east":
            testplayer.velocityY += 10;
            testplayer.velocityX += 10;
            break;
        case "south":
            testplayer.velocityY += 10;
            break;
        case "south west":
            testplayer.velocityY += 10;
            testplayer.velocityX -= 10;
            break;
        case "west":
            testplayer.velocityX -= 10;
            break;
        case "north west":
            testplayer.velocityY -= 10;
            testplayer.velocityX -= 10;
            break;
        default:
            break;
    }
}

function getDirection(){
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

$(document).keydown(function(e) {
    if(e.which == 37)
        moveLeft();

    if(e.which == 38)
        moveUp();
        
    if(e.which == 39)
        moveRight();
    
    if(e.which == 40)
        moveDown();
    if(e.which == 81)
        dash();
})
