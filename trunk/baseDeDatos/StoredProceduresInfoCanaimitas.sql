USE infocanaimitas;
-- U S U A R I O S

-- Procedimiento para consultar todas los usuarios
DELIMITER // 									-- inicio
DROP PROCEDURE IF EXISTS consultar_usuarios; 	-- eliminamos si existe un procedimiento con el mismo nombre
CREATE  PROCEDURE consultar_usuarios () 		-- creamos el procedimiento 
BEGIN  											-- inicio cuerpo procedimiento almacenado
    SELECT * FROM usuarios;						-- consulta
END //  										-- fin de cuerpo del procedimiento almacenado

-- Procedimiento para consultar usuario por ID
DELIMITER // 									
DROP PROCEDURE IF EXISTS consultar_usuario_id; 
CREATE  PROCEDURE consultar_usuario_id (idUsuario INT)
BEGIN  											
    SELECT * FROM usuarios WHERE id = idUsuario;
END //  

-- Procedimiento para consultar usuarios por email
DELIMITER // 									
DROP PROCEDURE IF EXISTS consultar_usuarios_email; 
CREATE  PROCEDURE consultar_usuarios_email (emailUsuario VARCHAR(100))
BEGIN  											
    SELECT * FROM usuarios WHERE email = emailUsuario;
END //  

-- procedimiento para agregar usuarios
DELIMITER // 
DROP PROCEDURE IF EXISTS agregar_usuario; 
CREATE PROCEDURE agregar_usuario(nombreUsuario VARCHAR(50), emailUsuario VARCHAR(100), claveUsuario VARCHAR(32), tipoUsuario VARCHAR(50))
BEGIN
    INSERT INTO usuarios (nombre,email,clave,tipo,activo) VALUES (nombreUsuario, emailUsuario, claveUsuario, tipoUsuario, true);
	SELECT LAST_INSERT_ID() id;
END //

  -- Procedimiento para modificar usuarios
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_usuario; 
CREATE  PROCEDURE modificar_usuario (idUsuario INT, nombreUsuario VARCHAR(50), emailUsuario VARCHAR(100), claveUsuario VARCHAR(32), tipoUsuario VARCHAR(50), activoUsuario TINYINT) 		
BEGIN  	
	UPDATE usuarios  SET
    nombre = nombreUsuario, 
	email = emailUsuario,
	clave = claveUsuario,
	tipo = tipoUsuario,
	activo = activoUsuario
    WHERE id = idUsuario;							
END // 

-- Procedimiento para contar la cantidad de repeticiones de un email para la tabla usuarios
DELIMITER //
DROP PROCEDURE IF EXISTS contar_usuarios_email;
CREATE PROCEDURE contar_usuarios_email (email VARCHAR(100))
BEGIN
    SELECT COUNT(*) cuenta FROM usuarios u WHERE u.email = email;
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
DROP PROCEDURE IF EXISTS consultar_pregunta_frecuente_id;
CREATE  PROCEDURE consultar_pregunta_frecuente_id (idPregunta INT) 
BEGIN 
    SELECT * FROM preguntas_frecuentes where id = idPregunta;
END // 

-- procedimiento para agregar preguntas frecuentes
DELIMITER // 
DROP PROCEDURE IF EXISTS agregar_pregunta_frecuente; 
CREATE PROCEDURE agregar_pregunta_frecuente(preguntaFrecuente VARCHAR(1000), respuestaFrecuente VARCHAR(1000), visibleFrecuente TINYINT) 
BEGIN
    INSERT INTO preguntas_frecuentes (pregunta, respuesta, visible) VALUES (preguntaFrecuente, respuestaFrecuente, visibleFrecuente);
	SELECT LAST_INSERT_ID() id; 
END //  

  -- Procedimiento para modificar preguntas frecuentes
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_pregunta_frecuente; 
CREATE  PROCEDURE modificar_pregunta_frecuente (idPreguntaFrecuente INT, preguntaFrecuente VARCHAR(1000), respuestaFrecuente VARCHAR(1000), visibleFrecuente TINYINT) 		
BEGIN  	
	UPDATE preguntas_frecuentes  SET
    pregunta = preguntaFrecuente, 
	respuesta = respuestaFrecuente, 
	visible = visibleFrecuente
    WHERE id = idPreguntaFrecuente;							
END // 

  -- Procedimiento para eliminar preguntas frecuentes
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_pregunta_frecuente; 
CREATE  PROCEDURE eliminar_pregunta_frecuente (idPreguntaFrecuente INT) 		
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

