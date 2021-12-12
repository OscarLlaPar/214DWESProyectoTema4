<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include '../config/confDBPDO.php';
            try{
                /*
                * Ejercicio 08
                * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
                * @version 1.0 
                * Última modificación: 15/11/2021
                */
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //Creación de la consulta
                $consultaSQLDeSeleccion = "select * from Departamento";
                
                //Preparación de la consulta
                $resultadoConsulta = $miDB->prepare($consultaSQLDeSeleccion);
                
                //Ejecución de la consulta
                $resultadoConsulta->execute();
                //Declaración del arra para almacenar deparatmentos
                $aDepartamentos = [];
                //Carga del departamento
                $registro = $resultadoConsulta->fetch();
                while($registro!=null){
                    //Inserción de los datos extraídos en el array
                    array_push($aDepartamentos, $registro);
                    //Carga de otro departamento
                    $registro = $resultadoConsulta->fetch();
                }
                //Codificación de los datos para JSON
                $contenidoJSON = json_encode($aDepartamentos, JSON_PRETTY_PRINT);
                
                //Escritura del fichero JSON
                $escritura = file_put_contents('../tmp/departamentos.json', $contenidoJSON);
                
                echo "Escritos ".$escritura." bytes";
            }
            //Tratamiento de errores
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
