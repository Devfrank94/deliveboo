<script>
import { store } from '../store.js';
import axios from 'axios';
import CardTypologies from './partials/CardTypologies.vue'
import Loader from '../components/partials/Loader.vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import { Autoplay, Pagination } from 'swiper/modules';

export default {
    name: 'SearchTypologies',

    components:{
      CardTypologies,
      Loader,
      Swiper,
      SwiperSlide,
    },
    setup() {
      return {
        modules: [Autoplay,Pagination]
      };
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
                  store.restaurant_backup = store.restaurants;
                  // store.links = results.data.restaurants.links
                  // store.first_page_url = results.data.restaurants.first_page_url
                  // store.last_page_url = results.data.restaurants.last_page_url
                  // store.current_page = results.data.restaurants.current_page
                  // store.last_page = results.data.restaurants.last_page
                  store.loaded = true;
                })
      },

      getTypologiesId(id){
        let counter = 0;
        store.restaurants = [];
        store.restaurantfilter = [];

        if(!store.typologies_id.includes(id)){
          store.typologies_id.push(id);
        }else{
          store.typologies_id = store.typologies_id.filter(typology => typology != id);
        }

        if(store.typologies_id.length > 0){
          store.restaurant_backup.forEach(restaurant => {
            counter = 0;
            restaurant.typologies.forEach(typology => {
              if(store.typologies_id.includes(typology.id) && !store.restaurantfilter.includes(restaurant)){
                counter++;
                counter == store.typologies_id.length ? store.restaurantfilter.push(restaurant) : null;
              }
            })
          })
          store.restaurants = store.restaurantfilter;
        }else{
          store.restaurants = store.restaurant_backup;
        }

        console.log(store.restaurants);
        console.log(store.restaurantfilter);
        console.log(store.typologies_id);
      },

      checkActive(id){
        const check = document.getElementById(id);
        if (!check.classList.contains('active')){
          check.classList.add('active')
        }else{
          check.classList.remove('active')
        }
      },

      resetActive(){
        const typologies_buttons = document.querySelectorAll('.typology');
        typologies_buttons.forEach(typology => {
          if(typology.classList.contains('active')) typology.classList.remove('active');
        });
      }
    },

    mounted(){
      store.loaded = true,
      this.getApi(store.apiUrl + 'typologies'),
      this.getApi(store.apiUrl + 'restaurants'),
      this.resetActive()
    }
}
</script>

<template>

  <h1 class="text-center">
    Cerca il tuo ristorante preferito
  </h1>

  <div class="main-container">

    <div class="search-container">

      <!--<div id="search-bar">
        <i id="search" class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cerca il nome di un ristorante"
            v-model.trim="tosearch">
      </div>-->

    </div>

    <div id="typologies-container" class="d-flex justify-content-center row-cols-5 button-group w-50">
        <div class="typology d-flex justify-content-center" v-for="typology in store.typologies"
            :key="typology.id"
            :id="typology.id"
            @click="getTypologiesId(typology.id), checkActive(typology.id)"
          >{{ typology.name }}
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4 mb-5">
        <div class="btn btn-danger me-2" @click="store.typologies_id = [], store.restaurants = store.restaurant_backup, resetActive()">
          RESET
        </div>
      </div>


    <div id="cards-container" class="w-100">
      <Loader v-if="!store.loaded" />
      <div v-else>
        <swiper
          :slidesPerView="5"
          :spaceBetween="200"
          :pagination="{
            clickable: true,
          }"
          :modules="modules"
          class="mySwiper"
        >
          <swiper-slide v-for="restaurant in store.restaurants" :key="restaurant.id">
            <CardTypologies
              :name="restaurant.name"
              :address="restaurant.address"
              :image_path="restaurant.image_path"
              :slug="restaurant.slug"
            />
          </swiper-slide>
        </swiper>
      </div>

    </div>
    <p class="text-center w-100">Numero di risultati trovati {{ store.restaurants.length }}</p>
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
                top: 12px;
                right: 0;
                bottom: -12px;
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
                  cursor: pointer;


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
                    bottom: -12px;
                    z-index: 5;
                    pointer-events: none;
                    cursor: pointer;
                    border-radius: 8px;

                    box-shadow: 0 0 0 $borderWidth $borderColor;

                    transition: bottom 140ms linear;
                  }

                  &:hover {
                    top: 4px;

                    &:before {
                      bottom: -(12px - 4px);
                    }
                  }

                  &:active{
                    top: 12px;

                    &:before {
                      bottom: -(12px - 12px);
                    }
                  }
                }
              }

  .active{
    color: #ffffff !important;
    background-color: $red !important;
    font-weight: bold !important;
    border: 0 !important;
    border-bottom: $borderWidth solid $borderColor !important;
    outline: none !important;
    position: relative !important;
    top: 0 !important;
    padding: 12px 16px !important;

    z-index: 10 !important;

    transition: top 140ms linear !important;

    &:before {
      content: '' !important;
      display: block !important;
      position: absolute !important;
      top: 0 !important;
      left: 1px !important;
      right: 1px !important;
      bottom: 0 !important;
      z-index: 5 !important;
      pointer-events: none !important;
      cursor: pointer !important;

      box-shadow: 0 0 0 $borderWidth $borderColor !important;

      transition: bottom 140ms linear !important;
    }
  }

  .swiper-pagination-bullets{
    bottom: var(--swiper-pagination-bottom, -5px) !important;
  }

</style>
