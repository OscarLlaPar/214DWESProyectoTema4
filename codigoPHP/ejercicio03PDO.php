<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-DWES - Ejercicio 3 (PDO)</title>
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
            * Ejercicio 03
            * @author ??scar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * @version 1.0
            * ??ltima modificaci??n: 09/11/2021
            */
            //Incluir el archivo de configuraci??n
            include '../config/confDBPDO.php';
            //Incluir las funciones de validaci??n
            include "../core/210322ValidacionFormularios.php";
            
            //Inicializaci??n de variables
            $entradaOK = true; //Inicializaci??n de la variable que nos indica que todo va bien
            //Inicializaci??n del array que contiene los mensajes de error en caso de ser necesarios
            $aErrores = [
              'codigo' => null,
              'descripcion' => null,
              'volumenNegocio' => null
            ];
            //Inicializaci??n del array que almacenar?? las respuestas cuando sean v??lidas
            $aRespuestas = [
              'codigo' => null,
              'descripcion' => null,
              'volumenNegocio' => null
            ];
            // Si ya se ha pulsado el boton "Enviar"
            if(!empty($_REQUEST['enviar'])){
                //Uso de las funciones de validaci??n, que devuelven el mensaje de error cuando corresponde.
                $aErrores['codigo']= validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'],3,3,1);
                //Validaci??n de clave primaria (solo en caso de que la funci??n la confirme como v??lida)
                if($aErrores['codigo'] == null){
                    if(strtoupper($_REQUEST['codigo'])!=$_REQUEST['codigo']){
                        $aErrores['codigo']= "El c??digo debe estar en may??sculas."; 
                    }
                    else{
                        try{
                            //Establecimiento de la conexi??n
                            $miDB = new PDO(HOST, USER, PASSWORD);

                            $miDB -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            //Elaboraci??n y preparaci??n de la consulta
                            $consulta=<<<QUERY
                                SELECT * FROM Departamento WHERE CodDepartamento = '$_REQUEST[codigo]'
                                QUERY;
                            $resultadoConsulta = $miDB->prepare($consulta);
                            //Ejecuci??n de la consulta
                            $resultadoConsulta->execute();
                            //Carga de una fila del resultado en una variable
                            $registroConsulta = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                            if($registroConsulta){ 
                                $aErrores['codigo']= "C??digo duplicado."; 
                            }
                        //Muestra de posibles errores    
                        }catch(PDOException $miExceptionPDO){
                            echo "Error: ".$miExceptionPDO->getMessage();
                             echo "<br>";
                            echo "C??digo de error: ".$miExceptionPDO->getCode();
                        }finally{
                            unset($miDB);
                        }
                    }

                }
                $aErrores['descripcion']= validacionFormularios::comprobarAlfanumerico($_REQUEST['descripcion'],50,3,1);
                $aErrores['volumenNegocio']= validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'],PHP_FLOAT_MAX,0,1);
                //acciones correspondientes en caso de que haya alg??n error
                foreach($aErrores as $categoria => $error){
                    //condici??n de que hay un error
                    if(($error)!=null){
                        //limpieza del campo para cuando vuelva a aparecer el formulario
                        $_REQUEST[$categoria]="";
                        $entradaOK=false;
                    }
                }
            }
            //Si no se ha pulsado el bot??n "Enviar" (es la primera vez)
            else{
                $entradaOK=false;
            }
            //Si todo est?? bien
            if($entradaOK){
                //Tratamiento de los datos
                //Almacenamiento de las respuestas v??lidas en el array de respuestas
                $aRespuestas['codigo'] = $_REQUEST['codigo'];
                $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
                $aRespuestas['volumenNegocio'] = $_REQUEST['volumenNegocio'];
                
                
                try{
                    //Establecimiento de la conexi??n 
                    $miDB = new PDO(HOST, USER, PASSWORD);
                    
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //Preparaci??n de la consulta
                    $oConsulta = $miDB->prepare(<<<QUERY
                            insert into Departamento
                            values (:codDepartamento, :descDepartamento, null, :volumenNegocio)
                    QUERY);
                    //Asignaci??n de las respuestas en los par??metros de las consultas preparadas
                    $aColumnas = [
                        ':codDepartamento' => $aRespuestas['codigo'],
                        ':descDepartamento' => $aRespuestas['descripcion'],
                        ':volumenNegocio' => $aRespuestas['volumenNegocio']
                    ];
                    //Ejecuci??n de la consulta de actualizaci??n
                    $oConsulta->execute($aColumnas);
                    //Creaci??n de la consulta de selecci??n
                    $consultaSQLDeSeleccion = "select * from Departamento";
                    //Preparaci??n de la consulta de selecci??n
                    $resultadoConsulta = $miDB->prepare($consultaSQLDeSeleccion);
                    //Ejecuci??n de la consulta
                    $resultadoConsulta->execute();
                    //Carga del registro en una variable
                    $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                    //Creaci??n de la tabla
                    echo "<table>";
                    //Recorrido de todos los registros
                    while($registroObjeto!=null){
                        echo "<tr>";
                        //Recorrido del registro
                        foreach ($registroObjeto as $clave => $valor) {
                            echo "<td>$valor</td>";
                        }
                        echo "</tr>";
                        //Carga de una nueva fila
                        $registroObjeto = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
                    }
                    echo "<table>";

                }
                //Gesti??n de errores relacionados con la base de datos
                catch(PDOException $miExceptionPDO){
                    echo "Error: ".$miExceptionPDO->getMessage();
                    echo "<br>";
                    echo "C??digo de error: ".$miExceptionPDO->getCode();
                }
                finally{
                 //Cerrar la conexi??n
                 unset($miDB);
                }
               
            }
            //Si las respuestas no est??n bien (o es la primera vez)
            else{
              ?>
            <main>
                <form name="ejercicio03" action="ejercicio03PDO.php" method="post">
                    <fieldset>
                        <legend>Insertar nuevo departamento: </legend>
                        <label for="codigo">C??digo del departamento<span>*</span>:</label>
                        <input id="codigo" type="text" name="codigo" value="<?php echo (isset($_REQUEST['codigo']))?$_REQUEST['codigo']:"";?>" >
                        <?php
                            echo (!is_null($aErrores['codigo']))?"<span>$aErrores[codigo]</span>":"";
                        ?>              
                        <br>
                        <label for="descripcion">Descripci??n del departamento<span>*</span>:</label>
                        <input id="descripcion" type="text" name="descripcion" value="<?php echo (isset($_REQUEST['descripcion']))?$_REQUEST['descripcion']:"";?>" >
                        <?php
                            echo (!is_null($aErrores['descripcion']))?"<span>$aErrores[descripcion]</span>":"";
                        ?>            
                        <br>
                        <label for="volumenNegocio">Volumen de negocio (???)<span >*</span>:</label>
                        <input id="volumenNegocio" type="text" name="volumenNegocio" value="<?php echo (isset($_REQUEST['volumenNegocio']))?$_REQUEST['volumenNegocio']:"";?>" >            
                        <?php
                            echo (!is_null($aErrores['volumenNegocio']))?"<span >$aErrores[volumenNegocio]</span>":"";
                        ?>
                    </fieldset>
                    <input id="enviar" type="submit" value="Enviar" name="enviar"/>  
        <?php    
            }
            
        ?>
        </main>
    </body>
</html>
