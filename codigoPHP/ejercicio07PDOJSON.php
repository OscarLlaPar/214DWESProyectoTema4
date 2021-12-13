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
            * @version 1.0 
            * Última modificación: 15/11/2021
            */
            //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            try{
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                
                //Abrir el fichero json
                $json= file_get_contents('../tmp/departamentos.json');
                
                //Obtener los datos del fichero
                $datos= json_decode($json, true);
                
                //Comenzar transacción (desactivar auto-commit)
                $miDB->beginTransaction(); 
                
                //Preparación de la consulta
                $oConsulta = $miDB->prepare(<<<QUERY
                            insert into Departamento
                            values (:codDep, :descDep, null, :volNeg)
                        QUERY);
                foreach($datos as $fila){
                    //Asignación de valores
                    $aColumnas = [
                        ':codDep' => $fila['CodDepartamento'],
                        ':descDep' => $fila['DescDepartamento'],
                        ':volNeg' => $fila['VolumenNegocio']
                    ];
                    //Ejecución de la consulta
                    $oConsulta->execute($aColumnas);
                }
                //Si se efectuan los cambios se informa al usuario
                if($miDB->commit()){
                    echo "<strong>Fichero cargado</strong>";
                }
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
