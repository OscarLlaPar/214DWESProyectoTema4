<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-DWES - Ejercicio 5 (PDO)</title>
    </head>
    <body>
        <?php
            /*
            * Ejercicio 05
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 10/11/2021
            */
            //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            try{ //Dentro va el código susceptible de dar error
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Quitar el modo autocommit
                $miDB->beginTransaction(); 
                //guardar consultas en variables heredoc
                $resultadoConsulta1 = $miDB->exec("insert into DAW214DBDepartamentos.Departamento values ('BBB','Transaccion 1', null, a aa a a)");
                $resultadoConsulta2 = $miDB->exec("insert into DAW214DBDepartamentos.Departamento values ('CCC','Transaccion 2', null, 77.66)");
                $resultadoConsulta2 = $miDB->exec("insert into DAW214DBDepartamentos.Departamento values ('DDD','Transaccion 3', null, 2)");
                
                if($miDB->commit()){
                    echo "<strong>Transaccion exitosa</strong>";
                }
                
                $resultadoConsulta = $miDB->query("select * from DAW214DBDepartamentos.Departamento");
                
                $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                
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
                $miDB->rollBack();
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
