-- Creacion de la base de datos
CREATE DATABASE infocanaimitas;

-- Creacion de las tablas

CREATE TABLE usuarios (
			id int 						not null auto_increment,
			nombre VARCHAR(50)			not null, 
			email VARCHAR(50) 			not null, 
			clave VARCHAR(20)			not null, 
			tipo varchar(10)			not null, 
			activo TINYINT 				not null,
			PRIMARY KEY (id)
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
			comentario VARCHAR(250)		not null, 
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

CREATE TABLE periodos_academicos (
			id int 						not null auto_increment,
			nombre VARCHAR(50)			not null,
			abreviacion VARCHAR(20)		not null,			
			PRIMARY KEY (id)
			);
			
CREATE TABLE asignaturas (
			id int 					not null auto_increment,
			nombre VARCHAR(100)		not null,
			PRIMARY KEY (id)
			);		
			
CREATE TABLE temas (
			id int 					not null auto_increment,
			nombre VARCHAR(1000)	not null,
			PRIMARY KEY (id)
			);
			
CREATE TABLE audencia (
			id int 							not null auto_increment,
			fk_periodos_academicos int 		not null,
			fk_fichas_recursos_audi int 	not null,
			PRIMARY KEY (id),
			FOREIGN KEY (fk_periodos_academicos)
				REFERENCES periodos_academicos(id) ON DELETE CASCADE,
			FOREIGN KEY (fk_fichas_recursos_audi)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);
			
CREATE TABLE disciplina_conocimiento (
			id int 							not null auto_increment,
			fk_asignaturas int 				not null,
			fk_fichas_recursos_disc int 	not null,
			PRIMARY KEY (id),
			FOREIGN KEY (fk_asignaturas)
				REFERENCES asignaturas(id) ON DELETE CASCADE,
			FOREIGN KEY (fk_fichas_recursos_disc)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);
			
CREATE TABLE contenidos (
			id int 							not null auto_increment,
			fk_temas int 					not null,
			fk_fichas_recursos_cont int 	not null,
			PRIMARY KEY (id),
			FOREIGN KEY (fk_temas)
				REFERENCES temas(id) ON DELETE CASCADE,
			FOREIGN KEY (fk_fichas_recursos_cont)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);
			
CREATE TABLE recomendaciones (
			id int 							not null auto_increment,
			recomendacion	VARCHAR(40) 	not null,
			fk_fichas_recursos_reco int 	not null,
			PRIMARY KEY (id),
			FOREIGN KEY (fk_fichas_recursos_reco)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);
			
CREATE TABLE autores (
			id int 					not null auto_increment,
			nombre VARCHAR(50)	not null,
			PRIMARY KEY (id)
			);
			
CREATE TABLE autores_recomendaciones (
			id int 					not null auto_increment,
			fk_autores	int 		not null,
			PRIMARY KEY (id),
			FOREIGN KEY (fk_autores)
				REFERENCES autores(id) ON DELETE CASCADE
			);
			
-- elimanacion de las tablas

DROP TABLE usuarios;

DROP TABLE preguntas_particulares;

DROP TABLE preguntas_frecuentes;

DROP TABLE fichas_recursos;

DROP TABLE comentarios;

DROP TABLE periodos_academicos;

DROP TABLE asignaturas;

DROP TABLE temas;

DROP TABLE audencia;

DROP TABLE disciplina_conocimiento;

DROP TABLE contenidos;

DROP TABLE recomendaciones;

DROP TABLE autores;

DROP TABLE autores_recomendaciones;