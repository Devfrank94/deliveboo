<script>
import axios from 'axios';
import { store } from '../store.js';
import Loader from '../components/partials/Loader.vue';

export default {
    name:'DetailRestaurants',
    props: ["cartItems"],
    components:{
        Loader
    },

    data(){
        return{
            restaurant: null,
            // counter: 0,
            showDiv1: false,
            showDiv2: false,
            toggle: false,
            store,
            dishes: [],
        }
    },

    methods:{


      increment(dish) {
      const cartItem = this.cartItems.find((item) => item.id === dish.id);
      if (cartItem) {
        cartItem.quantity++;
        console.log(cartItem);
      } else {
        this.cartItems.push({ ...dish, quantity: 1 });
      }
      this.$emit("update-cart", this.cartItems);
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
      }
    },


    getCartItemQuantity(dish) {
      const cartItem = this.cartItems.find((item) => item.id === dish.id);
      return cartItem ? cartItem.quantity : 0;
    },

    //   incrementCounter() {
    //   const incrementButton = document.getElementById('increment')

    //   this.counter++;

    // },


    // decrementCounter() {
    //   const decrementButton = document.getElementById('decrement');

    //   if (this.counter > 0) {
    //     this.counter--;
    //   }
    // },

    toggleDivs() {
      this.toggle = !this.toggle;
      this.showDiv1 = this.toggle;
      this.showDiv2 = this.toggle;
    },


      getApi(){
      store.loaded = false;
      axios.get(store.apiUrl + "restaurants/" + this.$route.params.slug)
      .then (result => {
        // console.log(result.data)

        this.restaurant = result.data;
        // console.log(this.restaurant)
        store.loaded = true;
      })

    }
  },

    created(){
      this.getApi();
    }
}
</script>

<template>



  <div v-if="store.loaded" class="main-wrapper">

    <div id="jumbotron">
      <img :src="restaurant.image_path" :alt="restaurant.name">
    </div>

    <div id="name-container">
        <h1>{{ restaurant.name }}</h1>
      </div>

    <div id="cards-container">

      <div
      v-for="dish in restaurant.dishes"
      :key="dish.id"
      class="nd-card">
        <div class="img-container">
          <img :src="'/storage/' + dish.image_path" :alt="dish.name">
        </div>

        <div class="card-info">

          <h4>{{ dish.name }}</h4>

          <div class="plate-price mbn-5">
            <strong>Prezzo: </strong>
            <span>{{ dish.price }} &euro; </span>
          </div>

          <div class="plate-description mbn-5">
            <strong>Più dettagli <i @click="toggleDivs" class="fa-solid fa-caret-down"></i></strong>
          </div>

          <div v-if="showDiv1" class="description mbn-5">
            <strong>Descrizione:</strong>
            <div>{{ dish.description  }}</div>
          </div>

          <div v-if="showDiv2" class="ingredients mbn-5">
            <strong>Ingredienti:</strong>
            <div>
              {{  dish.ingredients }}
            </div>
          </div>

        </div>

        <div class="add-to-chart-container d-flex justify-content-center">
          <!-- <div
          class="add-to-chart"
          @click="counter++"
          v-if="counter == 0">
          Aggiungi al carrello
          </div> -->

          <div class="counter-container d-flex">
            <div id="decrement" class="d-flex" @click="decrement(dish)"><i class="fa-solid fa-minus"></i></div>
            <div id="counter" class="d-flex">{{ getCartItemQuantity(dish) }}</div>
            <div id="increment" class="d-flex" @click="increment(dish)"><i class="fa-solid fa-plus"></i></div>
          </div>

        </div>
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


  #jumbotron{
    height: 500px;
    width: 100%;
    background-color: orange;
  }img{
    width: 100%;
    height: 500px;
    object-fit: cover;
  }

  #name-container{
    display: flex;
    justify-content: center;
    align-items: center;
  }

  // STILE CARD

  #cards-container{
    background-color: #F86624;
    display: flex;
    padding: 20px 50px;
    flex-wrap: wrap;
    justify-content: center;
  }
  .nd-card{
    margin: 10px 12px;
    min-width: 300px;
    width: calc(100% / 4 - 24px);
    box-shadow: 4.8px 4.4px 4.7px rgba(0, 0, 0, 0.05), 10.2px 9.6px 10.2px rgba(0, 0, 0, 0.071), 17.5px 16.4px 17.8px rgba(0, 0, 0, 0.089), 31.1px 29.1px 32.4px rgba(0, 0, 0, 0.11), 93px 87px 94px rgba(0, 0, 0, 0.16);
    background-color: white;
    border-radius: 10px;
  }

  .img-container{
    width: 100%;
    // height: 400px;
    aspect-ratio: 4/3;
  }

  .img-container img{
    width: 100%;
    height: 100%;
    border-radius: 10px 10px 0px 0px;
    object-fit: cover;
  }

  .card-info{
    padding: 10px 15px;
  }

  .detales{
    border-radius: 10px;
    cursor: pointer;
  }

  .mbn-5{
    margin-bottom: 5px;
  }

  .plate-description i{
    cursor: pointer;
  }

  .description{
    width:100%;
  }

  #descriprion-ap-dis{
    display: none;
  }



  #ingredients-ap-dis{
    display: none;
  }

  .counter-container{
    border: solid 1px;
    align-items: center;
    margin: 10px 83px;
    border-radius: 4px;
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

  .add-to-chart{
    background-color: #EF233C;
    color: white;
    padding: 4px 20px;
    border-radius: 10px;
    cursor: pointer;
    margin: 10px;
  }

</style>
