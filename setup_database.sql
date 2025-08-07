-- Script SQL para crear usuario web y base de datos
-- Ejecuta este script en MySQL Workbench

-- 1. Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS control_tareas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- 2. Crear un usuario específico para la aplicación web
CREATE USER IF NOT EXISTS 'webuser'@'localhost' IDENTIFIED BY 'web123456';
CREATE USER IF NOT EXISTS 'webuser'@'127.0.0.1' IDENTIFIED BY 'web123456';

-- 3. Otorgar permisos completos sobre la base de datos control_tareas
GRANT ALL PRIVILEGES ON control_tareas.* TO 'webuser'@'localhost';
GRANT ALL PRIVILEGES ON control_tareas.* TO 'webuser'@'127.0.0.1';

-- 4. Aplicar cambios
FLUSH PRIVILEGES;

-- 5. Verificar que el usuario fue creado
SELECT User, Host FROM mysql.user WHERE User = 'webuser';

-- 6. Crear tablas básicas si no existen
USE control_tareas;

-- Tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    Id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla tareas
CREATE TABLE IF NOT EXISTS tareas (
    id_tarea INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT,
    estado ENUM('pendiente', 'en_proceso', 'completado', 'cancelada') DEFAULT 'pendiente',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(Id_usuario) ON DELETE SET NULL
);

-- Insertar algunos datos de prueba
INSERT IGNORE INTO usuarios (Id_usuario, Nombre, Email, Password) VALUES 
(1, 'Usuario Test', 'test@example.com', 'password123');

INSERT IGNORE INTO tareas (id_tarea, id_usuario, titulo, descripcion, estado) VALUES 
(1, 1, 'Tarea de prueba', 'Esta es una tarea de prueba para verificar la API', 'pendiente'),
(2, 1, 'Segunda tarea', 'Otra tarea de prueba', 'en_proceso');
