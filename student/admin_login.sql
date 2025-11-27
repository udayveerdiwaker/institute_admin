-- CREATE TABLE admin_users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(100) NOT NULL,
--     password VARCHAR(255) NOT NULL
-- );

INSERT INTO admin_users (username, password)
VALUES ('website', SHA2('websitebanye', 256));
