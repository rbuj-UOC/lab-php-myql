-- base de dades de l'exercici 003
CREATE DATABASE estudis CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;

USE estudis;

CREATE TABLE estudi (
  id_estudi int NOT NULL,
  nom_estudi varchar(50) NOT NULL,
  tipus varchar(50) NOT NULL,
  PRIMARY KEY (id_estudi)
) ENGINE=InnoDB;

CREATE TABLE estudiant (
  id_estudiant int NOT NULL AUTO_INCREMENT,
  DNI char(9) NOT NULL,
  nom varchar(100) NOT NULL,
  edat int,
  id_estudi int,
  PRIMARY KEY (id_estudiant),
  FOREIGN KEY (id_estudi) REFERENCES estudi (id_estudi) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB;

INSERT INTO estudi VALUES (1, 'Multimèdia', 'Grau');
INSERT INTO estudi VALUES (2, 'Informàtica', 'Grau');
INSERT INTO estudi VALUES (3, 'Nutricio i Salut', 'Màster');

INSERT INTO estudiant (DNI, nom, edat, id_estudi) VALUES ('52111111A', 'Pere Pons Grau', 21, 1);
INSERT INTO estudiant (DNI, nom, edat, id_estudi) VALUES ('52222222B', 'Joana Sauler Giménez', 22, 1);
INSERT INTO estudiant (DNI, nom, edat, id_estudi) VALUES ('52333333C', 'Jaume Marinas Frías', 24, 2);
INSERT INTO estudiant (DNI, nom, edat, id_estudi) VALUES ('52444444D', 'Laura Dot Aguilar', 23, 2);
INSERT INTO estudiant (DNI, nom, edat, id_estudi) VALUES ('52555555E', 'Ricard Blanco Llobet', 21, 3);

-- base de dades de l'exercici 005
CREATE DATABASE bdprova CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;

USE bdprova;

CREATE TABLE estudiant (
  DNI char(9) NOT NULL,
  nom varchar(100) NOT NULL,
  edat int,
  PRIMARY KEY (DNI)
) ENGINE=InnoDB;

CREATE TABLE assignatura (
  codi char(5) NOT NULL,
  nom varchar(50) NOT NULL,
  credits int,
  PRIMARY KEY (codi)
) ENGINE=InnoDB;

CREATE TABLE cursa (
  DNI char(9) NOT NULL,
  codi_assig char(5) NOT NULL,
  edat int,
  id_estudi int,
  PRIMARY KEY (DNI,codi_assig),
  FOREIGN KEY (DNI) REFERENCES estudiant (DNI),
  FOREIGN KEY (codi_assig) REFERENCES assignatura (codi)
) ENGINE=InnoDB;
