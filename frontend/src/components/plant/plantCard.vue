<template>
    <v-hover v-slot:default="{ hover }">
        <v-card
                :class="{ 'on-hover': hover }"
                :elevation="hover ? 24 : 4">
            <v-img :src="src"
                   :lazy-src="src"
                   class="white--text align-end"
                   gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            >
                <template v-slot:placeholder>
                    <v-row align="center" justify="center" class="fill-height ma-0 card-image-loader">

                    </v-row>
                </template>
                <v-card-title v-text="price + ' €'"></v-card-title>
                <v-card-subtitle v-text="title" class="white--text"></v-card-subtitle>
            </v-img>
            <v-card-actions>
                <v-btn @click="$router.push({path: '/plant/' + id })">
                    More
                </v-btn>
                <v-spacer></v-spacer>
                <v-btn @click="$emit('add-item-to-cart', id)" icon>
                    <v-icon>mdi-cart-arrow-down</v-icon>
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-hover>
</template>

<script>
    export default {
        name: "plantCard",
        props: ['id','src', 'title', 'price'],
    }
</script>

<style scoped>

</style>