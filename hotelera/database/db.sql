CREATE TABLE Usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(64) NOT NULL,
    email varchar(64),
    clave VARCHAR(64),
    foto VARCHAR(64),
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

CREATE TABLE Empleados (
    id INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    nombres VARCHAR(128) NOT NULL,
    apellidos VARCHAR(128),
    dni VARCHAR(8),
    direccion VARCHAR(128),
    ciudad VARCHAR(64),
    sexo VARCHAR(12),
    telefono VARCHAR(9),
    celular VARCHAR(9),
    CONSTRAINT pk_empleados PRIMARY KEY (id),
    CONSTRAINT fk_empleados_usuario FOREIGN KEY (id_usuario) REFERENCES Usuarios (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Clientes (
    id INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    nombres VARCHAR(128) NOT NULL,
    apellidos VARCHAR(128),
    dni VARCHAR(8),
    direccion VARCHAR(128),
    ciudad VARCHAR(64),
    sexo VARCHAR(12),
    telefono VARCHAR(9),
    celular VARCHAR(9),
    CONSTRAINT pk_clientes PRIMARY KEY (id),
    CONSTRAINT fk_clientes_usuario FOREIGN KEY (id_usuario) REFERENCES Usuarios (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Categorias (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    CONSTRAINT pk_categorias PRIMARY KEY (id)
);

CREATE TABLE Havitaciones (
    id INT NOT NULL AUTO_INCREMENT,
    numero INT NOT NULL,
    en_uso boolean,
    descripcion TEXT,
    foto VARCHAR(64),
    precio decimal,
    nivel INT,
    id_categoria INT,
    CONSTRAINT pk_havitaciones PRIMARY KEY (id),
    CONSTRAINT fk_prodcutos_categoria FOREIGN KEY (id_categoria) REFERENCES Categorias (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Servicios (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(64),
    descripcion TEXT,
    foto VARCHAR(64),
    id_havitacion INT,
    CONSTRAINT pk_servicios PRIMARY KEY (id),
    CONSTRAINT fk_servicios_havitacion FOREIGN KEY (id_havitacion) REFERENCES Havitaciones (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Reservaciones (
    id INT NOT NULL AUTO_INCREMENT,
    fecha date,
    fechaEntrega date,
    abservacion VARCHAR(128),
    id_cliente INT,
    id_havitacion INT,
    precio decimal,
    CONSTRAINT pk_reservaciones PRIMARY KEY (id),
    CONSTRAINT fk_reservaciones_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_reservaciones_havitacion FOREIGN KEY (id_havitacion) REFERENCES Havitaciones (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);


CREATE TABLE Alquileres (
    id INT NOT NULL AUTO_INCREMENT,
    desde_fecha date,
    hasta_fecha date,
    observacion VARCHAR(128),
    id_cliente INT,
    id_havitacion INT,
    id_empleado INT,
    precio decimal,
    CONSTRAINT pk_alquileres PRIMARY KEY (id),
    CONSTRAINT fk_alquileres_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_alquileres_havitacion FOREIGN KEY (id_havitacion) REFERENCES Havitaciones (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_alquileres_empleado FOREIGN KEY (id_empleado) REFERENCES Empleados (id)
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