<template>
    <v-card color="success" class="mb-16">
        <v-form v-model="valid">
            <v-row>
                <v-col class="mt-3">
                    <div class="d-flex justify-content-between">
                        <h3 class="mb-3 ml-4 secondary--text">Order item</h3>
                        <v-spacer></v-spacer>
                        <h2 class="secondary--text mr-6">{{item.price.toFixed(2)}} &euro;</h2>
                    </div>
                    <hr/>
                    <v-row>
                        <v-col>
                            <div class="form-group ml-4">
                                <label class="secondary--text font-weight-bold" for="#count">Count:</label>
                                <v-text-field type="text"
                                              id="count"
                                              v-model="count"
                                              :readonly="item.in_stock <= 0"
                                              outlined
                                              clearable
                                              :rules="[rules.isNumber, rules.haveSoMany(item.in_stock)]"
                                >
                                </v-text-field>
                            </div>
                        </v-col>
                    <v-col>
                        <div class="form-group m-0">
                            <label class="secondary--text font-weight-bold">Price without VAT:</label>
                            <div class="py-2">
                                <strong>{{totalWithoutVat}} &euro;</strong>
                            </div>
                        </div>
                    </v-col>
                    <v-col>
                        <div class="form-group m-0">
                            <label class="secondary--text font-weight-bold">Total:</label>
                            <div class="py-2">
                                <strong>{{total}} &euro;</strong>
                            </div>
                        </div>
                    </v-col>
                    <v-col class="mt-6">
                        <v-btn color="primary"
                               :disabled="item.in_stock <= 0 || !valid"
                               @click="addItems({...item, count: Number(count)})"
                               >Add to cart</v-btn>
                    </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-form>
    </v-card>
</template>

<script>
    import { mapActions } from 'vuex'

    export default {
        name: "plantOrderPanel",
        props: ['item'],
        data() {
            return {
                valid: true,
                rules: {
                    isNumber: value => !isNaN(value) || "Wrong count value",
                    haveSoMany: (in_stock) => value => value <= in_stock || "We don't have so much in stick left :(",
                },
                count: this.item.in_stock > 0 ? 1 : 0,
            }
        },
        computed: {
            total() {
                return (this.item.price * this.count).toFixed(2);
            },
            totalWithoutVat() {
                return (this.total / (1 + this.item.vat / 100)).toFixed(2);
            }
        },
        methods: {
            ...mapActions({
                addItems: "cart/addItems"
            })
        }
    }
</script>

<style scoped>

</style>