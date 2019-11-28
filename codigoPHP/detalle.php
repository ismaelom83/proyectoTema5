


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
         <?php
           /**
             * @author Ismael Heras 
             * @since 28/11/2019
             */
             foreach ($GLOBALS as $todo => $variable) {
            if (is_array($variable)) {
                if ($variable != $GLOBALS) {
                    echo"<h2>" . $todo . "</h2><table>";
                    foreach ($variable as $indice => $contenido) {
                        echo'<tr><td>' . $indice . '</td><td>[' . "'" . $contenido . "']</td></tr>";
                    }
                    echo"</table><br/>";
                }
            } else {
                echo $variable . "<br/>";
            }
        }
           
            ?>
    </body>
</html>