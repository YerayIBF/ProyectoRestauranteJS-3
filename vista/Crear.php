<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Crear</title>
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
<body>
    <form action="<?= url_base . '?controller=Producto&action=crearproducto' ?>" method="POST">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required>
        <br>
        <label for="imagen_nombre">Nombre de la Imagen:</label>
        <input type="text" id="imagen_nombre" name="imagen_nombre" required>
        <br>
        <button type="submit">Crear Producto</button>
    </form>
</body>

</body>
</html>