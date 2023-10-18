DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios(
    id              INTEGER PRIMARY KEY,
    email           TEXT NOT NULL,
    senha           TEXT NOT NULL,
    tipo            INTEGER
);

/*10 -> Usuario Comum
  50 -> Admin*/

insert into usuarios (email, senha, tipo) values ("genf.ifrn@gmail.com","123456",50);
insert into usuarios (email, senha, tipo) values ("usuario@gmail.com","123456",10);

DROP TABLE IF EXISTS turmas;

CREATE TABLE IF NOT EXISTS turmas (
    id              INTEGER PRIMARY KEY,
    turma           TEXT(15) NOT NULL
);

insert into turmas (turma) values ("INFO1M"),("INFO2M"),("INFO2V"),("INFO3M"),("INFO3V"),("INFO4M"),("ADM1M"),("ADM1V"),("ADM2V"),("ADM3M"),("ADM4V"),("QUIM1V"),("QUIM2M"),("QUIM3V"),("QUIM4M"),("QUIM4V");
insert into turmas (turma) values ("TPQ1V"),("TPQ3M"),("TPQ5V"),("TADS1V"),("TADS3V");

DROP TABLE IF EXISTS pedidos;

CREATE TABLE IF NOT EXISTS pedidos (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    tamanho         TEXT    NOT NULL,
    tipo            TEXT    NOT NULL,
    quantidade      INTEGER NOT NULL,
    turma_id       INTEGER,
    telefone        INTEGER NOT NULL,
    FOREIGN KEY (turma_id)
       REFERENCES turmas (id)
);

