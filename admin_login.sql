CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO admin_users (username, password)
VALUES (
    'website',
    '$2y$10$9q7XUX7G6PQb3g6iS/cI5uEJ9xE1uqNnyGd0ImO/55BpAIv7McNxe'
);
