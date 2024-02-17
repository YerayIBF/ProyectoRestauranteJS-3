<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Cesta</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripción web">
    <meta name="keywords" content="Palabras clave">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <link href="../assets/css/ContenidoCesta.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
</head>

<body>

<main class="contenedor-general">
    <div class="contenedor-cesta-detalles">

        <h1 class="h1Cesta">CESTA(<?php 
        if(isset($_SESSION['cesta'])) {
            echo count($_SESSION['cesta']); 
        } else {
            echo "0";
        }
        ?>)</h1>
        <section class="ProductosCesta">
            <?php foreach ($cesta as $producto) : ?>
                <div class="producto">
                    <p><img src="../assets/images/<?= $producto->getImg(); ?>" alt="<?= $producto->getNombre(); ?>" width="145" height="150"></p>
                    <p class="NombreProducto"><?= $producto->getNombre(); ?></p>
                    <p class="PrecioProducto"><?= $producto->getPrecio() * $producto->getCantidad(); ?> €<p>
                    <p class="CantidadProducto">Cantidad: <?= $producto->getCantidad(); ?></td>
                    <form action="<?= url_base . '?controller=Producto&action=eliminarproductocesta' ?>" method="POST">
                        <input type="hidden" name="producto_id" value="<?= $producto->getID_Producto(); ?>">
                        <button type="submit" class="eliminar-btn"><img src="../assets/icons/eliminar.png" width="19" height="20" class=""></button>
                    </form>
                </div>
                <hr>
            <?php endforeach; ?>
        </section>

        <section class="DetallesCompra">
    <form  action="<?= url_base . '?controller=api&action=calcular_y_actualizar_puntos' ?>" method="POST">
    <label>¿Quieres dar Propina? (En %)</label>
        <br>
        <input type="number" min="3" value="3" max="100" placeholder="Propina" id="propina" name="propina">
        <br>
        <br>
        <label>¿Quieres Utilizar tus puntos? (Puntos Actuales: )</label>
        <br>
        <input type="number" min="0" max="2000" placeholder="Puntos" id="puntos" name="puntos">
        <br>
        <br>
        <button type="submit" class="boton1"><strong>CALCULAR</strong></button>
    </form>
    <br>
    <div>
        <p>Subtotal: <span class="align-right" id="subtotal">€ <?= $totalCompra; ?></span></p>
        <p>Propina: <span class="align-right" id="propinaTotal">€ </span></p>
        <p>Puntos utilizados:<span class="align-right" id="puntosUtilizados">€ </span></p> 
    </div>        
    <p class="TotalDetallescompra">Total: <span class="align-right" id="totalCompra">€ <?= $totalCompra; ?> </span></p>
    <!-- Agregar un formulario para finalizar el pedido -->
    <form action="<?= url_base . '?controller=Producto&action=finalizarPedido' ?>" method="POST">
        <button type="submit" class="boton1"><strong>PROCEDER AL PAGO</strong></button>
    </form>
    <div>
        <p>Con este pedido ganarás puntos</p>
    </div>
</section>
    </div>
    <section id="SeccionProductos">
        <h2>LO MÁS VALORADO</h2>
        <div class="Contenedor row  ">
            <div class="card col-3 " style="width: 328px; margin-bottom: 30px">
                <img src="../assets/images/Bacalao.png" class="card-img-top" alt="Bacalao con Boletus">
                <div class="card-body p-0 ">
                    <p class="card-title">Bacalao con Boletus</p>
                    <p class="card-text">12 €</p>
                    <div class="d-flex flex-column align-items-center ">
                        <button class="boton1">AÑADIR PRODUCTO</button>
                    </div>
                </div>
            </div>
            <div class="card col-3 " style="width: 328px; margin-bottom: 30px ">
                <img src="../assets/images/Berenjena.png" class="card-img-top" alt="Berenjena rellena de carne">
                <div class="card-body p-0 ">
                    <p class="card-title">Berenjena rellena de carne</p>
                    <p class="card-text">6 €</p>
                    <div class="d-flex flex-column align-items-center ">
                        <button class="boton1">AÑADIR PRODUCTO</button>
                    </div>
                </div>
            </div>
            <div class="card col-3 " style="width: 328px; margin-bottom: 30px ">
                <img  src="../assets/images/Pizza.png"class="card-img-top" alt="Pizza Prosciutto">
                <div class="card-body p-0 ">
                    <p class="card-title">Pizza Prosciutto</p>
                    <p class="card-text">10 €</p>
                    <div class="d-flex flex-column align-items-center ">
                        <button class="boton1">AÑADIR PRODUCTO</button>
                    </div>
                </div>
            </div>
            <div class="card col-3 " style="width: 328px; margin-bottom: 30px ">
                <img  src="../assets/images/CremaCalabaza.png" class="card-img-top" alt="Crema de Calabaza">
                <div class="card-body p-0 ">
                    <p class="card-title">Crema de Calabaza</p>
                    <p class="card-text">4 €</p>
                    <div class="d-flex flex-column align-items-center ">
                        <button class="boton1">AÑADIR PRODUCTO</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>       

<script src="../assets/js/bootstrap.bundle.min.js" ></script>
<script src="../assets/js/PuntosPropinas.js"> </script>
<script src="https://unpkg.com/notie"></script>
</body>

</html>