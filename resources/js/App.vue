<script>
import Header from "./components/Header.vue"
import Footer from "./components/Footer.vue"

export default {
name: 'App',
components:{
    Header,
    // Main,
    Footer
    }
}
</script>

<template>
    <Header/>
        <div>



        <router-view></router-view>


        </div>
    <Footer/>
</template>

<style lang="scss">

</style>
