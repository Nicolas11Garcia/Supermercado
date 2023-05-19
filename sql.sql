CREATE DATABASE supermercadooficial;

USE supermercadooficial;

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

INSERT INTO categorias VALUES (NULL,'Supermercado');
INSERT INTO categorias VALUES (NULL,'Lacteos');
INSERT INTO categorias VALUES (NULL,'Despensa');
INSERT INTO categorias VALUES (NULL,'Frutasyverduras');
INSERT INTO categorias VALUES (NULL,'Limpieza');
INSERT INTO categorias VALUES (NULL,'Carnicería');
INSERT INTO categorias VALUES (NULL,'Botilleria');
INSERT INTO categorias VALUES (NULL,'Hogar');



CREATE TABLE sub_categorias (
    id INT AUTO_INCREMENT,
    fk_categorias_id INT,
    descripcion VARCHAR(90),

    PRIMARY KEY (id),
    FOREIGN KEY (fk_categorias_id) REFERENCES categorias(id)
);

INSERT INTO sub_categorias VALUES (NULL,1,'Congelados');
INSERT INTO sub_categorias VALUES (NULL,1,'Desayuno Y Dulces');
INSERT INTO sub_categorias VALUES (NULL,7,'Bebidas');
INSERT INTO sub_categorias VALUES (NULL,7,'Jugos');


CREATE TABLE sub_sub_categorias (
    id INT AUTO_INCREMENT,
    fk_categorias_id INT,
    fk_sub_categorias_id INT,
    descripcion VARCHAR(90),

    PRIMARY KEY (id),
    FOREIGN KEY (fk_sub_categorias_id) REFERENCES sub_categorias(id),
    FOREIGN KEY (fk_categorias_id) REFERENCES categorias(id)

);

INSERT INTO sub_sub_categorias VALUES (NULL,1,1,'Helados y Postres');
INSERT INTO sub_sub_categorias VALUES (NULL,1,1,'Verduras Congeladas');
INSERT INTO sub_sub_categorias VALUES (NULL,7,3,'Bebidas Light o Zero Azúcar');
INSERT INTO sub_sub_categorias VALUES (NULL,7,3,'Bebidas Regulares');




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
INSERT INTO marcas VALUES (NULL,'Sahne Nuss');
INSERT INTO marcas VALUES (NULL,'Kuchenmeister');
INSERT INTO marcas VALUES (NULL,'Pulmahue');

INSERT INTO marcas VALUES (NULL,'Kraft');





CREATE TABLE productos(
    id INT AUTO_INCREMENT,
    titulo VARCHAR(130),

    fk_marca_id INT,

    fk_categorias_id INT,
    fk_sub_categoria_id INT,
    fk_sub_sub_categoria_id INT,

    precioventa INT,
    preciooferta INT,
    stockcomprado INT,
    stock_actual INT,
    informaciondelproducto VARCHAR(1200),
    imagen VARCHAR(60),
    activo BIT,
    visible BIT,
    oferta BIT,

    PRIMARY KEY (id),
    FOREIGN KEY (fk_marca_id) REFERENCES marcas(id),
    FOREIGN KEY (fk_categorias_id) REFERENCES categorias(id),
    FOREIGN KEY (fk_sub_categoria_id) REFERENCES sub_categorias(id),
    FOREIGN KEY (fk_sub_sub_categoria_id) REFERENCES sub_sub_categorias(id)
);


INSERT INTO productos VALUES (NULL,'Queso de cabra ahumado 250 g',1,1,1,1,7990,5990,20,20,'','1.jpg',1,1,1);
INSERT INTO productos VALUES (NULL,'Café Jacobs Kronung Liofilizado, 100 g',2,1,1,1,4990,2990,20,20,'','2.jpg',1,1,1);
INSERT INTO productos VALUES (NULL,'Papel Higiénico Scott Rindemax 25 m 8 un.',3,1,1,1,6390,4290,20,20,'','3.jpg',1,1,1);
INSERT INTO productos VALUES (NULL,'Bebida Energética Red Bull 250 ml',4,1,1,1,1590,1390,20,20,'','4.jpg',1,1,1);
INSERT INTO productos VALUES (NULL,'Jamón serrano 100 g',5,1,1,1,5990,3990,20,20,'','5.jpg',1,1,1);
INSERT INTO productos VALUES (NULL,'Aceite maravilla 900 ml',6,1,1,1,4290,3290,20,20,'','6.jpg',1,1,1);

