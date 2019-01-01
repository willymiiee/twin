import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import BootstrapVue from 'bootstrap-vue'
import { Circle8 } from 'vue-loading-spinner'

Vue.use(BootstrapVue)
Vue.component('circle8', Circle8)
Vue.prototype.$http = axios.create({
  baseURL: process.env.VUE_APP_API_URL,
  headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
})
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
