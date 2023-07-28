<script>
import Header from "./components/Header.vue"
import Footer from "./components/Footer.vue"


export default {
name: 'App',
components:{
    Header,
    // Main,
    Footer
    },
    data() {
    return {
      cartItems: JSON.parse(localStorage.getItem("cartItems")) || [],
    }
  },

  methods: {
    updateCart(newCartItems) {
      this.cartItems = newCartItems;
      // Salvo il carrello nel local storage
      localStorage.setItem("cartItems", JSON.stringify(newCartItems));
    },
  },
};


</script>

<template>

    <Header/>
        <div>



        <router-view :cartItems="cartItems" @update-cart="updateCart"></router-view>


        </div>
    <Footer/>
</template>

<style lang="scss">
    .swiper-pagination{
      display: none;
    }
</style>
