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
    <div class="sb-container d-flex justify-content-between align-items-center  px-0 my-4 px-3 ">

<!-- logo header -->
        <div class="img-head w-25">
            <img class="w-100" src="../../.././public/img/logo-no-background.png" alt="">
        </div>

<!-- menu header -->
        <div class="central-menu">
            <ul class="d-flex  fs-5 my-4 w-75">
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
        </div>

        <div class="button-head">
            <button><a href="/admin">Account</a></button>
            <button><a href="#sec-3">Come Funziona</a></button>
        </div>

    </div>
</header>

</template>

<style lang="scss" scoped>

.sb-container{
    margin: 0 auto;
    width: 90%;
}

img{
    padding: 30px 0px 30px;
}

ul{
    list-style: none;

  li{

    margin: 0 15px;


    a{
      color:#F9C80E ;
      text-transform: uppercase;
      text-decoration: none;
      &.active{
        color: red;
      }
    }
    a:hover{
      color: red;
    }

  }

}

button{
        border: 0;
        padding: 5px 40px;
        border-radius: 50px;
        color: white;
        background-color: #D90429;

        a{
          color: white;
          text-transform: uppercase;
          text-decoration: none;
        }
        a:hover{
          color: #F9C80E;
        }

    }
    button:first-child{
        margin-right: 30px;
    }
    button:hover{
        color: #F9C80E;
    }


</style>
