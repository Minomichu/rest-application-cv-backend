/* Valt datum som Varchar för att även kunna skriva "pågående" */
CREATE TABLE WORK (
    ID              INT(11) NOT NULL, --AUTO_INCREMENT,
    WORKPLACE       VARCHAR(100) NOT NULL,
    TITLE           VARCHAR(100) NOT NULL,
    STARTDATE       VARCHAR(10) NOT NULL,
    ENDDATE         VARCHAR(10) NOT NULL,
    PRIMARY KEY     (ID)
);

CREATE TABLE COURSES (
    ID              INT(11) NOT NULL, --AUTO_INCREMENT,
    SCHOOL          VARCHAR(100) NOT NULL,
    COURSENAME      VARCHAR(100) NOT NULL,
    STARTDATE       VARCHAR(10) NOT NULL,
    ENDDATE         VARCHAR(10) NOT NULL,
    PRIMARY KEY     (ID)
);

CREATE TABLE WEBPAGE (
    ID              INT(11) NOT NULL, --AUTO_INCREMENT,
    WEBIMAGE        VARCHAR(50),
    WEBNAME         VARCHAR(100) NOT NULL,
    WEBURL          VARCHAR(100) NOT NULL,
    WEBDESCRIPTION  TEXT NOT NULL
    PRIMARY KEY     (ID)
);

CREATE TABLE PERSONAL (
    ID              INT(11) NOT NULL, --AUTO_INCREMENT,
    USERNAME        VARCHAR(25) NOT NULL UNIQUE,
    PASSWORDS       VARCHAR(25) NOT NULL,
    FIRSTNAME       VARCHAR(50),
    LASTNAME        VARCHAR(50),
    WORKTITLE       VARCHAR(50),
    PICTURE         VARCHAR(50),
    PHONE           VARCHAR(11),
    EMAIL           VARCHAR(100),
    CITY            VARCHAR(50),
    PRIMARY KEY     (ID)
);

CREATE TABLE LANGUAGES (
    ID              INT(11) NOT NULL, --AUTO_INCREMENT,
    SPEAK           VARCHAR(30),
    PRIMARY KEY     (ID)
);


INSERT INTO COURSES (SCHOOL, COURSENAME, STARTDATE, ENDDATE) VALUES 
('Miun', 'Webbutveckling', '2018', '2019'),
('Miun', 'Projektledning', '2017', '2019');

INSERT INTO PERSONAL (USERNAME, PASSWORDS, FIRSTNAME, LASTNAME, WORKTITLE, PICTURE, PHONE, EMAIL, CITY) VALUES
('myUsername', 'myPassword', 'Mimmi', 'Nordquist', 'Webbnanting', 'mimmi.jpeg','073 6533933', 'mino1801@student.miun.se', 'Stockholm');

INSERT INTO LANGUAGES (SPEAK, PERSONID) VALUES
('Svenska', 1),
('Engelska', 1);

INSERT INTO WORK (WORKPLACE, TITLE, STARTDATE, ENDDATE) VALUES
('Sandrews', 'Godiskiosken', '2001', '2007'),
('Valtech', 'Office co-ordinator', '2008', '2009');


INSERT INTO WEBPAGE (WEBIMAGE, WEBNAME, WEBURL, WEBDESCRIPTION) VALUES
('standardweb.png', 'Skogsbolaget', 'www.skosbolaget.se', 'En sida om skogen.');