<template>
    <v-container fluid>
        <v-row align="center" justify="center">
            <v-col cols="12" sm="8" md="8">
                <v-card elevation="12" color="secondary">
                    <v-card-text>
                        <h1 class="text-center white--text display-3">Contact Us</h1>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <v-row align="center" justify="center">
            <v-col cols="12" md="8" sm="8">
                <v-card>
                    <v-card-title>Online Orders</v-card-title>
                    <v-card-text>
                        If you have any questions about your online order, send us an email or send us a note through the submission box below. Please include your order number.
                        Our customer service team is available every Mondays through Fridays from 10am till 5pm PST. Please give us 1-2 business days to get back to you.
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <v-row align="center" justify="center">
            <v-col cols="12" md="8" sm="8">
                <v-card>
                    <v-card-title>Plant Care Help</v-card-title>
                    <v-card-text>
                        We love talking plants! Give us the dirt every Mondays through Fridays by emailing us or writing to us through the submission box below.
                        One of our team members will help you identify plants, help with care info, or give you specific tips. Be sure to include a photo of your plant.
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <v-row align="center" justify="center">
            <v-col cols="12" md="8" sm="8">
                <v-card class="mb-16">
                    <v-card-text>
                        <v-form>
                            <v-row>
                                <v-col>
                                    <v-text-field label="Name"
                                                  name="Name"
                                                  prepend-icon="mdi-account"
                                                  type="text"
                                                  color="secondary"
                                                  clearable
                                    />
                                </v-col>
                                <v-col>
                                    <v-text-field label="Email"
                                                  name="Email"
                                                  prepend-icon="mdi-email"
                                                  type="text"
                                                  color="secondary"
                                                  clearable
                                    />
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col>
                                    <v-text-field id="phone"
                                                  label="Phone"
                                                  name="Phone"
                                                  prepend-icon="mdi-phone"
                                                  type="tel"
                                                  color="secondary"
                                                  clearable
                                                  prefix="+370"
                                    />
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col>
                                    <v-textarea label="Message"
                                                name="Message"
                                                prepend-icon="mdi-forum"
                                                color="secondary"
                                                clearable
                                                outlined
                                    />
                                </v-col>
                            </v-row>
                        </v-form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "ContactUs",
        
    }
</script>

<style scoped>

</style>