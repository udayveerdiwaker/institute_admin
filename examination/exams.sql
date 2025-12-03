-- -- exams & questions
-- CREATE TABLE exams (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   title VARCHAR(255) NOT NULL,
--   course_id INT DEFAULT NULL,       -- link to courses table
--   total_marks INT DEFAULT 0,
--   duration_minutes INT DEFAULT 0,   -- exam length
--   start_at DATETIME NULL,
--   end_at DATETIME NULL,
--   pass_mark INT DEFAULT 0,
--   shuffle_questions TINYINT(1) DEFAULT 1,
--   allow_retake TINYINT(1) DEFAULT 0,
--   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- CREATE TABLE questions (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   exam_id INT NOT NULL,
--   question_text TEXT NOT NULL,
--   question_type ENUM('mcq_single','mcq_multi','short','long') DEFAULT 'mcq_single',
--   marks INT DEFAULT 1,
--   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   FOREIGN KEY (exam_id) REFERENCES exams(id) ON DELETE CASCADE
-- );

-- CREATE TABLE question_options (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   question_id INT NOT NULL,
--   option_text VARCHAR(500) NOT NULL,
--   is_correct TINYINT(1) DEFAULT 0,
--   FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
-- );

-- -- student attempts/submissions
-- CREATE TABLE exam_attempts (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   exam_id INT NOT NULL,
--   student_id INT NOT NULL,
--   started_at DATETIME,
--   submitted_at DATETIME,
--   status ENUM('in_progress','submitted','graded','cancelled') DEFAULT 'in_progress',
--   score DECIMAL(8,2) DEFAULT 0,
--   graded_by INT NULL,
--   graded_at DATETIME NULL,
--   UNIQUE(exam_id, student_id), -- one attempt per student (remove if multiple allowed)
--   FOREIGN KEY (exam_id) REFERENCES exams(id) ON DELETE CASCADE
-- );

-- CREATE TABLE answers (
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   attempt_id INT NOT NULL,
--   question_id INT NOT NULL,
--   answer_text TEXT,                -- used for short/long or for multi option ids (JSON)
--   marks_obtained DECIMAL(8,2) DEFAULT 0,
--   is_correct TINYINT(1) DEFAULT NULL,
--   FOREIGN KEY (attempt_id) REFERENCES exam_attempts(id) ON DELETE CASCADE,
--   FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
-- );

-- CREATE TABLE exam (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     exam_name VARCHAR(255) NOT NULL,
--     exam_date DATE NOT NULL,
--     exam_time TIME NOT NULL,
--     total_marks INT NOT NULL,
--     pass_marks INT NOT NULL,
--     exam_description TEXT,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );


CREATE TABLE exam (
    id INT AUTO_INCREMENT PRIMARY KEY,
    exam_title VARCHAR(255),
    exam_date DATE,
    exam_time TIME,
    exam_description TEXT,
    status ENUM('Active','Inactive') DEFAULT 'Active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

    -- CREATE TABLE questions (
    --     id INT AUTO_INCREMENT PRIMARY KEY,
    --     exam_id INT,
    --     question_text TEXT,
    --     question_type ENUM('Multiple Choice', 'True/False', 'Short Answer', 'Essay'),
    --     marks INT,
    --     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    --     FOREIGN KEY (exam_id) REFERENCES exams(id) ON DELETE CASCADE
    -- );
