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
        '347.774.370-94',
        '202cb962ac59075b964b07152d234b70',
        'ADM'
    ),
    (
        2,
        'Roberto Junior',
        'roberto@gmail.com',
        '669.791.160-37',
        '202cb962ac59075b964b07152d234b70',
        'Professor'
    ),
    (
        3,
        'Maria da Silva',
        'maria@gmail.com',
        '633.968.890-02',
        '202cb962ac59075b964b07152d234b70',
        'Aluno'
    );

-- Estrutura da tabela `diciplinas`
CREATE TABLE IF NOT EXISTS `disciplinas` (
    `id` int(2) NOT NULL AUTO_INCREMENT,
    `nome` varchar(45) NOT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO
    `disciplinas` (`id`, `nome`)
VALUES
    (1, 'Historia'),
    (2, 'Geografia');