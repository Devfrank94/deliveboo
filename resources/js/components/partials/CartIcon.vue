<script>
import { store } from '../../store';

export default {
  data() {
    return {
      isPopupVisible: false,
      store
    };
  },
  computed: {
    cartItems() {
      return JSON.parse(localStorage.getItem("cartItems")) || [];
    },
    cartItemCount() {
      this.cartItems.forEach(element => {
        store.countPopUp += element.quantity;
      });
      return store.countPopUp
    },
  },
  methods: {
    togglePopup() {
      this.isPopupVisible = !this.isPopupVisible;
    },
  },
};
</script>


<template>
  <div class="cart-icon" @click="togglePopup" @mouseleave="togglePopup">
    <i class="fas fa-shopping-cart"></i>
    <span v-if="cartItemCount" class="cart-item-count">{{ store.countPopUp }}</span>
    <div v-if="isPopupVisible" class="cart-popup">
      <ul>
        <li v-for="product in cartItems" :key="product.id">{{ product.name }}</li>
      </ul>
    </div>
  </div>
</template>


<style lang="scss" scoped>

.cart-icon {
  position: relative;
  display: inline-block;

      .fa-shopping-cart{
        font-size: 1.5rem;

        .number-order{
          font-size: 1rem;
          padding: 0.5rem;
        }
      }
}

.cart-item-count {
  position: absolute;
  top: -30px;
  right: -30px;
  background-color:#2B2D42;
  color: white;
  border-radius: 20px;
  padding: 8px 13px;
  font-size: 16px;
}

.cart-popup {
  position: absolute;
  top: 30px;
  right: -10px;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>
