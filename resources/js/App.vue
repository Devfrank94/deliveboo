<script>
import Header from "./components/Header.vue"

export default {
name: 'App',
components:{
    Header,
    // Main,
    // Footer
  }
}
</script>

<template>


        <Header />
        <router-view></router-view>



</template>

<style lang="scss">

</style>
