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
        image VARCHAR (255),
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
DROP TABLE IF EXISTS bookings;
CREATE TABLE bookings
    (
        id int auto_increment ,
        booking_date DATE,
        booking_time TIME,
        id_client VARCHAR(72),
        id_terrain VARCHAR(72),
        PRIMARY KEY (id),
        FOREIGN KEY (id_client) REFERENCES Client(id),
        FOREIGN KEY (id_terrain) REFERENCES Terrain(id)

    );

/*
**Compte admin par defaut:
**email :admin@admin.com
**mdp: Admin1234
*/
INSERT INTO `admin`(`nom`, `prenom`, `id`, `tel`, `email`, `password`) VALUES ('admin','admin',UUID(),'+221771302336','admin@admin.com','$2y$10$uq6LpTpngvoQo0wz5.svwe5iJAJbbUgCxtWQEutEb92QQD/yoHjOC')