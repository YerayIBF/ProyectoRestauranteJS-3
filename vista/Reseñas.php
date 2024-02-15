<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Descripción web">
    <meta name="keywords" content="Palabras clave">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mostrar Reseñas</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/Footer.css" rel="stylesheet" type="text/css" media="screen">
    
</head>

<body>
    <main>
    <div id="filtros">
        <label for="filtro-valoracion">Filtrar por valoracion:</label>
        <select id="filtro-valoracion">
            <option value="0">Todas las valoraciones</option>
            <option value="1">1 estrella</option>
            <option value="2">2 estrellas</option>
            <option value="3">3 estrellas</option>
            <option value="4">4 estrellas</option>
            <option value="5">5 estrellas</option>
        </select>
        <button id="orden-ascendente">Orden ascendente</button>
        <button id="orden-descendente">Orden descendente</button>
    </div>
        <div id="reseñas-container"></div>
    </main>
</body>
<script src="../assets/js/Reseñas.js"></script>
<script src="../assets/js/ReseñasFiltros.js"></script>
</html>