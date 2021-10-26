<template>
  <v-container fluid fill-height>
    <v-row dense align="center" justify="center">
      <left-home/>
      <right-home/>
      <bottom-home/>
    </v-row>
  </v-container>
</template>

<script>

  import LeftHome from "../components/home/LeftHome";
  import RightHome from "../components/home/RightHome";
  import BottomHome from "../components/home/BottomHome";
  export default {
    name: "Home",
      components: {BottomHome, RightHome, LeftHome  },
  }
</script>

<style lang="scss" scoped>
 .v-container {
   height: 100vh;
 }
</style>