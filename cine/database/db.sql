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

CREATE TABLE Categorias (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    CONSTRAINT pk_categorias PRIMARY KEY (id)
);

CREATE TABLE Peliculas (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128),
    descripcion TEXT,
    portada VARCHAR(64),
    unidad INT,
    id_categoria INT,
    CONSTRAINT pk_peliculas PRIMARY KEY (id),
    CONSTRAINT fk_peliculas_categoria FOREIGN KEY (id_categoria) REFERENCES Categorias (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Reservaciones (
    id INT NOT NULL AUTO_INCREMENT,
    fecha date,
    fecha_reserva date,
    hora_reserva INT,
    abservacion VARCHAR(128),
    id_cliente INT,
    id_pelicula INT,
    precio decimal,
    CONSTRAINT pk_reservaciones PRIMARY KEY (id),
    CONSTRAINT fk_reservaciones_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_reservaciones_pelicula FOREIGN KEY (id_pelicula) REFERENCES Peliculas (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);