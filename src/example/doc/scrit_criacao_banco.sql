DROP SCHEMA IF EXISTS db_example ;
CREATE SCHEMA IF NOT EXISTS db_example DEFAULT CHARACTER SET utf8;
USE db_example ;

-- -----------------------------------------------------
-- Table db_example.tb_shift
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_shift ;

CREATE  TABLE IF NOT EXISTS db_example.tb_shift (
  id_shift INT(11) NOT NULL AUTO_INCREMENT ,
  na_shift VARCHAR(45) NULL DEFAULT NULL ,
  time_start TIME NULL DEFAULT NULL ,
  time_end TIME NULL DEFAULT NULL ,
  PRIMARY KEY (id_shift) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table db_example.tb_state
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_state ;

CREATE  TABLE IF NOT EXISTS db_example.tb_state (
  id_state INT(11) NOT NULL AUTO_INCREMENT ,
  na_state VARCHAR(45) NULL DEFAULT NULL ,
  txt_acronym CHAR(2) NULL DEFAULT NULL ,
  PRIMARY KEY (id_state) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table db_example.tb_city
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_city ;

CREATE  TABLE IF NOT EXISTS db_example.tb_city (
  id_city INT(11) NOT NULL AUTO_INCREMENT ,
  na_city VARCHAR(100) NOT NULL ,
  id_state INT(11) NOT NULL ,
  PRIMARY KEY (id_city) ,
  CONSTRAINT fk_city_has_state1
    FOREIGN KEY (id_state )
    REFERENCES db_example.tb_state (id_state ))
ENGINE = InnoDB;

CREATE INDEX fk_city_has_state1 ON db_example.tb_city (id_state ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_address
-- ----------------------------nu-------------------------
DROP TABLE IF EXISTS db_example.tb_address ;

CREATE  TABLE IF NOT EXISTS db_example.tb_address (
  id_address INT(11) NOT NULL AUTO_INCREMENT ,
  txt_zip VARCHAR(30) NOT NULL ,
  txt_number VARCHAR(30) NULL DEFAULT NULL ,
  txt_description VARCHAR(100) NULL DEFAULT NULL ,
  id_city INT(11) NOT NULL ,
  PRIMARY KEY (id_address) ,
  CONSTRAINT fk_address_has_city1
    FOREIGN KEY (id_city )
    REFERENCES db_example.tb_city (id_city ))
ENGINE = InnoDB;

CREATE INDEX fk_address_has_city1 ON db_example.tb_address (id_city ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_school
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_school ;

CREATE  TABLE IF NOT EXISTS db_example.tb_school (
  id_school INT(11) NOT NULL AUTO_INCREMENT ,
  na_school VARCHAR(100) NOT NULL ,
  id_address INT(11) NOT NULL ,
  PRIMARY KEY (id_school) ,
  CONSTRAINT fk_school_has_address
    FOREIGN KEY (id_address )
    REFERENCES db_example.tb_address (id_address ))
ENGINE = InnoDB;

CREATE INDEX fk_school_has_address ON db_example.tb_school (id_address ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_classroom
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_classroom ;

CREATE  TABLE IF NOT EXISTS db_example.tb_classroom (
  id_classroom INT(11) NOT NULL AUTO_INCREMENT ,
  id_school INT(11) NOT NULL ,
  na_classroom VARCHAR(100) NULL DEFAULT NULL ,
  int_qtd_seats INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (id_classroom) ,
  CONSTRAINT fk_school_has_classrooms
    FOREIGN KEY (id_school )
    REFERENCES db_example.tb_school (id_school ))
ENGINE = InnoDB;

CREATE INDEX fk_school_has_classrooms ON db_example.tb_classroom (id_school ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_level
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_level ;

CREATE  TABLE IF NOT EXISTS db_example.tb_level (
  id_level INT(11) NOT NULL AUTO_INCREMENT ,
  na_level VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (id_level) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table db_example.tb_knoledge_area
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_knoledge_area ;

CREATE  TABLE IF NOT EXISTS db_example.tb_knoledge_area (
  id_knoledge_area INT(11) NOT NULL AUTO_INCREMENT ,
  na_knoledge_area VARCHAR(225) NULL DEFAULT NULL ,
  PRIMARY KEY (id_knoledge_area) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table db_example.tb_group
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_group ;

CREATE  TABLE IF NOT EXISTS db_example.tb_group (
  id_group INT(11) NOT NULL AUTO_INCREMENT ,
  id_classroom INT(11) NOT NULL ,
  id_level INT(11) NOT NULL ,
  id_shift INT(11) NOT NULL ,
  id_knoledge_area INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (id_group) ,
  CONSTRAINT fk_group_has_classroom1
    FOREIGN KEY (id_classroom )
    REFERENCES db_example.tb_classroom (id_classroom ),
  CONSTRAINT fk_group_has_level1
    FOREIGN KEY (id_level )
    REFERENCES db_example.tb_level (id_level ),
  CONSTRAINT fk_group_has_shift1
    FOREIGN KEY (id_shift )
    REFERENCES db_example.tb_shift (id_shift ),
  CONSTRAINT fk_group_has_knoledge_area1
    FOREIGN KEY (id_knoledge_area )
    REFERENCES db_example.tb_knoledge_area (id_knoledge_area ))
ENGINE = InnoDB;

CREATE INDEX fk_group_has_classroom1 ON db_example.tb_group (id_classroom ASC) ;

CREATE INDEX fk_group_has_level1 ON db_example.tb_group (id_level ASC) ;

CREATE INDEX fk_group_has_shift1 ON db_example.tb_group (id_shift ASC) ;

CREATE INDEX fk_group_has_knoledge_area1 ON db_example.tb_group (id_knoledge_area ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_user
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_user ;

CREATE  TABLE IF NOT EXISTS db_example.tb_user (
  id_user INT(11) NOT NULL AUTO_INCREMENT ,
  na_user VARCHAR(300) NOT NULL ,
  txt_email VARCHAR(255) NULL DEFAULT NULL ,
  txt_login VARCHAR(45) NULL DEFAULT NULL ,
  txt_password VARCHAR(45) NULL DEFAULT NULL ,
  txt_ssn VARCHAR(11) NULL DEFAULT NULL ,
  id_address INT(11) NOT NULL ,
  id_level INT(11) NOT NULL ,
  PRIMARY KEY (id_user) ,
  CONSTRAINT fk_user_has_address1
    FOREIGN KEY (id_address )
    REFERENCES db_example.tb_address (id_address ),
  CONSTRAINT fk_user_has_level1
    FOREIGN KEY (id_level )
    REFERENCES db_example.tb_level (id_level ))
ENGINE = InnoDB;

CREATE INDEX fk_user_has_address1 ON db_example.tb_user (id_address ASC) ;

CREATE INDEX fk_user_has_level1 ON db_example.tb_user (id_level ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_registration
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_registration ;

CREATE  TABLE IF NOT EXISTS db_example.tb_registration (
  id_registration INT(11) NOT NULL AUTO_INCREMENT ,
  id_user INT(11) NOT NULL ,
  id_group INT(11) NOT NULL ,
  PRIMARY KEY (id_registration) ,
  CONSTRAINT fk_aluno_has_group1
    FOREIGN KEY (id_group )
    REFERENCES db_example.tb_group (id_group ),
  CONSTRAINT fk_aluno_has_user1
    FOREIGN KEY (id_user )
    REFERENCES db_example.tb_user (id_user ))
ENGINE = InnoDB;

CREATE INDEX fk_aluno_has_user1 ON db_example.tb_registration (id_user ASC) ;

CREATE INDEX fk_aluno_has_group1 ON db_example.tb_registration (id_group ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_teacher
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_teacher ;

CREATE  TABLE IF NOT EXISTS db_example.tb_teacher (
  id_teacher INT(11) NOT NULL AUTO_INCREMENT ,
  id_user INT(11) NOT NULL ,
  PRIMARY KEY (id_teacher) ,
  CONSTRAINT fk_teacher_has_user1
    FOREIGN KEY (id_user )
    REFERENCES db_example.tb_user (id_user ))
ENGINE = InnoDB;

CREATE INDEX fk_teacher_has_user1 ON db_example.tb_teacher (id_user ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_teacher_has_knoledge_area
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_teacher_has_knoledge_area ;

CREATE  TABLE IF NOT EXISTS db_example.tb_teacher_has_knoledge_area (
  id_teacher INT(11) NOT NULL ,
  id_knoledge_area INT(11) NOT NULL ,
  PRIMARY KEY (id_teacher, id_knoledge_area) ,
  CONSTRAINT fk_teacher_has_has_knoledge_area_has_teacher1
    FOREIGN KEY (id_teacher )
    REFERENCES db_example.tb_teacher (id_teacher ),
  CONSTRAINT fk_teacher_has_has_knoledge_area_has_knoledge_area1
    FOREIGN KEY (id_knoledge_area )
    REFERENCES db_example.tb_knoledge_area (id_knoledge_area ))
ENGINE = InnoDB;

CREATE INDEX fk_teacher_has_has_knoledge_area_has_knoledge_area1 ON db_example.tb_teacher_has_knoledge_area (id_knoledge_area ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_group_has_teacher
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_group_has_teacher ;

CREATE  TABLE IF NOT EXISTS db_example.tb_group_has_teacher (
  id_group INT(11) NOT NULL ,
  id_teacher INT(11) NOT NULL ,
  PRIMARY KEY (id_group, id_teacher) ,
  CONSTRAINT fk_group_has_has_teacher_has_group1
    FOREIGN KEY (id_group )
    REFERENCES db_example.tb_group (id_group ),
  CONSTRAINT fk_group_has_has_teacher_has_teacher1
    FOREIGN KEY (id_teacher )
    REFERENCES db_example.tb_teacher (id_teacher ))
ENGINE = InnoDB;

CREATE INDEX fk_group_has_has_teacher_has_teacher1 ON db_example.tb_group_has_teacher (id_teacher ASC) ;


-- -----------------------------------------------------
-- Table db_example.tb_teacher_has_level
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_example.tb_teacher_has_level ;

CREATE  TABLE IF NOT EXISTS db_example.tb_teacher_has_level (
  id_teacher INT(11) NOT NULL ,
  id_level INT(11) NOT NULL ,
  PRIMARY KEY (id_teacher, id_level) ,
  CONSTRAINT fk_teacher_has_has_level_has_teacher1
    FOREIGN KEY (id_teacher )
    REFERENCES db_example.tb_teacher (id_teacher ),
  CONSTRAINT fk_teacher_has_has_level_has_level1
    FOREIGN KEY (id_level )
    REFERENCES db_example.tb_level (id_level ))
ENGINE = InnoDB;

CREATE INDEX fk_teacher_has_has_level_has_level1 ON db_example.tb_teacher_has_level (id_level ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
