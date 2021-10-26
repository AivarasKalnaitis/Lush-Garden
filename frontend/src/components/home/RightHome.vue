<template>
    <v-col  md="5" sm="6">
        <v-hover v-slot:default="{ hover }">
            <v-card
                    :class="{ 'on-hover': hover }"
                    to="maintenancegrid"
                    :elevation="hover ? 24 : 4"
            >
                <v-img
                        class="white--text align-end"
                        src="@/assets/rightside.jpg"
                        gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                        height="50vh"
                >
                    <v-card-title>Maintain your garden</v-card-title>
                </v-img>
                <v-fade-transition>
                    <v-overlay v-if="hover"
                               absolute
                               color="primary">
                        <v-btn to="/maintenancegrid">Look for equipment</v-btn>
                    </v-overlay>
                </v-fade-transition>
            </v-card>
        </v-hover>
    </v-col>
</template>

<script>
    export default {
        name: "RightHome"
    }
</script>

<style scoped>
    /*.v-card:not(.on-hover) {*/
    /*    opacity: 90%;*/
    /*}*/

    /*.v-card {*/
    /*    transition: opacity .4s ;*/
    /*}*/
</style>