-- Procedimiento para consultar todas las preguntas particulares por id
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_pregunta_particular_id;
CREATE  PROCEDURE consultar_pregunta_particular_id (idPregunta INT) 
BEGIN 
    SELECT * FROM preguntas_particulares WHERE id = idPregunta;
END // 

-- procedimiento para agregar preguntas particulares
DELIMITER // 
DROP PROCEDURE IF EXISTS agregar_pregunta_particular; 
CREATE PROCEDURE agregar_pregunta_particular(preguntaparticular VARCHAR(1000), idUsuario INT)
BEGIN 									
   INSERT INTO preguntas_particulares (pregunta, revisada, fk_usuarios) VALUES (preguntaparticular, false, idUsuario);
   SELECT LAST_INSERT_ID() id; 
END //  

  -- Procedimiento para modificar preguntas particulares
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_pregunta_particular; 
CREATE  PROCEDURE modificar_pregunta_particular (idPreguntaParticular INT, preguntaparticular VARCHAR(1000), revisadaparticular TINYINT) 		
BEGIN  	
	UPDATE preguntas_particulares  SET
    pregunta = preguntaparticular, 
	revisada = revisadaparticular
    WHERE id = idPreguntaParticular;							
END // 

  -- Procedimiento para eliminar preguntas particulares
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_pregunta_particular; 
CREATE  PROCEDURE eliminar_pregunta_particular (idPreguntaParticular INT) 		
BEGIN  	
	DELETE FROM preguntas_particulares
    WHERE id = idPreguntaParticular;							
END //


-- F I C H A  S   D E   L O S   R E C U R S O S

-- Procedimiento para consultar todas las fichas de los recursos
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_fichas_recursos;
CREATE  PROCEDURE consultar_fichas_recursos () 
BEGIN 
    SELECT * FROM fichas_recursos;
END // 

-- Procedimiento para consultar las fichas de los recursos por ID
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_ficha_recurso_id;
CREATE  PROCEDURE consultar_ficha_recurso_id (idFicha INT) 
BEGIN 
    SELECT * FROM fichas_recursos WHERE id = idFicha;
END // 

-- procedimiento para agregar las fichas de los recursos
DELIMITER // 		
DROP PROCEDURE IF EXISTS agregar_ficha_recurso; 
CREATE PROCEDURE agregar_ficha_recurso(tituloRecurso VARCHAR(100), formatoRecurso VARCHAR(10), ruta_accesoRecurso VARCHAR(1000), caracterizacion_urlRecurso VARCHAR(1000), recurso_urlRecurso VARCHAR(1000))
BEGIN
	INSERT INTO fichas_recursos (titulo, formato, ruta_acceso, caracterizacion_url, recurso_url) VALUES (tituloRecurso, formatoRecurso, ruta_accesoRecurso, caracterizacion_urlRecurso, recurso_urlRecurso);
	SELECT LAST_INSERT_ID() id; 
END //  

  -- Procedimiento para modificar las fichas de los recursos
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_ficha_recurso; 
CREATE  PROCEDURE modificar_ficha_recurso (idFichaRecurso INT, tituloRecurso VARCHAR(100), formatoRecurso VARCHAR(10), ruta_accesoRecurso VARCHAR(1000), caracterizacion_urlRecurso VARCHAR(1000), recurso_urlRecurso VARCHAR(1000)) 		
BEGIN  	
	UPDATE fichas_recursos  SET
    titulo = tituloRecurso, 
	formato = formatoRecurso, 
	ruta_acceso = ruta_accesoRecurso, 
	caracterizacion_url = caracterizacion_urlRecurso, 
	recurso_url = recurso_urlRecurso
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

-- Procedimiento para consultar todas las recomendaciones por ID
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_recomendacion_id;
CREATE  PROCEDURE consultar_recomendacion_id (idRecomendacion INT) 
BEGIN 
    SELECT * FROM recomendaciones WHERE id = idRecomendacion;
END // 

-- Procedimiento para consultar recomendaciones por ID de recurso
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_recomendaciones_idFichaRecurso;
CREATE  PROCEDURE consultar_recomendaciones_idFichaRecurso (idFichaRecurso INT) 
BEGIN 
    SELECT * FROM recomendaciones WHERE fk_fichas_recursos_reco = idFichaRecurso;
END // 

-- procedimiento para agregar recomendaciones
DELIMITER // 									
DROP PROCEDURE IF EXISTS agregar_recomendacion; 
CREATE PROCEDURE agregar_recomendacion(recomendacionRecurso	VARCHAR(1000), idFichaRecurso INT) 
BEGIN
   INSERT INTO recomendaciones (recomendacion, fk_fichas_recursos_reco) VALUES (recomendacionRecurso, idFichaRecurso);
   SELECT LAST_INSERT_ID() id; 
