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
         * Uso: Desarrollo de un control de acceso con identificación del usuario basado en la función header(). */ ?>
        <main>
            <h1>Ejercico 1 Tema 5</h1>
            <a href="../indexProyectoTema5.php"><button name="Volver">Volver</button></a>
            <?php

            if ($_SERVER['PHP_AUTH_USER']!=admin || $_SERVER['PHP_AUTH_PASSWD']) {
                // Enviar encabezado de autenticación para solicitar credenciales
                header('WWW-Authenticate: Basic realm="Contenido restringido"');

                header('HTTP/1.0 401 Unauthorized');

                // Mostrar mensaje si damos a cancelar
                echo '<h1>Acceso denegado. Se requiere autenticación.</h1>';
                exit;
            }

// Si llega aquí, la autenticación fue exitosa.
            ?>
        </main>
        <footer>
            <p><a href="../../index.html">Álvaro García González</a></p>
            <p>Última actualización <time datetime="2025-11-17">17/11/2025</time></p>
        </footer>
    </body>
</html>
