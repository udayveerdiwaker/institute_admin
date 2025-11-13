-- CREATE DATABASE institute_db;
-- USE institute_db;

-- CREATE TABLE students (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(100),
--     course VARCHAR(100),
--     fee DECIMAL(10,2),
--     date DATE
-- );


-- CREATE TABLE courses (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   name VARCHAR(100) NOT NULL,
--   duration VARCHAR(50) NOT NULL,
--   fee DECIMAL(10,2) NOT NULL
-- );
ALTER TABLE courses 
ADD COLUMN duration VARCHAR(100) AFTER course,
ADD COLUMN fees DECIMAL(10,2) AFTER duration;
