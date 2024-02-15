<?php
include_once '../config/parameters.php';
?>
<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <link href="../assets/css/ContenidoLogin.css" rel="stylesheet" type="text/css" media="screen">
</head>


<body>
    <!--Seccion del header (Incluimos el header con un "include" para poder quitar lineas de codigo y tener todo mas ordenado).-->
    <?php include 'header.php';?>

    <main>
        <div class="FormularioContenedor">
            <form method="post" action="<?= url . '?controller=producto&action=login' ?>">
                <div class="fuenteh1">ACCEDER</div>
                <div class="form-group">
                    <input type="Text" class="form-control" name="nombreUsuario" required
                        placeholder="Nombre Usuario">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="contraseñaUsuario" required
                        placeholder="Contraseña" > 
                </div>
                <button type="submit" class="BotonForm">INICIAR SESIÓN</button>
            </form>
        </div>
    </main>
    <div class="ajusteMargin">
        <?php include 'footer.php';?>
    </div>
    <!--Seccion Footer (Incluimos el footer con un "include" para poder quitar lineas de codigo y tener todo mas ordenado).-->
</body>

</html>