-- CREATE TABLE expenses (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     expense_date DATE NOT NULL,
--     name VARCHAR(200) NOT NULL,
--     description TEXT,
--     opening_balance DECIMAL(10,2) NOT NULL,
--     amount DECIMAL(10,2) NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );


-- CREATE TABLE expenses (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     expense_date DATE NOT NULL,
--     name VARCHAR(255) NOT NULL,
--     description TEXT,
--     opening_balance DECIMAL(10,2) NOT NULL DEFAULT 0,
--     total_amount DECIMAL(10,2) NOT NULL DEFAULT 0
-- );
CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expense_date DATE NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    amount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
