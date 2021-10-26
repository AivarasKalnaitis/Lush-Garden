import {
    LOGIN_SUCCESS,
    SET_EMAIL,
    LOGOUT_SUCCESS,
} from './mutation-types'
import api from '@/api/api.js'
import router from '@/router/index.js';

export default {
    async login({ dispatch, commit }, { email, pass }) {
        await api.login(
            {
                email: email,
                password: pass
            },
            (tokenData) => {
                dispatch('saveToken', tokenData);
                commit(LOGIN_SUCCESS);
                router.push({ path: "/" })
            },
            (errors) => {
                console.log(errors);
            }
        )
    },

    async register({ dispatch }, payload) {
        await api.register(
            {
                name: payload.name,
                email: payload.email,
                password: payload.password,
                'password_confirmation': payload.passwordRepeat
            },
            (tokenData) => {
                dispatch('saveToken', tokenData);
                router.push({ path: "/authtest" }).catch(()=>{})
            },
            (errors) => {
                console.log(errors);
            }
        );
    },

    saveToken(context, tokenData) {
        localStorage.authToken = JSON.stringify(tokenData);
    },

    async logout({commit}) {
        localStorage.removeItem('authToken');
        commit(LOGOUT_SUCCESS);
        router.push({ path: "/" })
    },

    saveDataToLocalStorage({ commit }, email) {
        commit(LOGIN_SUCCESS);
        commit(SET_EMAIL, email);
    },

    loginSuccess({ commit }, { email, token }) {
        localStorage.setItem('token', token);
        commit(LOGIN_SUCCESS);
        commit(SET_EMAIL, email);
    }
}