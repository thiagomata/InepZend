-- -----------------------------------------------------
-- Table tb_estado
-- -----------------------------------------------------

CREATE TABLE  tb_estado (
  id_estado SERIAL ,
  no_estado VARCHAR(45) NULL DEFAULT NULL ,
  txt_sigla_estado CHAR(2) NULL DEFAULT NULL ,
  PRIMARY KEY (id_estado) );



-- -----------------------------------------------------
-- Table tb_cidade
-- -----------------------------------------------------


CREATE TABLE  tb_cidade (
  id_cidade SERIAL ,
  no_cidade VARCHAR(100) NOT NULL ,
  id_estado INTEGER  NOT NULL ,
  PRIMARY KEY (id_cidade) ,
  CONSTRAINT fk_tb_cidade_tb_estado1
    FOREIGN KEY (id_estado )
    REFERENCES tb_estado (id_estado ));


CREATE INDEX fk_tb_cidade_tb_estado1 ON tb_cidade (id_estado ASC) ;


-- -----------------------------------------------------
-- Table tb_endereco
-- -----------------------------------------------------


CREATE TABLE  tb_endereco (
  id_endereco SERIAL ,
  txt_cep VARCHAR(30) NOT NULL ,
  txt_numero VARCHAR(30) NULL DEFAULT NULL ,
  txt_logradouro VARCHAR(100) NULL DEFAULT NULL ,
  id_cidade INTEGER  NOT NULL ,
  PRIMARY KEY (id_endereco) ,
  CONSTRAINT fk_tb_endereco_tb_cidade1
    FOREIGN KEY (id_cidade )
    REFERENCES tb_cidade (id_cidade ));


CREATE INDEX fk_tb_endereco_tb_cidade1 ON tb_endereco (id_cidade ASC) ;


-- -----------------------------------------------------
-- Table tb_escola
-- -----------------------------------------------------
DROP TABLE IF EXISTS tb_escola ;

CREATE TABLE  tb_escola (
  id_escola SERIAL ,
  no_escola VARCHAR(100) NOT NULL ,
  id_endereco INTEGER  NOT NULL ,
  PRIMARY KEY (id_escola) ,
  CONSTRAINT fk_tb_escola_tb_endereco1
    FOREIGN KEY (id_endereco )
    REFERENCES tb_endereco (id_endereco ));


CREATE INDEX fk_tb_escola_tb_endereco1 ON tb_escola (id_endereco ASC) ;


-- -----------------------------------------------------
-- Table tb_sala
-- -----------------------------------------------------
DROP TABLE IF EXISTS tb_sala ;

CREATE TABLE  tb_sala (
  id_sala SERIAL ,
  id_escola INTEGER  NOT NULL ,
  no_sala VARCHAR(100) NULL DEFAULT NULL ,
  int_qtd_cadeiras INTEGER  NULL DEFAULT NULL ,
  PRIMARY KEY (id_sala) ,
  CONSTRAINT fk_tb_sala_tb_escola1
    FOREIGN KEY (id_escola )
    REFERENCES tb_escola (id_escola ));


CREATE INDEX fk_tb_sala_tb_escola1 ON tb_sala (id_escola ASC) ;


-- -----------------------------------------------------
-- Table tb_nivel
-- -----------------------------------------------------
DROP TABLE IF EXISTS tb_nivel ;

CREATE TABLE  tb_nivel (
  id_nivel SERIAL ,
  no_nivel VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (id_nivel) );



-- -----------------------------------------------------
-- Table tb_turno
-- -----------------------------------------------------
DROP TABLE IF EXISTS tb_turno ;

CREATE TABLE  tb_turno (
  id_turno SERIAL ,
  no_turno VARCHAR(45) NULL DEFAULT NULL ,
  hora_inicio TIME NULL DEFAULT NULL ,
  hora_fim TIME NULL DEFAULT NULL ,
  PRIMARY KEY (id_turno) );



-- -----------------------------------------------------
-- Table tb_area_conhecimento
-- -----------------------------------------------------
DROP TABLE IF EXISTS tb_area_conhecimento ;

CREATE TABLE  tb_area_conhecimento (
  id_area_conhecimento SERIAL ,
  no_area_conhecimento VARCHAR(225) NULL DEFAULT NULL ,
  PRIMARY KEY (id_area_conhecimento) );



-- -----------------------------------------------------
-- Table tb_turma
-- -----------------------------------------------------

CREATE TABLE  tb_turma (
  id_turma SERIAL ,
  id_sala INTEGER  NOT NULL ,
  id_nivel INTEGER  NOT NULL ,
  id_turno INTEGER  NOT NULL ,
  id_area_conhecimento INTEGER  NULL DEFAULT NULL ,
  PRIMARY KEY (id_turma) ,
  CONSTRAINT fk_tb_turma_tb_sala1
    FOREIGN KEY (id_sala )
    REFERENCES tb_sala (id_sala ),
  CONSTRAINT fk_tb_turma_tb_nivel1
    FOREIGN KEY (id_nivel )
    REFERENCES tb_nivel (id_nivel ),
  CONSTRAINT fk_tb_turma_tb_turno1
    FOREIGN KEY (id_turno )
    REFERENCES tb_turno (id_turno ),
  CONSTRAINT fk_tb_turma_tb_area_conhecimento1
    FOREIGN KEY (id_area_conhecimento )
    REFERENCES tb_area_conhecimento (id_area_conhecimento ));


CREATE INDEX fk_tb_turma_tb_sala1 ON tb_turma (id_sala ASC) ;

CREATE INDEX fk_tb_turma_tb_nivel1 ON tb_turma (id_nivel ASC) ;

