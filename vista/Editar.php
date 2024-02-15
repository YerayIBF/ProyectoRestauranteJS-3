<?php ?>
<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Editar</title>
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
<form action="<?= url_base . '?controller=Producto&action=editarproducto' ?>" method="POST">
    <label>ProductoID:</label><br>
    <input name="producto_id" value="<?= $producto->getID_Producto(); ?>" type="number"><br><br>

    <label>Nombre del Producto:</label><br>
    <input name="nombre" value="<?= $producto->getNombre(); ?>" type="text"><br><br>

    <label>Precio:</label><br>
    <input name="precio" value="<?= $producto->getPrecio(); ?>" type="number"><br><br>

    <label>Imagen nombre:</label><br>
    <input name="imagen_nombre" value="<?= $producto->getImg(); ?>" type="text"><br><br>

    <button type="submit">Editar</button>
</form>

</body>
</html>