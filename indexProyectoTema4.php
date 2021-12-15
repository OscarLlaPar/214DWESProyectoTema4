<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP — Desarrollo Web en Entorno Servidor — Tema 4</title>
        <link href="webroot/css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <h1>Desarrollo Web en Entorno Servidor</h1>
            <h2>Tema 4</h2>
            
            <a href="../ProyectoDWES/indexProyectoDWES.php"><div class="cuadro" id="arriba">&#60;</div></a>
        </header>
        <main>
            <table class="scripts">
                <tr>
                    <th>
                        Scripts
                    </th>
                    <td><a href="scriptDB/CreaDB214DWESProyectoTema4.php">Crear DB</a></td>
                    <td><a href="scriptDB/CargaInicialDB214DWESProyectoTema4.php">Carga inicial DB</a></td>
                    <td><a href="scriptDB/BorraDB214DWESProyectoTema4.php">Borrar DB</a></td>
                    <th>Mostrar código</th>
                    <td colspan="3"><a href="mostrarcodigo/muestraSQL.php">Muestra de scripts y configuración DB</a></td>
                </tr>
            </table>
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
                    <td rowspan="3">Ejercicio 7 — Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
                        Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
                        directorio .../tmp/ del servidor</td>
                    <th colspan="4">MySQLi</th>
                    <th colspan="4">PDO</th>
                </tr>
                <tr>
                    <th colspan="2">XML</th>
                    <th colspan="2">JSON</th>
                    <th colspan="2">XML</th>
                    <th colspan="2">JSON</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="codigoPHP/ejercicio07PDOXML.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio07PDOXML.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                    <td><a href="codigoPHP/ejercicio07PDOJSON.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio07PDOJSON.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td rowspan="3">Ejercicio 8 —  Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
                        fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
                        encuentra en el directorio .../tmp/ del servidor.
                        Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,
                        JSON, CSV, TXT,...
                        Si el alumno dispone de tiempo probar a exportar e importar a o desde un directorio (a elegir) en
                        el equipo cliente.
                    </td>
                    <th colspan="4">MySQLi</th>
                    <th colspan="4">PDO</th>
                </tr>
                <tr>
                    <th colspan="2">XML</th>
                    <th colspan="2">JSON</th>
                    <th colspan="2">XML</th>
                    <th colspan="2">JSON</th>
                </tr>
                <tr>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="codigoPHP/ejercicio08PDOXML.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio08PDOXML.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                    <td><a href="codigoPHP/ejercicio08PDOJSON.php"><img src="webroot/img/iconoPlay.png"></a></td>
                    <td><a href="mostrarcodigo/muestraEjercicio08PDOJSON.php"><img src="webroot/img/iconoMostrar.png"></a></td>
                </tr>
                <tr>
                    <td>Ejercicio 9 — Aplicación resumen MtoDeDepartamentosTema4. (Incluir PHPDoc y versionado en el repositorio
                        GIT)
                    </td>
                    <td colspan="8"><a href="../ProyectoMtoDepartamentosTema4/index.php"><img src="webroot/img/iconoPlay.png"></a></td>
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
                <a href="https://daw214.ieslossauces.es/">Óscar Llamas Parra</a>
                <a href="https://github.com/OscarLlaPar/214DWESProyectoTema4" target="__blank"><img src="webroot/img/github.png" alt="Github"></img></a>
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
