CREATE TABLE user_applications (
    username INT NOT NULL,
    company_name VARCHAR(255) NOT NULL,
    application_date DATE NOT NULL,
    application_status VARCHAR(50) NOT NULL,
    application_notes VARCHAR(255),
    FOREIGN KEY (username) REFERENCES users(id)
);
