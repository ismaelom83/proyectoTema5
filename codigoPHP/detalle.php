


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../WEBBROOT/css/estilosEjer.css">
    </head>
    <body>
        <h1>Conexion correcta</h1>
        <a href="ejercicio1.php"><img src="../img/volver.png" alt="" style="position: fixed; bottom: 0; right: 0;"></a>
         <?php
           /**
             * @author Ismael Heras 
             * @since 28/11/2019
             */
                      //Iniciar una nueva sesión o reanudar la existente
            session_start();
            //estructura de control que nos permite controlar que si alguien quiere entrar directamente a el contenido no
            //puede por que no se ha logeado y por lo tanto la variable de sesion de clave de usuario no existe
            if (!isset($_SESSION['usuarioDAW209AppLOginLogoff'])) {
                echo '<h1>No tienes autorizacion de entrada,Debes de logearte primero</h1>';
                echo '<h1>' . '<a href="login.php">Ir_Login</a>' . '</h1>';
                die();
            } else {//si existe la sesion mostramos los datos del usuario.
            echo 'Variables Superglobales';
            echo '<br>';
            echo '<div style="margin-left: 30px";>';
            echo "<pre style='text-align:left;'>";
           echo "<h2 style='text-align:left;'>Variable SESSION<br><br></h2>";
            print_r($_SESSION) . '<br>';
            echo "</pre>";
           
            echo "<pre style='text-align:left;'>";
            echo "<h2 style='text-align:left;'>Variable COOKIE<br><br></h2>";
            print_r($_COOKIE) . '<br>';
            echo "</pre>";           
            echo "<pre style='text-align:left; margin-left:20px;'>";
            echo "<h2 style='text-align:left;'>Variable SERVER<br><br></h2>";
            print_r($_SERVER) . '<br>';
            echo "</pre>";
           echo '</div>';
           phpinfo();
            }
            ?>
    </body>
</html>