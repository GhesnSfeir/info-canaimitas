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

-- Procedimiento para consultar preguntas frecuentes por id
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_preguntas_frecuentes_id;
CREATE  PROCEDURE consultar_preguntas_frecuentes_id (idPregunta INT) 
BEGIN 
    SELECT * FROM preguntas_frecuentes where id = idPregunta;
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
CREATE  PROCEDURE agregar_preguntas_particulares (preguntaparticular VARCHAR(1000), idUsuario INT) 		
BEGIN  										
   INSERT INTO preguntas_particulares (pregunta, revisada, fk_usuarios) VALUES (preguntaparticular, false, idUsuario);
END //  

  -- Procedimiento para modificar preguntas particulares
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_preguntas_particulares; 
CREATE  PROCEDURE modificar_preguntas_particulares (idPreguntaParticular INT, preguntaparticular VARCHAR(1000), revisadaparticular TINYINT) 		
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
CREATE  PROCEDURE modificar_fichas_recursos (idFichaRecurso INT, tituloRecurso VARCHAR(100), formatoRecurso VARCHAR(10), ruta_accesoRecurso VARCHAR(1000), caracterizacion_urlRecurso VARCHAR(1000), recurso_urlRecurso VARCHAR(1000)) 		
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
CREATE  PROCEDURE eliminar_fichas_recursos (idFichaRecurso INT) 		
BEGIN  	
	DELETE FROM fichas_recursos
    WHERE id = idFichaRecurso;							
END //

-- R E C O M E N D A C I O N E S

-- Procedimiento para consultar todas las recomendaciones
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_recomendaciones;
CREATE  PROCEDURE consultar_recomendaciones () 
BEGIN 
    SELECT * FROM recomendaciones;
END // 

-- Procedimiento para agregar recomendaciones
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_recomendaciones;
CREATE  PROCEDURE agregar_recomendaciones (recomendacionRecurso	VARCHAR(40), idFichaRecurso INT) 		
BEGIN  										
   INSERT INTO recomendaciones (recomendacion, fk_fichas_recursos_reco) VALUES (recomendacionRecurso, idFichaRecurso);
END //  

  -- Procedimiento para modificar recomendaciones
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_recomendaciones; 
CREATE  PROCEDURE modificar_recomendaciones (idRecomendacion INT, recomendacionRecurso	VARCHAR(40), idFichaRecurso INT) 		
BEGIN  	
	UPDATE recomendaciones  SET
    recomendacion = recomendacionRecurso, 
	fk_fichas_recursos_reco = idFichaRecurso
    WHERE id = idRecomendacion;							
END // 

  -- Procedimiento para eliminar recomendaciones
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_recomendaciones; 
CREATE  PROCEDURE eliminar_recomendaciones (idRecomendacion INT) 		
BEGIN  	
	DELETE FROM recomendaciones
    WHERE id = idRecomendacion;							
END //

-- A U T O R E S

-- Procedimiento para consultar todas los autores
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_autores;
CREATE  PROCEDURE consultar_autores () 
BEGIN 
    SELECT * FROM autores;
END // 

-- Procedimiento para agregar autores
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_autores;
CREATE  PROCEDURE agregar_autores (nombreAutor VARCHAR(50)) 		
BEGIN  										
   INSERT INTO autores (nombre) VALUES (nombreAutor);
END //  

  -- Procedimiento para modificar autores
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_autores; 
CREATE  PROCEDURE modificar_autores (idAutor INT, nombre VARCHAR(50)) 		
BEGIN  	
	UPDATE autores  SET
    nombre = nombreAutor
    WHERE id = idAutor;							
END // 

  -- Procedimiento para eliminar autores
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_autores; 
CREATE  PROCEDURE eliminar_autores(idAutor INT)
BEGIN  	
	DELETE FROM autores
    WHERE id = idAutor;							
END //

-- A U T O R E  S   F I C H A S    R E C U R S O S

-- Procedimiento para agregar autores fichas recursos
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_autores_fichas_recursos;
CREATE  PROCEDURE agregar_autores_fichas_recursos (idAutor INT, idFichaRecurso INT) 		
BEGIN  										
   INSERT INTO autores_fichas_recursos (fk_autores, fk_fichas_recursos_auto) VALUES (idAutor, idFichaRecurso);
END //  
 
  -- Procedimiento para eliminar autores fichas recursos
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_autores_fichas_recursos; 
CREATE  PROCEDURE eliminar_autores_fichas_recursos(idAutorFR INT)
BEGIN  	
	DELETE FROM autores_fichas_recursos
    WHERE id = idAutorFR;							
END //

-- P E R I O D O S   A C A D E M I C O S

-- Procedimiento para consultar todas los periodos academicos
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_preguntas_frecuentes;
CREATE  PROCEDURE consultar_preguntas_frecuentes () 
BEGIN 
    SELECT * FROM preguntas_frecuentes;
END // 

-- Procedimiento para consultar los periodos academicos
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_preguntas_frecuentes;
CREATE  PROCEDURE consultar_preguntas_frecuentes (idPregunta INT) 
BEGIN 
    SELECT * FROM preguntas_frecuentes where id = idPregunta;
