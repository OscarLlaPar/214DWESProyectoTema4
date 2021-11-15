<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-DWES - Ejercicio 2 (PDO)</title>
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
            * Última modificación: 08/11/2021
            */
            //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            try{
                
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Creación de la consulta
                $consultaSQLDeSeleccion = "select * from DB214DWESProyectoTema4.Departamento";
                $resultadoConsulta = $miDB->prepare($consultaSQLDeSeleccion);
                $resultadoConsulta->execute();
                //Carga de una fila (de manera anticipada) sobre la variable "registroObjeto"
                $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                echo "<h1>".$resultadoConsulta->rowCount()." registros</h1>";
                //Creación de la tabla para mostrar los datos
                echo "<table>";
                //Bucle para ir cargando cada fila
                while($registroObjeto!=null){
                    echo "<tr>";
                    //Recorrido de la fila cargada
                    foreach ($registroObjeto as $clave => $valor) {
                        echo "<td>$valor</td>";
                    }
                    echo "</tr>";
                    //Carga de una nueva fila al final del bucle
                    $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                }
                echo "<table>";
                
            }
            //En caso de error con la base de datos
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
