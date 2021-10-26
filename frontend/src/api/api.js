import axios from 'axios';


const API_URL = 'http://127.0.0.1:8000/api/';

export default {
    login: async (body, success, failure) => {
        try {
            const response = await api().post('auth/login', body);
            success(response.data);
        } catch (context) {
            let errorsMessages = [];
            const { errors } = context.response.data;
            for (const errorName in errors) {
                errorsMessages = [...errorsMessages, ...errors[errorName]];
            }
            failure(errorsMessages);
            swal({
                text: errorsMessages[0],
                icon: "error",
              });
            
        }
    },

    register: async (body, success, failure) => {
        try {
            const response = await api().post('auth/register', body);
            success(response.data);
            swal({
                text: "Registered, now login !",
                icon: "success",
              });
              
        } catch (context) {
            console.dir(context)
            let errorsMessages = [];
            const { errors } = context.response.data;
            for (const errorName in errors) {
                errorsMessages = [...errorsMessages, ...errors[errorName]];
            }
            failure(errorsMessages);
            swal({
                text: errorsMessages[0],
                icon: "error",
              });
        }
    },

    getUser: async (success, failure) => {
        try {
            const response = await api().get('auth/user');
            success(response.data);
        } catch (context) {
            let errorsMessages = [];
            const { errors } = context.response.data;
            for (const errorName in errors) {
                errorsMessages = [...errorsMessages, ...errors[errorName]];
            }
            failure(errorsMessages);
        }
    },

    getOrders: async (success, failure) => {
        try {
            const response = await api().get('order');
            success(response.data);
        } catch (context) {
            let errorsMessages = [];
            const { errors } = context.response.data;
            for (const errorName in errors) {
                errorsMessages = [...errorsMessages, ...errors[errorName]];
            }
            failure(errorsMessages);
        }
    },

    fetchItems: async (success, failure) => {
        try {
            const response = await api().get('products');
            console.log(response);
            // --------------------------- PAKITIMAI DAROME, NES BACKEND ATSIUNCIA KITOKIUS DUOMENIS NEI TIKETASI
            const data = response.data.map(el => ({
                    categories: el.categories,
                    description: el.description,
                    id: el.id,
                    src: el.images[el.images.length - 1],
                    in_stock: el.inStock,
                    title: el.name,
                    price: el.price,
                    vat: Number(el.vat),
                }
            ));
            // --------------------------- PAKITIMAI DAROME, NES BACKEND ATSIUNCIA KITOKIUS DUOMENIS NEI TIKETASI
            success(data);
        } catch (error) {
            console.log(error);
        }
    },


    fetchItemsSearch: async (search, success, failure) => {
        try {
            const response = await api().get('search?query=' + search);
            console.log(response.data.items)

            const data = response.data.items.map(el => ({
                    title: el.name,
                    categories: el.categories,
                    description: el.description,
                    id: el.id,
                    src: el.images[el.images.length - 1],
                    in_stock: el.inStock,
                    price: el.price,
                    vat: el.vat
                }
            ));

            success(data);
        } catch (context) {
            let errorsMessages = [];
            const {errors} = context.response.data;
            for (const errorName in errors) {
                errorsMessages = [...errorsMessages, ...errors[errorName]];
            }
            failure(errorsMessages);
        }
    }
}

function api() {
    if (localStorage.authToken) {
        // Automatiškai grąžinamas autorizuotas axios instance,
        const { token_type, token } = JSON.parse(localStorage.authToken);
        return axios.create({
            baseURL: API_URL,
           
        })
    } else {
        // Automatiškai grąžinamas NEautorizuotas axios instance,
        return axios.create({
            baseURL: API_URL,
        })
    }
}
