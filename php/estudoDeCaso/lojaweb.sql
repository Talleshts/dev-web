-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jul-2023 às 15:13
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojaweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cpf` varchar(12) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `logradouro` varchar(100) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `tipo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cpf`, `nome`, `logradouro`, `cidade`, `estado`, `cep`, `telefone`, `data_nascimento`, `email`, `senha`, `rg`, `tipo`) VALUES
('111222333-00', 'Admin', 'Interno', 'Alegre', 'ES', '29500-000', '28999990001', '2023-01-01', 'admin@email', '1234', '987654321', 'C'),
('111777111-17', 'Aluno em Teste de Produção', 'Rua dos Programadores, 171', 'Alegre', 'ES', '29500000', '99171-0171', '2008-01-01', 'aluno@email', '1234', 'M-78890', 'A'),
('987654321-11', 'Maria da Penha', 'Rua Aleatória, 345 - apto. 301', 'Ouro Preto', 'MG', '30006-909', '3552-0002', '1998-02-11', 'maria@email', '111', '30976100', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricantes`
--

CREATE TABLE `fabricantes` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ramo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fabricantes`
--

INSERT INTO `fabricantes` (`codigo`, `nome`, `logradouro`, `cep`, `cidade`, `email`, `ramo`) VALUES
(23, 'Mikelly', '', '', '', '', ''),
(53, 'Hugo Boss', '', '', '', '', ''),
(113, 'Eletrolux', '', '', '', '', ''),
(304, 'Comercializa Produto', '', '', '', '', ''),
(702, 'Mondial', '', '', '', '', ''),
(825, 'Acer', '', '', '', '', ''),
(1000, 'Apple', '', '', '', '', ''),
(2001, 'Hugo Boss', '', '', '', '', ''),
(3112, 'JBL', '', '', '', '', ''),
(4002, 'GTSM', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id_item` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorTotal` float NOT NULL,
  `id_venda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id_item`, `id_produto`, `quantidade`, `valorTotal`, `id_venda`) VALUES
(1, 6, 2, 13198, 13),
(2, 8, 1, 73, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `produto_id` int(11) NOT NULL,
  `nome` varchar(120) CHARACTER SET latin1 NOT NULL,
  `data_fabricacao` date NOT NULL,
  `preco` float NOT NULL,
  `estoque` int(11) DEFAULT NULL,
  `descricao` text NOT NULL,
  `resumo` varchar(400) NOT NULL,
  `referencia` varchar(11) DEFAULT NULL,
  `cod_fabricante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `nome`, `data_fabricacao`, `preco`, `estoque`, `descricao`, `resumo`, `referencia`, `cod_fabricante`) VALUES
