CREATE TABLE users
(users_id SERIAL                  NOT NULL
,username                         VARCHAR(255) NOT NULL
,password                         VARCHAR(255) NOT NULL
,CONSTRAINT pk_users_id PRIMARY KEY(users_id)
);