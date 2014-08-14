-- INSERTS DE PRUEBA

INSERT INTO usuarios (nombre,email,clave,tipo,activo) VALUES ("John", "casserole@gmail.com","kksuewndyuhb123ewjksadad", "Administrador", true);
INSERT INTO usuarios (nombre,email,clave,tipo,activo) VALUES ("Casey", "coll@gmail.com","kksuewndyuhb123asdjkad", "Gestor", false);

INSERT INTO preguntas_particulares (pregunta,revisada,fk_usuarios) VALUES ("Particular de pruebas", false, 1);
INSERT INTO preguntas_particulares (pregunta,revisada,fk_usuarios) VALUES ("Segunda Particular", false, 1);

INSERT INTO preguntas_frecuentes (pregunta,respuesta) VALUES ("Eres tuyu??", "Claro! JAjaaja");



