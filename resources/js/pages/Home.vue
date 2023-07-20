<script>
import SearchTypologies from '../components/SearchTypologies.vue';
import Jumbotron from '../components/Jumbotron.vue';
import HypeRestaurants from '../components/HypeRestaurants.vue';
import HowDoesItWork from '../components/HowDoesItWork.vue';
import Plans from '../components/Plans.vue';

export default {
    name: 'Home',

    components:{
      SearchTypologies,
      Jumbotron,
      HypeRestaurants,
      HowDoesItWork,
      Plans
    }
}
</script>

<template>


   <h1>Pages Home</h1>

  <Jumbotron/>

  <HypeRestaurants/>

  <SearchTypologies/>

  <HowDoesItWork/>

  <Plans/>



</template>


<style lang="scss" scoped>

  @use '../../scss/partialsGuest/vars' as *;


</style>

