<?php

            
        if ($_SERVER['PHP_AUTH_USER'] !== "ismael" || $_SERVER['PHP_AUTH_PW'] !== "paso") {
            header('WWW-Authenticate: Basic realm="Dominio crocretil (ismael/paso)"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Operacion cancelada<br>";
          
            exit;
        } else if (($_SERVER["PHP_AUTH_USER"] == "ismael") && ($_SERVER["PHP_AUTH_PW"] == "paso")) {
             echo "Usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br/>";
               echo "Password: " . $_SERVER['PHP_AUTH_PW'];
               echo '<br>';
                ?>
                <a class="btn btn-primary" href="ejercicio0.php">Variables super globales</a>
                <a class="btn btn-info" href="../tema5.php">VOLVER</a>
                <h2>Autenticacion con exito</h2>
                <?php
                
               
            }
        
        ?>


















