create database garage;

use garage;

create table garage_type_voiture(
    idTypeVoiture int auto_increment,
    nom varchar(50),
    primary key(idTypeVoiture)
)engine=innoDB;

create table garage_slot(
    idSlot int auto_increment,
    nom varchar(50),
    primary key(idSlot)
)engine=innoDB;

create table garage_client(
    idClient int auto_increment,
    numVoiture varchar(10) unique,
    idTypeVoiture int,
    primary key(idClient),
    foreign key (idTypeVoiture) references garage_type_voiture(idTypeVoiture)
)engine=innoDB;

create table garage_service(
    idService int auto_increment,
    nom varchar(50),
    duree time,
    prix decimal(15,3),
    primary key(idService)
)engine=innoDB;

create table garage_rendez_vous(
    idRendezVous int auto_increment,
    dateDebut dateTime,
    idService int,
    idSlot int,
    idClient int,
    primary key(idRendezVous),
    foreign key (idService) references garage_service(idService),
    foreign key (idSlot) references garage_slot(idSlot),
    foreign key (idClient) references garage_client(idClient)  
)engine=innoDB;

create table garage_devis(
    idDevis int auto_increment,
    dateDevis dateTime,
    numVoiture varchar(50),
    nomService varchar(50),
    prixService decimal(15,3),
    dureeService time,
    slot varchar(50),
    primary key (idDevis)
)engine=innoDB;

create table garage_prestation(
    idPrestation int auto_increment,
    idDevis int,
    datePayement dateTime,
    primary key(idPrestation),
    foreign key(idDevis) references garage_devis(idDevis)
)engine=innoDB;

CREATE TABLE garage_horaire(
    nom VARCHAR(50),
    heure TIME
)engine=innoDB;

create table garage_admin (
    idAdmin int primary key auto_increment,
    identifiant varchar(20),
    mdp varchar(64)
);