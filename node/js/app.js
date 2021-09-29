import io from 'socket.io-client'
const host = `${window.location.hostname}:6001`;

const sock = io(host)

sock.on('logger.event:add', event => {
    console.log('ADD EVENT:', event)
})
