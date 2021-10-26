<template>
    <v-col sm="6" md="5">
        <v-hover v-slot:default="{ hover }">
            <v-card
                    :class="{ 'on-hover': hover }"
                    :elevation="hover ? 24 : 4"
            >
                <v-img
                        class="white--text align-end"
                        src="@/assets/leftside.jpg"
                        gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                        height="50vh"

                >
                    <v-card-title>Expand your garden</v-card-title>
                </v-img>
                <v-fade-transition>
                    <v-overlay v-if="hover"
                               absolute
                               color="primary">
                        <v-btn to="/plantsgrid/Plants">Search for plants</v-btn>
                    </v-overlay>
                </v-fade-transition>
            </v-card>
        </v-hover>
    </v-col>

</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        name: "LeftHome",
    }
</script>

<style scoped>
    /*.v-card:not(.on-hover) {*/
    /*    opacity: 80%;*/
    /*}*/

    /*.v-card {*/
    /*    transition: opacity .4s ;*/
    /*}*/
</style>