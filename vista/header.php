 <!--Header-->
 <!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Header</title>
    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/Header.css" rel="stylesheet" type="text/css" media="screen">

</head>


 <section>
                <div class="HeadSup" >
                    <p><img src="../assets/icons/IconoTelefono.svg"></img>Teléfono 900 81 60 90</p>
                    <p><img src="../assets/icons/IconoReloj.png"></img>Horario 13:00-16:00 / 20:00-23:00 </p>
                    <p><img src="../assets/icons/IconoCorreo.png"></img>10€ de descuento GRATIS</p>
                </div>
            </section>

        <header class="HeaderScroll">
        <section>
                <div class="HeadMed">
                    <p>Quienes somos</p>
                    <p>Restaurantes</p>
                    <p>Servicios</p>
                    <p>Eventos</p>
                    <p>Programa fidelidad</p>
                </div>
            </section>
            <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="" class="Logo"><img src="../assets/images/logo.svg"></img></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active ml-auto">
                            <a class="nav-link  Subrayado   " href="../vista/Home.php">Home</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link  Subrayado   " href="../vista/Carta.php">Carta</a>
                        </li>
                
                    <form class="AjusteForm form-inline my-2 my-lg-0">
                        <input class="TamañoForm mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="boton1 btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                   
                    <ul class="navbar-nav ml-auto MargenAjuste">
                        <li class="nav-item">
                            <a class="nav-link " href="../vista/Login.php"><img src="../assets/icons/usuario.png" width="20px" height="20PX"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  Subrayado  " href="../vista/Cesta.php"><img src="../assets/icons/Bolsa.png" width="20px" height="20PX"></a>
                        </li>
                     </ul>

                    
                </div>
            </nav>
       
        </header>
</html>