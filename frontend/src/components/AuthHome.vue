<template>
    <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
            <v-col cols="12" sm="8" md="8">
                <v-card class="elevation-12">
                    <v-window v-model="step">
                        <v-window-item :value="1">
                            <v-row>
                                <v-col cols="12" md="8">
                                    <v-card-text class="mt-12">
                                        <h1 class="text-center secondary--text display-2">Sign in to Lush Garden</h1>
                                        <v-form v-model="enableLogIn" @submit.prevent="handleLogin">
                                            <v-text-field id="email"
                                                          label="Email"
                                                          prepend-icon="mdi-email"
                                                          type="text"
                                                          color="secondary"
                                                          clearable
                                                          :rules="[rules.required, rules.email]"
                                                          />
                                            <v-text-field id="password"
                                                          label="Password"
                                                          prepend-icon="mdi-lock"
                                                          type="password"
                                                          color="secondary"
                                                          clearable
                                                          :rules="[rules.required]"
                                                          />
                                            <h3 class="text-center secondary--text mt-3">Forgot your password?</h3>
                                            <div class="text-center mt-3">
                                                <v-btn type="submit" rounded color="secondary" :disabled="!enableLogIn">Sign In</v-btn>
                                            </div>
                                        </v-form>
                                    </v-card-text>
                                </v-col>
                                <v-col cols="12" md="4" class="secondary">
                                    <v-card-text class="white--text mt-12">
                                        <h1 class="text-center display-1">Hello, gardeners</h1>
                                        <h5 class="text-center">Enter your account details ant start exploring</h5>
                                    </v-card-text>
                                    <div class="text-center">
                                        <v-btn rounded color="accent" @click="step++">Create Account</v-btn>
                                    </div>
                                </v-col>
                            </v-row>
                        </v-window-item>
                        <v-window-item :value="2">
                            <v-row class="fill-height">
                                <v-col cols="12" md="4" class="secondary">
                                    <v-card-text class="white--text mt-12">
                                        <h1 class="text-center display-1">Welcome Back</h1>
                                        <h5 class="text-center">To keep connected with us please login with your account info</h5>
                                    </v-card-text>
                                    <div class="text-center">
                                        <v-btn rounded color="accent" @click="step--">Login back</v-btn>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="8">
                                    <v-card-text class="mt-12">
                                        <h1 class="text-center display-2 secondary--text">Create Account</h1>
                                        <v-form v-model="enableRegistration" @submit.prevent="handleRegistration">
                                            <v-text-field label="Name"
                                                          name="Name"
                                                          prepend-icon="mdi-account"
                                                          type="text"
                                                          color="secondary"
                                                          clearable
                                                          :rules="[rules.required]"
                                            />
                                            <v-text-field label="Email"
                                                          name="Email"
                                                          prepend-icon="mdi-email"
                                                          type="text"
                                                          color="secondary"
                                                          clearable
                                                          :rules="[rules.required, rules.email]"
                                            />
                                            <v-text-field label="Password"
                                                          name="password"
                                                          prepend-icon="mdi-lock"
                                                          type="password"
                                                          color="secondary"
                                                          clearable
                                                          :rules="[rules.required]"
                                            />
                                            <v-text-field label="Confirm Password"
                                                          name="passwordConfirm"
                                                          prepend-icon="mdi-lock-reset"
                                                          type="password"
                                                          color="secondary"
                                                          clearable
                                                          :rules="[rules.required]"
                                            />
                                            <div class="text-center mt-n5">
                                                <v-btn class="mt-5" type="submit" rounded color="secondary" :disabled="!enableRegistration">Sign Up</v-btn>
                                            </div>
                                        </v-form>
                                    </v-card-text>
                                </v-col>
                            </v-row>
                        </v-window-item>
                    </v-window>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import {mapActions} from 'vuex'

    export default {
        name: "AuthHome",
        data: () => ({
            step: 1,
            enableLogIn: false,
            enableRegistration: false,
            password: '',
            rules: {
                required: value => !!value || 'Field is required',
                email: v => /.+@.+\..+/.test(v) || 'e-mail must be valid',
            }
        }),
        methods: {
            ...mapActions("auth", ["login", 'register']),
            handleLogin(e) {
                if (this.enableLogIn) {
                    this.login({
                        email: e.target[0].value,
                        pass: e.target[2].value,
                    });
                    console.log(e.target[0].value)
                    console.log(e.target[2].value)
                }
            },
            handleRegistration(e) {
                if (this.enableRegistration) {
                    this.register({
                        name: e.target[0].value,
                        email: e.target[2].value,
                        password: e.target[4].value,
                        passwordRepeat: e.target[6].value,
                    });
                    console.log(e.target[0].value)
                    console.log(e.target[2].value)
                    console.log(e.target[4].value)
                    console.log(e.target[6].value)
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>