<template>
    <v-expansion-panels accordion>
        <v-expansion-panel>
            <v-expansion-panel-header class="pa-3 secondary white--text">
                PRICE
                <template v-slot:actions>
                    <v-icon color="white">$expand</v-icon>
                </template>
            </v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-range-slider v-model="range" :min="min" :max="max">
                    <template v-slot:prepend>
                        <v-text-field :value="range[0]"
                                      class="mt-0 pt-0 test"
                                      type="number"
                                      @change="$set(range, 0, $event)">
                        </v-text-field>
                    </template>
                    <template v-slot:append>
                        <v-text-field
                                :value="range[1]"
                                class="mt-0 pt-0 "
                                hide-details
                                single-line
                                type="number"
                                style="width: 60px"
                                @change="$set(range, 1, $event)">
                        </v-text-field>
                    </template>

                </v-range-slider>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</template>

<script>
    export default {
        name: "plantsGridSlider",
        data: () => ({
            min: 0,
            max: 200,
            slider: 40,
            range: [0, 200],
        }),
    }
</script>

<style scoped>

</style>