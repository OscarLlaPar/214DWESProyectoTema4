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
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 09/11/2021
            */
            //Incluir el archivo de configuración
            include '../config/confDBPDO.php';
            include "../core/210322ValidacionFormularios.php";
            
            //Inicialización de variables
            $entradaOK = true; //Inicialización de la variable que nos indica que todo va bien
            $aErrores = [
              'codigo' => null,
              'descripcion' => null,
              'volumenNegocio' => null
            ];
            $aRespuestas = [
              'codigo' => null,
              'descripcion' => null,
              'volumenNegocio' => null
            ];
            // Si ya se ha pulsado el boton "Enviar"
            if(!empty($_REQUEST['enviar'])){
                //-------------------------------------PENDIENTE------------Validacion especifica del codigo
                $aErrores['codigo']= validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'],3,3,1);
                if($aErrores['codigo'] == null){
                    try{
                        
                        $miDB = new PDO(HOST, USER, PASSWORD);
                        
                        $miDB -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        $consulta = ('SELECT * FROM Departamento');
                        $resultadoConsulta = $miDB->prepare($consulta);
                        
                        $resultadoConsulta->execute();
                        
                        $registroConsulta = $resultadoConsulta->fetchObject();
                        while($registroConsulta){ 
                            if($registroConsulta->CodDepartamento == strtoupper($_REQUEST['codigo'])){ 
                                $aErrores['codigo']= "Código duplicado."; 
                            }
                            $registroConsulta = $resultadoConsulta->fetchObject();  
                        }
                    }catch(PDOException $miExceptionPDO){
                        echo "Error: ".$miExceptionPDO->getMessage();
                         echo "<br>";
                        echo "Código de error: ".$miExceptionPDO->getCode();
                    }finally{
                        unset($miDB);
                    }
                }
                $aErrores['descripcion']= validacionFormularios::comprobarAlfanumerico($_REQUEST['descripcion'],50,3,1);
                $aErrores['volumenNegocio']= validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'],PHP_FLOAT_MAX,0,1);
                //acciones correspondientes en caso de que haya algún error
                foreach($aErrores as $categoria => $error){
                    //condición de que hay un error
                    if(($error)!=null){
                        //limpieza del campo para cuando vuelva a aparecer el formulario
                        $_REQUEST[$categoria]="";
                        $entradaOK=false;
                    }
                }
            }
            else{
                $entradaOK=false;
            }
            if($entradaOK){
                
                $aRespuestas['codigo'] = $_REQUEST['codigo'];
                $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
                $aRespuestas['volumenNegocio'] = $_REQUEST['volumenNegocio'];
                
                
                try{
                    //-------------------------------------PENDIENTE------------Consulta preparada
                    //Establecimiento de la conexión 
                    $miDB = new PDO(HOST, USER, PASSWORD);
                    
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $oConsulta = $miDB->prepare(<<<QUERY
                            insert into DB214DWESProyectoTema4.Departamento
                            values (:codDepartamento, :descDepartamento, null, :volumenNegocio)
                    QUERY);
                    
                    $aColumnas = [
                        ':codDepartamento' => $aRespuestas['codigo'],
                        ':descDepartamento' => $aRespuestas['descripcion'],
                        ':volumenNegocio' => $aRespuestas['volumenNegocio']
                    ];
                    $oConsulta->execute($aColumnas);
                    
                    $consultaSQLDeSeleccion = "select * from DB214DWESProyectoTema4.Departamento";
                    
                    $resultadoConsulta = $miDB->query($consultaSQLDeSeleccion);
                    

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
                    
                    <form name="ejercicio03" action="ejercicio03PDO.php" method="post">
                        <fieldset>
                            <legend>Insertar nuevo departamento: </legend>
                                    <label for="codigo">Código del departamento<span>*</span>:</label>
                                    <input id="codigo" type="text" name="codigo" value="<?php echo (isset($_REQUEST['codigo']))?$_REQUEST['codigo']:"";?>" >
                                
                                    <?php
                echo (!is_null($aErrores['codigo']))?"<span>$aErrores[codigo]</span>":"";
        ?>              
                                    <br>
                                    <label for="descripcion">Descripción del departamento<span>*</span>:</label>
                                    <input id="descripcion" type="text" name="descripcion" value="<?php echo (isset($_REQUEST['descripcion']))?$_REQUEST['descripcion']:"";?>" >
                                
                                    <?php
                echo (!is_null($aErrores['descripcion']))?"<span>$aErrores[descripcion]</span>":"";
        ?>            
                                        <br>
                                        <label for="volumenNegocio">Volumen de negocio (€)<span >*</span>:</label>
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
