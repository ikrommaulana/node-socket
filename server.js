// var app = require('express')();
// var http = require('http').createServer(app);
// var io = require('socket.io')(http);

// io.on('connection', function(socket){
//   socket.on("reload-table", function(){
//     socket.broadcast.emit("reload");
//   });

//   console.log('a user connected');
//   socket.on('disconnect', function(){
//     console.log('user disconnected');
//   });
// });

// http.listen(3000, '0.0.0.0' ,function(){
//   console.log('listening on *:3000');
// });

var socket = require('socket.io');
var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = socket.listen( server );
var port = process.env.PORT || 3000;
server.listen(port, function () {
	console.log('Server listening at port %d', port);
});
io.on('connection', function (socket) {
	socket.on( 'new_message', function( data ) {
		io.sockets.emit( 'new_message', {
			message: data.message,
			date: data.date,
			msgcount: data.msgcount
		});
	});
});