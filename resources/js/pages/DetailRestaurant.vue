<script>
import axios from 'axios';
import { store } from '../store.js';
import Loader from '../components/partials/Loader.vue';

export default {
    name:'DetailRestaurants',
    components:{
        Loader
    },

    data(){
        return{
            restaurant: null,
            loaded: false
        }
    },

    methods:{
        getApi(){
            this.loaded = false;
            axios.get(store.apiUrl + 'restaurants/' + this.$route.params.slug)
                .then(result => {
                    this.restaurant = result.data;
                    console.log(this.restaurant.name);
                    this.loaded = true;
                })

        }
    },

    mounted(){
      this.getApi();
    }
}
</script>

<template>
    <div class="container-inner">

        <div v-if="loaded">
            <h1> {{ restaurant.name }}</h1>
            <div class="image">
                <img :src="restaurant.image_path" :alt="restaurant.image_original_name">
                <i>{{ restaurant.image_original_name }}</i>
            </div>
            <p v-html="restaurant.description"> </p>
        </div>

        <Loader v-else />

    </div>
</template>



<style lang="scss" scoped>
    .image{
        margin: 20px 0;
    }
</style>
