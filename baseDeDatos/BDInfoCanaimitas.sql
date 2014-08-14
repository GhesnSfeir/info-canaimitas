-- Referencias de MySql
-- https://www.digitalocean.com/community/tutorials/a-basic-mysql-tutorial
-- http://dev.mysql.com/doc/refman/5.0/en/mysql-batch-commands.html
-- http://www.lanexa.net/2011/08/create-a-mysql-database-username-password-and-permissions-from-the-command-line/

-- DROP DATABASE
-- DROP DATABASE infocanaimitas;

-- Creacion de la base de datos
CREATE DATABASE infocanaimitas;

--GRANT ALL ON infocanaimitas.* to 'root'@'localhost' IDENTIFIED BY '1234';

-- Uso de la base de datos. Se debe de setear antes para poder usar dicha bd
USE infocanaimitas;


-- Para hacer load de un archivo .sql
source /var/www/infoCanaimitas/info-canaimitas/baseDeDatos/CREATE_InfoCanaimitas.sql;

-- Para hacer load de un archivo .sql
source /var/www/infoCanaimitas/info-canaimitas/baseDeDatos/INSERTS_InfoCanaimitas.sql;

-- Para hacer load de un archivo .sql
source /var/www/infoCanaimitas/info-canaimitas/baseDeDatos/StoredProceduresInfoCanaimitas.sql;


-- Para hacer load de un archivo .sql
-- source /var/www/infoCanaimitas/info-canaimitas/baseDeDatos/DROP_InfoCanaimitas.sql;



