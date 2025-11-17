
/**
 * Author:  alvaro.gargon.4
 * Created: 17 nov 2025
 * Creacion de base de datos y usuario
 */
-- Creacion de la base de datos
create database if not exists DBAGGDWESProyectoTema5;
-- me situo en ella
use DBAGGDWESProyectoTema5;


--creamos la tabla sino existe, y nunca deberia existir
create table if not exists T02_Departamento(
    T02_CodDepartamento varchar(3) primary key,
    T02_DescDepartamento varchar(255),
    T02_VolumenDeNegocio float,
    T02_FechaCreacionDepartamento datetime,
    T02_FechaBajaDepartamento datetime
)engine=innodb;

create table if not exists T01_Usuario(
    T01_CodUsuario varchar(8) primary key,
    T01_Password varchar(255),
    T01_DescUsuario varchar(255),
    T01_NumConexiones int,
    T01_FechaHoraUltimaConexion datetime,
    T01_Perfil ENUM('administrador','usuario'),
    T01_ImagenUsuario blob
)engine=innodb;

--creo el usuario con todos los privilegios sobre la base de datos
create user if not exists'userAGGDWESProyectoTema5'@'%' identified by 'paso';
grant all on DBAGGDWESProyectoTema5.* to 'userAGGDWESProyectoTema5'@'%' with grant option;
--refrescamos los privilegios para asegurarnos que se ha actualizado
flush privileges;