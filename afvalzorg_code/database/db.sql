DROP DATABASE IF EXISTS afvalzorg;

CREATE DATABASE afvalzorg;

USE afvalzorg;

CREATE TABLE users (
    user_id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    voornaam TEXT NOT NULL,
    achternaam TEXT NOT NULL,
    password VARCHAR(255) NOT NULL,
    E_MAIL VARCHAR(255) NOT NULL UNIQUE,
    persoon ENUM ('werknemer', 'leverancier', 'chauffeur', 'werkgever') NOT NULL,
    telefoonnummer VARCHAR(50) NOT NULL,
    location VARCHAR(255) NOT NULL DEFAULT "Niet op locatie"
);



INSERT INTO `locations` (`location`, `safety_instructions`) VALUES 
('Nauerna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel lorem leo. Vestibulum et urna pulvinar, scelerisque nunc id, fermentum orci. Vivamus congue nunc dolor, in scelerisque elit tempor non. Vivamus nec interdum lacus, sagittis tincidunt arcu. Vestibulum sollicitudin porttitor mollis. '),
('de liede', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel lorem leo. Vestibulum et urna pulvinar, scelerisque nunc id, fermentum orci. Vivamus congue nunc dolor, in scelerisque elit tempor non. Vivamus nec interdum lacus, sagittis tincidunt arcu. Vestibulum sollicitudin porttitor mollis.');
 
CREATE TABLE check_logs (
    id MEDIUMINT AUTO_INCREMENT PRIMARY KEY,
    user_id MEDIUMINT NOT NULL,
    action enum('checkin', 'checkout') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    location varchar(255) NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE locations (
    location_id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    location varchar(255) NOT NULL,
    safety_instructions TEXT
);

CREATE TABLE instructions_video (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_id INT NOT NULL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    video LONGBLOB NOT NULL,
    mime_type VARCHAR(100) NOT NULL,
    FOREIGN KEY (location_id) REFERENCES locations(location_id) ON DELETE CASCADE
);

