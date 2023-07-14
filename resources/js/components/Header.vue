<script>

export default {
  name: "Header",
  data(){
    return{

    }
  }
}
</script>

<template>


<header class="py-2">
    <div class="container-fluid d-flex px-0 my-4 px-3">

<!-- logo header -->
        <div class="img-head w-25">
            <img class="w-100" src="../../.././public/img/logo-no-background.png" alt="">
        </div>

<!-- menu header -->
      <ul class="d-flex justify-content-between fs-5 my-4 w-75">
        <li>
          <router-link :to="{ name: 'home' }">Home</router-link>
        </li>

        <li>
          <router-link :to="{ name: 'restaurants' }">Ristoranti</router-link>
        </li>

        <li>
          <router-link :to="{ name: 'dishes' }">Piatti</router-link>
        </li>
        <li>
            Registrati
        </li>
      </ul>

    </div>


</template>

<style lang="scss" scoped>

img{
    padding: 30px 0px 30px;
}

ul{
    align-items: center;
    padding-left: 8rem;
    list-style: none;

  li{

    margin: 0 15px;

    button{
        background-color: #D90429;
    }

    a{

      text-transform: uppercase;
      text-decoration: none;
      &.active{
        color: red;
      }
    }

  }

}

</style>
