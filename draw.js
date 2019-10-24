/*
This file contains functions to ease drawing on the canvas.
*/

//drawLine takes paramaters X1, Y1, X2, Y2
function drawLine(x1, y1, x2, y2) {
    //Set the context to render 2d objects
    var context = canvas.context;
    //set start point
    context.moveTo(x1, y1);
    //set end point
    context.lineTo(x2, y2);
    //draw line
    context.stroke();
}

//drawCircle takes paramaters centre x, y and radius
function drawCircle(x, y, radius) {
    //Set the context to render 2d objects
    var context = canvas.context;
    //draw arc
    context.beginPath();
    //draw arc with centre x, y and radius r
    context.arc(x, y, radius, 0, 2 * Math.PI);
    //draw arc
    context.stroke();
}

//drawText takes paramaters centre x, y and radius
function drawText(text, font, x, y) {
    //Set the context to render 2d objects
    var context = canvas.context;
    context.font = font;
    //draw text
    context.fillText(text, x, y);
}
