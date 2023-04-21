CREATE DATABASE supermercado;

USE supermercado;

-- TABLAS


CREATE TABLE rol(
    id INT AUTO_INCREMENT,
    descripcion VARCHAR(100),

    PRIMARY KEY (id)
);



INSERT INTO rol VALUES(NULL,'Cliente');
INSERT INTO rol VALUES(NULL,'Admin');
INSERT INTO rol VALUES(NULL,'Cajero');
INSERT INTO rol VALUES(NULL,'Encargado de stock');



CREATE TABLE usuarios(
    id INT AUTO_INCREMENT,
    rut VARCHAR(25),
    correo VARCHAR(80),
    nombre VARCHAR(40),
    apellido VARCHAR(40),
    contraseña VARCHAR(260),
   
    fk_rol_id INT,
    
    PRIMARY KEY (id),
    FOREIGN KEY (fk_rol_id) REFERENCES rol(id)
);

INSERT INTO usuarios VALUES (0,NULL,NULL,NULL,NULL,NULL,NULL);




CREATE TABLE categorias (
    id INT AUTO_INCREMENT,
    descripcion VARCHAR(130),        

    PRIMARY KEY (id)

);

INSERT INTO `categorias`(`id`, `descripcion`) VALUES (NULL,'Cervezas');
INSERT INTO `categorias`(`id`, `descripcion`) VALUES (NULL,'Promocion');
INSERT INTO `categorias`(`id`, `descripcion`) VALUES (NULL,'Destilados');
INSERT INTO `categorias`(`id`, `descripcion`) VALUES (NULL,'Vinos y espumantes');
INSERT INTO `categorias`(`id`, `descripcion`) VALUES (NULL,'Bebidas');
INSERT INTO `categorias`(`id`, `descripcion`) VALUES (NULL,'Licores');


CREATE TABLE marcas (
    id INT AUTO_INCREMENT,
    descripcion VARCHAR(50),

    PRIMARY KEY (id)
);

INSERT INTO marcas VALUES (NULL,'Arisan');
INSERT INTO marcas VALUES (NULL,'Jacobs');
INSERT INTO marcas VALUES (NULL,'Scott');
INSERT INTO marcas VALUES (NULL,'Red Bull');
INSERT INTO marcas VALUES (NULL,'Receta del abuelo');
INSERT INTO marcas VALUES (NULL,'Cuisine & Co');



CREATE TABLE productos (
    id INT AUTO_INCREMENT,
    titulo VARCHAR(130),
    fk_marca_id INT,
    fk_categoria_id INT, 
    precioventa INT,
    preciooferta INT,
    stockcomprado INT,
    stock_actual INT,
    informaciondelproducto VARCHAR(1200),
    imagen VARCHAR(60),
    activo BIT,
    oferta BIT,

    PRIMARY KEY (id),
    FOREIGN KEY (fk_categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (fk_marca_id) REFERENCES marcas(id)
);


INSERT INTO productos VALUES (NULL,'Queso de cabra ahumado 250 g',1,1,7990,5990,20,20,'','1.jpg',1,1);
INSERT INTO productos VALUES (NULL,'Café Jacobs Kronung Liofilizado, 100 g',2,1,4990,2990,20,20,'','2.jpg',1,1);
INSERT INTO productos VALUES (NULL,'Papel Higiénico Scott Rindemax 25 m 8 un.',3,1,6390,4290,20,20,'','3.jpg',1,1);
INSERT INTO productos VALUES (NULL,'Bebida Energética Red Bull 250 ml',4,1,1590,1390,20,20,'','4.jpg',1,1);
INSERT INTO productos VALUES (NULL,'Jamón serrano 100 g',5,1,5990,3990,20,20,'','5.jpg',1,1);
INSERT INTO productos VALUES (NULL,'Aceite maravilla 900 ml',6,1,4290,3290,20,20,'','6.jpg',1,1);



CREATE TABLE carrito_usuarios(
    id_cliente_fk INT,
    id_producto_fk INT,
    cantidad INT,

    FOREIGN KEY (id_cliente_fk) REFERENCES usuarios(id),
    FOREIGN KEY (id_producto_fk) REFERENCES productos(id)
);


CREATE TABLE orden(
    id INT AUTO_INCREMENT,
    fk_cliente_fk INT,

    fecha DATETIME,

    correo VARCHAR(250),
    nombre VARCHAR(200),
    apellido VARCHAR(200),
    rut VARCHAR(130),
    telefono VARCHAR(130),


    region VARCHAR(200),
    comuna VARCHAR(200),
    calle VARCHAR(200),
    numero VARCHAR(200),
    total INT,

    estado VARCHAR(130),

    PRIMARY KEY (id),
    FOREIGN KEY (fk_cliente_fk) REFERENCES usuarios(id)

);
ALTER TABLE orden AUTO_INCREMENT = 1000;


CREATE TABLE detalle(
    id INT AUTO_INCREMENT,
    fk_orden_fk INT,
    producto_id_fk INT,
    precio INT,
    cantidad INT,

    PRIMARY KEY (id),
    FOREIGN KEY (fk_orden_fk) REFERENCES orden(id),
    FOREIGN KEY (producto_id_fk) REFERENCES productos(id)
);










/*VER PRODUDCTOS*/

SELECT productos.id, productos.titulo, marcas.descripcion AS 'Marca', categorias.descripcion AS 'categoria',
productos.precioventa,productos.oferta,productos.stockcomprado,productos.stock_actual,productos.informaciondelproducto,
productos.imagen,productos.activo,productos.oferta
FROM productos 
INNER JOIN categorias on categorias.id = productos.fk_categoria_id 
INNER JOIN marcas on marcas.id = productos.fk_marca_id

ORDER BY id DESC;



/*VER ITEMS CARRITO*/

SELECT productos.id AS 'id_producto', productos.titulo, marcas.descripcion AS 'Marca', productos.precioventa,productos.preciooferta,productos.informaciondelproducto,productos.imagen,productos.activo,productos.oferta,carrito_usuarios.cantidad AS 'cantidad_en_carrito' FROM carrito_usuarios INNER JOIN productos on productos.id = carrito_usuarios.id_producto_fk INNER JOIN marcas on marcas.id = productos.fk_marca_id 
WHERE id_cliente_fk = 3;