INSERT INTO productos VALUES (NULL,'Torta panqueque naranja 15 porciones',6,2,2,1,15990,0,20,20,'','7.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Chocolate Sahne Nuss Barra 250 g',7,2,2,1,4990,0,20,20,'','8.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Torta Amor 15 porciones',7,2,2,1,13990,0,20,20,'','9.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Queque Marmolado Kuchenmeister 400 g',8,2,2,1,3100,0,20,20,'','10.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Magdalenas sabor vainilla 6 un.',9,2,2,1,1790,0,20,20,'','11.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Mini quequitos chips de chocolate 225 g',9,2,2,1,2090,0,20,20,'','12.jpg',1,1,0);

INSERT INTO productos VALUES (NULL,'Mayonesa Kraft pote 1.26 kg',10,3,2,1,9299,0,20,20,'','13.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Mayonesa 850 g',10,3,2,1,3590,0,20,20,'','14.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Mayonesa light 896 g',10,3,2,1,6090,0,20,20,'','15.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Mayonesa 582 g',10,3,2,1,6399,0,20,20,'','16.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Ketchup 900 g',10,3,2,1,2790,0,20,20,'','17.jpg',1,1,0);
INSERT INTO productos VALUES (NULL,'Ketchup 567 g',10,3,2,1,3650,0,20,20,'','18.jpg',1,1,0);



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



CREATE TABLE boleta(
    id INT AUTO_INCREMENT,
    fk_cliente_fk INT,
    total INT,
    fecha DATETIME,

    PRIMARY KEY (id),
    FOREIGN KEY (fk_cliente_fk) REFERENCES usuarios(id)
);

CREATE TABLE detalle_boleta(
    id INT AUTO_INCREMENT,
    fk_boleta_id INT,
    producto_id_fk INT,
    precio INT,
    cantidad INT,

    PRIMARY KEY (id),
    FOREIGN KEY (fk_boleta_id) REFERENCES boleta(id),
    FOREIGN KEY (producto_id_fk) REFERENCES productos(id)
);

CREATE TABLE productos_detalle_boleta_temporal(
    id INT AUTO_INCREMENT,
    producto_id_fk INT,
    precio INT,
    rut VARCHAR(25),
    oferta INT,

    PRIMARY KEY (id),
    FOREIGN KEY (producto_id_fk) REFERENCES productos(id)
);





CREATE TABLE reporte (
    id INT AUTO_INCREMENT,
    producto_id_fk INT,
    tipo_reporte VARCHAR(120),
    motivo VARCHAR(300),
    estado VARCHAR (100),
    fecha DATETIME,
    fk_usuario_id INT,

    PRIMARY KEY (id),
    FOREIGN KEY (producto_id_fk) REFERENCES productos(id),
    FOREIGN KEY (fk_usuario_id) REFERENCES usuarios(id)
);


CREATE TABLE cajas (
    id INT AUTO_INCREMENT,
    estado VARCHAR(100),

    PRIMARY KEY (id)
);

INSERT INTO cajas VALUES(NULL,'Disponible');
INSERT INTO cajas VALUES(NULL,'Disponible');
INSERT INTO cajas VALUES(NULL,'Ocupada');
INSERT INTO cajas VALUES(NULL,'Disponible');
INSERT INTO cajas VALUES(NULL,'Disponible');
INSERT INTO cajas VALUES(NULL,'Ocupada');
INSERT INTO cajas VALUES(NULL,'Disponible');
INSERT INTO cajas VALUES(NULL,'Disponible');
INSERT INTO cajas VALUES(NULL,'Fuera de servicio');
INSERT INTO cajas VALUES(NULL,'Fuera de servicio');



CREATE TABLE oferta_1_producto (
    id INT AUTO_INCREMENT,
    producto_id_fk INT,
    cantidad INT,
    porcentaje INT,

    PRIMARY KEY (id),
    FOREIGN KEY (producto_id_fk) REFERENCES productos(id)

);

CREATE TABLE oferta_2_producto (
    id INT AUTO_INCREMENT,
    producto_id_fk_1 INT,
    producto_id_fk_2 INT,
    porcentaje INT,

    PRIMARY KEY (id),
    FOREIGN KEY (producto_id_fk_1) REFERENCES productos(id),
    FOREIGN KEY (producto_id_fk_2) REFERENCES productos(id)

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






SELECT productos.id AS 'id_producto', productos.titulo, marcas.descripcion AS 'marca', 
productos_detalle_boleta_temporal.precio ,productos.informaciondelproducto,productos.imagen,
productos.activo,productos.oferta
FROM productos_detalle_boleta_temporal 
INNER JOIN productos on productos.id = productos_detalle_boleta_temporal.producto_id_fk 
INNER JOIN marcas on marcas.id = productos.fk_marca_id
WHERE productos_detalle_boleta_temporal.rut = $rut;
