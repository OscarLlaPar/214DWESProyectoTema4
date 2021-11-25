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
            /*
            * Ejercicio 07
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 15/11/2021
            */
        //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            try{
                
                
                //Establecimiento de la conexión 
                $consultaSQLDeSeleccion = "select * from DB214DWESProyectoTema4.Departamento";
                
                $miDB = new PDO(HOST, USER, PASSWORD);
                
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $miDB->beginTransaction(); 
                
                $resultadoConsulta = $miDB->prepare(<<<QUERY
                    INSERT INTO Departamento
                    VALUES (:codDepartamento, :descDepartamento, :fechaBaja, :volumenNegocio);
                QUERY);
                
                
                $oDoc = new DOMDocument();
                $oDoc -> formatOutput = true;
                
                $oDoc->load('../tmp/departamentos.xml');
                
                $nodeDepartamento = $oDoc->getElementsByTagName('departamento');
                
                foreach ($nodeDepartamento as $departamento) {
                    $codDep = $departamento->getElementsByTagName('codDepartamento')->item(0)->nodeValue;
                    $descDep = $departamento->getElementsByTagName('descDepartamento')->item(0)->nodeValue;
                    $fechaBaja = ($departamento->getElementsByTagName('fechaBaja')->item(0)->nodeValue)==''?null:$fechaBaja;
                    $volNeg = $departamento->getElementsByTagName('volumenNegocio')->item(0)->nodeValue;
                   
                    $resultadoConsulta->bindParam(':codDepartamento', $codDep);
                    $resultadoConsulta->bindParam(':descDepartamento', $descDep);
                    $resultadoConsulta->bindParam(':fechaBaja', $fechaBaja);
                    $resultadoConsulta->bindParam(':volumenNegocio', $volNeg);
                    
                    // Ejecución del select.
                    $resultadoConsulta->execute();
                }
                if($miDB->commit()){
                echo "<p>Fichero XML cargado</p>";
                }
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
