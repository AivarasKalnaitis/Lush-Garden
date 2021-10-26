<template>
    <v-row justify="end">
        <v-menu v-if="count > 1" class="pa-3" top :offset-y="true">
            <template v-slot:activator="{ on, attrs }">
                <v-btn color="secondary" v-bind="attrs" v-on="on">
                    Sort by:
                </v-btn>
            </template>
            <v-list>
                <v-list-item v-for="({name}, index) in sortOptions"
                             :key="index"
                             @click="changeSortOption(name)"
                >
                    <v-list-item-title>{{ name }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>


        <v-menu v-if="count > 12" class="pa-3" top :offset-y="true">
            <template v-slot:activator="{ on, attrs }">
                <v-btn color="secondary" v-bind="attrs" v-on="on">
                    Display total:
                </v-btn>
            </template>
            <v-list>
                <v-list-item v-for="({count}, index) in itemsPerPageOptions"
                             :key="index"
                             :value="count"
                             @click="changeItemsPerPageOption(count)"
                >
                    <v-list-item-title>{{ count }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </v-row>
</template>

<script>
    import {mapGetters, mapActions } from "vuex";

    export default {
        name: "plantsGridSort",
        computed: {
            ...mapGetters('plants', {
                count: 'getItemCount',
                itemsPerPageOptions: "getItemsPerPageOptions",
                sortOptions: "getSortOptions"
            })
        },
        methods: mapActions("plants", ["changeItemsPerPageOption", "changeSortOption"])

    }
</script>

<style scoped>

</style>