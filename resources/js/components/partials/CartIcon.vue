<script>
import { store } from '../../store';

export default {
  data() {
    return {
      isPopupVisible: false,
      store,
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

    calculateTotal() {
      let total = 0;
      for (const product of this.cartItems) {
        total += product.price * product.quantity;
      }
      return total;
    },

    loadCartItems() {
      if(localStorage.getItem('cart')){
        const cart = JSON.parse(localStorage.getItem('cart'));
        console.log(this.cartItems)
      }
    },

    getCartItemQuantity(dish) {
      const cartItem = this.cartItems.find((item) => item.id === dish.id);
      return cartItem ? cartItem.quantity : 0;
    },

  },
};
</script>


<template>
  <div class="cart-icon">
    <i class="fas fa-shopping-cart"></i>
    <span v-if="cartItemCount" @mouseover="togglePopup" @mouseleave="togglePopup" class="cart-item-count bg-primary">{{ store.countPopUp }}</span>
    <div v-if="isPopupVisible" class="cart-popup">
    <table class="table p-3 table-bordered border border-2 align-middle">
  <thead>
    <tr>
    </tr>
  </thead>
  <tbody>
    <tr v-for="product in cartItems" :key="product.id">
      <td>
        <img v-if="product.image_path != null && product.image_path !='' " :src="product.image_path">
        <img v-else src="../../../../public/img/no_image.jpg">
      </td>
      <td>{{ product.name }}</td>
      <td>€ {{ product.price }}</td>
      <td>{{ product.quantity }} Pz.</td>
      <td>€ {{ product.quantity * product.price }}</td>
    </tr>
  </tbody>
</table>
    <div class="m-2 bg-check w-70 text-center text-white p-3 rounded-4 border border-4">
      <div class="border-bottom">
        <h5>Totale</h5>
        <h4>€ {{ calculateTotal() }}</h4>
      </div>
    </div>

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

.table{
  width: 21rem;
  font-size: .8rem;

  img{
    width: 4rem;
    border-radius: 8px;
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

.bg-check {
  background-color: #ffbd59;
}
</style>
