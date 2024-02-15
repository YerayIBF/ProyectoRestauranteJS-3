    <!DOCTYPE html PUBLIC>
    <html>

    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="description" content="Descripció web">
        <meta name="keywords" content="Paraules clau">
        <meta name="author" content="Autor">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
        <link href="../assets/css/ContenidoHome.css" rel="stylesheet" type="text/css" media="screen">
    </head>

    <body>
        <!--Seccion del header (Incluimos el header con un "include" para poder quitar lineas de codigo y tener todo mas ordenado).-->
       
        <main>
            <!--Seccion del banner-->
            <section id="Banner">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active ">
                            <div class="carousel-caption d-none d-md-block textoBanner  text-start ">
                                <h1>RESTAURANTE</h1>
                                <p class="text-start ms-0">Ven a disfrutar en familia de nuestros <br> menus con los mas
                                    pequeños de la casa!.</p>
                                <a href="../vista/Carta.php"> <button class="boton1">VER CARTA</button></a>
                            </div>
                            <img src="../assets/images/Restaurante.png" class="d-block ajusteImgBan" width="850px"
                                height="535px" alt="restaurente">
                        </div>
                        <div class="carousel-item backgroundBanner">
                            <div class="carousel-caption d-none d-md-block textoBanner  text-start ">
                                <h1>RESTAURANTE</h1>
                                <p class="text-start ms-0">Ven a disfrutar en familia de nuestros <br> menus con los mas
                                    pequeños de la casa!.</p>
                                <a href="../vista/Carta.php"> <button class="boton1">VER CARTA</button></a>
                            </div>
                            <img src="../assets/images/ImagenBanner.webp." class="d-block ajusteImgBan" width="850px"
                                height="535px" alt="restaurente">
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-caption d-none d-md-block textoBanner  text-start ">
                                <h1>RESTAURANTE</h1>
                                <p class="text-start ms-0">Ven a disfrutar en familia de nuestros <br> menus con los mas
                                    pequeños de la casa!.</p>
                                <a href="../vista/Carta.php"> <button class="boton1">VER CARTA</button></a>
                            </div>
                            <img src="../assets/images/ImagenBanner2.webp" class="d-block ajusteImgBan" width="850px"
                                height="535px" alt="restaurente">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>


            <!--Seccion de productos -->
            <section id="SeccionProductos">
                <h2>LO MÁS VENDIDO</h2>
                <div class="Contenedor ROW g-0">
                    <div class="card col-3 " style="width: 315px;">
                        <img src="../assets/images/Spaghetti.png" class="card-img-top " alt="">
                        <div class="card-body p-0 ">
                            <p class="card-title">Spaghetti a la Boloñesa</p>
                            <p class="card-text">7 €</p>
                            <div class="d-flex flex-column align-items-center ">
                                <button class="boton1  mt-auto">AÑADIR PRODUCTO</button>
                            </div>
                        </div>
                    </div>
                    <div class="card col-3 " style="width: 315px;">
                        <img src="../assets/images/PapillaVerdura.png" class="card-img-top " alt="">
                        <div class="card-body p-0 ">
                            <p class="card-title ">Papilla de Verdura</p>
                            <p class="card-text  ">4 €</p>
                            <div class="d-flex flex-column align-items-center ">
                                <button class="boton1  mt-auto">AÑADIR PRODUCTO</button>
                            </div>
                        </div>
                    </div>
                    <div class="card col-3 " style="width: 315px">
                        <img src="../assets/images/ArrozConVerduras.png" class="card-img-top " alt="">
                        <div class="card-body p-0 ">
                            <p class="card-title ">Arroz con Verduras</p>
                            <p class="card-text ">6 €</p>
                            <div class="d-flex flex-column align-items-center ">
                                <button class="boton1  mt-auto">AÑADIR PRODUCTO</button>
                            </div>
                        </div>
                    </div>
                    <div class="card col-3 " style="width: 315px">
                        <img src="../assets/images/PatatasConNuggets.png" class="card-img-top " alt="">
                        <div class="card-body p-0 ">
                            <p class="card-title ">Patatas con Nuggets </p>
                            <p class="card-text  ">6 €</p>
                            <div class="d-flex flex-column align-items-center ">
                                <button class="boton1  mt-auto">AÑADIR PRODUCTO</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--Seccion que Disponemos-->
            <section id="QueDisponemos">
                <h2>¿QUE DISPONEMOS?</h2>
                <div class="Contenedor row g-0 ">
                    <div class="card col-4">
                        <img src="../assets/images/Tronas.png" class="card-img-top" alt="Tronas">
                        <div class="card-body">
                            <h3 class="card-title">TRONAS</h3>
                            <p class="card-text">Disponemos de tronas con diferentes tamaños para cada edad.</p>
                        </div>
                    </div>
                    <div class="card col-4">
                        <img src="../assets/images/MicroondasYhervidores.png" class="card-img-top"
                            alt="Microondas y hervidores">
                        <div class="card-body">
                            <h3 class="card-title">MICROONDAS Y HERVIDORES</h3>
                            <p class="card-text">Los clientes pueden traer la comida y poder calentarla en nuestros
                                microondas,
                                y
                                disponemos de hervidores para realizar los biberones de los peques.</p>
                        </div>
                    </div>
                    <div class="card col-4">
                        <img src="../assets/images/MesasYSillas.png" class="card-img-top"
                            alt="Mesas y sillas con cubiertos">
                        <div class="card-body">
                            <h3 class="card-title">MESAS, SILLAS, VAJILLA Y CUBERTERIA</h3>
                            <p class="card-text">Disponemos de mobiliarios y utensilios para las necesidades de los
                                peques.
                            </p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="Contenedor2">
                    <button class="boton1">VER TODO</button>
                    <div>
            </section>

            <!--Seccion de nuestros servicios-->
            <section id="NuestrosServicios">
                <h2>NUESTROS SERVICIOS</h2>
                <p>Descubre todas nuestras ventajas, tanto en restaurante como online.</p>
                <div class="Contenedor row g-0 ">
                    <div class="card col-3">
                        <div class="card-body">
                            <h3 class="card-title">SERVICIO DE CANGURO</h3>
                            <p class="card-text">Disponemos de canguro donde vuestros hijo disfrutaran de diferentes
                                actividades</p>
                            <button href="#" class="boton2">LEER MÁS</button>
                        </div>
                    </div>
                    <div class="card  col-3">
                        <div class="card-body">
                            <h3 class="card-title">PROGRAMA DE FIDELIDAD</h3>
                            <p class="card-text">Llevate tu tarjeta fidelidad y acumula puntos para descuentos en tus
                                proximas visitas.</p>
                            <button href="#" class="boton2">LEER MÁS</button>
                        </div>
                    </div>
                    <div class="card  col-3">
                        <div class="card-body">
                            <h3 class="card-title">ESPACIOS DE JUEGO</h3>
                            <p class="card-text">Diferentes estancias para que los niños se diviertan mientras los
                                padres
                                disfrutan de la comida</p>
                            <button href="#" class="boton2">LEER MÁS</button>
                        </div>
                    </div>
                    <div class="card  col-3">
                        <div class="card-body">
                            <h3 class="card-title">ESPECTACULOS</h3>
                            <p class="card-text">Los padres pueden contratar artistas magos payasos y personajes de
                                dibujos
                                animados para entretener a vustros hijos</p>
                            <button href="#" class="boton2">LEER MÁS</button>
                        </div>
                    </div>

                </div>
                <div class="Contenedor2">
                    <button class="boton1">DESCÚBRELOS TODOS</button>
                </div>
            </section>
        </main>
        <!--Seccion Footer (Incluimos el footer con un "include" para poder quitar lineas de codigo y tener todo mas ordenado).-->

    </body>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    </html>