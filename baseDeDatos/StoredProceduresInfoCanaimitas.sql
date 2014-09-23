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

-- Procedimiento para buscar usuarios por filtro
DELIMITER // 									
DROP PROCEDURE IF EXISTS buscar_usuarios_filtro; 
CREATE  PROCEDURE buscar_usuarios_filtro (filtro VARCHAR(100))
BEGIN  											
    SELECT * FROM usuarios u WHERE u.nombre like concat('%',filtro,'%') OR u.email like concat('%',filtro,'%');
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

-- Procedimiento para contar la cantidad de repeticiones de un id para la tabla usuarios
DELIMITER //
DROP PROCEDURE IF EXISTS contar_usuarios_id;
CREATE PROCEDURE contar_usuarios_id (idUsuario INT)
BEGIN
    SELECT COUNT(*) cuenta FROM usuarios u WHERE u.id = idUsuario;
END //

  -- Procedimiento para eliminar usuarios
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_usuario; 
CREATE  PROCEDURE eliminar_usuario (idUsuario INT) 		
BEGIN  	
	DELETE FROM usuarios
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
DROP PROCEDURE IF EXISTS consultar_pregunta_frecuente_id;
CREATE  PROCEDURE consultar_pregunta_frecuente_id (idPregunta INT) 
BEGIN 
    SELECT * FROM preguntas_frecuentes where id = idPregunta;
END // 

-- Procedimiento para buscar preguntas frecuentes por filtro
DELIMITER // 									
DROP PROCEDURE IF EXISTS buscar_preguntas_frecuentes_filtro; 
CREATE  PROCEDURE buscar_preguntas_frecuentes_filtro (filtro VARCHAR(100))
BEGIN  											
    SELECT * FROM preguntas_frecuentes p WHERE p.pregunta like concat('%',filtro,'%') OR p.respuesta like concat('%',filtro,'%');
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

-- Procedimiento para consultar la existencia de una ficha por su ID
DELIMITER // 
DROP PROCEDURE IF EXISTS contar_ficha_recurso_id;
CREATE  PROCEDURE contar_ficha_recurso_id (idFicha INT) 
BEGIN 
    SELECT COUNT(id) FROM fichas_recursos WHERE id = idFicha;
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

  -- Procedimiento para eliminar fichas de los recursos
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_ficha_recurso; 
CREATE  PROCEDURE eliminar_ficha_recurso (idFichaRecurso INT) 		
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

-- Procedimiento para consultar autor por id
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_autores_id;
CREATE  PROCEDURE consultar_autores_id (idAutor INT) 
BEGIN 
    SELECT * FROM autores WHERE id = idAutor;
END // 

-- Procedimiento para consultar autor por nombre
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_autores_nombre;
CREATE  PROCEDURE consultar_autores_nombre (nombreAutor VARCHAR(100)) 
BEGIN 
    SELECT * FROM autores WHERE nombre = nombreAutor;
END // 

-- procedimiento para agregar autores
DELIMITER // 	
DROP PROCEDURE IF EXISTS agregar_autor;
CREATE PROCEDURE agregar_autor (nombreAutor VARCHAR(100))
BEGIN
    INSERT INTO autores (nombre) VALUES (nombreAutor);
    SELECT LAST_INSERT_ID() id;
END //

-- Procedimiento para consultar autores idRecurso
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_autores_id_recurso;
CREATE  PROCEDURE consultar_autores_id_recurso (idRecurso INT) 
BEGIN 
    SELECT a.* FROM autores a, autores_fichas_recursos ar where ar.fk_fichas_recursos_auto = idRecurso AND ar.fk_autores = a.id;
END // 


-- Procedimiento para modificar autores
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_autor; 
CREATE  PROCEDURE modificar_autor (idAutor INT, nombreAutor VARCHAR(100)) 		
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

-- Procedimiento para contar la cantidad de repeticiones de un nombre para la tabla autor
DELIMITER //
DROP PROCEDURE IF EXISTS contar_autores_nombre;
CREATE PROCEDURE contar_autores_nombre (nombreAutor VARCHAR(100))
BEGIN
    SELECT COUNT(*) cuenta FROM autores WHERE nombre = nombreAutor;
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
CREATE  PROCEDURE eliminar_autor_fichas_recursos(idAutor INT, idFichaRecurso INT)
BEGIN  	
	DELETE FROM autores_fichas_recursos
    WHERE fk_autores = idAutor AND fk_fichas_recursos_auto = idFichaRecurso;							
END //

-- P E R I O D O S   A C A D E M I C O S

-- Procedimiento para consultar todas los niveles academicos
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_niveles_academicos;
CREATE  PROCEDURE consultar_niveles_academicos () 
BEGIN 
    SELECT * FROM niveles_academicos;
END // 

-- Procedimiento para consultar los niveles academicos ID
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_nivel_academico_id;
CREATE  PROCEDURE consultar_nivel_academico_id (idNivel INT) 
BEGIN 
    SELECT * FROM niveles_academicos where id = idNivel;
END // 

