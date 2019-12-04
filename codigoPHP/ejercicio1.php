


<!DOCTYPE html>

<html>
    <head>
        <title>Ejercicio0 Tema5</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../WEBBROOT/css/estilosEjer.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <header>

        <nav class="navbar navbar-expand-sm navbar-light load-hidden"  style="background-color: #e3f2fd;">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../../../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDWES/DWES.php">DWES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDWEC/DWEC.php">DWEC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDAW/DAW.php">DAW</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../proyectoDIW/DIW.php">DIW</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../tema5.php">VOLVER  </a>
                    </li>
                </ul >

            </div>
        </nav>
    </header>
    <body>
        <main>
            <?php
            if ($_SERVER['PHP_AUTH_USER'] !== "ismael" || $_SERVER['PHP_AUTH_PW'] !== "paso") {
                header('WWW-Authenticate: Basic realm="Dominio crocretil (ismael/paso)"');
                header('HTTP/1.0 401 Unauthorized');
                echo "<h1>Operacion cancelada</h1>".'<br>';
                ?>

                <a class="btn btn-warning" href="../tema5.php">Salir</a>
                <?php
                exit;
            } else if (($_SERVER["PHP_AUTH_USER"] == "ismael") && ($_SERVER["PHP_AUTH_PW"] == "paso")) {
                session_start();
                echo '<h3>' . "Usuario: " .$sesionU= $_SERVER['PHP_AUTH_USER'] . '</h3>' . "<br/>";
                echo '<h3>' . "Password: " . $sesionP= $_SERVER['PHP_AUTH_PW'] . '</h3>';
                echo '<br>';
                $_SESSION['usuarioDAW209AppLOginLogoff']=$sesionU;
                $_SESSION['password']=$sesionP;
                ?>
                <h1>Autenticacion con exito</h1><br>
                <a class="btn btn-success" href="detalle.php">DETALLE</a>
                <a class="btn btn-warning" href="borrarSesion.php">CerrarSesion</a>

                <?php
            }
            ?>
            <br/>
            <br/>
            <footer class="page-footer font-small blue load-hidden">
                <div class="footer-copyright text-center py-3"> <a href="../../../index.php">© 2019 Copyright: Ismael Heras Salvador</a> 
                    <a href="http://daw-usgit.sauces.local/heras/proyectoTema5/tree/developer"><img  src="../img/gitLab.png" alt=""></a>
                    <a href="https://github.com/ismaelom83/proyectoTema5"><img  src="../img/gitHub.png" alt=""></a>
                </div>

            </footer> 
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </main>
    </body>

</html>




































