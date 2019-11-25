// set up server requirements
var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

// send the chat page
app.get('/', (req, res) => {
    
    res.sendFile(__dirname + "/chat.html");
});

io.on('connection', (socket) => {
    io.emit('user connected');
    
    socket.on('disconnect', () => {
        io.emit('user disconnected');
    })
    socket.on('chat message', (msg) => {
        io.emit('chat message', msg);
    })
})

// port to listen to
http.listen(3000, () => {
    console.log("server on *:3000");
});

