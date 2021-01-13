
CREATE TABLE Juegos (
                idJuego INT NOT NULL,
                Plataforma INT NOT NULL,
                Genero INT NOT NULL,
                tiempoEntrega VARCHAR(40) NOT NULL,
                descripcion VARCHAR(500) NOT NULL,
                precio DOUBLE NOT NULL,
                estado INT NOT NULL,
				imagen VARCHAR(200) NOT NULL,
                PRIMARY KEY (idJuego)
);


CREATE TABLE paqueteria (
                idPaqueteria INT NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                tipoEnvio INT NOT NULL,
                costoEnvio DOUBLE NOT NULL,
                PRIMARY KEY (idPaqueteria)
);


CREATE TABLE Usuario (
                idUsuario INT NOT NULL,
                passwords VARCHAR(10) NOT NULL,
                nombre VARCHAR(40) NOT NULL,
                apellidoPaterno VARCHAR(40) NOT NULL,
                apellidoMaterno VARCHAR(40) NOT NULL,
                tipoUsuario INT NOT NULL,
                PRIMARY KEY (idUsuario)
);


CREATE TABLE Administrador (
                idUsuario INT NOT NULL,
                Correo VARCHAR(20) NOT NULL,
                PRIMARY KEY (idUsuario)
);


CREATE TABLE Cliente (
                idUsuario INT NOT NULL,
                nombreTienda VARCHAR(30) NOT NULL,
                telCelular NUMERIC(10),
                correo VARCHAR(100) NOT NULL,
                PRIMARY KEY (idUsuario)
);


CREATE TABLE Compra (
                idCompra INT NOT NULL,
                dirPedido VARCHAR(100) NOT NULL,
                idPaqueteria INT NOT NULL,
                costoTotal DOUBLE NOT NULL,
                fechaEntrega DATE NOT NULL,
                tipoPago INT NOT NULL,
                idUsuario INT NOT NULL,
                PRIMARY KEY (idCompra)
);


CREATE TABLE Detalles (
                idDetallesCompra INT NOT NULL,
                idJuego INT NOT NULL,
                cantidad INT NOT NULL,
                total DOUBLE NOT NULL,
                idCompra INT NOT NULL,
                PRIMARY KEY (idDetallesCompra)
);


ALTER TABLE Detalles ADD CONSTRAINT juegos_detalles_fk
FOREIGN KEY (idJuego)
REFERENCES Juegos (idJuego);

ALTER TABLE Compra ADD CONSTRAINT paqueteria_compra_fk
FOREIGN KEY (idPaqueteria)
REFERENCES paqueteria (idPaqueteria);

ALTER TABLE Cliente ADD CONSTRAINT usuario_cliente_fk
FOREIGN KEY (idUsuario)
REFERENCES Usuario (idUsuario);

ALTER TABLE Administrador ADD CONSTRAINT usuario_administrador_fk
FOREIGN KEY (idUsuario)
REFERENCES Usuario (idUsuario);

ALTER TABLE Compra ADD CONSTRAINT cliente_compra_fk
FOREIGN KEY (idUsuario)
REFERENCES Cliente (idUsuario);

ALTER TABLE Detalles ADD CONSTRAINT compra_detalles_fk
FOREIGN KEY (idCompra)
REFERENCES Compra (idCompra);

CREATE USER 'usuariotienda'@'localhost' IDENTIFIED BY 'tienda1'; 
GRANT select, insert, delete, update ON Usuario TO 'usuariotienda'@'localhost';
GRANT select, insert, delete, update ON Juegos TO 'usuariotienda'@'localhost';
GRANT select, insert, delete, update ON Administrador TO 'usuariotienda'@'localhost';
GRANT select, insert, delete, update ON Cliente TO 'usuariotienda'@'localhost';
GRANT select, insert, delete, update ON paqueteria TO 'usuariotienda'@'localhost';
GRANT select, insert, delete, update ON Compra TO 'usuariotienda'@'localhost';
GRANT select, insert, delete, update ON Detalles TO 'usuariotienda'@'localhost';



