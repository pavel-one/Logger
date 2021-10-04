import Vue from 'vue'
import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';
import App from './App.vue'
import DefaultLayout from './layouts/Default.vue'
import DashboardLayout from './layouts/Dashboard.vue'
import router from './router'
import io from 'socket.io-client'

const host = `${window.location.hostname}:6001`

import './scss/app.scss';

Vue.use(Antd);

Vue.config.productionTip = false

Vue.component("layout-default", DefaultLayout);
Vue.component("layout-dashboard", DashboardLayout);

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')

//SOCKET IO TMP
const sock = io(host, {
    extraHeaders: {
        Authorization: "Bearer 1|9iP9wNpiYNzDY0AYuFLF05eioefEaYOKaZNbnPxY"
    }
})

sock.on('logger.event:add', event => {
    console.log('ADD EVENT:', event)
})
