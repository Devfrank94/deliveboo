<script>
import SearchTypologies from '../components/partials/SearchTypologies.vue';

export default {
    name: 'Home',

    components:{
      SearchTypologies
    }
}
</script>

<template>

    <h1>Pages Home</h1>

    <section class="jumbotron test">

    </section>

    <SearchTypologies/>

    <section id="sec-2 " class="test"></section>
    <section id="sec-3" class="test3"></section>
    <section id="sec-4" class="test2"></section>

</template>


<style lang="scss" scoped>

.jumbotron{
    height: 400px;
}

#sec-1{
    height: 400px;
}

#sec-2{
    height: 400px;
}

#sec-3{
    height: 400px;
}

#sec-4{
    height: 400px;
}



</style>
