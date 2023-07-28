<script>
export default {
    name: 'HowDoesItWork'
}
</script>

<template>

      <!-- How does it work -->
      <section id="sec-3">
      <h1 class="text-center">Come Funziona</h1>

      <!-- choose the restaurant -->
      <div class="container-sg">
        <div class="container-section py-5">

          <div class="section-description">

            <h3 class="text-center"> 1. Scegli il ristorante</h3>

            <p class="mx-5 text-center">
              Scegli il ristorante dove vuoi mangiare e una volta scelto, selezionalo
            </p>

          </div>

          <div class="section-img">
            <img src="../../../public/img/Assets/illustration-1.png" alt="img">
          </div>

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

      </div>

    </section>

</template>


<style lang="scss" scoped>
@use '../../scss/partialsGuest/vars' as *;

@import "~bootstrap/scss/functions";
@import "~bootstrap/scss/variables";
@import "~bootstrap/scss/mixins";

// xs: 0,
// sm: 576px,
// md: 768px,
// lg: 992px,
// xl: 1200px,
// xxl: 1400px



#sec-3{
  background-color: $orange;
  padding: 20px;

  h1{
    color:$white;
  }

  h3, p{
    color:$black;
  }

  .container-sg{

    .container-section{
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      .section-description{
        width: 450px;
        min-height: 240px;
        text-align: center;
        background-color: $white;
        box-shadow: 8.0px 16.0px 16.0px hsl(0deg 0% 0% / 0.35);
        border-radius: 0px 50px 0px 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0 20px;
        padding: 20px;
      }

      .section-img{
        min-width: 350px;
        margin-left: 60px;
        margin-top: 90px;
        @include media-breakpoint-down(sm) {
              min-width: 200px;
            }

        img{
          object-fit: contain;
          width: 100%;
          filter: drop-shadow(0 0 0.75rem rgb(0, 0, 0));
        }
      }

    }
    .container-section.right{
      justify-content: flex-end;
      @include media-breakpoint-down(xl) {
        justify-content: center;
      }
    }
  }
}

  p{
    margin-bottom: 0;
  }
</style>
