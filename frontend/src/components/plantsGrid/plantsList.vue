<template>
    <v-container>
        <v-row>
            <v-col v-for="card in plants"
                   xl="2"
                   lg="3"
                   md="4"
                   sm="6"
                   xs="12"
            >
                <plant-card :key="card.id"
                            :id="card.id"
                            :src="card.src"
                            :title="card.title"
                            :price="card.price"
                            @add-item-to-cart="addToCartById"
                />
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import { mapGetters, mapMutations } from 'vuex'
    import PlantCard from "../plant/plantCard";

    export default {
        name: "plants-list",
        components: {PlantCard},
        computed: {
            ...mapGetters({
                plants: 'plants/getSelectedItems',
            }),
        },
        methods: {
            ...mapMutations({
                addItems: "cart/ADD_ITEMS"
            }),
            addToCartById(id) {
                const item = this.plants.find(el => el.id === id);
                this.addItems({
                    ...item,
                    count: 1
                });
            }
        }
    }
</script>

<style scoped>

</style>