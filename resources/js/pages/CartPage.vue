<script>
// import axios from 'axios';
// import { store } from '../store.js';
import CartIcon from '../components/partials/CartIcon.vue';

export default {
  name:'CartPage',
  components: {
    CartIcon,
  },
  data() {
    return {
      cartItems: [],
    };
  },
  created() {
    this.loadCartItems();
  },
  methods: {
    loadCartItems() {
      const cart = localStorage.getItem('cart');
      if (cart) {
        this.cartItems = JSON.parse(cart);
      }
    },
    addToCart(dish) {
      this.cartItems.push(dish);
      this.saveCartItems();
    },
    removeFromCart(index) {
      this.cartItems.splice(index, 1);
      this.saveCartItems();
    },
    clearCart() {
      this.cartItems = [];
      this.saveCartItems();
    },
    saveCartItems() {
      localStorage.setItem('cart', JSON.stringify(this.cartItems));
    },
  },
};
</script>
<template>
  <h2>Il tuo carrello</h2>
  <div class="row">
    <div class="col-12 col-lg-8">
      <div v-if="dishes.length > 0" class="row pt-5 p-3 text-white form_content rounded">
        <div class="row pt-3" v-for="dish in dishes" :key="dish.id">
          <img :src="'/storage/' + dish.image_path" :alt="dish.name"
            class="img-fluid col-12 col-md-4 col-lg-5 m_o_fit"
          />
          <div class="col-12 col-md-5 col-lg-4">
            <h3>{{ dish.name }}</h3>
            <span>€ {{ dish.price.toFixed(2) }}</span>
            <p>{{ dish.ingredients }}</p>
          </div>
          <div class="col-6 col-md-2">
            <label for="form-label">Quantità</label>
            <input
              :id="dish.id"
              class="form-control"
              type="number"
              :value="dish.quantity"
              min="1"
              @change="addToCart(dish, dish.id)"
            />
          </div>
          <div class="col-6 col-md-1 trash text-end" @click="removeFromCart(dish)">
            <i class="fa-solid fa-trash-can"></i>
          </div>

        </div>
      </div>
      <div v-else class="row p-3">
          <h5>Il tuo carrello è vuoto!</h5>
      </div>
    </div>

    <div class="col-12 col-lg-4">
      <div class="m-4 bg-check text-center p-3 rounded">
        <div class="border-bottom">
          <h6>Totale</h6>
          <h4>€ {{ totalPrice.toFixed(2) }}</h4>
        </div>
        <div class="row">
          <div class="container">
            <div class="p-3">
              <a href="#" class="btn btn-success"
                >Vai al Checkout</a
              >
            </div>
            <div class="p-3">
              <a
                href="/cart"
                class="btn btn-outline-danger"
                @click="clearCart()"
                >Svuota il carello</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
</style>
