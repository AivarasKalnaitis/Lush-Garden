<template>
    <div class="container">
<!--        <h2 class="text-center secondary&#45;&#45;text">Your basket</h2>-->

        <div v-if="items.length > 0">
            <v-row justify="center">
                <v-chip class="ma-2" color="secondary" label>Your basket</v-chip>
            </v-row>
            <v-simple-table fixed-header>
                <template v-slot:default>
                <thead>
                <tr>
                    <th class="text-left" colspan="4">Image</th>
                    <th class="text-left" colspan="4">Title</th>
                    <th class="text-left" colspan="2">Price</th>
                    <th class="text-left" colspan="1">Quantity</th>
                    <th class="text-left" colspan="2">Total price</th>
                    <th class="text-left" colspan="2">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <cart-product v-for="({id, src, title, price, count}) in items"
                                  :key="id"
                            class="mb-2"
                            :id="id"
                            :src="src"
                            :title="title"
                            :price="price"
                            :count="count"
                    />
                </tbody>
                </template>
            </v-simple-table>
        </div>
        <v-alert v-else border="bottom" color="secondary" class="text-center white--text">
            Your basket is empty
            <v-icon color="white">mdi-emoticon-sad</v-icon>
        </v-alert>
<!--        <h3 class="text-primary text-center mt-5" v-else>Your basket is empty :o</h3>-->
    </div>
</template>

<script>
    import CartProduct from "@/components/cart/CartProduct.vue";
    import { mapGetters } from "vuex";

    export default {
        components: {
            CartProduct
        },
        computed: {
            ...mapGetters({
                items: "cart/getItems"
            })
        }
    };
</script>

<style lang="scss" scoped>
    th{
        background-color: red;
    }


</style>

