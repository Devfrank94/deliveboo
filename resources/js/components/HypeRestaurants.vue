<script>

import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/effect-creative';
import { EffectCreative } from 'swiper/modules';
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
        modules: [EffectCreative],
      };
    },
}
</script>

<template>



  <div id="cards-container" class="w-100">
    <div id="card">

      <swiper
      :grabCursor="true"
      :effect="'creative'"
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
          <div class="h-100">
            <h1 class="text-center">{{ restaurant.name}} </h1>
            <div class="container-img">
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
    background: #eee;
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
    border-radius: 20px;
  }


  #cards-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 100px;

  }

  .swiper {
    width: 740px;
    height: 620px;
    cursor:grab;

    .container-img{
      width: 740px;
      height: 520px;
      object-fit: cover;
      border-radius: 10px;

      img{
        border-radius: 10px;
        width: 100%;
        height: 100%;
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
