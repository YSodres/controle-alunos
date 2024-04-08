# controle-alunos
Sistema de controle de alunos de uma escola

## Estrutura do Banco de Dados

A aplicação utiliza um banco de dados MySQL. Abaixo estão os comandos SQL para criar as tabelas necessárias:

```sql
CREATE TABLE Escolas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
    status INT NOT NULL
);

CREATE TABLE Turmas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    ano INT NOT NULL,
    nivel_ensino INT NOT NULL,
    serie INT NOT NULL,
    turno INT NOT NULL,
    escola_id INT NOT NULL,
    FOREIGN KEY (escola_id) REFERENCES Escolas(id)
);

CREATE TABLE Alunos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    telefone VARCHAR(15),
    email VARCHAR(255) NOT NULL,
    data_nascimento DATE,
    genero VARCHAR(1),
    escola_id INT,
    UNIQUE(email),
    FOREIGN KEY (escola_id) REFERENCES Escolas(id)
);

CREATE TABLE Alunos_Turmas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT,
    turma_id INT,
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id),
    FOREIGN KEY (turma_id) REFERENCES Turmas(id)
);