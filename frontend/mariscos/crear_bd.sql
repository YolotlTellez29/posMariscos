CREATE DATABASE IF NOT EXISTS restaurante;
USE restaurante;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    correo VARCHAR(100) UNIQUE,
    contrasena VARCHAR(255),
    tipo ENUM('administrador', 'cajero')
);
