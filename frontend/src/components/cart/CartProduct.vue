<template>
    <tr>
        <td colspan="4">
            <v-img :src="src" class="cart-item__img" :alt="title"/>
        </td>
        <td colspan="4">{{title}}</td>
        <td colspan="2">{{price}} €</td>
        <td colspan="1">{{count}}</td>
        <td colspan="2">{{total}}</td>
        <td colspan="2">
            <div class="d-flex justify-content-between">
                <v-btn small color="secondary" @click="increase(id)">+</v-btn>
                <v-btn small color="accent" @click="decrease(id)">-</v-btn>
                <v-btn small color="warning" @click="deleteItem(id)">
                    <v-icon size="1rem">mdi-delete</v-icon>
                </v-btn>
            </div>
        </td>
    </tr>
</template>

<script>
    import {mapMutations} from 'vuex'

    export default {
        props: {
            id: Number,
            src: String,
            title: String,
            count: Number,
            price: Number,
        },
        computed:{
            total(){
                return (this.price * this.count).toFixed(2) + ' €';
            }
        },
        methods: {
            ...mapMutations("cart", {
                increase: 'INC_ITEM',
                decrease: 'DEC_ITEM',
                deleteItem: 'REMOVE_ITEM',
            })
        },

    };
</script>

<style lang="scss" scoped>
    .cart-item {
        height: 70px;
        &__img {
            height: 80%;
            width: 70px;
        }
    }
</style>