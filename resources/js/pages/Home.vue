<script>
export default {
    name: 'Home'
}
</script>

<template>

    <h1>Pages Home</h1>

    <section class="jumbotron test">

    </section>

    <section id="sec-1" class="test2"></section>
    <section id="sec-2 " class="test"></section>

    <!-- How does it work -->
    <section id="sec-3" class="py-5">
      <h1 class="text-center py-5 mb-5">Come Funziona</h1>

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
        <div class="container-section right py-5">

          <div class="section-description">

            <h3 class="text-center"> 4. Ricevi il tuo ordine</h3>

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

    <section id="sec-4" class="test2"></section>

</template>


<style lang="scss" scoped>

  @use '../../scss/partialsGuest/vars' as *;

.jumbotron{
    height: 400px;
}

#sec-1{
    height: 400px;
}

#sec-2{
    height: 400px;
}

#sec-3{
  background-color: $orange;

  h1{
    color:$white;
  }

  h3, p{
    color:$black;
  }

  .container-sg{
    width: 80%;
    margin: 0 auto;

    .container-section{
      width: 90%;
      display: flex;
      flex-wrap: wrap;
      margin-bottom:150px;
      .section-description{
        width: 450px;
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
        width: 600px;

        img{
          object-fit: contain;
          width: 100%;
          margin: 50px 0;
          filter: drop-shadow(0 0 0.75rem rgb(0, 0, 0));
        }
      }

    }
    .container-section.right{
      justify-content: flex-end;
    }
  }
}

#sec-4{
    height: 400px;
}






</style>

