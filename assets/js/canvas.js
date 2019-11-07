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
        this.canvas.width = 200;
        this.canvas.height = 200;
        //Set the context to render 2d objects
        this.context = this.canvas.getContext("2d");
        //adds the canvas element before the first existing node on the page
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
    },
    //function to clear the canvas of any drawings, used before redrawing
    clear: function() {
        this.canvas.context.clearRect(0, 0, canvas.width, canvas.height);
    }
}