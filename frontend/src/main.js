import Vue from 'vue'
import App from './App.vue'
import 'bootstrap'
import router from './router'
import vuetify from './plugins/vuetify'
import store from './store'
import VueSwal from 'vue-swal'

Vue.config.productionTip = false
Vue.use(VueSwal)

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount('#app')
