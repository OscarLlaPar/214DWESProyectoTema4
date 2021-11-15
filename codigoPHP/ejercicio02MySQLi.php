<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-DWES - Ejercicio 2 (MySQLi)</title>
        <style>
            table,td,th{
                border: solid black 1px;
                border-collapse: collapse;
            }
            td,th{
                padding: 5px;
            }
            th{
                background-color: darkgray;
            }
        </style>
    </head>
    <body>
        <?php
            /*
            * Ejercicio 02
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 04/11/2021
            */
            include '../config/confDBMySQLi.php';
            //Establecimiento de la conexión 
            $oConexionDB = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
            //Creación y eecución de la consulta
            $resultadoConsulta=$oConexionDB->query('SELECT * FROM Departamento');
            //Carga anticipada de un registro (fila) en una variable
            $registroObjeto = $resultadoConsulta->fetch_object();
            //Creación de la tabla
            echo "<table>";
            while(!is_null($registroObjeto)){
                echo "<tr>";
                //Recorrido de un registro
                foreach ($registroObjeto as $clave => $valor) {
                    
                        echo "<td>$valor</td>";
                    
                    
                }
                echo "</tr>";
                //Carga de nueva fila al final del bucle
                $registroObjeto = $resultadoConsulta->fetch_object();
            }
            echo "</table>";
            $resultadoConsulta->free();
            //Cerrar la conexión
            $oConexionDB->close();
        ?>
    </body>
</html>
