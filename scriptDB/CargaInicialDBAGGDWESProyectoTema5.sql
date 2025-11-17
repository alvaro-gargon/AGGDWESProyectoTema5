
/**
 * Author:  alvaro.gargon.4
 * Created: 17 nov 2025
 * Script carga de la tabla
 */
-- me situo en la base de datos
use DBAGGDWESProyectoTema5;

--relleno los campos
insert into T02_Departamento (T02_CodDepartamento,T02_DescDepartamento,T02_FechaCreacionDepartamento,T02_VolumenDeNegocio,T02_FechaBajaDepartamento) values
        ('INF','Departamento de informatica.',now(),1235.5,null),
        ('AUT','Departamento de automocion.',now(),5235.8,null),
        ('ELE','Departamento de electricidad.',now(),2275.1,null),
        ('MAT','Departamento de matematicas.',now(),735.2,null),
        ('ING','Departamento de ingles.',now(),235.9,'2026-02-17 23:45:37');


insert into T01_Usuario (T01_CodUsuario,T01_Password,T01_DescUsuario,T01_NumConexiones,T01_FechaHoraUltimaConexion,T01_Perfil) values
        ('HER',SHA2('heracliopaso',256),'Heraclio Borbujo',0,null,'usuario'),
        ('ALB',SHA2('albertopaso',256),'Alberto Bahillo',0,null,'usuario'),
        ('ANT',SHA2('antoniopaso',256),'Antonio ',0,null,'usuario'),
        ('AMO',SHA2('amorpaso',256),'Amor Rodriguez',0,null,'usuario'),
        ('GIS',SHA2('giselapaso',256),'Gisela Folgeral',0,null,'usuario'),
        ('JOR',SHA2('jorgepaso',256),'Jorge Corral',0,null,'usuario'),
        ('CLA',SHA2('claudiopaso',256),'Claudio',0,null,'usuario');
/*codigo minusculas y entero */