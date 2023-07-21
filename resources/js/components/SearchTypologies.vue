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
      getApi(endpoint){
            store.loaded = false;
            axios.get(endpoint)
                .then(results => {
                  store.restaurants = results.data.restaurants;
                  store.typologies = results.data.typologies;
                  console.log(results.data.typologies);
                  console.log(results.data.restaurants);
                  console.log(store.typologies);
                  // store.links = results.data.restaurants.links
                  // store.first_page_url = results.data.restaurants.first_page_url
                  // store.last_page_url = results.data.restaurants.last_page_url
                  // store.current_page = results.data.restaurants.current_page
                  // store.last_page = results.data.restaurants.last_page
                  store.loaded = true;
                })
      },
    },

    mounted(){
      store.loaded = true,
      this.getApi(store.apiUrl + 'typologies'),
      this.getApi(store.apiUrl + 'restaurants')
    }
}
</script>

<template>

  <h2 class="text-center">
    Cerca il tuo ristorante preferito
  </h2>

  <div class="main-container">

    <div class="search-container">
        <div id="search-bar">
      <i id="search" class="fa-solid fa-magnifying-glass"></i>
      <input type="text" placeholder="Cerca il nome di un ristorante"
        v-model.trim="tosearch">

      </div>
      <div class="button-group d-flex">
        <div class="typology bg-danger">
          <i class="fa-solid fa-rotate-left"></i>
        </div>
        <div class="typology bg-success">
          <i class="fa-solid fa-check"></i>
        </div>
      </div>
    </div>

      <div id="typologies-container" class="d-flex justify-content-center row-cols-5 button-group w-50">
        <div class="typology d-flex justify-content-center" v-for="typology in store.typologies"
            :key="typology.id"
          >{{ typology.name }}
        </div>
      </div>
  </div>

      <div id="cards-container">
        <Loader v-if="!store.loaded" />
        <div v-else class="page-wrapper d-flex flex-wrap justify-content-center">
          <CardTypologies v-for="restaurant in store.restaurants"
          :key="restaurant.id"
          :name="restaurant.name"
          :address="restaurant.address"
          :image_path="restaurant.image_path"
          :slug="restaurant.slug"
          />

        </div>
      </div>




</template>


<style lang="scss" scoped>
@import "~bootstrap/scss/functions";
@import "~bootstrap/scss/variables";
@import "~bootstrap/scss/mixins";


$borderColor: #000000;
$borderRadius: 8px;
$buttonOffset: 12px;
$borderWidth: 1px;

// xs: 0,
// sm: 576px,
// md: 768px,
// lg: 992px,
// xl: 1200px,
// xxl: 1400px


  .main-container{
    display: flex;
    justify-content: space-around;
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

  .button-group {
              display: inline-flex;
              position: relative;

              &:before {
                display: block;
                content: '';
                position: absolute;
                top: $buttonOffset;
                right: 0;
                bottom: -$buttonOffset;
                left: 0;
                border-radius: $borderRadius;
              }

              .typology {
                  color: #000;
                  background-color: #F9C80E;
                  font-weight: bold;
                  border: 0;
                  border-bottom: $borderWidth solid $borderColor;
                  outline: none;
                  position: relative;
                  top: 0;
                  padding: 12px 16px;
                  margin: 0 -1px 0 -1px;
                  border-radius: 8px;
                  margin: 0.8rem;


                  z-index: 10;

                  transition: top 140ms linear;

                  @include media-breakpoint-down(md) {
                    font-size: small;
                    padding: 10px 20px;
                  }

                  &:before {
                    content: '';
                    display: block;
                    position: absolute;
                    top: 0;
                    left: 1px;
                    right: 1px;
                    bottom: -$buttonOffset;
                    z-index: 5;
                    pointer-event: none;
                    cursor: pointer;
                    border-radius: 8px;

                    box-shadow: 0 0 0 $borderWidth $borderColor;

                    transition: bottom 140ms linear;
                  }

                  &:hover {
                    top: 4px;

                    &:before {
                      bottom: -($buttonOffset - 4px);
                    }
                  }

                  &:active{
                    top: 12px;

                    &:before {
                      bottom: -($buttonOffset - 12px);
                    }
                  }
                }
              }



  #cards-container{
    display: flex;
    padding-top:20px 50px;
    flex-wrap: wrap;
    margin: 20px auto;
    justify-content: space-around;
  }
</style>
