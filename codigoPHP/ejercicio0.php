
<a href="../tema5.php"><img src="../img/volver.png" alt="" style="position: fixed; bottom: 0; right: 0;"></a>
            <?php
               /**
             * @author Ismael Heras 
             * @since 28/11/2019
             */
            //iniciamos sesion
            session_start();
            
            //mostarmos las variables superglobales.
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
            ?> 
      















