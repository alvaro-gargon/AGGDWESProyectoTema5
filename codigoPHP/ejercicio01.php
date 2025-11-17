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
     * Uso: Variables superglobales e info.php */ ?>
    <main>
        <h1>Ejercico 1 Tema 5</h1>
        <a href="../indexProyectoTema5.php"><button name="Volver">Volver</button></a>
    <?php
        $pass = password_hash('paso', 256);
                $aUsuarios = [
                    "Alvaro" => [$pass, "Alvaro"],
                    "admin" => [$pass, "adimn"]
                ];

                //si no se han enviado las credenciales hay que pedir autenticación
                if (!isset($_SERVER['PHP_AUTH_USER'], $pass)) {
                    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                    header('HTTP/1.0 401 Unauthorized');
                    echo "Usuario no reconocido!";
                    //es obligatorio exit
                    exit;
                }
                //se comprueban las credenciales
                if (!array_key_exists($_SERVER['PHP_AUTH_USER'], $aUsuarios) || $aUsuarios[$_SERVER['PHP_AUTH_USER']][0] !== $pass) {
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
