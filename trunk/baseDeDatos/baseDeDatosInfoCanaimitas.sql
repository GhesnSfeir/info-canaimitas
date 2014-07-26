-- Creacion de la base de datos
CREATE DATABASE infocanaimitas;

-- Creacion de las tablas

CREATE TABLE usuarios (
			id int 						not null auto_increment,
			nombre VARCHAR(30)			not null, 
			email VARCHAR(50) 			not null, 
			clave VARCHAR(20)			not null, 
			tipo varchar(10)			not null, 
			activo TINYINT 				not null,
			PRIMARY KEY (id)
			);
			
CREATE TABLE preguntas_particulares (
			id int 						not null auto_increment,
			pregunta VARCHAR(250)		not null, 
			revisada TINYINT 			not null,
			fk_usuarios int 			not null,
			PRIMARY KEY (id),
			FOREIGN KEY (fk_usuarios)
				REFERENCES usuarios(id) ON DELETE CASCADE
			);
			
CREATE TABLE fichas_recursos (
			id int 									not null auto_increment,
			titulo VARCHAR(100)						not null,
			formato VARCHAR(10)						not null,
			ruta_acceso VARCHAR(1000)				not null,
			caracterizacion_url VARCHAR(1000)		not null,
			recurso_url VARCHAR(1000)				not null,
			PRIMARY KEY (id),
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
				REFERENCES usuarios(id) ON DELETE CASCADE
			FOREIGN KEY (fk_fichas_recursos)
				REFERENCES fichas_recursos(id) ON DELETE CASCADE
			);
			

			
