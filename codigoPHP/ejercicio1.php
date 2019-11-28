<?php

            
        if ($_SERVER['PHP_AUTH_USER'] !== "heraclio" || $_SERVER['PHP_AUTH_PW'] !== "paso") {
            header('WWW-Authenticate: Basic realm="Dominio crocretil (ismael/paso)"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Operacion cancelada<br>";
            ?>
            <a class="btn btn-info" href="../tema5.php">Salir</a>
            <?php
            exit;
        } else if (($_SERVER["PHP_AUTH_USER"] == "heraclio") && ($_SERVER["PHP_AUTH_PW"] == "paso")) {
            
                ?>
                <a class="btn btn-primary" href="ejercicio0.php">DETALLES</a>
                <a class="btn btn-info" href="../tema5.php">SALIR</a>
                <h2>Autenticacion con exito</h2>
                <?php
            }
        
        ?>


















