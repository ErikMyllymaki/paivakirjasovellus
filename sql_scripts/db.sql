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

create table pk_merkinta (
    merkinta_id int primary key AUTO_INCREMENT,
    merkinta text not null,
    kayttaja_id int,
    aika TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foreign key (kayttaja_id) references kayttaja(kayttaja_id)
);

create table avainsana (
    avainsana_id int primary key AUTO_INCREMENT,
    nimi varchar(50) not null
);

create table avainsanarivi (
    rivinro int primary key AUTO_INCREMENT,
    merkinta_id int,
    avainsana_id int,
    foreign key (merkinta_id) references pk_merkinta(merkinta_id),
    foreign key (avainsana_id) references avainsana(avainsana_id)
);


insert into avainsana (nimi) VALUES ('Hauskaa');
insert into avainsana (nimi) VALUES ('Tylsaa');