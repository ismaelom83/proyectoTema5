<!DOCTYPE">
<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic Realm=" Heraclio / paso"');
    header('HTTP/1.0 401 Unauthorized');
    echo "¿Cancelar?, vuelve para atrás";
    exit;
}
?>
<html>
    <head>       
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejercicio 2</title>
        <link href="webroot/css/estilo.css"  rel="stylesheet"    type="text/css" title="Default style">
    </head>
    <body>
        <?php
        require '../config/constantes.php';
        $user = $_SERVER['PHP_AUTH_USER'];
        $pwd = $_SERVER['PHP_AUTH_PW'];
        echo "Nombre de usuario: " . $user . "<br />";
        echo "Contraseña: " . $pwd . "<br />";
        try {
            $miBD = new PDO(MAQUINA, USUARIO, PASSWD);
            $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $SQL = "SELECT * FROM Usuario WHERE CodUsuario = :user AND Password = :hash"; //es el query para buscar un usuario en la base de datos mediante su codigo de usuario y su hash
             
            $consulta = $miBD->prepare($SQL); //preparamos la consulta preparada
            //asignacion de valores con bindValue (te puede dar error en este caso con bindParam)
            $consulta->bindValue(':user', $user);
            $consulta->bindValue(':hash', hash('sha256', $user . $pwd)); //la contraseña es paso, pero para resumirla -> sha + contraseña=concatenacion de nombre+password
            $consulta->execute();
            if ($consulta->rowCount() == 1) { //te recorre todas las campos de la base, y si uno es como dice el query pues se ejecuta el if
                ?>
                <h2>usuario correcto</h2>
                <input type="button" class="btn btn-primary" value="ENTRAR" onclick="location = 'detalle.php'">
                <input type="button" class="btn btn-primary" value="VOLVER" onclick="location = '../indexProyectoTema5.html'">
        <?php
    } else {
        ?>
                <h2>usuario incorrecto</h2>
                <input type="button" class="btn btn-primary" value="VOLVER" onclick="location = '../indexProyectoTema5.html'">
        <?php
    }
} catch (PDOException $excepcion) { //si se produce un error
    echo "<h1>Se ha producido un error</h1>"; //aviso de que ha saltado un error
    echo $excepcion->getMessage(); //error en cuestión
} finally {
    unset($miBD); //cierro la sesion en la base de datos
}
?>
    </body>
</html>