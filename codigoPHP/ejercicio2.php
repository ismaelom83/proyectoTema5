





<!DOCTYPE html>
<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic Realm=" ismael / paso"');
    header('HTTP/1.0 401 Unauthorized');
    echo "¿Quieres cancelar?, volver para atrás<br>";
    ?>
    <a class="btn btn-warning" href="../tema5.php">VOLVER</a>
    <?php
    exit;
}
?>
<html>
    <head>
        <title>Ejercicio2 Tema5</title>
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
            require '../config/constantes.php';
            $usuario = $_SERVER['PHP_AUTH_USER'];
            $passwd = $_SERVER['PHP_AUTH_PW'];
            echo '<h3>' . "Nombre de usuario: " . $usuario . '</h3>' . "<br />";
            echo '<h3>' . "Contraseña: " . $passwd . '</h3>' . "<br />";
            try {
                  
                
                //conexion a la base de datos.
                $miBD = new PDO(MAQUINA, USUARIO, PASSWD);
                $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //con este query buscamos en la base de datos
                $SQL = "SELECT * FROM Usuario WHERE CodUsuario = :user AND Password = :hash";

                //almacenamos en una variable (objeto PDOestatement) la consulta preparada
                $oPDO = $miBD->prepare($SQL);
                //blindeamos los parametros
                $oPDO->bindValue(':user', $usuario);
                //la contraseña es paso, pero para resumirla -> sha + contraseña=concatenacion de nombre+password
                $oPDO->bindValue(':hash', hash('sha256', $usuario . $passwd));
                $oPDO->execute();

                //almacenamos todos los datos de la consulta en un array para mostar por pantalla luego los datos del registro e l asesion del usuario.
                $resultado = $oPDO->fetch(PDO::FETCH_ASSOC);


                //recorremos todos los campos de la base de datos y si coincide en uno ejecuta el if y nos dice
                //que el usuario es correcto y nos muestra los datos(contraseña y password),si no ejecuta el else y nos dice 
                //que no existe el usuario.
                if ($oPDO->rowCount() == 1) {
                    //iniciamos sesion
                     session_start();
                    $_SESSION['usuarioDAW209AppLOginLogoff'] = $resultado['CodUsuario'];
                    $_SESSION['descripcion'] = $resultado['DescUsuario'];
                    $_SESSION['fechaCreacionRegistro'] = $resultado['FechaHoraUltimaConexion'];
                    ?>
                    <h1>Usuario Correcto</h1><br>
                    <input type="button" class="btn btn-success" value="DETALLE" onclick="location = 'detalle.php'">
                    <input type="button" class="btn btn-warning" value="CerrarSesion" onclick="location = 'borrarSesion.php'">
                    <?php
                   
                } else {
                    header('WWW-Authenticate: Basic Realm=" ismael / paso"');
                    header('HTTP/1.0 401 Unauthorized');
                    echo 'Estos usuarios no coinciden con ninguno';
                    echo "¿Quieres cancelar?, volver para atrás<br>";
                    ?>
                    <a class="btn btn-warning" href="../tema5.php">VOLVER</a>                  
                    <?php
                     exit;
                }
                //cath que se ejecuta si habido un error
            } catch (PDOException $excepcion) {
                echo "<h1>Se ha producido un error</h1>";
                //nos muestra el error que ha ocurrido.
                echo $excepcion->getMessage();
            } finally {
                unset($miBD); //cerramos la conexion a la base de datos.
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
