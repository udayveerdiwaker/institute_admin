CREATE DATABASE institute_db;
USE institute_db;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
 
    date DATE
);


CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course VARCHAR(100) NOT NULL,
  duration VARCHAR(50) NOT NULL,
  fee DECIMAL(10,2) NOT NULL,
  date DATE
);