CREATE INDEX fk_tb_turma_tb_turno1 ON tb_turma (id_turno ASC) ;

CREATE INDEX fk_tb_turma_tb_area_conhecimento1 ON tb_turma (id_area_conhecimento ASC) ;


-- -----------------------------------------------------
-- Table tb_usuario
-- -----------------------------------------------------


CREATE TABLE  tb_usuario (
  id_usuario SERIAL ,
  no_usuario VARCHAR(300) NOT NULL ,
  txt_email VARCHAR(255) NULL DEFAULT NULL ,
  txt_login VARCHAR(45) NULL DEFAULT NULL ,
  txt_senha VARCHAR(45) NULL DEFAULT NULL ,
  txt_cpf VARCHAR(11) NULL DEFAULT NULL ,
  id_endereco INTEGER  NOT NULL ,
  id_nivel INTEGER  NOT NULL ,
  PRIMARY KEY (id_usuario) ,
  CONSTRAINT fk_tb_usuario_tb_endereco1
    FOREIGN KEY (id_endereco )
    REFERENCES tb_endereco (id_endereco ),
  CONSTRAINT fk_tb_usuario_tb_nivel1
    FOREIGN KEY (id_nivel )
    REFERENCES tb_nivel (id_nivel ));


CREATE INDEX fk_tb_usuario_tb_endereco1 ON tb_usuario (id_endereco ASC) ;

CREATE INDEX fk_tb_usuario_tb_nivel1 ON tb_usuario (id_nivel ASC) ;


-- -----------------------------------------------------
-- Table tb_matricula
-- -----------------------------------------------------

CREATE TABLE  tb_matricula (
  id_matricula SERIAL ,
  id_usuario INTEGER  NOT NULL ,
  id_turma INTEGER  NOT NULL ,
  PRIMARY KEY (id_matricula) ,
  CONSTRAINT fk_tb_aluno_tb_turma1
    FOREIGN KEY (id_turma )
    REFERENCES tb_turma (id_turma ),
  CONSTRAINT fk_tb_aluno_tb_usuario1
    FOREIGN KEY (id_usuario )
    REFERENCES tb_usuario (id_usuario ));


CREATE INDEX fk_tb_aluno_tb_usuario1 ON tb_matricula (id_usuario ASC) ;

CREATE INDEX fk_tb_aluno_tb_turma1 ON tb_matricula (id_turma ASC) ;


-- -----------------------------------------------------
-- Table tb_professor
-- -----------------------------------------------------

CREATE TABLE  tb_professor (
  id_professor SERIAL ,
  id_usuario INTEGER  NOT NULL ,
  PRIMARY KEY (id_professor) ,
  CONSTRAINT fk_tb_professor_tb_usuario1
    FOREIGN KEY (id_usuario )
    REFERENCES tb_usuario (id_usuario ));


CREATE INDEX fk_tb_professor_tb_usuario1 ON tb_professor (id_usuario ASC) ;


-- -----------------------------------------------------
-- Table tb_professor_tem_area_conhecimento
-- -----------------------------------------------------

CREATE TABLE  tb_professor_tem_area_conhecimento (
  id_professor INTEGER  NOT NULL ,
  id_area_conhecimento INTEGER  NOT NULL ,
  PRIMARY KEY (id_professor, id_area_conhecimento) ,
  CONSTRAINT fk_tb_professor_has_tb_area_conhecimento_tb_professor1
    FOREIGN KEY (id_professor )
    REFERENCES tb_professor (id_professor ),
  CONSTRAINT fk_tb_professor_has_tb_area_conhecimento_tb_area_conhecimento1
    FOREIGN KEY (id_area_conhecimento )
    REFERENCES tb_area_conhecimento (id_area_conhecimento ));


CREATE INDEX fk_tb_professor_has_tb_area_conhecimento_tb_area_conhecimento1 ON tb_professor_tem_area_conhecimento (id_area_conhecimento ASC) ;


-- -----------------------------------------------------
-- Table tb_turma_tem_professor
-- -----------------------------------------------------

CREATE TABLE  tb_turma_tem_professor (
  id_turma INTEGER  NOT NULL ,
  id_professor INTEGER  NOT NULL ,
  PRIMARY KEY (id_turma, id_professor) ,
  CONSTRAINT fk_tb_turma_has_tb_professor_tb_turma1
    FOREIGN KEY (id_turma )
    REFERENCES tb_turma (id_turma ),
  CONSTRAINT fk_tb_turma_has_tb_professor_tb_professor1
    FOREIGN KEY (id_professor )
    REFERENCES tb_professor (id_professor ));


CREATE INDEX fk_tb_turma_has_tb_professor_tb_professor1 ON tb_turma_tem_professor (id_professor ASC) ;


-- -----------------------------------------------------
-- Table tb_professor_tem_nivel
-- -----------------------------------------------------

CREATE TABLE  tb_professor_tem_nivel (
  id_professor INTEGER  NOT NULL ,
  id_nivel INTEGER  NOT NULL ,
  PRIMARY KEY (id_professor, id_nivel) ,
  CONSTRAINT fk_tb_professor_has_tb_nivel_tb_professor1
    FOREIGN KEY (id_professor )
    REFERENCES tb_professor (id_professor ),
  CONSTRAINT fk_tb_professor_has_tb_nivel_tb_nivel1
    FOREIGN KEY (id_nivel )
    REFERENCES tb_nivel (id_nivel ));


CREATE INDEX fk_tb_professor_has_tb_nivel_tb_nivel1 ON tb_professor_tem_nivel (id_nivel ASC) ;

