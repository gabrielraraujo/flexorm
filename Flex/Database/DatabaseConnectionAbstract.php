<?php

	namespace Flex\Database;

	class DatabaseConnectionAbstract
	{
		/**
		 * Data Source Name
		 * Registro que armazena as informações necessárias para fazer a conexão com o banco de dados.
		 * @var String
		 * @access private
		 */
		private $dsn = "";
		
		/**
		 * Server
		 * Endereço do servidor MySQL para conexão
		 * @var String
		 * @access private
		 */
		private $server = "";
		
		/**
		 * Username
		 * Nome de usuario do banco de dados
		 * @var String
		 * @access private
		 */
		private $username = "";
		
		/**
		 * Port
		 * Porta para conexão, padrão estabelecido '3306'
		 * @var int
		 * @access private
		 */
		private $port = 3306;
		
		/**
		 * Password
		 * Senha do usuario do banco de dados
		 * @var String
		 * @access private
		 */
		private $password = "";
		
		/**
		 * Database
		 * Nome do banco atual
		 * @var String
		 */
		private $database = "";
		
		/**
		 * Construtor
		 * 
		 * Gera o DSN e inicia automaticamente a conexão com os parametros passados
		 * 
		 * @param String $server Endereço do servidor
		 * @param String $username Usuario do banco
		 * @param String $password Senha do usuario
		 * @param String $database Nome do banco de dados
		 * @param int $port Porta de conexão
		 */
		public function __construct($server = "", $username = "", $password = "", $database = "", $port = 3306){
			
			if($server != "" && $username != "" && $password != "" && $database != ""){
				$this->dsn = $this->generateDSN($server, $database);
			}		
			
		}
		
		private function generateDSN($server, $database){
			$dsn = "mysql:host={$server};dbname={$database}";
		}
	}