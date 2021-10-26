<template>
    <v-card color="secondary" dark class=" mb-4">
        <v-card-text>
            <v-row>
                <v-col cols="5">
                    <div :class="{'out-of-stock': item.in_stock <= 0}" error-msg="Sold Out">
                        <v-img class="rounded"
                               :src="item.src"
                        ></v-img>
                    </div>
                </v-col>
                <v-col cols="7">
                    <h2 class="white--text">{{ item.title }}</h2>
                    <hr/>
                    <v-row>
                    <span class="ml-3">
                        <b class="white--text">Price:</b>
                    </span>
                        <span class="ml-1 white--text">{{item.price.toFixed(2)}} &euro;</span>
                        <span class="ml-4 white--text">
                        <b>VAT:</b>
                    </span>
                        <span class="ml-1 white--text">{{item.vat}}</span>
                        <span class="ml-4 white--text">
                        <b>In stock:</b>
                    </span>
                        <span class="ml-1 white--text">{{item.in_stock}}</span>
                    </v-row>
                    <hr />
                    <ul class="properties">
                        <li>
                            <span class="white--text">{{ item.description }}</span>
                        </li>
                    </ul>
                </v-col>
            </v-row>
        </v-card-text>
    </v-card>
</template>

<script>
    export default {
        name: "PlantDetails",
        props: ['item']
    }
</script>

<style lang="scss" scoped>
    .out-of-stock {
        position: relative;
        &:before{
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 5;
            color: #ff8080;
            font-size: 4rem;
            font-weight: bold;
            content: attr(error-msg);
            transform: translate(40%, 20%) rotate(-52deg);
        }
        &:after{
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border:  4px solid #ff8080;
        }
    }

    .v-img {
        display: block;
        width: 100%;
        object-fit: cover;
        box-shadow: 0 1px 4px 1px #6666;
        margin-right: 2rem;
        border-radius: 4px;
    }

    .properties {
        padding: 0;
        list-style: none;
    }

</style>