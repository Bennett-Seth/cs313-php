/* CREATE TABLE */

CREATE TABLE scriptures
(scriptures_id SERIAL           NOT NULL
,book                           VARCHAR(255) NOT NULL
,chapter                        VARCHAR(255) NOT NULL
,verse                          VARCHAR(255) NOT NULL
,content                        VARCHAR(255) NOT NULL
,CONSTRAINT pk_scriptures_id PRIMARY KEY(scriptures_id)
);

/* INSERT DATA */

INSERT INTO scriptures (book, chapter, verse, content) 
VALUES ('John'
, 1
, 5
, 'And the light shineth in darkness; and the darkness comprehended it not.'
);

INSERT INTO scriptures (book, chapter, verse, content) 
VALUES ('Doctrine and Covenants'
, 88
, 49
, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.' 
);

INSERT INTO scriptures (book, chapter, verse, content) 
VALUES ('Doctrine and Covenants'
, 93
, 28
, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'
);

INSERT INTO scriptures (book, chapter, verse, content) 
VALUES ('Mosiah'
, 16
, 9
, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
);

/* Create Tables */

CREATE TABLE topics
(topics_id SERIAL           NOT NULL
,name                       VARCHAR(255) NOT NULL
,CONSTRAINT pk_topics_id PRIMARY KEY(topics_id)
);

/* Insert Data */

INSERT INTO topics (name) 
VALUES ('Faith'
);

INSERT INTO topics (name) 
VALUES ('Sacrifice'
);

INSERT INTO topics (name) 
VALUES ('Charity'
);

/* Create Table: Link scriptures to topics  */

CREATE TABLE scriptures_by_topics
(scriptures_by_topics_id SERIAL         NOT NULL
,scriptures_id                          INT NOT NULL
,topics_id                              INT NOT NULL
,CONSTRAINT pk_scriptures_by_topics_id PRIMARY KEY(scriptures_by_topics_id)
,CONSTRAINT fk_scriptures_id FOREIGN KEY (scriptures_id) REFERENCES scriptures (scriptures_id)
,CONSTRAINT fk_topics_id FOREIGN KEY (topics_id) REFERENCES topics (topics_id)
);

/* Populate scriptures_by_topics TABLE */

INSERT INTO scriptures_by_topics (scriptures_id ,topics_id  ) 
VALUES (01
, 01
);

INSERT INTO scriptures_by_topics (scriptures_id ,topics_id  ) 
VALUES (02
, 02
);

INSERT INTO scriptures_by_topics (scriptures_id ,topics_id  ) 
VALUES (03
, 03
);

INSERT INTO scriptures_by_topics (scriptures_id ,topics_id  ) 
VALUES (04
, 03
);



