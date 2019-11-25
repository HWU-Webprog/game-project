// set up server requirements
var express = require('express');
var app = express();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

// point to where the static files are held, js and css
app.use(express.static(__dirname + '/public'));

// send the chat page
app.get('/', (req, res) => {
    
    res.sendFile(__dirname + "/chat.html");
});

// when connection is made by a user
io.on('connection', (socket) => {
    // user connected event sent out
    io.emit('user connected');
    
    // when a user disconnects, send a user disconnected event sent out
    socket.on('disconnect', () => {
        io.emit('user disconnected');
    })
    // when a user sends a chat message, this event sends the message to all other users
    socket.on('chat message', (msg) => {
        io.emit('chat message', msg);
    })
})

// port to listen to
http.listen(3000, () => {
    console.log("server on *:3000");
});

