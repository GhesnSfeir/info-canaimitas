-- INSERTS DE PRUEBA

INSERT INTO usuarios (nombre,email,clave,tipo,activo) VALUES ("John", "casserole@gmail.com","kksuewndyuhb123ewjksadad", "Administrador", true);
INSERT INTO usuarios (nombre,email,clave,tipo,activo) VALUES ("Casey", "coll@gmail.com","kksuewndyuhb123asdjkad", "Gestor", false);

INSERT INTO preguntas_particulares (pregunta,revisada,fk_usuarios) VALUES ("Pregunta de pruebas", false, 1);

