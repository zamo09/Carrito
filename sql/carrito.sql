CREATE DATABASE carrito;
	use carrito;

CREATE TABLE Categoria(
	id_categoria INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
	nombre VARCHAR(255) COMMENT 'Nombre de la categoria',
	activo BOOLEAN COMMENT 'Estado de la categoria',
	temporada VARCHAR(100) COMMENT 'Tiempo de venta',
	PRIMARY KEY (id_categoria)
);

CREATE TABLE Producto(
	id_producto INT NOT NULL COMMENT 'Clave Primaria',
	nombre VARCHAR(255) NOT NULL COMMENT 'Nombre del producto',
	precio float NOT NULL COMMENT 'Precio del producto con dos ',
	id_categoria INT NOT NULL COMMENT 'Llave referencial a categoria',
	cantidad_max INT COMMENT 'Cantidad maxima de productos', 
	cantidad_min INT COMMENT 'Cantidad minima de productos', 
	cantidad_rea INT NOT NULL COMMENT 'Cantidad Real de productos',
	activo BOOLEAN NOT NULL COMMENT 'Estadp del producto',
	PRIMARY KEY (id_producto),
	FOREIGN KEY (id_categoria) REFERENCES Categoria (id_categoria)
);

CREATE TABLE Cotizacion(
	id_cotizacion INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
	correo VARCHAR(255) NOT NULL COMMENT 'Correo de contacto con el cliente',
	telefono INT NOT NULL COMMENT 'Telefono de contacto con el cliente',
	fecha DATE NOT NULL COMMENT 'Fecha en la que se realizo la cotizacion',
	estado BOOLEAN NOT NULL COMMENT 'Estado en el que se encuentra la cotizacion',
	PRIMARY KEY (id_cotizacion)
);

CREATE TABLE Carrito(
	id_carrito INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
	id_producto  INT NOT NULL COMMENT 'Llave foranea a producto',
	cantidad INT NOT NULL COMMENT 'cantidad de prodcutos',
	id_cotizacion INT NOT NULL COMMENT 'Llave foranea a cotizacion',
	PRIMARY KEY (id_carrito),
	FOREIGN KEY (id_producto) REFERENCES Producto (id_producto),
	FOREIGN KEY (id_cotizacion) REFERENCES Cotizacion (id_cotizacion)
);
-- Inserts de Categoria -- 
INSERT INTO Categoria (nombre,activo,temporada) VALUES ('Latas',1,'N');
INSERT INTO Categoria (nombre,activo,temporada) VALUES ('Contenedores',1,'N');
INSERT INTO Categoria (nombre,activo,temporada) VALUES ('Vinos',1,'N');
INSERT INTO Categoria (nombre,activo,temporada) VALUES ('Licores',1,'N');
INSERT INTO Categoria (nombre,activo,temporada) VALUES ('Cafes',1,'N');
INSERT INTO Categoria (nombre,activo,temporada) VALUES ('Moños',1,'N');

-- Inserts de Productos --
INSERT INTO Producto (id_producto,nombre,precio,id_categoria,cantidad_max,cantidad_min,cantidad_rea,activo) VALUES (548565,'Arcon Mediano',100.50,2,100,5,80,1);
INSERT INTO Producto (id_producto,nombre,precio,id_categoria,cantidad_max,cantidad_min,cantidad_rea,activo) VALUES (124859,'Arcon Grande',100.50,2,100,5,80,1);
INSERT INTO Producto (id_producto,nombre,precio,id_categoria,cantidad_max,cantidad_min,cantidad_rea,activo) VALUES (148795,'Atun',35.50,1,100,5,80,1);
INSERT INTO Producto (id_producto,nombre,precio,id_categoria,cantidad_max,cantidad_min,cantidad_rea,activo) VALUES (465892,'Cafe Lavado 500Gr',77.50,5,100,5,80,1);
INSERT INTO Producto (id_producto,nombre,precio,id_categoria,cantidad_max,cantidad_min,cantidad_rea,activo) VALUES (329865,'Moño grande',35,6,100,5,80,1);
INSERT INTO Producto (id_producto,nombre,precio,id_categoria,cantidad_max,cantidad_min,cantidad_rea,activo) VALUES (147859,'Vino Don Simon',250.50,3,100,5,80,1);
INSERT INTO Producto (id_producto,nombre,precio,id_categoria,cantidad_max,cantidad_min,cantidad_rea,activo) VALUES (125485,'Etiqueta Roja',350.50,4,100,5,80,1);