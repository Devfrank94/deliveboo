    <script>
    import BackToTop from './partials/BackToTop.vue';
    export default {
    name: "Footer",
    components:{
      BackToTop,
    },
        data(){
            return{

            }
        }
    }
    </script>

    <template>
        <footer>

            <div class="nd-container d-flex">

                <div id="footer-img-container">
                    <img src="../../../public/deliveboo-white-no-background.png" alt="">
                </div>

                <!-- CONTENITORE INFO FOOTER -->
                <div id="footer-info">
                    <!-- CONTENITORE DELLE INFO  -->
                    <div class="info-container d-flex container-fluid">
                        <div class="ul-container container-fluid">
                          <div class="title"><h3>Categorie</h3></div>
                            <ul>
                                <li>Italiano</li>
                                <li>Pizza </li>
                                <li>Sushi</li>
                                <li>Americano</li>
                            </ul>
                        </div>

                        <div class="ul-container container-fluid">
                          <div class="title"><h3>Sito</h3></div>
                            <ul>
                                <li>Team</li>
                                <li>Site Map</li>
                                <li>Come Funziona</li>
                                <li>Condizioni d'acquisto</li>
                            </ul>

                        </div>
                    </div>
                </div>

                <!-- CONTENITORE SOCIAL ICONS-->
                <div id="footer-social">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>

            </div>
            <!-- Back to Top Button -->
        <BackToTop/>
        </footer>
    </template>

    <style lang="scss" scoped>
        @import "~bootstrap/scss/functions";
        @import "~bootstrap/scss/variables";
        @import "~bootstrap/scss/mixins";

        // xs: 0,
        // sm: 576px,
        // md: 768px,
        // lg: 992px,
        // xl: 1200px,
        // xxl: 1400px

        .nd-container{
            background-color: #2B2D42;
            color: #8D99AE;
            justify-content: space-around;
            align-items: center;
            padding: 40px 0px;
            @include media-breakpoint-down(sm) {
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 20px 0px;
            }
        }

        #footer-img-container{
            height: 100%;
            padding-left: 21px;
            align-items: center;
            display: flex;
            position: relative;
            @include media-breakpoint-down(sm) {
                padding: 0px;
                width: 100%;
                margin-bottom: 30px;
                margin-left: 70px;
            }
        }img{
            width: 378px;
            @include media-breakpoint-down(xl) {
                width: 222px;
            }
            @include media-breakpoint-down(lg) {
                width: 200px;
            }
            @include media-breakpoint-down(md) {

            }
            @include media-breakpoint-down(sm) {

            }
        }

        #footer-info{
            height: 100%;
            display: flex;
            align-items: center;
            @include media-breakpoint-down(xl) {
                padding-left: 5px;
            }
            @include media-breakpoint-down(lg) {
                padding: 20px 0px 20px 0px;
            }
            @include media-breakpoint-down(sm) {
              padding: 0;
              width: 300px;
            }
        }

        .title-container{
            display: flex;
        }

        .title{
            color: #EDF2F4;
            @include media-breakpoint-down(xl) {
                font-size: small;
            }
            @include media-breakpoint-down(lg) {
                font-size: x-small;
            }
            @include media-breakpoint-down(md) {

            }
        }

        .info-container{
            justify-content: space-around;
            @include media-breakpoint-down(sm) {
              margin-bottom: 30px;
            }
        }

        ul{
            margin:0px;
            padding: 0px;
        }

        li{
            cursor: pointer;
            list-style: none;
        }

        li:hover{
            color: white;
        }

        #footer-social{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            @include media-breakpoint-down(sm) {
              width: 50%;
              justify-content: space-around;
            }
        }i{
            font-size: xx-large;
            color: #8D99AE;
            margin-right: 10px;
            cursor: pointer;
            @include media-breakpoint-down(xl) {
              font-size: x-large;
            }
            @include media-breakpoint-down(lg) {
              font-size: large;
            }
        }

        i:hover{
            color: white;
        }

        .pl-23{
          padding-left: 23px;
        }
    </style>
