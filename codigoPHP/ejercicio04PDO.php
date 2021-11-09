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
    <style>
            body{
                background-color:#100810;
                color: white;
                font-family: Segoe UI, sans-serif;
                font-size:16px;
                padding:0;
                margin:0;
            }
            fieldset{
                border: none;
                margin:0;
            }
            legend{
                margin:0 0 20px 0;
                font-weight:bold;
                color: darkorchid;
                border: none;
                padding:5px;
                font-size:28px;
            }
            h1{
                text-align: center;
                margin:0;
                padding:0;
            }
            input, label, select, textarea{
                margin:5px 5px 5px 30px;
            }
            input[type=text]{
                background-color: inherit;
                border: none;
                border-bottom: solid white 2px;
                color: white;
                font-size:16px;
                padding: 5px;
            }
            footer{
                font-size:14px;
                background-color: #170a27;
                color:#AAAAAA;
                border-top: solid #AAAAAA 1px;
                width: 100%;
                margin:0;
                margin-top:20px;
                padding-bottom:20px;
                
            }
            footer p{
                margin: 20px 0 0 50px;
            }
            #enviar, #vaciar{
                background-color: #404040;
                color:white;
                width: 100px;
                height: 50px;
                border: solid white 2px;
                border-radius: 5px;
                margin:30px 0px 10px 125px;
            }
            #enviar:hover{
                background-color:darkorchid;
            }
            #vaciar:hover{
                background-color:#bd3264;
            }
            main{
                margin:0;
                padding:0 100px 0 100px;
            }
            header{
                background-color: #170a27;
                border-bottom: solid #888888 1px;
                margin: 0 0 20px 0;
                padding:25px;
            }
            hr{
               border-color: #888888;
               margin: 20px 0 20px 0;
            }
            span{
                color: #bd3264;
            }
            table, th, tr, td{
                border: solid #AAAAAA 1px;
                border-collapse: collapse;
            }
            table{
                position: relative;
                width: 33.33%;
                left: 33.33%;
            }
            th, td{
                padding: 10px;
            }
            th{
                background-color: dimgrey;
            }
        </style>
    </head>
    <body>
        <?php
            /*
            * Ejercicio 04
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 09/11/2021
            */
            //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            include "../core/210322ValidacionFormularios.php";
            
            //Inicialización de variables
            $busqueda = null;
            // Si ya se ha pulsado el boton "Enviar"
            if(!empty($_REQUEST['enviar'])){
                try{
                    $busqueda=$_REQUEST['busqueda'];
                    //Establecimiento de la conexión 
                    $miDB = new PDO(HOST, USER, PASSWORD);
                    
                    if(!is_null($busqueda)){
                        $consultaSQLDeSeleccion = "select * from DAW214DBDepartamentos.Departamento where DescDepartamento like '%".$busqueda."%'";
                    }
                    else{
                        $consultaSQLDeSeleccion = "select * from DAW214DBDepartamentos.Departamento";
                    }
                    
                    $resultadoConsulta = $miDB->query($consultaSQLDeSeleccion);
                    
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
                catch(PDOException $miExceptionPDO){
                    echo "Error: ".$miExceptionPDO->getMessage();
                    echo "<br>";
                    echo "Código de error: ".$miExceptionPDO->getCode();
                }
                finally{
                 //Cerrar la conexión
                 unset($miDB);
                }
            }
            else{
              ?>
            <header>
                       
            </header>    
            <main>
                    
                    <form name="ejercicio03" action="ejercicio04PDO.php" method="post">
                        <fieldset>
                            <legend>Buscar departamento: </legend>
                                    <label for="busqueda">Buscar por descripción:</label>
                                    <input id="busqueda" type="text" name="busqueda" value="<?php echo (isset($_REQUEST['busqueda']))?$_REQUEST['busqueda']:"";?>" >
                                              
                        </fieldset>
                                        <input id="enviar" type="submit" value="Enviar" name="enviar"/>  
        <?php    
            }
            
        ?>
                    </form>
            </main>
    </body>
</html>
