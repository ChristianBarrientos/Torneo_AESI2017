CREATE TABLE usuarios (
     id_usuario INTEGER AUTO_INCREMENT NOT NULL,
     dni_usuario INTEGER ,
     nombre VARCHAR(500) NOT NULL,
     correo VARCHAR(100) NOT NULL,
     pass VARCHAR (50) NOT NULL,
     lenguaje VARCHAR (50) NOT NULL,
     PRIMARY KEY (id_usuario)
     ) ENGINE=InnoDB;


CREATE TABLE problema (
    id_problema INTEGER AUTO_INCREMENT NOT NULL,
    nivel_problema INTEGER NOT NULL,
    intro_problema VARCHAR (1000),
    cuerpo_problema varchar(5000),
    solucion VARCHAR (100),
    KEY (id_problema)
    ) ENGINE=InnoDB;

CREATE TABLE archivo (
    id_archivo INTEGER AUTO_INCREMENT NOT NULL,
    nombre VARCHAR (100),
    ubicacion varchar(500),
    tipo VARCHAR (100),
    KEY (id_archivo)
    ) ENGINE=InnoDB;

CREATE TABLE respuesta (
     id_respuesta INTEGER AUTO_INCREMENT NOT NULL,
     id_archivo INTEGER NOT NULL,
     KEY (id_respuesta),
     FOREIGN KEY (id_archivo) REFERENCES archivo(id_archivo) ON DELETE NO ACTION ON UPDATE CASCADE
     ) ENGINE=InnoDB;

