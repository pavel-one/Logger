import io from 'socket.io-client'
const host = `${window.location.hostname}:6001`;

const sock = io(host, {
    extraHeaders: {
        Authorization: "Bearer 1|9iP9wNpiYNzDY0AYuFLF05eioefEaYOKaZNbnPxY"
    }
})

sock.on('logger.event:add', event => {
    console.log('ADD EVENT:', event)
})
