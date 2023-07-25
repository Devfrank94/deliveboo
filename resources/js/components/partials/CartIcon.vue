<script>
export default {
  data() {
    return {
      isPopupVisible: false,
    };
  },
  computed: {
    cartItems() {
      return JSON.parse(localStorage.getItem("cartItems")) || [];
    },
    cartItemCount() {
      return this.cartItems.length;
    },
  },
  methods: {
    showPopup() {
      this.isPopupVisible = true;
    },
    hidePopup() {
      this.isPopupVisible = false;
    },
  },
};
</script>
<template>
  <div class="cart-icon" @mouseenter="showPopup" @mouseleave="hidePopup">
    <i class="fas fa-shopping-cart">2</i>
    <div v-if="cartItemCount" class="cart-item-count">{{ cartItemCount }}</div>
    <div v-if="isPopupVisible" class="cart-popup">
      <!-- Contenuto del popup -->
      <ul>
        <li v-for="product in cartItems" :key="product.id">{{ product.name }}</li>
      </ul>
    </div>
  </div>
</template>
<style>
.cart-icon {
  position: relative;
  display: inline-block;
}

.cart-item-count {
  position: absolute;
  top: -10px;
  right: -10px;
  background-color: blue;
  color: white;
  border-radius: 50%;
  padding: 4px;
  font-size: 12px;
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
