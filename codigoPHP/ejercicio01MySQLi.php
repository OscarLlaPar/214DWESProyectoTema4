<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-DWES - Ejercicio 1 (MySQLi)</title>
    </head>
    <body>
        <?php
            /*
            * Ejercicio 01
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 04/11/2021
            */
            define("HOST", "192.168.3.114");
            define("USUARIO", "usuarioDAW214DBDepartamentos");
            define("CONTRASENYA", "paso");
            define("BASEDEDATOS", "DAW214DBDepartamentos");
            //Establecimiento de la conexión 
            $oConexionDB = mysqli_connect(HOST, USUARIO, CONTRASENYA, BASEDEDATOS);
            //Muestra de la conexión por pantalla
            echo "<h3>Valores de la conexion:</h3>";
            echo "<pre>";
            print_r($oConexionDB);
            echo "</pre>";
            //Valor que cuenta los posibles errores
            $error=$oConexionDB->connect_errno;
            echo "<h3>Errores:</h3>";
            echo $error;
            //----------Ahora mal------------------ 
            //Cerrar la conexión
            $oConexionDB->close();
            $oConexionDB = mysqli_connect('192.168.3.114', 'usuarioDAW214DBDepartamentos', 'paso','nombreincorrecto');
            //Muestra de la conexión por pantalla
            echo "<h3>Valores de la conexion:</h3>";
            echo "<pre>";
            print_r($oConexionDB);
            echo "</pre>";
            //Valor que cuenta los posibles errores
            $error=$oConexionDB->connect_errno;
            echo "<h3>Errores:</h3>";
            echo $error;
             
            //Cerrar la conexión
            $oConexionDB->close();
        ?>
    </body>
</html>
