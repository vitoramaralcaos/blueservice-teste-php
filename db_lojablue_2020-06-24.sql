# ************************************************************
# Sequel Pro SQL dump
# Vers�o 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: mysql669.umbler.com (MySQL 5.6.40)
# Base de Dados: db_lojablue
# Tempo de Gera��o: 2020-06-24 13:03:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela tb_carrinho_compras
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_carrinho_compras`;

CREATE TABLE `tb_carrinho_compras` (
  `id_carrinho` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_produto_referencia` int(11) DEFAULT NULL,
  `nome_produto` varchar(100) DEFAULT NULL,
  `descricao_produto` text,
  `preco_produto` decimal(10,2) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `session_id` text,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_carrinho`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_carrinho_compras` WRITE;
/*!40000 ALTER TABLE `tb_carrinho_compras` DISABLE KEYS */;

INSERT INTO `tb_carrinho_compras` (`id_carrinho`, `id_produto_referencia`, `nome_produto`, `descricao_produto`, `preco_produto`, `qtd`, `session_id`, `status`)
VALUES
	(1,9,'Mac Mini','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"far fa-arrow-alt-circle-right\"></span> xxxx</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"far fa-arrow-alt-circle-right\"></span> xxxx</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"far fa-arrow-alt-circle-right\"></span> xxx</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"far fa-check-circle\"></span> xxxxx</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"fab fa-apple\"></span>xxxx</p>\r\n\r\n<p>&nbsp;</p>\r\n',4500.00,2,'61dc4b9b0ba986bc9e6c859f5e1d14ba',1),
	(2,1,'Fone Bluetooth','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</p>\r\n\r\n<ol>\r\n	<li>fsdfdsfdsfsdf</li>\r\n	<li>dsfsdfdsf</li>\r\n	<li>dsfsdfsdfsdf</li>\r\n	<li>dsfsdfdsfdsf</li>\r\n</ol>\r\n',100.00,1,'61dc4b9b0ba986bc9e6c859f5e1d14ba',99),
	(3,1,'Fone Bluetooth','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</p>\r\n\r\n<ol>\r\n	<li>fsdfdsfdsfsdf</li>\r\n	<li>dsfsdfdsf</li>\r\n	<li>dsfsdfsdfsdf</li>\r\n	<li>dsfsdfdsfdsf</li>\r\n</ol>\r\n',100.00,1,'61dc4b9b0ba986bc9e6c859f5e1d14ba',1);

/*!40000 ALTER TABLE `tb_carrinho_compras` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_categorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_categorias`;

CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `data_lanc` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url_amigavel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_categorias` WRITE;
/*!40000 ALTER TABLE `tb_categorias` DISABLE KEYS */;

INSERT INTO `tb_categorias` (`id_categoria`, `nome`, `status`, `data_lanc`, `url_amigavel`)
VALUES
	(1,'Acessórios para celular é ááàãâä',99,'2020-06-23 22:39:25','acessorios-para-celular-e-aaaaaa'),
	(2,'Informática',1,'2020-06-22 09:56:27','informatica'),
	(3,'Fones de ouvido',1,'2020-06-22 09:56:33','fones-de-ouvido'),
	(4,'Smartphones',1,'2020-06-22 09:56:50','smartphones'),
	(5,'Peças para celular',1,'2020-06-22 09:56:41','pecas-para-celular'),
	(6,'teste é',99,'2020-06-22 19:13:00',NULL),
	(7,'PC',1,'2020-06-24 09:39:54','pc'),
	(8,'Acessórios para celulares',99,'2020-06-24 09:40:40','acessorios-para-celulares'),
	(9,'cat 9',99,'2020-06-24 09:41:07','cat-9'),
	(10,'cat 10',99,'2020-06-24 09:40:45','cat-10'),
	(11,'cat 11',99,'2020-06-24 09:40:54','cat-11'),
	(12,'cat 12',99,'2020-06-24 09:41:02','cat-12');

/*!40000 ALTER TABLE `tb_categorias` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_pedidos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_pedidos`;

CREATE TABLE `tb_pedidos` (
  `id_pedido` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` text,
  `endereco_entrega` text,
  `nome_comprador` varchar(100) DEFAULT NULL,
  `email_comprador` varchar(100) DEFAULT NULL,
  `tel_comprador` varchar(50) DEFAULT NULL,
  `cel_comprador` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `data_lanc` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_pedidos` WRITE;
/*!40000 ALTER TABLE `tb_pedidos` DISABLE KEYS */;

INSERT INTO `tb_pedidos` (`id_pedido`, `session_id`, `endereco_entrega`, `nome_comprador`, `email_comprador`, `tel_comprador`, `cel_comprador`, `status`, `data_lanc`)
VALUES
	(1,'61dc4b9b0ba986bc9e6c859f5e1d14ba','Rua Rua Paulista Número: 100 Bairro: Centro Cidade:São Paulo UF: SP CEP: 00000-000','Vitor Amaral','vitor.amaral.caos@gmail.com','1111111','1111111',1,'2020-06-24 09:58:22');

