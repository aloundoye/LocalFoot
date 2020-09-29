CREATE DATABASE localfoot;
USE localfoot;

DROP TABLE IF EXISTS Terrain;
CREATE TABLE Terrain
    ( 
        id VARCHAR(36) NOT NULL,
        taille VARCHAR(10) NOT NULL,
        heureDisponible VARCHAR(5) NOT NULL,
        occupe TINYINT(1) NOT NULL,
        prix varchar(15) NOT NULL,
        nom_terrain VARCHAR (255),
        PRIMARY KEY(id)
    );

DROP TABLE IF EXISTS Reservation;
CREATE TABLE Reservation
    ( 
        code_reservation VARCHAR(36) NOT NULL,
        date_reservation DATE  NOT NULL,
        nb_jours INT NOT NULL,
        heure_reserv VARCHAR(5) NOT NULL,
        prix_Reserv VARCHAR(15) NOT NULL,
        PRIMARY KEY (code_reservation) 
    );


DROP TABLE IF EXISTS Client;
CREATE TABLE Client
    ( 
        cin VARCHAR(30),
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR (255) NOT NULL,
        id VARCHAR (36) NOT NULL,
        tel varchar(10),
        email varchar(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    );

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin
    ( 
        nom VARCHAR(255),
        prenom VARCHAR (255),
        id VARCHAR (36) NOT NULL ,
        tel varchar(10),
        email varchar(255),
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    );


-- insert into Admin (id,) values(uuid(), 'Andromeda');