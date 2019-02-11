CREATE TABLE Usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(64) NOT NULL,
    email varchar(64),
    clave VARCHAR(64),
    foto VARCHAR(64),
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

CREATE TABLE Tecnicos (
    id INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    nombres VARCHAR(128) NOT NULL,
    especialidad VARCHAR(128),
    cargo VARCHAR(128),
    dni VARCHAR(8),
    direccion VARCHAR(128),
    ciudad VARCHAR(64),
    sexo VARCHAR(12),
    telefono VARCHAR(9),
    CONSTRAINT pk_tecnicos PRIMARY KEY (id),
    CONSTRAINT fk_tecnicos_usuario FOREIGN KEY (id_usuario) REFERENCES Usuarios (id)
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

CREATE TABLE Repuestos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    descripcion TEXT,
    stock INT,
    precio FLOAT,
    codigo VARCHAR(128),
    id_categoria INT,
    CONSTRAINT pk_Repuestos PRIMARY KEY (id),
    CONSTRAINT fk_prodcutos_categoria FOREIGN KEY (id_categoria) REFERENCES Categorias (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Reparaciones (
    id INT NOT NULL AUTO_INCREMENT,
    falla VARCHAR(128),
    cobro FLOAT,
    id_repuesto INT NOT NULL,
    cantidad INT,
    precio FLOAT,
    fecha date,
    id_tecnico INT NOT NULL,
    id_cliente INT,
    CONSTRAINT pk_reparaciones PRIMARY KEY (id),
    CONSTRAINT fk_reparaciones_empleado FOREIGN KEY (id_tecnico) REFERENCES Tecnicos (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_reparaciones_cliente FOREIGN KEY (id_cliente) REFERENCES Clientes (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_reparaciones_producto FOREIGN KEY (id_repuesto) REFERENCES Repuestos (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE Compras (
    id INT NOT NULL AUTO_INCREMENT,
    id_repuesto INT NOT NULL,
    cantidad INT,
    precio FLOAT,
    fecha_compra date,
    id_tecnico INT NOT NULL,
    id_proveedor INT,
    CONSTRAINT pk_compras PRIMARY KEY (id),
    CONSTRAINT fk_compras_empleado FOREIGN KEY (id_tecnico) REFERENCES Tecnicos (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_compras_proveedor FOREIGN KEY (id_proveedor) REFERENCES Proveedores (id)
        ON UPDATE RESTRICT ON DELETE RESTRICT,
    CONSTRAINT fk_compra_prodcuto FOREIGN KEY (id_repuesto) REFERENCES Repuestos (id)
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