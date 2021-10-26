import {
    TOGGLE_IS_LOADING,
    CREATE_CATEGORY_FILTERS,
    TOGGLE_FILTER,
    SELECT_ITEMS,
    CHANGE_ITEMS_PER_PAGE_OPTION,
    CHANGE_SORT_OPTION,
    SORT_ITEMS,
    SELECT_PAGE_ITEMS,
    SET_ITEM_COUNT,
    CREATE_PAGINATION,
    SET_PAGE,
    ADD_ITEMS,
    SET_SEARCH_QUERY,
    REFRESH_QUERY,
} from './mutation-types'
import api from '@/api/api.js';
import router from "../../../router";

export default {
    async fetchItems({ commit, dispatch }) {
        commit(TOGGLE_IS_LOADING);
        await api.fetchItems(
            (items) => {
                commit(ADD_ITEMS, items);
                commit(CREATE_CATEGORY_FILTERS);
                dispatch('selectItems');
                commit(TOGGLE_IS_LOADING);
            },
            (errors) => {
                errors.forEach(element => {
                    console.log(element);
                })
            }
        )
        // api.getOrders(
        //   (data) => console.log(data),
        //   (errors) => {
        //     errors.forEach(msg => console.error(msg))
        //   }
        // )
    },

    async fetchItemsSearch({ commit, dispatch }, filter) {
        if(router.currentRoute.path !== '/plantsgrid')
            await router.push({path:"/plantsgrid/" + filter})
        commit(TOGGLE_IS_LOADING);
        await api.fetchItemsSearch(
            filter,

            (items) => {
                commit(SET_SEARCH_QUERY, filter);
                commit(ADD_ITEMS, items);
                commit(CREATE_CATEGORY_FILTERS);
                dispatch('selectItems');
                commit(TOGGLE_IS_LOADING);
                console.log('GERAS')
            },

            (errors) => {

                errors.forEach(element => {
                    console.log(element);
                    console.log('dafuk blogai')
                })
            }
        )
    },

    refreshQuery ({commit, dispatch}) {
      commit(REFRESH_QUERY);
      dispatch('fetchItems');
    },

    filterItems({ commit, dispatch }, filterName) {
        commit(TOGGLE_FILTER, filterName);
        dispatch('selectItems');
    },

    changeItemsPerPageOption({ commit, dispatch }, itemsPerPage) {
        commit(CHANGE_ITEMS_PER_PAGE_OPTION, itemsPerPage);
        commit(SET_PAGE, 1);
        dispatch('selectItems');
    },

    changeSortOption({ commit, dispatch }, name) {
        commit(CHANGE_SORT_OPTION, name);
        dispatch('selectItems');
    },

    setPage({ commit, dispatch }, page) {
        commit(SET_PAGE, page);
        dispatch('selectItems');
    },

    selectItems({ commit }) {
        commit(SELECT_ITEMS);
        commit(SET_ITEM_COUNT);
        commit(SORT_ITEMS);
        commit(SELECT_PAGE_ITEMS);
        commit(CREATE_PAGINATION);
    }
};