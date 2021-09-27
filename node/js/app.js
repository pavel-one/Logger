import Echo from "laravel-echo";

window.io = require('socket.io-client')

const echo = new Echo({
    broadcaster: 'socket.io',
    host: `${window.location.hostname}:6001`,
});

console.log('INJECTED')

echo.channel('logger.event')
    .listen('LogEvent', e => {
        console.log('test', e)
    })

console.log(echo)
