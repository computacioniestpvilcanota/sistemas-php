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

CREATE TABLE Proveedores (
    id INT NOT NULL AUTO_INCREMENT,
    rason_social VARCHAR(128) NOT NULL,
    ruc VARCHAR(8),
    direccion VARCHAR(128),
    ciudad VARCHAR(64),
    email VARCHAR(64),
    actividad_principal VARCHAR(64),
    telefono VARCHAR(9),
    representante VARCHAR(64),
    CONSTRAINT pk_proveedores PRIMARY KEY (id)
);

CREATE TABLE Categorias (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    CONSTRAINT pk_categorias PRIMARY KEY (id)
);

CREATE TABLE Productos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    descripcion TEXT,
    stock INT,
    precio FLOAT,
    codigo VARCHAR(128),
    id_categoria INT,
    CONSTRAINT pk_productos PRIMARY KEY (id),
    CONSTRAINT fk_prodcutos_categoria FOREIGN KEY (id_categoria) REFERENCES Categorias (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Ventas (
    id INT NOT NULL AUTO_INCREMENT,
    id_producto INT NOT NULL,
    cantidad INT,
    precio FLOAT,
    fecha_venta date,
    id_empleado INT NOT NULL,
    id_cliente INT,
    CONSTRAINT pk_ventas PRIMARY KEY (id),
    CONSTRAINT fk_ventas_empleado FOREIGN KEY (id_empleado) REFERENCES Empleados (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_ventas_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_venta_producto FOREIGN KEY (id_producto) REFERENCES Productos (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Compras (
    id INT NOT NULL AUTO_INCREMENT,
    id_producto INT NOT NULL,
    cantidad INT,
    precio FLOAT,
    fecha_compra date,
    id_empleado INT NOT NULL,
    id_proveedor INT,
    CONSTRAINT pk_compras PRIMARY KEY (id),
    CONSTRAINT fk_compras_empleado FOREIGN KEY (id_empleado) REFERENCES Empleados (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_compras_proveedor FOREIGN KEY (id_proveedor) REFERENCES Proveedores (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_compras_prodcuto FOREIGN KEY (id_producto) REFERENCES Productos (id)
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

CREATE TABLE Producciones (
    id INT NOT NULL AUTO_INCREMENT,
    fecha date,
    cantidad INT NOT NULL,
    id_empleado INT NOT NULL,
    id_producto INT NOT NULL,
    CONSTRAINT pk_producciones PRIMARY KEY (id),
    CONSTRAINT fk_producciones_empleado FOREIGN KEY (id_empleado) REFERENCES Empleados (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_producciones_prodcuto FOREIGN KEY (id_producto) REFERENCES Productos (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);