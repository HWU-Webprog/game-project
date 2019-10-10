/*
This function creates a canvas element using js rather than creating it in the
index.html file.
This means that it can be loaded with the body, making it easier to set context.
*/
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
