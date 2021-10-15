
CREATE DATABASE TEST_TGA;
USE TEST_TGA;

CREATE TABLE HOBBIES(
	ID_HOBBY INT PRIMARY KEY,
    NOMBRE_HOBBY VARCHAR(15) NOT NULL

);

INSERT INTO HOBBIES (ID_HOBBY, NOMBRE_HOBBY) VALUES (0,'Ninguno'), (1,'Deporte'), (2,'Musical'),
(3,'Cocina'), (4,'Literario'), (5,'Manualidades'), (6,'Juegos'), (7,'Modelismo'),
(8,'Baile'), (9,'Cine'), (10,'Otro');


CREATE TABLE GENERO(
ID_GENERO INT PRIMARY KEY,
NOMBRE_GENERO VARCHAR(10) NOT NULL 
);

INSERT INTO GENERO (ID_GENERO, NOMBRE_GENERO) VALUES (0,'Mujer'), (1,'Hombre');

CREATE TABLE ENCUESTAS(
ID_ENCUESTA INT AUTO_INCREMENT PRIMARY KEY,
NOMBRE_ENCUESTADO VARCHAR(15) NOT NULL,
TIEMPO INT(11) NULL,
HOBBY_ENCUESTADO_FK INT(11) NOT NULL,
GENERO_ENCUESTADO_FK INT(11) NOT NULL,
FOREIGN KEY(HOBBY_ENCUESTADO_FK) REFERENCES HOBBIES(ID_HOBBY)
ON UPDATE CASCADE ON DELETE NO ACTION,
FOREIGN KEY(GENERO_ENCUESTADO_FK) REFERENCES GENERO(ID_GENERO)
ON UPDATE CASCADE ON DELETE NO ACTION
);


/*
		QUERYS PARA SABER INFORMACION SOLICITDA
*/

/*SABER CUANTAS PERSONAS CON EL MISMO NOMBRE EXISTEN*/
SELECT NOMBRE_ENCUESTADO AS NOMBRE, COUNT(*) AS CANTIDAD FROM ENCUESTAS 
GROUP BY NOMBRE_ENCUESTADO;

/*SABER CUANTOS HOMBRE Y MUJERES REALIZARON LA ENCUESTA*/
SELECT NOMBRE_GENERO AS GENERO, COUNT(*) AS CANTIDAD FROM ENCUESTAS AS E
INNER JOIN GENERO AS G ON G.ID_GENERO = E.GENERO_ENCUESTADO_FK
GROUP BY NOMBRE_GENERO;

/*SABER CUANTAS PERSONAS HAY PARA CADA HOBBY*/
SELECT NOMBRE_HOBBY AS HOBBY, COUNT(*) AS CANTIDAD FROM ENCUESTAS AS E
INNER JOIN HOBBIES AS H ON H.ID_HOBBY = E.HOBBY_ENCUESTADO_FK
GROUP BY NOMBRE_HOBBY;

/*SABER CUANTAS PERSONAS COMPARTEN LA MISMA CANTIDAD DE HORAS DEDIDCA A UN HOBBY*/
SELECT TIEMPO AS TIEMPO, COUNT(*) AS CANTIDAD FROM ENCUESTAS 
GROUP BY TIEMPO;

/*Traer los registros de la tabla Encuestas*/
SELECT E.NOMBRE_ENCUESTADO AS NOMBRE, E.TIEMPO , G.NOMBRE_GENERO AS GENERO, H.NOMBRE_HOBBY AS HOBBY   FROM ENCUESTAS AS E
INNER JOIN GENERO AS G ON G.ID_GENERO = E.GENERO_ENCUESTADO_FK
INNER JOIN HOBBIES AS H ON H.ID_HOBBY = E.HOBBY_ENCUESTADO_FK







