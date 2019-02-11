CREATE TABLE Usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(64) NOT NULL,
    email varchar(64),
    clave VARCHAR(64),
    foto VARCHAR(64),
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

CREATE TABLE Grupos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(64),
    CONSTRAINT pk_grupos PRIMARY KEY (id)
);

CREATE TABLE Alumnos (
    id INT NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(128) NOT NULL,
    apellidos VARCHAR(128),
    dni VARCHAR(8),
    direccion VARCHAR(128),
    ciudad VARCHAR(64),
    sexo VARCHAR(12),
    celular VARCHAR(9),
    CONSTRAINT pk_alumnos PRIMARY KEY (id)
);

CREATE TABLE Docentes (
    id INT NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(128) NOT NULL,
    apellidos VARCHAR(128),
    dni VARCHAR(8),
    direccion VARCHAR(128),
    ciudad VARCHAR(64),
    sexo VARCHAR(12),
    celular VARCHAR(9),
    CONSTRAINT pk_docentes PRIMARY KEY (id)
);


CREATE TABLE Cursos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128),
    id_grupo INT,
    id_docente INT,
    CONSTRAINT pk_cursos PRIMARY KEY (id),
    CONSTRAINT fk_cursos_grupos FOREIGN KEY (id_grupo) REFERENCES Grupos(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_cursos_docentes FOREIGN KEY (id_docente) REFERENCES Docentes(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE Notas (
    id INT NOT NULL AUTO_INCREMENT,
    id_alumno int,
    id_curso int,
    fecha date,
    nota1 INT,
    nota2 INT,
    nota3 INT,
    notafinal INT,
    CONSTRAINT pk_notas PRIMARY KEY (id),
    CONSTRAINT fk_notas_alumnos FOREIGN KEY (id_alumno) REFERENCES Alumnos(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_notas_cursos FOREIGN KEY (id_curso) REFERENCES Cursos(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE Matriculas (
    id INT NOT NULL AUTO_INCREMENT,
    id_alumno INT,
    id_grupo INT,
    pago FLOAT,
    fecha date,
    CONSTRAINT pk_matriculas PRIMARY KEY (id),
    CONSTRAINT fk_matriculas_alumnos FOREIGN KEY (id_alumno) REFERENCES Alumnos(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_matriculas_grupo FOREIGN KEY (id_grupo) REFERENCES Grupos(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT
);