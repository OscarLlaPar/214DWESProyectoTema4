<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-DWES - Ejercicio 8 (PDO)</title>
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
            * Ejercicio 08
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * @version 1.0 
            * Última modificación: 15/11/2021
            */
            //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            try{
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //Creación de la consulta
                $consultaSQLDeSeleccion = "select * from Departamento";
                
                //Preparación de la consulta
                $resultadoConsulta = $miDB->prepare($consultaSQLDeSeleccion);
                
                //Ejecución de la consulta
                $resultadoConsulta->execute();
                
                $oDocumento = new DOMDocument(); //Creación del documento en el que escribir los datos
                
                $oDocumento->formatOutput = true; //Dotación de formato al documento
                
                //Crear elemento raíz: departamentos
                $elementoDepartamentos = $oDocumento->createElement('departamentos');
                $nodoDepartamentos = $oDocumento->appendChild($elementoDepartamentos);
                
                //Carga de un ragistro desde la base de datos
                $registroObjeto = $resultadoConsulta->fetchObject();
                
                while($registroObjeto){
                    //Crear elemento "departamento"
                    $elementoDepartamento = $oDocumento->createElement('departamento');
                    $nodoDepartamentos->appendChild($elementoDepartamento);
                    //informacion de los departamentos
                    $elementoCodigo = $oDocumento->createElement('codDepartamento', $registroObjeto->CodDepartamento);
                    $elementoDepartamento->appendChild($elementoCodigo);
                    
                    $elementoDescripcion = $oDocumento->createElement('descDepartamento', $registroObjeto->DescDepartamento);
                    $elementoDepartamento->appendChild($elementoDescripcion);
                    
                    $elementoFechaBaja = $oDocumento->createElement('fechaBaja', $registroObjeto->FechaBaja);
                    $elementoDepartamento->appendChild($elementoFechaBaja);
                    
                    $elementoVolumenNegocio = $oDocumento->createElement('volumenNegocio', $registroObjeto->VolumenNegocio);
                    $elementoDepartamento->appendChild($elementoVolumenNegocio);
                    //Carga de otro ragistro desde la base de datos
                    $registroObjeto = $resultadoConsulta->fetchObject();
                }
                
                
                echo '<p>Escrito: ' . $oDocumento->save("../tmp/departamentos.xml") . ' bytes</p>';
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
