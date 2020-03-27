--
-- Drop tables
--
DROP TABLE IF EXISTS message;
DROP TABLE IF EXISTS question;
DROP TABLE IF EXISTS user;

--
-- Create tables
--

CREATE TABLE user (
id_user    BIGINT       	AUTO_INCREMENT,
username   VARCHAR(16)		NOT NULL UNIQUE,
password   VARCHAR(60)		CHARACTER SET ASCII NOT NULL,
email      VARCHAR(191)		NOT NULL UNIQUE,
admin      SMALLINT 		NOT NULL DEFAULT 0,

PRIMARY KEY (id_user)
) ENGINE=INNODB;

-- Max. email length is 254 chars but due to some MySQL limitation
-- on UNIQUE constraint, we've to limit the length of emails to 191 chars
--
-- "Specified key was too long; max key length is 767 bytes"

CREATE TABLE équipe (
id_equipe	BIGINT      	AUTO_INCREMENT,
nom_equipe	VARCHAR(64) 	NOT NULL UNIQUE,
nb_votes	BIGINT		    NOT NULL DEFAULT 0,
id_user     BIGINT          NOT NULL,
ville       VARCHAR(64)     NOT NULL,
classement  BIGINT          NOT NULL UNIQUE,

PRIMARY KEY (id_equipe),
FOREIGN KEY (id_user) REFERENCES user(id_user)

) ENGINE=INNODB;

CREATE TABLE joueur (
id_joueur	    BIGINT			AUTO_INCREMENT,
id_equipe	    BIGINT			NOT NULL,
nom_joueur      VARCHAR(64)		NOT NULL UNIQUE ,

PRIMARY KEY (id_joueur),

CONSTRAINT fk_msg_id FOREIGN KEY (id_equipe) REFERENCES équipe(id_equipe)
) ENGINE=INNODB;

CREATE TABLE vote (
                        id_vote	        BIGINT			AUTO_INCREMENT,
                        id_equipe	    BIGINT			NOT NULL,
                        nb_votes      	BIGINT	        NOT NULL,

                        PRIMARY KEY (id_vote),

                        CONSTRAINT fk_msg_id FOREIGN KEY (id_equipe) REFERENCES équipe(id_equipe)

) ENGINE=INNODB;


