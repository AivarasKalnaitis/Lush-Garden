<template>
    <v-col  md="10">
    <v-hover v-slot:default="{ hover }">
            <v-card
                    :class="{ 'on-hover': hover }"
                    :elevation="hover ? 24 : 4"
            >
                <v-img
                        class="white--text align-end mb-16"
                        src="@/assets/contact_us.jpg"
                        gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                >
                    <v-card-title>Contact Us</v-card-title>
                </v-img>
                <v-fade-transition>
                    <v-overlay v-if="hover"
                               absolute
                               color="primary">
                        <v-btn to="/contactus">Go to information page</v-btn>
                    </v-overlay>
                </v-fade-transition>
            </v-card>
        </v-hover>
    </v-col>
</template>

<script>
    export default {
        name: "BottomHome"
    }
</script>

<style scoped>

</style>