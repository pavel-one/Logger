const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const ioRedis = require('ioredis');
const redis = new ioRedis(6379, 'redis');
const { Server } = require('socket.io');
const io = new Server();


redis.subscribe('logger.event');
redis.on('message', function (channel, message) {
    message  = JSON.parse(message);
    console.log('CHANNEL: ', channel + ':' + message.event, 'DATA:', message.data)
    io.emit(channel + ':' + message.event, message.data);
});

io.on('connection', (socket) => {
    console.log('a user connected');
});

io.listen(6001);
