/* WHAT IF I IMPLEMENT A POINT-BASED REWARD SYSTEM, WHERE THE MORE MY READERS PARTICIPATE, THE MORE POINTS THEY ADD UP, WHICH THEY CAN THEN "SPEND" ON FREE PRODUCTS OR ARC COPIES... OR SWAG... */

/*CREATE DATABASE */
CREATE DATABASE fan_db_test
    WITH 
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

COMMENT ON DATABASE fan_db_test
    IS 'This is a test for my Superfan Database';

/* CREATE FIRST TIER TABLES */

CREATE TABLE fans
(fans_id SERIAL                     NOT NULL
,first_name                         VARCHAR(255) NOT NULL
,last_name                          VARCHAR(255)
,email                              VARCHAR(255) NOT NULL
,fans_reg_date                      DATE NOT NULL
,CONSTRAINT pk_fans_id PRIMARY KEY(fans_id)
);

CREATE TABLE stories
(stories_id SERIAL                  NOT NULL
,stories_title                      VARCHAR(255) NOT NULL
,stories_sub_title                  VARCHAR(255)
,stories_type                       VARCHAR(255) NOT NULL
,series                             VARCHAR(255)
,genre                              VARCHAR(255) NOT NULL
,stories_pub_date                   DATE
,CONSTRAINT pk_stories_id PRIMARY KEY(stories_id)
);

CREATE TABLE promos
(promos_id SERIAL                   NOT NULL 
,promos_title                       VARCHAR(255) NOT NULL
,promos_type                        VARCHAR(255) NOT NULL
,promos_path                        VARCHAR(255) NOT NULL
,promos_dimentions                  VARCHAR(255)
,promos_start_date                  DATE
,promos_end_date                    DATE
,CONSTRAINT pk_promos_id PRIMARY KEY(promos_id)
);

/* CREATE SECOND TIER TABLES */

CREATE TABLE lockout
(lockout_id SERIAL                  NOT NULL
,fans_id                            INTEGER
,lockout_reason                     TEXT NOT NULL
,lockout_date                       DATE NOT NULL
,CONSTRAINT pk_lockout_id PRIMARY KEY(lockout_id)
,CONSTRAINT fk_fans_id FOREIGN KEY (fans_id) REFERENCES fans (fans_id)
);

CREATE TABLE first_readers
(first_readers_id SERIAL            NOT NULL
,fans_id                            INTEGER
,stories_id                         INTEGER
,first_readers_deadline             DATE
,CONSTRAINT pk_first_readers_id PRIMARY KEY(first_readers_id)
,CONSTRAINT fk_fans_id FOREIGN KEY (fans_id) REFERENCES fans (fans_id)
,CONSTRAINT fk_stories_id FOREIGN KEY (stories_id) REFERENCES stories (stories_id)
);

/* WARNING: The above table's deadline has been changed to a simple promos_id refrence. */

CREATE TABLE arc_readers
(arc_readers_id SERIAL              NOT NULL
,fans_id                            INTEGER
,stories_id                         INTEGER
,promos_id                          INTEGER
,CONSTRAINT pk_arc_readers_id PRIMARY KEY(arc_readers_id)
,CONSTRAINT fk_fans_id FOREIGN KEY (fans_id) REFERENCES fans (fans_id)
,CONSTRAINT fk_stories_id FOREIGN KEY (stories_id) REFERENCES stories (stories_id)
,CONSTRAINT fk_promos_id FOREIGN KEY (promos_id) REFERENCES promos (promos_id)
);

CREATE TABLE contest_winner
(contest_winner_id SERIAL           NOT NULL 
,fans_id                            INTEGER
,stories_id                         INTEGER
,promos_id                          INTEGER
,CONSTRAINT pk_contest_winner_id PRIMARY KEY(contest_winner_id)
,CONSTRAINT fk_fans_id FOREIGN KEY (fans_id) REFERENCES fans (fans_id)
,CONSTRAINT fk_stories_id FOREIGN KEY (stories_id) REFERENCES stories (stories_id)
,CONSTRAINT fk_promos_id FOREIGN KEY (promos_id) REFERENCES promos (promos_id)
);

CREATE TABLE free_stories
(free_stories_id SERIAL              NOT NULL 
,stories_id                          INTEGER
,stories_cover_path                  VARCHAR(255) NOT NULL
,stories_mobi_path                   VARCHAR(255) NOT NULL
,stories_epub_path                   VARCHAR(255) NOT NULL
,stories_blurb_path                  VARCHAR(255) NOT NULL
,CONSTRAINT pk_free_stories_id PRIMARY KEY(free_stories_id)
,CONSTRAINT fk_stories_id FOREIGN KEY (stories_id) REFERENCES stories (stories_id)
);

CREATE TABLE arc_stories
(arc_stories_id SERIAL               NOT NULL 
,stories_id                          INTEGER
,stories_cover_path                  VARCHAR(255) NOT NULL
,stories_mobi_path                   VARCHAR(255) NOT NULL
,stories_epub_path                   VARCHAR(255) NOT NULL
,stories_blurb_path                  VARCHAR(255) NOT NULL
,CONSTRAINT pk_arc_stories_id PRIMARY KEY(arc_stories_id)
,CONSTRAINT fk_stories_id FOREIGN KEY (stories_id) REFERENCES stories (stories_id)
);

/* CREATE THIRD TIER TABLES */

CREATE TABLE feedback
(feedback_id SERIAL                  NOT NULL
,first_readers_id                    INTEGER
,stories_id                          INTEGER
,feedback_details                    TEXT
,feedback_date                       DATE
,CONSTRAINT pk_feedback_id PRIMARY KEY(feedback_id)
,CONSTRAINT fk_first_readers_id FOREIGN KEY (first_readers_id) REFERENCES first_readers (first_readers_id)
,CONSTRAINT fk_stories_id FOREIGN KEY (stories_id) REFERENCES stories (stories_id)
);

CREATE TABLE reviews
(reviews_id SERIAL                   NOT NULL
,arc_readers_id                      INTEGER
,stories_id                          INTEGER
,reviews_vendor                      VARCHAR(255)
,reviews_details                     TEXT
,reviews_date                        DATE
,CONSTRAINT pk_reviews_id PRIMARY KEY(reviews_id)
,CONSTRAINT fk_arc_readers_id FOREIGN KEY (arc_readers_id) REFERENCES arc_readers (arc_readers_id)
,CONSTRAINT fk_stories_id FOREIGN KEY (stories_id) REFERENCES stories (stories_id)
);

CREATE TABLE arc_addresses
(arc_addresses_id SERIAL             NOT NULL
,arc_readers_id                      INTEGER
,arc_address_street                  VARCHAR(255)
,arc_address_city                    VARCHAR(255)
,arc_address_state                   VARCHAR(255)
,arc_address_zip                     VARCHAR(255)
,arc_address_country                 VARCHAR(255)
,CONSTRAINT pk_arc_addresses_id PRIMARY KEY(arc_addresses_id)
,CONSTRAINT fk_arc_readers_id  FOREIGN KEY (arc_readers_id ) REFERENCES arc_readers (arc_readers_id )
)
