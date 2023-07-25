<script>

export default {
  name: "Header",
  data(){
    return{

    }
  }
}
</script>

<template>


<header>
    <div class="sb-container d-flex justify-content-between align-items-center px-3 ">

<!-- logo header -->
        <div class="img-head w-25">
            <img class="w-100" src="../../.././public/img/logo-no-background.png" alt="">
        </div>

<!-- menu header -->
        <div class="central-menu">
            <ul class="d-flex  fs-5 my-4 w-75">
                <li>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </li>

                <li>
                    <router-link :to="{ name: 'restaurants' }">Ristoranti</router-link>
                </li>

                <li>
                    <router-link :to="{ name: 'dishes' }">Piatti</router-link>
                </li>
            </ul>
        </div>

        <div class="button-head">
            <button><a href="/admin">Account</a></button>
            <button><a href="#sec-3">Come Funziona</a></button>
            <button class="fs-3">
                <router-link :to="{ name: 'cart' }"><i class="fa-solid fa-cart-shopping"></i></router-link>
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



.sb-container{
    margin: 0 auto;
    width: 90%;
    @include media-breakpoint-down(md) {
      width: 100%;
          }
}

img{
    padding: 30px 0px 30px;
}

ul{
    list-style: none;
  li{
    margin: 0 15px;
    a{
      color:#F9C80E ;
      text-transform: uppercase;
      text-decoration: none;
      @include media-breakpoint-down(lg) {
              font-size: small;
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
  width: 350px;
      display: flex;
      justify-content: space-between;
      @include media-breakpoint-down(lg) {
              width: 250px;
            }
      @include media-breakpoint-down(md) {
            width: 200px;
          }
    }

  button{
          border: 0;
          padding: 10px 30px;
          margin:0 3px;
          background-color: #EF233C;
          color: white;
          border-radius: 20px;
          justify-content: center;
          align-items: center;
          cursor: pointer;
          @include media-breakpoint-down(xl) {
            padding: 10px 20px;
          }
          @include media-breakpoint-down(lg) {
              font-size: x-small;
            }
          @include media-breakpoint-down(md) {
            font-size: xx-small;
            padding: 10px 10px;
          }
          a{
            color: white;
            text-transform: uppercase;
            text-decoration: none
          }
          a:hover{
            color: #F9C80E;
          }
    }
    button:hover{
        color: #F9C80E;
    }
</style>
