(1, 'Iphone 11 Apple (64gb) Preto', '2017-03-01', 3899, 25, 'Grave vídeos 4K, faça belos retratos e capture paisagens inteiras com o novo sistema de câmera dupla. Tire fotos incríveis com pouca luz usando o modo Noite. Veja cores fiéis em fotos, vídeos e jogos na tela. Liquid Retina de 6,1 polegadas', 'Grave vídeos 4K, faça belos retratos e capture paisagens inteiras com o novo sistema de câmera dupla. Tire fotos incríveis com pouca luz usando o modo Noite. Veja cores fiéis em fotos, vídeos e jogos na tela. Liquid Retina de 6,1 polegadas', '1611315984', 1000),
(2, 'Perfume Hugo Boss Bottled Masculino 100ml', '2020-09-26', 350, 34, 'Perfume Hugo Boss bottled masculino possui fragrância sofisticada e elegante. Perfeito para homens confiantes, audaciosos e que buscam sucesso nos negócios. Uma fragrância masculina amadeirada que inspira confiança.', 'Possui fragrância sofisticada e elegante. Perfeito para homens confiantes, audaciosos e que buscam sucesso nos negócios. Uma fragrância masculina amadeirada que inspira confiança.', '1655460610', 2001),
(3, 'Desenvolvimento Ágil Limpo - 1ª Ed.', '2020-02-05', 140, 12, 'Desenvolvimento Ágil Limpo - 1ª Ed.\', \'2020-02-05\', 140, 12, \'Valores e Princípios Ágeis para uma Nova Geração Quase 20 anos após a primeira apresentação do Manifesto Ágil, o lendário Robert C. Martin (“Uncle Bob”) reapresenta os valores e os princípios ágeis para uma nova geração — para programadores e não programadores. Martin, autor da obra Código Limpo, Arquitetura Limpa e de outros guias de desenvolvimento de software bastante influentes, estava lá quando o ágil nasceu. Agora, em Desenvolvimento Ágil Limpo: De volta às origens, ele procura esclarecer os mal-entendidos e os equívocos que, ao longo dos anos, dificultaram o uso do ágil e deturparam os objetivos originais dos princípios. Martin descreve o que é o ágil em termos claros: uma pequena disciplina que ajuda equipes pequenas a gerenciar pequenos projetos… com enormes impactos. Porque todo projeto grande é constituído de muitos pequenos projetos. Partindo de seus 50 anos de experiência em projetos de todos os tipos, o autor mostra como os princípios ágeis podem contribuir para trazer o verdadeiro profissionalismo para o desenvolvimento de software.', 'Valores e Princípios Ágeis para uma Nova Geração Quase 20 anos após a primeira apresentação do Manifesto Ágil, o autor reapresenta os valores e os princípios ágeis para programadores e não programadores.', '2768178068', 53),
(4, 'Geladeira/Refrigerador Duplex Tw42s, com Dispenser de Água 382l Inox - 110v', '2018-04-25', 2999, 17, 'Capacidade do Freezer e Flexível com 95 litros: São 95 litros para você guardar alimentos de diferentes formatos e tamanhos; Controle de Temperatura Externo Blue Touch: Facilidade para controlar a temperatura do refrigerador com o controle digital externo; Dispenser de água: Já a água gelada, não precisa de apresentações, e na geladeira Frost Free Inox TW42S ela nunca falta. Com um dispenser na porta, você só se preocupa em repor a água no recipiente, ela fica sempre geladinha e você sempre hidratado;\r\n', 'Capacidade do Freezer e Flexível com 95 litros para você guardar alimentos de diferentes formatos e tamanhos; Controle de Temperatura Externo Blue Touch e muito mais', '1371035915', 113),
(5, 'Smart Tv Led 55\'\' Lg 55nano86 Ultra Hd 4k', '2019-07-17', 4068, 10, 'A LG TV proporciona um novo jeito de ver TV. Com a Inteligência Artificial da LG e seu reconhecimento de voz, você consegue controlar sua TV sem complicações', 'A LG TV proporciona um novo jeito de ver TV. Com a Inteligência Artificial da LG e seu reconhecimento de voz, você consegue controlar sua TV sem complicações, com Smart TV e seus principais streamings.', '1730308429', 304),
(6, 'Notebook Acer Aspire 5 An515-44-R8hn Amd Ryzen 7-4800h 8gb', '2018-08-03', 6599, 7, 'O Notebook Acer Aspire 5 AN515-44-R8HN é a melhor opção para você que não abre de ter mais qualidade e desempenho no seu dia a dia. O Acer Aspire Nitro 5 possui a nova geração, com uma configuração que não treme para os jogos ', 'É a melhor opção para você que não abre de ter mais qualidade e desempenho no seu dia a dia. O Acer Aspire Nitro 5 possui a nova geração, com uma configuração que não treme para os jogos ', '3144172881', 825),
(7, 'Caixa De Som Bluetooth Jbl Charge 4 30w Preto', '2020-10-30', 861, 18, 'A JBL traz em muitas de suas versões de caixa de som portátil uma função que é muito interessante para quem gosta de som alto, trata-se do JBL Connect+ e a Caixa de Som Bluetooth JBL Charge 4 30W possui essa funcionalidade. Bom, agora você deve estar se questionando, mas para que serve esta função? Ela tem a finalidade de lhe fornecer sons ainda mais potentes, isso porque você pode conectar até 100 caixas de som que sejam compatíveis com a função e assim amplificar o som e fazer com sua festa fique muito mais animada e possibilita que todos que estiverem no ambiente ouçam as músicas da playlist com você, mesmo que estejam em uma área distante do ambiente, afinal você poderá multiplicar o poder de som da JBL em muitas vezes.', 'A JBL traz em muitas de suas versões de caixa de som portátil uma função que é muito interessante para quem gosta de som alto, trata-se do JBL Connect+ e a Caixa de Som Bluetooth JBL Charge 4 30W possui essa funcionalidade.', '6285684000', 3112),
(8, 'Kit Tênis E Relógio Led Sapatilha Casual Feminino Mikelly Caminhada Azul Marinho', '2021-01-13', 73, 21, 'Tênis e Sapatilhas são itens indispensáveis, confortáveis e práticas. Oferece uma caminhada confortável e aderência segura com visual esportivo e moderno. Com seu visual elegante, eleva seu look deixando você pronta para qualquer ocasião.\r\n\r\nTênis feminino fabricado em material sustentável, com excelente acabamento feito a mão, solado E.V.A de extrema qualidade leveza e conforto.', 'Oferece uma caminhada confortável e aderência segura com visual esportivo e moderno. Com seu visual elegante, eleva seu look deixando você pronta para qualquer ocasião.', '1370569173', 23),
(9, 'Air Fryer Mondial Af-34 3,2l 1270w Preta 220v', '2020-11-14', 409, 10, 'O Painel de aço inox da Air Fryer dá um toque descolado à sua cozinha. Toda a qualidade da Mondial em um design sofisticado! Agora você pode fritar seus alimentos preferidos com muita qualidade, sem usar óleo, sem fazer sujeira, sem deixar fumaça pela casa.\r\n\r\nPão de queijo, pastel, doces, carnes, legumes e outros pratos ficam prontos em minutos e servem toda a sua família. E olha que legal: tem opção de escolher a temperatura ideal até 200ºC, um timer de até 60 minutos que faz o aparelho desligar automaticamente após o término do preparo e ainda tem capacidade para até 3,2L.\r\n\r\nSuas lâmpadas-piloto indicam o funcionamento e o aquecimento do produto, sua cesta removível com revestimento antiaderente é segura e prática e facilita seu manuseio e limpeza para você não perder tempo.\r\n\r\nA Mondial é a marca de eletrodomésticos mais vendida do Brasil e a escolha de milhões de consumidores. Sempre inovando e buscando soluções para o bem-estar das pessoas, oferece uma linha completa de produtos.\r\n', 'O Painel de aço inox dá um toque descolado à sua cozinha, com a qualidade Mondial em um design sofisticado! Você pode fritar seus alimentos preferidos com muita qualidade, sem usar óleo, sem fazer sujeira, sem deixar fumaça pela casa.', '1520737145', 702),
(10, 'Bicicleta Gts Aro 29 Freio A Disco Câmbio Gtsm1 Tsi 21 Marchas E Amortecedor ', '2019-12-20', 1301, 7, 'Bicicleta GTSM1 Ride é ideal para quem quer começar a pedalar, realizar passeios e utilizar no dia-a-dia. São 4 tipos de tamanhos de quadro para você escolher, o peso total da bike é de 15kg montada. A Bike é direta da Fábrica Oficial com mais de 27 anos no mercado e garantia exclusiva com suporte diferenciado. Suporta até 100kgs.\r\n\r\nsistema de marchas\r\nsistema de marchas da bicicleta é um dos mais importantes componentes, é como se fosse o “coração” da sua bike. câmbios Gtsm1 TSI tem alta durabilidade e qualidade de sobra, ajudando você a ter alta performance em sua bike.', 'Bicicleta GTSM1 Ride é ideal para quem quer começar a pedalar, realizar passeios e utilizar no dia-a-dia. São 4 tipos de tamanhos de quadro para você escolher, o peso total da bike é de 15kg montada.', '1877108552', 4002),
(332, 'Produto 01', '2022-06-07', 140, 10, 'teste2', 'teste2', '100078', 1000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(12) DEFAULT NULL,
  `senha` varchar(13) DEFAULT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `tipo`) VALUES
(1, 'admin', 'admin01', 1),
(2, 'cliente', 'cliente01', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `cpf_cliente` varchar(15) NOT NULL,
  `dataVenda` date NOT NULL,
  `valorTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `cpf_cliente`, `dataVenda`, `valorTotal`) VALUES
(13, '111111', '2023-06-29', 13271);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_venda` (`id_venda`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produto_id`),
  ADD KEY `cod_fabricante` (`cod_fabricante`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `itens_ibfk_1` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id_venda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`cod_fabricante`) REFERENCES `fabricantes` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