END // 

-- Procedimiento para agregar los periodos academicos
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_preguntas_frecuentes; 
CREATE  PROCEDURE agregar_preguntas_frecuentes (preguntaFrecuente VARCHAR(1000), respuestaFrecuente VARCHAR(1000)) 		
BEGIN  										
   INSERT INTO preguntas_frecuentes (pregunta, respuesta) VALUES (preguntaFrecuente, respuestaFrecuente);
END //  

  -- Procedimiento para modificar los periodos academicos
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_preguntas_frecuentes; 
CREATE  PROCEDURE modificar_preguntas_frecuentes (idPreguntaFrecuente INT, preguntaFrecuente VARCHAR(1000), respuestaFrecuente VARCHAR(1000)) 		
BEGIN  	
	UPDATE preguntas_frecuentes  SET
    pregunta = preguntaFrecuente, 
	respuesta = respuestaFrecuente
    WHERE id = idPreguntaFrecuente;							
END // 

  -- Procedimiento para eliminar los periodos academicos
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_preguntas_frecuentes; 
CREATE  PROCEDURE eliminar_preguntas_frecuentes (idPreguntaFrecuente INT) 		
BEGIN  	
	DELETE FROM preguntas_frecuentes
    WHERE id = idPreguntaFrecuente;							
END //

-- A U D I E N C I A
			
-- Procedimiento para agregar audiencia
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_audiencia;
CREATE  PROCEDURE agregar_audiencia (idPeriodoAcademico INT, idFichaRecurso INT) 		
BEGIN  										
   INSERT INTO audiencia (fk_periodos_academicos, fk_fichas_recursos_audi) VALUES (idPeriodoAcademico, idFichaRecurso);
END //  
 
  -- Procedimiento para eliminar audencia
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_audiencia; 
CREATE  PROCEDURE eliminar_audiencia(idAudiencia INT)
BEGIN  	
	DELETE FROM audiencia
    WHERE id = idAudiencia;							
END //


  -- Procedimiento para eliminar los periodos academicos
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_preguntas_frecuentes; 
CREATE  PROCEDURE eliminar_preguntas_frecuentes (idPreguntaFrecuente INT) 		
BEGIN  	
	DELETE FROM preguntas_frecuentes
    WHERE id = idPreguntaFrecuente;							
END //

-- A U D I E N C I A
			
-- Procedimiento para agregar audiencia
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_audiencia;
CREATE  PROCEDURE agregar_audiencia (idPeriodoAcademico INT, idFichaRecurso INT) 		
BEGIN  										
   INSERT INTO audiencia (fk_periodos_academicos, fk_fichas_recursos_audi) VALUES (idPeriodoAcademico, idFichaRecurso);
END //  
 
  -- Procedimiento para eliminar audencia
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_audiencia; 
CREATE  PROCEDURE eliminar_audiencia(idAudiencia INT)
BEGIN  	
	DELETE FROM audiencia
    WHERE id = idAudiencia;							
END //

-- A S I G N A T U R A S

-- Procedimiento para consultar todas las asignaturas
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_asignaturas;
CREATE  PROCEDURE consultar_asignaturas () 
BEGIN 
    SELECT * FROM asignaturas;
END // 

-- Procedimiento para consultar las asignaturas
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_asignaturas;
CREATE  PROCEDURE consultar_asignaturas (idAsignatura INT) 
BEGIN 
    SELECT * FROM asignaturas where id = idAsignatura;
END // 

-- Procedimiento para agregar asignaturas
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_asignaturas; 
CREATE  PROCEDURE agregar_asignaturas (nombreAsignatura VARCHAR(100)) 		
BEGIN  										
   INSERT INTO asignaturas (nombre) VALUES (nombreAsignatura);
END //  

  -- Procedimiento para modificar asignaturas
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_asignaturas; 
CREATE  PROCEDURE modificar_asignaturas (idAsignatura INT, nombreAsignatura VARCHAR(1000)) 		
BEGIN  	
	UPDATE asignaturas  SET
    nombre = nombreAsignatura
    WHERE id = idAsignatura;							
END // 

  -- Procedimiento para eliminar asignaturas
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_asignaturas; 
CREATE  PROCEDURE eliminar_asignaturas (idAsignatura INT) 		
BEGIN  	
	DELETE FROM asignaturas
    WHERE id = idAsignatura;							
END //

-- D I S C I P L I N A   D E L   C O N O C I M I E N T O
			
-- Procedimiento para agregar disciplina del conocimiento
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_audiencia;
CREATE  PROCEDURE agregar_audiencia (idPeriodoAcademico INT, idFichaRecurso INT) 		
BEGIN  										
   INSERT INTO audiencia (fk_periodos_academicos, fk_fichas_recursos_audi) VALUES (idPeriodoAcademico, idFichaRecurso);
END //  
 
  -- Procedimiento para eliminar audencia
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_audiencia; 
CREATE  PROCEDURE eliminar_audiencia(idAudiencia INT)
BEGIN  	
	DELETE FROM audiencia
    WHERE id = idAudiencia;							
END //