-- procedimiento para agregar los niveles academicos
DELIMITER // 	
DROP PROCEDURE IF EXISTS agregar_nivel_academico; 
CREATE PROCEDURE agregar_nivel_academico(nombreNivel VARCHAR(50), abreviacionNivel VARCHAR(20)) 
BEGIN							 										
	INSERT INTO niveles_academicos (nombre, abreviacion) VALUES (nombreNivel, abreviacionNivel);
	SELECT LAST_INSERT_ID() id;
END //  

  -- Procedimiento para modificar los niveles academicos
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_nivel_academico; 
CREATE  PROCEDURE modificar_nivel_academico (idNivel INT, nombreNivel VARCHAR(50), abreviacionNivel VARCHAR(20)) 		
BEGIN  	
	UPDATE niveles_academicos  SET
    nombre = nombreNivel, 
	abreviacion = abreviacionNivel
    WHERE id = idNivel;							
END // 

  -- Procedimiento para eliminar los Nivel academico
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_nivel_academico; 
CREATE  PROCEDURE eliminar_nivel_academico (idNivel INT) 		
BEGIN  	
	DELETE FROM niveles_academicos
    WHERE id = idNivel;							
END //

-- Procedimiento para consultar los niveles academicos por nombre
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_nivel_academico_nombre;
CREATE  PROCEDURE consultar_nivel_academico_nombre (nombreNivel VARCHAR(50)) 
BEGIN 
    SELECT * FROM niveles_academicos where nombre = nombreNivel;
END // 

-- Procedimiento para consultar los niveles academicos por nombre
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_niveles_academicos_id_recurso;
CREATE  PROCEDURE consultar_niveles_academicos_id_recurso (idRecurso INT) 
BEGIN 
    SELECT na.* FROM niveles_academicos na, audiencia a where a.fk_fichas_recursos_audi = idRecurso AND a.fk_niveles_academicos = na.id;
END // 

-- Procedimiento para contar la cantidad de repeticiones de un nombre para la tabla niveles academicos
DELIMITER //
DROP PROCEDURE IF EXISTS contar_niveles_academicos_nombre;
CREATE PROCEDURE contar_niveles_academicos_nombre (nombreNivel VARCHAR(50))
BEGIN
    SELECT COUNT(*) cuenta FROM niveles_academicos WHERE nombre = nombreNivel;
END //

-- A U D I E N C I A
			
-- procedimiento para agregar audiencia
DELIMITER // 		
DROP PROCEDURE IF EXISTS agregar_audiencia; 
CREATE PROCEDURE agregar_audiencia(idNivelAcademico INT, idFichaRecurso INT) 
BEGIN																	
	INSERT INTO audiencia (fk_niveles_academicos, fk_fichas_recursos_audi) VALUES (idNivelAcademico, idFichaRecurso);
	SELECT LAST_INSERT_ID() id; 
END //  
 
  -- Procedimiento para eliminar audencia
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_audiencia; 
CREATE  PROCEDURE eliminar_audiencia(idNivelAcademico INT, idFichaRecurso INT)
BEGIN  	
	DELETE FROM audiencia
    WHERE fk_niveles_academicos = idNivelAcademico AND fk_fichas_recursos_audi = idFichaRecurso;							
END //

-- A S I G N A T U R A S

-- Procedimiento para consultar todas las asignaturas
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_asignaturas;
CREATE  PROCEDURE consultar_asignaturas () 
BEGIN 
    SELECT * FROM asignaturas;
END // 

-- Procedimiento para consultar asignaturas id
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_asignatura_id;
CREATE  PROCEDURE consultar_asignatura_id (idAsignatura INT) 
BEGIN 
    SELECT * FROM asignaturas where id = idAsignatura;
END // 

-- Procedimiento para consultar asignaturas por nombre
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_asignatura_nombre;
CREATE  PROCEDURE consultar_asignatura_nombre (nombreAsignatura VARCHAR(100)) 
BEGIN 
    SELECT * FROM asignaturas where nombre = nombreAsignatura;
END // 

-- Procedimiento para consultar asignaturas idRecurso
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_asignatura_idRecurso;
CREATE  PROCEDURE consultar_asignatura_idRecurso (idRecurso INT) 
BEGIN 
    SELECT a.* FROM asignaturas a, disciplina_conocimiento dc where dc.fk_fichas_recursos_disc = idRecurso AND dc.fk_asignaturas = a.id;
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

-- Procedimiento para contar la cantidad de repeticiones de un nombre para la tabla niveles academicos
DELIMITER //
DROP PROCEDURE IF EXISTS contar_asignaturas_nombre;
CREATE PROCEDURE contar_asignaturas_nombre (nombreAsignatura VARCHAR(1000))
BEGIN
    SELECT COUNT(*) cuenta FROM asignaturas WHERE nombre = nombreAsignatura;
END //

-- D I S C I P L I N A   D E L   C O N O C I M I E N T O
	
