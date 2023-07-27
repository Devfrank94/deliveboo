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
    <span v-if="cartItemCount" class="cart-item-count bg-primary">{{ store.countPopUp }}</span>
    <div v-if="isPopupVisible" class="cart-popup">
    <ol class="list-group list-group-numbered">
      <li v-for="product in cartItems" :key="product.id" class="list-group-item d-flex justify-content-between align-items-start px-3">
        <span class="me-3">
          {{ product.name }}
        </span>
        <div class="mx-3">
          <img v-if="product.image_path != null" :src="product.image_path">
          <img v-else src="../../../../public/img/no_image.jpg">
        </div>

        <div class="badge bg-primary rounded-pill ms-3 align-baseline">{{ product.quantity }}</div>
      </li>
    </ol>
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
  top: -25px;
  right: -30px;
  color: white;
  border: 1.2px solid white;
  border-radius: 50%;
  padding: 8px 11px;
  line-height: 16px;
  font-size: 16px;
}

.list-group-item{
  font-size: .9rem;

  img{
    object-fit: contain;
    width: 3rem;
  }
}

.cart-popup {
  position: absolute;
  top: 30px;
  right: -10px;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 10px;
  padding: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>
