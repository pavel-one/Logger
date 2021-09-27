require('dotenv').config({path: __dirname+'/../.env'})

const app = require('express')();
const server = require('http').Server(app);
const io = require('socket.io')(server);
const ioRedis = require('ioredis');

const redis = new ioRedis(process.env.REDIS_PORT, process.env.REDIS_HOST);

redis.subscribe('action-channel-one');
redis.on('message', function (channel, message) {
    message  = JSON.parse(message);
    console.log(channel, message)
    io.emit(channel + ':' + message.event, message.data);
});

server.listen(process.env.BROADCAST_PORT, function () {
    console.log('Socket server is running.');
});
