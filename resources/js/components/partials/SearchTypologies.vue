<script>
import CardTypologies from './CardTypologies.vue';
export default {
    name: 'SearchTypologies',

    components:{
      CardTypologies
    }
}
</script>

<template>

  <div class="main-container">
      <div id="search-bar">
        <i id="search" class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cerca una categoria">
      </div>

      <div id="typologies-container" class="d-flex row-cols-4">

        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Italiano</div>

        </div>

        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Pizza</div>

        </div>


        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Sushi</div>

        </div>


        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Americano</div>

        </div>

        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Messicano</div>

        </div>

        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Francese</div>

        </div>

        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Indiana</div>

        </div>

        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Spagnola</div>

        </div>

        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Cinese</div>

        </div>

        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Fast Food</div>

        </div>

        <div class="col d-flex justify-content-center align-items-center mb-3">

          <div class="typology d-flex">Giapponese</div>

        </div>


        <!-- <div class="typology d-flex">Sushi</div>

        <div class="typology d-flex">Italiana</div>
        <div class="typology d-flex">Americana</div>
        <div class="typology d-flex">Messicana</div>

        <div class="typology d-flex">Francese</div>
        <div class="typology d-flex">Indiana</div>
        <div class="typology d-flex">Spagnola</div>

        <div class="typology d-flex">Cinese</div>
        <div class="typology d-flex">Fast Food</div>
        <div class="typology d-flex">Giapponese</div> -->
      </div>

      <div id="cards-container">
        <CardTypologies/>
      </div>


  </div>

</template>


<style lang="scss" scoped>
@import "~bootstrap/scss/functions";
@import "~bootstrap/scss/variables";
@import "~bootstrap/scss/mixins";


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
    width: 50%;
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

  .typology{
    padding: 10px 30px;
    background-color: #EF233C;
    color: white;
    border-radius: 20px;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    @include media-breakpoint-down(md) {
      font-size: small;
      padding: 10px 20px;
    }
  }

  #cards-container{
    padding-top:20px 50px;
    display: flex;
    flex-wrap: wrap;
    padding:100px 100px;
    justify-content: space-around;
  }
</style>
