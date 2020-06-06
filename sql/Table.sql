---creation base
CREATE DATABASE parking_db;


---creation tables
CREATE TABLE axe (
    id VARCHAR(10) PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    longueur DECIMAL(10,2) NOT NULL,---par metre
    espace DECIMAL(10,2) NOT NULL,---espace entre les voitures
    coordX DECIMAL(10,2),
    coordY DECIMAL(10,2)
);
CREATE SEQUENCE seq_axe;

CREATE TABLE occupation (
    idAxe VARCHAR(10),
    longueur DECIMAL(10,2) NOT NULL,---par metre
    etat INTEGER,
    FOREIGN KEY (isAxe) REFERENCES axe(id)
);

---creation view

