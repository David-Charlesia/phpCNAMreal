CREATE DATABASE IF NOT EXISTS accountPHPCNAM CHARACTER SET utf8;

USE accountPHPCNAM;

CREATE TABLE IF NOT EXISTS accountPHPCNAM(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pwd VARCHAR(100) NOT NULL,
    privilege INT(6) NOT NULL,
    validate BOOLEAN NOT NULL
);

INSERT INTO accountPHPCNAM (pseudo,email,pwd,privilege,validate)VALUES(
    'admin',
    'admin@superuser.com',
    'admin',
    1,
    true
);

CREATE TABLE IF NOT EXISTS contributions(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_user INT(6) NOT NULL,
    accepted BOOLEAN NOT NULL,
    lien TEXT NOT NULL
);

INSERT INTO contributions (id_user,accepted,lien) VALUES(
    1,
    1,
    'https://www.centrepompidou.fr/fr/programme/agenda/evenement/3XHsNOt'
);