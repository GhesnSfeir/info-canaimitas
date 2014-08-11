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


-- P R E G U N T A S   P A R T I C U L A R E S

-- Procedimiento para consultar todas las preguntas particulares
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_preguntas_particulares;
CREATE  PROCEDURE consultar_preguntas_particulares () 
BEGIN 
    SELECT * FROM preguntas_particulares;
END // 

-- Procedimiento para agregar preguntas particulares
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_preguntas_particulares; 
CREATE  PROCEDURE agregar_preguntas_particulares (preguntaparticular VARCHAR(1000), revisadaparticular TINYINT) 		
BEGIN  										
   INSERT INTO preguntas_particulares (pregunta, revisada) VALUES (preguntaparticular, revisadaparticular);
END //  

  -- Procedimiento para modificar preguntas particulares
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_preguntas_particulares; 
CREATE  PROCEDURE modificar_preguntas_particulares (idPreguntaParticular INT, preguntaparticular VARCHAR(1000), revisadaparticular TINYINT)) 		
BEGIN  	
	UPDATE preguntas_particulares  SET
    pregunta = preguntaparticular, 
	revisada = revisadaparticular
    WHERE id = idPreguntaParticular;							
END // 

  -- Procedimiento para eliminar preguntas particulares
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_preguntas_particulares; 
CREATE  PROCEDURE eliminar_preguntas_particulares (idPreguntaFrecuente INT) 		
BEGIN  	
	DELETE FROM preguntas_particulares
    WHERE id = idPreguntaFrecuente;							
END //


-- F I C H A  S   D E   L O S   R E C U R S O S

id int, titulo VARCHAR(100), formato VARCHAR(10), ruta_acceso VARCHAR(1000), caracterizacion_url VARCHAR(1000), recurso_url VARCHAR(1000)

-- Procedimiento para consultar todas las fichas de los recursos
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_fichas_recursos;
CREATE  PROCEDURE consultar_fichas_recursos () 
BEGIN 
    SELECT * FROM fichas_recursos;
END // 

-- Procedimiento para agregar las fichas de los recursos
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_fichas_recursos; 
CREATE  PROCEDURE agregar_fichas_recursos (tituloRecurso VARCHAR(100), formatoRecurso VARCHAR(10), ruta_accesoRecurso VARCHAR(1000), caracterizacion_urlRecurso VARCHAR(1000), recurso_urlRecurso VARCHAR(1000)) 		
BEGIN  										
   INSERT INTO fichas_recursos (titulo, formato, ruta_acceso, caracterizacion_url, recurso_url) VALUES (tituloRecurso, formatoRecurso, ruta_accesoRecurso, caracterizacion_urlRecurso, recurso_urlRecurso);
END //  

  -- Procedimiento para modificar las fichas de los recursos
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_fichas_recursos; 
CREATE  PROCEDURE modificar_fichas_recursos (idFichaRecurso, tituloRecurso VARCHAR(100), formatoRecurso VARCHAR(10), ruta_accesoRecurso VARCHAR(1000), caracterizacion_urlRecurso VARCHAR(1000), recurso_urlRecurso VARCHAR(1000)) 		
BEGIN  	
	UPDATE fichas_recursos  SET
    titulo = tituloRecurso, 
	formato = formatoRecurso, 
	ruta_acceso = ruta_accesoRecurso, 
	caracterizacion_url = caracterizacion_urlRecurso, 
	recurso_url = recurso_urlRecurso
    WHERE id = idFichaRecurso;							
END // 

  -- Procedimiento para eliminar las fichas de los recursos
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_preguntas_particulares; 
CREATE  PROCEDURE eliminar_preguntas_particulares (idPreguntaFrecuente INT) 		
BEGIN  	
	DELETE FROM preguntas_particulares
    WHERE id = idPreguntaFrecuente;							
END //

