<script>
export default {
    name: 'ValidationTrue',
    props: ["cartItems"],

    methods:{
      clearCart() {
        this.cartItems.length = 0;
        localStorage.clear();
        console.log(this.cartItems);
        console.log(localStorage);
      },
    },

    created() {
      this.clearCart();
    },
}
</script>

<template>

<section class="login-main-wrapper">
      <div class="main-container">
          <div class="login-process">
              <div class="login-main-container">
                  <div class="thankyou-wrapper h-100">
                      <h1><img src="http://montco.happeningmag.com/wp-content/uploads/2014/11/thankyou.png" alt="thanks" /></h1>
                        <p>Grazie per aver acquistato da noi! A presto ...</p>
                        <a class="btn btn-danger" href="/">Torna alla Home</a>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </section>
</template>


<style scoped>

section{
  padding-top: 100px;
  height: calc(100vh - 242px);
}

.thankyou-wrapper{
  width:100%;
  height:100vh;
  margin:auto;
  background:#ffffff;
  padding:10px 0px 50px;
}
.thankyou-wrapper h1{
  font:100px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
  padding:0px 10px 10px;
}
.thankyou-wrapper p{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
  padding:5px 10px 10px;
}
.thankyou-wrapper a{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:250px;
  background:#E47425;
  margin:10px auto 0px;
  padding:15px 20px 15px;
  border-bottom:5px solid #F96700;
}
.thankyou-wrapper a:hover{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:250px;
  background:#F96700;
  margin:10px auto 0px;
  padding:15px 20px 15px;
  border-bottom:5px solid #F96700;
}

</style>
