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
            //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            echo "<h1>Conexión sin errores</h1>";
            try{ //Dentro va el código susceptible de dar error
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Listar los atributos que se van a mostrar
                $aAtributos = [
                    "AUTOCOMMIT", 
                    "ERRMODE", 
                    "CASE", 
                    "CLIENT_VERSION", 
                    "CONNECTION_STATUS",
                    "ORACLE_NULLS", 
                    "PERSISTENT", 
                    "PREFETCH", 
                    "SERVER_INFO", 
                    "SERVER_VERSION",
                    "TIMEOUT"
                ];
                //Mostrado de los atributos por pantalla
                foreach ($aAtributos as $valor) {
                    echo "PDO::ATTR_$valor: "; //El nombre de cada atributo
                    echo $miDB->getAttribute(constant("PDO::ATTR_$valor")) . "\n"; //El valor de cada atributo
                    echo "<br>";
                }
            }
            catch(PDOException $miExceptionPDO){ //Lo que se muestra en caso de error
                echo "Error: ".$miExceptionPDO->getMessage(); //Mensaje de error
                echo "<br>";
                echo "Código de error: ".$miExceptionPDO->getCode(); //Código de error
            }
            finally{ //Ocurre tanto si da error como si no lo da
             //Cerrar la conexión
             unset($miDB);
            }
             //------------Ahora mal-------
             echo "<h1>Conexión con errores</h1>";
            try{
             //Establecimiento de la conexión (con el nombre incorrecto de la base de datos)
            $miDB = new PDO('mysql:dbname=nombreincorrecto;host=192.168.3.114', 'usuarioDAW214DBDepartamentos', 'paso'); 
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $miExceptionPDO){
                echo "Error: ".$miExceptionPDO->getMessage();
                echo "<br>";
                echo "Código de error: ".$miExceptionPDO->getCode();
            }
            finally{
             //Cerrar la conexión
             unset($miDB);
            }
        ?>
    </body>
</html>
