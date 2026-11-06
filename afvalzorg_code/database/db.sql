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
    telefoonnummer VARCHAR(50) NOT NULL
)`