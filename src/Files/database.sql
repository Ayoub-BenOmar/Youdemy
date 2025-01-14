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
    role_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(idRole)
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
    content VARCHAR(255), -- URL or path to document/video
    category_id INT,
    instructor_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(idCategory),
    FOREIGN KEY (instructor_id) REFERENCES users(idUser)
);

CREATE TABLE IF NOT EXISTS course_tags (
    course_id INT,
    tag_id INT,
    PRIMARY KEY (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES courses(idCourse) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(idTag) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS enrollments (
    idEnrollment INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    course_id INT,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(idUser),
    FOREIGN KEY (course_id) REFERENCES courses(idCourse)
);

