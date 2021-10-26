<template>
    <v-container>
        <v-navigation-drawer disable-resize-watcher app v-model="sideNav" color="success">
            <v-list>
                <v-list-item-group>
                    <v-list-item to="/home" @click="sideNav = false">
                        <v-list-item-icon>
                            <v-icon>mdi-home</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>Home</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-group prepend-icon="mdi-nature-people" no-action>
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title>Plants</v-list-item-title>
                            </v-list-item-content>
                        </template>
                        <v-list-item v-for="(link, index) in plantLinks" :key="link.text" @click="handleSidePlantLink(link.searchQuery)">
                            <v-list-item-action>
                                <v-icon>{{ link.icon }}</v-icon>
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title>{{ link.text }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-group>
                
                    <v-list-item to="/contactus" @click="sideNav = false">
                        <v-list-item-icon>
                            <v-icon>mdi-phone</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>Contact Us</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>
        <v-app-bar color="primary" dark app height="75">
            <v-app-bar-nav-icon @click.stop="sideNav = !sideNav"></v-app-bar-nav-icon>
            <v-toolbar-title>
                <img src="@/assets/Logo.png" height="140">
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-form v-model="enableSearch">
                    <v-text-field rounded filled shaped
                                  placeholder="search for plants..."
                                  class="my-3 pa-0"
                                  dense
                                  v-model="search"
                                  :rules="[rules.min]"
                    >
                    </v-text-field>
                </v-form>
                <v-row align="center" v-if="searchQuery !== 'Plants'">
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn class="ml-4 mr-2" v-on="on" v-bind="attrs" icon @click="refreshQuery">
                                <v-icon>mdi-refresh</v-icon>
                            </v-btn>
                        </template>
                        <span>Refresh search</span>
                    </v-tooltip>
                </v-row>
                <v-row align="center">
                    <v-btn icon class="mx-4" :disabled="!enableSearch" @click.prevent="searchPlants(search)">
                        <v-icon>mdi-magnify</v-icon>
                    </v-btn>
                </v-row>
                <v-btn text to="/authtest" v-if="!loggedIn">
                    Login | Register
                </v-btn>
                <v-btn text to="/cart">
                    <v-icon>mdi-basket-outline</v-icon>
                    <v-badge v-if="count > 0" color="accent" :content="count"></v-badge>
                    <v-badge v-else color="accent" content="0"></v-badge>
                </v-btn>
                <v-btn text to="/signout" @click="logout" v-if="loggedIn">
                    Logout
                    <v-icon>mdi-logout-variant</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-app-bar>
    </v-container>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import router from '@/router/index.js';

    export default {
        name: "navbar",
        data: () => ({
            sideNav: false,
            enableSearch: true,
            search: '',
            rules: {
                min: value => value.length > 2 || 'Minimum 3 characters required !',
            }
        }),
        computed: {
            ...mapGetters({
                plantLinks: 'navbar/plantLinks',
                maintenanceLinks: 'navbar/maintenanceLinks',
                count: "cart/getItemCount",
                loggedIn: 'auth/getLoginStatus',
                searchQuery: 'plants/getSearchQuery'
            })
        },
        methods: {
            searchPlants (search) {
                this.fetchItemsSearch(search)
                this.search = null
            },
            handleSidePlantLink (sidebarPlantQuery) {
                this.sideNav = false;
                this.fetchItemsSearch(sidebarPlantQuery);
            },
            ...mapActions('auth', ['logout']),
            ...mapActions('plants', ['fetchItemsSearch', 'refreshQuery']),
        }
    }
</script>

<style scoped>

</style>