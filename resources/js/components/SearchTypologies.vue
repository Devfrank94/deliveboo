<script>
import { store } from '../store.js';
import axios from 'axios';
import CardTypologies from './partials/CardTypologies.vue'
import Loader from '../components/partials/Loader.vue';

export default {
    name: 'SearchTypologies',

    components:{
      CardTypologies,
      Loader,
    },
    data(){
        return{
            tosearch : '',
            restaurant: null,
            store,
        }
    },

    methods:{
  getApi(endpoint, param){
            store.loaded = false;
            axios.get(endpoint)
                .then(results => {
              // console.log(results.data);
                    param ? store.restaurants = results.data.data[0].restaurants : store.restaurants = results.data.data
                    // store.links = results.data.restaurants.links
                    // store.first_page_url = results.data.restaurants.first_page_url
                    // store.last_page_url = results.data.restaurants.last_page_url
                    // store.current_page = results.data.restaurants.current_page
                    // store.last_page = results.data.restaurants.last_page
                    store.loaded = true;
                })

        },

        getAllTypologies(endpoint){
            axios.get(endpoint)
                .then(results => {
            // console.log(results.data);
                    store.typologies = results.data.typologies;
                })

        },

        getRestaurantByTypology(name){
            this.getApi(store.apiUrl + 'restaurants/restaurant-typology/'+name, true)
        },
    },

    mounted(){
      store.loaded = true,
      this.getAllTypologies(store.apiUrl + 'restaurants/typologies')
    }
}
</script>

<template>

  <div class="main-container">
      <div id="search-bar">
        <i id="search" class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cerca il nome di un ristorante"
        v-model.trim="tosearch" @keyup.enter="getApi(store.apiUrl + 'restaurants/search/'+tosearch, false)">

      </div>

      <div>
                <h2 class="mb-4">Cerca per tipologia</h2>

           </div>

      <div id="typologies-container" class="d-flex justify-content-center row-cols-5">

        <div class="typology d-flex m-2" v-for="typology in store.typologies"
              :key="typology.id"
              @click="getRestaurantByTypology(typology.name)"
              >{{ typology.name }}</div>

      </div>

      <div id="cards-container">
        <Loader v-if="!store.loaded" />
        <div v-else class="page-wrapper d-flex">
          <CardTypologies v-for="restaurant in store.restaurants"
          :key="restaurant.id"
          :name="restaurant.name"
          :address="restaurant.address"
          :image_path="restaurant.image_path"
          :slug="restaurant.slug"
          />

        </div>
      </div>


  </div>

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


  .main-container{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 30px 0;
  }

  #search-bar{
    padding: 10px 0px;
    width: 400px;
    background-color:#F9C80E;
    border-radius: 25px;
    display: flex;
    cursor: pointer;
    align-items: center;
    padding-left: 20px;
    margin-bottom:30px
  }input{
    background-color: transparent;
    border: none;
    color: black;
    outline: none;
    cursor: pointer;
  }#search{
    margin-right: 12px;
  }i{
    font-size: large;
  }

  #typologies-container{
    justify-content: space-around;
    flex-wrap: wrap;
    width: 50%;
    @include media-breakpoint-down(xl) {
                width: 65%;
            }
            @include media-breakpoint-down(lg) {
                width: 80%;
            }
            @include media-breakpoint-down(md) {
              width: 90%;
            }
  }

  .typology{
    padding: 10px 30px;
    background-color: #EF233C;
    color: white;
    border-radius: 20px;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    @include media-breakpoint-down(md) {
      font-size: small;
      padding: 10px 20px;
    }
  }

  #cards-container{
    padding-top:20px 50px;
    flex-wrap: wrap;
    margin: 20px auto;
    justify-content: space-around;
  }
</style>
