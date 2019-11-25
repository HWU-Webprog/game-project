/*
OLD IMPLEMENTATION

This function creates a canvas element using js rather than creating it in the
index.html file.
This means that it can be loaded with the body, making it easier to set context.
function setCanvas (){
    //Create a canvas variable to draw onto
    var canvas = document.createElement("CANVAS");
    //Set the canvas variable id attribute
    canvas.setAttribute("id", "gameCanvas");
    //Set the context to render 2d objects
    var context = canvas.getContext('2d');
    //This adds the latest created element (the canvas) and appends it as a node onto the webpage.
    document.body.appendChild(canvas);
}
*/

/*
NEW IMPLEMENTATION

This variable is used to represent the canvas
*/
var canvas = {
    // Creates a canvas element on the screen
    canvas: document.createElement("CANVAS"),

    //start function which configures the canvas' attributes
    start: function() {
        // set the canvas to a 200x200 pixel square
        this.canvas.width = 500;
        this.canvas.height = 500;
        //Set the context to render 2d objects
        this.context = this.canvas.getContext("2d");
        //adds the canvas in its container
        this.canvas, document.getElementById('canvasContainer').appendChild(this.canvas);
        //Calls the update() function every 20 milliseconds
        this.interval = setInterval(update, 20);
    },
    //function to clear the canvas of any drawings, used before redrawing
    clear: function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}
