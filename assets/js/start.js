/**
 * This file is for holding the functions used to set up many other
 * elements of the site.
 */

/**
 * Function to draw the canvas and draw a player object
 */
function start() {
    canvas.start();
    var testplayer = new Player("TestName", "blue", 50, 50);
    testplayer.draw();

    // See drawLine call example below.
    drawLine(0, 0, 100, 100)
}
