-- -------------------------------------------------------
-- Base de datos: Tareas
-- -------------------------------------------------------
CREATE DATABASE IF NOT EXISTS Tareas
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE Tareas;

-- -------------------------------------------------------
-- 1) Tabla Usuarios
-- -------------------------------------------------------
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreUsuario VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  nivel INT DEFAULT 2, 
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- -------------------------------------------------------
-- 2) Tabla Tareas
-- -------------------------------------------------------
CREATE TABLE tareas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(150) NOT NULL,
  descripcion TEXT,
  idUsuario INT NOT NULL,
  fechaCreacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  CONSTRAINT fk_tareas_usuarios
    FOREIGN KEY (idUsuario) REFERENCES usuarios(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -------------------------------------------------------
-- Datos de prueba
-- -------------------------------------------------------

-- Usuarios
INSERT INTO usuarios (nombreUsuario, email, password) VALUES
('admin', 'admin@tareas.com', '$2y$10$.VnwTWjGXjt.hMqvC3dGFu17vslwsV6PNi.q7bWWTkUlrmnc1CCCi'),
('juan',  'juan@ejemplo.com', '$2y$10$.VnwTWjGXjt.hMqvC3dGFu17vslwsV6PNi.q7bWWTkUlrmnc1CCCi');

-- Tareas (1 = admin, 2 = juan)
INSERT INTO tareas (titulo, descripcion, idUsuario) VALUES
('Preparar reunión', 'Organizar puntos para la reunión semanal.', 1),
('Responder emails', 'Contestar correos pendientes.', 1),
('Estudiar MVC', 'Repasar modelos, vistas y controladores.', 2),
('Hacer ejercicio', 'Salir a correr 30 minutos.', 2);