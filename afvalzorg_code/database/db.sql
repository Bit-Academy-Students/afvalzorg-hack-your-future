DROP DATABASE IF EXISTS `afvalzorg`;

CREATE DATABASE `afvalzorg`;

USE `afvalzorg`;

CREATE TABLE `users` (
    userid MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    voornaam TEXT NOT NULL,
    achternaam TEXT NOT NULL,
    password VARCHAR(255) NOT NULL,
    E_MAIL VARCHAR(255) NOT NULL UNIQUE,
    persoon ENUM ('werknemer', 'leverancier', 'chauffeur', 'werkgever') NOT NULL,
    telefoonnummer VARCHAR(50) NOT NULL,
    location VARCHAR(255) NOT NULL DEFAULT "Niet op locatie"
);

CREATE TABLE `locations` (
    locationid MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    location varchar(255) NOT NULL,
    safety_instr TEXT
);

INSERT INTO `locations` (`location`, `safety_instr`) VALUES ('assendelft', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel lorem leo. Vestibulum et urna pulvinar, scelerisque nunc id, fermentum orci. Vivamus congue nunc dolor, in scelerisque elit tempor non. Vivamus nec interdum lacus, sagittis tincidunt arcu. Vestibulum sollicitudin porttitor mollis. Fusce non imperdiet ligula, ut hendrerit libero. Integer rutrum eget tortor vitae molestie. Pellentesque pulvinar interdum dapibus. Nulla finibus tincidunt lorem non elementum'),
 ('zaandam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel lorem leo. Vestibulum et urna pulvinar, scelerisque nunc id, fermentum orci. Vivamus congue nunc dolor, in scelerisque elit tempor non. Vivamus nec interdum lacus, sagittis tincidunt arcu. Vestibulum sollicitudin porttitor mollis. Fusce non imperdiet ligula, ut hendrerit libero. Integer rutrum eget tortor vitae molestie. Pellentesque pulvinar interdum dapibus. Nulla finibus tincidunt lorem non elementum.');
 
CREATE TABLE `check_logs` (
    id MEDIUMINT AUTO_INCREMENT PRIMARY KEY,
    userid MEDIUMINT NOT NULL,
    action enum('checkin', 'checkout') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    location varchar(255) NOT NULL,

    FOREIGN KEY (userid) REFERENCES users(userid)
);