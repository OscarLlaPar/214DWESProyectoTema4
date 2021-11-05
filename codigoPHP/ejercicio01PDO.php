<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-DWES - Ejercicio 1 (PDO)</title>
    </head>
    <body>
        <?php
            /*
            * Ejercicio 01
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 04/11/2021
            */
            include '../config/confDBPDO.php';
            //Establecimiento de la conexión 
            $oConexionDB = new PDO(HOST, USER, PASSWORD);

            $attributes = array(
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
                "TIMEOUT"
            );

            foreach ($attributes as $val) {
                echo "PDO::ATTR_$val: ";
                echo $oConexionDB->getAttribute(constant("PDO::ATTR_$val")) . "\n";
                echo "<br>";
            }
             //Cerrar la conexión
             unset($oConexionDB);
             //------------Ahora mal-------
             //Establecimiento de la conexión 
            $oConexionDB = new PDO('mysql:dbname=nombreincorrecto;host=192.168.3.114', 'usuarioDAW214DBDepartamentos', 'paso');

            $atributos = array(
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
                "TIMEOUT"
            );

            foreach ($atributos as $valor) {
                echo "PDO::ATTR_$valor: ";
                echo $oConexionDB->getAttribute(constant("PDO::ATTR_$valor")) . "\n";
                echo "<br>";
            }
             //Cerrar la conexión
             unset($oConexionDB);
        ?>
    </body>
</html>
