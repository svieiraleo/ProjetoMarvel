## Marvel API com PHP
Esse projeto tem como objetivo principal a utilização da API da Marvel, com a opção de favoritar seu herói preferido e listar os mais votados

### Funcionalidades
- Retorna os personagens da Marvel através de uma busca por nome;
- Para cada personagem é mostrado o nome, uma imagem, uma descrição e 5 histórias em que eles aparecem;
- Ao digitar no campo de busca a API é consultada automaticamente 1 segundo após parar de escrever, ou ao clicar na tecla ENTER.

### Acesso à Marvel API
Antes de mais nada você irá precisar dos dados de acesso para a API da Marvel. Estes dados você irá conseguir no site https://developer.marvel.com. 
- **Crie uma conta:** é necessário criar uma conta, no link https://developer.marvel.com/account. Após isso, receberá as duas chaves(pública e privada).
- **Documentação:** é possível ler a documentação e fazer testes através do link https://developer.marvel.com/docs.

Os dados de acesso devem ser adicionados no arquivo 
>includes/MarvelApi/MarvelApi.php.

Copie eles do site e cole nas constantes da classe MarvelApi, como abaixo:
    
	class MarvelApi extends CallerApi
	{
		/**
		 * The Public Key from Marvel API.
		 *
		 * To get Marvel API Keys access https://developer.marvel.com/account.
		 *
		 * @var string
		 */
		protected const PUBLIC_KEY = 'coloque sua chave pública aqui';

		/**
		 * The Private Key from Marvel API.
		 *
		 * To get Marvel API Keys access https://developer.marvel.com/account.
		 *
		 * @var string
		 */
		private const PRIVATE_KEY = 'coloque sua chave privada aqui';

### Rodando
Para rodar o projeto você ira precisar do PHP e de um Servidor Web instalado em seu computador. 
Veja como instalalá-los em seu sistema operacional, neste link: https://www.php.net/manual/pt_BR/install.php.
Basta cloná-lo em no diretório www/ e acessá-lo pelo seu navegador preferido.

Além disso, é necessário criar um banco de dados. Logo após é necessário criar a tabela conforme script abaixo:
	
CREATE TABLE `personagem` (
  `id_personagem` int(11) NOT NULL,
  `favoritos` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_personagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4


Depois disso é preciso jogar os dados de conexão do seu banco no arquivo conecta_bd.php, como no exemplo abaixo:

	<?php
    	$serverName = "nome do servidor";
    	$dataBase = "nome do seu banco";
    	$userName = "nome do usuario";
    	$password = "";

    	//cria conexão
    	$strcon = mysqli_connect($serverName, 	$userName, $password, $dataBase);

    	//verifica conexão
    	if (!$strcon) {
        	die("Falha na conexão: " . mysqli_connect_error());
    	}
	?>
