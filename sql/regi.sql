ALTER TABLE registered_user
ADD COLUMN exam_id INT DEFAULT 1;
CREATE TABLE exams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exam_name VARCHAR(100)
);
INSERT INTO exams (exam_name)
VALUES 
('CCC'),
('Web Design'),
('PHP'),
('Python'),
('Tally');
