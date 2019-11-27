/**
 * Author:  Ismael Heras
 * Created: 27-nov-2019
 */
-- La contraseña de los usuarios, es el codUsuario concatenado con el password, en este caso paso. [$usuario . $pass]
-- Base de datos a usar
USE DAW209DBProyectoTema5;

-- Introduccion de datos dentro de la tabla creada
INSERT INTO Departamento(CodDepartamento,DescDepartamento,FechaCreacionDepartamento, VolumenNegocio) VALUES
    ('INF', 'Departamento de informatica',1574772123, 50),
    ('VEN', 'Departamento de ventas',1574772123, 800000),
    ('CON', 'Departamento de contabilidad',1574772123, 900000),
    ('MAT', 'Departamento de matematicas',1574772123, 80000000),
    ('CAT', 'Departamento de gatos',1574772123, 12584631268);
-- 1574772123 -> 26-nov-2019 ~13:45 --

-- El tipo de usuario es "usuario" como predeterminado, despues añado un admin --
INSERT INTO Usuario(CodUsuario, DescUsuario, Password) VALUES
    ('daniel','daniel',SHA2('danielpaso',256)),
    ('nereaA','nereaA',SHA2('nereaApaso',256)),
    ('miguel','miguel',SHA2('miguelpaso',256)),
    ('alex','alex',SHA2('alexpaso',256)),
    ('david','david',SHA2('davidpaso',256)),
    ('ismael','ismael',SHA2('ismaelpaso',256)),
    ('victor','victor',SHA2('victorpaso',256)),
    ('bea','bea',SHA2('beapaso',256)),
    ('nereaN','nereaN',SHA2('nereaNpaso',256)),
    ('mateo','mateo',SHA2('mateopaso',256)),
    ('rodrigo','rodrigo',SHA2('rodrigopaso',256)),
    ('ruben','ruben',SHA2('rubenpaso',256)),
    ('heraclio','heraclio',SHA2('heracliopaso',256)),
    ('amor','amor',SHA2('amorpaso',256)),
    ('maria','maria',SHA2('mariapaso',256)),
    ('antonio','antonio',SHA2('antoniopaso',256));

-- Usuario con el rol admin --
INSERT INTO Usuario(CodUsuario, DescUsuario, Password, Perfil) VALUES ('admin','admin',SHA2('adminpaso',256), 'administrador');