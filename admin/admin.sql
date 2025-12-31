-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(100),
--     username VARCHAR(50),
--     password VARCHAR(255),
--     role ENUM('admin','student') NOT NULL
-- );

-- CREATE TABLE student (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT,
--     roll_no VARCHAR(50),
--     photo VARCHAR(200),
--     FOREIGN KEY (user_id) REFERENCES users(id)
-- );


-- CREATE TABLE exams (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     exam_name VARCHAR(100),
--     duration INT,
--     total_marks INT
-- );

-- CREATE TABLE questions (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     exam_id INT,
--     question TEXT,
--     option_a VARCHAR(200),
--     option_b VARCHAR(200),
--     option_c VARCHAR(200),
--     option_d VARCHAR(200),
--     correct_option CHAR(1),
--     FOREIGN KEY (exam_id) REFERENCES exams(id)
-- );

-- CREATE TABLE results (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     student_id INT,
--     exam_id INT,
--     score INT,
--     exam_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );
 

 INSERT INTO users (name, username, password, role)
VALUES ('Admin', 'admin', MD5('admin123'), 'admin');
