const {readFileSync} = require("fs");
const {createSecureServer} = require("http2");
const {Server} = require("socket.io");
require('dotenv').config({path: __dirname + '/../.env'})

const ioRedis = require('ioredis');
const redis = new ioRedis(6379, 'redis');


redis.subscribe('logger.event');
redis.on('message', function (channel, message) {
    message = JSON.parse(message);
    console.log('CHANNEL: ', channel + ':' + message.event, 'DATA:', message.data)
    io.emit(channel + ':' + message.event, message.data);
});

const httpServer = createSecureServer({
    allowHTTP1: true,
    key: readFileSync(__dirname + '/../docker/cert/privkey.pem'),
    cert: readFileSync(__dirname + '/../docker/cert/fullchain.pem')
});

const io = new Server(httpServer, {
    cors: {
        origin: '*',
        methods: ["GET", "POST"]
    }
});

io.on("connection", (socket) => {
    console.log('CONNECTED!', socket.id)

    socket.on("disconnect", (reason) => {
        console.log('DISCONNECTING', reason.id)
    });

    // socket.disconnect();
});

httpServer.listen(6001);
