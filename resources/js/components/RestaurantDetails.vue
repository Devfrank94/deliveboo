<script>
  export default {
    name: 'RestaurantDetails',

    data(){
      return{
        counter: 1,
        showDiv1: false,
        showDiv2: false,
        toggle: false
      }
    },

    methods:{
    incrementCounter() {
      const incrementButton = document.getElementById('increment')

      this.counter++;
      updateCounter();
    },


    decrementCounter() {
      const decrementButton = document.getElementById('decrement');

      if (this.counter > 1) {
        this.counter--;
        updateCounter();
      }
    },

    toggleDivs() {
      this.toggle = !this.toggle;
      this.showDiv1 = this.toggle;
      this.showDiv2 = this.toggle;
    }

    }
  }



  </script>

  <template>

    <div id="jumbotron"></div>

    <div id="name-container">
        <h1>Nome Ristorante</h1>
      </div>

    <div id="cards-container">

      <div class="card">
        <div class="img-container">
          <img src="../../.././public/img/italiano/arrabbiata.jpg" alt="">
        </div>

        <div class="card-info">

          <h4>Pasta</h4>

          <div class="plate-price mbn-5">
            <strong>Prezzo: </strong>
            <span>10 euro</span>
          </div>

          <div class="plate-description mbn-5">
            <strong>Più dettagli <i @click="toggleDivs" class="fa-solid fa-caret-down"></i></strong>
          </div>

          <div v-if="showDiv1" class="description mbn-5">
            <strong>Descrizione:</strong>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam temporibus dolor cupiditate eum officiis, ratione nobis necessitatibus recusandae odit expedita saepe dignissimos suscipit, quaerat earum iusto aliquam numquam rerum.</span>
          </div>

          <div v-if="showDiv2" class="ingredients mbn-5">
            <strong>Ingredients:</strong>
            <ul>
              <li>Olio</li>
              <li>Olio</li>
              <li>Olio</li>
            </ul>
          </div>

        </div>

        <div class="counter-container d-flex">
          <div id="decrement" class="d-flex" @click="decrementCounter()"><i class="fa-solid fa-minus"></i></div>
          <div id="counter" class="d-flex">{{ counter }}</div>
          <div id="increment" class="d-flex" @click="incrementCounter()"><i class="fa-solid fa-plus"></i></div>
        </div>

        <div class="add-to-chart-container d-flex justify-content-center">
          <div class="add-to-chart">Aggiungi al carrello</div>
        </div>
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


    #jumbotron{
      height: 500px;
      width: 100%;
      background-color: orange;
    }

    #name-container{
      display: flex;
      justify-content: center;
      align-items: center;
    }

    // STILE CARD

    #cards-container{
      background-color: aqua;
      display: flex;
      padding: 0px 50px;
      flex-wrap: wrap;
      justify-content: center;
    }
    .card{
      margin: 10px 12px;
      min-width: 300px;
      width: calc(100% / 4 - 24px);
    }

    .img-container{
      width: 100%;
      height: 200px;
    }

    .img-container img{
      width: 100%;
      height: 100%;
    }

    .card-info{
      padding: 10px 15px;
    }

    .detales{
      border-radius: 10px;
      cursor: pointer;
    }

    .mbn-5{
      margin-bottom: 5px;
    }

    .plate-description i{
      cursor: pointer;
    }

    .description{
      width:100%;
    }

    #descriprion-ap-dis{
      display: none;
    }

    .ingredients{
    }

    #ingredients-ap-dis{
      display: none;
    }

    .counter-container{
      border: solid 1px;
      align-items: center;
      margin: 10px 40px;
    }

    #decrement{
      cursor: pointer;
      border-right: solid 1px ;
      width: 20%;
      height: 100%;
      justify-content: center;
      align-items: center;
    }

    #counter{
      width: 80%;
      height: 100%;
      justify-content: center;
      align-items: center;
    }

    #increment{
      cursor: pointer;
      border-left: solid 1px ;
      width: 20%;
      height: 100%;
      justify-content: center;
      align-items: center;
    }

    .add-to-chart{
      background-color: green;
      color: white;
      padding: 4px 20px;
      border-radius: 10px;
      cursor: pointer;
      margin: 10px;
    }




  </style>
