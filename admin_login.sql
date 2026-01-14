-- CREATE TABLE admin_users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(100) NOT NULL,
--     password VARCHAR(255) NOT NULL
-- );

-- CREATE TABLE admin_users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(255) NOT NULL,
--     password VARCHAR(255) NOT NULL,
--     role ENUM('student','exam_admin','exam_user') NOT NULL DEFAULT 'student'
-- );
-- ADD COLUMN username VARCHAR(255) NOT NULL,
-- ADD COLUMN password VARCHAR(255) NOT NULL,
-- ADD COLUMN role ENUM('student','exam_admin','exam_user') NOT NULL DEFAULT 'student';


-- INSERT INTO admin_users (username, password)
-- VALUES ('website', SHA2('websitebanaye', 256));
-- INSERT INTO admin_users (username, password, role)
-- VALUES
-- ('admin', SHA2('admin123',256), 'exam_admin'),
-- ('website', SHA2('websitebanaye',256), 'student'),
-- ('user', SHA2('user123',256), 'exam_user');

INSERT INTO admin_users (username,password,role)
VALUES 
('admin', SHA2('admin123',256), 'exam_admin'),
('user', SHA2('user123',256), 'exam_user');