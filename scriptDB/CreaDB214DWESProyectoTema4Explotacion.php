<?php
include '../config/confDBPDO.php';
try{ //Dentro va el código susceptible de dar error
                //Establecimiento de la conexión 
                $miDB = new PDO(HOST, USER, PASSWORD);
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consulta = $miDB->prepare(<<<QUERY
                        create table if not exists Departamento(
                        CodDepartamento varchar(3) primary key not null,
                        DescDepartamento varchar(255) not null,
                        FechaBaja date,
                        VolumenNegocio float not null)
                    QUERY);
                $miDB->execute();
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


