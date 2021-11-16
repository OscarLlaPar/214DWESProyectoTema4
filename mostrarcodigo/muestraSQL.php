<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Scripts y configuración DB</title>
        <style>
            
        </style>
    </head>
    <body>
        <h1>Scripts de la base de datos</h1>
        <h2>Crear</h2>
        <?php highlight_file("../scriptDB/CreaDB214DWESProyectoTema4.sql");?>
        <h2>Borrar</h2>
        <?php highlight_file("../scriptDB/BorraDB214DWESProyectoTema4.sql");?>
        <h2>Carga Inicial</h2>
        <?php highlight_file("../scriptDB/CargaInicialDB214DWESProyectoTema4.sql");?>
        <h1>Configuración del a base de datos</h1>
        <h2>PDO</h2>
        <?php highlight_file("../config/confDBPDO.php");?>
        <h2>MySQLi</h2>
        <?php highlight_file("../config/confDBMySQLi.php");?>
    </body>
</html>
