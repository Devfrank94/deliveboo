<script>
export default {
    name: 'Loader'
}
</script>

<template>

    <div class="loader-bg">
      <div class="loader-container">

        <!-- PRIMO LOADER -->
        <div class="spinnerContainer">
          <div class="spinner"></div>
          <div class="loader">
            <p>loading</p>
            <div class="words">
              <span class="word"></span>
              <span class="word word-2">Ristoranti</span>
              <span class="word word-3">Piatti</span>
              <span class="word word-4">Ordina</span>
              <span class="word word-3">Delivery</span>
            </div>
          </div>
        </div>
        <!-- PRIMO LOADER -->

      </div>
    </div>


</template>


<style lang="scss" scoped>
.prova-sfondo{
  background-image: url(../../../../public/img/italiano/lasagna.jpg);
}

  .loader-bg{
    position: relative;
    top: 0px;
    bottom: 0px;
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #2b2d429f;
    z-index: 10;
  }


// PRIMO LOADER

.spinnerContainer {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.spinner {
  width: 56px;
  height: 56px;
  display: grid;
  border: 4px solid #0000;
  border-radius: 50%;
  border-right-color: #EF233C;
  animation: tri-spinner 1s infinite linear;
}

.spinner::before{
  content: "";
  grid-area: 1/1;
  margin: 2px;
  border: inherit;
  border-radius: 50%;
  border-right-color: #F86624;
  animation: tri-spinner 2s infinite;
}
.spinner::after {
  content: "";
  grid-area: 1/1;
  margin: 2px;
  border: inherit;
  border-radius: 50%;
  border-right-color:#F9C80E ;
  animation: tri-spinner 2s infinite;
}

.spinner::after {
  margin: 8px;
  animation-duration: 3s;
}

@keyframes tri-spinner {
  100% {
    transform: rotate(1turn);
  }
}

.loader {
  color: white;
  font-family: "Poppins",sans-serif;
  font-weight: 500;
  font-size: 25px;
  -webkit-box-sizing: content-box;
  box-sizing: content-box;
  height: 40px;
  padding: 10px 10px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  border-radius: 8px;
}

.words {
  overflow: hidden;
}

.word{
  display: block;
  height: 100%;
  padding-left: 6px;
  animation: cycle-words 5s infinite;
  color: #EDF2F4;
}

.word-2{
  color:#EF233C ;
}

.word-3{
  color:#F86624 ;
}

.word-4{
  color:#F9C80E ;
}


@keyframes cycle-words {
  10% {
    -webkit-transform: translateY(-105%);
    transform: translateY(-105%);
  }

  25% {
    -webkit-transform: translateY(-100%);
    transform: translateY(-100%);
  }

  35% {
    -webkit-transform: translateY(-205%);
    transform: translateY(-205%);
  }

  50% {
    -webkit-transform: translateY(-200%);
    transform: translateY(-200%);
  }

  60% {
    -webkit-transform: translateY(-305%);
    transform: translateY(-305%);
  }

  75% {
    -webkit-transform: translateY(-300%);
    transform: translateY(-300%);
  }

  85% {
    -webkit-transform: translateY(-405%);
    transform: translateY(-405%);
  }

  100% {
    -webkit-transform: translateY(-400%);
    transform: translateY(-400%);
  }
}

// FINE PRIMO LOADER


</style>
