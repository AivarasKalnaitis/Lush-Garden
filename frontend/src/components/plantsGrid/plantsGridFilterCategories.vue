<template>
<v-container>
    <v-expansion-panels v-model="panel" multiple accordion>
        <v-expansion-panel>
            <v-expansion-panel-header class="pa-3 secondary white--text">
                CATEGORIES
                <template v-slot:actions>
                    <v-icon color="white">$expand</v-icon>
                </template>
            </v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-list tile>
                    <v-list-item v-for="({display, name}, ii) in categoryFilters"
                                 :key="ii"
                                 class="pa-0"
                                 dense
                    >
                        <v-checkbox :value="display"
                                    :label="name"
                                    v-model="display"
                                    :key="ii"
                                    @change="toggleFilter(name)"
                                    hide-details
                                    class="category"
                        >
                        </v-checkbox>
                    </v-list-item>
                </v-list>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>


</v-container>
</template>

<script>
    import { mapGetters, mapActions } from "vuex";

    export default {
        name: "plantsGridFilterCategories",
        data: () => ({
          panel: [0],
        }),
        computed: {
            ...mapGetters({
                categoryFilters: 'plants/getFilters'
            })
        },
        methods: {
            ...mapActions({
                toggleFilter: "plants/filterItems"
            })
        }
    }
</script>

<style lang="scss" scoped>
    .category  {
        text-transform: capitalize;
    }
</style>