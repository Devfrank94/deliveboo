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

  <Jumbotron/>

  <HypeRestaurants/>

  <SearchTypologies/>

  <HowDoesItWork/>

  <Plans/>

<section>
            <h3 class="text-center"> 1. Scegli il ristorante</h3>

            <p class="mx-5 text-center">
              Scegli il ristorante dove vuoi mangiare e una volta scelto, selezionalo
            </p>



          <div class="section-img">
            <img src="../../../public/img/Assets/illustration-1.png" alt="img">
          </div>



        <!-- add to cart -->

        <div class="container-section right py-5">


          <div class="section-description">

            <h3 class="text-center"> 2. Aggiungi al carrello</h3>

            <p class="mx-5 text-center">
              Scegli i piatti che vuoi ordinare, aggiungili carrello e inserisci i tuoi dati di spedizione e pagamento
            </p>

          </div>

          <div class="section-img">
            <img src="../../../public/img/Assets/illustration-2.png" alt="img">
          </div>

        </div>


        <!-- delivery -->
        <div class="container-section py-5">

          <div class="section-description">

            <h3 class="text-center"> 3. Ricevi il tuo ordine</h3>

            <p class="mx-5 text-center">
              E Adesso non ti rimane che aspettare l'arrivo del rider. Ti avviseremo non appena l'ordine sarà partito dal ristorante
            </p>

          </div>

          <div class="section-img">
            <img src="../../../public/img/Assets/illustration-3.png" alt="img">
          </div>

        </div>



    </section>

    <section id="sec-4" class="test2"></section>

</template>


<style lang="scss" scoped>

  @use '../../scss/partialsGuest/vars' as *;


</style>

