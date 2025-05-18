-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS tiendaDeMascotas;
USE tiendaDeMascotas;

-- Tabla de Categorías de Productos
CREATE TABLE IF NOT EXISTS Categorias (
    ID_Categoria INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Categoria VARCHAR(255) NOT NULL
);

-- Tabla de Proveedores
CREATE TABLE IF NOT EXISTS Proveedores (
    ID_Proveedor INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Proveedor VARCHAR(255) NOT NULL,
    Contacto VARCHAR(255),
    Direccion VARCHAR(255),
    Ciudad VARCHAR(255)
);

-- Tabla de Productos
CREATE TABLE IF NOT EXISTS Productos (
    ID_Producto INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL,
    codigo VARCHAR(100),
    stock INT ,
    precio_venta INT,
    Categoria_ID INT,
    FOREIGN KEY (Categoria_ID) REFERENCES Categorias(ID_Categoria)
    );



-- Tabla de Usuarios
CREATE TABLE IF NOT EXISTS Usuarios (
    ID_Usuario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Usuario VARCHAR(255) NOT NULL,
    Contraseña VARCHAR(255) NOT NULL,
    Rol VARCHAR(50) NOT NULL,
    Fecha_Creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



-- Tabla de Clientes
CREATE TABLE IF NOT EXISTS Clientes (
    ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_Cliente VARCHAR(255) NOT NULL,
    Telefono VARCHAR(50),
    Correo_Electronico VARCHAR(100),
    Direccion VARCHAR(255)
);

-- Tabla de Ventas
CREATE TABLE IF NOT EXISTS Ventas (
    ID_Venta INT AUTO_INCREMENT PRIMARY KEY,
    Fecha_Venta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Total int,
    Cliente_ID INT,
    FOREIGN KEY (Cliente_ID) REFERENCES Clientes(ID_Cliente)
);

CREATE TABLE IF NOT EXISTS Detalle_Ventas (
    ID_Detalle INT AUTO_INCREMENT PRIMARY KEY,
    Venta_ID INT,
    Producto_ID INT,
    Cantidad INT NOT NULL,
    Precio_Unitario int,
    FOREIGN KEY (Venta_ID) REFERENCES Ventas(ID_Venta),
    FOREIGN KEY (Producto_ID) REFERENCES Productos(ID_Producto)
);


-- Crear índices para mejorar el rendimiento
CREATE INDEX idx_producto_codigo ON Productos(Codigo_Producto);
CREATE INDEX idx_producto_nombre ON Productos(Nombre);
CREATE INDEX idx_movimiento_fecha ON Movimientos(Fecha_Movimiento)