/*
This file is for holding the functions used to set up many other
elements of the site.
*/

// Draw the canvas and draw a player object
function start() {
  canvas.start();
  var testplayer = new Player("TestName", "blue", 50, 50);
  testplayer.draw();
}
