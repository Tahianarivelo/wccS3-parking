---creation base
CREATE DATABASE parking_db;

---creation tables

CREATE TABLE users (
    id VARCHAR(10) PRIMARY KEY,
    nom VARCHAR(50),
    mdp VARCHAR(225)
);
CREATE SEQUENCE seq_users;

CREATE TABLE axe (
    id VARCHAR(10) PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    longueur DECIMAL(10,2) NOT NULL,---par metre
    espace DECIMAL(10,2) NOT NULL,---espace entre les voitures
    dureeMax INTEGER,
    coordX DECIMAL(10,2),
    coordY DECIMAL(10,2)
);
CREATE SEQUENCE seq_axe;

CREATE TABLE token(
    value VARCHAR(225) PRIMARY KEY
);

CREATE TABLE occupation (
    id VARCHAR(20) PRIMARY KEY,
    idAxe VARCHAR(10),
    valueToken VARCHAR(255),
    longueur DECIMAL(10,2) NOT NULL,---par metre
    numVoiture VARCHAR(9),
    date TIMESTAMP,
    etat INTEGER,
    FOREIGN KEY (idAxe) REFERENCES axe(id),
    FOREIGN KEY (valueToken) REFERENCES token(value)
);
CREATE SEQUENCE seq_occupation;

CREATE TABLE nalanaAuto(
    id VARCHAR(10) PRIMARY KEY,
    idOccupation VARCHAR(20),
    date TIMESTAMP,
    etat INTEGER,
    FOREIGN KEY (idOccupation) REFERENCES occupation(id)
);
CREATE SEQUENCE seq_nalanaAuto;

---creation view

