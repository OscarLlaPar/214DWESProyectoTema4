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
            * @version 1.0
            * Última modificación: 04/11/2021
            */
            include '../config/confDBMySQLi.php';
            //Establecimiento de la conexión 
            $oConexionDB = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
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
            //----------Ahora mal------------------ 
            
            $oConexionDB2 = mysqli_connect(HOST, USER, "passincorrecta", DATABASE);
            //Muestra de la conexión por pantalla
            echo "<h3>Valores de la conexion:</h3>";
            echo "<pre>";
            print_r($oConexionDB2);
            echo "</pre>";
            //Valor que cuenta los posibles errores
            $error=$oConexionDB2->connect_errno;
            echo "<h3>Errores:</h3>";
            echo $error;
             
            //Cerrar la conexión
            $oConexionDB2->close();
        ?>
    </body>
</html>
