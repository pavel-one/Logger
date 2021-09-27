console.log('INJECTED')


import Echo from "laravel-echo";

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});

window.Echo.channel('notification.logger')
    .listen('logger.add', (e) => {
        console.log(e);
    });
