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
                $miDB = new PDO(HOST, USER, PASSWORD);
                
                
                $json= file_get_contents('../tmp/departamentos.json');
                $datos= json_decode($json, true);
                
                
                
                foreach($datos as $fila){
                    $oConsulta = $miDB->prepare(<<<QUERY
                            insert into Departamento
                            values (:codDep, :descDep, null, :volNeg)
                    QUERY);
                    
                    $aColumnas = [
                        ':codDep' => $fila['CodDepartamento'],
                        ':descDep' => $fila['DescDepartamento'],
                        ':volNeg' => $fila['VolumenNegocio']
                    ];
                
                    if($oConsulta->execute($aColumnas)){
                        echo "Fila insertada <br>";
                    }
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
