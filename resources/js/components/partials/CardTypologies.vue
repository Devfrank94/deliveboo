<script>
export default {
    name: 'CardTypology',
    props:{
    name:String,
    image_path: String,
    address:String,
    slug:String,
  }
}
</script>

<template>

  <div class="card">
    <img v-if="image_path != null && image_path !='' " :src="image_path" class="w-100" :alt="image_original_name" :title="image_original_name">
      <img class="img-thumbnail" v-else src="../../../../public/storage/uploads/no_image.jpg" :alt="image_original_name" :title="image_original_name">
    <div class="card__content">
      <p class="card__title">{{ name }}</p>
      <p class="card__description">{{ address }}</p>
      <div class="button-container">
        <div class="button">

          <button>
            <router-link :to="{ name: 'DetailRestaurant', params: { slug: slug } }">Visita</router-link>
          </button>

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
  background-color: #00000063;
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
  color: #ffffff;
  font-weight: 700;
}

.card:hover svg {
  scale: 0;
}

.card__description {
  margin: 10px 0 0;
  font-size: 14px;
  color: rgb(255, 255, 255);
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
}button{
  background-color: none;
  border: none;
  width: 100%;
  border-radius: 10px;
  background-color: red;
  color: white;
}

.button:hover{
    background-color:#F86624 ;
    color: white;
  }


</style>
