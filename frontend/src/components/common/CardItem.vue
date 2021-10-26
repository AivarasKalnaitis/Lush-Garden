<template>
    <div class="card-item">
        <v-hover v-slot:default="{ hover }">
            <v-card :class="{ 'on-hover': hover }"
                    :elevation="hover ? 24 : 4">
                <img :src="src" />
<!--                <v-card-subtitle v-text="price + ' €'"></v-card-subtitle>-->
                <v-card-subtitle v-text="title"></v-card-subtitle>
                <v-fade-transition>
                    <v-overlay v-if="hover"
                               absolute
                               color="primary">
                        <v-btn @click="$router.push({path: 'plant/' + id, })">More</v-btn>
                    </v-overlay>
                </v-fade-transition>
            </v-card>
        </v-hover>
    </div>
</template>

<script>
    export default {
        name: "CardItem",
        props: ['id', 'src', 'price', 'height', 'width', 'categories', 'title']
    };
</script>

<style scoped lang="scss">
    .card-item {
        display: block;
        font-size: .8rem;
        cursor: pointer;
        img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
        &__price {
            font-weight: bold;
            font-size: 1.17em;
            &:after {
                content: " €";
            }
        }
        .price + * {
            font-style: italic;
        }
        &__brand {
            font-style: italic;
            font-weight: bold;
        }
    }
</style>