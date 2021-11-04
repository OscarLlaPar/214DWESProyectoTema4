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
            * Ejercicio 02
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 04/11/2021
            */
            define("HOST", "192.168.3.114");
            define("USUARIO", "usuarioDAW214DBDepartamentos");
            define("CONTRASENYA", "paso");
            define("BASEDEDATOS", "DAW214DBDepartamentos");
            //Establecimiento de la conexión 
            $oConexionDB = mysqli_connect(HOST, USUARIO, CONTRASENYA, BASEDEDATOS);
            
            $resultadoConsulta=$oConexionDB->query('SELECT * FROM Departamento');
             
            //Cerrar la conexión
            $oConexionDB->close();
        ?>
    </body>
</html>