END //  

  -- Procedimiento para modificar recomendaciones
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_recomendacion; 
CREATE  PROCEDURE modificar_recomendacion (idRecomendacion INT, recomendacionRecurso	VARCHAR(40), idFichaRecurso INT) 		
BEGIN  	
	UPDATE recomendaciones  SET
    recomendacion = recomendacionRecurso, 
	fk_fichas_recursos_reco = idFichaRecurso
    WHERE id = idRecomendacion;							
END // 

  -- Procedimiento para eliminar recomendaciones
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_recomendacion; 
CREATE  PROCEDURE eliminar_recomendacion (idRecomendacion INT) 		
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

-- procedimiento para agregar autores
DELIMITER // 	
DROP PROCEDURE IF EXISTS agregar_autor;
CREATE PROCEDURE agregar_autor (nombre VARCHAR(100))
BEGIN
    INSERT INTO autores (nombre) VALUES (nombre);
    SELECT LAST_INSERT_ID() id;
END //


-- Procedimiento para modificar autores
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_autor; 
CREATE  PROCEDURE modificar_autor (idAutor INT, nombre VARCHAR(50)) 		
BEGIN  	
	UPDATE autores  SET
    nombre = nombreAutor
    WHERE id = idAutor;							
END // 

  -- Procedimiento para eliminar autores
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_autor; 
CREATE  PROCEDURE eliminar_autor(idAutor INT)
BEGIN  	
	DELETE FROM autores
    WHERE id = idAutor;							
END //

-- A U T O R E  S   F I C H A S    R E C U R S O S

-- procedimiento para agregar autores fichas recursos
DELIMITER // 
DROP PROCEDURE IF EXISTS agregar_autor_ficha_recurso; 
CREATE PROCEDURE agregar_autor_ficha_recurso(idAutor INT, idFichaRecurso INT)
BEGIN
	INSERT INTO autores_fichas_recursos (fk_autores, fk_fichas_recursos_auto) VALUES (idAutor, idFichaRecurso);
	SELECT LAST_INSERT_ID() id; 
END //  
 
  -- Procedimiento para eliminar autores fichas recursos
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_autor_fichas_recursos; 
CREATE  PROCEDURE eliminar_autor_fichas_recursos(idAutorFR INT)
BEGIN  	
	DELETE FROM autores_fichas_recursos
    WHERE id = idAutorFR;							
END //

-- P E R I O D O S   A C A D E M I C O S

-- Procedimiento para consultar todas los periodos academicos
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_periodos_academicos;
CREATE  PROCEDURE consultar_periodos_academicos () 
BEGIN 
    SELECT * FROM periodos_academicos;
END // 

-- Procedimiento para consultar los periodos academicos
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_periodo_academico_id;
CREATE  PROCEDURE consultar_periodo_academico_id (idPeriodo INT) 
BEGIN 
    SELECT * FROM periodos_academicos where id = idPeriodo;
END // 

-- procedimiento para agregar los periodos academicos
DELIMITER // 	
DROP PROCEDURE IF EXISTS agregar_periodo_academico; 
CREATE PROCEDURE agregar_periodo_academico(nombrePeriodo VARCHAR(50), abreviacionPeriodo VARCHAR(20)) 
BEGIN							 										
	INSERT INTO periodos_academicos (nombre, abreviacion) VALUES (nombrePeriodo, abreviacionPeriodo);
	SELECT LAST_INSERT_ID() id;
END //  

  -- Procedimiento para modificar los periodos academicos
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_periodo_academico; 
CREATE  PROCEDURE modificar_periodo_academico (idPeriodo INT, nombrePeriodo VARCHAR(50), abreviacionPeriodo VARCHAR(20)) 		
BEGIN  	
	UPDATE periodos_academicos  SET
    nombre = nombrePeriodo, 
	abreviacion = abreviacionPeriodo
    WHERE id = idPeriodo;							
END // 

  -- Procedimiento para eliminar los periodos academicos
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_periodo_academico; 
CREATE  PROCEDURE eliminar_periodo_academico (idPeriodo INT) 		
BEGIN  	
	DELETE FROM periodos_academicos
    WHERE id = idPeriodo;							
END //

-- A U D I E N C I A
			
