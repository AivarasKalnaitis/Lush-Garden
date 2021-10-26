<template>
    <v-container>
        <v-row align="center" class="ml-3">
            <h1 class="header">{{ searchQuery? searchQuery: 'All plants' }}</h1>
            <span class="text-muted h3 ml-2 align-self-center display-1">({{count}})</span>
        </v-row>
        <plants-grid-sort/>
    </v-container>
</template>

<script>
    import { mapGetters } from 'vuex'
    import PlantsGridSort from "./plantsGridSort";
    import PlantsGridFilter from "./plantsGridFilter";

    export default {
        name: "plantsGridHeader",
        components: {PlantsGridFilter, PlantsGridSort},
        computed: {
          ...mapGetters({
              count: 'plants/getItemCount',
              searchQuery: 'plants/getSearchQuery',
          })
        },
    }
</script>

<style lang="scss" scoped>

</style>