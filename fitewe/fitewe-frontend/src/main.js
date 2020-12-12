import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "./backend/vue-axios/axios";
import store from "./store/index";
import VueAgile from "vue-agile";

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import "@/assets/css/main.css";

Vue.use(VueAgile);
Vue.config.productionTip = false;

new Vue({
  router,
  axios,
  store,
  render: h => h(App)
}).$mount("#app");
