<template>
    <div class="grid mb-16">
        <card-item v-for="{id, src, price, categories, title} in items"
                   :key="id"
                   :id="id"
                   :src="src"
                   :price="price"
                   :categories="categories"
                   :title="title"
        />
    </div>
</template>

<script>
    import CardItem from "../common/CardItem";
    export default {
        name: "HomeItems",
        components: {CardItem},
        props: ['items']
    }
</script>

<style scoped>
    .grid {
        margin-top: 2rem;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        column-gap: 1rem;
        row-gap: 2rem;
    }
</style>