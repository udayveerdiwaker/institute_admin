-- CREATE DATABASE IF NOT EXISTS institute_db;
-- USE institute_db;

--------------------------------------------------------
-- COURSES TABLE
--------------------------------------------------------
CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course VARCHAR(100) NOT NULL,
  duration VARCHAR(50) NOT NULL,
  fees DECIMAL(10,2) NOT NULL,
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ------------------------------------------------------
-- STUDENTS TABLE
-- ------------------------------------------------------
-- CREATE TABLE students (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   name VARCHAR(100) NOT NULL,
--   course INT NOT NULL,
--   duration VARCHAR(50) NOT NULL,
--   fee DECIMAL(10,2) NOT NULL,
--   date DATE NOT NULL,
--   mobile VARCHAR(15),
--   address TEXT
-- );

--------------------------------------------------------
-- STUDENT FEES TABLE
--------------------------------------------------------
-- CREATE TABLE student_fees (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   student_id INT NOT NULL,
--   course_id INT NOT NULL,
--   total_fee DECIMAL(10,2) NOT NULL,
--   paid_amount DECIMAL(10,2) DEFAULT 0,
--   remaining_amount DECIMAL(10,2) GENERATED ALWAYS AS (total_fee - paid_amount) STORED,
--   payment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
--   payment_mode VARCHAR(50) DEFAULT 'Cash',
--   remarks TEXT
-- );

--------------------------------------------------------
-- FOREIGN KEYS (OPTIONAL)
--------------------------------------------------------
-- ALTER TABLE students 
-- ADD CONSTRAINT fk_course FOREIGN KEY (course) REFERENCES courses(id);

-- ALTER TABLE student_fees
-- ADD CONSTRAINT fk_student FOREIGN KEY (student_id) REFERENCES students(id),
-- ADD CONSTRAINT fk_course_fee FOREIGN KEY (course_id) REFERENCES courses(id);
