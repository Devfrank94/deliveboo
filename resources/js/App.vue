<script>
import Header from "./components/Header.vue"
import Footer from "./components/Footer.vue"

// Function FIND BY ID
function findById(arr, id) {
  return arr.find((x) => x.id === id);
}

export default {
name: 'App',
components:{
    Header,
    // Main,
    Footer
    },

    data() {
      return {
        cart: [],
        selling: [
          {
            id: 1,
            // image:,
            name: "esempio",
            // price:,
          },
          {
            id: 2,
            // image:,
            name: "esempio2",
            // price:,
          },        {
            id: 3,
            // image:,
            name: "esempio3",
            // price:,
          },
        ],

        // by this variable we can justify all things in the cart that come, so add it in data
        cartadd: {
          id: "",
          name: "",
          price: "",
          image:"",
        },
      };
    },

    computed: {
      // function to show all data that add in cart and total price
      cartTotal: function(){
        var i;
        var  total = 0;

        for (i = 0; i < this.cart.length; i++) {
          total += this.cart[i].price;
        }

        return total;

      },

      // function to plus all price of buy
      totalItem: function() {
        let sum = 0;
        let summ = 0;
        this.cart.forEach(function(item) {
          var sum = item.price;
          summ += sum * parseFloat(item.qty);

          if ( summ < 1) {
            $(".modal").hode();
          }
        });

        return summ;

      },
    },


    created() {
      this.viewCart();
    },

    //get quantity of buy from user
    methods: {

      viewCart() {
        if (localStorage.getItem("cart")) {
          this.cart = JSON.parse(localStorage.getItem("cart"));
          this.badge = this.cart.length;
          this.totalprice = this.cart.reduce((total, item) => {
            return total + item.qty * item.price;
          }, 0);
        }
      },



      getQty(id) {
        var item = findById(this.cart, id);

        if (item !== undefined) return item.qty;
        else return 0;
      },

      added(item) {
        var itemm = findById(this.cart, id);

        //push id, name, qty, img and price in cart
        if (item !== undefined) {
          itemm.qty += 1;
          this.saveCats();
        }else {
          // cartadd get all things that click
          this.cartadd.id = item.id;
          this.cartadd.name = item.name;
          this.cartadd.price = item.price;
          this.cartadd.image = item.image;
          this.cartadd.qty = 1;
          this.cart.push(this.cartadd);
          this.cartadd = {};
          this.saveCats(); //to save all inform of products
        }
      },

      //function to save in local storage
      saveCats(){
        let parsed = JSON.stringify(this.cart);
        localStorage.setItem("cart", parsed);
        this.viewCart(); //function to see al products are save
      },

// function to remove buy
      remove(id){
        var item = findById(this.cart, id);

        if(item !== undefined) {
          item.qty -= 1;
          if ( item.qty <= 0) {
            var index = this.cart.indexOf(item);
            this.cart.splice(index, 1);
          }
          this.saveCats;
        }
      },

      // button# to show all choose buy
      Card() {
        this.$("#myDIV").toggleClass("hide").fadeTo("slow");
        this.$(".page").addClass("hide");
      },

      // function for can back from cart to main page
      back(){
        $("#myDIV").addClass("hide");
        $(".page").removeClass("hide");
      },
    },
};


</script>

<template>

    <Header/>
        <div>



        <router-view></router-view>


        </div>
    <Footer/>
</template>

<style lang="scss">

</style>
