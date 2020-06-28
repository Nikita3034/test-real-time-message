var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');

var redis = new Redis();

http.listen(3000);

redis.psubscribe('*');

redis.on('pmessage', function(pattern, channel, message) {

    message = JSON.parse(message);

    io.emit(channel + ':' + message.event, message.data);
});