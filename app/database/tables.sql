DROP TABLE IF EXISTS pedidos;

CREATE TABLE IF NOT EXISTS pedidos (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    tamanho         TEXT    NOT NULL,
    tipo            TEXT    NOT NULL,
    quantidade      INTEGER NOT NULL,
    turma           TEXT(15) NOT NULL,
    telefone        INTEGER NOT NULL
);

