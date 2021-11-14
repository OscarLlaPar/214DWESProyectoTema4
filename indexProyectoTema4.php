<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->ç
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP — Desarrollo Web en Entorno Servidor — Tema 4</title>
        <link href="webroot/css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>ç
        <header>
            <h1>Desarrollo Web en Entorno Servidor</h1>
            <h2>Tema 4</h2>
            <a href="../ProyectoDWES/indexProyectoDWES.php"><div class="cuadro" id="arriba">&#60;</div></a>
        </header>
        <main>
            <table>
                <tr>
                    <td rowspan="2">Ejercicio 1 — Conexión a la base de datos con la cuenta usuario y tratamiento de errores</td>
                    <th colspan="2">MySQLi</th>
                    <th colspan="2">PDO</th>
                </tr>
                <tr>
                    <td><a href="codigoPHP/ejercicio01MySQLi.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio01MySQLi.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                    <td><a href="codigoPHP/ejercicio01PDO.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio01PDO.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td rowspan="2">Ejercicio 2 — Mostrar el contenido de la tabla Departamento y el número de registros</td>
                    <th colspan="2">MySQLi</th>
                    <th colspan="2">PDO</th>
                </tr>
                <tr>
                    <td><a href="codigoPHP/ejercicio02MySQLi.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio02MySQLi.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                    <td><a href="codigoPHP/ejercicio02PDO.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio02PDO.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td rowspan="2">Ejercicio 3 — Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</td>
                    <th colspan="2">MySQLi</th>
                    <th colspan="2">PDO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="codigoPHP/ejercicio03PDO.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio03PDO.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td rowspan="2">Ejercicio 4 — Formulario de búsqueda de departamentos por descripción (por una parte del campo
                        DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos)</td>
                    <th colspan="2">MySQLi</th>
                    <th colspan="2">PDO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="codigoPHP/ejercicio04PDO.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio04PDO.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td rowspan="2">Ejercicio 5 — Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
                        insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno</td>
                    <th colspan="2">MySQLi</th>
                    <th colspan="2">PDO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="codigoPHP/ejercicio05PDO.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio05PDO.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td rowspan="2">Ejercicio 6 — Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos
                        utilizando una consulta preparada. (Después de programar y entender este ejercicio, modificar los
                        ejercicios anteriores para que utilicen consultas preparadas). Probar consultas preparadas sin bind,
                        pasando los parámetros en un array a execute</td>
                    <th colspan="2">MySQLi</th>
                    <th colspan="2">PDO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="codigoPHP/ejercicio06PDO.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio06PDO.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td rowspan="2">Ejercicio 7 — Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
                        Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
                        directorio .../tmp/ del servidor</td>
                    <th colspan="2">MySQLi</th>
                    <th colspan="2">PDO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="codigoPHP/ejercicio07PDO.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio07PDO.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td rowspan="2">Ejercicio 8 —  Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
                        fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
                        encuentra en el directorio .../tmp/ del servidor.
                        Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,
                        JSON, CSV, TXT,...
                        Si el alumno dispone de tiempo probar a exportar e importar a o desde un directorio (a elegir) en
                        el equipo cliente.
                    </td>
                    <th colspan="2">MySQLi</th>
                    <th colspan="2">PDO</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="codigoPHP/ejercicio08PDO.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio08PDO.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td>Ejercicio 9 — Aplicación resumen MtoDeDepartamentosTema4. (Incluir PHPDoc y versionado en el repositorio
                        GIT)
                    </td>
                </tr>
                <tr>
                    <td>Ejercicio 10 —  Aplicación resumen MtoDeDepartamentos POO y multicapa</td>
                </tr>
            </table>

<!--<table>
</table>-->
        </main>
        <footer>
            <p>
                Óscar Llamas Parra &nbsp;
                <a href="https://github.com/OscarLlaPar/" target="__blank"><img src="webroot/img/github.png" alt="Github"></img></a>
            </p>
            <p>
                DAW 2
            </p>
            <p>
                IES Los Sauces, Benavente 2021-2022
            </p>
            <div class="cuadro" id="abajo"></div>
        </footer>
    </body>
</html>
