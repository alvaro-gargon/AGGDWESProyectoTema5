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
     * Fecha: 17/11/2025
     * Uso: Desarrollo de un control de acceso con identificación del usuario basado en la función header()  */ ?>
    <main>
        <h1>Ejercico 1 Tema 5</h1>
        <a href="../indexProyectoTema5.php"><button name="Volver">Volver</button></a>
    <?php
         $aUsuarios = [
                    "alvaro" => [hash('sha256', 'paso'), "Alvaro Garcia"],
                    "heraclio" => [hash('sha256', 'paso'), "Héraclio Borbujo"]
                ];
                $usuario=$_SERVER['PHP_AUTH_USER'];
                $passwd = $_SERVER['PHP_AUTH_PW'];
                //si no se han enviado las credenciales hay que pedir autenticación
                if (!isset($usuario,$passwd )) {
                    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Usuario no reconocido!";
                    //es obligatorio exit
                    exit;
                }
                //se comprueban las credenciales
                if (!array_key_exists($usuario, $aUsuarios) || $aUsuarios[$usuario][0] !== hash('sha256', $passwd)) {
                    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Credenciales incorrectas!";
                    //es obligatorio exit
                    exit;
                }

    ?>
    </main>
    <footer>
        <p><a href="../../index.html">Álvaro García González</a></p>
        <p>Última actualización <time datetime="2025-11-17">17/11/2025</time></p>
    </footer>
</body>
</html>
