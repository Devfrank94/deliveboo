<script>
import CartIcon from './partials/CartIcon.vue';

export default {
  name: "Header",
  components:{
    CartIcon
  },

  data(){
    return{

    }
  }
}
</script>

<template>


<header>
    <div class="sb-container d-flex justify-content-between align-items-center ">

<!-- logo header -->
        <div class="img-head ">

          <router-link :to="{ name: 'home' }">
            <img src="../../.././public/img/logo-no-background.png" alt="">
          </router-link>

        </div>

<!-- menu header -->

        <div class="button-head">
            <button><a href="/admin" class="py-2">Account</a></button>
            <button><a href="/#sec-3">Come Funziona</a></button>
            <button class="fs-3">
                <router-link :to="{ name: 'cart' }"><i class="fa-solid fa-cart-shopping fs-4"></i></router-link>
            </button>

        </div>

    </div>
</header>

</template>

<style lang="scss" scoped>
@import "~bootstrap/scss/functions";
@import "~bootstrap/scss/variables";
@import "~bootstrap/scss/mixins";


// xs: 0,
// sm: 576px,
// md: 768px,
// lg: 992px,
// xl: 1200px,
// xxl: 1400px


header{
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
  background-color:#edf2f4bb;
  width: 100%;
  box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
}
.sb-container{
    margin: 0 auto;
    width: 98%;
    height: 150px;
    display: flex;
    @include media-breakpoint-down(md) {
      width: 100%;
      }
      @include media-breakpoint-down(sm) {
      flex-direction: column;
      width: 100%;
      justify-content: space-around;
      padding: 10px 0px;
      }
}

.central-menu{
  width: 100%;
}

img{
    max-width: 300px;
    // filter: drop-shadow(.3rem 2rem 1.5rem rgb(0, 0, 0));
    @include media-breakpoint-down(lg) {
              width: 250px;
            }
    @include media-breakpoint-down(md) {
              width: 200px;
            }
}

ul{
    list-style: none;
    margin: 0px;
    font-size: x-large;
    padding: 0px;
    justify-content: center;
    @include media-breakpoint-down(lg) {
        font-size: medium;
      }
    @include media-breakpoint-down(md) {
        justify-content: center;
      }
    @include media-breakpoint-down(sm) {
        justify-content: space-around;
      }
  li{
    margin: 0 15px;
    @include media-breakpoint-down(md) {
              margin:0 5px;
      }
    a{
      color:#F9C80E ;
      text-transform: uppercase;
      text-decoration: none;
      @include media-breakpoint-down(lg) {
              font-size: small;
      }
      @include media-breakpoint-down(sm) {
              font-size: medium;
      }
      &.active{
        color: red;
      }
    }
    a:hover{
      color: red;
    }
  }
}

.button-head{
  display: flex;
  justify-content: space-between;
  width: 450px;
      @include media-breakpoint-down(lg) {
              width: 250px;
            }
      @include media-breakpoint-down(md) {
            width: 200px;
          }
      @include media-breakpoint-down(sm) {
            width: 100%;
            justify-content: space-around;
      }
    }

  button{
          border: 0;
          padding: 1px 35px;
          margin:0 3px;
          background-color: #2B2D42;
          // color: white;
          border-radius: 20px;
          cursor: pointer;
          @include media-breakpoint-down(xl) {
            padding: 6px 20px;
          }
          @include media-breakpoint-down(lg) {
              font-size: x-small;
            }
          @include media-breakpoint-down(md) {
            font-size: xx-small;
            padding: 3px 10px;
          }
          @include media-breakpoint-down(sm) {
            font-size: x-small;
            padding: 9px 22px;
          }
          a{
            color: white;
            text-transform: uppercase;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-content: center;
          }
          // a:hover{
          //   color: #F9C80E;
          // }
    }
    button:hover{
        background-color: #2b2d42dc;
    }i{
      font-size: medium;
    }
</style>
















