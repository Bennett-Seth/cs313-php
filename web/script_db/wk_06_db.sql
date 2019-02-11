/* Create Tables */

CREATE TABLE topics
(topics_id SERIAL           NOT NULL
,name                       VARCHAR(255) NOT NULL
,CONSTRAINT pk_topics_id PRIMARY KEY(topics_id)
);

/* Insert Data */

INSERT INTO topics (topics_id, name) 
VALUES (01
, 'Faith'
);

INSERT INTO topics (topics_id, name) 
VALUES (02
, 'Sacrifice'
);

INSERT INTO topics (topics_id, name) 
VALUES (03
, 'Charity'
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

INSERT INTO scriptures_by_topics (scriptures_by_topics_id, scriptures_id ,topics_id  ) 
VALUES (01
, 01
, 01
);

INSERT INTO scriptures_by_topics (scriptures_by_topics_id, scriptures_id ,topics_id  ) 
VALUES (02
, 02
, 02
);

INSERT INTO scriptures_by_topics (scriptures_by_topics_id, scriptures_id ,topics_id  ) 
VALUES (03
, 03
, 03
);

INSERT INTO scriptures_by_topics (scriptures_by_topics_id, scriptures_id ,topics_id  ) 
VALUES (04
, 04
, 03
);