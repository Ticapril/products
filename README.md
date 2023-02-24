CRD com PHP orientado a objetos, PDO e MySQL - Scandiweb
Código da implementação de um CRUD com PHP orientado a objetos e MySQL.
Banco de dados

1 - Passo: Crie um banco de dados e execute as instruções SQLs abaixo para criar a tabela vagas:
--
Banco de dados: `scandiweb`
--
-- --------------------------------------------------------
Estrutura da tabela `products`
--
CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `measure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

Estrutura da tabela `product_specific`
--
CREATE TABLE `product_specific` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
Extraindo dados da tabela `product_specific`
--
INSERT INTO `product_specific` (`id`, `name`) VALUES
(1, 'DVD'),
(2, 'Book'),
(3, 'Furniture');
-- --------------------------------------------------------
Configuração
--
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1;
-- --------------------------------------------------------

As credenciais do banco de dados estão no arquivo ./app/Db/Database.php e você deve alterar para as configurações do seu ambiente (HOST, NAME, USER e PASS).
--
Composer
--
Para a aplicação funcionar, é necessário rodar o Composer para que sejam criados os arquivos responsáveis pelo autoload das classes.

Caso não tenha o Composer instalado, baixe pelo site oficial: https://getcomposer.org/download

Para rodar o composer, basta acessar a pasta do projeto e executar o comando abaixo em seu terminal:
--
composer install
--
Após essa execução uma pasta com o nome vendor será criada na raiz do projeto e você já poderá acessar pelo seu navegador.
