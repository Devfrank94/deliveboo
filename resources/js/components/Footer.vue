    <script>
    export default {
    name: "Footer",
        data(){
            return{

            }
        }
    }
    </script>

    <template>
        <footer>

            <div class="nd-container d-flex">

                <div id="footer-img-container" class="container-fluid">
                    <img src="../../../public/deliveboo-white-no-background.png" alt="">
                </div>

                <!-- CONTENITORE INFO FOOTER -->
                <div id="footer-info">

                    <div class="title-container">
                        <div class="title"><h3>Categorie</h3></div>
                        <div class="title"><h3>Sito</h3></div>
                    </div>

                    <!-- CONTENITORE DELLE INFO  -->
                    <div class="info-container d-flex container-fluid">
                        <div class="ul-container container-fluid">
                            <ul>
                                <li>Italiano</li>
                                <li>Pizza </li>
                                <li>Sushi</li>
                                <li>Americano</li>
                            </ul>
                        </div>

                        <div class="ul-container container-fluid">
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
                <div id="footer-social" class="container-fluid">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>

            </div>
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
            height: 300px;
            background-color: #2B2D42;
            color: #8D99AE;
        }

        #footer-img-container{
            height: 100%;
            padding-left: 21px;
            align-items: center;
            display: flex;
            width: 30%;
        }img{
            width: 378px;
            @include media-breakpoint-down(xl) {
                width: 222px;
            }
            @include media-breakpoint-down(lg) {
                width: 200;
            }
            @include media-breakpoint-down(md) {

            }
        }

        #footer-info{
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 30%;
            @include media-breakpoint-down(xl) {
                padding-left: 5px;
            }
            @include media-breakpoint-down(lg) {
                padding: 20px 0px 20px 0px;
            }
            @include media-breakpoint-down(md) {

            }
        }

        .title-container{
            display: flex;
        }

        .title{
            width: 50%;
            color: #EDF2F4;
            padding-left: 23px;
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
        }

        ul{
            margin-bottom: 0px;
        }

        li{
            cursor: pointer;
        }

        li:hover{
            color: white;
        }

        #footer-social{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 30%;
        }i{
            font-size: xx-large;
            color: #8D99AE;
            margin-right: 10px;
            cursor: pointer;
        }

        i:hover{
            color: white;
        }
    </style>
