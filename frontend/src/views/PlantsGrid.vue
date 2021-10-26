<template>
    <v-container>
        <div v-if="isLoading">
            <v-img src="@/assets/loading.gif"></v-img>
        </div>
        <div v-else>
            <v-row>
                <v-col>
                    <plants-grid-header/>
                </v-col>
            </v-row>
            <v-row>
                <v-col xl="2" lg="3" md="4" sm="5" xs="2">
                    <plants-grid-filter/>
                </v-col>
                <v-col xl="10" lg="9" md="8" sm="7" xs="10">
                    <plants-list/>
                </v-col>
            </v-row>
            <plants-grid-pagination/>
        </div>
    </v-container>
</template>

<style scoped>

</style>
<script>
    import PlantsList from "../components/plantsGrid/plantsList";
    import PlantsGridFilter from "../components/plantsGrid/plantsGridFilter";
    import PlantsGridHeader from "../components/plantsGrid/plantsGridHeader";
    import {mapGetters} from  'vuex'
    import PlantsGridPagination from "../components/plantsGrid/plantsGridPagination";

    export default {
        created() {
            this.$store.dispatch('plants/fetchItems')
        },
        components: {PlantsGridPagination, PlantsGridHeader, PlantsGridFilter, PlantsList},
        computed: mapGetters({
            isLoading: 'plants/getIsLoading'
        })
    }
</script>