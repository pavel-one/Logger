import io from 'socket.io-client'
const host = `${window.location.hostname}:6001`;

const sock = io(host)

