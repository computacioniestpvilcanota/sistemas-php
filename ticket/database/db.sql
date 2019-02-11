CREATE TABLE Usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(64) NOT NULL,
    email varchar(64),
    clave VARCHAR(64),
    foto VARCHAR(64),
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

CREATE TABLE Proyectos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128),
    CONSTRAINT pk_proyectos PRIMARY KEY (id)
);

CREATE TABLE Prioridades (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128),
    CONSTRAINT pk_prioridades PRIMARY KEY (id)
);

CREATE TABLE Categorias (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128),
    CONSTRAINT pk_categorias PRIMARY KEY (id)
);

CREATE TABLE Estados (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128),
    CONSTRAINT pk_estados PRIMARY KEY (id)
);

CREATE TABLE Tikets (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(128),
    descripcion TEXT,
    fecha date,
    fecha_modificacion date,
    id_usuario INT,
    id_proyecto INT,
    id_prioridad INT,
    id_categoria INT,
    id_estado INT,
    CONSTRAINT pk_estados PRIMARY KEY (id),
    CONSTRAINT fk_tikets_usuarios FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_tikets_proyectos FOREIGN KEY (id_proyecto) REFERENCES Proyectos(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_tikets_prioridades FOREIGN KEY (id_prioridad) REFERENCES Prioridades(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_tikets_categorias FOREIGN KEY (id_categoria) REFERENCES Categorias(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_tikets_estados FOREIGN KEY (id_estado) REFERENCES Estados(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT
);