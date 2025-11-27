<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álvaro García González</title>
    <link rel="stylesheet" href="../webroot/css/estilos.css"/>
</head>
<body>
    <?php /*
     * Nombre: Alvaro Garcia Gonzalez
     * Fecha: 27/11/2025
     * Uso: Desarrollo de un control de acceso con identificación del usuario basado en la función header() y
                    en el uso de una tabla “Usuario” de la base de datos. (PDO). */ ?>
    <main>
        <h1>Ejercico 2 Tema 5</h1>
        <a href="../indexProyectoTema5.php"><button name="Volver">Volver</button></a>

<?php

//si no se han enviado las credenciales hay que pedir autenticación
                
                $usuarioPasswd=$_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW'];
               
               if(!isset($_SERVER['PHP_AUTH_USER'])) {
                    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Usuario no reconocido!";
                    exit; //el programa acaba aqui
                }
                //si se han enviado las credenciales,se comprueban las credenciales, con la base de datos
                //enlace a los datos de conexión
                require_once '../config/ConfDBPDO.php';
                try {
                    $miDB = new PDO(DNS,USERNAME,PASSWORD);
                    $miDB->exec("use DBAGGDWESProyectoTema5;");
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT T01_CodUsuario,T01_Password,T01_DescUsuario  FROM T_01Usuario 
                      WHERE T01_CodUsuario= :usuario AND T01_Password = sha2(:passwd,256)";

                    $resultado = $miDB->prepare($sql);
                    $resultado->execute([
                        ':usuario' => $_SERVER['PHP_AUTH_USER'],
                        ':passwd' => $usuarioPasswd]);

                    $usuarioBD = $resultado->fetch();
                    // Si no exite, se vuelve a pedir las credenciales.
                    if (!$usuarioBD || $usuarioBD['T01_Password'] !== hash('sha256', $usuarioPasswd)) {
                        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                        header('HTTP/1.0 401 Unauthorized');
                        echo "Credenciales incorrectas!";
                        exit;
                    }
                } catch (Exception $ex) {
                    echo"Error: " . $ex->getMessage();
                    exit;
                }

?>
       <h2>Bienvenido/a, <?php echo $usuarioBD['T01_DescUsuario'];?> </h2>
</main>
    <footer>
        <p><a href="../../index.html">Álvaro García González</a></p>
        <p>Última actualización <time datetime="2025-11-17">17/11/2025</time></p>
    </footer>
</body>
</html>