-- procedimiento para agregar audiencia
DELIMITER // 		
DROP PROCEDURE IF EXISTS agregar_audiencia; 
CREATE PROCEDURE agregar_audiencia(idPeriodoAcademico INT, idFichaRecurso INT) 
BEGIN																	
	INSERT INTO audiencia (fk_periodos_academicos, fk_fichas_recursos_audi) VALUES (idPeriodoAcademico, idFichaRecurso);
	SELECT LAST_INSERT_ID() id; 
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
DROP PROCEDURE IF EXISTS consultar_asignatura_id;
CREATE  PROCEDURE consultar_asignatura_id (idAsignatura INT) 
BEGIN 
    SELECT * FROM asignaturas where id = idAsignatura;
END // 

-- procedimiento para agregar asignaturas
DELIMITER // 	
DROP PROCEDURE IF EXISTS agregar_asignatura; 
CREATE PROCEDURE agregar_asignatura(nombreAsignatura VARCHAR(100))
BEGIN							
	INSERT INTO asignaturas (nombre) VALUES (nombreAsignatura);
	SELECT LAST_INSERT_ID() id;
END //  

  -- Procedimiento para modificar asignaturas
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_asignatura; 
CREATE  PROCEDURE modificar_asignatura (idAsignatura INT, nombreAsignatura VARCHAR(1000)) 		
BEGIN  	
	UPDATE asignaturas  SET
    nombre = nombreAsignatura
    WHERE id = idAsignatura;							
END // 

  -- Procedimiento para eliminar asignaturas
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_asignatura; 
CREATE  PROCEDURE eliminar_asignatura (idAsignatura INT) 		
BEGIN  	
	DELETE FROM asignaturas
    WHERE id = idAsignatura;							
END //

-- D I S C I P L I N A   D E L   C O N O C I M I E N T O
	
-- procediento para agregar disciplina del conocimiento
DELIMITER // 	
DROP PROCEDURE IF EXISTS agregar_disciplina_conocimiento; 
CREATE PROCEDURE agregar_disciplina_conocimiento(idAsignatura INT, idFichaRecurso INT) 
BEGIN
	INSERT INTO disciplina_conocimiento (fk_asignaturas, fk_fichas_recursos_disc) VALUES (idPeriodoAcademico, idFichaRecurso);
	SELECT LAST_INSERT_ID() id;
END //  
 
  -- Procedimiento para eliminar disciplina del conocimiento
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_disciplina_conocimiento; 
CREATE  PROCEDURE eliminar_disciplina_conocimiento(idDisciplina INT)
BEGIN  	
	DELETE FROM disciplina_conocimiento
    WHERE id = idDisciplina;							
END //

-- T E M A S 

-- Procedimiento para consultar todas los temas
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_temas;
CREATE  PROCEDURE consultar_temas () 
BEGIN 
    SELECT * FROM temas;
END // 

-- Procedimiento para consultar los temas por ID
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_tema_id;
CREATE  PROCEDURE consultar_tema_id (idTema INT) 
BEGIN 
    SELECT * FROM temas where id = idTema;
END // 

-- Procedimiento para agregar temas
DELIMITER // 
DROP PROCEDURE IF EXISTS agregar_tema; 
CREATE PROCEDURE agregar_tema(nombreTema VARCHAR(1000))
BEGIN
	INSERT INTO temas (nombre) VALUES (nombreTema);
	SELECT LAST_INSERT_ID() id; 
END //  

  -- Procedimiento para modificar temas
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_tema; 
CREATE  PROCEDURE modificar_tema (idTema INT, nombreTema VARCHAR(1000)) 		
BEGIN  	
	UPDATE temas  SET
    nombre = nombreTema
    WHERE id = idTema;							
END // 

  -- Procedimiento para eliminar temas
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_tema; 
CREATE  PROCEDURE eliminar_tema (idTema INT) 		
BEGIN  	
	DELETE FROM temas
    WHERE id = idTema;							
END //

-- C O N T E N I D O S
			
-- procedimiento para agregar contenidos
DELIMITER // 
DROP PROCEDURE IF EXISTS agregar_contenido; 
CREATE PROCEDURE agregar_contenido(idTema INT, idFichaRecurso INT)
BEGIN								
	INSERT INTO contenidos (fk_temas, fk_fichas_recursos_cont) VALUES (idTema, idFichaRecurso);
	SELECT LAST_INSERT_ID() id;
END //  
 
  -- Procedimiento para eliminar audencia
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_contenido; 
CREATE  PROCEDURE eliminar_contenido(idContenido INT)
BEGIN  	
	DELETE FROM contenidos
    WHERE id = idContenido;							
END //
