CREATE SCHEMA IF NOT EXISTS quaggaDB DEFAULT CHARACTER SET utf8 ;
USE quaggaDB ;

CREATE TABLE IF NOT EXISTS usuarios (
  usuarios_id INT NOT NULL AUTO_INCREMENT,
  usuarios_nick VARCHAR(100) NULL,
  usuarios_prof TINYINT(1) NOT NULL,
  PRIMARY KEY (usuarios_id))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS salas (
  salas_id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (salas_id))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS mensagens (
  mensagens_id INT NOT NULL AUTO_INCREMENT,
  mensagens_texto VARCHAR(255) NOT NULL,
  usuarios_id INT NULL,
  salas_salas_id INT NOT NULL,
  PRIMARY KEY (mensagens_id, salas_salas_id),
  INDEX fk_mensagens_usuarios_idx (usuarios_id ASC),
  INDEX fk_mensagens_salas1_idx (salas_salas_id ASC),
  CONSTRAINT fk_mensagens_usuarios
    FOREIGN KEY (usuarios_id)
    REFERENCES quaggaDB.usuarios (usuarios_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_mensagens_salas1
    FOREIGN KEY (salas_salas_id)
    REFERENCES quaggaDB.salas (salas_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;