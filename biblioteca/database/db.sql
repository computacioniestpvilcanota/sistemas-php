CREATE TABLE Usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(64) NOT NULL,
    email varchar(64),
    clave VARCHAR(64),
    foto VARCHAR(64),
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

CREATE TABLE Clientes (
    id INT NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(128) NOT NULL,
    apellidos VARCHAR(128),
    dni VARCHAR(8),
    direccion VARCHAR(128),
    ciudad VARCHAR(64),
    sexo VARCHAR(12),
    telefono VARCHAR(9),
    celular VARCHAR(9),
    CONSTRAINT pk_clientes PRIMARY KEY (id)
);

CREATE TABLE Editoriales (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    CONSTRAINT pk_editoriales PRIMARY KEY (id)
);

CREATE TABLE Generos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    CONSTRAINT pk_generos PRIMARY KEY (id)
);

CREATE TABLE Autores (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    nacionalidad VARCHAR(64),
    CONSTRAINT pk_autores PRIMARY KEY (id)
);

CREATE TABLE Libros (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128),
    descripcion TEXT,
    portada VARCHAR(64),
    cantidad INT,
    id_genero INT,
    id_editorial INT,
    id_autor INT,
    edicion INT,
    CONSTRAINT pk_libros PRIMARY KEY (id),
    CONSTRAINT fk_libros_genero FOREIGN KEY (id_genero) REFERENCES Generos (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_libros_autor FOREIGN KEY (id_autor) REFERENCES Autores (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_libros_editorial FOREIGN KEY (id_editorial) REFERENCES Editoriales (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Prestamos (
    id INT NOT NULL AUTO_INCREMENT,
    fecha date,
    abservacion VARCHAR(128),
    id_cliente INT,
    id_libro INT,
    precio decimal,
    CONSTRAINT pk_prestamos PRIMARY KEY (id),
    CONSTRAINT fk_prestamos_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_prestamos_libro FOREIGN KEY (id_libro) REFERENCES Libros (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Configuracion (
    id INT NOT NULL AUTO_INCREMENT,
    ruc VARCHAR(12),
    empresa VARCHAR(128),
    email VARCHAR(64),
    telefono VARCHAR(12),
    direccion VARCHAR(128),
    logo VARCHAR(64),
    CONSTRAINT pk_configuracion PRIMARY KEY (id)
);