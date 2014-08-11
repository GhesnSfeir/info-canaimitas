USE infocanaimitas;
-- U S U A R I O S

-- Procedimiento para consultar todas los usuarios
DELIMITER // 									-- inicio
DROP PROCEDURE IF EXISTS consultar_usuarios; 	-- eliminamos si existe un procedimiento con el mismo nombre
CREATE  PROCEDURE consultar_usuarios () 		-- creamos el procedimiento 
BEGIN  											-- inicio cuerpo procedimiento almacenado
    SELECT * FROM usuarios;						-- consulta
END //  										-- fin de cuerpo del procedimiento almacenado

-- Procedimiento para agregar usuarios
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_usuarios; 
CREATE  PROCEDURE agregar_usuarios (nombreUsuario VARCHAR(50), emailUsuario VARCHAR(100), claveUsuario VARCHAR(32), tipoUsuario VARCHAR(50)) 		
BEGIN  										
   INSERT INTO usuarios (nombre,email,clave,tipo,activo) VALUES (nombreUsuario, emailUsuario, claveUsuario, tipoUsuario, true);
END //  

  -- Procedimiento para modificar usuarios
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_usuarios; 
CREATE  PROCEDURE modificar_usuarios (idUsuario INT, nombreUsuario VARCHAR(50), emailUsuario VARCHAR(100), claveUsuario VARCHAR(32), tipoUsuario VARCHAR(50), activoUsuario TINYINT) 		
BEGIN  	
	UPDATE usuarios  SET
    nombre = nombreUsuario, 
	email = emailUsuario,
	clave = claveUsuario,
	tipo = tipoUsuario,
	activo = activoUsuario
    WHERE id = idUsuario;							
END // 


-- P R E G U N T A S   F R E C U E N T E S

-- Procedimiento para consultar todas las preguntas frecuentes
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_preguntas_frecuentes;
CREATE  PROCEDURE consultar_preguntas_frecuentes () 
BEGIN 
    SELECT * FROM preguntas_frecuentes;
END // 

-- Procedimiento para agregar preguntas frecuentes
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_preguntas_frecuentes; 
CREATE  PROCEDURE agregar_preguntas_frecuentes (preguntaFrecuente VARCHAR(1000), respuestaFrecuente VARCHAR(1000)) 		
BEGIN  										
   INSERT INTO preguntas_frecuentes (pregunta, respuesta) VALUES (preguntaFrecuente, respuestaFrecuente);
END //  

  -- Procedimiento para modificar preguntas frecuentes
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_preguntas_frecuentes; 
CREATE  PROCEDURE modificar_preguntas_frecuentes (idPreguntaFrecuente INT, preguntaFrecuente VARCHAR(1000), respuestaFrecuente VARCHAR(1000)) 		
BEGIN  	
	UPDATE preguntas_frecuentes  SET
    pregunta = preguntaFrecuente, 
	respuesta = respuestaFrecuente
    WHERE id = idPreguntaFrecuente;							
END // 

  -- Procedimiento para eliminar preguntas frecuentes
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_preguntas_frecuentes; 
CREATE  PROCEDURE eliminar_preguntas_frecuentes (idPreguntaFrecuente INT) 		
BEGIN  	
	DELETE FROM preguntas_frecuentes
    WHERE id = idPreguntaFrecuente;							
END //