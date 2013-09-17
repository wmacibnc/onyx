CREATE TABLE contaPagar (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  datavencimento DATE NULL,
  datapagamento DATE NULL,
  nome VARCHAR(255) NULL,
  datacadastro TIMESTAMP NULL,
  valor FLOAT NULL,
  observacao TEXT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE contaReceber (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  datavencimento DATE NULL,
  datapagamento DATE NULL,
  valor FLOAT NULL,
  observacao TEXT NULL,
  datacadastro TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE curso (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  descricao VARCHAR(255) NULL,
  ementa VARCHAR(255) NULL,
  valor VARCHAR(255) NULL,
  observacao TEXT NULL,
  grupo_id INTEGER UNSIGNED NULL,
  data_cadastro TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE grupo_curso (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  observacao TEXT NULL,
  data_cadastro TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE grupo_usuario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE modulo (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  datacadastro TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE modulo_usuario_curso (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  usuario_id INTEGER UNSIGNED NULL,
  curso_id INTEGER UNSIGNED NULL,
  modulo_id INTEGER UNSIGNED NULL,
  periodoatual INTEGER UNSIGNED NULL,
  periodoinicial INTEGER UNSIGNED NULL,
  periodofinal INTEGER UNSIGNED NULL,
  PRIMARY KEY(id)
);

CREATE TABLE pagina (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  conteudo TEXT NULL,
  data_cadastro TIMESTAMP NULL,
  pagina VARCHAR(255) NULL,
  datacadastro TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE parametrizacao (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  parametro VARCHAR(255) NULL,
  valor VARCHAR(255) NULL,
  datacadastro TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE situacao (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE situacao_usuario_curso (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE usuario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  login VARCHAR(255) NULL,
  senha VARCHAR(255) NULL,
  situacao_id INTEGER UNSIGNED NULL,
  grupo_id INTEGER UNSIGNED NULL,
  PRIMARY KEY(id)
);

CREATE TABLE usuario_curso (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  usuario_id INTEGER UNSIGNED NULL,
  curso_id INTEGER UNSIGNED NULL,
  situacao_id INTEGER UNSIGNED NULL,
  modulo_id INTEGER UNSIGNED NULL,
  PRIMARY KEY(id)
);


