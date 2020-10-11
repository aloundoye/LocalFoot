CREATE DATABASE localfoot;
USE localfoot;

DROP TABLE IF EXISTS Terrain;
CREATE TABLE Terrain
    ( 
        id VARCHAR(72) NOT NULL,
        taille VARCHAR(10),
        heureDisponible VARCHAR(5),
        occupe TINYINT(1),
        prix varchar(15),
        nom_terrain VARCHAR (255),
        description text,
        PRIMARY KEY(id)
    );

DROP TABLE IF EXISTS Reservation;
CREATE TABLE Reservation
    ( 
        code_reservation VARCHAR(72) NOT NULL,
        date_reservation DATE,
        nb_jours INT,
        heure_reserv VARCHAR(5),
        prix_Reserv VARCHAR(15),
        PRIMARY KEY (code_reservation) 
    );


DROP TABLE IF EXISTS Client;
CREATE TABLE Client
    ( 
        cin VARCHAR(30),
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR (255) NOT NULL,
        id VARCHAR (72) NOT NULL,
        tel varchar(255),
        email varchar(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    );

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin
    ( 
        nom VARCHAR(255),
        prenom VARCHAR (255),
        id VARCHAR (72) NOT NULL ,
        tel varchar(255),
        email varchar(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    );


-- insert into Admin (id,) values(uuid(), 'Andromeda');