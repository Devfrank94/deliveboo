<script>
export default {
    name: 'CardTypology'
}
</script>

<template>

  <div class="card">
    <div class="card__content">
      <p class="card__title">Card Title</p>
      <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      <div class="button-container">

        <div class="button">
          <a href="#">Visita</a>
        </div>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card__content">
      <p class="card__title">Card Title</p>
      <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      <div class="button-container">

        <div class="button">
          <a href="#">Visita</a>
        </div>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card__content">
      <p class="card__title">Card Title</p>
      <p class="card__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      <div class="button-container">

        <div class="button">
          <a href="#">Visita</a>
        </div>

      </div>
    </div>
  </div>

</template>


<style lang="scss" scoped>
.card {
  position: relative;
  margin:20px;
  width: 300px;
  height: 200px;
  background-color: #f2f2f2;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  perspective: 1000px;
  box-shadow: 0 0 0 5px #ffffff80;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  background-image: url(../../../../public/img/pizze/margherita.jpg);
  background-size: contain;
  cursor: pointer;
  border: solid 1px black;
}

.card svg {
  width: 48px;
  fill: #333;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
}

.card__content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 20px;
  box-sizing: border-box;
  background-color: #f2f2f257;
  transform: rotateX(-90deg);
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  cursor: pointer;
}

.card:hover .card__content {
  transform: rotateX(0deg);
}

.card__title {
  margin: 0;
  font-size: 24px;
  color: #333;
  font-weight: 700;
}

.card:hover svg {
  scale: 0;
}

.card__description {
  margin: 10px 0 0;
  font-size: 14px;
  color: black;
  line-height: 1.4;
  height: 20px;
}

.button-container{
  height: 25px;
  position: absolute;
  bottom:5px;
  right: 5px;
  cursor: pointer;
}

.button{
  height: 100%;
  width: 60px;
  border-radius: 10px;
  background-color: red;
  display: flex;
  justify-content: center;
  align-items: center;
  border: solid black .7px;
  }a{
    text-decoration: none;
    color: white;
    font-size: small;
}

.button:hover{
    background-color:rgba(255, 0, 0, 0.704) ;
  }


</style>
