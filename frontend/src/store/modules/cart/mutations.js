import {
    ADD_ITEMS,
    INC_ITEM,
    DEC_ITEM,
    REMOVE_ITEM,
} from './mutation-types'

export default {
    [ADD_ITEMS](state, item) {
        const itemIndex = state.items.findIndex(el => el.id === item.id) // retrun index arba -1
        console.log(itemIndex)
        if (itemIndex >= 0)
            state.items[itemIndex].count += item.count;
        else
            state.items.unshift(item);
    },

    [INC_ITEM]({ items }, id) {
        const itemIndex = items.findIndex(el => el.id === id)
        items[itemIndex].count++;
    },

    [DEC_ITEM]({ items }, id) {
        const itemIndex = items.findIndex(el => el.id === id)
        if (items[itemIndex].count === 1)
            items.splice(itemIndex, 1);
        else
            items[itemIndex].count--;
    },

    [REMOVE_ITEM](state, id) {
        state.items = state.items.filter(el => el.id !== id);
    },
}