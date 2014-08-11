USE infocanaimitas;
 
-- Procedimiento para consultar todas las preguntas frecuentes
 
DELIMITER $$ -- inicio
DROP PROCEDURE IF EXISTS consultarPreguntasFrecuentes -- eliminamos si existe un procedimiento con el mismo nombre
CREATE  PROCEDURE consultarPreguntasFrecuentes () -- creamos el procedimiento 
BEGIN  -- inicio cuerpo procedimiento almacenado
    DECLARE estadoOfert CHAR(2);  -- declaramos  una variable local para almacenar el estado de Oferta.
    /* Hacemos una consulta y el resultado lo almacenamos en la variable declarada*/
    SELECT * FROM preguntas_frecuentes 
END $$  -- fin de cuerpo del procedimiento almacenado
DELIMITER ; -- fin