-- Create a new database
CREATE DATABASE IF NOT EXISTS if0_34736713_notices_resources;

-- Use the newly created database
USE if0_34736713_notices_resources;

-- Table for storing notices
CREATE TABLE IF NOT EXISTS notices (
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

-- Table for storing resources
CREATE TABLE IF NOT EXISTS resources (
    title VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL
);
