# Lista_Compra
Lista de Compra Online

Lista de compra online, ótimo exemplo para quem esta começando e/ou uma boa ideia para quem esquece o que tem que comprar.

Para criar a tabela utilize o codigo abaixo:
_______________________________________________________________________________________
CREATE DATABASE IF NOT EXISTS BD_Compra;

USE BD_Compra;

CREATE TABLE IF NOT EXISTS TB_Item (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Data DATETIME NOT NULL,
    Item VARCHAR(100) NOT NULL,
    Quantidade INT NOT NULL
);

_________________________________________________________________________________________