-- procediento para agregar disciplina del conocimiento
DELIMITER // 	
DROP PROCEDURE IF EXISTS agregar_disciplina_conocimiento; 
CREATE PROCEDURE agregar_disciplina_conocimiento(idAsignatura INT, idFichaRecurso INT) 
BEGIN
	INSERT INTO disciplina_conocimiento (fk_asignaturas, fk_fichas_recursos_disc) VALUES (idAsignatura, idFichaRecurso);
	SELECT LAST_INSERT_ID() id;
END //  
 
  -- Procedimiento para eliminar disciplina del conocimiento
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_disciplina_conocimiento; 
CREATE  PROCEDURE eliminar_disciplina_conocimiento(idAsignatura INT, idFichaRecurso INT)
BEGIN  	
	DELETE FROM disciplina_conocimiento
    WHERE fk_asignaturas = idAsignatura AND fk_fichas_recursos_disc = idFichaRecurso;							
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

-- Procedimiento para consultar los temas por ID
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_temas_id_recurso;
CREATE  PROCEDURE consultar_temas_id_recurso (idRecurso INT) 
BEGIN 
    SELECT t.* FROM temas t, contenidos c where c.fk_fichas_recursos_cont = idRecurso AND c.fk_temas = t.id;
END // 

-- Procedimiento para consultar los temas por nombre
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_tema_nombre;
CREATE  PROCEDURE consultar_tema_nombre (nombreTema VARCHAR(1000)) 
BEGIN 
    SELECT * FROM temas where nombre = nombreTema;
END // 

-- Procedimiento para contar la cantidad de repeticiones de un nombre para la tabla temas
DELIMITER //
DROP PROCEDURE IF EXISTS contar_temas_nombre;
CREATE PROCEDURE contar_temas_nombre (nombreTema VARCHAR(1000))
BEGIN
    SELECT COUNT(*) cuenta FROM temas WHERE nombre = nombreTema;
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
 
  -- Procedimiento para eliminar contenidos
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_contenido; 
CREATE  PROCEDURE eliminar_contenido(idTema INT, idFichaRecurso INT)
BEGIN  	
	DELETE FROM contenidos
    WHERE fk_temas = idTema AND fk_fichas_recursos_cont = idFichaRecurso;							
END //

-- C O M E N T A R I O S	
		 
-- procedimiento para agregar comentario
DELIMITER // 
DROP PROCEDURE IF EXISTS agregar_comentario; 
CREATE PROCEDURE agregar_comentario(comentarioAgregar VARCHAR(1000), fechaComentario date, denunciadoAgregar TINYINT, permitidoAgregar TINYINT, idComentarioId INT, idUsuarios INT, idFichasRecursos INT)
BEGIN								
	INSERT INTO comentarios (comentario, fecha, denunciado, permitido, fk_comentarios, fk_usuarios, fk_fichas_recursos) VALUES (comentarioAgregar, fechaComentario, denunciadoAgregar, permitidoAgregar, idComentarioId, idUsuarios, idFichasRecursos);
	SELECT LAST_INSERT_ID() id;
END // 

-- Procedimiento para consultar todas los comentarios
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_comentarios;
CREATE  PROCEDURE consultar_comentarios () 
BEGIN 
    SELECT * FROM comentarios;
END // 

-- Procedimiento para consultar los comentarios por ID(Padres)
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_comentario_id;
CREATE  PROCEDURE consultar_comentario_id (idComentario INT) 
BEGIN 
    SELECT * FROM comentarios where id = idComentario;
END // 

-- Procedimiento para consultar los comentarios por ID(hijos)
DELIMITER // 
DROP PROCEDURE IF EXISTS consultar_comentariosHijos_id;
CREATE  PROCEDURE consultar_comentario_id (idComentario INT) 
BEGIN 
    SELECT * FROM comentarios where fk_comentarios = idComentario;
END // 
  -- Procedimiento para modificar comentarios
DELIMITER // 									
DROP PROCEDURE IF EXISTS modificar_comentario; 
CREATE  PROCEDURE modificar_comentario (idComentario INT, comentarioAgregar VARCHAR(1000), fechaComentario date, denunciadoAgregar TINYINT, permitidoAgregar TINYINT)
BEGIN  	
	UPDATE comentarios  SET
	comentario = comentarioAgregar, 
	fecha = fechaComentario, 
	denunciado = denunciadoAgregar, 
	permitido = permitidoAgregar 
    WHERE id = idComentario;							
END // 

-- Procedimiento para contar la cantidad de repeticiones de un id para la tabla comentarios
DELIMITER //
DROP PROCEDURE IF EXISTS contar_comentarios_id;
CREATE PROCEDURE contar_comentarios_id (idComentario INT)
BEGIN
    SELECT COUNT(*) cuenta FROM comentarios c WHERE c.id = idComentario;
END //

  -- Procedimiento para eliminar comentarios
DELIMITER // 									
DROP PROCEDURE IF EXISTS eliminar_comentario; 
CREATE  PROCEDURE eliminar_comentario(idComentario INT)
BEGIN  	
	DELETE FROM comentarios
    WHERE id = idComentario;							
END //