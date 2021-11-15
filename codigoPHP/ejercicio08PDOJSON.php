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
                * Última modificación: 15/11/2021
                */
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consultaSQLDeSeleccion = "select * from DB214DWESProyectoTema4.Departamento";
                $resultadoConsulta = $miDB->prepare($consultaSQLDeSeleccion);
                $resultadoConsulta->execute();
                $aDepartamentos = [];
                $registro = $resultadoConsulta->fetch();
                while($registro!=null){
                    array_push($aDepartamentos, $registro);
                    $registro = $resultadoConsulta->fetch();
                }
                $contenidoJSON = json_encode($aDepartamentos, JSON_PRETTY_PRINT);
                
                $escritura = file_put_contents('../tmp/departamentos.json', $contenidoJSON);
                
                echo "Escritos ".$escritura." bytes";
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
