/**
 * This file is for holding the functions used to set up many other
 * elements of the site.
 */
var testplayer

// When the join game button is pressed, the menu is hid
$(document).ready(function(){
    $("#joinGame").click(function(){
        $("#main").hide();
    })
})

/**
 * Function to draw the canvas and draw a player object
 */
function start() {
    canvas.start();
    // Calls the Username and Colour from the Starts screen text box and drop down menu (right now just holds test variables)
    testplayer = new Player("test","RED", 50, 50);
    testplayer.draw();
}

// Updates the canvas every 20 ms
function update() {
    canvas.clear();
    testplayer.draw();
}
