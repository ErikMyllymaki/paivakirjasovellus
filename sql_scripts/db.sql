drop database if exists paivakirja;

create database paivakirja;

use paivakirja;

create table kayttaja (
    kayttaja_id int primary key AUTO_INCREMENT,
    etunimi varchar(50) not null,
    sukunimi varchar(50) not null
);

create table pk_merkinta (
    merkinta_id int primary key AUTO_INCREMENT,
    merkinta text not null,
    kayttaja_id int,
    aika DATETIME,
    foreign key (kayttaja_id) references kayttaja(kayttaja_id)
);

create table avainsanarivi (
    merkinta_id int,
    avainsana_id int,
    primary key (merkinta_id, avainsana_id),
    foreign key (merkinta_id) references pk_merkinta(merkinta_id)
);

create table avainsana (
    avainsana_id int primary key AUTO_INCREMENT,
    nimi varchar(50) not null,
    foreign key (avainsana_id) references avainsanarivi(avainsana_id)
)



