CREATE TABLE student_fees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  course_id INT NOT NULL,
  total_fee DECIMAL(10,2) NOT NULL,
  paid_amount DECIMAL(10,2) DEFAULT 0,
  remaining_amount DECIMAL(10,2) GENERATED ALWAYS AS (total_fee - paid_amount) STORED,
  payment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  payment_mode VARCHAR(50) DEFAULT 'Cash',
  remarks TEXT
);
