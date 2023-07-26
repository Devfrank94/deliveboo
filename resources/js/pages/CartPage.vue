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
      const index = this.cartItems.indexOf(cartItem);
      this.cartItems.splice(index, 1);
      localStorage.setItem("cart", JSON.stringify(this.dishes));
      this.getTotal();
    },

    clearCart() {
      // this.cartItems = null;
      localStorage.clear();
      console.log(this.cartItems);
      console.log(localStorage);
    },

    // saveCartItems() {
    //   localStorage.setItem('cart', JSON.stringify(this.cartItems));
    // },

    getTotal() {
      if(localStorage.getItem('cart')){
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

  <div v-if="!loaded" class="row">
    <h2>Il tuo carrello</h2>
    <div class="col-12 col-lg-8">
      <div v-if="cartItems.length > 0" class="row pt-5 p-3 text-white form_content rounded">
        <div class="row pt-3" v-for="dish in cartItems" :key="dish.id">
          <img :src="'/storage/' + dish.image_path" :alt="dish.name"
            class="img-fluid col-12 col-md-4 col-lg-5 m_o_fit"
          />
          <div class="col-12 col-md-5 col-lg-4 text-dark">
            <h3>{{ dish.name }}</h3>
            <span>€ {{ dish.price }}</span>
            <p>{{ dish.ingredients }}</p>
          </div>
          <div class="col-6 col-md-2">
            <div class="counter-container d-flex text-dark">
            <div id="decrement" class="d-flex" @click="decrement(dish)"><i class="fa-solid fa-minus"></i></div>
            <div id="counter" class="d-flex">{{ getCartItemQuantity(dish) }}</div>
            <div id="increment" class="d-flex" @click="increment(dish)"><i class="fa-solid fa-plus"></i></div>
          </div>
          </div>
          <div class="col-6 col-md-1 trash text-end text-dark" @click="removeFromCart(dish)">
            <i class="fa-solid fa-trash-can"></i>
          </div>

        </div>
        <div class="col-12 col-lg-4">
      <div class="m-4 bg-check text-center p-3 rounded">
        <div class="border-bottom">
          <h6>Totale</h6>
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
      <div v-else class="row p-3">
          <h5>Il tuo carrello è vuoto!</h5>
      </div>
    </div>


  </div>
  <Loader
  v-else
  />

</template>
<style lang="scss" scoped>
.m_o_fit{
  object-fit: contain;
}
.bg-check {
  background-color: #ffbd59;
}
a {
  text-decoration: none;
  color: rgb(255, 255, 255);
}
.trash {
  cursor: pointer;
}

#decrement{
    cursor: pointer;
    border-right: solid 1px ;
    width: 20%;
    height: 100%;
    justify-content: center;
    align-items: center;
  }

  #counter{
    width: 80%;
    height: 100%;
    justify-content: center;
    align-items: center;
  }

  #increment{
    cursor: pointer;
    border-left: solid 1px ;
    width: 20%;
    height: 100%;
    justify-content: center;
    align-items: center;
  }

</style>
