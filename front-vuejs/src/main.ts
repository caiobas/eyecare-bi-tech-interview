import Vue from "vue";
import { BootstrapVue, IconsPlugin, ToastPlugin } from "bootstrap-vue";
import store from "./store/index";

import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

import VueTheMask from "vue-the-mask";

import App from "./App.vue";
import router from "./router";

import "./assets/main.css";

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(ToastPlugin);
Vue.use(Toast);
Vue.use(VueTheMask);

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
