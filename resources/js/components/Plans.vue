<script>
export default {
    name: 'Plans'
}
</script>

<template>

<section id="sec-4">
      <div class="title-1 text-center mt-5 fs-2">
        <h1>
          Scegli il piano adatto a te
        </h1>
      </div>
      <div class="container-plan d-flex justify-content-around">

        <div class="pack-container">
          <div class="header">
            <h1 class="title">STANDARD</h1>
            <div class="price-container">
              <span>€</span>
              <span>10</span>
              <span>/ mese</span>
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

        <div class="pack-container">
          <div class="header">
            <h1 class="title">PROFESSIONAL</h1>
            <div class="price-container">
              <span>€</span>
              <span>50</span>
              <span>/ mese</span>
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

        <div class="pack-container">
          <div class="header">
            <h1 class="title">EXCLUSIVE</h1>
            <div class="price-container">
              <span>€</span>
              <span>100</span>
              <span>/ mese</span>
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



.container-plan{
  margin-top: 4.5rem;
  margin-bottom: 4.5rem;
  @include media-breakpoint-down(md) {
      flex-wrap: wrap;
    }
}
.pack-container {
  position: relative;
  display: flex;
  width: 350px;
  height: 540px;
  padding-top: 20px;
  flex-direction: column;
  border-radius: 12px;
  background-color: #2B2D42;
  color: #fff;
  box-shadow:
  4.8px 4.4px 4.7px rgba(0, 0, 0, 0.05),
  10.2px 9.6px 10.2px rgba(0, 0, 0, 0.071),
  17.5px 16.4px 17.8px rgba(0, 0, 0, 0.089),
  31.1px 29.1px 32.4px rgba(0, 0, 0, 0.11),
  93px 87px 94px rgba(0, 0, 0, 0.16);
  padding: 20px 10px;
  @include media-breakpoint-down(xl) {
          width: 300px;
        }
        @include media-breakpoint-down(lg) {
          width: 250px;
          height: 429px;
          }
          @include media-breakpoint-down(md) {
              margin-bottom: 20px;
            }
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

.title {
  display: block;
  font-family: sans-serif;
  font-size: 1.475rem;
  line-height: 1.25rem;
  text-transform: uppercase;
  color: #fff
}

.price-container {
  display: flex;
  justify-content: center;
  font-family: sans-serif;
}

.price-container span{
  font-size: xx-large;
  margin: 0px 5px;
  @include media-breakpoint-down(lg) {
    font-size: xx-large;
    margin: 0px 5px;
  }
}


.price-container span:first-child{
  font-size: x-large;
  align-self: center;
  @include media-breakpoint-down(lg) {
    font-size: x-large;
    align-self: center;
  }
}


.price-container span:last-child{
  align-self: center;
  font-size: x-large;
}


.lists {
  flex-direction: column;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  @include media-breakpoint-down(xl) {
          padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
        }
}

.list {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-top: 1.5rem;
  @include media-breakpoint-down(xl) {
          margin-top: 10px;
        }

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
  font-family: sans-serif;
  margin: 0;
  width: 190px;
  @include media-breakpoint-down(xl) {
        font-size: small;
        width: 180px;
        }
}

.button-container {
  display: flex;
  justify-content: center;
}

.button-container button:hover{
  background-color: #dadada;
  color: white;
}

.button-container button {
  display: block;
  background-color: #fff;
  padding: 10px 20px;
  text-transform: uppercase;
  color: #000;
  outline: 0;
  border: 0;
  border-radius: 10px;
  position: absolute;
  bottom: 20px;
}
</style>