/*!40000 ALTER TABLE `tb_pedidos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_produtos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_produtos`;

CREATE TABLE `tb_produtos` (
  `id_produto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text,
  `imagem` varchar(50) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `id_categorias` text,
  `status` tinyint(1) DEFAULT NULL,
  `data_lanc` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url_amigavel` varchar(100) DEFAULT NULL,
  `destaque` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_produtos` WRITE;
/*!40000 ALTER TABLE `tb_produtos` DISABLE KEYS */;

INSERT INTO `tb_produtos` (`id_produto`, `nome`, `descricao`, `imagem`, `preco`, `id_categorias`, `status`, `data_lanc`, `url_amigavel`, `destaque`)
VALUES
	(1,'Fone Bluetooth','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</p>\r\n\r\n<ol>\r\n	<li>fsdfdsfdsfsdf</li>\r\n	<li>dsfsdfdsf</li>\r\n	<li>dsfsdfsdfsdf</li>\r\n	<li>dsfsdfdsfdsf</li>\r\n</ol>\r\n','imagem-produto.jpg',100.00,'3/5',1,'2020-06-24 09:47:32','fone-bluetooth',1),
	(2,'Produto XX','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</p>\r\n','imagem-produto.jpg',50.00,'3/2/7',1,'2020-06-24 09:47:31','produto-xx',1),
	(3,'Teclado Gamer','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis.</p>\r\n\r\n<p>Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</p>\r\n','imagem-produto.jpg',350.00,'2/7',1,'2020-06-24 09:52:05','teclado-gamer',1),
	(4,'Tela de celular','<p><strong>Lorem ipsum dolor sit amet, </strong></p>\r\n\r\n<p><u>consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem. </u></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis.</p>\r\n\r\n<p>Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</p>\r\n','imagem-produto.jpg',10.00,'2/5',1,'2020-06-24 09:52:05','iphone-x',1),
	(5,'iPhone X','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</p>\r\n','imagem-produto.jpg',5000.00,'4',1,'2020-06-24 09:52:06','iphone-x',1),
	(6,'TV Smart','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</p>\r\n','imagem-produto.jpg',3000.00,'2',1,'2020-06-24 09:52:10','tv-smart',1),
	(7,'PC Gamer','<div style=\"background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem.</div>\r\n','imagem-produto.jpg',4000.00,'2',1,'2020-06-24 09:52:59','pc-gamer',NULL),
	(8,'Monitor X','<p><span class=\"marker\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem. </span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><s>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus dignissim venenatis semper ut sapien. Nunc vel dui pulvinar, fermentum nulla nec, posuere mauris. Ut porta tellus faucibus ex ultrices tincidunt quis in neque. Morbi mi ante, tempus nec est sed, lobortis tincidunt lectus. Morbi eget nisl et elit imperdiet suscipit in nec leo. Pellentesque bibendum nibh eu ipsum lacinia, eget cursus felis mollis. Aliquam maximus enim eu urna porta lobortis. Proin ac nisi mollis enim eleifend laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel dolor eu dolor vulputate elementum et ac sem. </s></p>\r\n','imagem-produto.jpg',3500.00,'2/7',1,'2020-06-24 09:53:43','monitor-x',NULL),
	(9,'Mac Mini','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec ex nec turpis congue sagittis. Nulla a enim feugiat, aliquet urna sed, luctus magna. Ut vitae arcu quis lacus</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"far fa-arrow-alt-circle-right\"></span> xxxx</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"far fa-arrow-alt-circle-right\"></span> xxxx</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"far fa-arrow-alt-circle-right\"></span> xxx</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"far fa-check-circle\"></span> xxxxx</p>\r\n\r\n<p><span aria-hidden=\"true\" class=\"fab fa-apple\"></span>xxxx</p>\r\n\r\n<p>&nbsp;</p>\r\n','imagem-produto.jpg',4500.00,'2/7',1,'2020-06-24 09:55:36','mac-mini',1);

/*!40000 ALTER TABLE `tb_produtos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_usuario_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_usuario_admin`;

CREATE TABLE `tb_usuario_admin` (
  `id_usuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tb_usuario_admin` WRITE;
/*!40000 ALTER TABLE `tb_usuario_admin` DISABLE KEYS */;

INSERT INTO `tb_usuario_admin` (`id_usuario`, `nome`, `login`, `senha`)
VALUES
	(1,'Vitor Amaral','admin','21232f297a57a5a743894a0e4a801fc3');

/*!40000 ALTER TABLE `tb_usuario_admin` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
