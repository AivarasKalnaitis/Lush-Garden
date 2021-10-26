import {ADD_ITEMS} from './mutation-types'

export default {
    addItems({ commit }, item) {
        commit(ADD_ITEMS, item);
    }
    // addItem
}