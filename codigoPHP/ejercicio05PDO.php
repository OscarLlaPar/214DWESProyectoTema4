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
            $aDepartamentos = [
                ['codDepartamento' => 'DDD',
                'descDepartamento' => 'Departamento E51',
                'volumenNegocio' => '37'],
                
                ['codDepartamento' => 'EEE',
                'descDepartamento' => 'Departamento E52',
                'volumenNegocio' => '91.1'],
                
                ['codDepartamento' => 'FFF',
                'descDepartamento' => 'Departamento E53',
                'volumenNegocio' => '11.11'],
            ];
            try{ //Dentro va el código susceptible de dar error
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Quitar el modo autocommit
                $miDB->beginTransaction(); 
                
                
                $oConsulta = $miDB->prepare(<<<QUERY
                            insert into DB214DWESProyectoTema4.Departamento
                            values (:codDepartamento, :descDepartamento, null, :volumenNegocio)
                    QUERY);
                
                foreach ($aDepartamentos as $aDepartamento) {
                    $aParametros = [
                        ':codDepartamento' => $aDepartamento['codDepartamento'],
                        ':descDepartamento' => $aDepartamento['descDepartamento'],
                        ':volumenNegocio' => $aDepartamento['volumenNegocio']
                    ];

                    $oConsulta->execute($aParametros);
                    
                }
                if($miDB->commit()){
                    echo "<strong>Transaccion exitosa</strong>";
                }
                
                $resultadoConsulta = $miDB->query("select * from DAW214DBDepartamentos.Departamento");
                
                $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                
                echo "<table>";
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
