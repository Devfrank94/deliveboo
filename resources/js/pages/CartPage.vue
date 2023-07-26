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
    // if (localStorage.cart) {
    //   let dishesArray = JSON.parse(localStorage.getItem("cart"));
    //   console.log(dishesArray);
    //   dishesArray.forEach((element) => {
    //     this.arr.push(element);

    //     this.dishes = Array.from(new Set(this.arr.map((a) => a.id))).map(
    //       (id) => {
    //         return this.arr.findLast((a) => a.id === id);
    //       }
    //     );
    //   });
    //   this.getTotal();
    // }
  },

  methods: {
    loadCartItems() {
      if(localStorage.getItem('cart')){
        const cart = JSON.parse(localStorage.getItem('cart'));
        console.log(this.cartItems)
      }
      // if (cart) {
      //   this.cartItems = JSON.parse(cart);
      // }
      // this.loaded = false;
    },
    // addToCart(dish) {
    //   this.cartItems.push(dish);
    //   this.saveCartItems();
    // },
    // removeFromCart(index) {
    //   this.cartItems.splice(index, 1);
    //   this.saveCartItems();
    // },
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
          // Rimuovi il piatto dal carrello se la quantità è 1
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
      localStorage.setItem("cart", JSON.stringify(this.dishes));
      this.getTotal();
    },

    clearCart() {
      this.cartItems.length = 0;
      localStorage.clear();
      console.log(this.cartItems);
      console.log(localStorage);
    },

    // saveCartItems() {
    //   localStorage.setItem('cart', JSON.stringify(this.cartItems));
    // },

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
    <div class="row row-cols-auto d-flex justify-content-between">
        <div v-if="cartItems.length > 0" class="row pt-5 p-3 text-white form_content">
          <div class="cont-cartitem border border-5 py-4 mb-3 rounded-4 d-flex justify-content-between" v-for="dish in cartItems" :key="dish.id">
            <img :src="'/storage/' + dish.image_path" :alt="dish.name" class="img-fluid  m_o_fit ms-3" />
              <div class="text-white d-flex align-items-center m-5">
                <div class="more-info border border-4 p-3">
                  <h3 class="text-decoration-underline">{{ dish.name }}</h3>
                  <span class="badge text-bg-primary p-2">€ {{ dish.price }}</span>
                  <p class="mt-2" v-html="dish.ingredients"></p>
                  <p class="mt-2" v-html="dish.description"></p>
                </div>
              </div>

            <div class="d-flex">
              <div class="counter-container d-flex align-items-center m-5">
                <div id="decrement" class="d-flex btn btn-primary py-2" @click="decrement(dish), getTotal()"><i class="fa-solid fa-minus"></i></div>
                <div id="counter" class="d-flex btn btn-primary mx-1 px-4">{{ getCartItemQuantity(dish) }}</div>
                <div id="increment" class="d-flex btn btn-primary py-2" @click="increment(dish), getTotal()"><i class="fa-solid fa-plus"></i></div>
                <div class="d-flex trash align-items-center m-5" @click="removeFromCart(dish)">
                  <i class="fa-solid fa-trash-can text-danger fs-4"></i>
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
        <div v-else class="hide-cart container">
          <h4 class="text-danger text-center m-5">Il tuo carrello è vuoto!</h4>
        </div>
  </div>


</div>
  <Loader
  v-else
  />

</template>
<style lang="scss" scoped>
.m_o_fit{
  // object-fit: contain;
  border-radius: 20px;
}

img{
  width: 25%;
}

.bg-check {
  background-color: #ffbd59;
}

.more-info{
  border-radius: 20px 0 20px 0;
}

.hide-cart{
  height: calc(100vh - 500px);
}


.cont-cartitem{
  background-color: #2b2d4245;
  box-shadow:
  2px 1.7px 3px -17px rgba(0, 0, 0, 0.026),
  4.7px 4.1px 7.3px -17px rgba(0, 0, 0, 0.046),
  8.9px 7.8px 13.8px -17px rgba(0, 0, 0, 0.061),
  15.9px 13.8px 24.6px -17px rgba(0, 0, 0, 0.079),
  29.7px 25.9px 46px -17px rgba(0, 0, 0, 0.107),
  71px 62px 110px -17px rgba(0, 0, 0, 0.16)
;
}

a {
  text-decoration: none;
  color: rgb(255, 255, 255);
}
.trash {
  cursor: pointer;
}


</style>
