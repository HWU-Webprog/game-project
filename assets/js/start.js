/**
 * This file is for holding the functions used to set up many other
 * elements of the site.
 */
var testplayer

// When the join game button is pressed, the menu is hid
$(document).ready( () => {
    $("#joinGame").click(() => {
        // hides the menu div
        $("#main").hide();
        // creates a player object using the values in the USERNAME textfield and COLOUR selection form. Size is standard 50 pixels
        testplayer = new Player($("#USERNAME").val(), $("#COLOUR").val() , PLAYER_DIMENSIONS, PLAYER_DIMENSIONS);
        canvas.start();
        testplayer.draw();
    });
});

// Updates the canvas every 20 ms
function update() {
    canvas.clear();
    testplayer.draw();
}
