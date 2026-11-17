CREATE TABLE check_ins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    checked_in_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    checked_out_at DATETIME NULL,

    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE instruction_completions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    instruction_id INT NOT NULL,
    completed()
)

CREATE TABLE safety_instructions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    
)