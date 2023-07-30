CREATE DATABASE IF NOT EXISTS notice_board_system;
USE notice_board_system;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    rollNo VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    phoneNo VARCHAR(15) NOT NULL,
    branch VARCHAR(100) NOT NULL
);
