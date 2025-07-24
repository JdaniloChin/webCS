CREATE DATABASE IF NOT EXISTS control_tareas;
USE control_tareas;

DROP TABLE usuarios;
CREATE TABLE usuarios (
Id_usuario INT AUTO_INCREMENT PRIMARY KEY,
Nombre VARCHAR(200) NOT NULL,
Email VARCHAR(100) NOT NULL,
Fecha_Nacimiento DATE NOT NULL,
Contrasenia VARCHAR(200) NOT NULL
);

SELECT * FROM usuarios;
delete from usuarios where id_usuario in (2,3);

CREATE TABLE tareas(
id_tarea int auto_increment primary key,
id_usuario int null,
estado varchar(50) not null,
titulo varchar(150) not null,
descripcion varchar(3000) null,
foreign key(id_usuario) references usuarios(Id_usuario)
);

select * from tareas;