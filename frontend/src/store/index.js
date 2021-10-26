import Vue from 'vue'
import Vuex from 'vuex'
import plants from './modules/plants/'
import navbar from './modules/navbar/navbar'
import cart from './modules/cart/'
import auth from './modules/auth'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    plants: plants,
    navbar: navbar,
    cart: cart,
    auth: auth,
  }
})
