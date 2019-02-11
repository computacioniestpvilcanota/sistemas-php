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

CREATE TABLE Menus (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    descripcion TEXT,
    codigo VARCHAR(128),
    id_categoria INT,
    CONSTRAINT pk_menus PRIMARY KEY (id),
    CONSTRAINT fk_menus_categoria FOREIGN KEY (id_categoria) REFERENCES Categorias (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Reservaciones (
    id INT NOT NULL AUTO_INCREMENT,
    fecha date,
    fechaEntrega date,
    abservacion VARCHAR(128),
    cantidad INT,
    id_cliente INT,
    id_menu INT,
    CONSTRAINT pk_reservaciones PRIMARY KEY (id),
    CONSTRAINT fk_reservaciones_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_reservacion_detalle_menu FOREIGN KEY (id_menu) REFERENCES Menus (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);


CREATE TABLE Ventas (
    id INT NOT NULL AUTO_INCREMENT,
    id_menu INT NOT NULL,
    cantidad INT,
    precio FLOAT,
    fecha_venta date,
    id_cliente INT,
    CONSTRAINT pk_ventas PRIMARY KEY (id),
    CONSTRAINT fk_ventas_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_venta_producto FOREIGN KEY (id_menu) REFERENCES Menus (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Insumos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    descripcion TEXT,
    CONSTRAINT pk_insumos PRIMARY KEY (id)
);

CREATE TABLE Preparacion (
    id INT NOT NULL AUTO_INCREMENT,
    id_menu INT NOT NULL,
    cantidad INT,
    insumo_1 VARCHAR(128),
    cantidad_1 INT,
    insumo_2 VARCHAR(128),
    cantidad_2 INT,
    insumo_3 VARCHAR(128),
    cantidad_3 INT,
    insumo_4 VARCHAR(128),
    cantidad_4 INT,
    CONSTRAINT pk_preparacion PRIMARY KEY (id),
    CONSTRAINT fk_preparacion_menu FOREIGN KEY (id_menu) REFERENCES Menus (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);