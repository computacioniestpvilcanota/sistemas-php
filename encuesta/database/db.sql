CREATE TABLE Usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(64) NOT NULL,
    email varchar(64),
    clave VARCHAR(64),
    foto VARCHAR(64),
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

CREATE TABLE Alumnos (
    id INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    nombres VARCHAR(128) NOT NULL,
    apellidos VARCHAR(128),
    dni VARCHAR(8),
    direccion VARCHAR(128),
    ciudad VARCHAR(64),
    sexo VARCHAR(12),
    celular VARCHAR(9),
    CONSTRAINT pk_alumnos PRIMARY KEY (id),
    CONSTRAINT fk_alumnos_usuario FOREIGN KEY (id_usuario) REFERENCES Usuarios (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Profesores (
    id INT NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(128) NOT NULL,
    apellidos VARCHAR(128),
    dni VARCHAR(8),
    direccion VARCHAR(128),
    ciudad VARCHAR(64),
    sexo VARCHAR(12),
    celular VARCHAR(9),
    foto VARCHAR(128),
    CONSTRAINT pk_profesores PRIMARY KEY (id)
);

CREATE TABLE Preguntas (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(64),
    CONSTRAINT pk_preguntas PRIMARY KEY (id)
);

CREATE TABLE Respuestas (
    id INT NOT NULL AUTO_INCREMENT,
    id_pregunta INT,
    respuesta VARCHAR(8),
    id_alumno INT,
    id_profesor INT,
    CONSTRAINT pk_respuestas PRIMARY KEY (id),
    CONSTRAINT fk_respuestas_preguntas FOREIGN KEY (id_pregunta) REFERENCES Preguntas (id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_respuestas_alumnos FOREIGN KEY (id_alumno) REFERENCES Alumnos (id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_respuestas_profesor FOREIGN KEY (id_profesor) REFERENCES Profesores (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Configuracion (
    id INT NOT NULL AUTO_INCREMENT,
    ruc VARCHAR(12),
    empresa VARCHAR(128),
    eamil VARCHAR(64),
    telefono VARCHAR(12),
    direccion VARCHAR(128),
    logo VARCHAR(64),
    CONSTRAINT pk_configuracion PRIMARY KEY (id)
);