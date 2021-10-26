<template>
    <v-container>
        <home-hero/>
        <home-items :items="items"/>
    </v-container>
</template>

<script>
    import HomeHero from "../components/landing/LandingHero";
    import HomeItems from "../components/landing/LandingItems";
    import {mapGetters} from 'vuex'

    export default {
        name: "Landing",
        components: {HomeItems, HomeHero},
        computed: {
            ...mapGetters({
                items: 'plants/getHomeItems'
            })
        }
    }
</script>

<style scoped>

</style>