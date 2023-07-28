<script>
// import axios from 'axios';
// import { store } from '../store.js';
import CartIcon from '../components/partials/CartIcon.vue';
import Loader from '../components/partials/Loader.vue';

export default {
  name:'CartPage',
  components: {
    CartIcon,
    Loader,
  },
  data() {
    return {
      loaded: false,
      length: 0,
      arr: [],
      dishes: [],
      totalPrice: 0,
    };
  },
  props: ["cartItems"],

  created() {
    this.loadCartItems();
    this.getTotal();
  },

  mounted() {

  },

  methods: {
    loadCartItems() {
      if(localStorage.getItem('cart')){
        const cart = JSON.parse(localStorage.getItem('cart'));
        console.log(this.cartItems)
      }
    },

    increment(dish) {
      const cartItem = this.cartItems.find((item) => item.id === dish.id);
      if (cartItem) {
        cartItem.quantity++;
        console.log(cartItem);
      } else {
        this.cartItems.push({ ...dish, quantity: 1 });
      }
      this.$emit("update-cart", this.cartItems);
      this.getTotal();
    },


    decrement(dish) {
      const cartItem = this.cartItems.find((item) => item.id === dish.id);
      if (cartItem) {
        if (cartItem.quantity > 1) {
          cartItem.quantity--;
          console.log(cartItem);
        } else {
          const index = this.cartItems.indexOf(cartItem);
          this.cartItems.splice(index, 1);
        }
        this.$emit("update-cart", this.cartItems);
        this.getTotal();
      }
    },


    getCartItemQuantity(dish) {
      const cartItem = this.cartItems.find((item) => item.id === dish.id);
      return cartItem ? cartItem.quantity : 0;
    },

    removeFromCart(dish) {
      const index = this.cartItems.indexOf(dish);
      this.cartItems.splice(index, 1);
      this.$emit("update-cart", this.cartItems);
      this.getTotal();
      console.log(this.cartItems)
    },

    clearCart() {
      this.cartItems.length = 0;
      localStorage.clear();
      console.log(this.cartItems);
      console.log(localStorage);
    },


    getTotal() {
      if(localStorage.getItem('cartItems')){
        (this.totalPrice = 0),
          this.cartItems.forEach((dish) => {
            let price = dish.price;
            console.log(dish);
            let quantity = dish.quantity;
            this.totalPrice += price * quantity;
          });
          console.log(this.totalPrice);
      }
    },
  },
};
</script>
<template>

  <div v-if="!loaded" class="container-fluid">
    <h2>Riepilogo carrello</h2>

    <div class="row d-flex justify-content-center">
        <div v-if="cartItems.length > 0" class=" pt-5 p-3 text-white form_content">
          <div class="cont-cartitem border border-5 py-4 mb-3 rounded-4 d-flex justify-content-around" v-for="dish in cartItems" :key="dish.id">

            <img :src="'/storage/' + dish.image_path" :alt="dish.name" />

            <div class="rotate-container d-flex">

              <div class="text-white d-flex align-items-center">

                <div class="more-info border border-4 p-3">
                  <h3 class="text-decoration-underline">{{ dish.name }}</h3>
                  <span class="badge text-bg-primary p-2">€ {{ dish.price }}</span>
                  <p class="mt-2" v-html="dish.ingredients"></p>
                  <p class="mt-2" v-html="dish.description"></p>
                </div>

              </div>

              <div class="d-flex" id="cart-side">
                <div class="counter-container d-flex align-items-center w-100">
                  <div id="decrement" class="d-flex btn btn-primary py-2" @click="decrement(dish), getTotal()"><i class="fa-solid fa-minus"></i></div>
                  <div id="counter" class="d-flex btn btn-primary mx-1 px-4">{{ getCartItemQuantity(dish) }}</div>
                  <div id="increment" class="d-flex btn btn-primary py-2" @click="increment(dish), getTotal()"><i class="fa-solid fa-plus"></i></div>
                  <div class="d-flex trash align-items-center" @click="removeFromCart(dish)">
                    <i class="fa-solid fa-trash-can text-danger fs-4"></i>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <div class="d-flex justify-content-center">
              <div class="m-4 bg-check w-75 text-center p-3 rounded-4 border border-4">
                <div class="border-bottom">
                  <h3>Totale</h3>
                  <h4>€ {{ totalPrice }}</h4>
              </div>
            <div class="row">
              <div class="container">
                <div class="p-3">
                  <a href="#" class="btn btn-success"
                    >Vai al Checkout</a
                  >
                </div>
                <div class="p-3">

                  <button
                    class="btn btn-outline-danger"
                    @click="clearCart()"
                    >Svuota il carello</button
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div v-else class="hide-cart container col-10 m-5 text-center">
          <h2 class="text-danger m-5">Il tuo carrello è vuoto!</h2>
        </div>
  </div>


</div>
  <Loader
  v-else
  />

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

.m_o_fit{
  // object-fit: contain;
  border-radius: 20px;
}

img{
  width: 320px;
  max-height: 320px;
  border-radius: 20px;
  @include media-breakpoint-down(md) {
    width: 400px;
    margin-bottom: 30px;
  }
  @include media-breakpoint-down(sm) {
    width: 70%;
    margin-bottom: 30px;
  }
}
.rotate-container{
  @include media-breakpoint-down(lg) {
            flex-direction: column;
            justify-content: center;
            align-items: center;
            }
}

.bg-check {
  background-color: #ffbd59;
}

.more-info{
  border-radius: 20px 0 20px 0;
  max-height: 269px;
  overflow: scroll;
  margin: 0px 40px;
  width: 600px;
  @include media-breakpoint-down(xxl) {
    width: 440px;
  }
  @include media-breakpoint-down(xl) {
    width: 285px;
  }
  @include media-breakpoint-down(md) {
    width: 500px;
  }
  @include media-breakpoint-down(sm) {
    width: 95%;
  }
}

.counter-container{
  justify-content: end;
  @include media-breakpoint-down(lg) {
    margin-top: 20px;
  }
  @include media-breakpoint-down(sm) {
    justify-content: center;
    margin-top: 20px;
  }
}

.hide-cart{
  height: calc(100vh - 500px);
}

#cart-side{
  width: 214px;
}


.cont-cartitem{
  background-color: #F86624;
  box-shadow:
  2px 1.7px 3px -17px rgba(0, 0, 0, 0.026),
  4.7px 4.1px 7.3px -17px rgba(0, 0, 0, 0.046),
  8.9px 7.8px 13.8px -17px rgba(0, 0, 0, 0.061),
  15.9px 13.8px 24.6px -17px rgba(0, 0, 0, 0.079),
  29.7px 25.9px 46px -17px rgba(0, 0, 0, 0.107),
  71px 62px 110px -17px rgba(0, 0, 0, 0.16);
  padding: 0px 20px;
  @include media-breakpoint-down(md) {
    flex-direction: column;
    align-items: center;
  }
}

a {
  text-decoration: none;
  color: rgb(255, 255, 255);
}
.trash {
  cursor: pointer;
  margin-left: 30px;
}


</style>
