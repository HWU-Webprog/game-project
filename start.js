/*
This file is for holding the functions used to set up many other
elements of the site.
*/

// Draw the canvas and draw a player object
function start() {
  canvas.start();
        // Calls the Username and Colour from the Starts screen text box and drop down menu
  var testplayer = new Player(document.getElementById('USERNAME').value, document.getElementById('COLOUR').value, 50, 50);
  testplayer.draw();

  // See drawLine call example below.
  drawLine(0,0,100,100)
}
