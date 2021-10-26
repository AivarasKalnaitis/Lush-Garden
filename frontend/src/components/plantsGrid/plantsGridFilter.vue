<template>
    <v-container fluid dark>
        <plants-grid-filter-categories/>
<!--        <plants-grid-slider/>-->
    </v-container>
</template>

<script>
    import PlantsGridSlider from "./plantsGridSlider";
    import PlantsGridSort from "./plantsGridSort";
    import PlantsGridFilterCategories from "./plantsGridFilterCategories";
    export default {
        name: "plantsGridFilter",
        components: {PlantsGridFilterCategories, PlantsGridSort, PlantsGridSlider},
    }
</script>

<style lang="scss" scoped>
    .header .headerCount{
        text-align: center;
    }
    .headerCount {
        color: grey;
        margin-left: 2px;
    }
</style>