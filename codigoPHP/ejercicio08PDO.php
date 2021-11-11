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
            * Última modificación: 11/11/2021
            */
            //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            
            try{
                
                
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                
                $consultaSQLDeSeleccion = "select * from DAW214DBDepartamentos.Departamento";
                $resultadoConsulta = $miDB->prepare($consultaSQLDeSeleccion);
                $resultadoConsulta->execute();
                
                $oDocumento = new DOMDocument('1.0', 'utf-8'); //Creación del documento en el que escribir los datos
                $oDocumento->formatOutput = true; //Dotación de formato al documento
                //Crear elemento raíz: departamentos
                $departamentos = $oDocumento->createElement('departamentos');
                $departamentos = $oDocumento->appendChild($departamentos);
                
                $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                while($registroObjeto!=null){
                    //Crear elemento
                    $departamento = $oDocumento->createElement('departamento');
                    $departamento = $departamentos->appendChild($departamento);
                    foreach ($registroObjeto as $clave => $valor) {
                        $registro = $oDocumento->createElement($clave);
                        $registro = $departamento->appendChild($registro);
                        
                        $valorRegistro = $oDocumento->createTextNode($valor);
                        $valorRegistro = $registro->appendChild($valorRegistro);
                    }
                    $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                }
                
                
                echo '<p>Escrito: ' . $oDocumento->save("../tmp/test.xml") . ' bytes</p>';
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
