create database if not exists DAW214DBDepartamentos;



SET GLOBAL validate_password.length = 2;
SET GLOBAL validate_password.number.count = 0;
SET GLOBAL validate_password.policy=LOW;

create user 'usuarioDAW214DBDepartamentos'@'%' identified by 'paso';
grant all privileges on DAW214DBDepartamentos.* to 'usuarioDAW214DBDepartamentos'@'%';
flush privileges;

use DAW214DBDepartamentos;

create table if not exists Departamento(
    CodDepartamento varchar(3) primary key not null,
    DescDepartamento varchar(255) not null,
    FechaBaja date,
    VolumenNegocio float not null
);