SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
    time_zone = "+00:00";

-- Database: `getprofes`
-- Estrutura da tabela `usuarios`
CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` int(2) NOT NULL AUTO_INCREMENT,
    `nome` varchar(45) NOT NULL,
    `email` varchar(110) NOT NULL,
    `cpf` varchar(14) NOT NULL,
    `senha` varchar(100) NOT NULL,
    `nivel` varchar(9),
    PRIMARY KEY (`id`)
);
INSERT INTO
    `usuarios` (
        `id`,
        `nome`,
        `email`,
        `cpf`,
        `senha`,
        `nivel`
    )
VALUES
    (
        1,
        'Dario Junior',
        'dario@gmail.com',
        '021.031.499-20',
        '123',
        'ADM'
    );