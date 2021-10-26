<template>
    <v-container class="mb-16">
        <v-row class="pt-5" align="center" justify="center">
            <v-col md="10" lg="8">
                <plant-details :item="item" />
                <plant-order-panel :item="item"/>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import PlantDetails from "../components/plant/PlantDetails";
    import PlantOrderPanel from "../components/plant/plantOrderPanel";

    export default {
        created() {
            this.$store.dispatch('plants/fetchItems')
        },
        name: "Plant",
        props: ['id'],
        computed: {
            item() {
                return this.$store.getters['plants/getItemById'](this.id);
            }
        },
        components: {PlantOrderPanel, PlantDetails}
    }
</script>

<style scoped>
 v-container {
     padding-top: 3rem;
 }
</style>