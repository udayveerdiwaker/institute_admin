CREATE TABLE guest_entries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    guest_name VARCHAR(150),
    phone VARCHAR(20),
    address TEXT,
    purpose VARCHAR(255),
    visit_date DATE,
    visit_time TIME,
    comments TEXT,
    attended_by VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
