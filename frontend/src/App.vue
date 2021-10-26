<template>
  <div id="app">
    <v-app dark>
      <navbar/>
      <v-main>
        <v-container fluid>
          <router-view/>
        </v-container>
      </v-main>
      <v-footer class="pa-3" dark color="primary" fixed inset>
        <v-spacer></v-spacer>
        <div>Lush Garden &copy; {{ new Date().getFullYear() }}</div>
      </v-footer>
    </v-app>
  </div>
</template>

<script>

import Navbar from "./components/navigation/navbar"

export default {
  name: 'App',

  components: {
      Navbar
  },
  created() {
    this.$store.dispatch('plants/fetchItems')
  },
};
</script>

<style lang="scss">
  #app {
    background-color: #E3E6DA;
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

</style>
