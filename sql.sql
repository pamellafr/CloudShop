/*create database cloudShop;*/
/*create database cloudShopTeste;*/

use cloudShop;
/*use cloudShopTeste;*/

CREATE TABLE `clientes` (
	`id` int(11) NOT NULL auto_increment,
	`nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`pessoa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`cpf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`cnpj` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`nascimento` date NOT NULL,
	`telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`cep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`cartao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`titular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	`codigo` int(11) NOT NULL,
	`vencimento` date NOT NULL,
	primary key(id),
	UNIQUE (email),
	UNIQUE (cpf),
	UNIQUE (cnpj)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

drop table clientesTeste;

INSERT INTO `clientes` (`nome`, `email`, `senha`, `pessoa`, `cpf`, `cnpj`, `nascimento`, `telefone`, `endereco`, `cep`, `cartao`, `titular`, `codigo`, `vencimento`) VALUES
('Aline Stephanie Santos Gonçalves', 'marettialine@gmail.com', '$2y$10$KcQgRgiwndgQaH8VeZzs/uN1OxqMaAT28UpoqkpdzYGlH261WsHaK', 'fisica', '022.129.076-13', '022222', '2023-05-25', '35987121329', 'Rua Paulo Turato 104', '37704043', '97897', 'Aline Stephanie Santos Gonçalves', 37704043, '2023-05-24');
/* SENHA = 123deoliveira4 */

DELETE FROM `clientes` WHERE id = 1;

SELECT * from clientes;