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
                <div id="footer-img-container">
                    <!-- QUI ANDRA IL LOGO DEL FOOTER -->
                </div>

                <!-- CONTENITORE INFO FOOTER -->
                <div id="footer-info">
                    <div class="title-container">
                        <div class="title"><h3>Titolo</h3></div>
                        <div class="title"><h3>Titolo</h3></div>
                    </div>
                    <!-- CONTENITORE DELLE INFO  -->
                    <div class="info-container d-flex">
                        <div class="ul-container">
                            <ul>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                            </ul>
                        </div>

                        <div class="ul-container">
                            <ul>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
                                <li>Lorem ipsum dolor ipsum dolor</li>
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
        </footer>
    </template>

    <style lang="scss" scoped>
        .nd-container{
            height: 250px;
            background-color: #2B2D42;
            color: #8D99AE;
        }

        #footer-img-container{
            height: 100%;
            width: 25%;
            background-color: lightblue;
        }

        #footer-info{
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;

        }

        .title-container{
            display: flex;
        }

        .title{
            padding-left: 85px;
            width: 50%;
            color: #EDF2F4;
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
            width: 25%;
            height: 100%;
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
