import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from './backend/vue-axios/axios'

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@/assets/css/main.css'

Vue.config.productionTip = false

new Vue({
  router,
  axios,
  render: h => h(App)
}).$mount('#app')