insert into Juegos(idJuego, Plataforma, Genero,  tiempoEntrega, descripcion, precio, estado, imagen) values ('1', '2', '2',  '1 semana', 'The Last Of Us Remastered','399.00', '0', '<img src= media/p1.jpg >');
insert into Juegos(idJuego, Plataforma, Genero,  tiempoEntrega, descripcion, precio, estado, imagen) values ('2', '2', '2',  '2 semanas', 'The Last Of Us Part II', '1500.00', '0','<img src= media/p2.jpg >');
insert into Juegos(idJuego, Plataforma, Genero,  tiempoEntrega, descripcion, precio, estado, imagen) values ('3', '2', '2',  '3 semanas', 'Marvels Spider - Man: Game Of The Year Edition', '799.00', '0','<img src= media/p3.jpg >');
insert into Juegos(idJuego, Plataforma, Genero,  tiempoEntrega, descripcion, precio, estado, imagen) values ('4', '2', '2',  '1 semana', 'Marvels Spider - Man: Miles Morales', '1488.00', '0','<img src= media/p4.jpg >');
insert into Juegos(idJuego, Plataforma, Genero,  tiempoEntrega, descripcion, precio, estado, imagen) values ('5', '2', '2',  '2 semanas', 'God Of War', '399.00', '0','<img src= media/p5.jpg >');
insert into Juegos(idJuego, Plataforma, Genero,  tiempoEntrega, descripcion, precio, estado, imagen) values ('6', '2', '5',  '2 semanas', 'Final Fantasy VII Remake', '999.00', '0','<img src= media/p6.jpg >');
insert into Juegos(idJuego, Plataforma, Genero,  tiempoEntrega, descripcion, precio, estado, imagen) values ('7', '2', '3',  '2 semanas', 'Outlast', '299.00', '0','<img src= media/p7.jpg >');





insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('8', '3', '1',  '1 semana', 'Halo: The Master Chief Collection','499.00', '0','<img src= media/x1.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('9', '3', '4',  '2 semanas', 'Gears Tactics', '699.00', '0','<img src= media/x2.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('10', '3', '2',  '3 semanas', 'Gears Of War: Ultimate Collection', '799.00', '0','<img src= media/x3.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('11', '3', '2',  '1 semana', 'Gears 5', '999.00', '0','<img src= media/x4.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('12', '3', '4',  '2 semanas', 'Minecraft Dungeons', '999.00', '0','<img src= media/x5.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('13', '3', '5',  '2 semanas', 'Borderlands 3', '799.00', '0','<img src= media/x6.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('14', '3', '3',  '2 semanas', 'Resident Evil 7 biohazard: Gold Edition', '499.00', '0','<img src= media/x7.jpg >');




insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('15', '1', '1',  '1 semana', 'The Legend Of Zelda: Links Awakening','1900.00', '0','<img src= media/s1.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('16', '1', '2',  '2 semanas', 'The Legend of Zelda: Breath Of The Wild', '1500.00', '0','<img src= media/s2.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('17', '1', '3',  '3 semanas', 'Pokémon: Lets Go Evee!', '1799.00', '0','<img src= media/s3.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('18', '1', '4',  '1 semana', 'Super Smash Bros Ultimate ', '1899.00', '0','<img src= media/s4.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('19', '1', '5',  '2 semanas', 'Super Mario Oddysey', '1899.00', '0','<img src= media/s5.jpg >');
insert into Juegos(idJuego, Plataforma,  Genero, tiempoEntrega, descripcion, precio, estado, imagen) values ('20', '1', '5',  '2 semanas', 'Dragon Quest XI: Definitive Edition S', '1799.00', '0','<img src= media/s6.jpg >');


insert into Usuario(idUsuario, nombre, apellidoPaterno, apellidoMaterno, passwords, tipoUsuario) values ('16011', 'Juan', 'Perez', 'Morales', 'perrito', '1');
insert into Usuario(idUsuario, nombre, apellidoPaterno, apellidoMaterno, passwords, tipoUsuario) values ('10010', 'Marco', 'Dominguez', 'Mendez', 'pistache', '2');
insert into Usuario(idUsuario, nombre, apellidoPaterno, apellidoMaterno, passwords, tipoUsuario) values ('13111', 'Roberto', 'Jimenez', 'Machado', 'lenteja', '1');

insert into Administrador(idUsuario, correo) values ('16011', 'Juancho@hotmail.com');
insert into Administrador(idUsuario,correo) values ('13111', 'Perrito@gmail.com');


insert into Cliente(idUsuario, nombreTienda, telCelular, correo) values ('10010', 'Marco Dominguez', '2721849850', 'marco@gmail.com');


