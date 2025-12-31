-- CREATE TABLE guests (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     guest_name VARCHAR(150),
--     phone VARCHAR(20),
--     address TEXT,
--     purpose VARCHAR(200),
--     visit_date DATE,
--     visit_time TIME,
--     comments TEXT,
--     attended_by VARCHAR(100),
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

ALTER TABLE guests
ADD COLUMN lead_type ENUM('Hot','Cold') NOT NULL AFTER purpose;
