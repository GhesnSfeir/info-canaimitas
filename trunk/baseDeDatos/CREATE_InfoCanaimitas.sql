-- Creacion de las tablas

-- TIPO: Gestor, Administrador, General, Invitado
-- ACTIVO: 1 (True), 0 (False)
CREATE TABLE usuarios (
			id int 						not null auto_increment,
			nombre VARCHAR(100)			not null, 
			email VARCHAR(100) 			not null, 
			clave VARCHAR(32)			not null, 
			tipo VARCHAR(50)			not null, 	
			activo TINYINT 				not null,	
			PRIMARY KEY (id),
			UNIQUE(email)
			);
			
CREATE TABLE preguntas_particulares (
			id int 						not null auto_increment,
			pregunta VARCHAR(1000)		not null, 
			revisada TINYINT 			not null,
			fk_usuarios int 			not null,
			PRIMARY KEY (id),
			FOREIGN KEY (fk_usuarios)
				REFERENCES usuarios(id) ON DELETE CASCADE
			);

CREATE TABLE preguntas_frecuentes (
			id int 						not null auto_increment,
			pregunta VARCHAR(1000)		not null,
			respuesta VARCHAR(1000)		not null,
			visible TINYINT 			not null,			
			PRIMARY KEY (id)
			);
			
CREATE TABLE fichas_recursos (
			id int 									not null auto_increment,
			titulo VARCHAR(100)						not null,
			formato VARCHAR(10)						not null,
			ruta_acceso VARCHAR(1000)				not null,
			caracterizacion_url VARCHAR(1000)		not null,
			recurso_url VARCHAR(1000)				not null,
			PRIMARY KEY (id)
			);
			
CREATE TABLE comentarios (
			id int 						not null auto_increment,
			comentario VARCHAR(1000)		not null, 
			fecha date 					not null,
			denunciado TINYINT 			not null,
			permitido TINYINT			not null,
			fk_comentarios int 					,
			fk_usuarios int 			not null,
			fk_fichas_recursos int 		not null,
			PRIMARY KEY (id),
			FOREIGN KEY (fk_comentarios)
				REFERENCES comentarios(id) ON DELETE CASCADE,
			FOREIGN KEY (fk_usuarios)
				REFERENCES usuarios(id) ON DELETE CASCADE,
			FOREIGN KEY (fk_fichas_recursos)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);

CREATE TABLE niveles_academicos (
			id int 						not null auto_increment,
			nombre VARCHAR(50)			not null,
			abreviacion VARCHAR(20)		not null,			
			PRIMARY KEY (id),
			UNIQUE(nombre)
			);
			
CREATE TABLE asignaturas (
			id int 					not null auto_increment,
			nombre VARCHAR(100)		not null,
			PRIMARY KEY (id),
			UNIQUE(nombre)
			);		
			
CREATE TABLE temas (
			id int 					not null auto_increment,
			nombre VARCHAR(100)		not null,
			PRIMARY KEY (id),
			UNIQUE(nombre)
			);		
			
CREATE TABLE audiencia (
			fk_niveles_academicos int 		not null,
			fk_fichas_recursos_audi int 	not null,
			PRIMARY KEY (fk_niveles_academicos, fk_fichas_recursos_audi),
			FOREIGN KEY (fk_niveles_academicos)
				REFERENCES niveles_academicos(id) ON DELETE CASCADE,
			FOREIGN KEY (fk_fichas_recursos_audi)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);
			
CREATE TABLE disciplina_conocimiento (
			fk_asignaturas int 				not null,
			fk_fichas_recursos_disc int 	not null,
			PRIMARY KEY (fk_asignaturas, fk_fichas_recursos_disc),
			FOREIGN KEY (fk_asignaturas)
				REFERENCES asignaturas(id) ON DELETE CASCADE,
			FOREIGN KEY (fk_fichas_recursos_disc)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);
			
CREATE TABLE contenidos (
			fk_temas int 					not null,
			fk_fichas_recursos_cont int 	not null,
			FOREIGN KEY (fk_temas)
				REFERENCES temas(id) ON DELETE CASCADE,
			FOREIGN KEY (fk_fichas_recursos_cont)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE,
			PRIMARY KEY (fk_temas, fk_fichas_recursos_cont)
			);
			
CREATE TABLE recomendaciones (
			id int 							not null auto_increment,
			recomendacion	VARCHAR(1000) 	not null,
			fk_fichas_recursos_reco int 	not null,
			PRIMARY KEY (id),
			FOREIGN KEY (fk_fichas_recursos_reco)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);
			
CREATE TABLE autores (
			id int 					not null auto_increment,
			nombre VARCHAR(100)		not null,
			PRIMARY KEY (id),
			UNIQUE(nombre)
			);
			
CREATE TABLE autores_fichas_recursos (
			fk_autores	int 				not null,
			fk_fichas_recursos_auto int 	not null,
			PRIMARY KEY (fk_autores, fk_fichas_recursos_auto),
			FOREIGN KEY (fk_autores)
				REFERENCES autores(id) ON DELETE CASCADE,
			FOREIGN KEY (fk_fichas_recursos_auto)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);
			
