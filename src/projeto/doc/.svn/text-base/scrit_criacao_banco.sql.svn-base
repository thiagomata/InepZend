DROP SCHEMA IF EXISTS db_projeto ;
CREATE SCHEMA IF NOT EXISTS db_projeto DEFAULT CHARACTER SET utf8;
USE db_projeto ;

-- -----------------------------------------------------
-- Table db_projeto.tb_estado
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_estado ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_estado (
  id_estado INT(11) NOT NULL AUTO_INCREMENT ,
  no_estado VARCHAR(45) NULL DEFAULT NULL ,
  txt_sigla_estado CHAR(2) NULL DEFAULT NULL ,
  PRIMARY KEY (id_estado) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table db_projeto.tb_cidade
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_cidade ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_cidade (
  id_cidade INT(11) NOT NULL AUTO_INCREMENT ,
  no_cidade VARCHAR(100) NOT NULL ,
  id_estado INT(11) NOT NULL ,
  PRIMARY KEY (id_cidade) ,
  CONSTRAINT fk_tb_cidade_tb_estado1
    FOREIGN KEY (id_estado )
    REFERENCES db_projeto.tb_estado (id_estado ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_cidade_tb_estado1 ON db_projeto.tb_cidade (id_estado ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_endereco
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_endereco ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_endereco (
  id_endereco INT(11) NOT NULL AUTO_INCREMENT ,
  txt_cep VARCHAR(30) NOT NULL ,
  txt_numero VARCHAR(30) NULL DEFAULT NULL ,
  txt_logradouro VARCHAR(100) NULL DEFAULT NULL ,
  id_cidade INT(11) NOT NULL ,
  PRIMARY KEY (id_endereco) ,
  CONSTRAINT fk_tb_endereco_tb_cidade1
    FOREIGN KEY (id_cidade )
    REFERENCES db_projeto.tb_cidade (id_cidade ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_endereco_tb_cidade1 ON db_projeto.tb_endereco (id_cidade ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_escola
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_escola ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_escola (
  id_escola INT(11) NOT NULL AUTO_INCREMENT ,
  no_escola VARCHAR(100) NOT NULL ,
  id_endereco INT(11) NOT NULL ,
  PRIMARY KEY (id_escola) ,
  CONSTRAINT fk_tb_escola_tb_endereco1
    FOREIGN KEY (id_endereco )
    REFERENCES db_projeto.tb_endereco (id_endereco ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_escola_tb_endereco1 ON db_projeto.tb_escola (id_endereco ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_sala
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_sala ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_sala (
  id_sala INT(11) NOT NULL AUTO_INCREMENT ,
  id_escola INT(11) NOT NULL ,
  no_sala VARCHAR(100) NULL DEFAULT NULL ,
  int_qtd_cadeiras INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (id_sala) ,
  CONSTRAINT fk_tb_sala_tb_escola1
    FOREIGN KEY (id_escola )
    REFERENCES db_projeto.tb_escola (id_escola ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_sala_tb_escola1 ON db_projeto.tb_sala (id_escola ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_nivel
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_nivel ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_nivel (
  id_nivel INT(11) NOT NULL AUTO_INCREMENT ,
  no_nivel VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (id_nivel) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table db_projeto.tb_turno
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_turno ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_turno (
  id_turno INT(11) NOT NULL AUTO_INCREMENT ,
  no_turno VARCHAR(45) NULL DEFAULT NULL ,
  hora_inicio TIME NULL DEFAULT NULL ,
  hora_fim TIME NULL DEFAULT NULL ,
  PRIMARY KEY (id_turno) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table db_projeto.tb_area_conhecimento
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_area_conhecimento ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_area_conhecimento (
  id_area_conhecimento INT(11) NOT NULL AUTO_INCREMENT ,
  no_area_conhecimento VARCHAR(225) NULL DEFAULT NULL ,
  PRIMARY KEY (id_area_conhecimento) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table db_projeto.tb_turma
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_turma ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_turma (
  id_turma INT(11) NOT NULL AUTO_INCREMENT ,
  id_sala INT(11) NOT NULL ,
  id_nivel INT(11) NOT NULL ,
  id_turno INT(11) NOT NULL ,
  id_area_conhecimento INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (id_turma) ,
  CONSTRAINT fk_tb_turma_tb_sala1
    FOREIGN KEY (id_sala )
    REFERENCES db_projeto.tb_sala (id_sala ),
  CONSTRAINT fk_tb_turma_tb_nivel1
    FOREIGN KEY (id_nivel )
    REFERENCES db_projeto.tb_nivel (id_nivel ),
  CONSTRAINT fk_tb_turma_tb_turno1
    FOREIGN KEY (id_turno )
    REFERENCES db_projeto.tb_turno (id_turno ),
  CONSTRAINT fk_tb_turma_tb_area_conhecimento1
    FOREIGN KEY (id_area_conhecimento )
    REFERENCES db_projeto.tb_area_conhecimento (id_area_conhecimento ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_turma_tb_sala1 ON db_projeto.tb_turma (id_sala ASC) ;

CREATE INDEX fk_tb_turma_tb_nivel1 ON db_projeto.tb_turma (id_nivel ASC) ;

CREATE INDEX fk_tb_turma_tb_turno1 ON db_projeto.tb_turma (id_turno ASC) ;

CREATE INDEX fk_tb_turma_tb_area_conhecimento1 ON db_projeto.tb_turma (id_area_conhecimento ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_usuario
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_usuario ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_usuario (
  id_usuario INT(11) NOT NULL AUTO_INCREMENT ,
  no_usuario VARCHAR(300) NOT NULL ,
  txt_email VARCHAR(255) NULL DEFAULT NULL ,
  txt_login VARCHAR(45) NULL DEFAULT NULL ,
  txt_senha VARCHAR(45) NULL DEFAULT NULL ,
  txt_cpf VARCHAR(11) NULL DEFAULT NULL ,
  id_endereco INT(11) NOT NULL ,
  id_nivel INT(11) NOT NULL ,
  PRIMARY KEY (id_usuario) ,
  CONSTRAINT fk_tb_usuario_tb_endereco1
    FOREIGN KEY (id_endereco )
    REFERENCES db_projeto.tb_endereco (id_endereco ),
  CONSTRAINT fk_tb_usuario_tb_nivel1
    FOREIGN KEY (id_nivel )
    REFERENCES db_projeto.tb_nivel (id_nivel ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_usuario_tb_endereco1 ON db_projeto.tb_usuario (id_endereco ASC) ;

CREATE INDEX fk_tb_usuario_tb_nivel1 ON db_projeto.tb_usuario (id_nivel ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_matricula
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_matricula ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_matricula (
  id_matricula INT(11) NOT NULL AUTO_INCREMENT ,
  id_usuario INT(11) NOT NULL ,
  id_turma INT(11) NOT NULL ,
  PRIMARY KEY (id_matricula) ,
  CONSTRAINT fk_tb_aluno_tb_turma1
    FOREIGN KEY (id_turma )
    REFERENCES db_projeto.tb_turma (id_turma ),
  CONSTRAINT fk_tb_aluno_tb_usuario1
    FOREIGN KEY (id_usuario )
    REFERENCES db_projeto.tb_usuario (id_usuario ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_aluno_tb_usuario1 ON db_projeto.tb_matricula (id_usuario ASC) ;

CREATE INDEX fk_tb_aluno_tb_turma1 ON db_projeto.tb_matricula (id_turma ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_professor
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_professor ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_professor (
  id_professor INT(11) NOT NULL AUTO_INCREMENT ,
  id_usuario INT(11) NOT NULL ,
  PRIMARY KEY (id_professor) ,
  CONSTRAINT fk_tb_professor_tb_usuario1
    FOREIGN KEY (id_usuario )
    REFERENCES db_projeto.tb_usuario (id_usuario ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_professor_tb_usuario1 ON db_projeto.tb_professor (id_usuario ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_professor_tem_area_conhecimento
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_professor_tem_area_conhecimento ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_professor_tem_area_conhecimento (
  id_professor INT(11) NOT NULL ,
  id_area_conhecimento INT(11) NOT NULL ,
  PRIMARY KEY (id_professor, id_area_conhecimento) ,
  CONSTRAINT fk_tb_professor_has_tb_area_conhecimento_tb_professor1
    FOREIGN KEY (id_professor )
    REFERENCES db_projeto.tb_professor (id_professor ),
  CONSTRAINT fk_tb_professor_has_tb_area_conhecimento_tb_area_conhecimento1
    FOREIGN KEY (id_area_conhecimento )
    REFERENCES db_projeto.tb_area_conhecimento (id_area_conhecimento ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_professor_has_tb_area_conhecimento_tb_area_conhecimento1 ON db_projeto.tb_professor_tem_area_conhecimento (id_area_conhecimento ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_turma_tem_professor
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_turma_tem_professor ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_turma_tem_professor (
  id_turma INT(11) NOT NULL ,
  id_professor INT(11) NOT NULL ,
  PRIMARY KEY (id_turma, id_professor) ,
  CONSTRAINT fk_tb_turma_has_tb_professor_tb_turma1
    FOREIGN KEY (id_turma )
    REFERENCES db_projeto.tb_turma (id_turma ),
  CONSTRAINT fk_tb_turma_has_tb_professor_tb_professor1
    FOREIGN KEY (id_professor )
    REFERENCES db_projeto.tb_professor (id_professor ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_turma_has_tb_professor_tb_professor1 ON db_projeto.tb_turma_tem_professor (id_professor ASC) ;


-- -----------------------------------------------------
-- Table db_projeto.tb_professor_tem_nivel
-- -----------------------------------------------------
DROP TABLE IF EXISTS db_projeto.tb_professor_tem_nivel ;

CREATE  TABLE IF NOT EXISTS db_projeto.tb_professor_tem_nivel (
  id_professor INT(11) NOT NULL ,
  id_nivel INT(11) NOT NULL ,
  PRIMARY KEY (id_professor, id_nivel) ,
  CONSTRAINT fk_tb_professor_has_tb_nivel_tb_professor1
    FOREIGN KEY (id_professor )
    REFERENCES db_projeto.tb_professor (id_professor ),
  CONSTRAINT fk_tb_professor_has_tb_nivel_tb_nivel1
    FOREIGN KEY (id_nivel )
    REFERENCES db_projeto.tb_nivel (id_nivel ))
ENGINE = InnoDB;

CREATE INDEX fk_tb_professor_has_tb_nivel_tb_nivel1 ON db_projeto.tb_professor_tem_nivel (id_nivel ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
