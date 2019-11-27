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
            die("<h1>Se ha producido un error, disculpe las molestias</h1>");
        }
            if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
                header('WWW-Authenticate: Basic realm="¿Eres Heraclio?"');
                header('HTTP/1.0 401 Unauthorized');
                echo "<h3>volver atras</h3>";
                exit;
            }else{
                $usuario = $_SERVER['PHP_AUTH_USER'];
                $sql = "SELECT * FROM Usuario WHERE CodUsuario LIKE '$usuario';";
                $resultado = $miBD->query($sql);
                if($resultado->rowCount() !== 0){
                    $usuario = $resultado->fetchObject();
                    if($usuario->Password === hash('sha256', $_SERVER['PHP_AUTH_PW'])){
                        echo "Usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br/>";
            
                        echo "Contraseña: " . $_SERVER['PHP_AUTH_PW'];
                    }else{
                        header('Location: ../tema5.html?fallo=true');
                    }
                }else{
                   header('Location: ../tema5.html?fallo=true');
                }               
            }                    
        ?>
