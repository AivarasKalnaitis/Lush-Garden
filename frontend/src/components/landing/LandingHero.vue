<template>
    <v-card class="hero" elevation="24">
        <div class="hero__content pl-5">
            <div class="hero__content__header">Time to build your new garden !</div>
            <router-link class="btn btn-primary btn-lg" to="/shop"></router-link>
            <v-btn color="primary" to="/plantsgrid/Plants">Look for plants</v-btn>
        </div>
        <div class="hero__bg">
            <img src="~@/assets/landing/rightside.jpg" class="hero__bg__picture">
            <img src="~@/assets/landing/overlay.svg" class="hero__bg__overlay"/>
        </div>
    </v-card>
</template>

<script>
    export default {
        name: "HomeHero"
    }
</script>

<style lang="scss" scoped>
    .hero {
        display: flex;
        justify-content: space-between;
        &__content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            &__header{
                font-size: 2rem;
            }
            .btn{
                align-self: start;
                margin-top: 2rem;
            }
        }

        &__bg {
            height: 550px;
            width: 1000px;
            position: relative;
            &__picture {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            &__overlay {
                position: absolute;
                display: block;
                top: 0;
                bottom: 0;
                left: 0;
                width: 70px;
                z-index: 50;
            }
        }
    }
</style>