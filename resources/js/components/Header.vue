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

<header class="container-fluid">

  <ul class="d-flex justify-content-center fs-5 my-4">

    <li>
      <router-link :to="{ name: 'home' }">Home</router-link>
    </li>

    <li>
      <router-link :to="{ name: 'restaurants' }">Ristoranti</router-link>
    </li>

    <li>
      <router-link :to="{ name: 'dishes' }">Piatti</router-link>
    </li>

  </ul>

</header>


</template>

<style lang="scss" scoped>


ul{

  list-style: none;

  li{

    margin: 0 15px;

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
