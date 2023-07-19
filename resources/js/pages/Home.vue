<script>
import SearchTypologies from '../components/partials/SearchTypologies.vue';

export default {
    name: 'Home',

    components:{
      SearchTypologies
    }
}
</script>

<template>

    <h1>Pages Home</h1>

    <section class="jumbotron test">

    </section>

    <SearchTypologies/>

    <section id="sec-2 " class="test"></section>

    <section id="sec-3" class="test3"></section>


    <section id="sec-4">
      <div class="title-1 text-center mt-5 fs-2">
        <h1>
          Scegli il piano adatto a te
        </h1>
      </div>
      <div class="container-plan d-flex justify-content-center">
        <div class="pack-container mx-5">
          <div class="header">
            <h1 class="title">STANDARD</h1>
            <div class="price-container">
              <span>€</span>10
              <span>/mese</span>
            </div>
          </div>
          <div>
            <ul class="lists">
              <li class="list">
                <span>
                  <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round"></path>
                  </svg>
                </span>
                <p>
                  Supporto tecnico 24/7
                </p>
              </li>
              <li class="list">
                <span>
                  <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round"></path>
                  </svg>
                </span>
                <p>
                  Niente spese di consegna per ordini superiori a 50 €
                </p>
              </li>
            </ul>
          </div>
          <div class="button-container">
            <button type="button mt-5 pt5">
              View more
            </button>
          </div>
        </div>
        <div class="pack-container mx-5">
          <div class="header">
            <h1 class="title">PROFESSIONAL</h1>
            <div class="price-container">
              <span>€</span>50
              <span>/mese</span>
            </div>
          </div>
          <div>
            <ul class="lists">
              <li class="list">
                <span>
                  <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round"></path>
                  </svg>
                </span>
                <p>
                  Servizi piano STANDARD
                </p>
              </li>
              <li class="list">
                <span>
                  <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round"></path>
                  </svg>
                </span>
                <p>
                  Supporto tecnico 24/7
                </p>
              </li>
              <li class="list">
                <span>
                  <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round"></path>
                  </svg>
                </span>
                <p>
                  Niente spese di consegna per ordini superiori a 25 €
                </p>
              </li>
            </ul>
          </div>
          <div class="button-container">
            <button type="button">
              View more
            </button>
          </div>
        </div>
        <div class="pack-container mx-5">
          <div class="header">
            <h1 class="title">EXCLUSIVE</h1>
            <div class="price-container">
              <span>€</span>100
              <span>/mese</span>
            </div>
          </div>
          <div>
            <ul class="lists">
              <li class="list">
                <span>
                  <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round"></path>
                  </svg>
                </span>
                <p>
                  Servizi piano PROFESSIONAL

                </p>
              </li>
              <li class="list">
                <span>
                  <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round"></path>
                  </svg>
                </span>
                <p>
                  Priorità ticket di supporto
                </p>
              </li>
              <li class="list">
                <span>
                  <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round"></path>
                  </svg>
                </span>
                <p>
                  Spesa di consegna gratuita
                </p>
              </li>
              <li class="list">
                <span>
                  <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 12.75l6 6 9-13.5" stroke-linejoin="round" stroke-linecap="round"></path>
                  </svg>
                </span>
                <p>
                  Priorità sulla gestione ordini
                </p>
              </li>
            </ul>
          </div>
          <div class="button-container">
            <button type="button">
              View more
            </button>
          </div>
        </div>
      </div>
    </section>



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

p{
  margin-bottom: 0;
}

.container-plan{
  margin-top: 4.5rem;
  margin-bottom: 4.5rem;
}
.pack-container {
  position: relative;
  display: flex;
  width: 350px;
  height: 550px;
  flex-direction: column;
  border-radius: 12px;
  background-color: #2B2D42;
  padding: 1.6rem;
  color: #fff;
  box-shadow:
  4.8px 4.4px 4.7px rgba(0, 0, 0, 0.05),
  10.2px 9.6px 10.2px rgba(0, 0, 0, 0.071),
  17.5px 16.4px 17.8px rgba(0, 0, 0, 0.089),
  31.1px 29.1px 32.4px rgba(0, 0, 0, 0.11),
  93px 87px 94px rgba(0, 0, 0, 0.16)
;
}

.header {
  position: relative;
  margin: 0;
  margin-bottom: 2rem;
  overflow: hidden;
  border-radius: 0;
  border-bottom: 1px solid #fff;
  background: transparent;
  padding-bottom: 1rem;
  text-align: center;
}
.title-1{
  h1{
    font-size: 5rem;
  }
}
.title {
  display: block;
  font-family: sans-serif;
  font-size: 1.475rem;
  line-height: 1.25rem;
  text-transform: uppercase;
  color: #fff
}

.price-container {
  margin-top: 10px;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  gap: 4px;
  font-family: sans-serif;
  font-size: 4.5rem;
  line-height: 1;
}

.price-container span:first-child {
  margin-top: 10px;
  font-size: 2.25rem;
  line-height: 2.5rem;
}

.price-container span:last-child {
  align-self: flex-end;
  font-size: 2.25rem;
  line-height: 2.5rem;
}


.lists {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.list {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-top: 1.5rem;

}

.list span {
  border-radius: 50%;
  border: 1px solid rgba(255, 255, 255, 0.24);
  background-color: rgba(199, 255, 0, 0.4);
  height: 30px;
  min-width: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.list span svg {
  height: 18px;
  width: 18px;
}

.list p {
  display: block;
  font-family: sans-serif;
}

.button-container {
  margin-top: 20px;
  padding: 0;
  position: absolute;
  bottom: 15px;
  margin-left: 95px;
}

.button-container button:hover{
  background-color: #dadada;
  color: white;
}

.button-container button {
  display: block;
  width: 100%;
  background-color: #fff;
  padding: 10px 20px;
  text-transform: uppercase;
  color: #000;
  outline: 0;
  border: 0;
  border-radius: 10px;
}





</style>

