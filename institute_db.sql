-- CREATE TABLE courses (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   course VARCHAR(100) NOT NULL,
--   duration VARCHAR(50) NOT NULL,
--   fees DECIMAL(10,2) NOT NULL,
--   date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

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


-- CREATE TABLE students (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     student_name VARCHAR(255),
--     father_name VARCHAR(255),
--     dob DATE,
--     qualification VARCHAR(255),
--     photo VARCHAR(255),
--     course_id INT,
--     batch_time VARCHAR(100),
--     duration VARCHAR(100),
--     admission_date DATE,
--     address TEXT,
--     phone VARCHAR(20),
--     email VARCHAR(100),
--     extra_note TEXT,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );




-- CREATE TABLE student_fees (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     student_id INT,
--     course_id INT,
--     total_fee DECIMAL(10,2),
--     paid_amount DECIMAL(10,2),
--     remaining DECIMAL(10,2),
--     payment_mode VARCHAR(50),
--     remarks TEXT,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- ALTER TABLE student_fees 
-- ADD fees_prev DECIMAL(10,2) DEFAULT 0 AFTER paid_amount;

-- ALTER TABLE student_fees 
-- ADD prev_fee DECIMAL(10,2) DEFAULT 0 AFTER paid_amount;


ALTER TABLE student_fees 
ADD COLUMN discount DECIMAL(10,2) DEFAULT 0;
