drop database if exists paivakirja;

create database paivakirja;

use paivakirja;

create table kayttaja (
    kayttaja_id int primary key AUTO_INCREMENT,
    etunimi varchar(50) not null,
    sukunimi varchar(50) not null,
    kayttajanimi varchar(50) UNIQUE,
    salasana varchar(150)
);

create table avainsana (
    avainsana_id int primary key AUTO_INCREMENT,
    nimi varchar(50) not null
);


create table pk_merkinta (
    merkinta_id int primary key AUTO_INCREMENT,
    merkinta text not null,
    kayttaja_id int,
    aika TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foreign key (kayttaja_id) references kayttaja(kayttaja_id)
);

create table avainsanarivi (
    rivinro int PRIMARY key auto_increment,
    merkinta_id int,
    avainsana_id int,
    FOREIGN key (merkinta_id) REFERENCES pk_merkinta(merkinta_id),
    FOREIGN key (avainsana_id) REFERENCES avainsana(avainsana_id)
);
