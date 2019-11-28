<?php
        /**
         * @author Ismael Heras
         * @since 27/11/2019
         */
        include '../config/constantes.php'; //Importo los datos de conexión
        try{
            $miBD = new PDO(MAQUINA, USUARIO, PASSWD);
            $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $excepcion){
            die("<h1>Error,Conexion a la base de datos incorrecta</h1>");
        }
            if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
                header('WWW-Authenticate: Basic realm=""');
                header('HTTP/1.0 401 Unauthorized');
                echo "<h3>volver atras</h3>";
                exit;
                        
            }                    
        ?>
