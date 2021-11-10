<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-DWES - Ejercicio 6 (PDO)</title>
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
            * Ejercicio 06
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 10/11/2021
            */
            //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            $aRegistro = [
                'codDepartamento' => "GGG",
                'descDepartamento' => "Ejercicio 06",
                'volumenNegocio' => 222
            ];
            try{ //Dentro va el código susceptible de dar error
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $oConsulta = $miDB->prepare(<<<QUERY
                            insert into DAW214DBDepartamentos.Departamento
                            values (:codDep, :descDep, null, :volNeg)
                    QUERY);
                
                $aColumnas = [
                        ':codDep' => $aRegistro['codDepartamento'],
                        ':descDep' => $aRegistro['descDepartamento'],
                        ':volNeg' => $aRegistro['volumenNegocio']
                    ];
                
                $oConsulta->execute($aColumnas);
                
                $consultaSQLDeSeleccion = "select * from DAW214DBDepartamentos.Departamento";
                $resultadoConsulta = $miDB->prepare($consultaSQLDeSeleccion);
                $resultadoConsulta->execute();
                $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                echo "<h1>Registro insertado</h1>";
                echo "<table>";
                echo "<tr>";
                foreach ($registroObjeto as $clave => $valor) {
                    echo "<th>$clave</th>";
                }
                echo "</tr>";
                while($registroObjeto!=null){
                    echo "<tr>";
                    foreach ($registroObjeto as $clave => $valor) {
                        echo "<td>$valor</td>";
                    }
                    echo "</tr>";
                    $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                }
                echo "<table>";
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
        ?>
    </body>
</html>
