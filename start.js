
/**
 * This file is for holding the functions used to set up many other
 * elements of the site.
 */
var testplayer


/**
 * Function to draw the canvas and draw a player object
 */
function start() {
  canvas.start();
  testplayer = new player("TestName", "blue", 50, 50);
}

// Updates the canvas every 20 ms
function update(){
  canvas.clear();
  testplayer.y -= 1;
  testplayer.draw();
}
