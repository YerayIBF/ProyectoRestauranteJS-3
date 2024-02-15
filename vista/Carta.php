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

    <main class="contenedor-general">

        <div>
            <p class="EstiloPLink"><a class="EstiloLink" href="../vista/home.php ">Inicio </a>/ Carta</p>
            <div class="linea">
                <h1>CARTA</h1>
                <p class="">12 Productos</p>
            </div>
            <p>Descubre nuestra carta con productos variados para adultos niños y bebés. Papillas personalizables para
                bebés por encargo, productos sin gluten.</p>
        </div>
        <hr class="hrEstilo">
        <div class="ContenidoAlineado">
            <p>Mostrar filtros <img class="rotar-flechas" src="../assets/icons/downarrowDer.png"></p>

            <div id="filtros">
                <label for="filtro-adultos">Para adultos:</label>
                <input type="checkbox" id="filtro-adultos" class="filtro-categoria" value="1">

                <label for="filtro-infantil">Para peques:</label>
                <input type="checkbox" id="filtro-infantil" class="filtro-categoria" value="2">
            </div>
            <p>Ordenar por: <b><span class="marginTexto">Más popular</span></b><img class="rotar-flechas"
                    src="../assets/icons/downarrowDer.png"></p>
        </div>
        <hr class="hrEstilo">

        <?php if ($rolUsuario == 'Administrador'): ?>
        <form action="<?=url_base.'?controller=Producto&action=crearmostrar'?>" method="POST">
            <button type="submit" class="botonadmincrear">Crear</button>
        </form>
        <?php endif; ?>

        <section id="SeccionProductos" class="epacioMargin">
            <div class="Contenedor ROW ">
                <?php foreach ($productos as $producto) : ?>
                <div class="card col-3 " style="width: 328px; margin-bottom: 30px " data-categoria="<?= $producto->getCategoria(); ?>">
                    <img src="../assets/images/<?= $producto->getImg();; ?>" class="card-img-top "
                        alt="<?= $producto->getNombre(); ?>">
                    <div class="card-body p-0 ">
                        <p class="card-title "><?=  $producto->getNombre(); ?></p>
                        <p class="card-text  "><?= $producto->getPrecio(); ?> €</p>
                        <div class="d-flex flex-column align-items-center ">
                            <?php if ($rolUsuario == 'Administrador'): ?>
                            <form action="<?= url_base . '?controller=Producto&action=editarmostrar' ?>" method="POST">
                                <input type="hidden" name="producto_id" value="<?= $producto->getID_Producto(); ?>">
                                <button type="submit" class="botonadmin">Editar</button>
                            </form>

                            <form action=<?=url_base.'?controller=Producto&action=eliminarproducto'?> method="POST">
                                <input type="hidden" name="producto_id" value="<?= $producto->getID_Producto(); ?>">
                                <button type="submit" class="botonadmin">Eliminar</button>
                            </form>
                            <?php endif; ?>

                            <form action="<?= url_base . '?controller=Producto&action=agregarcesta' ?>" method="POST">
                                <input type="hidden" name="producto_id" value="<?= $producto->getID_Producto(); ?>">
                                <button class="boton1  mt-auto">AÑADIR PRODUCTO</button>
                            </form>

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
            <img src="../assets/icons/DobleFlecha.png">
        </div>
    </main>
    <!--Seccion Footer (Incluimos el footer con un "include" para poder quitar lineas de codigo y tener todo mas ordenado).-->
<script src="../assets/js/ProductoFiltros.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>


</html>