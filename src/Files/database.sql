CREATE DATABASE IF NOT EXISTS youdemy;
USE youdemy;

CREATE TABLE IF NOT EXISTS roles (
    idRole INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    idUser INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    status ENUM('active', 'suspended', 'inactive') DEFAULT 'inactive',
    idRole INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idRole) REFERENCES roles(idRole)
);

CREATE TABLE IF NOT EXISTS categories (
    idCategory INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS tags (
    idTag INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS courses (
    idCourse INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content VARCHAR(255),
    video VARCHAR(255),
    image VARCHAR(200),
    idCategory INT,
    idUser INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idCategory) REFERENCES categories(idCategory),
    FOREIGN KEY (idUser) REFERENCES users(idUser)
);

CREATE TABLE IF NOT EXISTS course_tags (
    idCourse INT,
    idTag INT,
    PRIMARY KEY (idCourse, idTag),
    FOREIGN KEY (idCourse) REFERENCES courses(idCourse) ON DELETE CASCADE,
    FOREIGN KEY (idTag) REFERENCES tags(idTag) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS enrollments (
    idEnrollment INT AUTO_INCREMENT PRIMARY KEY,
    idUser INT,
    idCourse INT,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idUser) REFERENCES users(idUser),
    FOREIGN KEY (idCourse) REFERENCES courses(idCourse)
);

