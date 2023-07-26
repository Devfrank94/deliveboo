<script>
import { store } from '../../store.js';
export default {
  name:"BackToTop",
  data(){
    return{
      store
    }
  },
  methods:{
    checkScroll(){
      window.addEventListener("scroll", () =>{
        window.scrollY > 20 ? store.showBackUp = true : store.showBackUp = false;
      })
    }
  },
  mounted(){
    this.checkScroll()
  }
}
</script>

<template>
  <a href="#jumbotr" :class="{'show' : store.showBackUp}"><i class="fa-solid fa-angles-up fa-bounce fa-lg"></i></a>
</template>

<style lang="scss" scoped>

  a{
    position: fixed;
    text-decoration: none;
    bottom: 0px;
    right: 30px;
    opacity: 0;
    background-color: #F86624;
    border-radius: 5px 5px 0 0;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all .5s;

    i{
      color: #EDF2F4;
    }

    &.show{
      bottom: 0;
      opacity: 1;
    }
  }
</style>
