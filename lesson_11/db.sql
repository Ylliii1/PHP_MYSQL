CREATE DATABASE user_dashboard;

USE user_dashboard;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

INSERT INTO users(username, email)
VALUES
("user1", "user1@email.com"),
("user2", "user2@email.com"),
("user3", "user3@email.com"),
("user4", "user4@email.com");