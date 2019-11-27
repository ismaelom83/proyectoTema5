<?php
 /**
         * @author Ismael heras salvador
         * @since 26/11/2019
         */
            if($_SERVER['PHP_AUTH_USER'] !== "heraclio" || $_SERVER['PHP_AUTH_PW'] !== "paso"){
                header('WWW-Authenticate: Basic realm="¿Eres Heraclio?"');
                $_SERVER['PHP_SELF'];
                header('HTTP/1.0 401 Unauthorized');
            }
            echo "Usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br/>";
            
            echo "Contraseña: " . $_SERVER['PHP_AUTH_PW'];
?>


















