<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Cesta</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <link href="../assets/css/ContenidoCesta.css" rel="stylesheet" type="text/css" media="screen">
</head>


<body>
    <!--Seccion del header (Incluimos el header con un "include" para poder quitar lineas de codigo y tener todo mas ordenado).--> 
    <?php include 'header.php';?>


    <section id="SeccionProductos">
            <h2>LO MÁS VALORADO</h2>
            <div class="Contenedor row g-0">
                <div class="card col-3" style="width: 328px;">
                    <img src="../assets/images/Bacalao.png" class="card-img-top" alt="Bacalao con Boletus">
                    <div class="card-body">
                        <p class="card-title">Bacalao con Boletus</p>
                        <p class="card-text">12 €</p>
                        <button class="boton1">AÑADIR PRODUCTO</button>
                    </div>
                </div>
                <div class="card col-3" style="width: 328px;">
                    <img src="../assets/images/Berenjena.png" class="card-img-top" alt="Berenjena rellena de carne">
                    <div class="card-body">
                        <p class="card-title">Berenjena rellena de carne</`p`>
                        <p class="card-text">6 €</p>
                        <button class="boton1">AÑADIR PRODUCTO</button>
                    </div>
                </div>
                <div class="card col-3" style="width: 328px;">
                    <img  src="../assets/images/Pizza.png"class="card-img-top" alt="Pizza Prosciutto">
                    <div class="card-body">
                        <p class="card-title">Pizza Prosciutto</p>
                        <p class="card-text">10 €</p>
                        <button class="boton1">AÑADIR PRODUCTO</button>
                    </div>
                </div>
                <div class="card col-3" style="width: 328px;">
                    <img  src="../assets/images/CremaCalabaza.png" class="card-img-top" alt="Crema de Calabaza">
                    <div class="card-body">
                        <p class="card-title">Crema de Calabaza</p>
                        <p class="card-text">4 €</p>
                        <button class="boton1">AÑADIR PRODUCTO</button>
                    </div>
                </div>
            </div>
        </section>
        
    <!--Seccion Footer (Incluimos el footer con un "include" para poder quitar lineas de codigo y tener todo mas ordenado).-->
    <?php include 'footer.php';?>
</body>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

</html>