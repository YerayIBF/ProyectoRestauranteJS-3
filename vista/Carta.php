<?php
include_once '../modelo/ProductoDAO.php';

$productos = ProductoDAO::getAllProducts();
?>
<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Carta</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <link href="../assets/css/ContenidoCarta.css" rel="stylesheet" type="text/css" media="screen">
</head>


<body>    

      <!--Seccion del header (Incluimos el header con un "include" para poder quitar lineas de codigo y tener todo mas ordenado).--> 
      <?php include 'header.php';?>
            <main class="contenedor-general">
                
                <div>
                <p class="EstiloPLink"><a class="EstiloLink"href="../vista/home.php " >Inicio </a>/ Carta</p>
                <div class="linea">
                    <h1>CARTA</h1> <p class="">12 Productos</p>
            </div>
                    <p>Descubre nuestra carta con productos variados para adultos niños y bebés. Papillas personalizables para bebés por encargo, productos sin gluten.</p>
                </div>
                <hr class="hrEstilo">
                   <div class="ContenidoAlineado">
                     <p>Mostrar filtros <img class="rotar-flechas"  src="../assets/icons/downarrowDer.png"></p> 
                     <p>Ordenar por: <b><span class="marginTexto">Más popular</span></b><img class="rotar-flechas"  src="../assets/icons/downarrowDer.png"></p>
                  </div>
                <hr class="hrEstilo">


            <section id="SeccionProductos"  class="epacioMargin">
            <div class="Contenedor ROW ">
            <?php foreach ($productos as $producto) : ?>
                    <div class="card col-3 " style="width: 328px; margin-bottom: 30px">
                        <img src="../assets/images/<?= $producto->getImg();; ?>" class="card-img-top " alt="<?= $producto->getNombre(); ?>">
                        <div class="card-body p-0 ">
                            <p class="card-title "><?=  $producto->getNombre(); ?></p>
                            <p class="card-text  "><?= $producto->getPrecio(); ?> €</p>
                            <div class="d-flex flex-column align-items-center ">
                                <button class="boton1  mt-auto">AÑADIR PRODUCTO</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center contenidoFlechas d-flex align-items-center justify-content-center">
            <img class="rotar-Dobleflechas" src="../assets/icons/DobleFlecha.png">
            <img class="margenFlechas" src="../assets/icons/downarrowIzq.png">
            <p class="margenFlechas m-0">1 de 1</p>
            <img class="margenFlechas" src="../assets/icons/downarrowDer.png">
            <img  src="../assets/icons/DobleFlecha.png">
        </div>
        </main>
          <!--Seccion Footer (Incluimos el footer con un "include" para poder quitar lineas de codigo y tener todo mas ordenado).-->
          <?php include 'footer.php';?>
</body>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

</html>