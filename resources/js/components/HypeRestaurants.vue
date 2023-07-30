<script>

import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/effect-creative';
import { EffectCreative, Autoplay } from 'swiper/modules';
import { store } from '../store';


export default {
    name: 'HypeRestaurant',

    data(){
      return{
        store,
      }
    },

    components: {
      Swiper,
      SwiperSlide,
    },
    setup() {
      return {
        modules: [EffectCreative, Autoplay],
      };
    },
}
</script>

<template>



  <h1 class="text-center py-4">Ristoranti più ricercati</h1>
  <div id="cards-container" class="w-100">
    <div id="card">

      <swiper
      :grabCursor="true"
      :rewind="true"
      :navigation="true"
      :effect="'creative'"
      :autoplay="{
        delay: 2500,
        disableOnInteraction: false,
      }"
      :creativeEffect="{
        prev: {
          shadow: true,
          translate: ['-120%', 0, -500],
        },
        next: {
          shadow: true,
          translate: ['120%', 0, -500],
        },
      }"
          :modules="modules"
          class="mySwiper2"
          >

          <swiper-slide
          v-for="restaurant in store.restaurants"
          :key="restaurant.id">
          <div class="h-100 position-relative">
              <div class="container-img position-relative">
                  <img v-if="restaurant.image_path != null &&restaurant.image_path !== ''" :src="restaurant.image_path" :alt="image_original_name">
                  <img class="w-100" v-else src="../../../public/img/no_image.jpg" >
              </div>
          </div>
          </swiper-slide>
        </swiper>


      </div>
    </div>

</template>


<style lang="scss" scoped>
@import "~bootstrap/scss/functions";
@import "~bootstrap/scss/variables";
@import "~bootstrap/scss/mixins";


  #card {
    height: 100%;
    position: relative;
    background: #ffffff;
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
    border-radius: 20px;
    overflow-x: hidden;
  }


  #cards-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 100px;

  }


  .swiper {
    width: 1500px;
    height: 1000px;
    cursor:grab;
    @include media-breakpoint-down(xxl) {
      width: 1200px;
      height: 800px;
      }
      @include media-breakpoint-down(xl) {
        width: 1000px;
        height: 700px;
      }
      @include media-breakpoint-down(lg) {
        width: 800px;
        height: 700px;
      }
      @include media-breakpoint-down(md) {
        width: 700px;
        height: 500px;
      }
      @include media-breakpoint-down(sm) {
        width: 500px;
        height: 500px;
      }

      h3{
        font-family: 'Open-sans' !important;
        font-weight: 700;
      }

    .container-img{
      width: 1500px;
      height: 1000px;
      border-radius: 10px;
      @include media-breakpoint-down(xxl) {
        width: 1200px;
        height: 800px;
      }
      @include media-breakpoint-down(xl) {
        width: 1000px;
        height: 700px;
      }
      @include media-breakpoint-down(lg) {
        width: 800px;
        height: 700px;
      }
      @include media-breakpoint-down(sm) {
        width: 500px;
        height: 500px;
      }
      @include media-breakpoint-down(md) {
        width: 700px;
        height: 500px;
      }



      img{
        border-radius: 10px;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

    }

  }

  .swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    font-size: 22px;
    font-weight: bold;
  }


</style>


<!-- v-for="restaurant in store.restaurants" :key="restaurant.id" -->
