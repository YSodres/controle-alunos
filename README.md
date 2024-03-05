# controle-alunos
Sistema de controle de alunos de uma escola

## Estrutura do Banco de Dados

A aplicação utiliza um banco de dados MySQL. Abaixo estão os comandos SQL para criar as tabelas necessárias:

```sql
CREATE TABLE Escolas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    data_cadastro DATE NOT NULL,
    situacao VARCHAR(20) NOT NULL
);

CREATE TABLE Turmas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ano INT NOT NULL,
    nivel_ensino VARCHAR(20) NOT NULL,
    serie VARCHAR(20) NOT NULL,
    turno VARCHAR(20) NOT NULL,
    escola_id INT,
    FOREIGN KEY (escola_id) REFERENCES Escolas(id)
);

CREATE TABLE Alunos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    telefone VARCHAR(15),
    email VARCHAR(255) NOT NULL,
    data_nascimento DATE,
    genero VARCHAR(1),
    UNIQUE(email)
);

CREATE TABLE Alunos_Turmas (
    matricula INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT,
    turma_id INT,
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id),
    FOREIGN KEY (turma_id) REFERENCES Turmas(id)
);