-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 30-Dez-2020 às 11:16
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdai`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis_a`
--

CREATE TABLE `imoveis_a` (
  `referencia` int(11) NOT NULL,
  `tipo` varchar(512) NOT NULL,
  `titulo_do_anuncio` varchar(512) NOT NULL,
  `preco` float NOT NULL,
  `distrito` varchar(512) NOT NULL,
  `concelho` varchar(512) NOT NULL,
  `freguesia` varchar(512) NOT NULL,
  `zona` varchar(512) NOT NULL,
  `rua` varchar(512) NOT NULL,
  `andar` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipologia` int(11) DEFAULT NULL,
  `ncasas_de_banho` int(11) NOT NULL,
  `area_bruta` decimal(8,2) NOT NULL,
  `area_util` decimal(8,2) NOT NULL,
  `a_ce` varchar(512) NOT NULL,
  `a_ano_de_construcao` decimal(8,2) NOT NULL,
  `a_estado_conservacao` varchar(512) NOT NULL,
  `a_npisos` decimal(8,2) NOT NULL,
  `a_tipo_de_negocio` varchar(512) NOT NULL,
  `a_condominio` float NOT NULL,
  `a_descricao` text NOT NULL,
  `a_disponivel` tinyint(1) NOT NULL DEFAULT '1',
  `a_imagem1` varchar(512) DEFAULT NULL,
  `a_imagem2` varchar(512) DEFAULT NULL,
  `a_imagem3` varchar(512) DEFAULT NULL,
  `a_imagem4` varchar(512) DEFAULT NULL,
  `a_imagem5` varchar(512) DEFAULT NULL,
  `a_data_registo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `a_aprovacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imoveis_a`
--

INSERT INTO `imoveis_a` (`referencia`, `tipo`, `titulo_do_anuncio`, `preco`, `distrito`, `concelho`, `freguesia`, `zona`, `rua`, `andar`, `numero`, `tipologia`, `ncasas_de_banho`, `area_bruta`, `area_util`, `a_ce`, `a_ano_de_construcao`, `a_estado_conservacao`, `a_npisos`, `a_tipo_de_negocio`, `a_condominio`, `a_descricao`, `a_disponivel`, `a_imagem1`, `a_imagem2`, `a_imagem3`, `a_imagem4`, `a_imagem5`, `a_data_registo`, `a_aprovacao`) VALUES
(2, 'Apartamento', 'Apartamento T2 no Logo de Deus', 128000, 'Coimbra', 'Coimbra', 'Eiras e São Paulo de Frades', 'Logo de Deus', 'Rua Principal', 0, 86, 2, 1, '103.00', '67.00', 'D', '2004.00', 'Bom Estado', '1.00', 'Comprar', 27, 'Apartamento T2 com vistas deslumbrantes sobre a zona de Eiras. Inserido numa zona bastante calma.', 1, 'photos/IMG_7469.jpg', 'photos/IMG_7475.jpg', 'photos/IMG_7479.jpg', 'photos/IMG_7482.jpg', 'photos/IMG_7492.jpg', '2020-12-29 19:15:25', 1),
(3, 'Apartamento', 'Apartamento T3+1 no Bairro Norton de Matos', 180000, 'Coimbra', 'Coimbra', 'Santo António dos Olivais', 'Bairro Norton de Matos', 'Rua Adolfo Loureiro', 4, 25, 3, 2, '135.00', '116.00', 'C', '1964.00', 'Para Recuperar', '1.00', 'Comprar', 15, 'Apartamento T3+1 em zona central em Coimbra. Ideal para investimento.', 1, 'photos/img-0242_73e60b3d-996b-40c1-be62-e42dfd760688.jpg', 'photos/img-0249_2c16b277-a046-4202-852c-8aac76909184.jpg', 'photos/img-0251_ede52cdc-d4e1-459d-b64d-e427b0a56923.jpg', 'photos/img-0254_ec21b92d-7db9-4e3c-9188-1108a579731b.jpg', 'photos/img-0275_522af87a-dc45-4cbd-8b22-b4d1fd04ff9d.jpg', '2020-12-29 19:15:25', 1),
(4, 'Apartamento', 'Apartamento T3 - Tovim', 198000, 'Coimbra', 'Coimbra', 'Santo António dos Olivais', 'Tovim', 'Rua Quinta das Barreiras', 0, 1, 3, 2, '146.00', '111.00', 'C', '1997.00', 'Bom Estado', '1.00', 'Comprar', 20, 'Apartamento espaçoso e confortável na zona do Tovim. Conta com excelentes acessos e lugar de garagem.', 1, 'photos/img-7647_ad31ee93-25b5-4978-9916-de8daf04b8d3.jpg', 'photos/img-7648_7e6d3468-359b-40a7-b5cb-368c7a28b8e6.jpg', 'photos/img-7650_9b2e6104-15a8-4e1a-9e6c-830e56695c36.jpg', 'photos/img-7652_5cedafa3-2c67-41d8-a4f8-772b1d235abf.jpg', 'photos/img-7660_50482904-5787-4ac5-8967-5dd99d267b68.jpg', '2020-12-29 19:15:25', 1),
(5, 'Moradia', 'Moradia T6 em Celas, Coimbra', 735000, 'Coimbra', 'Coimbra', 'Santo António dos Olivais', 'Celas', 'Rua Doutor António José de Almeida', 0, 53, 6, 4, '452.00', '224.00', 'D', '1951.00', 'Bom Estado', '3.00', 'Comprar', 0, 'Imponente moradia T6 no centro da cidade.', 1, 'photos/image00001_d06bef58-fb9b-4409-bd0b-b26dc96f9f3e.jpg', 'photos/image00004_ec0c8515-4ee8-4d55-a7ab-3781be044763.jpg', 'photos/image00036_7987176f-38eb-4e35-8c50-400e09128c7b.jpg', 'photos/image00038_d1dce82a-0e42-47f7-9c51-60df55b8c684.jpg', 'photos/moradia_e5166934-9e83-421a-9278-55d28a4021a0.jpg', '2020-12-29 19:15:25', 1),
(6, 'Apartamento', 'T2 Santa Clara', 130000, 'Coimbra', 'Coimbra', 'Santa Clara e Castelo Viegas', 'Vale do Rosal', 'Rua Vale do Rosal', 2, 24, 2, 1, '96.00', '83.00', 'C', '2004.00', 'Bom Estado', '1.00', 'Comprar', 20, 'Excelente apartamento T2 no Vale do Rosal. Conta com bons acessos e encontra-se em excelente estado de conservação.', 1, 'photos/casa-de-banho_85a032f2-dea7-4f62-9c66-aaeddc61d9d5.jpg', 'photos/hall-1_f28ed81b-4136-4f0d-bfec-7fe005fd9ad7.jpg', 'photos/predio_3da5c095-0a19-4ef8-a924-74212e7fe61e.jpg', 'photos/quarto-2_91a469c7-66c8-462b-b7a6-88905a2e1820.jpg', 'photos/sala_5a729939-a1d4-48bc-88ae-3aa24dbf0343.jpg', '2020-12-29 19:15:25', 1),
(7, 'Apartamento', 'Apartamento T2 em Fala', 115000, 'Coimbra', 'Coimbra', 'São Martinho do Bispo e Ribeira de Frades', 'Fala', 'Rua Primeiro de Maio', 0, 50, 2, 1, '88.00', '70.00', 'C', '1990.00', 'Bom Estado', '1.00', 'Comprar', 18, 'Apartamento com garagem e parcela de terreno em Fala. Zona extremamente tranquila e com bons acessos.', 1, 'photos/1_88f7adf2-4cb7-47ec-9052-7712079292ff.jpg', 'photos/2_3f0be327-ff49-4361-afef-51be22197105.jpg', 'photos/4_2781d3a6-1e09-4b18-8c34-d7b062ce11bd.jpg', 'photos/7_caa75864-3f55-442b-88d5-9d3b0dd84ca0.jpg', 'photos/12_f5134e75-6e35-4e13-8894-10bf8659e462.jpg', '2020-12-29 19:15:25', 1),
(8, 'Moradia', 'Moradia T5 com Piscina Aquecida nos Carvalhais', 498000, 'Coimbra', 'Coimbra', 'Assafarge e Antanhol', 'Carvalhais', 'Rua da Liberdade', 0, 36, 5, 7, '460.00', '350.00', 'B', '2000.00', 'Bom Estado', '3.00', 'Comprar', 0, 'Fantástica moradia T5 nos Carvalhais. Conta com piscina aquecida, garagem dupla, anexos e acabamentos de luxo.', 1, 'photos/casa-carvalhais-6_4b9d4d01-3f70-4cd0-8182-ae2749a982ae.jpg', 'photos/casa-carvalhais-11_a262e4cb-9e29-41b3-8f3c-7420bf43d8ea.jpg', 'photos/casa-carvalhais-17_1997a177-11d7-43da-b937-505e25bee6e9.jpg', 'photos/casa-carvalhais-23_1684fc26-00b6-4c19-a4a6-c575ed97ccb1.jpg', 'photos/fachada_bf4995ff-c4ca-4f4b-bb47-ded046d8b838.jpg', '2020-12-29 19:18:27', 1),
(9, 'Apartamento', 'Requintada Pent-House T6 no Centro de Coimbra', 1100000, 'Coimbra', 'Coimbra', 'Sé Nova, Santa Cruz, Almedina e São Bartolomeu', 'Bairro Sousa Pinto', 'Rua Pedro Monteiro', 4, 120, 6, 4, '233.00', '200.00', 'A', '2015.00', 'Como Novo', '1.00', 'Comprar', 167, 'Requintada Pent-House T6 em Coimbra. Acabamentos de luxo e localização centralíssima neste imóvel de luxo.', 1, 'photos/dsc-0053_80203487-177f-4d59-89b6-7b2c403a2a1e.jpg', 'photos/rida-pro10-005-200902_ceb61c3b-5642-4339-a63a-82aba0a67436.jpg', 'photos/rida-pro10-011-200902_62f95727-75e4-438f-a7f5-f8a3389ceb47.jpg', 'photos/rida-pro10-031-200902_fd65f132-79c4-4a60-a870-99e652d0009e.jpg', 'photos/rida-pro10-043-200902_10be3854-ba99-4803-bd1a-2ef0ca30da28.jpg', '2020-12-29 19:18:52', 1),
(10, 'Apartamento', 'T2 Urbanização Panorama', 150000, 'Coimbra', 'Coimbra', 'Eiras e São Paulo de Frades', 'Monte Formoso', 'Urbanização Panorama', 2, 2, 2, 2, '95.00', '82.00', 'F', '2000.00', 'Bom Estado', '1.00', 'Comprar', 25, 'Excelente apartamento T2 na Urbanização Panorama. Divisões amplas e boa iluminação.', 1, 'photos/60e710bd-e63b-4a8b-808e-4de34347ae9f_d065ebe3-3719-4176-a7b8-6540c0ff1bb8.jpg', 'photos/64b92f95-909c-4a37-859d-ede23c09a074_99fdb5ce-d15e-4e20-8627-ec112dc090b8.jpg', 'photos/94fffcf8-5256-4de4-b42e-9b4bb0e7589f_ca75e9b3-eac2-45cd-b610-1d691c6eb9fe.jpg', 'photos/3154a979-e5f9-4f78-ac60-95c0f69c19e9_30f1b75b-96b3-4301-94e7-3a3960fcf5ab.jpg', 'photos/3964b6dc-bda3-44e2-9101-147bbce0b1ac_204059a0-a559-4074-880d-219a6f3e5d98.jpg', '2020-12-29 19:18:52', 1),
(11, 'Moradia', 'Moradia em Penela', 125000, 'Coimbra', 'Penela', 'São Miguel, Santa Eufémia e Rabaçal', 'Santa Eufémia', 'Nicho de S. Miguel Arcanjo', 0, 0, 4, 2, '457.00', '240.00', 'F', '1957.00', 'Para Recuperar', '2.00', 'Comprar', 0, 'Espaçosa moradia T4 em Penela. Inserida num terreno de cerca de 5000 metros quadrados. Potencial para investimento em turismo rural.', 1, 'photos/photo-2020-06-30-19-38-12_5290bc53-0e2d-4f4d-ae90-52f95e2cd4e6.jpg', 'photos/photo-2020-06-30-19-38-13_a4f6044b-c753-432a-b5d1-02f09e70a0a1.jpg', 'photos/photo-2020-06-30-19-38-15-2_79037702-91c6-4c41-803d-8571c6d3602c.jpg', 'photos/photo-2020-06-30-19-38-16_5a2060bf-246e-4506-8bcb-e571c76fdf55.jpg', 'photos/photo-2020-06-30-19-38-19-2_8fd984b5-54ef-42a4-a942-76afc3fc32a1.jpg', '2020-12-29 19:18:52', 1),
(12, 'Moradia', 'Moradia T5 em Assafarge', 280000, 'Coimbra', 'Coimbra', 'Assafarge e Antanhol', 'Assafarge', 'Rua do Cruzeiro', 0, 8, 5, 4, '322.00', '285.00', 'C', '1998.00', 'Bom Estado', '2.00', 'Comprar', 0, 'Moradia T5 com 287m² de área de construção inserida num lote de 948m² a escassos minutos do centro de Coimbra. Composta por 2 salas em que uma delas é a sala de bilhar, cozinha com 26m². Conta ainda com 2 suites, escritório e mais 2 casas de banho.', 1, 'photos/img-0977-hdr-1_fa95f7bd-8151-4cc9-81a7-04e46ce5da2b.jpg', 'photos/img-1027-hdr-1_ed18d2f2-6b6f-4288-8a85-0cf902374317.jpg', 'photos/img-1037-hdr-1_2713ec44-9b8c-45eb-a112-fbd9b49eb0b3.jpg', 'photos/img-1082-hdr-1_cf2ea15b-afb9-46d8-9bc0-612a696a0b0b.jpg', 'photos/whatsapp-image-2020-05-18-at-18-04-21_959b9170-669d-4ebf-9431-ad151e275e4d.jpg', '2020-12-29 19:18:52', 1),
(13, 'Apartamento', 'Apartamento T3 com sotão na Rua do Brasil', 175000, 'Coimbra', 'Coimbra', 'Sé Nova, Santa Cruz, Almedina e São Bartolomeu', 'Rua do Brasil', 'Rua do Brasil', 2, 106, 3, 2, '110.00', '94.00', 'D', '2004.00', 'Bom Estado', '2.00', 'Comprar', 0, 'Apartamento T3 com sótão em plena Rua do Brasil com o aparcamento privado, muito bem localizado. Próximo de comércio, transportes, escolas. Encontra-se em bom estado de conservação.', 1, 'photos/img-0093_55645e53-423e-4fc1-95ee-5c4c15072fcf.jpg', 'photos/img-0146_3c9e532f-121f-42f7-a3b1-a2ca0397e9b5.jpg', 'photos/img-0157_5635ac5f-7e8d-4f77-b46b-656a2f2ec116.jpg', 'photos/img-0174_dfc97fef-97d4-468e-b622-5eca7aaf4249.jpg', 'photos/img-0187_5caea468-3da9-429b-98cf-4eafca260949.jpg', '2020-12-29 19:18:52', 1),
(14, 'Terrenos', 'Terreno com projeto aprovado', 29500, 'Aveiro', 'Mealhada', 'Casal Comba', 'Casal Comba', 'Rua de Cima', 0, 0, 0, 0, '723.00', '0.00', 'Z', '0.00', 'Não Aplicável', '0.00', 'Comprar', 0, 'Magnifico terreno com 723 m2, com o projeto aprovado para construção de uma moradia T4 de 2 pisos com o anexo que tem 1 lugar de estacionamento e 2 divisões para arrumo.', 1, 'photos/satelite_6d96bccb-c9f2-4500-9f1b-3c088e52650c.jpg', 'photos/whatsapp-image-2019-08-07-at-12-37-17-2-_168a9f44-acfd-4854-a970-920c68c78470.jpg', 'photos/whatsapp-image-2019-08-07-at-12-46-29_3291cdd9-b8f5-486f-a67f-a1d0e649b93f.jpg', 'photos/whatsapp-image-2019-08-07-at-12-46-29-1-_990ec2a5-a9f3-4a1a-90d1-d987d2aed300.jpg', 'photos/whatsapp-image-2019-08-07-at-12-46-29-3-_33a33691-cb3b-450a-9a65-65b24847b8b5.jpg', '2020-12-29 19:18:52', 1),
(15, 'Apartamento', 'Apartamento T2 em Eiras', 87000, 'Coimbra', 'Coimbra', 'Eiras e São Paulo de Frades', 'Estrada de Eiras', 'Rua Seabra de Albuquerque', 1, 45, 2, 1, '101.00', '82.00', 'D', '1973.00', 'Bom Estado', '1.00', 'Comprar', 15, 'Apartamento T2, com garagem, em bom estado de conservação. Imóvel com duas frentes, o que lhe garante uma boa exposição solar: Nascente/Poente.', 1, 'photos/img-1640_7efeaf80-7cb0-4026-b171-4679b0e406aa.jpg', 'photos/img-1645_0838cfcf-3d19-4b5b-b95b-13ccc5ca72a5.jpg', 'photos/img-1650_0b4c99ec-0dc5-40c3-8eef-0edd313e4295.jpg', 'photos/img-1682_66589c31-b339-4684-96b3-afcc1f437a36.jpg', 'photos/img-1707_a2eb78f3-b5a2-4fe3-80f0-a6d490d0df72.jpg', '2020-12-29 19:18:52', 1),
(16, 'Moradia', 'Moradia junto à Av. Dias da Silva', 460000, 'Coimbra', 'Coimbra', 'Santo António dos Olivais', 'Celas', 'Rua Padre Américo', 0, 83, 4, 4, '350.00', '320.00', 'D', '1982.00', 'Bom Estado', '4.00', 'Comprar', 0, 'Excelente Moradia com 4 quartos, 4 salas e 4 wc´s em pleno coração da Cidade de Coimbra. Vistas deslumbrantes para a Cidade (zona da Solum).', 1, 'photos/fbd9491b-b8e1-489e-84fc-cea894a10faf_5145c72d-71e7-4cf9-9666-04f195b260e8.jpg', 'photos/img-5018_1428b315-efc7-438b-b4b9-b5359172b968.jpg', 'photos/img-5029_9e299f0a-367e-40f9-8c4b-ac9b69b441ea.jpg', 'photos/img-5036_977ec3bd-afee-47ae-a773-8fc1fd7d2d63.jpg', 'photos/img-5053_27898d80-46af-4dba-80de-ae19489a1370.jpg', '2020-12-29 19:18:52', 1),
(17, 'Apartamento', 'Apartamento T2 Solum', 170000, 'Coimbra', 'Coimbra', 'Santo António dos Olivais', 'Solum', 'Rua Feliciano Castilho', 8, 111, 2, 1, '80.00', '72.00', 'D', '1983.00', 'Bom Estado', '1.00', 'Comprar', 30, 'Excelente apartamento T2 numa das zonas privilegiadas de Coimbra. Áreas generosas com vista sobre a Solum.', 1, 'photos/5a066b67-3f63-4b3f-a013-89a0a4723e32_03a9e08c-4f1b-4be0-89e1-8fa4089cb2ec.jpg', 'photos/6998d2c3-adef-4c75-b811-ef772b6e34b2_a7eed977-507e-49be-a5f8-8c22afb03c1c.jpg', 'photos/7588c646-bfa6-45f0-90fa-8657cd7ba6a0_190b428a-8b1d-4316-aff2-db160cf4d5ce.jpg', 'photos/93794d48-e942-4756-b28b-017bddd2b35b_5646378c-c25a-4a2f-901d-002e504d19ff.jpg', 'photos/b5716189-9376-4ea3-9208-306566bc4ce5_40c7aff5-2161-4c09-82ff-87feaf9d9300.jpg', '2020-12-30 11:14:34', 0),
(18, 'Apartamento', 'Apartamento T3 + Sotão em Aguim, Anadia', 110000, 'Aveiro', 'Anadia', 'Tamegos, Aguim e Óis do Bairro', 'Aguim', 'Rua da Portela', 1, 35, 3, 2, '205.00', '94.00', 'D', '1994.00', 'Bom Estado', '2.00', 'Comprar', 15, 'Apartamento T3 situado no centro de Aguim. Excelente para habitação própria ou para investimento.', 1, 'photos/5a066b67-3f63-4b3f-a013-89a0a4723e32_03a9e08c-4f1b-4be0-89e1-8fa4089cb2ec.jpg', 'photos/6998d2c3-adef-4c75-b811-ef772b6e34b2_a7eed977-507e-49be-a5f8-8c22afb03c1c.jpg', 'photos/7588c646-bfa6-45f0-90fa-8657cd7ba6a0_190b428a-8b1d-4316-aff2-db160cf4d5ce.jpg', 'photos/93794d48-e942-4756-b28b-017bddd2b35b_5646378c-c25a-4a2f-901d-002e504d19ff.jpg', 'photos/b5716189-9376-4ea3-9208-306566bc4ce5_40c7aff5-2161-4c09-82ff-87feaf9d9300.jpg', '2020-12-30 11:14:34', 0),
(19, 'Apartamento', 'Apartamento T2 na Estrada de Coselhas', 77500, 'Coimbra', 'Coimbra', 'Sé Nova, Santa Cruz, Almedina e São Bartolomeu', 'Coselhas', 'Estrada de Coselhas', 0, 73, 2, 1, '95.00', '85.00', 'F', '1998.00', 'Bom Estado', '1.00', 'Comprar', 15, 'Apartamento em zona muito tranquila e bem servida de transportes públicos. Localiza-se muito perto, tanto da Baixa da cidade como dos Hospitais da Universidade.', 1, 'photos/whatsapp-image-2020-10-23-at-18-18-45-1-_a5311bf8-6de2-4a19-8b97-a738228090d1.jpg', 'photos/whatsapp-image-2020-10-23-at-18-18-45-2-_2e6748b5-33b9-4a9f-b0b2-c72753cc5da3.jpg', 'photos/whatsapp-image-2020-10-23-at-18-18-45-9-_cc987feb-a662-4f84-82bc-99669cc4d1f7.jpg', 'photos/whatsapp-image-2020-10-23-at-18-18-45-13-_506c790c-1411-4aa9-b13d-6e6f7dbd417d.jpg', 'photos/whatsapp-image-2020-10-23-at-18-18-45-15-_fc09c5e7-6cb8-4fc1-a5d4-974322d7a788.jpg', '2020-12-29 19:18:52', 1),
(20, 'Apartamento', 'Apartamento T3 com sotão', 147500, 'Coimbra', 'Montemor-o-Velho', 'Pereira', 'Urbanização S. Luís', 'Urbanização São Luís', 2, 74, 3, 3, '170.00', '130.00', 'B', '2007.00', 'Bom Estado', '2.00', 'Comprar', 18, 'Apartamento duplex em Pereira. Conta também com garagem, estando em ótimo estado de conservação.', 1, 'photos/img-5299_3a743cca-a6b5-440e-b5c0-724304748f89.jpg', 'photos/img-5302_4943f3b0-1ade-4e75-9bd4-bd2ba2ee790a.jpg', 'photos/img-5308_ed8f5b1e-e528-4103-b665-ea4393c08161.jpg', 'photos/img-5313_fd616128-c0aa-4428-b8c7-a3ed76fb32f5.jpg', 'photos/img-5318_b1368fb9-dde7-40fb-bd4e-7e24dada2fc6.jpg', '2020-12-29 19:18:52', 1),
(21, 'Apartamento', 'T3 no Vale das Flores', 187500, 'Coimbra', 'Coimbra', 'Santo António dos Olivais', 'Vale das Flores', 'Avenida Doutor Mendes da Silva', 1, 17, 3, 2, '143.00', '125.00', 'D', '1993.00', 'Bom Estado', '1.00', 'Comprar', 20, 'Apartamento com duas frentes situado no centro do Vale das Flores. Sala com lareira e cozinha totalmente equipada.', 1, 'photos/casa-de-banho_70f6a646-5e80-4b5b-8367-36fa0dd7ea4f.jpg', 'photos/cozinha_5e2639fa-f463-4761-a0e2-cda470e49f9c.jpg', 'photos/hall-apto_88bccb1e-1055-45d7-8e30-2e00f9b75c8e.jpg', 'photos/hall-de-entrada_d2253cfe-c31e-4161-8854-975beba274f5.jpg', 'photos/sala_686fb52a-ea16-4347-99d5-107f8f743864.jpg', '2020-12-29 19:18:52', 1),
(22, 'Apartamento', 'T1 no Monte Formoso', 350, 'Coimbra', 'Coimbra', 'Eiras e São Paulo de Frades', 'Monte Formoso', 'Praceta Cidade de Salamanca', 4, 9, 1, 1, '45.00', '40.00', 'C', '1973.00', 'Bom Estado', '1.00', 'Arrendar', 15, 'Praceta Cidade de Salamanca', 1, 'photos/119081794-2901440756627850-7701490060149187009-n_c6c8400b-d5e1-4ee8-9853-fb2a386e56d3.jpg', 'photos/img-20201216-105602_1baa0b1c-3062-4c30-a16d-88784b24b5f4.jpg', 'photos/img-20201216-105628_be3a80d1-1307-4c41-8180-dfdb9accdf6c.jpg', 'photos/img-20201216-105649_4b0080a7-a9bd-4714-80e2-3aa2d61afeb6.jpg', 'photos/img-20201216-105811_8704e359-c407-48df-9045-8340baa3b4f3.jpg', '2020-12-29 19:18:52', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imoveis_a`
--
ALTER TABLE `imoveis_a`
  ADD PRIMARY KEY (`referencia`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imoveis_a`
--
ALTER TABLE `imoveis_a`
  MODIFY `referencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
