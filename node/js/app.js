import io from 'socket.io-client'
const host = `${window.location.hostname}:6001`;
import Vue from 'vue'
import VueRouter from 'vue-router'

import App from './views/App'
import Home from './views/Home'
import Hello from './views/Hello'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

const sock = io(host, {
    extraHeaders: {
        Authorization: "Bearer 1|9iP9wNpiYNzDY0AYuFLF05eioefEaYOKaZNbnPxY"
    }
})

sock.on('logger.event:add', event => {
    console.log('ADD EVENT:', event)
})


