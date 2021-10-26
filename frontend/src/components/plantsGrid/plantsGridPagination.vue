<template>
    <v-pagination  v-model="pagination.currentPage"
                   :length="pagination.pages.length"
                   :total-visible="5"
                   @input="catchPage"
                   class="mb-16"
    ></v-pagination>
</template>

<script>
    import { mapGetters, mapActions } from "vuex";

    export default {
        computed: mapGetters("plants", {
            pagination: "getPagination"
        }),
        methods: {
            ...mapActions("plants", {
                setPage: 'setPage'
            }),
            catchPage(number) {
                this.setPage(number)
            }
        }
    };
</script>


<style lang="scss" scoped>
    .grid__pagination {
        margin-top: 0.5rem;
        grid-area: pagination;
    }
    .btn--pagination {
        margin: 0 0.5rem;
        height: 2.5rem;
        width: 2.5rem;
        text-align: center;
        line-height: 1.5rem;
    }
</style>